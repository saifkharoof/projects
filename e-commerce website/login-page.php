<?php
	session_start();
	$msgBox = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		require "DB conection.php";

		$sql = "SELECT * FROM customer WHERE email = :email AND pass_word = :pass_word AND admin=:admin";

		$email = $_POST["email"];
		$pass_word = $_POST["pass"];	
        $admin = $_POST["admin"];

		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		$statement->bindParam(':pass_word', $pass_word, PDO::PARAM_STR);
        $statement->bindParam(':admin', $admin, PDO::PARAM_STR);
		$statement->execute();
		$data = $statement->fetch();
		$pdo = null;

      
        
		if(!$data && !isset($_POST["admin"])){
			$msgBox = "<script>alert('error')</script>";
		}else{
			$_SESSION['email'] = $data["email"];
            $_SESSION['admin'] = $data["admin"];
		}
	}


	if(isset($_SESSION['email']) && $admin == 'no'){
		header("Location: index.php");
		
	} else if (isset($_SESSION['email']) && $admin == 'yes') {
        header("Location: admin/default.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width = device-width , initial-scale =1.0">
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

                <form action='login-page.php' method='post'>
                    <div class="text">

                        <label for="email">Email</label>
                        <input type="email" id="emai" placeholder="Your email...." name='email'>

                    </div>

                    <div class="text">

                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" placeholder="Your last name..">

                    </div>
                    <div class="text">

                        <label for="admin">admin</label>
                        <input type="radio" id="admin" name="admin" value = 'yes'>
                        <label for="not-admin">not-admin</label>
                        <input type="radio" id="not-admin" name="admin" value = 'no'>

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