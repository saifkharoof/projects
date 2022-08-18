<?php
require 'DB conection.php';

$sql20 = "SELECT * FROM category";
$statement20 = $pdo->prepare($sql20);
$statement20->execute();
$data200= $statement20->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$sql = 'INSERT into product values (:id,:title, :image, :price,:description, :category_id, :reviews,:image2,:image3,
:new,:new)';

$statement = $pdo->prepare($sql);
$id;
$reviews = null;
$statement -> bindParam(':id' , $id , PDO:: PARAM_INT);
$statement -> bindParam(':title' , $_POST['title'] , PDO:: PARAM_STR);
$statement -> bindParam(':image' , $_POST['image'] , PDO:: PARAM_STR);
$statement -> bindParam(':price' , $_POST['price'] , PDO:: PARAM_INT);
$statement -> bindParam(':description' , $_POST['description'] , PDO:: PARAM_STR);
$statement -> bindParam(':category_id' , $_POST['category_id'] , PDO:: PARAM_INT);
$statement -> bindParam(':reviews' , $reviews , PDO:: PARAM_STR);
$statement -> bindParam(':image2' , $_POST['image2'] , PDO:: PARAM_STR);
$statement -> bindParam(':image3' , $_POST['image3'] , PDO:: PARAM_STR);
$statement -> bindParam(':new' , $_POST['new'] , PDO:: PARAM_STR);
$statement -> bindParam(':new' , $_POST['new'] , PDO:: PARAM_STR);
$statement -> execute();
$pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/regisiter.css">
    <meta charset="UTF-8">
    <title>pc components</title>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
    @media (max-width: 800px) {

        .active11 {
            top: 7%;
            z-index: 3;
        }

    }
    </style>
</head>

<body>
    <?php 
 session_start();
        if(isset($_SESSION['email']) && isset($_SESSION['admin']) && $_SESSION['admin'] == 'yes'){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
        if($_SESSION['admin'] != 'yes') {
            header("Location: ../index.php");
        }
 ?>


    <section class="container">

        <h2>Add products</h2>
        <form action='products page.php' method='post'>
            <div class="text">

                <label for="product_title">title of the product</label>
                <input type="text" id="product_title" placeholder="The title..." name="title">

            </div>
            <div class="text">

                <label for="imagess">put the path of the picture in the device</label>
                <input type="text" id="imagess" placeholder="images/..." name="image">

            </div>

            <div class="text">

                <label for="price">Price</label>
                <input type="text" id="price" placeholder="The price..." name='price'>

            </div>
            <div class="text">

                <label for="description">description</label>
                <input type="text" id="description" placeholder="The description..." name="description">

            </div>

                <?php foreach($data200 as $row){ ?>
                <label class='test' style='margin:1.2rem;'><?php echo $row['name'];?></label>
                <input type="radio" class="cat1" name="category_id" value = '<?php echo $row['c_id'];?>'>
                <?php }?>


            <div class="text">

                <label for="imagess2">put the path of the second picture in the device</label>
                <input type="text" id="imagess2" placeholder="images/..." name="image2">

            </div>

            <div class="text">

                <label for="imagess2">put the path of the third picture in the device</label>
                <input type="text" id="imagess3" placeholder="images/..." name="image3">

            </div>



            <label for="arrived" class='test' style='margin:1.2rem;'>arrived</label>
            <input type="radio" id="arrived" name="arrived" value='yes'>
            <label for="not-arrived" class='test' style='margin:1.2rem;'>not-arrived</label>
            <input type="radio" id="not-arrived" name="arrived" value='no'>

            <br>

            <label for="offered" class='test' style='margin:1.2rem;'>offered</label>
            <input type="radio" id="offered" name="new" value='yes'>
            <label for="not-offered" class='test' style='margin:1.2rem;'>not-offered</label>
            <input type="radio" id="not-offered" name="new" value='no'>




            <div class="text">

                <input type="submit" value="Submit">

            </div>

        </form>

    </section>


    <?php include 'footer.php'?>
</body>



</html>