<?php


    
    // Connect to your database

    $conn = mysqli_connect("localhost", "root", "", "pothole");

    // Prepare the SQL statement
	$dep = $_GET["DEPTH"];
	$lat = $_GET["LAT"];
	$lon = $_GET["LON'];

    $sql = "INSERT INTO sensors (lat,lon,depth) VALUES ('$lat','$lon','$dep')";

    
    
    $to = "saumya.apurva@gmail.com";
         $subject = "ALERT";
         
         $message = "<b>DANGER ZONE.</b>";
         
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }

    // Execute SQL statement

    mysqli_query($conn,$sql);

?>