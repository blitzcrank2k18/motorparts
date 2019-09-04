<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');

	$service = $_POST['service'];
	$startdate = date("Y-m-d",strtotime($_POST['startdate']));
	$starttime = $_POST['starttime'];
	$enddate = date("Y-m-d",strtotime($_POST['enddate']));
	$endtime = $_POST['endtime'];
	$uid=$_SESSION['id'];
	$remarks="added new schedule for $startdate";  
	$date = date("Y-m-d H:i:s");
				
			mysqli_query($con,"INSERT INTO schedule(service_id,startdate,starttime,enddate,endtime) VALUES('$service','$startdate','$starttime','$enddate','$endtime')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new schedule!');</script>";
					  echo "<script>document.location='schedule.php'</script>";  
?>