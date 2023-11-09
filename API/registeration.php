<?php
    include("connect.php");

    $name = $_POST['Name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    

    $images = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];


    if($password == $cPassword){
        move_uploaded_file($tmp_name,"../Uploads/$images");

        $query = "INSERT INTO `user`(`name`, `mobile`, `password`, `address`, `role`, `photo`, `status`, `votes`)
                 VALUES ('$name','$mobile','$password','$address','$role','$images',0,0)";

        $insert = mysqli_query($conn ,$query);

        if($insert){
            echo '
                <script>
                    alert("Registration Successful");
                    window.location.href = "../index.php";
                </script>
            ';
        }
        else{
            echo '
                <script>
                    alert("Registration Failed");
                    window.location.href = "../routes/register.php";
                </script>
            ';
        }

    }
    else{
        echo '
            <script>
                alert("Password and Confirm Password are not same");
                window.location.href = "../routes/register.php";
            </script>
        '; 
    }
?>