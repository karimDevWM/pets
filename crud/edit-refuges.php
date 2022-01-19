<?php
require 'db.php';
$id_refuge = $_GET['id_refuge'];
$sql = 'SELECT * FROM refuge WHERE id_refuge =:id_refuge';
$statement = $connection->prepare($sql);
$statement->execute([':id_refuge' => $id_refuge ]);
$refuges = $statement->fetch(PDO::FETCH_OBJ);

if (    
    isset ($_POST['nom_refuge'])  && 
    isset ($_POST['image_refuge'])  && 
    isset($_POST['adresse_refuge']) &&
    isset($_POST['cp_refuge']) && 
    isset($_POST['ville_refuge']) && 
    isset($_POST['tel_refuge']) && 
    isset($_POST['email_refuge']) && 
    isset($_POST['nbplaces_refuge'])
    )
{
    $nom_refuge = $_POST['nom_refuge'];
    $image_refuge = $_POST['image_refuge'];
    $adresse_refuge = $_POST['adresse_refuge'];
    $cp_refuge = $_POST['cp_refuge'];
    $ville_refuge = $_POST['ville_refuge'];
    $tel_refuge = $_POST['tel_refuge'];
    $email_refuge = $_POST['email_refuge'];
    $nbplaces_refuge = $_POST['nbplaces_refuge'];
    $sql = 'UPDATE refuge SET nom_refuge=:nom_refuge, 
                                image_refuge=:image_refuge, 
                                adresse_refuge=:adresse_refuge, 
                                cp_refuge=:cp_refuge, 
                                ville_refuge=:ville_refuge,
                                tel_refuge=:tel_refuge, 
                                email_refuge=:email_refuge,
                                nbplaces_refuge=:nbplaces_refuge
            WHERE id_refuge=:id_refuge';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':id_refuge'=>$id_refuge, 
                            ':image_refuge'=>$image_refuge, 
                            ':nom_refuge'=>$nom_refuge, 
                            ':adresse_refuge'=>$adresse_refuge, 
                            ':cp_refuge'=>$cp_refuge,
                            ':ville_refuge'=>$ville_refuge,
                            ':tel_refuge'=>$tel_refuge,
                            ':email_refuge'=>$email_refuge,
                            ':nbplaces_refuge'=>$nbplaces_refuge
                            ])
      ) 
    {
        header("Location: read-refuges.php");
    }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update customer</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nom_refuge">nom_refuge</label>
          <input value="<?= $refuges->nom_refuge; ?>" type="text" name="nom_refuge" id="nom_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="image_refuge">image_refuge</label>
          <input type="text" value="<?= $refuges->image_refuge; ?>" name="image_refuge" id="image_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="adresse_refuge">adresse_refuge</label>
          <input type="text" value="<?= $refuges->adresse_refuge; ?>" name="adresse_refuge" id="adresse_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="cp_refuge">cp_refuge</label>
          <input type="text" value="<?= $refuges->cp_refuge; ?>" name="cp_refuge" id="cp_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="ville_refuge">ville_refuge</label>
          <input type="text" value="<?= $refuges->ville_refuge; ?>" name="ville_refuge" id="ville_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="tel_refuge">tel_refuge</label>
          <input type="text" value="<?= $refuges->tel_refuge; ?>" name="tel_refuge" id="tel_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="email_refuge">email_refuge</label>
          <input type="text" value="<?= $refuges->email_refuge; ?>" name="email_refuge" id="email_refuge" class="form-control">
        </div>
        <div class="form-group">
          <label for="nbplaces_refuge">nbplaces_refuge</label>
          <input type="text" value="<?= $refuges->nbplaces_refuge; ?>" name="nbplaces_refuge" id="nbplaces_refuge" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update refuge</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
