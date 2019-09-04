<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$username =$_POST['username'];
	$type = $_POST['type'];
	$uid=$_SESSION['id'];
	$remarks="updated user $name";  
	$date = date("Y-m-d H:i:s");
	
	mysqli_query($con,"update user set name='$name',username='$username',user_type='$type' where user_id='$id'")or die(mysqli_error($con));

	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
	echo "<script>document.location='user.php'</script>";  

	
?>
