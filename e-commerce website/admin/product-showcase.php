<?php 

require 'DB conection.php'; 
session_start();
$sql = "SELECT * FROM product where id = :id";
$statement = $pdo->prepare($sql);
$statement -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();
$_SESSION['id'] = $row['id'];

$pdo = null;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/product-showcase.css">
    <title><?php echo $row['title'];?></title>
    <meta name="description" content="<?php echo $row['description'];?>">
    <meta charset="UTF-8">
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
        @media (max-width: 800px) {

            .active11{
                top:9%;
                z-index: 2;
            }

        }
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
            <main id="product-showcase" >

                <section id="main-info" >

                <div  id="product-image-gallery">
                
                        <img src="<?php echo $row['image'];?>" class="product-img-big" alt = '<?php echo $row['title'];?>'>
                        <div id="small">
                        <img src="<?php echo $row['image'];?>" class="product-img-small" alt = '<?php echo $row['title'];?>'> 
                        <img src="<?php echo $row['image2'];?>" class="product-img-small" alt = '<?php echo $row['title'];?>'> 
                        <img src="<?php echo $row['image3'];?>" class="product-img-small" alt = '<?php echo $row['title'];?>'> 
             
                        </div>
                        
                </div>

                <div id="product-info">
                
                <span id="description">
                <p>
                    <?php echo $row['description']?>                
                </p>
                </span>
                
                <span id="price"> <?php echo $row['price'] .'jd';?> </span>

                <form action ="cart-btn-add.php" method ='get' id="cartbtn">
                <input type="number" id="quantity" name='quantity' value='1' min="0" max="10">
                        <button>cart</button>
                </form>
                
                </div>

                </section>


               <section id="seconderyinfo">

                 <h2 id="main-title">specs</h2>
                        <div id="specs">
                            
                            <div class="information">

                                <h4 class="title"> product name</h4>
                                <h4 class="title"> model </h4>
                                <h4 class="title"> number of cores </h4>
                                <h4 class="title"> cache </h4>
                                <h4 class="title"> wattage</h4>

                            </div>
            
                            <div class="display">

                                <h4 class="info"> cpu </h4>
                                <h4 class="info"> 200000 </h4>
                                <h4 class="info"> 4 cores </h4>
                                <h4 class="info"> 8mb </h4>
                                <h4 class="info"> 150w </h4>

                            </div>
                        </div>

                        
                         <div id="review">
                            <h2>review</h2>
                            <form id ="clikc-here-txt" action ='product-showcase-insert-review.php' method='post' >
                            <textarea rows="10" cols="30" name ='review'>
                                write your review here....
                            </textarea>

                            <button id="sumbit-btn" action ='product-showcase-insert-review.php' method='post'>sumbit</button>
                            </form>
                        </div> 

                </section>  
            </main>

            <script>
                document.querySelectorAll('.product-img-small').forEach(function(image){
                    image.addEventListener('click', function(){
                        const img = image.src;
                        document.querySelector('.product-img-big').src = img
                    })
                })
            </script>

<?php include 'footer.php'?>

</body>



</html>