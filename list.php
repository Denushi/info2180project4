<!--Group members

Michael-Shane Brown - 620054354
Denton McLaren - 620071262
Danielle Blake - 620081194-->
<?php
	include('session.php');
	$con=mysql_connect("localhost","root","Mightyena1");
	$db = mysql_select_db("CheapoMail",$con);
	$x=0;
	if (!$con)
	{
		echo "Connection failed\n";
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
		$amount=mysql_num_rows($messagequery);
		if($amount == 0)
		{
			echo '<div id = "error-div"><p id = "error">No messages to diplay</p></div>';
		}
		else
		{
			echo '<h1 id="inbox-header">View up to 10 of your most recent messages here:<br>Unread messages are displayed in bold red font.</h1>';
			echo '<hr/>';
			echo '<table>';
			echo '<tr>';
			echo '<th>From</th>';
			echo '<th>Subject</th>';
			echo '<th>Body</th>';
			echo '</tr>';

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
					echo '<tr class="message-row"onclick="read_message();">';
					echo '<td class="unread">'.$sender_username.'</td>';
					echo '<td class="unread">'.$row2['subject'].'</td>';
					echo '<td class="unread">'.$row2['body'].'</td>';
					echo '</tr>';
				}
				$x=$x+1;
			}
		}
	}else{
	    echo "Not logged in";
	}
?>
</table>
