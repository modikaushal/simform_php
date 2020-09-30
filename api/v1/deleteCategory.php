<?php
include("config.php");
$request = json_decode(file_get_contents('php://input'), true);
$return = array();
if ((isset($request['id'])) && $request['id'] > 0) {
	$id = $request['id'];
	$sql = "DELETE from category WHERE id = {$id}";
	if (mysqli_query($mysqli,$sql)) {
		$return['success'] = "Data deleted successfully";
	} else {
		$return['error'] = mysqli_error($mysqli);
	}
}
echo json_encode($return);
?>