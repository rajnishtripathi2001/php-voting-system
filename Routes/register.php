<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

</head>
<body> 
    <h1>Online Voting System</h1><hr>
    <form action="../api/registeration.php" method="post" enctype="multipart/form-data">
        <input type="text" name="Name" placeholder="Enter Name">
        <input type="number" name="mobile" placeholder="Enter Mobile Number"> <br><br>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="password" name="cPassword" placeholder="Confirm Password"> <br><br>
        <input type="text" name="address" id="address" placeholder="Enter Your Address" ><br><br>
        Upload Image :
        <input id="fileUP" type="file" name="photo"> <br><br>
        Select Role :
        <select id="role-drop2" name="role">
            <option value="1">Voter</option>
            <option value="2">Party</option>  
        </select><br><br>
        <button id="loginbtn" type="submit">Register</button><br><br>
        Already Registered? <a href="../index.php">Login</a>
    </form>
    
</body>
</html>