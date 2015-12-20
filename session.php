<!--Group members

Michael-Shane Brown - 620054354
Denton McLaren - 620071262
Danielle Blake - 620081194-->
<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$conn = mysql_connect("localhost", "root", "Mightyena1");
	// Selecting Database
	$db = mysql_select_db("CheapoMail", $conn);
	session_start();// Starting Session
	// Storing Session
	$user=$_SESSION['logged_in'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select username from User where username='$user'", $conn);
	$row = mysql_fetch_assoc($ses_sql);
	$name_sql=mysql_query("select firstname from User where username='$user'", $conn);
	$row2 = mysql_fetch_assoc($name_sql);
	$login_session = $row['username'];
	$login_name = $row2['firstname'];

	if(!isset($login_session))
	{
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>