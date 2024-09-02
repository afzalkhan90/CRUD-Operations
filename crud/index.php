<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
<style>
    body
    {
        /* background: #1f242d; */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form{
        /* box-shadow: 0px 0px 3px 2px rgba(0, 0, 0, 0.3); */
        width: 500px;
        height: 600px;
        background-color: #fff;
        border-radius: 12px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 28px;
    }
</style>
</head>
<body>
   <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="text-primary text-center py-4">CRUD Operations</h1><br>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
    <label for="exampleInputPassword1">First Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name" name="fname">
  </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" name="lname">
  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email">
  </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
    <label for="exampleInputPassword1">Phone No.</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone">
  </div>
            </div>
        </div>
        <div class="form-group">
    <label for="exampleInputPassword1">Choose Picture</label>
    <input type="file" class="form-control" accept=".jpg, .jpeg, .png, .jfif" name="file" >
    <small id="emailHelp" class="form-text text-muted">Only Accept JPG, JPEG & PNG.</small>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <br>
  <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
    </form>
   </div>
    
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $image = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $rand = rand(1111, 9999) . '.' . $image;
    $folder = $rand;
    $picture = move_uploaded_file($tmp_name, "images/".$folder);

    $ins = "insert into info (fname, lname, email, phone, picture) values ('".$fname."', '".$lname."', '".$email."', '".$phone."', '".$folder."')";

    $insert = mysqli_query($connect, $ins);

    if($insert)
    {
        header('Location: select.php');
    }else
    {
        echo "<script>alert('Data not Insert')</script>";
    }
}
?>