<?php
include('connect.php');
if (!isset($_GET['id_users']))
{
    echo 'No ID was given...';
    exit;
}

$id_users = $_GET['id_users'];

$sql = "DELETE FROM users WHERE id_users = '$id_users'";
$result = mysqli_query($con, $sql);

if($result){
    header('Location: verifikasi_user.php');

  } else{

     echo "gagal";
  }
mysql_close();
?>