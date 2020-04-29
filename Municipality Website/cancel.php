
<?php session_start(); ?>
<?php

  session_start();
  $conn = mysqli_connect("localhost", "root", "", "pothole");
  if (!$conn) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  	$p = $_GET['sno'];
  	mysqli_query($conn,"DELETE FROM sensors WHERE sno='$p'");
  	//echo "<script type='text/javascript'> alert('Cancelled Successfully!!!');</script>";
  	header("Location:manage.php");
  
  
  mysqli_close($conn);


?>