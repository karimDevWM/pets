<?php

    require 'crud/db.php';

    $id_refuge = $_GET['id_refuge'];

    $sql = 'SELECT * FROM animaux
    WHERE fk_refuge = '.$id_refuge;
    $statement = $connection->prepare($sql);
    // exécution de la requête
    $statement->execute();
    // sauvegarde du résultat de l'exécution de la requete dans une variable tableau
    $myrefuge = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All pets</h2>
    </div>

    <div class="container">
    <div class="row">
<?php 

    foreach($myrefuge as $mon_refuge){ 
        //On fait une condition gérer les sexes (qui sont 0 et 1 dans la BDD)
        if($mon_refuge->genre_animaux=="m"){
          $sexe = "male";
      }
      else
      {
          $sexe="femelle";
      }
?>

        <!-- chaque itération de la boucle doit générer une card bootstrap où le contenu de chaque carte est généré avec 
        les information récupérées dans la base de données -->
        <div class="card" style="width: 30%;">
            <img src="images/<?php echo $mon_refuge->image_animaux; ?>" class="card-img-top" alt="..." height="200" width="200" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $mon_refuge->nom_animaux; ?></h5>
              <p class="card-text"><?php echo ucfirst($mon_refuge->race_animaux). " " . $sexe . " agé de ". $mon_refuge->age_animaux. " ans." ; ?></p>
              <a href="animal.php?id_animaux=<?php echo $mon_refuge->id_animaux; ?>" class="btn" style="background:#802B75; color:white;">Consulter la page de <?php echo $mon_refuge->nom_animaux; ?> </a>
            </div>
        </div>
<?php
    }
?>
    </div>
</div>

  </div>
</div>

