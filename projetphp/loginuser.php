<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/loginn.css">
	<link rel="stylesheet" type="text/css" href="style/login.css">
<!--===============================================================================================-->
</head>
<body>
<?php

$dsn = 'mysql:host=localhost;dbname=gestiondev';
  $user = 'root';
  $pswrd = '';

    try{
        $con = new PDO($dsn, $user, $pswrd);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
       if(isset($_POST['btn'])){

		if (empty($_POST["nom_user"]) || empty($_POST["password_user"])) {
			echo "3mr le champ a7madi";
		}
		else{
			 $slct = "SELECT * FROM user_table WHERE nom_user = :nom_user and password_user = :password_user";
			 $prpr = $con->prepare($slct);
			 $prpr->execute(
				 array(
					 'nom_user'=>$_POST["nom_user"],
					 'password_user'=>$_POST['password_user']
				 )
				 );
      $count = $prpr->rowCount();
	  if($count>0){
		  $_SESSION["nom_user"] = $_POST["nom_user"];
		  header("location:dashboard.php");
	  }
	  else{
		  echo "Rak ghalt a7madi";
	  }
		}
	   }
    }
    catch(PDOException $e){
        echo "failed" . $e->getMessage();  
    }
?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="nom_user" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password_user" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
							<input type="submit" class="login100-form-btn" name="btn" value="sign in">
					</div>

					
				</form>

				<div class="login100-more" style="background-image: url('bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
</body>
</html>