<?php
	require("../../config.php");

	session_start();
	
	
	function signUp ($email, $password, $username) {
		
		$error = "";

		
		$database = "if16_juri";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		$stmt = $mysqli->prepare("INSERT INTO kodutooo (email, password, username) VALUES (?, ?, ?)");
	
		echo $mysqli->error;
		
		$stmt->bind_param("sss", $email, $password, $username);
		
		if($stmt->execute()) {
			echo "salvestamine onnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	
	function login ($email, $password) {
		
		$database = "if16_juri";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		$stmt = $mysqli->prepare("
		SELECT id, email, password, username, created 
		FROM kodutooo
		WHERE email = ?");
	
		echo $mysqli->error;
		
		
		$stmt->bind_param("s", $email);
		
	
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $usernameFromDb, $created);
		$stmt->execute();
		

		if($stmt->fetch()){
			

			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb) {
				echo "Kasutaja logis sisse ".$id;
				$_SESSION["userId"]= $id;
				$_SESSION["userEmail"]= $emailFromDb;
				$_SESSION["userUsername"]=$usernameFromDb;
				
				header("Location: data.php");
			
			
			
			
			}else {
				$error = "vale parool";
			}
			
			
		} else {
			
		
			$error = "ei ole sellist emaili";
		}
		
	return $error;	
	}

function addWish ($activity, $time, $day) {
		
		$error = "";

		
		$database = "if16_juri";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		$stmt = $mysqli->prepare("INSERT INTO huvi_data (activity, time, day, username) VALUES (?, ?, ?, ?)");
	
		echo $mysqli->error;
		
		$stmt->bind_param("ssss", $activity, $time, $day, $_SESSION["userUsername"]);
		
		echo $mysqli->error;
		
		if($stmt->execute()) {
			echo "salvestamine onnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		$mysqli->close();
		
	}

















?>