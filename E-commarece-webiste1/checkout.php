<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <title>checkout</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/checkout.css">
    <meta name="author" content="saif edeen kharouf">
    <script src="home-btn-effect.js"></script>
    <style>
        
        @media (max-width: 800px) {

            .active11{
                top:6%;
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

                <h1>checkout</h1>
                <?php if(!isset($_SESSION['email'])){ ?>
                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                 <h2> login or register </h2> 
                                </div>
                                <div class="content">
                                    <a href="login-page.php" class="btn-link" target="_blank">login</a>
                                    <a href="register.php" class="btn-link" target="_blank">register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                   <h2>delivery method</h2> 
                                </div>
                                <div class="content">

                                    <form class="enter">

                                        <label for ="fd"> <input type = "radio" name="del" id="fd" class="choice"> fast delivery             </label>
                                        <label for ="sd"><input type = "radio" name="del" id="sd" class="choice">  slow delivery (2-3 days)  </label>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                   <h2>payment method</h2> 
                                </div>
                                <div class="content">

                                    <form class="enter">
                                    <label for="cash"> <input type="radio" id="cash" name="pay" class="choice"> cash  </label>
                                    <label for="visa"><input type="radio" id="visa" name="pay" class="choice"> visa (not available now)  </label>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-body">
                        <div class="accordion">
                            <div class="container">
                                <div class="label">
                                  <h2>confirm order</h2>  
                                </div>
                                <div class="content">

                                    <a href="cart.php" target="_blank" class="btn-link">cart</a>

                                </div>
                            </div>
                        </div>
                    </div>
            </main>

<?php 
        include 'footer.php';
        ?>
</body>



</html>