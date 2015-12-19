<?php
	$servername = "localhost";
	$user = "root";
	$pass = "Mightyena1";
	$dbname = "CheapoMail";


	// Create connection
	$conn = mysqli_connect($servername, $user, $pass, $dbname);
	// Check connection
	if (!$conn) 
	{
	    die("Connection failed: " . mysqli_connect_error());
	}

	$fname = $_POST["firstname"];
	$lname = $_POST["lastname"];
	$uname = $_POST["username"];
	$pword = $_POST["password"];
	$type = $_POST["type"];

	if (isset($_POST['submit']))
	{

		if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST["password"]))
		{
	       		$passErr = "Password must have at at least one capital letter, at least one number and must be at least 8 characters long";
		}
		else
		{

			$sql = "insert into User (firstname,lastname,username,password,type) values ('$fname','$lname','$uname','$pword','$type')";

			if (mysqli_query($conn, $sql)) {
			    echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);

			redirect("secondpage-admin.php");

			function redirect($url) 
			{
			    ob_start();
			    header('Location: '.$url);
			    ob_end_flush();
			    die();
			}
		}
	}
?> 

