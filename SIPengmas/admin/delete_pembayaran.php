<?php
include('connect.php');
if (!isset($_GET['id_donasi']))
{
    echo 'No ID was given...';
    exit;
}

$id_donasi = $_GET['id_donasi'];

$sql = "DELETE FROM donasi WHERE id_donasi = '$id_donasi'";
$result = mysqli_query($con, $sql);

if($result){
    header('Location: verifikasi_pembayaran.php');

  } else{

     echo "gagal";
  }
mysql_close();
?>