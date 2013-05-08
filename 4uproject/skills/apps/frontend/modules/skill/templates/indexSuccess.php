<h1>Skills List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($skills as $skill): ?>
    <tr>
      <td><a href="<?php echo url_for('skill/show?id='.$skill->getId()) ?>"><?php echo $skill->getId() ?></a></td>
      <td><?php echo $skill->getName() ?></td>
      <td><?php echo $skill->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('skill/new') ?>">New</a>
