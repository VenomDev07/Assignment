<?php

    $con = mysqli_connect("localhost","root","","university");
    if(!$con)
        {
            die("Connection Failed".mysqli_connect());
        }

    if(isset($_POST['admin-btn']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admindata WHERE username = '$username' and password = '$password'";
        $result = $con -> query($sql);
        if($result-> num_rows > 0)
            {
                session_start();
                header("location: adminOperations.php");
                exit();
            }
        else
            {
                echo "Not Found, Incorrect Username or Password";
            }
    }
?>