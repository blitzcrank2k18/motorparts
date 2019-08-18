<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$unit =$_POST['unit'];
	
	
	mysqli_query($con,"update unit set unit='$unit' where unit_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated unit!');</script>";
	echo "<script>document.location='unit.php'</script>";  

	
?>
