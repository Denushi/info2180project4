<?php

include_once("functions.php");

if(login($_POST)){
	$_SESSION["logged_in"] = true;
	$_SESSION["username"] = $_POST['username'];
	redirect('../page2.php');
} else {
	redirect('../index.php?e=Username%20or%20password%20is%20incorrect.');
}

exit;
?>