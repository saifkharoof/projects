<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET'){
require 'DB conection.php';
$sql100 = 'SELECT * from product where title = :title';
$title = $_GET['searching'];
$statment10 = $pdo -> prepare($sql100);
$statment10 -> bindParam(':title' , $title , PDO::PARAM_STR);
$statment10 -> execute();
$row100 = $statment10->fetch();

header('location:product-showcase.php?id=' . $row100['id']);
if($row100 == null){
header('location:index.php');
}
}
?>