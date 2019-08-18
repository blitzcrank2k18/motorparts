<?php 

include('../dist/includes/dbcon.php');

	$service = $_POST['service'];
	
				
			mysqli_query($con,"INSERT INTO service(service_name) VALUES('$service')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new service!');</script>";
					  echo "<script>document.location='service.php'</script>";  
?>