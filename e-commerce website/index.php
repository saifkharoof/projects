<?php 

require 'DB conection.php'; 
$sql = "SELECT * FROM product where newarrival = 'yes'";
$statement = $pdo->prepare($sql);
$statement->execute();
$data= $statement->fetchAll();

$sql2 = "SELECT * FROM product where newoffers = 'yes'";
$statement2 = $pdo->prepare($sql2);
$statement2->execute();
$data2= $statement2->fetchAll();
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/slider.css">
    <link rel="stylesheet" href="style/cards-mainhome.css">
    <meta charset="UTF-8">
    <title>homepage</title>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
    @media (max-width: 800px) {

        .active11 {
            top: 6%;
            z-index: 2;
        }

    }
    </style>
</head>

<body>

    <?php 
 session_start();
        if(isset($_SESSION['email']) && isset($_SESSION['admin'])){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
 ?>

    <main>
        <section id="main-content">
            <div class="slideshow-container">

                <div class="mySlides fade">

                    <img src="images/ram.png" style="width:100%" alt='ram'>

                </div>

                <div class="mySlides fade">


                    <img src="images/psu.jpg" style="width:100%" alt='psu'>

                </div>

                <div class="mySlides fade">


                    <img src="images/MOBO.jpg" style="width:100%" alt='MOBO'>

                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </section>


        <section id="products">


            <h2>new arrivals</h2>

            <div id="new-arrivals">

                <?php foreach($data as $row){ ?>
                <a href='product-showcase.php?id=<?php echo $row['id'];?>' class='click'>
                    <div class="img">

                        <img src="<?php echo $row['image'];?>" class="img2" alt='<?php echo $row['image'];?>'>
                        <span> <?php echo $row['title'];?> </span>
                        <span> <?php echo $row['price']; ?> </span>

                    </div>
                </a>
                <?php } ?>

            </div>

            <h2>new-offers</h2>

            <div id="new-offers">
                <?php  foreach($data2 as $row2){ ?>
                <a href='product-showcase.php?id=<?php echo $row2['id'];?>' class='click'>
                    <div class="img">

                        <img src="<?php echo $row2['image'];?>" class="img2" alt='<?php echo $row2['image'];?>'>
                        <span> <?php echo $row2['title'];?> </span>
                        <span> <?php echo $row2['price'];?> </span>

                    </div>
                </a>
                <?php }?>

            </div>

        </section>>
    </main>

    <?php include 'footer.php'?>


    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.querySelector(".mySlides");
        var dots = document.querySelector(".dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 7000);
    }
    </script>
</body>



</html>