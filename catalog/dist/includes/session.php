<?php 
session_start();
//include "dist/includes/session.php";
include "dist/includes/dbcon.php";
if (isset($_SESSION['id']))
{
	$session_id=$_SESSION['id'];

	$user_query = mysqli_query($con,"select * from customer where cust_id = '$session_id'")or die(mysql_error($con));
	$user_row = mysqli_fetch_array($user_query);
	$session_name = $user_row['cust_name'];
}
?>
