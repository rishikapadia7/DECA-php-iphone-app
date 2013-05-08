<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $skill->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $skill->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $skill->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('skill/edit?id='.$skill->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('skill/index') ?>">List</a>
