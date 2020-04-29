<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1529186405194-c57220dec7c0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1060&q=80);background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="jumbotron" style="text-align: center;margin-top: 15%;background-color: rgba(0,0,0,0.6);border-radius: 20px;">
			<h1 style="font-family: 'baloo';color: white;">POTHOLE MONITORING</h1><br><br>
			<table class="table table-hover" style="color: white;">
				<form method="POST" action="">
					<tr>
						<td>Enter Username</td>
						<td><input type="text" name="uname" placeholder="Enter Username"></td>
					</tr>
					<tr>
						<td>Enter Password</td>
						<td><input type="password" name="pass" placeholder="Enter password"></td>
					</tr>
					<tr><td colspan="2"><input type="submit" value="Login" name="sub" class="btn btn-md btn-success"></td></tr>
			</form>
			</table>
			
		</div>
	</div>

</body>
</html>

<?php

session_start();

if(isset($_POST['sub']))
{
	if($_POST['uname']=="admin" && $_POST['pass']=="1234")
	{
		$_SESSION['uname']=$_POST['uname'];
		header("Location:home.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
	}
}
?>