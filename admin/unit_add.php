<?php 

include('../dist/includes/dbcon.php');

	$unit = $_POST['unit'];
	
	$query2=mysqli_query($con,"select * from unit where unit='$unit'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Unit already exist!');</script>";
			echo "<script>document.location='unit.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO unit(unit) VALUES('$unit')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new unit!');</script>";
					  echo "<script>document.location='unit.php'</script>";  
		}
?>