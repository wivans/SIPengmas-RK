<?php 
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "pengmas") or die($db);

        $ikut_kegiatan = mysqli_real_escape_string($db,$_POST['ikut_kegiatan']);
        $nama_peserta = mysqli_real_escape_string($db,$_POST['nama_peserta']);
        $jk_peserta = mysqli_real_escape_string($db,$_POST['jk_peserta']);
        $nohp_peserta = mysqli_real_escape_string($db,$_POST['nohp_peserta']);
        $alamat_peserta = mysqli_real_escape_string($db,$_POST['alamat_peserta']);
        $angkatan_peserta = mysqli_real_escape_string($db,$_POST['angkatan_peserta']);

            $sql = "INSERT INTO kegiatan VALUES(NULL,'$ikut_kegiatan', '$nama_peserta', '$jk_peserta', '$nohp_peserta', '$alamat_peserta','$angkatan_peserta')";
            mysqli_query($db, $sql);
            header("location: upload_pembayaran.php"); //redirect to home page
        
?> 