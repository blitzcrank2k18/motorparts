<?php 
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');

	$discount = $_POST['discount'];
	$amount_due = $_POST['amount_due'];
	
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	
	$total=$amount_due-$discount;

	

		$tendered = $_POST['tendered'];
		$change = $_POST['change'];

		mysqli_query($con,"INSERT INTO sales(user_id,discount,amount_due,total,date_added,cash_tendered,cash_change) 
	VALUES('$id','$discount','$amount_due','$total','$date','$tendered','$change')")or die(mysqli_error($con));
		
	
	
	
	$sales_id=mysqli_insert_id($con);
	$_SESSION['sid']=$sales_id;
	$query=mysqli_query($con,"select * from temp_trans")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['prod_id'];	
 			$qty=$row['qty'];
			$price=$row['price'];
			
			
			mysqli_query($con,"INSERT INTO sales_details(prod_id,qty,price,sales_id) VALUES('$pid','$qty','$price','$sales_id')")or die(mysqli_error($con));
			mysqli_query($con,"UPDATE product SET prod_qty=prod_qty-'$qty' where prod_id='$pid'") or die(mysqli_error($con)); 
		}
		
		
		$result=mysqli_query($con,"DELETE FROM temp_trans")	or die(mysqli_error($con));
		echo "<script>document.location='receipt.php'</script>";  	
		
	
?>