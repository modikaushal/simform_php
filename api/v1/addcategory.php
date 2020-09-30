<?php
	include("config.php");
	$request = json_decode(file_get_contents('php://input'), true);
	$return = array();
	if (isset($request['action']) && ($request['action'] == 'add_category' || $request['action'] == 'edit_category')) {
		$c_name = $request['name'];
		$id = isset($request['id']) ? $request['id'] : '';
		$now = date("Y-m-d H:i:s");
		if ($request['action'] == 'add_category') {
			$sql = "INSERT INTO category (name) VALUES ('$c_name')";
			if(mysqli_query($mysqli,$sql)) {
				$return['success'] = "Detail inserted successfully.";
			} else {
				$return['error'] = mysqli_error($mysqli);
			}
		}
		if ($request['action'] == 'edit_category') {
			$sql = "UPDATE category SET name = '$c_name' WHERE id = '$id'";
			if(mysqli_query($mysqli,$sql)) {
				$return['success'] = "Detail updated successfully.";
			} else {
				$return['error'] = mysqli_error($mysqli);
			}
		}
	}
	echo json_encode($return);
?>