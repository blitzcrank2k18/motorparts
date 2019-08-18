<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$service = $_POST['service'];
	$startdate = date("Y-m-d",strtotime($_POST['startdate']));
	$starttime = $_POST['starttime'];
	$enddate = date("Y-m-d",strtotime($_POST['enddate']));
	$endtime = $_POST['endtime'];
	
	mysqli_query($con,"update schedule set service_id='$service',startdate='$startdate',starttime='$starttime',enddate='$enddate',endtime='$endtime' where schedule_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated schedule!');</script>";
	echo "<script>document.location='schedule.php'</script>";  

	
?>
