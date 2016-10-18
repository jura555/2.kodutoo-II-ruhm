<?php



	
require("../../config.php");
require("function.php");


if(isset($_SESSION["userId"])) {
		header("location: data.php");
	}


$signupEmailError = "";
$signupPasswordError = "";
$signupEmail = "";
$signupGender = "";
$signupUsername = "";
$signupUsernameError = "";
	
if( isset( $_POST["signupUsername"] ) ){
		

		if( empty( $_POST["signupUsername"] ) ){
			
			$signupEmailError = "See vali on kohustuslik";
			} else { 
			$signupUsername = $_POST["signupUsername"];
			
		}
		
	} 

	
	if( isset( $_POST["signupEmail"] ) ){
		if( empty( $_POST["signupEmail"] ) ){
			$signupEmailError = "See vali on kohustuslik";
			} else {
			$signupEmail = $_POST["signupEmail"];
			
		}
		
	} 




if( isset( $_POST["signupPassword"] ) ){
		
		if( empty( $_POST["signupPassword"] ) ){
			
			$signupPasswordError = "Parool on kohustuslik";
			
		} else {

			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vahemalt 8 tahemarkki pikk";
			
			}
			
		}
		
	}
	
	

	

	
	if ( isset($_POST["signupEmail"]) && 
		 isset($_POST["signupPassword"]) && 
		 isset($_POST["signupUsername"]) &&
		 $signupEmailError == "" && 
		 empty($signupPasswordError)
		) {
		
		echo "Salvestan... <br>";
		echo "username: ".$signupUsername."<br>";
		echo "email: ".$signupEmail."<br>";
		echo "password: ".$_POST["signupPassword"]."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "password hashed: ".$password."<br>";
		

		signUp($signupEmail, $password, $signupUsername);
		
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>

<html>
<body>

<h1>Loo kasutaja </h1>
	<form method="POST">
	
		<label>Username</label>
		<br>

		<input name="signupUsername" type="text" value="<?=$signupUsername;?>"> <?=$signupUsernameError;?>
		<br><br>
	
		<label>E-post</label>
		<br>
		
		<input name="signupEmail" type="text" value="<?=$signupEmail;?>"> <?=$signupEmailError;?>
		<br><br>
		

		<br>
		<input type="password" name="signupPassword" placeholder="Parool"> <?php echo $signupPasswordError; ?>
		<br><br>
		
		<input type="submit" value="Loo kasutaja"><br>
		
		
	</form>

	<a href="login.php">
		<button>Logi sisse</button>
		</a>
	
</body>
</html>