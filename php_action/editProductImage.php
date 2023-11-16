<?php 	

require_once 'core.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$productId = $_GET['id'];

if($_POST) {		

$image = $_FILES['productImage']['name'];
$target = "../assets/myimages/".basename($image);
$checkimg = $_FILES['productImage']['tmp_name'];

        // Display file details
        echo "File details:<br>";
        echo "Name: " . $_FILES['productImage']['name'] . "<br>";
        echo "Type: " . $_FILES['productImage']['type'] . "<br>";
        echo "Size: " . $_FILES['productImage']['size'] . " bytes<br>";
        echo "Temporary file: " . $_FILES['productImage']['tmp_name'] . "<br>";
        echo "Target file: " . $target . "<br>";

if (copy($_FILES['productImage']['tmp_name'], $target)) {
 // @unlink("uploadImage/Profile/".$_POST['old_image']);
	//echo $_FILES['image']['tmp_name'];
	//cho $target;exit;
      $msg = "Image uploaded successfully";
      echo $msg;
    }
    else{
		$error = error_get_last();
      $msg = "Failed to upload image";
      echo $msg . $error['message'];exit;
    }		
			

				$sql = "UPDATE product SET product_image = '$image' WHERE product_id = $productId";				
//echo $sql;exit;
				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";
					header('location:../product.php');
				} 
				else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating product image";
				}
			// /else	
		
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
?>
