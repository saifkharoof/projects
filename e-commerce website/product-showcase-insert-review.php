<?php 

require 'DB conection.php'; 
session_start();
$id = $_SESSION['id'];
$sql = "UPDATE product set reviews = :review where id = $id";
$statement = $pdo->prepare($sql);
$statement->bindParam(':review', $_POST["review"], PDO::PARAM_STR);
$statement->execute();

$pdo = null;

header("Location: index.php");
?>