<?php
require 'db.php';
$sql = 'SELECT * FROM animaux
left JOIN refuge ON refuge.id_refuge = animaux.fk_refuge
left join clients ON clients.id_clients = animaux.fk_clients
order by id_animaux';
$statement = $connection->prepare($sql);
// exécution de la requête
$statement->execute();
// sauvegarde du résultat de l'exécution de la requete dans la variable tableau "animaux"
$animaux = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <button class="btn btn-success"><a href="create-animaux.php">Create an animal</a></button>
    <div class="card-header">
      <h2>All pets</h2>
    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>id_animaux</th>
          <th>nom_animaux</th>
          <th>age_animaux</th>
          <th>typeage_animaux</th>
          <th>espece_animaux</th>
          <th>race_animaux</th>
          <th>dateaccuell_animaux</th>
          <th>date_adoption_animaux</th>
          <th>ville refuge</th>
          <th>fk refuge</th>
          <th>nom client</th>
          <th>fk_client</th>
          <th>Action</th>
        </tr>
        <?php foreach($animaux as $animal): ?>
          <tr>
            <td><?= $animal->id_animaux; ?></td>
            <td><?= $animal->nom_animaux; ?></td>
            <td><?= $animal->age_animaux; ?></td>
            <td><?= $animal->typeage_animaux; ?></td>
            <td><?= $animal->espece_animaux; ?></td>
            <td><?= $animal->race_animaux; ?></td>
            <td><?= $animal->dateaccuell_animaux; ?></td>
            <td><?= $animal->date_adoption_animaux; ?></td>
            <td><?= $animal->ville_refuge; ?></td>
            <td><?= $animal->fk_refuge; ?></td>
            <td><?= $animal->nom_clients; ?></td>
            <td><?= $animal->fk_clients; ?></td>
            <td>
              <a href="edit-animaux.php?id_animaux=<?= $animal->id_animaux ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete-animaux.php?id_animaux=<?= $animal->id_animaux ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>