<?php
require 'db.php';
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
    header('Location:read-clients.php');
  }
}
 ?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create customer</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
                <div class="form-group mt-2">
                    <label for="nom_clients">nom_clients</label>
                    <input type="text" name="nom_clients" id="nom_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="prenom_clients">prenom_clients</label>
                    <input type="text" name="prenom_clients" id="prenom_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="age_clients">age_clients</label>
                    <input type="number" name="age_clients" id="age_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="email_clients">email_clients</label>
                    <input type="text" name="email_clients" id="email_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="mdp_clients">mdp_clients</label>
                    <input type="text" name="mdp_clients" id="mdp_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="adresse_clients">adresse_clients</label>
                    <input type="text" name="adresse_clients" id="adresse_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="cp_clients">cp_clients</label>
                    <input type="text" name="cp_clients" id="cp_clients" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="ville_clients">ville_clients</label>
                    <input type="text" name="ville_clients" id="ville_clients" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Create client</button>
                </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>