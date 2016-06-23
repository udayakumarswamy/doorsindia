<?php
error_reporting(0);

$id=$_GET['id'];
// Create connection
include "../db-config.php"; 

$sql = "DELETE FROM door_testimonials WHERE id=$id";
if ($conn->query($sql) === TRUE) {
}
$conn->close();
header("Location: testimonials.php");
?>