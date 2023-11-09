<?php

session_start();

include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$uQuery = "SELECT * FROM `user` WHERE `mobile` = '$mobile' AND `password` = '$password' AND `role` = '$role'";
$result = mysqli_query($conn ,$uQuery);



if(mysqli_num_rows($result) > 0){
    $userData = mysqli_fetch_array($result);

    $partyQuery = "SELECT * FROM `user` WHERE `role` = 2";
    $partyResult = mysqli_query($conn ,$partyQuery);
    $partyData = mysqli_fetch_all($partyResult,MYSQLI_ASSOC);

    $_SESSION['userData'] = $userData;
    $_SESSION['partyData'] = $partyData;

    echo '
        <script>
            window.location.href = "../Routes/dashboard.php";
        </script>
    '; 
}
else{ 
    echo '
        <script>
            alert("Invalid Credentials");
            window.location.href = "../";
        </script>
    ';
}

?>