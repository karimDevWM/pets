<?php
require 'db.php';
$id_clients = $_GET['id_clients'];
$sql = 'DELETE FROM clients WHERE id_clients=:id_clients';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_clients' => $id_clients])) {
  header("Location: read-clients.php");
}