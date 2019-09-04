<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	$uid=$_SESSION['id'];
	$remarks="added new user $name";  
	$date = date("Y-m-d H:i:s");

		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
	
			
			mysqli_query($con,"INSERT INTO user(name,username,password,status,user_type)
			VALUES('$name','$username','$pass','active','$type')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
					  echo "<script>document.location='user.php'</script>";  
	
?>