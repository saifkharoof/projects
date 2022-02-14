<?php

session_start();
require 'DB conection.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$sql = 'INSERT into customer values (:id, :fname, :lname, :email, :pass_word,:phone_number,:address)';

$statement = $pdo->prepare($sql);
$id;
$statement -> bindParam(':id' , $id , PDO:: PARAM_INT);
$statement -> bindParam(':phone_number' , $_GET['phone-number'] , PDO:: PARAM_INT);
$statement -> bindParam(':fname' , $_GET['fname'] , PDO:: PARAM_STR);
$statement -> bindParam(':lname' , $_GET['lname'] , PDO:: PARAM_STR);
$statement -> bindParam(':email' , $_GET['email'] , PDO:: PARAM_STR);
$statement -> bindParam(':pass_word' , $_GET['pass'] , PDO:: PARAM_STR);
$statement -> bindParam(':address' , $_GET['address'] , PDO:: PARAM_STR);
$statement -> execute();

$sql2 = "SELECT * FROM customer WHERE email = :email";
$statement2 = $pdo->prepare($sql2);
$statement2 -> bindParam(':email' , $_GET['email'] , PDO:: PARAM_STR);
$statement2 -> execute();
$row = $statement2->fetch();
$pdo = null;

$_SESSION['email'] = $row['email'];

if(isset($_SESSION['email'])) {
    header('location: index.php');
    exit();
}
}
?>