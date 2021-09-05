<?php include 'header.php'; ?>



</div>
 
<div class="wrapper row2">
  <section class="hoc container clear"> 
   
    <div class="sectiontitle">
      <p style="font-size: 30px;" class="nospace font-xs">কৃষি তথ্য</p>
    </div>
  <?php 
  if (isset($_GET['articleid'])) {
    ?> 

 <div class="row row2">
              <?php
              $key = $select->articleViewid($_GET['articleid']);
         
              foreach ($key as $value) {
      
              
            ?>
  <div class="col-md-12"> 
    <figure><a class="imgover" href="?articleid=<?php echo $value['article_id'];?>"><img style=" height: 350px; width: 270px;" src="<?php echo $value['article_image']; ?>" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
               
                <li>
                  <time datetime="2045-04-06T08:15+00:00"><?php echo $value['creation']; ?></time>
                </li>
              </ul>
              <h6 class="heading"><a href="#"><?php echo $value['article_title']; ?></a></h6>
              <p ><?php echo $value['article_description']; ?></p>
            </figcaption>
          </figure>
        </div>

<?php } ?>

</div>
    <?php
  }else{ ?>


 <div class="row row2">
              <?php
              $key = $select->articleView();
         
              foreach ($key as $value) {
      
              
            ?>
  <div class="col-md-4"> 
    <figure><a class="imgover" href="?articleid=<?php echo $value['article_id'];?>"><img style="height: 250px; width: 270px;" src="<?php echo $value['article_image']; ?>" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                
                <li>
                  <time datetime="2045-04-06T08:15+00:00"><?php echo $value['creation']; ?></time>
                </li>
              </ul>
              <h6 class="heading"><a href="#"><?php echo $value['article_title']; ?></a></h6>
            </figcaption>
          </figure>
        </div>

<?php } ?>

</div>
<?php } ?>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<?php include 'footer.php'; ?>