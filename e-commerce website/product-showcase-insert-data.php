<?php 

require 'DB conection.php'; 
session_start();
$sql = "SELECT * FROM product where id = :id";
$statement = $pdo->prepare($sql);
$statement -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();
$pdo = null;
$_SESSION['id'] = $row['id'];

?>