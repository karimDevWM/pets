<?php

    require 'crud/db.php';

    $message = '';
if (  isset($_POST['nom_clients'])&&
      isset($_POST['prenom_clients'])&&
      isset($_POST['age_clients'])&&
      isset($_POST['email_clients'])&&
      isset($_POST['mdp_clients'])&&
      isset($_POST['adresse_clients'])&&
      isset($_POST['cp_clients'])&&
      isset($_POST['ville_clients']) 
  ) 
{
      $nom_clients=$_POST['nom_clients'];
      $prenom_clients=$_POST['prenom_clients'];
      $age_clients=$_POST['age_clients'];
      $email_clients=$_POST['email_clients'];
      $mdp_clients=$_POST['mdp_clients'];
      $adresse_clients=$_POST['adresse_clients'];
      $cp_clients=$_POST['cp_clients'];
      $ville_clients=$_POST['ville_clients'];

      $sql = "INSERT INTO clients(nom_clients, 
                                  prenom_clients,
                                  age_clients,
                                  email_clients,
                                  mdp_clients,
                                  adresse_clients,
                                  cp_clients,
                                  ville_clients
                                ) 
              VALUES(             :nom_clients, 
                                  :prenom_clients,
                                  :age_clients,
                                  :email_clients,
                                  :mdp_clients,
                                  :adresse_clients,
                                  :cp_clients,
                                  :ville_clients
                                )";
  
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom_clients'=>$nom_clients,
      ':prenom_clients'=>$prenom_clients,
  ':age_clients'=>$age_clients,
  ':email_clients'=>$email_clients,
  ':mdp_clients'=>$mdp_clients,
  ':adresse_clients'=>$adresse_clients,
  ':cp_clients'=>$cp_clients,
  ':ville_clients'=>$ville_clients
  ])) 
  {
    $message = 'data inserted successfully';
    header('Location: login.php');
  }
}

?>
    <form action="" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">nom</span>
            <input type="text" class="form-control" name="nom_clients" placeholder="nom du client" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">prénom</span>
            <input type="text" class="form-control" name="prenom_clients" placeholder="prénom du client" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">age</span>
            <input type="number" class="form-control" name="age_clients" placeholder="âge du client" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">email</span>
            <input type="email" class="form-control" name="email_clients" placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">mot de passe</span>
            <input type="text" class="form-control" name="mdp_clients" placeholder="mot de passe" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">adresse</span>
            <input type="text" class="form-control" name="adresse_clients" placeholder="adresse" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">code postale</span>
            <input type="text" class="form-control" name="cp_clients" placeholder="code postale" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ville</span>
            <input type="text" class="form-control" name="ville_clients" placeholder="ville" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="submit" class="form-control btn btn-success" name="submit" >
        </div>
    </form>

<?php
    include 'partials/footer.php';
?>