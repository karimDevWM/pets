<?php
require 'db.php';
$sql = 'SELECT * FROM refuge';
$statement = $connection->prepare($sql);
$statement->execute();
$refuges = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
  <button class="btn btn-success"><a href="create-refuges.php">Create refuge</a></button>
    <div class="card-header">
      <h2>All refuges</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>id_refuge</th>
          <th>image_refuge</th>
          <th>nom_refuge</th>
          <th>adresse_refuge</th>
          <th>cp_refuge</th>
          <th>ville_refuge</th>
          <th>tel_refuge</th>
          <th>email_refuge</th>
          <th>nbplaces_refuge</th>
          <th>Action</th>
        </tr>
        <?php foreach($refuges as $refuge): ?>
          <tr>
            <td><?= $refuge->id_refuge; ?></td>
            <td><?= $refuge->image_refuge; ?></td>
            <td><?= $refuge->nom_refuge; ?></td>
            <td><?= $refuge->adresse_refuge; ?></td>
            <td><?= $refuge->cp_refuge; ?></td>
            <td><?= $refuge->ville_refuge; ?></td>
            <td><?= $refuge->tel_refuge; ?></td>
            <td><?= $refuge->email_refuge; ?></td>
            <td><?= $refuge->nbplaces_refuge; ?></td>
            <td>
              <a href="edit-refuges.php?id_refuge=<?= $refuge->id_refuge ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete-refuges.php?id_refuge=<?= $refuge->id_refuge ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>