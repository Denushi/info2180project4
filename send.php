<?php
  include('session.php');
  $rec = $_POST["to"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $recipientArray = explode(',', $rec);
  $valid=true;

  $con=mysql_connect("localhost","root", "Mightyena1");
  $db = mysql_select_db("CheapoMail", $con);
  if (!$con) 
  {
  	echo "Connection failed";
  	return false;
  }

  if(isset($_SESSION['logged_in']))
  {
    foreach($recipientArray as $recipient)
    {
      $senderquery =  "select id from User where username='$_SESSION[logged_in]';";
      $recipientquery =  "select id from User where username='$recipient';";
      $senderresponse = mysql_query($senderquery,$con);
      $receiverresponse = mysql_query($recipientquery,$con);
      if(mysql_num_rows($receiverresponse) == 0)
      {
        if(sizeof($recipientArray)>1)
        {
          echo "$recipient is an invalid address\n\n";
          $valid=false;
        }
        else
        {
          echo "Invalid address";
          $valid=false;
        }
      }
      else
      {    
        while($row=mysql_fetch_array($senderresponse))
        {
          while($row2=mysql_fetch_array($receiverresponse))
          {
            $sql = "insert into Message (body,subject,user_id,recipient_id,flag) values ('$message','$subject','$row[id]','$row2[id]','unread');";
            mysql_query($sql,$con);     				
          }
        }

      }
    } 
    if($valid==true && sizeof($recipientArray)==1)
    {
      echo "Congrats!! Your message has been sent!";
    }  
    else if($valid==true && sizeof($recipientArray)>1)
    {
      echo "Congrats!! Your messages have been sent!";
    }
    else if($valid==false && sizeof($recipientArray)>1)
    {
      echo "Messages sent to valid addresses only";
    }   
  }
  else
  {
    echo "No session";
  }
?>