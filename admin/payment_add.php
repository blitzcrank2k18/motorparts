<?php 
session_start();
include('../dist/includes/dbcon.php');

date_default_timezone_set('Asia/Manila');

	$cid = $_POST['cid'];
	$amount = $_POST['amount'];
	$payment_for = $_POST['payment_for'];
	$balance = $_POST['balance'];
	$term = $_POST['term'];
	$interest = $_POST['interest'];
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d");
	$id = $_SESSION['id'];
	$branch = $_SESSION['branch'];
	
   $query3=mysqli_query($con,"select * from payment natural join customer where cust_id='$cid' and payment='0'")or die(mysqli_error($con));
     $row3=mysqli_fetch_array($query3);
		$due=$row3['due'];
	
	$payment_for = date("Y-m-d",strtotime($payment_for));
                        $over = date("Y-m-d",strtotime("+5 days"));
                        if ($payment_for<$over)
                          {
                            $interest=$row['balance']*.05;
                           
                          } 
                         else
                          {
                            $interest='0';
                           
                          }
if ($amount<($due+$interest))
{						
	    echo "<script type='text/javascript'>alert('Insufficient amount entered!');</script>";
		echo "<script>document.location='account_summary.php?cid=$cid'</script>";  
}
else if ($amount>($due+$interest))
{						
	    echo "<script type='text/javascript'>alert('Overpayment!');</script>";
		echo "<script>document.location='account_summary.php?cid=$cid'</script>";  
}
else{
	if ($balance==$amount)
		{
			$status="paid";
		$query=mysqli_query($con,"select * from sales where cust_id='$cid' and branch_id='$branch' order by sales_id desc limit 0,1 ")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			
			$sid=$row['sales_id'];

			mysqli_query($con,"UPDATE sales_details SET status='$status' where sales_id='$sid'") or die(mysqli_error($con)); 
			
		}
		$name=$row3['cust_last'].", ".$row3['cust_first'];
		$remarks="added a payment of $amount for $name";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
	mysqli_query($con,"UPDATE customer SET balance=balance-'$amount' where cust_id='$cid'") or die(mysqli_error($con)); 
		
		//mysqli_query($con,"INSERT INTO payment(cust_id,payment,payment_date,user_id,branch_id) 
		//	VALUES('$cid','$amount','$date','$id','$branch')")or die(mysqli_error($con));

	$date1 = date("Y-m-d H:i:s");
	
	mysqli_query($con,"UPDATE payment SET payment='$amount',user_id='$id',payment_date='$date1',interest='$interest' where payment_for='$payment_for'") or die(mysqli_error($con)); 
//		mysqli_query($con,"INSERT INTO payment(cust_id,payment,payment_date,user_id,branch_id) 
//			VALUES('$cid','$amount','$date1','$id','$branch')")or die(mysqli_error($con));	
		echo "<script type='text/javascript'>alert('Successfully added payment!');</script>";
		echo "<script>document.location='account_summary.php?cid=$cid'</script>";  
	}
?>