<?php 

require 'DB conection.php'; 
$sql = "SELECT * FROM product";
$statement = $pdo->prepare($sql);
$statement->execute();
$data= $statement->fetchAll();
$pdo = null;
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
            <main>
            <?php foreach($data as $row){ ?>
            <a href='product-showcase.php?id=<?php echo $row['id'];?>' class='click'>
                <div id="image1" class="img">
                
                        <img src="<?php echo $row['image'];?>" class="img2" alt='<?php echo $row['image'];?>'>
                        <span> <?php echo $row['title'];?> </span>
                        <span> <?php echo $row['price'];?> </span>
                       
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