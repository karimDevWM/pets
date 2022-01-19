<?php
require 'db.php';
$message = '';
if (  isset($_POST['nom_refuge'])&&
      isset($_POST['image_refuge'])&&
      isset($_POST['adresse_refuge'])&&
      isset($_POST['cp_refuge'])&&
      isset($_POST['ville_refuge'])&&
      isset($_POST['tel_refuge'])&&
      isset($_POST['email_refuge'])&&
      isset($_POST['nbplaces_refuge']) 
  ) 
{
      $nom_refuge=$_POST['nom_refuge'];
      $image_refuge=$_POST['image_refuge'];
      $adresse_refuge=$_POST['adresse_refuge'];
      $cp_refuge=$_POST['cp_refuge'];
      $ville_refuge=$_POST['ville_refuge'];
      $tel_refuge=$_POST['tel_refuge'];
      $email_refuge=$_POST['email_refuge'];
      $nbplaces_refuge=$_POST['nbplaces_refuge'];

      $sql = "INSERT INTO refuge(nom_refuge, 
                                  image_refuge,
                                  adresse_refuge,
                                  cp_refuge,
                                  ville_refuge,
                                  tel_refuge,
                                  email_refuge,
                                  nbplaces_refuge
                                ) 
              VALUES(             :nom_refuge, 
                                  :image_refuge,
                                  :adresse_refuge,
                                  :cp_refuge,
                                  :ville_refuge,
                                  :tel_refuge,
                                  :email_refuge,
                                  :nbplaces_refuge
                                )";
  
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom_refuge'=>$nom_refuge,
      ':image_refuge'=>$image_refuge,
      ':adresse_refuge'=>$adresse_refuge,
  ':cp_refuge'=>$cp_refuge,
  ':ville_refuge'=>$ville_refuge,
  ':tel_refuge'=>$tel_refuge,
  ':email_refuge'=>$email_refuge,
  ':nbplaces_refuge'=>$nbplaces_refuge
  ])) 
  {
    $message = 'data inserted successfully';
    header('Location:read-refuges.php');
  }
}
 ?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create refuge</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
                <div class="form-group mt-2">
                    <label for="nom_refuge">nom_refuge</label>
                    <input type="text" name="nom_refuge" id="nom_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="image_refuge">image_refuge</label>
                    <input type="text" name="image_refuge" id="image_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="adresse_refuge">adresse_refuge</label>
                    <input type="text" name="adresse_refuge" id="adresse_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="cp_refuge">cp_refuge</label>
                    <input type="text" name="cp_refuge" id="cp_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="ville_refuge">ville_refuge</label>
                    <input type="text" name="ville_refuge" id="ville_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="tel_refuge">tel_refuge</label>
                    <input type="text" name="tel_refuge" id="tel_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="email_refuge">email_refuge</label>
                    <input type="email" name="email_refuge" id="email_refuge" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="nbplaces_refuge">nbplaces_refuge</label>
                    <input type="number" name="nbplaces_refuge" id="nbplaces_refuge" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Create refuge</button>
                </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>