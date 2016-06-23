<?php
// Start the session
session_start();

if($_GET['c']=="login"){
// Set session variables
//echo $_GET['c']."-".$_POST['email'];
if($_POST['email']=="admin" && $_POST['password']=="Admin@doors"){
$_SESSION["admin"] = "Admin";
header("Location:./");
}
}
if($_GET['c']=="logout"){
session_destroy(); 
header("Location:./login.php");
}
?>
