<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <style>
        .img {
            height: 80px;
            width: 80px;
        }
        .btn1
        {
            background-color: blueviolet;
            padding: 10px;
            color: #fff;
            border-radius: 3px;
            text-decoration: none;

        }
        .btn2
        {
            background-color: red;
            padding: 10px;
            color: #fff;
            border-radius: 3px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';
                $sel = "select * from info";
                $result = mysqli_query($connect, $sel);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo "<td>" . $i . "</td>";
                    echo "<td><img src='images/" . $row['picture'] . "' class='img' /></td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo '<td>
                          <a href="update.php?id='.$row['id'].'" class="btn1" >Update</a>
                          <a href="delete.php?id='.$row['id'].'" class="btn2" >Delete</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
