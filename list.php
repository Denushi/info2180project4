<style>
	.unread{
  		
  		font-weight: bolder;
  		color: red;
  		font-family: arial-black;
	}

	.read{
		font-weight: normal;
		color: black;
	}

	.header{
		font:40px bold arial-black;
	}
</style>

<table>
	<tr>
		<th class="header">From</th>
		<th class="header">Subject</th>
		<th class="header">Body</th>
	</tr>

<?php
	include('session.php');
	$con=mysql_connect("localhost","root","Mightyena1");
	$db = mysql_select_db("CheapoMail",$con);
	$x=0;
	if (!$con)
	{
		echo "Connection failed";
		return false;
	}

	if(isset($_SESSION['logged_in']))
	{
		$username = $user;
		$userquery =  "select id from User where username ='$username'";
		$userresponse = mysql_query($userquery,$con);
		while($row=mysql_fetch_array($userresponse))
		{
			$id=$row['id'];
		
		}
		
		$messagestring="select * from Message where recipient_id ='$id' order by id desc;";
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
		    if($x<10)
		    {
				echo '<tr onclick="read_message;">';
				echo '<td class="unread">'.$sender_username.'</td>';
				echo '<td class="unread">'.$row2['subject'].'</td>';
				echo '<td class="unread">'.$row2['body'].'</td>';
				echo '</tr>';
			}
			$x=$x+1;
		}
	}else{
	    echo "Not logged in";
	}
?>
</table>
