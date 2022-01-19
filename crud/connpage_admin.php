<?php
    require 'db.php';
    require 'header.php';

    if(isset($_GET['err']))
    {
        if($_GET['err']==1)
        {
            echo 'mauvais identifiant ou mot de passe !!! mets tes lunettes';
        }
    }
?>

<h2>Connexion à l'administration</h2>

<form method="POST" action="connadmin.php">
<div class="form-group mt-2">
        <label for="login_admin">login_admin</label>
        <input type="text" name="login_admin" id="login_admin" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="mdp_admin">mdp_admin</label>
        <input type="text" name="mdp_admin" id="mdp_admin" class="form-control">
    </div>
    <div class="form-group mt-3">
        <input type="submit" name="submit" class="btn btn-info" value="connexion">
    </div>
</form>