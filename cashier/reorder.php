<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Reorder List | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
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
		  .main-footer	{
			display:none !important;
		  }
		  .box.box-primary {
			  border-top:none !important;
		  }
		  
          
      }
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
      include('../dist/includes/dbcon.php');
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
         

          <!-- Main content -->
          <section class="content">
            <div class="row">
	    <div class="col-xs-12">
              <div class="box box-primary">
					
              
                <div class="box-body"> 
                  
          <h3>HIGHWAY MOTOR PARTS<img src="../dist/img/logo.jpg" style="height: 100px;float: right;position:absolute;margin-left: 100px"></h3>       
          <h5>WILSON I. BERMEO-Prop.</h5>       
          <h5>NON-VAT Reg. TIN: 167-700-096-000</h5>       
          <h5>Manapla Public Market, Manapla, Neg. Occ.</h5><br>       
				  <h5><b>Reorder List as of today, <?php echo date("M d, Y h:i a");?></b></h5>
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
							<a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>   
						
                  <table class="table table-bordered table-striped">
                    <thead>
					
                      <tr>
					  
                        <th>Product Name</th>
                        <th>Qty Left</th>
            						<th>Price</th>
            						<th>Total</th>
            						<th>Reorder</th>
                       
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query=mysqli_query($con,"select * from product where prod_qty<=reorder order by prod_name")or die(mysqli_error());
		$grand=0;
		while($row=mysqli_fetch_array($query)){
			$total=$row['prod_price']*$row['prod_qty'];
			$grand+=$total;
?>
                      <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
						
						<td><?php echo $row['prod_price'];?></td>
						<td><?php echo number_format($total,2);?></td>
						<td class=""><?php if ($row['prod_qty']<=$row['reorder'])echo "<span class='badge bg-red'><i class='glyphicon glyphicon-refresh'></i> Reorder</span>";?></td>
                       
                      </tr>

<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                       
                        
						
					
						
                        
                      </tr>					  
                    </tfoot>
                  </table><br><br>
                  Prepared by: <br><br>
                    Mark Joven S. Polvorido
                </div><!-- /.box-body -->

	      </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
