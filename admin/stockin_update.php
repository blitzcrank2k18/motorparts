<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$qty =$_POST['qty'];
	$qty_old =$_POST['qty_old'];
	$prod_id =$_POST['prod_id'];
	
	$qty_new=$qty_old-$qty;
	mysqli_query($con,"update stockin set stockin_qty='$qty' where stockin_id='$id'")or die(mysqli_error());
	
	mysqli_query($con,"update product set prod_qty= prod_qty - '$qty_new' where prod_id='$prod_id'")or die(mysqli_error());

	echo "<script>document.location='stockin.php'</script>";  

	
?>
