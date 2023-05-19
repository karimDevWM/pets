<?php

    require 'crud/db.php';

    $connection = new PDO('mysql:host=localhost;dbname=pets', 'root', 'root');

    $stmt = $connection->query("SELECT * FROM animaux
    left JOIN refuge ON refuge.id_refuge = animaux.fk_refuge
    left join clients ON clients.id_clients = animaux.fk_clients");

    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<table>
    <tr>
        <th>id_animaux</th>
        <th>nom_animaux</th>
        <th>espece_animaux</th>
        <th>race_animaux</th>
        <th>dateaccueil_animaux</th>
        <th>date_adoption_animaux</th>
        <th>fk_refuge</th>
        <th>nom_refuge</th>
        <th>ville_refuge</th>
        <th>fk_clients</th>
        <th>nom_clients</th>
        <th>ville_clients</th>
    </tr>
    <?php  
        foreach($data as $elmt):
    ?>
        <tr>
            <td><?= $elmt-> id_animaux?></td>
            <td><?= $elmt-> nom_animaux?></td>
            <td><?= $elmt-> espece_animaux?></td>
            <td><?= $elmt-> race_animaux?></td>
            <td><?= $elmt-> dateaccuell_animaux?></td>
            <td><?= $elmt-> date_adoption_animaux?></td>
            <td><?= $elmt-> fk_refuge?></td>
            <td><?= $elmt-> nom_refuge?></td>
            <td><?= $elmt-> ville_refuge?></td>
            <td><?= $elmt-> fk_clients?></td>
            <td><?= $elmt-> nom_clients?></td>
            <td><?= $elmt-> ville_clients?></td>
        </tr>
    <?php
        endforeach;
    ?>
</table>

<div class="container mt-5">
<form method="post">    
<select name="especesAni_ddl" id="ddl_especesAni">
    <option value="">espèce</option>
    <?php 
        $stmtEspeces = $connection->query('SELECT distinct espece_animaux from animaux');
        $especes = $stmtEspeces->fetchAll(PDO::FETCH_OBJ);

        foreach($especes as $espece):
    ?>
        <option><?= $espece->espece_animaux; ?></option>
    <?php endforeach ?>
</select>

<select name="racesAni_ddl" id="ddl_racesAni">
    <option value="">race</option>
    <?php 
        $stmtRaces = $connection->query('SELECT distinct race_animaux from animaux');
        $races = $stmtRaces->fetchAll(PDO::FETCH_OBJ);

        foreach($races as $race):
    ?>
        <option><?= $race->race_animaux; ?></option>
    <?php endforeach ?>
</select>

<select name="villesRefuge_ddl" id="ddl_villesRefuge">
    <option value="">ville</option>
    <?php 
        $stmtRefuges = $connection->query('SELECT * FROM animaux
        left JOIN refuge ON refuge.id_refuge = animaux.fk_refuge');
        $refuges = $stmtRefuges->fetchAll(PDO::FETCH_OBJ);

        foreach($refuges as $refuge):
    ?>
        <option><?= $refuge->ville_refuge; ?></option>
    <?php endforeach ?>
</select>

<input type="submit" name="submit">

</form>

<form method="post">
<input type="text" name="searchBox" placeholder="search">
<input type="submit" name="search" value="search">
</form>

</div>

<div class="container">
    <div class="row">

    <?php
        foreach($data as $animal)
        {
            if(isset($_POST['especesAni_ddl']))
            {
                if($_POST['especesAni_ddl']==$animal->espece_animaux)
                {
                    //On fait une condition gérer les sexes (qui sont 0 et 1 dans la BDD)
                    if($animal->genre_animaux=="m"){
                            $sexe = "male";
                    }
                    else
                    {
                            $sexe="femelle";
                    }
                        
                        if(empty($animal->date_adoption_animaux))
                    {
                ?>
                
                        <!-- chaque itération de la boucle doit générer une card bootstrap où le contenu de chaque carte est généré avec 
                        les information récupérées dans la base de données -->
                        <div class="card" style="width: 30%;">
                            <img src="images/<?php echo $animal->image_animaux; ?>" class="card-img-top" alt="..." height="200" width="200" >
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $animal->nom_animaux; ?></h5>
                            <p class="card-text"><?php echo ucfirst($animal->race_animaux). " " . $sexe . " agé de ". $animal->age_animaux. " ans." ; ?></p>
                            <a href="animal.php?id_animaux=<?php echo $animal->id_animaux; ?>" class="btn" style="background:#802B75; color:white;">Consulter la page de <?php echo $animal->nom_animaux; ?> </a>
                            </div>
                        </div>
                <?php
                    }
                }
            }
            else
            { 
                //On fait une condition gérer les sexes (qui sont 0 et 1 dans la BDD)
                    if($animal->genre_animaux=="m"){
                        $sexe = "male";
                    }
                    else
                    {
                        $sexe="femelle";
                    }
                    
                    if(empty($animal->date_adoption_animaux))
                    {
            ?>
            
                    <!-- chaque itération de la boucle doit générer une card bootstrap où le contenu de chaque carte est généré avec 
                    les information récupérées dans la base de données -->
                    <div class="card" style="width: 30%;">
                        <img src="images/<?php echo $animal->image_animaux; ?>" class="card-img-top" alt="..." height="200" width="200" >
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $animal->nom_animaux; ?></h5>
                        <p class="card-text"><?php echo ucfirst($animal->race_animaux). " " . $sexe . " agé de ". $animal->age_animaux. " ans." ; ?></p>
                        <a href="animal.php?id_animaux=<?php echo $animal->id_animaux; ?>" class="btn" style="background:#802B75; color:white;">Consulter la page de <?php echo $animal->nom_animaux; ?> </a>
                        </div>
                    </div>
            <?php
                    }
            }
        }
    ?>
    </div>
</div>
