<?php
include("db-config.php");
$phone = intval($_REQUEST['phone']);
if($phone != '') {
	$sql = "INSERT INTO door_contacts (`phone`, `createdOn`) VALUES ($phone, date('Y-m-d H:i:s'))";
	$conn->query($sql);
	$last_id=$conn->insert_id;
	echo 200;
} else {
	echo 0;
}

?>