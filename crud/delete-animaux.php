<?php
require 'db.php';
$id_animaux = $_GET['id_animaux'];
$sql = 'DELETE FROM animaux WHERE id_animaux=:id_animaux';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_animaux' => $id_animaux])) {
  header("Location: read-animaux.php");
}