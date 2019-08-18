<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php include "dist/includes/shop-head.php";?>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
   
    <!-- BEGIN HEADER -->
    <?php 
      include "dist/includes/shop-header.php";
    ?>


    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <?php //include "dist/includes/shop-slider.php";?>
    
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <?php //include "dist/includes/shop-sale.php";?>
        
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT --> 
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
        <?php include "dist/includes/shop-sidebar.php";?>
          
          <!-- END SIDEBAR -->
<?php
          $item=$_REQUEST['prod_id'];
         $queryp=mysqli_query($con,"SELECT * FROM product where prod_id='$item'")or die(mysqli_error($con));
                  $rowp=mysqli_fetch_array($queryp);
?>              
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                   <img src="../dist/uploads/<?php echo $rowp['prod_pic'];?>" class="img-responsive" alt="<?php echo $rowp['prod_name'];?>" style="width: 350px;height: 500px">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1><?php echo $rowp['prod_name'];?></h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>P</span><?php echo $rowp['prod_price'];?></strong>
                    </div>
                    <div class="availability">
                      Available: <strong><?php echo $rowp['prod_qty'];?></strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $rowp['prod_desc'];?></p>
                  </div>
                  
                 
                  
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>

   
    <!-- BEGIN PRE-FOOTER -->
    <?php include "dist/includes/shop-footer.php";?>

    <!-- END FOOTER -->


    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <?php include "dist/includes/shop-script.php";?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
