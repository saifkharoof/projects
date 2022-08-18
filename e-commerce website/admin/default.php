<?php 

require 'DB conection.php'; 
$sql = "SELECT * FROM product ";
$statement = $pdo->prepare($sql);
$statement->execute();
$data= $statement->fetchAll();

$sql2 = "UPDATE `product` SET `newarrival`= :newarrival,`newoffers`=:newoffer WHERE id = :id";
$statement2 = $pdo->prepare($sql2);
$statement2->bindParam(':newarrival', $_POST['arrived'], PDO::PARAM_STR);
$statement2->bindParam(':newoffer', $_POST['new'], PDO::PARAM_STR);
$statement2->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
$statement2->execute();


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
        if(isset($_SESSION['email']) && isset($_SESSION['admin']) && $_SESSION['admin'] == 'yes'){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
        if($_SESSION['admin'] != 'yes') {
            header("Location: ../index.php");
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

            <h2>Add products status "choose a max number of four choises"</h2>

            <div id="new-arrivals">

                <?php foreach($data as $row){ ?>
                <a href='product-showcase.php?id=<?php echo $row['id'];?>' class='click'>
                    <div class="img">

                        <img src="<?php echo $row['image'];?>" class="img2" alt='<?php echo $row['image'];?>'>
                        <span> <?php echo $row['title'];?> </span>
                        <span> <?php echo $row['price']; ?> </span>

                        <form action='default.php' method='post'>

                            <input type = 'hidden' value = '<?php echo $row['id'];?>' name = 'id'>
                            <span id='arrival'> new arrival</span>
                            <label for="arrived">arrived</label>
                            <input type="radio" id="arrived" name="arrived" value='yes'>
                            <label for="not-arrived">not-arrived</label>
                            <input type="radio" id="not-arrived" name="arrived" value='no'>

                            <br>

                            <span id='offers'> new offers</span>
                            <label for="offered">offered</label>
                            <input type="radio" id="offered" name="new" value='yes'>
                            <label for="not-offered">not-offered</label>
                            <input type="radio" id="not-offered" name="new" value='no'>

                            <div id='submitition'>

                                <input type="submit" value="Submit">

                            </div>
                        
                    </div>
                    </form>
                </a>
                <?php } ?>

            </div>

        </section>
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