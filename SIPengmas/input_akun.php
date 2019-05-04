<?php
include "connect.php";

$username_users = $_POST["username_users"];
$password_users = $_POST["password_users"];

$sql = " SELECT * FROM users WHERE username_users = '$username_users' AND password_users = '$password_users'";
$result = $con->query($sql);

if ($result->num_rows==0)
 header("Location: login.html?flag=wrongpassword");

 if ($username_users =='admin' AND $password_users=='admin') {
    session_start();
	$result=$result->fetch_assoc();
	$_SESSION = $_POST;
	$_SESSION = array_merge($_SESSION, $result);
	header("Location:halo_admin.html");
}
else
{
	session_start();
	$result=$result->fetch_assoc();
	$_SESSION = $_POST;
	$_SESSION = array_merge($_SESSION, $result);
	header("Location: halo.html");
}