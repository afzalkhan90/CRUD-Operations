<?php

include 'connect.php';
$id = $_GET['id'];
$del = 'delete from info where id="'.$id.'"';
$delete = mysqli_query($connect, $del);

if($delete)
{
  echo "<script>confirm('Confirm Record Deleted! Are you sure')</script>";
  header('Location: select.php');
}else
{
     echo "<script>alert('Error')</script>";
}

?>