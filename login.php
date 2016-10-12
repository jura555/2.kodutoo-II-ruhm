<?php

require("../../config.php");
require("function.php");

if(isset($_SESSION["userId"])) {
		header("location: data.php");
	}

	
	$error = "";
	if ( isset($_POST["loginEmail"]) && isset($_POST["loginPassword"]) && 
		!empty($_POST["loginEmail"]) && !empty($_POST["loginPassword"])	  ) {
		  
		$error = login($_POST["loginEmail"], $_POST["loginPassword"]);
		  
	}
	
	
	
	
	
	
	
	
	














?>


<!DOCTYPE html>
<html>
<head>
	<title> Logi sisse </title>
</head>
<body>
	<h1> Logi sisse </h1>
	<form method="POST">
		
		<label>E-post</label>
		<br>
		
		<input name="loginEmail" type="text">
		<br><br>
		
		<input type="password" name="loginPassword" placeholder="Parool">
		<br><br>
		
		<input type="submit" value="Logi sisse">
		<br>
		<br>
	</form>

	<a href="create.php">
		<button>Loo kasutaja</button>
	</a>
</html>
