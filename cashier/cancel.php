<?php
session_start();
//$branch=$_SESSION['branch'];
	include('../dist/includes/dbcon.php');
	$result=mysqli_query($con,"DELETE FROM temp_trans")	or die(mysqli_error());
	 echo "<script>document.location='transaction.php'</script>";  
?>