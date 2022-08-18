<?php 

require 'DB conection.php';


$sql = "INSERT into  category values (:id ,:name) ";

$id;
$name = $_POST['name'];
$statement = $pdo->prepare($sql);
$statement -> bindParam(':id', $id, PDO::PARAM_INT);
$statement -> bindParam(':name', $name, PDO::PARAM_STR);
$statement -> execute();
$pdo = null;

header('location: products page.php');
?>