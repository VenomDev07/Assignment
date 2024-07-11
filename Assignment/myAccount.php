<?php
session_start();
include ('./dbCon.php');

if(isset($_POST['save_data']))
    {
        $name = $_POST["name"];
        $img = $_FILES["img"];

        $imagefilename = $img['name'];
        $imagefileerror = $img['error'];
        $imagefiletemp = $img['tmp_name'];

        $filename_separate = explode('.',$imagefilename);
        $file_extension = strtolower($filename_separate[1]);
        $extension = array('jpeg','jpg','png','heic');
        
        if(in_array($file_extension,$extension))
            {
                $upload_image = 'image/'. $imagefilename;
                move_uploaded_file($imagefiletemp,$upload_image);

                $query = "INSERT INTO imgdata (username,img) VALUES ('$name','$upload_image')";
                $query_run = mysqli_query($con, $query);
                if($query_run)
                    {
                        $_SESSION['message'] = "Data Saved Successfully";
                        header("Location: myAccount.php");
                        exit(0);
                    }
                else
                    {
                        $_SESSION['message'] = "Data Saved Unsuccessfully";
                        header("Location: myAccount.php");
                        exit(0);
                    }
            }

        


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Account.css">
    <style>
        img{
            width: 100px;
            height: 50px
        }
    </style>
</head>
<body>

    <div class="row">
        <div class="message">
            <?php include('message.php')?>
        </div>
        <div class="container">
            <div class="up-img-form">
                <form  method="post" enctype="multipart/form-data">
                    <label for="name">Name</label><br>
                    <input type="name" name="name" required placeholder="NAME"><br>
                    <label for="img">Image</label>
                    <input type="file" name="img" required class="img-btn">
                    <button type="submit" name="save_data">Save</button>
                </form>
            </div>
            <div class="db">
                <div class="container mt-5 d-flex justify-content-center">
                    <table class="table table-bordered">
                         <thead class="table-dark">
                             <tr>
                             <th scope="col">id</th>
                             <th scope="col">Name</th>
                             <th scope="col">Image</th>
 
                             </tr>
                         </thead>
                         <tbody>
                             <?php 
                                 $sql = "SELECT * FROM imgdata";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $name = $row['username'];
                                        $img = $row['img'];
                                        echo '<tr>
                                                <td>'.$id.'</td>
                                                <td>'.$name.'</td>
                                                <td><img src='.$img.' alt="img"/></td>
                                            </tr>';
                                    }
                             ?>
                         </tbody>
                      </table> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>