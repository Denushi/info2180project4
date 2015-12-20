<!--Group members

Michael-Shane Brown - 620054354
Denton McLaren - 620071262
Danielle Blake - 620081194-->
<?php
	session_start();
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: index.php"); // Redirecting To Home Page
	}
?>