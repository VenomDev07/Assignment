<?php

    $con = mysqli_connect("localhost","root","","university");
    if(!$con)
        {
            die("Connection Failed".mysqli_connect());
        }

    $id =  $_GET['updateid'];
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $message = $_POST['message'];
        
        $sql = "UPDATE FROM `condata` set id =$id, name ='$name', address ='$address', city ='$city', message ='$message' where id=$id";
        $result = mysqli_query($con,$sql);
        if($result)
            {
                //echo "Updated Succesfull";
                header('Location: adminOperations.php');
            }
        else
            {
                die(mysqli_error($con));
            }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
        <div class="row">
            <form method="post">
                <h1>Update</h1><br>
                <label for="">Name</label>
                <input type="text" name="name" required ><br>
                <label for="">Your Address</label>
                <input type="text" name="address" required >
                <label for="">Your City</label>
                <input type="text" name="city" required/></label>
                <label for="">Message</label>
                <input type="text" name="message" class="message"/></label>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>