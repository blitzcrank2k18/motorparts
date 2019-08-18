<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];

		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
	
			
			mysqli_query($con,"INSERT INTO user(name,username,password,status,user_type)
			VALUES('$name','$username','$pass','active','$type')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
					  echo "<script>document.location='user.php'</script>";  
	
?>