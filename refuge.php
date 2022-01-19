<?php

    require 'crud/db.php';
    

    $sql = 'SELECT * FROM refuge';
    $statement = $connection->prepare($sql);
    // exécution de la requête
    $statement->execute();
    // sauvegarde du résultat de l'exécution de la requete dans la variable tableau "animaux"
    $refuges = $statement->fetchAll(PDO::FETCH_OBJ);



?>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card-body">
      <?php foreach($refuges as $refuge): ?>
            <img src="images/<?php echo $refuge->image_refuge; ?>" class="card-img-top" alt="..." height="200" width="200" >
            <div class="card-body">
              <h5 class="card-title"><?= $refuge->nom_refuge; ?></h5>
              <p class="card-text"><?= $refuge->adresse_refuge; ?></p>
              <p class="card-text"><?= $refuge->cp_refuge." - ".ucfirst($refuge->ville_refuge); ?></p>
              <a href="index.php?page=myrefuge&id_refuge=<?= $refuge->id_refuge; ?>" class="btn" style="background:#802B75; color:white;">Consulter la page de <?= $refuge->nom_refuge; ?> </a>
            </div>
        </div>
      <?php endforeach; ?>
        </div>
      </div>
    </div>