<?php
require 'db.php';
$message = '';

if(isset($_POST['mdp_admin'])==isset($_POST['cmdp_admin']))
{
    echo '<p>meme mot de passe</p>';
}

if (  isset($_POST['login_admin'])&&
      isset($_POST['mdp_admin']) 
  ) 
{
      $login_admin=$_POST['login_admin'];
      $mdp_admin=$_POST['mdp_admin'];

      $sql = "INSERT INTO admin(login_admin, 
                                  mdp_admin
                                ) 
              VALUES(             :login_admin, 
                                  :mdp_admin
                                )";
  
  $statement = $connection->prepare($sql);
  if ($statement->execute([':login_admin'=>$login_admin,
      ':mdp_admin'=>$mdp_admin
  ])) 
  {
    $message = 'data inserted successfully';
    header('Location:read-admins.php');
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
        <label for="login_admin">login_admin</label>
        <input type="text" name="login_admin" id="login_admin" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="mdp_admin">mdp_admin</label>
        <input type="text" name="mdp_admin" id="mdp_admin" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="cmdp_admin">cmdp_admin</label>
        <input type="text" name="cmdp_admin" id="cmdp_admin" class="form-control">
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-info">Create an admin</button>
    </div>
</form>
</div>
  </div>
</div>
<?php require 'footer.php'; ?>