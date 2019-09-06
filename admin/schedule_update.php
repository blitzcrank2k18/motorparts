<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$service = $_POST['service'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$desc = $_POST['desc'];
	$startdate = date("Y-m-d",strtotime($_POST['startdate']));
	$starttime = $_POST['starttime'];
	$enddate = date("Y-m-d",strtotime($_POST['enddate']));
	$endtime = $_POST['endtime'];
	$uid=$_SESSION['id'];
	$remarks="updated schedule to $startdate";  
	$date = date("Y-m-d H:i:s");
	
	mysqli_query($con,"update schedule set service_id='$service',startdate='$startdate',starttime='$starttime',enddate='$enddate',endtime='$endtime',customer='$name',contact='$contact',description='$desc' where schedule_id='$id'")or die(mysqli_error());
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

	echo "<script type='text/javascript'>alert('Successfully updated schedule!');</script>";
	echo "<script>document.location='schedule.php'</script>";  

	
?>
