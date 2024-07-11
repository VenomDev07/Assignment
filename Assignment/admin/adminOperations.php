<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <table class="table" class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Message</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>

                <?php
                    $con = mysqli_connect("localhost","root","","university");
                    if(!$con)
                        {
                            die("Connection Failed".mysqli_connect());
                        }
                    $sql = "SELECT * FROM condata";
                    $result = mysqli_query($con,$sql);
                    if($result)
                        {
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $city = $row['city'];
                                    $message = $row['message'];

                                    echo '<tr>
                                            <th scope="row">'.$id.'</th>
                                            <td>'.$name.'</td>
                                            <td>'.$address.'</td>
                                            <td>'.$city.'</td>
                                            <td>'.$message.'</td>
                                            <td>
                                              <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">Update</a></button>
                                              <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
                                            </td>
                                          </tr>';
                                }
                        }

                ?>
                <td>

                </td>
            </tbody>
          </table>
    </div>
</body>
</html>