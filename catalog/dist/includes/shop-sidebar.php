          <div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
<?php
         $querys=mysqli_query($con,"SELECT * FROM category order by cat_name")or die(mysqli_error($con));
                          while ($rows=mysqli_fetch_array($querys)){
                            $cat_name=$rows['cat_name'];		
?>     
              <li class="list-group-item clearfix"><a href="product-list.php?category=<?php echo $cat_name;?>"><i class="fa fa-angle-right"></i> <?php echo $cat_name;?></a></li>
<?php }?>            
            </ul>
          </div>
