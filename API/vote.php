<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$id = $_POST['gid'];
$totalVotes = $votes+1;
$uid = $_SESSION['userData']['id'];

$sql = "UPDATE user SET votes = '$totalVotes' WHERE id=$id";
$result = mysqli_query($conn, $sql);

$sql2 = "UPDATE user SET status = 1 WHERE id=$uid";
$result2 = mysqli_query($conn, $sql2);


if($result && $result2){

    $partyQuery = "SELECT * FROM `user` WHERE `role` = 2";
    $partyResult = mysqli_query($conn ,$partyQuery);
    $partyData = mysqli_fetch_all($partyResult,MYSQLI_ASSOC);


    $_SESSION['userData']['status'] = 1;
    $_SESSION['partyData'] = $partyData;

    echo '
        <script>
            alert("Voted Successfully");
            window.location.href = "../routes/dashboard.php";
        </script>
    ';

    // header('location: ../routes/dashboard.php');
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>