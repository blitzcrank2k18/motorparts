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
    <title>Schedule | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../dist/js/jquery.min.js"></script>
<script type="text/javascript" src="../dist/js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="../plugins/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/daterangepicker/daterangepicker.css" />

 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header_admin.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Schedule</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Schedule</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="schedule_add.php" enctype="multipart/form-data">
  
                
				        <div class="form-group">
                    <label for="date">Service</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="service" required>
                      <?php
			 include('../dist/includes/dbcon.php');
				$query2=mysqli_query($con,"select * from service order by service_name")or die(mysqli_error());
				  while($row2=mysqli_fetch_array($query2)){
		      ?>
				    <option value="<?php echo $row2['service_id'];?>"><?php echo $row2['service_name'];?></option>
		      <?php }?>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		    <div class="row">
					<div class="col-md-12">
            <div class="form-group">
                    <label for="date">Customer Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Customer Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Contact</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="contact" placeholder="Contact Number" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Motorcycle Description</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="date" name="desc" placeholder="Motorcycle Description" required></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
						  <div class="form-group">
  							<label for="date">Start Date</label>
  							<div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="startdate" class="form-control pull-right active" id="datepicker" required>
                </div>
						  </div><!-- /.form group -->
              <div class="form-group">
                <label for="date">Start Time</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="time" name="starttime" class="form-control pull-right active" id="datepicker" required>
                </div>
              </div><!-- /.form group -->
              <div class="form-group">
                <label for="date">End Date</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="enddate" class="form-control pull-right active" id="datepicker1" required>
                </div>
              </div><!-- /.form group -->
              <div class="form-group">
                <label for="date">End Time</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="time" name="endtime" class="form-control pull-right active" id="datepicker" required>
                </div>
              </div><!-- /.form group -->
					</div>
					</div>
				  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
					  <button class="btn" id="daterange-btn">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-9">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Schedule List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>End Date</th>
						            <th>End Time</th>
                        <th>Service</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Description</th>
						            <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from schedule natural join service")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                      	
						<td><?php echo $row['startdate'];?></td>
                        <td><?php echo $row['starttime'];?></td>
						<td><?php echo $row['enddate'];?></td>
						<td><?php echo $row['endtime'];?></td>
						<td><?php echo $row['service_name'];?></td>
            <td><?php echo $row['customer'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['description'];?></td>
                        <td>
				<a href="#updateordinance<?php echo $row['schedule_id'];?>" data-target="#updateordinance<?php echo $row['schedule_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
			
						</td>
                      </tr>
<div id="updateordinance<?php echo $row['schedule_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Schedule Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="schedule_update.php" enctype='multipart/form-data'>
                
				<div class="form-group">
					<label for="date" class="control-label col-lg-3">Customer Name</label>
                    <div class="input-group col-md-9">
                    
          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['schedule_id'];?>" required>  
					  <select class="form-control select2" style="width: 100%;" name="service" required>
              <option value="<?php echo $row['service_id'];?>"><?php echo $row['service_name'];?></option>
                <?php
            
              $query2=mysqli_query($con,"select * from service")or die(mysqli_error());
                while($row2=mysqli_fetch_array($query2)){
                ?>
                  <option value="<?php echo $row['service_id'];?>"><?php echo $row2['service_name'];?></option>
                <?php }?>
              </select>
					</div>
				</div> 
        <div class="form-group">
                    <label for="date" class="control-label col-lg-3">Customer Name</label>
                    <div class="input-group col-md-9">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Customer Name" value="<?php echo $row['customer'];?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date" class="control-label col-lg-3">Contact</label>
                    <div class="input-group col-md-9">
                      <input type="text" class="form-control pull-right" id="date" name="contact" placeholder="Contact Number" value="<?php echo $row['customer'];?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date" class="control-label col-lg-3">Motorcycle Description</label>
                    <div class="input-group col-md-9">
                      <textarea class="form-control pull-right" id="date" name="desc" placeholder="Motorcycle Description" required><?php echo $row['description'];?></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
              <div class="form-group">
                <label for="date" class="control-label col-lg-3">Start Date</label>
                <div class="input-group col-lg-9">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="startdate" class="form-control pull-right active" id="datepicker" value="<?php echo $row['startdate'];?>" required>
                </div>
              </div><!-- /.form group -->
              <div class="form-group">
                <label for="date" class="control-label col-lg-3">Start Time</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="time" name="starttime" class="form-control pull-right active" id="datepicker" value="<?php echo $row['starttime'];?>" required>
                </div>
              </div><!-- /.form group -->
              <div class="form-group">
                <label for="date" class="control-label col-lg-3">End Date</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="enddate" class="form-control pull-right active" id="" value="<?php echo $row['enddate'];?>" required>
                </div>
              </div><!-- /.form group -->
              <div class="form-group">
                <label for="date" class="control-label col-lg-3">End Time</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="time" name="endtime" class="form-control pull-right active" id="datepicker" value="<?php echo $row['endtime'];?>" required>
                </div>
              </div><!-- /.form group -->
              </div><br><br><br><br><br><br><br>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
<?php }?>					  
                    </tbody>
                    <tfoot>
                     <tr>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>End Date</th>
                        <th>End Time</th>
                        <th>Service</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

        <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>

    <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

  });
</script>    
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
