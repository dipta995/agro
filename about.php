<?php include 'header.php'; ?>



</div>

<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <?php
       $key = $select->aboutdetailsview();
         
              foreach ($key as $value) {
      ?>
      <p style="font-size: 20px;" class="nospace font-xs"><?php echo $value['aboutdes_title']; ?></p>
   
    </div>
       <p style="width: 960px; margin: 0 auto;">
<?php echo $value['aboutdes_details']; ?>
</p>
  <?php } ?>
 


 <div class="row row2">


              <?php
             /* $key = $select->aboutdetailsview();
         
              foreach ($key as $value) {
      */
              
            ?>
    
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <p style="font-size: 20px;" class="nospace font-xs"></p> 
    </div>

    <?php
              $key = $select->aboutme();
              foreach ($key as $value) {
              
            ?>
    <article id="points" class="group">
      <div class="two_third first">
        <h6 style="color: orange;" class="heading"><?php echo $value['aboutme_name']; ?></h6>
        <p> <?php echo $value['aboutme_details']; ?></p>
       
      </div>
      <div class="one_third last"><a class="imgover" href="#"><img src="<?php echo $value['image']; ?>" alt=""></a></div>
    </article>

 <?php } ?>
    <!-- ################################################################################################ -->
  </section>
 
    

 

</div>
 
    <!-- ################################################################################################ -->
  </section>
</div>
<?php include 'footer.php'; ?>