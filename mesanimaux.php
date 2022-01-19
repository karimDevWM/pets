<?php
    require 'crud/db.php';

?>
    <h1>mes animaux</h1>

<?php  

    var_dump($utilisateur_id);

    $sql = 'SELECT * FROM animaux
            WHERE fk_clients = '.$utilisateur_id;
    
    $statement = $connection->prepare($sql);

    $statement->execute();

    $mesanimaux = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach($mesanimaux as $myanimaux):?>

<div class="container mt-5 d-flex flex-column justify-content-center">
    <img src="images/<?= $myanimaux->image_animaux; ?>" height="500" width="500">
    <h2><?= $myanimaux->nom_animaux; ?></h2>
    <p>age : <?= $myanimaux->age_animaux; ?></p>
    <p>espece : <?= $myanimaux->espece_animaux; ?></p>
    <p>race : <?= $myanimaux->race_animaux; ?></p>
    <p>genre : <?= $myanimaux->genre_animaux; ?></p>
    <p>description : <?= $myanimaux->description_animaux; ?></p>
    <p>compatible avec des enfants: <?= $myanimaux->enfant_animaux; ?></p>
    <p>date accueil : <?= $myanimaux->dateaccuell_animaux; ?></p>
    <p>date d'adoption <?= $myanimaux->date_adoption_animaux; ?></p>
<?php endforeach; ?>
</div>