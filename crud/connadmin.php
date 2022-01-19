<?php
    require 'db.php';

    if(isset($_POST['login_admin'])&&
         isset($_POST['mdp_admin'])
    )
    {
        $login = $_POST["login_admin"];
        $mdp = $_POST["mdp_admin"];

        $req = $connection->query("SELECT * FROM admin WHERE login_admin='$login' && mdp_admin='$mdp'");

        $resultat = $req->fetch();

        if($resultat == false)
        {
            header("Location:connpage_admin.php?err=1");
        }
        else
        {
            header("Location:index.php?err=0");
        }

    }

?>