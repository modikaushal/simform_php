<?php

include("config.php");
if (isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];
	$sql = $mysqli->query("SELECT * FROM product_detail WHERE id='$id'");
} else {
	$sql = $mysqli->query("SELECT * FROM product_detail ORDER BY id DESC");
}
$return = array();
if(mysqli_num_rows($sql) > 0) {
	while ($data = mysqli_fetch_assoc($sql)) {
		$cid = $data['category_id'];
		$c_sql = $mysqli->query("SELECT * FROM category WHERE id='$cid'");
		$c_data = mysqli_fetch_assoc($c_sql);
		$data['category'] = $c_data;
		$return['success'][] = $data;
	}
} else {
	$return['error'] = 'Data not found.';
}
echo json_encode($return);
?>