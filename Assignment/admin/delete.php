<?php
    $con = mysqli_connect("localhost","root","","university");
    if(!$con)
        {
            die("Connection Failed".mysqli_connect());
        }
    
     if(isset($_GET['deleteid']))
        {
            $id =  $_GET['deleteid'];

            $query = "DELETE FROM condata where id = $id";
            $result = mysqli_query($con,$query);
            if($result)
                {
                    //echo "Deleted Succesfull";
                    header('Location: adminOperations.php');
                }
            else
                {
                    die(mysqli_error($con));
                }
        }
?>