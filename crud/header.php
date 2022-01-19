<?php

  if(isset($_GET['err']))
  {
    if($_GET['err']==0)
    {
      ?>
        <style>
          .login-page
          {
            display: none !important;
          }
        </style>
      <?php
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Interface de gestion</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active login-page">
            <a class="nav-link" href="connpage_admin.php">Login</a>
          </li>
          <li class="nav-item database-page">
            <a class="nav-link" href="databases.php">Databases</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CRUD</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item item1" href="read-admins.php">Admins</a>
              <a class="dropdown-item item2" href="read-animaux.php">Animaux</a>
              <a class="dropdown-item item3" href="read-clients.php">Clients</a>
              <a class="dropdown-item item4" href="read-refuges.php">Refuges</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>