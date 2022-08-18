<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/regisiter.css">
    <title>add product category</title>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
        @media  (min-width:600px) {
            .container {
                width: 30%
            }
        }
  
    </style>
</head>  

<body>
<?php 
session_start();
        if(isset($_SESSION['email'])){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
 
 ?>
                    <section>
                    <div class="container">
                    <form action ='product_cat_add.php' method='post'>
                    <div class="text">
                                    
                        <label for="name">category name</label>
                        <input type="text" id="name" placeholder="category name...." name = 'name'>
                                    
                    </div>
                    </form>
                    </div>
                    </section>
         <?php 
        include 'footer.php';
        ?>
