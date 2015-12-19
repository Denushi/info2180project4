<?php
	include('capture.php');
	if(isset($_SESSION['logged_in']))
	{
		if($type == "admin")
		{
			header("Location: secondpage-admin.php");
		}
		else
		{
			header("Location: secondpage.php");
		}
	}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cheapomail Home</title>

    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
	<link href="login.css" rel="stylesheet">

	  
  </head>
  <body>	
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $username;?>" required><span class="error">*</span>
									</div>
									<br>
									<br>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $password;?>" required><span class="error">* <?php echo $passErr;?></span>
									</div>
									<br>
									<br>
									<br>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login" >
											</div>
										</div>
									</div>
									<br>
									<br>																		
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
 <script src="jquery.min.js"></script>
     <script src="bootstrap.min.js"></script>
	 
	  <script src="login.js"></script>
	  <script src="static/js/register.js"></script>
  </body>
</html>