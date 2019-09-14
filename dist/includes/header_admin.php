<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
include('../dist/includes/dbcon.php');
?>
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="padding-left:20px">
              <a href="home.php" class="navbar-brand"><b></b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                        <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="home.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-home"></i>
                      Home
                    </a>
                  </li>
    
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="log.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-list-alt"></i>
                      History Log
                    </a>
                  </li>
                  <!-- Notifications Menu -->
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-refresh text-red"></i> Reorder
                      <span class="label label-danger">
                      <?php 
                      $query=mysqli_query($con,"select COUNT(*) as count from product where prod_qty<=reorder")or die(mysqli_error($con));
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
                        $queryheader=mysqli_query($con,"select prod_name from product where prod_qty<=reorder")or die(mysqli_error($con));
			                 while($rowheader=mysqli_fetch_array($queryheader)){
			?>
                          <li><!-- start notification -->
                            <a href="">
                              <i class="glyphicon glyphicon-refresh text-red"></i> <?php echo $rowheader['prod_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                      <li class="footer"><a href="reorder.php">View all</a></li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-wrench"></i> Maintenance
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
						  <li><!-- start notification -->
                            <a href="category.php">
                              <i class="glyphicon glyphicon-user text-green"></i> Category
                            </a>
                          </li><!-- end notification -->
						  <li><!-- start notification -->
                            <a href="product.php">
                              <i class="glyphicon glyphicon-cutlery text-green"></i> Product
                            </a>
                          </li><!-- end notification -->
						  <li><!-- start notification -->
                            <a href="schedule.php">
                              <i class="glyphicon glyphicon-send text-green"></i> Schedule
                            </a>
                          </li><!-- end notification -->
              <li><!-- start notification -->
                            <a href="supplier.php">
                              <i class="glyphicon glyphicon-send text-green"></i> Supplier
                            </a>
                          </li><!-- end notification -->
              
              
						             
						  <li><!-- start notification -->
                            <a href="user.php">
                              <i class="glyphicon glyphicon-user text-green"></i> User
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="stockin.php">
                      <i class="glyphicon glyphicon-list text-green"></i> Stock in
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-stats text-red"></i> Report
                    </a>
                    <ul class="dropdown-menu">
                     <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        
                          <li><!-- start notification -->
                            <a href="inventory.php">
                              <i class="glyphicon glyphicon-ok text-green"></i>Inventory
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="reorder.php">
                              <i class="glyphicon glyphicon-refresh text-red"></i>Reorder
                            </a>
                          </li><!-- end notification -->
						  <li><!-- start notification -->
                            <a href="sales.php">
                              <i class="glyphicon glyphicon-usd text-blue"></i>Sales
                            </a>
                          </li><!-- end notification -->
					
						  <li><!-- start notification -->
                            <a href="overall.php">
                              <i class="glyphicon glyphicon-usd text-blue"></i>Yearly Report
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="outofstock.php">
                              <i class="glyphicon glyphicon-ban-circle text-red"></i>Out of Stock
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
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