<?php
require 'db.php';
$id_clients  = $_GET['id_clients'];
$sql = 'SELECT * FROM clients WHERE id_clients =:id_clients ';
$statement = $connection->prepare($sql);
$statement->execute([':id_clients' => $id_clients]);
$clients = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['nom_clients']) && 
    isset($_POST['prenom_clients']) &&
    isset($_POST['age_clients']) &&
    isset($_POST['email_clients']) &&
    isset($_POST['mdp_clients']) &&
    isset($_POST['adresse_clients']) &&
    isset($_POST['cp_clients']) &&
    isset($_POST['ville_clients'])
    ) 
{
  $nom_clients = $_POST['nom_clients'];
  $prenom_clients = $_POST['prenom_clients'];
  $age_clients = $_POST['age_clients'];
  $email_clients = $_POST['email_clients'];
  $mdp_clients = $_POST['mdp_clients'];
  $adresse_clients = $_POST['adresse_clients'];
  $cp_clients = $_POST['cp_clients'];
  $ville_clients = $_POST['ville_clients'];
  $sql = 'UPDATE clients SET nom_clients=:nom_clients, 
                            prenom_clients=:prenom_clients,
                            age_clients=:age_clients,
                            email_clients=:email_clients,
                            mdp_clients=:mdp_clients,
                            adresse_clients=:adresse_clients,
                            cp_clients=:cp_clients,
                            ville_clients=:ville_clients
                        WHERE id_clients=:id_clients';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id_clients' => $id_clients,
                          ':nom_clients' => $nom_clients, 
                          ':prenom_clients' => $prenom_clients, 
                          ':age_clients' => $age_clients,
                          ':email_clients' => $email_clients,
                          ':mdp_clients' => $mdp_clients,
                          ':adresse_clients' => $adresse_clients,
                          ':cp_clients' => $cp_clients,
                          ':ville_clients' => $ville_clients
                          ]
                        )
      ) 
  {
    header("Location: read-clients.php");
  }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nom_clients">nom_clients</label>
          <input value="<?= $clients->nom_clients; ?>" type="text" name="nom_clients" id="nom_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="prenom_clients">prenom_clients</label>
          <input type="text" value="<?= $clients->prenom_clients; ?>" name="prenom_clients" id="prenom_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="age_clients">age_clients</label>
          <input type="text" value="<?= $clients->age_clients; ?>" name="age_clients" id="age_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="email_clients">email_clients</label>
          <input type="text" value="<?= $clients->email_clients; ?>" name="email_clients" id="email_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="mdp_clients">mdp_clients</label>
          <input type="text" value="<?= $clients->mdp_clients; ?>" name="mdp_clients" id="mdp_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="adresse_clients">adresse_clients</label>
          <input type="text" value="<?= $clients->adresse_clients; ?>" name="adresse_clients" id="adresse_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="cp_clients">cp_clients</label>
          <input type="text" value="<?= $clients->cp_clients; ?>" name="cp_clients" id="cp_clients" class="form-control">
        </div>
        <div class="form-group">
          <label for="ville_clients">ville_clients</label>
          <input type="text" value="<?= $clients->ville_clients; ?>" name="ville_clients" id="ville_clients" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update client</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
