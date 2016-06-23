<?php
error_reporting(0);

$id=$_GET['id'];
// Create connection
include "../db-config.php"; 

$sql = "DELETE FROM door_images WHERE id=$id";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    unlink("uploads/layout_plan/".$_GET['file']);
    echo $_GET['file']." Record deleted successfully";
} else {
    echo "Error: " . $conn->error;
}









$conn->close();
?>