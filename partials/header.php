<?php 
  // ON stock dans une variable la valeur de l'information page, transmise par la barre d'URL sans la superglobale GET
  $page = 1;
  // " isset " permet de savoir si la variable a été initialisée (Si elle existe)
  // " empty " permet de vérifier si la variable est vide
  // L'opérateur " ! " --> permet de faire l'inverse, donc là on vérifie que la variable N'EST PAS vide
  if( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ){
    $page = $_GET['page'];
  }

  // var_dump permet de voir le contenu d'une variable ainsi que toutes informations la concernant (type, taille, ...)
  // var_dump($page, ! empty( $_GET['page'] ));

  session_start();
  $utilisateur = "";
  if(isset($_SESSION['email_clients']))
  {
    $utilisateur = $_SESSION['prenom_clients']." ".$_SESSION['nom_clients'];
    $utilisateur_id = $_SESSION['id_clients'];
  }
  
?>
<!-- Le header est créé une unique fois ici, puis appelé sur toutes les pages -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les futures pantoufles</title>
    <!-- CDN du CSS de bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- On appelle notre CSS perso après pour qu'il puisse écraser les valeurs de bootsrap -->
    <link rel="stylesheet" href="../assets/css/main.css">

</head>
<body>
  <!-- DEBUT Navbar Bootsrap -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #802B75;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- Le href envoie vers la page adaptée et fourni une information "page" // Superglobale GET (Tableau construit avec les infos fournies après le ? dans l'URL) -->
        <!-- Avec php, on test sur quelle page nous sommes avec la variable créée plus tôt gràce à GET puis nous ajoutons les classes "active" et "disabled" si nous sommes sur la bonne page -->
        <a class="nav-link <?php if($page=="Accueil"){echo "active disabled";}
        //SI la variable page contient 1, ALORS écrit "active" et "disabled"   
        ?>" href="index.php?page=Accueil">Accueil</a>
        
        <a class="nav-link <?php if($page=="Animaux"){echo "active disabled";}     
        ?>" href="index.php?page=Animaux">Les animaux</a>

        <a class="nav-link refuge <?php if($page=="refuge"){echo "active disabled";}
        ?>" href="index.php?page=refuge">Les refuges</a>

        <a class=" <?php if($page=="adopt"){echo "active disabled";}     
        ?>" href="index.php?page=adopt"></a>

        <a class="nav-link <?php if($page=="Contact"){echo "active disabled";}     
        ?>" href="index.php?page=Contact">Contact</a>

        <a class="nav-link connexion<?php if($page=="Login"){echo "active disabled";}     
        ?>" href="index.php?page=Login">Se connecter</a>
        
        <a class="nav-link inscription <?php if($page=="inscription"){echo "active disabled";}
        ?>" href="index.php?page=inscription">Inscription</a>
        
        <a class="nav-link profil <?php if($page=="profil"){echo "active disabled";}
        ?>" href="index.php?page=profil">Profil</a>

        <!-- <a class="nav-link mesanimaux <//?php //if($page=="animaux"){echo "active disabled";}
        ?>" href="index.php?page=profil&page=mesanimaux"></a> -->

        <!-- <a class="nav-link myrefuge <//?php //if($page=="myrefuge"){echo "active disabled";}
        ?>" href="index.php?page=myrefuge"></a> -->

        <form class="disconnect-btn" action="logout.php" style="margin-left: 55vw;">
          <input type="submit" value="se déconnecter" style="background-color: transparent;">
        </form>
      </div>
    </div>
    <?php
        if($utilisateur != "")
        {
          ?>
            <style>
              .connexion, .inscription
              {
                display: none !important;
              }

              .profil
              {
                display: block !important;
              }
            </style>
          <?php
        }
        else
        {
          ?>
            <style>
              .profil, .mesanimaux, .disconnect-btn
              {
                display: none !important;
              }
            </style>
          <?php
        }
    ?>

    <?php 
      if($utilisateur != "")
      {
        echo "bonjour ".$utilisateur."!!!!!";
      }
    ?>
  </div>
</nav>
  <!-- FIN  Navbar Bootsrap -->