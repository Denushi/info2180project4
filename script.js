/*$(document).ready(function () {


  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  */

window.onload=function(){
  document.getElementById("compose").onclick= compose_message;
  document.getElementById("inbox").onclick=inbox;
  document.getElementById("add").onclick=add;
}

function home()
{
	var defaultPanel=[
	'<img src="cm_logo.png" alt="Yuh Frigga yuh!" style="width:304px;height:228px;">'].join('');
	document.getElementById("container").innerHTML = defaultPanel;
}

function compose_message(){
	var compose_panel=[
		'<div id="compose" class="tab-pane fade in active">',
        'To:<br><textarea name="to" id="to" cols="100" placeholder="Enter addresses separated by commas" rows="1"></textarea><br><br>',
        'Subject:<br><textarea name="subject" id="subject" cols="100" placeholder="Enter subject here" rows="1"/></textarea><br><br>',
        'Message:<br><textarea name="message" id="message" cols="100" rows="15" placeholder="Enter Message Here!"></textarea>',
        '<br><br>',
        '<input type="Button" id="send" value="Send"/>',
  		'</div>'		
	].join('');
	document.getElementById("container").innerHTML = compose_panel;
	document.getElementById("send").onclick = send_message;	
}

function send_message()
{    
    var recipient = document.getElementById("to").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    var request = "to="+recipient+"&subject="+subject+"&message="+message;
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("post","send.php",true);
    xmlHttp.onreadystatechange = function()
    {
    	if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            var responseMessage = xmlHttp.responseText;
            alert(responseMessage);
            home();
        }
    };
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", request.length);
   	xmlHttp.setRequestHeader("Connection", "close");
    
    
    xmlHttp.send(request);
    
}


function inbox()
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    {
        if(xmlHttp.readyState==4 && xmlHttp.status==200)
        {
            var response = xmlHttp.responseText;
            //alert(response);
            document.getElementById("container").innerHTML= response;
        }
    };
    xmlHttp.open("post","list.php",true);
    xmlHttp.send();
}

function read()
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
           
            // document.getElementById("pagecontent").innerHTML= responseMessage;
        }
    };
    xmlHttp.open("GET","read_message.php",true);
    xmlHttp.send();
    
}


function add(){
	add_user=
	[
	'<p>Add friends or family as CheapoMail users to share and send message with</p>',
	'<p class="extra"><h3>Please add new User below!</h3></p>',
	'<div id="div1">',
	'<fieldset id= "form">',
	'<legend class="extra">ADD NEW USER</legend>',
	'<form>',
	'First Name:<input type="text" id="fname" name="firstname" placeholder="First Name" required/><br><br>',
	'Last Name:<input type="text" id ="lname"name="lastname" placeholder="Surname" required/><br><br>',
	'Username:<input type="text" id="uname"name="username" placeholder="Username" required/><br><br>',
	'Password:<input type="password" id="pword" name="password" placeholder ="Password" required title ="Password should have at least one capital letter, one number and should be at least 8 characters long"/><span><?php echo $passErr;?></span><br> <br>          ',
	'Type:   <select name="type" id="type" name="type">',
	'<option value="user">Standard User</option>',
	'<option value="admin">Administrator</option>',
	'</select> ',
	'<br><br>',
	'</a><input type="Button" id ="submit" name="submit" value="Add User Now!"/>',
	'</form>',
	'</fieldset>',
	'</div>',
].join('');
document.getElementById("container").innerHTML=add_user;
document.getElementById("submit").onclick=new_user;
}

function new_user()
{
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var username = document.getElementById("uname").value;
    var password = document.getElementById("pword").value;
    var type = document.getElementById("type").value;
    var request = "fname="+fname+"&lname="+lname+"&username="+username+"&password="+password+"&type="+type;
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("post","database.php",true);
    xmlHttp.onreadystatechange = function()
    {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            var responseMessage = xmlHttp.responseText;
            alert(responseMessage);
            add();            
        }
    };
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", request.length);
    xmlHttp.setRequestHeader("Connection", "close");    
    xmlHttp.send(request);
}