<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$service =$_POST['service'];
	
	
	mysqli_query($con,"update service set service_name='$service' where service_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated service!');</script>";
	echo "<script>document.location='service.php'</script>";  

	
?>
