<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

  $uid=$_SESSION['id'];
  $date = date("Y-m-d H:i:s");
	$id = $_POST['id'];
	$name =$_POST['prod_name'];
	$supplier =$_POST['supplier'];
	$price = $_POST['prod_price'];
	$reorder = $_POST['reorder'];
	$category = $_POST['category'];
	$desc = $_POST['desc'];

	$pic = $_FILES["image"]["name"];
           if ($pic=="")
           {
               $pic=$_POST['image1']; 
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
     			
	mysqli_query($con,"update product set prod_name='$name',prod_price='$price',prod_desc='$desc',
	reorder='$reorder',supplier_id='$supplier',cat_id='$category',prod_pic='$pic' where prod_id='$id'")or die(mysqli_error($con));

      $remarks="updated product $name";  
  
      mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$uid','$remarks','$date')")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

	
?>
