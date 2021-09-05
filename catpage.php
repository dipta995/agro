<?php 
include 'header.php'; 
$categoryid = $_GET['categoryid'];
  $per_page = 12;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;
?>
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
  </div>
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p style="font-size: 30px;" class="nospace font-xs">ক্রয় করুন</p>
    </div>

 <div class="row row2">
              <?php
                 $key = $select->productViewIDpagination($start_form,$per_page,$categoryid);
              foreach ($key as $value) {
      
              
            ?>
  <div class="col-md-4"> 
    <figure><a class="imgover" href="viewproduct.php?productid=<?php echo $value['product_id']; ?>"><img style="height: 250px; width: 270px;" src="<?php echo $value['product_image']; ?>" alt=""></a>




            <figcaption>
              <div class="row">
                <div class="col-sm-6">
                  <ul class="nospace meta clear">
                <li> <a href="#"><?php echo $value['product_price']; ?> =/Taka</a></li>
                 <li> <?php $count = $select->countratting($value['product_id']);
                if ($count>0) {
                
             for ($i=0; $i < $count; $i++) { 
             echo '<span style="color: orange;" class="fa fa-star checked"></span>';
             }
             for ($i=0; $i < 5- $count; $i++) { 
              echo '<span style="color:#444;" class="fa fa-star"></span>';
             }
            }else{
              for ($i=0; $i < 5; $i++) { 
                echo '<span style="color:#444;" class="fa fa-star"></span>';
                }
            }

              

            ?></li>
              </ul>
                </div>
                <div class="col-sm-6">
                  <br>
                      <a class="btn btn-primary" href="viewproduct.php?productid=<?php echo $value['product_id']; ?>">ক্রয় করুণ</a>
                </div>
              </div>
              
             

              <h6 class="heading"><a href="#"><?php echo $value['product_title']; ?></a></h6>
            </figcaption>
          </figure>
        </div>

<?php } ?>

</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <?php 


$getCourse = $select->productViewID($categoryid);
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
  </section>
        <nav class="pagination">
        <ul>
          <?php echo "<li><a href='catpage.php?categoryid=$categoryid&page=1'>".'&laquo;'."Previous</a></li>"; 
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<li><a href='catpage.php?categoryid=$categoryid&page=".$i."'>".$i."</a>";
            }; ?>
         
       <?php echo "<li><a href='catpage.php?categoryid=$categoryid&page=1'>".'&raquo;'."Next</a></li>"; ?>
     
        </ul>
      </nav>
 
      <br>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
 