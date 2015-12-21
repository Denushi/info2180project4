<?php
	include('session.php');
	$con=mysql_connect("localhost","root","Mightyena1");
	$db = mysql_select_db("CheapoMail",$con);
	$x=0;
	$y=0;
	$unread=0;
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
			while($row2=mysql_fetch_array($messagequery))
			{
				$flag= $row2['flag'];
				if (strcmp($flag,"unread")==0)
			    {
					$unread=$unread+1;
				}
			}		

			echo '<h1 id="inbox-header">View up to 10 of your most recent messages here:<br>Unread messages are displayed in bold red font.</h1><br>';
			echo '<h1 id="inbox-header">Unread messages: <span id="display">'.$unread.' </span></h1>';
			echo '<hr/>';
			echo '<table>';
			echo '<tr>';
			echo '<th>From</th>';
			echo '<th>Subject</th>';
			echo '<th>Body</th>';
			echo '</tr>';

			$messagestring="select * from Message where recipient_id ='$id' order by id desc;";
			$messagequery = mysql_query($messagestring,$con);

			while($row2=mysql_fetch_array($messagequery))
			{
				$y=$x+1;
			    $sender = $row2['user_id'];
			    $messageid = $row2['id'];
			    $flag= $row2['flag'];
			    
			    $senderstring =  "select username from User where id = '$sender'";
			    $senderquery = mysql_query($senderstring,$con);
			    while($row3=mysql_fetch_array($senderquery))
			    {
			        $sender_username= $row3['username'];
			    }
			    if($x<10)
			    {
			    	if (strcmp($flag,"unread")==0)
			    	{
						echo '<tr class="message-row" id="'.$messageid.'" onclick="read_message('.$messageid.');">';
						echo '<td class="unread">'.$sender_username.'</td>';
						echo '<td class="unread">'.$row2['subject'].'</td>';
						echo '<td class="unread">'.$row2['body'].'</td>';
						echo '</tr>';						
					}
					else
					{
						echo '<tr class="message-row" id="'.$messageid.'" onclick="read_message('.$messageid.');">';
						echo '<td class="read">'.$sender_username.'</td>';
						echo '<td class="read">'.$row2['subject'].'</td>';
						echo '<td class="read">'.$row2['body'].'</td>';
						echo '</tr>';
					}
				}
				$x=$x+1;
			}
		}
	}
	else
	{
	    echo "Not logged in";
	}
?>
</table>
