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
        $messageid=$_POST["id"];
		$username = $user;
		$messagequery =  "select * from Message where id = '$messageid'";
		$messageinfo = mysql_query($messagequery,$con);
		while($row=mysql_fetch_array($messageinfo))
		{
			$message_body= $row['body'];
			$message_subject= $row['subject'];
			$messagesender= $row['user_id'];
			$flag = $row['flag'];
			//echo $flag;

			$sender_namequery = "select firstname from User where id = '$messagesender'";			
		    $sender_query=mysql_query($sender_namequery,$con);
		    $sender=mysql_fetch_array($sender_query);
		   	echo "<div class='read_zoom'>";
		    echo "<div class='top-form'><strong>Subject: </strong>".$message_subject."</div><br>"; 		    
		    echo "<div class='top-form'><strong>Sender: </strong>".$sender['firstname']."</div>";
		    echo "<hr id='hr'>";
		    echo "<p id='message_body'>".$message_body."</p>";
		    echo "</div>";
		    echo "<br>";
		    echo "<div>";
		    echo "<input type=\"Button\" id=\"back\" value=\"Return to Inbox\"/>";
		    echo "</div>";
		 }
		
		if(strcmp($flag,"unread")==0)
		{
		    $useridstring =  "select id from User where username = '$username'";
		    $useridquery = mysql_query($useridstring,$con);
		    while($row2=mysql_fetch_array($useridquery))
		    {
		        $date = date("Y/m/d");
		        $userid=$row2['id'];
		        $sql= "insert into Message_Read (message_id,reader_id,r_date,flag) values ('$messageid','$userid','$date','read');";
		  		$sql2 = "update Message set flag='read' where id='$messageid';";     
		        if (!mysql_query($sql,$con) || !mysql_query($sql2,$con))
		        {
  					    echo "ERROR";
  				}
  				else
  				{
  					mysql_query($sql,$con);
  					mysql_query($sql2,$con);
  				}

		    }
		    
		}
	}
	else
	{
	    echo "Not logged in";
	}
?>