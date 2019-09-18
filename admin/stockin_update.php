<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
$uid=$_SESSION['id'];
$remarks="successfully updated stock in details";  
$date = date("Y-m-d H:i:s");
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$qty =$_POST['qty'];
	$qty_old =$_POST['qty_old'];
	$prod_id =$_POST['prod_id'];
	
	$qty_new=$qty_old-$qty;
	mysqli_query($con,"update stockin set stockin_qty='$qty' where stockin_id='$id'")or die(mysqli_error());
	
	mysqli_query($con,"update product set prod_qty= prod_qty - '$qty_new' where prod_id='$prod_id'")or die(mysqli_error());

	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

	echo "<script>document.location='stockin.php'</script>";  

	
?>
