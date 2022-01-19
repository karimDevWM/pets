<?php
require 'db.php';
$id_refuge = $_GET['id_refuge'];
$sql = 'DELETE FROM refuge WHERE id_refuge=:id_refuge';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_refuge' => $id_refuge])) {
  header("Location: read-refuges.php");
}