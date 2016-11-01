<?php

require("function.php");

if (!isset($_SESSION["userId"])) {
	header("Location: login.php");
	exit();

}
if(isset($_GET["logout"])) {
	session_destroy();
	header("location: login.php");
	exit();
}
$error = "";
if ( isset($_POST["activity"]) && isset($_POST["day"]) && 
	!empty($_POST["activity"]) && !empty($_POST["day"]) &&
	isset($_POST["time"]) && !empty($_POST["time"])) {
		  
	addWish($_POST["activity"], $_POST["day"], $_POST["time"]);
		  
	}

?>

<h1><h1>

<p>TERE TULEMAST <?=$_SESSION["userUsername"];?>
<a href="?logout=1"> Logi Valja</a>
</p>


<form method="POST">
<p>Vali tegevus</p>
<div class="styled-select">
   <select name="activity">
      <option>Korvpall</option>
      <option>Jalgpall</option>
	  <option>Jousaal</option>
   </select>
</div>
<p>Vali aeg</p>
<div class="styled-select">
   <select name ="time">
      <option>19:00-21:00</option>
      <option>17:00-19:00</option>
	  <option>18:00-20:00</option>
   </select>
</div>
<p>Vali paev</p>
<div class="styled-select">
   <select name="day">
      <option>Esmaspaev</option>
      <option>Teisipaev</option>
	  <option>Kolmapaev</option>
	  <option>Neljapaev</option>
	  <option>Reede</option>
	  <option>Laupaev</option>
	  <option>Puhapaev</option>
   </select>
</div>
<br>
<input type="submit" value="Submit"><br>
</form>

