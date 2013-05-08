<?php
/**
 * Authentication class<br />
 * Automatically authenticates users on construction<br />
 * <b>Note:</b> requires the Session class be available
 * @access public
 * @uses Session
 */
class Auth
{
    /**
     * Instance of database connection class
     * @access protected
     * @var PDO object
     */
    protected $db;

    /**
     * Configuration array
     * @access protected
     * @var array
     */
    protected $cfg;

    /**
     * Instance of Session class
     * @access public
     * @var Session object
     */
    public $session;

    /**
     * Url to re-direct to in case not authenticated
     * @access protected
     * @var string
     */
    protected $redirect;

    /**
     * String to use when making hash of username and password
     * @access protected
     * @var string
     */
    protected $hashKey;

    /**
     * Auth constructor
     * Checks for valid user automatically
     * @param object database connection
     * @param string URL to redirect to on failed login
     * @param string key to use when making hash of user name and
     *                           password
     * @param boolean if passwords are md5 encrypted in database
     *                           (optional)
     * @return void
     * @access public
     */
    function __construct(PDO $db, $redirect, $hashKey)
    {
        $this->db       = $db;
        $this->cfg      = parse_ini_file('access_control.ini', TRUE); // NOTE: Must store access_control.ini in same folder as this class
        $this->redirect = $redirect;
        $this->hashKey  = $hashKey;
        $this->session  = new Session();
        //$this->login();
    }

    /**
     * Checks username and password against database
     * @return void
     * @access public
     */
    public function login()
    {
        // Put the cfg vars into local vars for readability
        $var_login = $this->cfg['login_vars']['login'];
        $var_pass = $this->cfg['login_vars']['password'];
        $user_table = $this->cfg['account_table']['table'];
        $user_id = $this->cfg['account_table']['col_id'];
        $user_login = $this->cfg['account_table']['col_login'];
        $user_pass = $this->cfg['account_table']['col_password'];

        // See if we have values already stored in the session
        if ($this->session->get('login_hash'))
        {
            $this->confirmAuth();
            return;
        }

        // If this is a fresh login, check $_POST variables
        if (!isset($_POST[$var_login]) ||
            !isset($_POST[$var_pass]))
        {
            return "Please login to the system.";
        }

        // Create an MD5 hash of the password given -- remember we store the password in the database
        // as an MD5 hash (one-way hash) -- we never store a plaintext password
        $password = md5($_POST[$var_pass]);

        try
        {
            // Query to count number of users with this username and password
            $sql = "SELECT COUNT(" . $user_id . ") AS num_users " .
                    "FROM " . $user_table . " WHERE " .
                    $user_login . "=:login AND " .
                    $user_pass . "=:pass";

            // prepare the statement based on SQL given
            $stmt = $this->db->prepare($sql);

            // bind the user input
            $stmt->bindParam(':login', $_POST[$var_login]);
            $stmt->bindParam(':pass', $password);

            // execute the SQL statement
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            // create your own error handling logic - I will redirect.
            // If the redirect page has the capability I could alter the
            // redirect method to handle an added error message that can
            // be passed on to the page.    for simplicity - we will skip that.
            error_log('Error in '.$e->getFile().
                        ' Line: '.$e->getLine().
                        ' Error: '.$e->getMessage()
            );

            return "An error has occurred.";
        }

        // If there isn't is exactly one entry, return error measage
        if ($row['num_users'] != 1)
        {
            return "Incorrect username or password.";
        }
        else
        {
            // this is a valid user; set the session variables
            $this->storeAuth($_POST[$var_login], $password, "TEACHER");
        }
    }

    /**
     * Sets the session variables after a successful login
     * @return void
     * @access public
     */
    public function storeAuth($login, $password, $userType)
    {
        $this->session->set($this->cfg['login_vars']['login'], $login);
        // remember the $password var is a MD5 - never keep the plaintext password
        $this->session->set($this->cfg['login_vars']['password'], $password);
        // Store the user type
        $this->session->set('user_type', $userType);

        // Create a session variable to use to confirm/verify sessions
        $hashKey = md5($this->hashKey . $login . $password);
        $this->session->set($this->cfg['login_vars']['hash'], $hashKey);
    }

    /**
     * Confirms that an existing login is still valid
     * @return void
     * @access private
     */
    private function confirmAuth()
    {
        $login = $this->session->get($this->cfg['login_vars']['login']);
        $password = $this->session->get($this->cfg['login_vars']['password']);
        $hashKey = $this->session->get($this->cfg['login_vars']['hash']);
        if (md5($this->hashKey . $login . $password) != $hashKey)
        {
            $this->logout(true);
        }
    }

    /* Checks if the user is logged in
     * @return boolean
     * @access public
     *  */
    public function isLoggedIn()
    {
        $login = $this->session->get($this->cfg['login_vars']['login']);
        $password = $this->session->get($this->cfg['login_vars']['password']);
        $hashKey = $this->session->get($this->cfg['login_vars']['hash']);
        if (md5($this->hashKey . $login . $password) == $hashKey)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Logs the user out
     * @param boolean Parameter to pass on to Auth::redirect()
     *                           (optional)
     * @return void
     * @access public
     */
    public function logout($msg = "You have been logged out.")
    {
        $this->session->del($this->cfg['login_vars']['login']);
        $this->session->del($this->cfg['login_vars']['password']);
        $this->session->del($this->cfg['login_vars']['hash']);
        // For security reasons I am choosing to destroy the session
        // here to start a completely new one.  If however you need to keep
        // any other data in the session other than Auth data - you
        // may choose not to do this.
        $this->session->destroy();
        //$this->redirect($msg);
    }

    /**
     * Redirects browser and terminates script execution
     * @param string Message to display on receiving page after redirect.
     *                           (optional)
     * @return void
     * @access private
     */
    private function redirect($msg = '')
    {
        if ($msg)
        {
            header('Location: ' . $this->redirect . '?msg=' . $msg);
        } else {
            header('Location: ' . $this->redirect);
        }
        exit();
    }
}
?>