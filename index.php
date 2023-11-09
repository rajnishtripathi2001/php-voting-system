<!DOCTYPE html>
<html>
<head>
    <title>Online Voting System</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
    <div id="headerSection">
        <h1>Online Voting System</h1>
        <hr>
    </div>

    <div id="bodySection">
        <form action="API/login.php" method="post">
            <h1>Login</h1><br>
            <input type="number" name="mobile" placeholder="Enter your Mobile number"><br><br>
            <input type="password" name="password" placeholder="Enter Password"><br><br> 
            <select name="role" id="role-drop">
                <option value="1">Voter</option>
                <option value="2">Party</option>  
            </select><br><br>
            <button id="loginbtn" type="submit">Login</button><br><br>
            New User? <a href="Routes/register.php">Register</a>
        </form>
    </div>


</body>
</html>
