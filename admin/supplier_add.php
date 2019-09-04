<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];	
	$uid=$_SESSION['id'];
	$remarks="added new supplier $name";  
	$date = date("Y-m-d H:i:s");
			
			mysqli_query($con,"INSERT INTO supplier(supplier_name,supplier_address,supplier_contact) 
				VALUES('$name','$address','$contact')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new supplier!');</script>";
			echo "<script>document.location='supplier.php'</script>";  
	
?>