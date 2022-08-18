<?php
session_start();
require 'DB conection.php';
if(isset($_SESSION['email'])){
$sql4 = 'SELECT * from customer where email = :email ';
$statement = $pdo -> prepare($sql4);
$statement -> bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
$statement -> execute();
$row3 = $statement->fetch();

$sql10= 'SELECT DISTINCT p.title,p.image,p.id,p.price,o.customer_id,oi.quantity from 
orders AS o join order_item AS oi ON oi.order_id = o.id 
JOIN customer AS c ON c.id = o.customer_id JOIN product AS p ON oi.product_id = p.id
WHERE customer_id = :id';
$statement10 = $pdo -> prepare($sql10);
$statement10 -> bindParam(':id', $row3['id'], PDO::PARAM_INT);
$statement10 -> execute();
$data = $statement10 -> fetchAll(); 
}else{
    header("Location: login-page.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/cart-page.css">
    <title>cart</title>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
        
  
    </style>
</head>  

<body>
<?php 
        if(isset($_SESSION['email'])){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
 
 ?>

           <main id="shop">

                <h2 id = "cart-title">shopping cart</h2>
                <section id="layout">

                <div class="information">
                    <h4 class="title-cart"> image</h4>
                    <h4 class="title-cart">  product name</h4>
                    <h4 class="title-cart"> model </h4>
                    <h4 class="title-cart"> quantity </h4>
                    <h4 class="title-cart"> unit price </h4>
                    <h4 class="title-cart"> total price</h4>
                </div>
                <?php foreach($data as $row){ ?>
                <div class="display">
                    <img src="<?php echo $row['image'];?>" class="product-image">
                    <h4 class="display-el title-cart" > <?php echo $row['title'];?> </h4>
                    <h4 class="display-el title-cart" ><?php echo $row['id'];?> </h4>
                    <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity'];?>" min="0" max="10">
                    <input type="hidden" id="price" name="price" value="<?php echo $row['price'];?>" min="0" max="10">
                    <h4 id = "initial-price" class="display-el title-cart"  ><?php echo $row['price'].'jd';?></h4>
                    <h4 id = "total-price" class="display-el title-cart"  ><?php echo $row['quantity']*$row['price'].'jd';?></h4>
                </div>

                <form action ="cart.php" method='get'>
                <input type="text" id="quantity2" name="quantity" value="<?php echo $row['quantity'];?>" min="0" max="10">
                </form>

                <?php } ?>
            </section>
            <span>when set to zero it will remove the item</span>

                <div id="btn-links">
                        <a href="index.php" class="btn">continue shopping</a>
                        <a href="checkout.php" class="btn"> checkout </a>
                </div>
            
            </main>

            <script>
                let x;
                document.querySelectorAll('#quantity2').forEach( function(chg) {
                chg.addEventListener('change', function(){
                        
                        x = document.querySelector('#quantity').value;
                        document.querySelector('#quantity2').value = x;
                        console.log(x);
                    })
                   
               }) 
                    //     var v = document.querySelector('#quantity').value;
                    //     const price = document.querySelector('#price').value;
                    //     document.querySelector('#total-price').innerHTML = v*price;

                    //     document.querySelector('#quantity').addEventListener('change', function(){
                        
                    //     var v = document.querySelector('#quantity').value;
                    //     const price = document.querySelector('#price').value;;
                    //     document.querySelector('#total-price').innerHTML = v*price+"jd";

                    //     if (v == 0){
                            
                    //         const clickable = document.getElementsByClassName('.display');
                    //         for(i = 0; i < clickable.length ; i++){
                    //             clickable[i].style.display = 'none';
                    //         }
                    //         alert('your cart will be emptied')
                    //     }
                        
                    // });
            </script>

        <?php 
        include 'footer.php';
        ?>

</body>

</html>