<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
?>
<?php
include('../dist/includes/dbcon.php');

?>

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <!-- Messages: style can be found in dropdown.less-->
                   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="transaction.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-home text-green"></i> Home
                     
                    </a>
                    
                  </li>
                  <!-- Tasks Menu -->
                   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="sales.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-stats text-red"></i> Sales Report
                     
                    </a>
                    
                  </li>
                  <!-- Tasks Menu -->
				          <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="reorder.php" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-refresh text-red"></i> Reorder
                      <span class="label label-danger">
                      <?php 
                      $query=mysqli_query($con,"select COUNT(*) as count from product where prod_qty<=reorder")or die(mysqli_error());
                			$row=mysqli_fetch_array($query);
                			echo $row['count'];
                			?>	
                      </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have <?php echo$row['count'];?> products that needs to reorder</li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <?php
                        $queryprod=mysqli_query($con,"select prod_name from product where prod_qty<=reorder")or die(mysqli_error());
			  while($rowprod=mysqli_fetch_array($queryprod)){
			?>
                          <li><!-- start notification -->
                            <a href="">
                              <i class="glyphicon glyphicon-refresh text-red"></i> <?php echo $rowprod['prod_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                      <li class="footer"><a href="reorder.php">View all</a></li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cog text-orange"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout 
                      
                    </a>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>