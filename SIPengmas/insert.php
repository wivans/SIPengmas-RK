<?php 
    // connect to database
    $db = mysqli_connect("localhost", "root", "", "pengmas") or die($db);

        $nama_users = mysqli_real_escape_string($db,$_POST['nama_users']);
        $jk_users = mysqli_real_escape_string($db,$_POST['jk_users']);
        $nohp_users = mysqli_real_escape_string($db,$_POST['nohp_users']);
        $alamat_users = mysqli_real_escape_string($db,$_POST['alamat_users']);
        $angkatan_users = mysqli_real_escape_string($db,$_POST['angkatan_users']);
        $username_users = mysqli_real_escape_string($db,$_POST['username_users']);
        $password_users = mysqli_real_escape_string($db,$_POST['password_users']);

            $sql = "INSERT INTO users VALUES(NULL, '$nama_users', '$jk_users', '$nohp_users', '$alamat_users','$angkatan_users','$username_users','$password_users')";
            mysqli_query($db, $sql);
            header("location: index.html"); //redirect to home page
        
?> 
