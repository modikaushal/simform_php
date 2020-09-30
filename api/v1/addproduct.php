<?php
	include("config.php");
	// $_POST = json_decode(file_get_contents('php://input'), true);
	$return = array();
	if (isset($_POST['action']) && ($_POST['action'] == 'add_product' || $_POST['action'] == 'edit_product')) {
		$p_name = $_POST['name'];
		$p_category = $_POST['category'];
		$p_price = $_POST['price'];
		$p_discount = $_POST['discount'];
		$p_netprice = $_POST['netprice'];
		$p_description = $_POST['description'];
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$now = date("Y-m-d H:i:s");
		$file_path = '';
		if (isset($_FILES["image"])) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES['image']['name'])) {
		        $file_path = $root_domain.'/api/v1/upload/'.$_FILES['image']['name'];
		    }
		}
		if ($_POST['action'] == 'add_product') {
			$sql = "INSERT INTO product_detail (pro_name, category_id, image_link, price, discount, net_price, description) VALUES ('$p_name', '$p_category', '$file_path', '$p_price', '$p_discount', '$p_netprice', '$p_description')";
			if(mysqli_query($mysqli,$sql)) {
				$return['success'] = "Detail inserted successfully.";
			} else {
				$return['error'] = mysqli_error($mysqli);
			}
		}
		if ($_POST['action'] == 'edit_product') {
			$sql = "UPDATE product_detail SET pro_name = '$p_name', category_id = '$p_category', image_link = '$file_path', price = '$p_price', discount = '$p_discount', net_price = '$p_netprice', description = '$p_description' WHERE id = '$id'";
			if(mysqli_query($mysqli,$sql)) {
				$return['success'] = "Detail updated successfully.";
			} else {
				$return['error'] = mysqli_error($mysqli);
			}
		}
	}
	echo json_encode($return);
?>