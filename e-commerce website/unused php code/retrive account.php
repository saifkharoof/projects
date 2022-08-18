<?php 
  
        if(isset($_SESSION['email'])){
            session_start();
            require 'DB conection.php';
            $id2 = $_SESSION['p_id'];
            $sql2 = "SELECT * FROM customer c JOIN orders o ON c.id = o.customer_id WHERE c.id = $id2";
            $statemnet2 = $pdo->prepare($sql2);
            $statemnet2 -> bindParam('c.id' , $id2, PDO::PARAM_INT);
            
            $statemnet2 -> execute();
            $row = $statemnet2->fetch();

            $pdo = null;

        }
 ?>