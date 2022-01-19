<?php
  require 'db.php';
  $sql = 'SELECT * FROM clients';
  $statement = $connection->prepare($sql);
  $statement->execute();
  $clients = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
  <button class="btn btn-success"><a href="create-clients.php">Create customer</a></button>
    <div class="card-header">
      <h2>All customers</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>id_clients</th>
          <th>nom_clients</th>
          <th>prenom_clients</th>
          <th>age_clients</th>
          <th>email_clients</th>
          <th>mdp_clients</th>
          <th>adresse_clients</th>
          <th>cp_clients</th>
          <th>ville_clients</th>
          <th>Action</th>
        </tr>
        <?php foreach($clients as $client): ?>
          <tr>
            <td><?= $client->id_clients; ?></td>
            <td><?= $client->nom_clients; ?></td>
            <td><?= $client->prenom_clients; ?></td>
            <td><?= $client->age_clients; ?></td>
            <td><?= $client->email_clients; ?></td>
            <td><?= $client->mdp_clients; ?></td>
            <td><?= $client->adresse_clients; ?></td>
            <td><?= $client->cp_clients; ?></td>
            <td><?= $client->ville_clients; ?></td>
            <td>
              <a href="edit-clients.php?id_clients=<?= $client->id_clients ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete-clients.php?id_clients=<?= $client->id_clients ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
