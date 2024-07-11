<?php
    session_start();
    $con = mysqli_connect("localhost","root","","university");
    if(!$con)
        {
            die("Connection Failed".mysqli_connect());
        }
    
    if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $message = $_POST['message'];

            $query = "INSERT INTO condata(name,address,city,message) VALUES('$name','$address','$city','message')";
            $query_run = mysqli_query($con, $query);
            if($query_run)
                {
                    $_SESSION['message'] = "Data Saved Successfully";
                    header("Location: contact.php");
                    exit(0);
                }
            else
                {
                    $_SESSION['message'] = "Data Saved Unsuccessfully";
                    header("Location: contact.php");
                    exit(0);
                }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
        <div class="message">
            <?php include('message.php')?>
        </div>
            <div class="row">
                <div class="container">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>