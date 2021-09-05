<?php include 'header.php'; ?>



</div>

<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p style="font-size: 20px;" class="nospace font-xs">চাষ করুন ঘরেই আলো বাতাস ছাড়া...</p>
    </div>
  <?php 
  if (isset($_GET['macroid'])) {
    ?> 

 <div class="row row2">
              <?php
              $key = $select->macroViewid($_GET['macroid']);
         
              foreach ($key as $value) {
      
              
            ?>

             <div class="row">
          <div class="col-md-2"></div>
           <div class="productind col-md-4">
              <img src="<?php echo $value['macro_image'];?>">
           </div>
        <div class="spandes col-md-6">
           <ul>
             <li><span><?php echo $value['macro_title'];?></span></li>
             <li></li>
             <li><p style="font-size: 12px; margin-top: 20px;">uploaded at:<?php echo $value['date'];?></p></li>              
           </ul>
          </div>
        </div>
        <div>
          <h4></h4>
          <p style="text-align: justify-all;"><?php echo $value['macro_details'];?></p>
        </div>





<?php } ?>

</div>
    <?php
  }else{ ?>


 <div class="row row2">
              <?php
              $key = $select->macroView();
         
              foreach ($key as $value) {
      
              
            ?>
  <div class="col-md-4"> 
    <figure><a class="imgover" href="?macroid=<?php echo $value['macro_id'];?>"><img style="height: 250px; width: 270px;" src="<?php echo $value['macro_image']; ?>" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
               </li>
                <li>
                  <time datetime="2045-04-06T08:15+00:00"><?php echo $value['date']; ?></time>
                </li>
              </ul>
              <h6 class="heading"><a href="#"><?php echo $value['macro_title']; ?></a></h6>
            </figcaption>
          </figure>
        </div>

<?php } ?>

</div>
<?php } ?>
    <!-- ################################################################################################ -->
  </section>
</div>
<?php include 'footer.php'; ?>