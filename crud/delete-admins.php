<?php
require 'db.php';
$id_admin = $_GET['id_admin'];
$sql = 'DELETE FROM admin WHERE id_admin=:id_admin';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_admin' => $id_admin])) {
  header("Location: read-admins.php");
}