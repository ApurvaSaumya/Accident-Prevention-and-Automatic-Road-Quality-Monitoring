<?php session_start(); if(isset($_SESSION['uname']))
		{?>

<!DOCTYPE html>


<html>
<head>
	<title>Road Monitoring</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="10; url=/pothole/monitor.php">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1529186405194-c57220dec7c0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1060&q=80);background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="jumbotron" style="text-align: center;margin-top: 12%;background-color: rgba(0,0,0,0.6);border-radius: 20px;">
			<h1 style="font-family: 'baloo';color: white;">POTHOLE MONITORING</h1> <br><br>
			<form method="POST" action=""><input type="submit" name="ma" value="Manage" class="btn btn-sm btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="sub" value="Logout" class="btn btn-sm btn-danger"></form>
		</div>
		<div style="background-color: rgba(0,0,0,0.6);">
		<table class="table table-hover" style="color: white">
        <th>S.No</th><th>Location</th><th>Depth</th><th>Status</th>
        <?php $conn = mysqli_connect("localhost","root","","pothole");
        $q = mysqli_query($conn,"SELECT * FROM sensors");
        $sr=1;
        	while($r = mysqli_fetch_assoc($q)){
        	if($r['depth']>17)
        	{
        	$loc = $r['lat']."+".$r['lon'];?>
        <tr>
          <td><?php echo $sr;$sr++;?></td>
          <td><a href="http://maps.google.com/maps?&z=15&mrt=yp&t=k&q=<?php echo $loc; ?>" target=_blank><button class="btn btn-sm btn-primary">Locate</button></a></td>
          <td><?php echo $r['depth']?></td>
          <td>Pending</td>
        </tr>
  <?php } }?>
      </table>
      <?php
mysqli_close($conn);
?>
</div>
	</div>

</body>
</html>
<?php } if(isset($_POST['sub']))
{
session_destroy();
			unset($_SESSION['uname']);
			header('Location:login.php');
		}
    if(isset($_POST['ma']))
{

      header('Location:manage.php');
    }
?>