<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM products WHERE id_prod='.$id;
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$id => $id])) {
  header("Location: /");
}