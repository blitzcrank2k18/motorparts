<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$address =$_POST['address'];
	$contact =$_POST['contact'];
	$uid=$_SESSION['id'];
	$remarks="updated supplier $name";  
	$date = date("Y-m-d H:i:s");
	
	mysqli_query($con,"update supplier set supplier_name='$name',supplier_address='$address',supplier_contact='$contact' where supplier_id='$id'")or die(mysqli_error());

	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated supplier details!');</script>";
	echo "<script>document.location='supplier.php'</script>";  

	
?>
