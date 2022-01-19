<?php
require 'db.php';
$sql = 'SELECT * FROM admin';
$statement = $connection->prepare($sql);
$statement->execute();
$admins = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
  <button class="btn btn-success"><a href="create-admins.php">Create an admin</a></button>
    <div class="card-header">
      <h2>All admins</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>id_admin</th>
          <th>login_admin</th>
          <th>mdp_admin</th>
          <th>Action</th>
        </tr>
        <?php foreach($admins as $admin): ?>
          <tr>
            <td><?= $admin->id_admin; ?></td>
            <td><?= $admin->login_admin; ?></td>
            <td><?= $admin->mdp_admin; ?></td>
            <td>
              <a href="edit-admins.php?id_admin=<?= $admin->id_admin ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete-admins.php?id_admin=<?= $admin->id_admin ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>