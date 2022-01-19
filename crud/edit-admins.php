<?php
require 'db.php';
$id_admin = $_GET['id_admin'];
$sql = 'SELECT * FROM admin WHERE id_admin=:id_admin';
$statement = $connection->prepare($sql);
$statement->execute([':id_admin' => $id_admin ]);
$admins = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['login_admin'])  && isset($_POST['mdp_admin']) ) {
  $login_admin = $_POST['login_admin'];
  $mdp_admin = $_POST['mdp_admin'];
  $sql = 'UPDATE admin SET login_admin=:login_admin, mdp_admin=:mdp_admin WHERE id_admin=:id_admin';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':login_admin' => $login_admin, ':mdp_admin' => $mdp_admin, ':id_admin' => $id_admin])) {
    header("Location: read-admins.php");
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
          <label for="login_admin">login_admin</label>
          <input value="<?= $admins->login_admin; ?>" type="text" name="login_admin" id="login_admin" class="form-control">
        </div>
        <div class="form-group">
          <label for="mdp_admin">mdp_admin</label>
          <input type="text" value="<?= $admins->mdp_admin; ?>" name="mdp_admin" id="mdp_admin" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
