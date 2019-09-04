<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');

	$cat = $_POST['category'];
	$uid=$_SESSION['id'];
	$date = date("Y-m-d H:i:s");

	$query2=mysqli_query($con,"select * from category where cat_name='$cat'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Category already exist!');</script>";
			echo "<script>document.location='category.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$cat')")or die(mysqli_error($con));

			$remarks="added category $cat";  
	
			mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
			echo "<script>document.location='category.php'</script>";  
		}
?>