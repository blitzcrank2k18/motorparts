<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$category =$_POST['category'];
	$uid=$_SESSION['id'];
	$remarks="updated category $category";  
	$date = date("Y-m-d H:i:s");

	mysqli_query($con,"update category set cat_name='$category' where cat_id='$id'")or die(mysqli_error());

	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated category!');</script>";
	echo "<script>document.location='category.php'</script>";  

	
?>
