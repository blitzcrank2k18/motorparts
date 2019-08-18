<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$last =$_POST['last'];
	$first =$_POST['first'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{	
				if ($_POST['image1']<>""){
					$pic=$_POST['image1'];
				}
				else
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
				if ($_POST['files1']<>""){
					$name=$_POST['files1'];
				}
				else
					
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
	mysqli_query($con,"update customer set requirement='$name',cust_last='$last',cust_first='$first',cust_address='$address',cust_contact='$contact',cust_pic='$pic' where cust_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated customer details!');</script>";
	echo "<script>document.location='customer.php'</script>";  

	
?>
