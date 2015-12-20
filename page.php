<!--Group members

Michael-Shane Brown - 620054354
Denton McLaren - 620071262
Danielle Blake - 620081194-->
<!doctype html>
<html>
<head>
    <link rel=stylesheet type="text/css" href="page.css">
    <!--<script type="text/javascript" src="code.js"></script>-->
    <img src="https://cdn.vectorstock.com/i/composite/12,00/mail-and-phone-communication-vector-761200.jpg" style="width:128px;height:128px" alt="hllo";>
    <h1><strong><i>CheapoMail</i></strong> Add Page</h1> </p>
    <title>CheapoMail - Add New User</title>
</head>
<body>
    
    <p Add friends or family as CheapoMail users to share and send message with</p>
    <p class="extra"><h3>Please add new User below!</h3></p>
    <div id="div1">
    <fieldset id= "form">
        <legend class="extra">ADD NEW USER</legend>
        <form action="database.php" method="post">
            First Name:<input type="text" id="fname" name="firstname" placeholder="First Name" required/><br><br>
            Last Name:<input type="text" id ="lname"name="lastname" placeholder="Surname" required/><br><br>
            Username:<input type="text" id="uname"name="username" placeholder="Username" required/><br><br>
            PassWord:<input type="password" id="pword"name="password" placeholder ="Password" required title ="Password should have at least one capital letter, one number and should be at least 8 characters long"/><span><?php echo $passErr;?></span><br> <br>          
            Type:   <select name="type">
                        <option value="user">Standard User</option>
                        <option value="admin">Administrator</option>
                    </select> 
            <br><br>
            </a><input type="submit" id ="add" value="Add User Now!"/>
        </form>
    </fieldset>
    </div>
   
    
</body>
</html>