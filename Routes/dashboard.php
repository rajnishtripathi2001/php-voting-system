<?php
    session_start();
    if(!isset($_SESSION['userData'])){
        header("Location: ../");
    }

    $userData = $_SESSION['userData'];
    $partyData = $_SESSION['partyData'];

    if($_SESSION['userData']['status'] == 0 && $_SESSION['userData']['role'] == 1){
        $status = '<b style="color:red" >Not Voted </b> ';
    }
    else if($_SESSION['userData']['status'] == 0 && $_SESSION['userData']['role'] == 2){
        $status = '<b style="color:red" >A Party has no voting rights</b> ';
    }
    else{
        $status = '<b style="color:green" >Voted </b> ';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <style>
        #backBTN, #logoutBTN, #votebtn{
            font-size: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #323435;
            margin: 10px;
            width: fit-content;
            background-color: #1964a1;
            color: #fff;
            cursor: pointer;
        }

        #top-box{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .bottom-box{
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        #profile{
            width: 25%;
            min-height: 500px;
            border: 2px solid #323435;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            text-align:left;
            
        }

        #party{
            width: 70%;
            min-height: 500px;
            border: 2px solid #323435;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            text-align:left;
        }

        #voted{
            padding: 5px;
            font-size: 20px;
            background-color: green;
            color:white;
            border: 2px solid green;
            border-radius: 5px;
        }
      

    </style>


    <div id="top-box">
        <a href="../"><button id="backBTN">Back</button></a>
        <h1>Online Voting System - Dashboard</h1>
        <a href="logout.php"><button id="logoutBTN">Log Out</button></a>
    </div>
    <hr>
    <div class="bottom-box">
        <div id="profile">
            <center>
            <img src="../uploads/<?php echo $userData['photo'] ?>" alt="dp" height="200px"> <br><br>
            </center>
            <b>Name : </b> <?php echo $userData['name'] ?> <br><br>
            <b>Mobile : </b> <?php echo $userData['mobile'] ?> <br><br>
            <b>Address : </b> <?php echo $userData['address'] ?> <br><br>
            <b>Status : </b> <?php echo $status ?> <br><br>
        </div>
        <div id="party">
            <?php

            if($_SESSION['partyData']){
                for($i = 0; $i < count($partyData); $i++){
                    ?>
                    <div>
                        <img style="float: right" src="../uploads/<?php echo $partyData[$i]['photo'] ?>" alt="gp" height="150" >
                        <b>Group Name: </b> <?php echo $partyData[$i]['name'] ?> <br><br>
                        <b>votes: </b><?php echo $partyData[$i]['votes'] ?> <br><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $partyData[$i]['votes'] ?> " >
                            <input type="hidden" name="gid" value="<?php echo $partyData[$i]['id'] ?> " >
                            <?php
                            if($_SESSION['userData']['status'] == 0 && $_SESSION['userData']['role'] == 1){
                                ?>
                                <input type="submit" name="voteBtn" value="Vote" id="votebtn" >
                                <?php
                            }
                            else if($_SESSION['userData']['status'] == 0 && $_SESSION['userData']['role'] == 2){
                                ?>
                                    <br><b>No Voting Rights!!</b>
                                <?php
                            }
                            else{
                                ?>
                                <input type="submit" name="voteBtn" value="Vote" id="voted" disabled>
                                <?php
                            }

                            ?>
                            
                        </form>
                    </div>
                    <hr>

                    <?php

                }
                
                
            }
            else{

            }


            ?>
        </div>
    </div>   
</body>
</html>