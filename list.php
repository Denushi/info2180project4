<table id="table_header">
	<tr>
		<th id ="header1">From</th>
		<th id ="header2">Subject</th>
		<th id ="header3">Body</th>
	</tr>

<?php
	include('session.php');
	$con=mysql_connect("localhost","root","Mightyena1");
	$db = mysql_select_db("CheapoMail",$con);
	if (!$con)
	{
		echo "Connection failed";
		return false;
	}

	if(isset($_SESSION['logged_in']))
	{
		$username = $user;
		echo $username;
		$userquery =  "select id from User where username ='$username'";
		$userresponse = mysql_query($userquery,$con);
		while($row=mysql_fetch_array($userresponse))
		{
			$id=$row['id'];
		
		}
		
		$messagestring="select * from Message where recipient_id ='$id';";
		$messagequery = mysql_query($messagestring,$con);
		while($row2=mysql_fetch_array($messagequery))
		{
		    $sender= $row2['user_id'];
		    
		    $senderstring =  "select username from User where id = '$sender'";
		    $senderquery = mysql_query($senderstring,$con);
		    while($row3=mysql_fetch_array($senderquery))
		    {
		        $sender_username= $row3['username'];
		    }
			echo '<tr onclick="read_message();">';
			echo "<td>".$sender_username."</td>";
			echo "<td>".$row2['subject']."</td>";
			echo "<td>".$row2['body']."</td>";
			echo "</tr>";
		}
	}else{
	    echo "Not logged in";
	}
?>
</table>
