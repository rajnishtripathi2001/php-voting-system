<?php  

    $conn = mysqli_connect("localhost","root","","voting");

    if(!$conn){
        die("Connection Failed : ".mysqli_connect_error());
    }

    if($conn){
        echo "Connection Successful";
    }



?>