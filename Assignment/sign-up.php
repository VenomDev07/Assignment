<?php

include 'dbCon.php';

if(isset($_POST['sign-in']))
    {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $password = md5($password);

        $checkUserName = "SELECT * from userdata where username = '$username'";
        $result = $con -> query($checkUserName);
        if($result -> num_rows > 0)
            {
                echo "Username Already Exists !";
            }
        else
            {
                $insertQuery = "INSERT INTO userdata(username,password) VALUES('$username','$password')";
                if($con ->query($insertQuery) == TRUE)
                    {
                        header("location: Login.html");
                    }
                else
                    {
                        echo "Error: ".$con->error;
                    }
            }
    }

if(isset($_POST['log-in']))
    {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql = "SELECT * FROM userdata WHERE username = '$username' and password = '$password'";
        $result = $con -> query($sql);
        if($result-> num_rows > 0)
            {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $row['username'];
                header("location: home.php");
                exit();
            }
        else
            {
                echo "Not Found, Incorrect Username or Password";
            }
    }
?>