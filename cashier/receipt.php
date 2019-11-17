<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    
    <style type="text/css">
      h3,h5,h6{
        text-align:center;
      }


      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>

 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="col-md-12">

              </div>
                
                <div class="box-body">

                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
<?php
include('../dist/includes/dbcon.php');

        
?>			

          <h3>HIGHWAY MOTOR PARTS<img src="../dist/img/logo.jpg" style="height: 100px;float: right;position:absolute;margin-left: 100px"></h3>       
          <h5>WILSON I. BERMEO-Prop.</h5>       
          <h5>NON-VAT Reg. TIN: 167-700-096-000</h5>       
          <h5>Manapla Public Market, Manapla, Neg. Occ.</h5><br>
          <h6 style="font-weight: bolder;">Date <?php echo date("M d, Y");?> Time <?php echo date("h:i A");?></h6>

                  <hr>
                   <table class="table">
                    <thead>
<?php

    
    $query=mysqli_query($con,"select * from sales order by sales_id desc LIMIT 0,1")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
       
        $sid=$_SESSION['sid'];
        $due=$row['amount_due'];
        $discount=$row['discount'];
        $grandtotal=$due-$discount;
        $tendered=$row['cash_tendered'];
        $change=$row['cash_change'];
?>                      
                      
                    </thead>
                  </table>
                  <table class="table">
                    <thead>

                      <tr>
                        <th>Qty</th>
                        <th>Product Name</th>
            						<th>Price</th>
            						<th class="text-right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query=mysqli_query($con,"select * from sales_details natural join product where sales_id='$sid'")or die(mysqli_error($con));
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				//$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
        
?>
                      <tr >
            						<td><?php echo $row['qty'];?></td>
                        <td class="record"><?php echo $row['prod_name'];?></td>
            						<td><?php echo $row['price'];?></td>
            						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    
                      </tr>
					  

<?php }?>					
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">Discount</td>
                        <td style="text-align:right"><?php echo number_format($discount,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Grand Total</b></td>
                        <td style="text-align:right"><b><?php echo number_format($grand-$discount,2);?></b></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">Cash Tendered</td>
                        <td style="text-align:right"><?php echo number_format($tendered,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Change</b></td>
                        <td style="text-align:right"><b><?php echo number_format($change,2);?></b></td>
                      </tr>  
                    </tbody>
                      <tr>
                      <td colspan="2"></td>
                      <td colspan="2"><br><br>
       Prepared by: <br><br>
       Mark Joven S. Polvorido  </td>
                    </tr>       
                  </table>
                   
                </div><!-- /.box-body -->
				</div>  
				</form>	
                </div><!-- /.box-body -->
                <input class="btn btn-success btn-print" type="button" name="print" value="Print" onclick="window.print();window.location.href='transaction.php';">
                <a class = "btn btn-primary btn-print" href = "transaction.php"><i class ="glyphicon glyphicon-arrow-left"></i> New Transaction</a>
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
           
          </div><!-- /.row -->
	  
             
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->
	
	<script type="text/javascript">
    $(document).ready(function () {
        window.print();
        setTimeout("closePrintView()",3000);
    });
    function closePrintView() {
        document.location.href = 'transaction.php';
    }
</script>
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
   
  </body>
</html>
