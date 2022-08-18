<?php 

require 'DB conection.php';
session_start();
if(isset($_SESSION['email'])){
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql4 = 'SELECT * from customer where email = :email ';
    $statement = $pdo -> prepare($sql4);
    $statement -> bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
    $statement -> execute();
    $row3 = $statement->fetch();
    
    $sql2 = 'INSERT into orders (customer_id, address, session_id) values (:customer_id, :address, :session_id)';
    $statement2 = $pdo -> prepare($sql2);
    $seid = mt_rand();
    $statement2 -> bindParam(':session_id', $seid, PDO::PARAM_INT);
    $statement2 -> bindParam(':customer_id', $row3['id'], PDO::PARAM_INT);
    $statement2 -> bindParam(':address', $row3['address'], PDO::PARAM_STR);
    $statement2 -> execute();

    $sql5 = 'SELECT id from orders where customer_id = :id';
    $statement5 = $pdo -> prepare($sql5);
    $statement5 -> bindParam(':id', $row3['id'], PDO::PARAM_INT);
    $statement5 -> execute();
    $data = $statement5 -> fetchAll();
    
    $sql3 = 'INSERT into order_item values (:id , :order_id, :product_id, :quantity,:images)';
    $statement3 = $pdo -> prepare($sql3);
    $id2;
    $quantity_products = 1;
    $statement3 -> bindParam(':id', $id2, PDO::PARAM_INT);
    if(isset($_GET['quantity'])){
    $statement3 -> bindParam(':quantity', $_GET['quantity'], PDO::PARAM_INT);
    } else {
        $statement3 -> bindParam(':quantity', $quantity_products , PDO::PARAM_INT);
    }
    $statement3 -> bindParam(':images', $row['image'], PDO::PARAM_STR);
    foreach($data as $row5){
    $statement3 -> bindParam(':order_id', $row5['id'], PDO::PARAM_INT);
    }
    if(isset($_GET['cart-btn-pr'])){
    $statement3 -> bindParam(':product_id', $_GET['product-id'], PDO::PARAM_INT);
    } else {
    $statement3 -> bindParam(':product_id', $_SESSION['id'], PDO::PARAM_INT);
    }
    $statement3 -> execute();
    $pdo = null;

    header('location:cart.php');

} 
}else{
    header("Location: login-page.php");
}

?>