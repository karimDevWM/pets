<?php

    require 'partials/header.php';
    require 'crud/db.php';

    $id_animaux = $_GET['id_animaux'];
    $sql = 'SELECT * FROM animaux WHERE id_animaux=:id_animaux';
    $statement = $connection->prepare($sql);
    $statement->execute([':id_animaux' => $id_animaux]);
    $animaux = $statement->fetch(PDO::FETCH_OBJ);

    if($utilisateur == "")
    {
        ?>
            <style>
                .adopt_btn
                {
                    display: none;
                }
            </style>
        <?php
    }
?>

<div class="container mt-5 d-flex flex-column justify-content-center">
    <img src="images/<?= $animaux->image_animaux; ?>" height="500" width="500">
    <h2><?= $animaux->nom_animaux; ?></h2>
    <p>age : <?= $animaux->age_animaux; ?></p>
    <p>espece : <?= $animaux->espece_animaux; ?></p>
    <p>race : <?= $animaux->race_animaux; ?></p>
    <p>genre : <?= $animaux->genre_animaux; ?></p>
    <p>description : <?= $animaux->description_animaux; ?></p>
    <p>compatible avec des enfants: <?= $animaux->enfant_animaux; ?></p>
    <p>date accueil : <?= $animaux->dateaccuell_animaux; ?></p>
    <p>date d'adoption <?= $animaux->date_adoption_animaux; ?></p>
    <button class="adopt_btn"><a href="index.php?page=adopt&id_animaux=<?= $animaux->id_animaux; ?>">adopt</a></button>
</div>