<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	$query2=mysqli_query($con,"select * from customer where cust_last='$last' and cust_first='$first' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='cust_new.php'</script>";  
		}
		else
		{	
			$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{
				$pic="default.gif";
			}
			else
			{
				$pic = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../dist/uploads/".$pic);
				      }
					}
			}	
			$name = $_FILES["files"]["name"];
			if ($name=="")
			{
				$name="none";
			}
			else
			{
			 $type = $_FILES["files"]["type"];
			 $size = $_FILES["files"]["size"];
			 $temp = $_FILES["files"]["tmp_name"];
			 $error = $_FILES["files"]["error"];
			 
			  if ($error > 0){
			   die("Error uploading file! Code $error.");
			   }
			  else{
			   if($size > 100000000000) //conditions for the file
				{
				die("Format is not allowed or file size is too big!");
				}
			  else
					{
			   move_uploaded_file($temp, "../dist/uploads/".$name);
					}
			   }
			}
			mysqli_query($con,"INSERT INTO customer(cust_last,cust_first,cust_address,cust_contact,cust_pic,branch_id,balance,requirement) 
				VALUES('$last','$first','$address','$contact','$pic','$branch','0','$name')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			//echo "<script type='text/javascript'>alert('Successfully added new customer!');</script>";
			echo "<script>document.location='transaction.php?cid=$id'</script>";  
		}
?>