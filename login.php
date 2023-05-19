<?php

    require 'crud/db.php';

    $connection = new PDO('mysql:host=localhost;dbname=pets', 'root', 'root');

    if(isset($_POST['email_clients'])&&
         isset($_POST['mdp_clients'])
    )
    {
        $email_clients = $_POST["email_clients"];
        $mdp_clients = $_POST["mdp_clients"];

        $req = $connection->query("SELECT * FROM clients WHERE email_clients='$email_clients' && mdp_clients='$mdp_clients'");

        $resultat = $req->fetch(PDO::FETCH_OBJ);

        if($resultat)
        {
            $_SESSION["id_clients"]=$resultat->id_clients;
            $_SESSION["nom_clients"]=$resultat->nom_clients;
            $_SESSION["prenom_clients"]=$resultat->prenom_clients;
            $_SESSION["email_clients"]=$resultat->email_clients;
            $_SESSION["age_clients"]=$resultat->age_clients;
            $_SESSION["adresse_clients"]=$resultat->adresse_clients;
            $_SESSION["cp_clients"]=$resultat->cp_clients;
            $_SESSION["ville_clients"]=$resultat->ville_clients;
            header("Location:index.php?page=profil");
        }
        else
        {
            header("Location:index.php");
        }

    }

?>

<form method="POST" action="">
<div class="form-group mt-2">
        <label for="email_clients">email_clients</label>
        <input type="text" name="email_clients" id="email_clients" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="mdp_clients">mdp_clients</label>
        <input type="text" name="mdp_clients" id="mdp_clients" class="form-control">
    </div>
    <div class="form-group mt-3">
        <input type="submit" name="submit" class="btn btn-info" value="connexion">
    </div>
</form>
