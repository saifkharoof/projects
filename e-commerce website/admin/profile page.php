<?php
session_start();
if(isset($_SESSION['email'])){

    require 'DB conection.php';
    $sql2 = 'SELECT * FROM customer,orders WHERE email = :email';
    $statemnet2 = $pdo->prepare($sql2);
    $statemnet2 -> bindParam(':email' ,$_SESSION['email'] , PDO::PARAM_STR);
    $statemnet2 -> execute();
    $row = $statemnet2->fetch();

    $pdo = null;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/accordion.css">
    <script src="home-btn-effect.js"></script>
    <title><?php  echo $row['fname'] . " " . $row['lname'];?></title>
    <meta name="author" content="saif edeen kharouf">

</head>  

<body>
<?php

if(isset($_SESSION['email'])){
    require 'header - logged-in.php';
}else{
    require 'header - not-logged-in.php';
}
?>
            <main>

                <h1>Profile</h1>
                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                    account info
                                </div>
                                <div class="content">
                                   
                                    <span id="tex">
                                        <p class="text"> first name:<?php  echo $row['fname'];?></p>
                                        <p class="text"> last name: <?php  echo $row['lname'];?> </p>
                                        <p class="text"> email: <?php  echo $row['email'];?></p>
                                        <p class="text"> phone number: <?php  echo $row['phone_number'];?></p>
                                        <p class="text"> address: <?php  echo $row['address'];?></p>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                    orders
                                </div>
                                <div class="content">

                                    <span id="tex">
                                    <p class="text"> reference number: <?php  echo $row['session_id'];?> </p>
                                    <p class="text">current order: <?php  echo $row['statuss'];?></p>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>

            </main>

            <script>
                const accordion = document.getElementsByClassName('container');

                for (i = 0 ; i < accordion.length; i++) {
                    accordion[i].addEventListener('click' ,function() {

                        this.classList.toggle('active')
                        
                    })
                }
            </script>


<?php include 'footer.php' ?>
</body>



</html>