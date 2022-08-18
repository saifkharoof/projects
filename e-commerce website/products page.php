<?php 

session_start();
require 'DB conection.php'; 
$sql = "SELECT * FROM product where category_id =:cid";
$statement = $pdo->prepare($sql);
$statement->bindParam(':cid', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$data= $statement->fetchAll();


$sql2 = "SELECT MAX(price) AS price FROM product where category_id =:cid2";
$statement2 = $pdo->prepare($sql2);
$statement2->bindParam(':cid2', $_GET['id'], PDO::PARAM_INT);
$statement2 ->execute();
$max= $statement2->fetch();


$sql3 = "SELECT MIN(price) AS price FROM product where category_id =:cid3";
$statement3 = $pdo->prepare($sql3);
$statement3->bindParam(':cid3', $_GET['id'], PDO::PARAM_INT);
$statement3 ->execute();
$min= $statement3->fetch();



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['priceRanger'])){
    $sql4 = "SELECT * FROM product where price between :mi and :ma and category_id =:cid4";
    $statement4 = $pdo->prepare($sql4);
    $statement4->bindParam(':cid4', $_GET['id'], PDO::PARAM_INT);
    $statement4->bindParam(':mi', $_POST['priceRanger'], PDO::PARAM_INT);
    $statement4->bindParam(':ma', $max['price'], PDO::PARAM_INT);
    $statement4 ->execute();
    $data= $statement4->fetchAll();
    }

    if(isset($_POST['Pricing'])) {
    if($_POST['Pricing'] == 'low'){
        $sql5 = "SELECT * FROM product  where category_id =:cid5 order by price ASC";
        $statement5 = $pdo->prepare($sql5);
        $statement5->bindParam(':cid5', $_GET['id'], PDO::PARAM_INT);
        $statement5 ->execute();
        $data= $statement5->fetchAll();

    } else if($_POST['Pricing'] == 'high'){

        $sql6 = "SELECT * FROM product where category_id =:cid6 order by price desc ";
        $statement6 = $pdo->prepare($sql6);
        $statement6->bindParam(':cid6', $_GET['id'], PDO::PARAM_INT);
        $statement6 ->execute();
        $data= $statement6->fetchAll();
    } 
}

if(isset($_POST['Pricing']) && isset($_POST['priceRanger'])){

    if($_POST['Pricing'] == 'low'){
        $sql7 = "SELECT * FROM product where price between :mi and :ma and category_id =:cid7 order by price ASC";
        $statement7 = $pdo->prepare($sql7);
        $statement7->bindParam(':cid7', $_GET['id'], PDO::PARAM_INT);
        $statement7->bindParam(':mi', $_POST['priceRanger'], PDO::PARAM_INT);
        $statement7->bindParam(':ma', $max['price'], PDO::PARAM_INT);
        $statement7 ->execute();
        $data= $statement7->fetchAll();

    } else if($_POST['Pricing'] == 'high'){

        $sql8 = "SELECT * FROM product where price between :mi and :ma and category_id =:cid8 order by price desc";
        $statement8 = $pdo->prepare($sql8);
        $statement8->bindParam(':cid8', $_GET['id'], PDO::PARAM_INT);
        $statement8->bindParam(':mi', $_POST['priceRanger'], PDO::PARAM_INT);
        $statement8->bindParam(':ma', $max['price'], PDO::PARAM_INT);
        $statement8 ->execute();
        $data= $statement8->fetchAll();
    } 
 
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/cards.css">
    <meta charset="UTF-8">
    <title>pc components</title>
    <?php foreach($data as $row){ ?>
    <meta name = 'keywords' content = '<?php echo $row['title'];?>'>
    <meta name = 'description' content = '<?php echo $row['description'];?>'>
    <?php }?>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
        
        @media (max-width: 800px) {

            .active11{
                top:7%;
                z-index: 3;
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
<section class= "products-layout">
 <aside class="filter" >
                <h2 class ='title-filter'> filter </h2>
                <form action="" method="post" class='filtering'>
                    <label for="price-range"><?php echo 'select the minimum price ' .'<br>'. $min['price'] . ' - ' . $max['price']; ?></label>
                    <input type="range" name="priceRanger" class="price-range" min ='<?php echo $min['price'];?>' max ='<?php echo $max['price'];?>' step = '<?php $max['price']/$min['price']?>' class='data'
                    value ='<?php echo $min['price']; ?>'><br>
                
                    <label for="ranger-value">the minimum price is </label><br>
                    <input type="text" name="" id="ranger-value" value='<?php  
                    
                    if(isset($_POST['priceRanger'])){
                    echo $_POST['priceRanger'];
                    } else {
                        echo $min['price'];
                     
                    }
                    ?>'
                        
                      
                    class='data' readonly><br>
                    <hr>

                    <h3 class ='title-filter'>order by: </h3>
                    <label for="price-range">lowest price</label>
                    <input type="radio" name="Pricing" id="lowest-price" value ='low' class='data'><br>

                    <label for="price-range">highset price</label>
                    <input type="radio" name="Pricing" id="highset-price" value ='high' class='data'><br>

                    <button name="submtion" id="btn-sbm">submit</button><br>
                </form>
          
            </aside>
  
            <script> 
               let x;
                document.querySelectorAll('.price-range').forEach( function(slide) {
                    slide.addEventListener('change', function(){
                        
                        x = document.querySelector('.price-range').value;
                        document.querySelector('#ranger-value').value = x;
                        console.log(x);
                    })
                   
               })  
               </script>
            <main class=''>
            <?php foreach($data as $row){ ?>
            <a href='product-showcase.php?id=<?php echo $row['id'];?>' class='click'>
                <div id="image1" class="img">
                
                        <img src="<?php echo $row['image'];?>" class="img2" alt='<?php echo $row['image'];?>'>
                        <span> <?php echo $row['title'];?> </span>
                        <span> <?php echo $row['price'];?> </span>
                        <form action="cart-btn-add.php" method="get">
                        <button class="crt-btn" name = 'cart-btn-pr'>add to cart</button>
                        <input type="hidden" name="product-id" value="<?php echo $row['id'] ?>">
                        </form>
                </div>
            </a>
                <?php }?>

            
                <!-- <div id="image2" class="img">
                    <img src="images/cpu.jpg" class="img2">
                    <span> cpu </span>
                    <span> 500$</span>
                </div>
    
                <div id="image3" class="img">
                    <img src="images/m.2.png" class="img2">
                    <span> storage devices </span>
                    <span> 500$</span>
                </div>
    
                <div id="image4" class="img">
                    <img src="images/MOBO.jpg" class="img2">
                    <span> Motherboards </span>
                    <span> 500$</span>
                </div>

                <div id="image5" class="img">
                    <img src="images/psu.jpg" class="img2">
                    <span> psu </span>
                    <span> 500$</span>
                </div>

                <div id="image6" class="img">
                    <img src="images/ram.png" class="img2">
                    <span> ram </span>
                    <span> 500$</span>
                </div>

                <div id="image7" class="img">
                    <img src="images/case.png" class="img2" id="caseimg">
                    <span> case </span>
                    <span> 500$</span>
                   
                    <a href='product-showcase.php?id='>click here</a>
                   
                </div> -->
                
            </main>

            </section>
        <!-- <script>

                const clickable = document.getElementsByClassName('img');
                
                for(i = 0; i < clickable.length ; i++){
                    
                   clickable[i].addEventListener('click', function(){
                        
                        location.href ='product-showcase.php?id=';
                        
                    })
                    
                }

        </script> -->

<?php include 'footer.php'?>
</body>



</html>