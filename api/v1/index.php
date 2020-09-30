<?php

include("config.php");
if (isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];
	$sql = $mysqli->query("SELECT * FROM category WHERE id='$id'");
} else {
	$sql = $mysqli->query("SELECT * FROM category ORDER BY id DESC");
}
$return = array();
if(mysqli_num_rows($sql) > 0) {
	while ($data = mysqli_fetch_assoc($sql)) {
		$return['success'][] = $data;
	}
} else {
	$return['error'] = 'Data not found.';
}
echo json_encode($return);
?>