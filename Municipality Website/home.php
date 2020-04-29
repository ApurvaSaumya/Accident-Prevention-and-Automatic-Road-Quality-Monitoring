<?php session_start(); if(isset($_SESSION['uname']))
		{?>


<!DOCTYPE html>
<html>
<head>
	<title>Road Monitoring</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
  	<style type="text/css">
  		#mon:hover{
  			transform: scale(1.2); 
  		}
  		#man:hover{
  			transform: scale(1.2); 
  		}
  	</style>
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1529186405194-c57220dec7c0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1060&q=80);background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="jumbotron" style="text-align: center;margin-top: 15%;background-color: rgba(0,0,0,0.6);border-radius: 20px;">
			<h1 style="font-family: 'baloo';color: white;">POTHOLE MONITORING</h1> <br><br>
			<form method="POST" action=""><input type="submit" name="sub" value="Logout" class="btn btn-sm btn-danger"></form>
		</div>
		<div style="height: 200px;">
			<a href="monitor.php"><div id="mon" style="font-weight: bolder;color:white;text-align: center;float: left;width: 50%;height: 100%;background-image: url(https://images.unsplash.com/photo-1501459522532-9f67219c9c7a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80);background-size: cover;background-repeat: no-repeat;background-position: center;border-radius: 20px;">  <h2>Road Monitoring Reports</h2></div></a>
			<a href="manage.php"><div id="man" style="border-radius: 20px;color: white;font-weight: bolder;text-align:center;float: right;width: 50%;height: 100%;background-image: url(https://images.unsplash.com/photo-1424746219973-8fe3bd07d8e3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60);background-position: center;background-repeat: no-repeat;background-size: cover;"><h2>Manage Reports</h2></div></a>
		</div>
	</div>

</body>
</html>
<?php }  
if(isset($_POST['sub']))
{
session_destroy();
			unset($_SESSION['uname']);
			header('Location:login.php');
		}
?>