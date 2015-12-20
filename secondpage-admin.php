<?php
  include('session.php');
?>

<!doctype html>
<html>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css" type ="text/css">
   <script src="script.js" type ="text/javascript"></script>
   <title>CheapoMail - <?php echo $login_name; ?></title>
</head>
<body>
   <div id= "head">
    <span>
   <strong>CheapoMail: Messages</strong>
   </span>
   
   <div id ="but">  
   Hello <strong><?php echo $login_name; ?></strong>!! 
   <a id ="adm" href="page.php">Add User</a>
   <a href ="logout.php">Log Out</a>
   </div>
   </div>
      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                
                <li id ="compose">
                    <a data-toggle="tab">Compose</a>
                </li>
                <li id ="inbox">
                    <a data-toggle="tab">Inbox</a>
                </li>
                <li id = "add">
                    <a data-toggle="tab">Add New User</a>
                </li>
              </ul>
        </nav>
       
   </div>
      
<div class="container" id="container">
<img src="cm_logo.png" alt="Image could not be displayed" style="width:50%;height:50%;">
</div>

</body>
</html>
