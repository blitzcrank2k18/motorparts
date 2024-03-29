<?php
include('../dist/includes/dbcon.php');
  //require('db_config.php');


  /* Getting demo_viewer table data */
  //$sql = "select SUM(amount_due) from sales natural join sales_details natural join product group by MONTH(date_added)+'-'+YEAR(date_added)";
//  $sql = "SELECT SUM(numberofview) as count FROM demo_viewer 
//      GROUP BY YEAR(created_at) ORDER BY created_at";
//  $viewer = mysqli_query($mysqli,$sql);
//  $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
//  $viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


  /* Getting demo_click table data */
  $year=$_POST['year'];
  $sql = "SELECT SUM(total) as total,DATE_FORMAT(date_added,'%Y/%m') as date FROM `sales` where year(date_added)='$year' group by date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'total'),JSON_NUMERIC_CHECK);
                


?>


<!DOCTYPE html>
<html>
<head>
  <title>Yearly Sales Report</title>
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../dist/js/jquery.js"></script>
  <script src="../dist/js/highcharts.js"></script>
  <style type="text/css">
      h3,h5,h6{
        text-align: center;
      }
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
</head>
<body>


<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
       
        xAxis: {
            categories: data,
        },
        yAxis: {
            title: {
                text: 'Rate',
            }
            
        },
        series: [{
            name: 'Monthly Sales',
            data: data_click,
           
        },]

    });

});


</script>


<div class="container">
  <br/>
  <h3>HIGHWAY MOTOR PARTS<img src="../dist/img/logo.jpg" style="height: 100px;float: right;position:absolute;margin-left: 100px"></h3>       
          <h5>WILSON I. BERMEO-Prop.</h5>       
          <h5>NON-VAT Reg. TIN: 167-700-096-000</h5>       
          <h5>Manapla Public Market, Manapla, Neg. Occ.</h5><br>
  <h5 class="text-center">Yearly Sales Report for <?php echo $year;?>
   <input class="btn-print btn-warning" type="button" name="print" value="Print" onclick="window.print();window.location.href='home.php';">            </h5>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Month</th>
                      <th>Sales</th>
                    </tr>
<?php
    
    $query=mysqli_query($con,"SELECT SUM(total) as total,DATE_FORMAT(date_added,'%Y/%m') as date FROM `sales` where year(date_added)='$year' group by date")or die(mysqli_error($con));

    while($row=mysqli_fetch_array($query)){
    
?>                  <tr>
                       <td><?php echo $row['date'];?></td> 
                       <td><?php echo $row['total'];?></td> 
                    </tr>  
<?php }?>
                </table>
                <table id="example1" class="table">
                    <tr>
                      <td style="width: 50%">  </td>

                      <td><br><br>
                         Prepared by: <br><br>
                         Mark Joven S. Polvorido  
                       </td>
                    </tr>
                  </table>     

                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
