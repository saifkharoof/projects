<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/regisiter.css">
    <meta charset="UTF-8">
    <title>regestration</title>
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
    @media (max-width: 800px) {

        .active11 {
            top: 9%;
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

    <section class="container">

        <h2>Registration</h2>
        <form action='regesiter-inserting.php' method='get'>
            <div class="text">

                <label for="password">password</label>
                <input type="password" id="password" placeholder="Your password.." name="pass">

            </div>
            <div class="text">

                <label for="email">email</label>
                <input type="email" id="email" placeholder="Your email...." name="email">

            </div>



            <a href="#addinfo" id="extrainfo">additional info</a>

            <div id='addinfo'>

                <div class="text">

                    <label for="phone-number">Phone number</label>
                    <input type="tel" id="phone-number" placeholder="Your number.." name='phone-number'>

                </div>
                <div class="text">

                    <label for="fname">First Name</label>
                    <input type="text" id="fname" placeholder="Your name.." name="fname">

                </div>

                <div class="text">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" placeholder="Your last name.." name="lname">

                </div>


                <div class="text">

                    <label for="address">address</label>
                    <textarea id="address" name="address" placeholder="Write something.." style="height:200px"
                        name="address"></textarea>

                </div>


                <a href="#" id="lessinfo">Less info</a>

            </div>

            <div class="text">

                <input type="submit" value="Submit">

            </div>

        </form>

    </section>

    <?php  include 'footer.php'?>

</body>



</html>