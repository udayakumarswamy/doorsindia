<?php
error_reporting(0);

$id=$_GET['id'];
// Create connection
include "../db-config.php"; 

$sql = "DELETE FROM door_property_details WHERE id=$id";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
    header("Location: ./?msg=success");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ./?msg=error");
}









$conn->close();
?>

<a href="./">Go Home</a>