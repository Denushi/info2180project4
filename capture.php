<!--Group members

Michael-Shane Brown - 620054354
Denton McLaren - 620071262
Danielle Blake - 620081194-->
<?php
	session_start();
	$passErr="";
	if (isset($_POST['submit']))
	{
		if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST["password"]))
		{
       		$passErr = "Password must have at at least one capital letter, at least one number and must be at least 8 characters long";
		}
	
		else
		{
			$username = $_POST["username"];
			$password = $_POST["password"];

						
			$servername = "localhost";
			$user = "root";
			$pass = "Mightyena1";
			$dbname = "CheapoMail";
			

			$conn = mysql_connect($servername, $user, $pass);		

			
			$db = mysql_select_db($dbname, $conn);

			
			$query = mysql_query("select * from User where password='$password' and username='$username';",$conn);

							
			$rows = mysql_num_rows($query);
			if ($rows == 1) 
			{
				$_SESSION['logged_in']=$username; // Initializing Session
				while($row=mysql_fetch_array($query))
				{
		    		$type= $row['type'];
		    	}
				if($type == "admin")
				{
					header("Location: secondpage-admin.php");
				}
				else
				{
					header("Location: secondpage.php");
				}
			}
		 	else 
		 	{
				$passErr = "Username or Password is invalid";
			}
			mysql_close($conn);
		}
	}
	
		/*redirect("secondpage.php");
		function redirect($url) 
		{
    		ob_start();
    		header('Location: '.$url);
    		ob_end_flush();
    		die();
		}*/		
	
?>