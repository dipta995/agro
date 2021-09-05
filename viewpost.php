<?php 
include 'header.php'; 
$postid = $_GET['postid'];
?>
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
   
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>



<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div id="gallery">
        <figure>
          <header class="heading">কৃষক বাজার বিস্তারিত</header>
             <?php
              $key = $select->postdescription($postid);
              foreach ($key as $value) {
              
            ?>
         <div class="row">
          <div class="col-md-2"></div>
           <div class="productind col-md-4">
              <img src="<?php echo $value['post_image'];?>">
           </div>
        <div class="spandes col-md-6">
           <ul>
             <li><span><?php echo $value['post_title'];?></span></li>
             <li><p style="font-size: 12px; margin-top: -20px;">uploaded at:<?php echo $value['upload_time'];?></p></li>              
           </ul>
          </div>
        </div>
        <div>
          <h4></h4>
          <p style="text-align: justify-all;"><?php echo $value['post_details'];?></p>
        </div>
          <?php } ?>
        </figure>
      </div>   
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<?php include 'footer.php'; ?>