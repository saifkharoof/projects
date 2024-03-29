<?php
	session_start();
	$msgBox = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		require "DB conection.php";

		$sql = "SELECT * FROM customer WHERE email = :email AND pass_word = :pass_word";

		$email = $_POST["email"];
		$pass_word = $_POST["pass"];	

		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		$statement->bindParam(':pass_word', $pass_word, PDO::PARAM_STR);
		$statement->execute();
		$data = $statement->fetch();
		$pdo = null;

		if(!$data){
			$msgBox = "<script>alert('error')</script>";
		}else{
			$_SESSION['email'] = $data["email"];
           $_SESSION['admin'] = $_data['admin'];
		}
	}

	if(isset($_SESSION['email'])){
		header("Location: index.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name = "viewport" content = "width = device-width , initial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/login.css">
    <title>login</title>
    <meta name="author" content="saif edeen kharouf">
    <meta charset="UTF-8">
    <script src="home-btn-effect.js"></script>
</head>  

<body>
<?php 

        if(isset($_SESSION['email'])){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
        
        
 ?>

<section>
        <span>
            <h2>Login</h2>

                <div class="container">

                <form action ='login-page.php' method='post'>
                    <div class="text">
                                    
                                    <label for="email">Email</label>
                                    <input type="email" id="emai" placeholder="Your email...." name = 'email'>
                                    
                    </div>

                <div class="text">
                                
                                    <label for="pass">Password</label>
                                    <input type="password" id="pass" name="pass" placeholder="Your last name.." >
                                
                </div>

                <div class="text">

                    <input type="submit" value="Submit">

                </div>
                <?php echo $msgBox ?>
            </span>

                </form>
</div>

</section>

<?php include 'footer.php'?>

</body>



</html>