<?php include 'header.php';
Session::checkSession($redirect_link_var); 

  $per_page = 9;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;

?>


  
<script type="text/javascript">
 $(document).ready(function(){

    
     $("#div_name").change(function(){
           var div_name=$("#div_name").val();
           $.ajax({
            type:"post",
            url:"ajax.php",
            data:"div_name="+div_name,
            success:function(data){
                    $("#dis_name").html(data);
            }
           });
     });
 });
</script>
  
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row1">
   <section style="width: 300px; margin: 0 auto;" id="ctdetails" class="hoc clear">  
      <form method="get" action="test.php">
    
            <label for="exampleFormControlSelect1">বিভাগ</label>
           <select id="div_name" name="div_search" class="form-control" id="exampleFormControlSelect1 division">
              <option value="" >--Select--</option>
                <?php
              $key = $select->divView();
              foreach ($key as $value) {
              
            ?>
              <option name="div_search" value="<?php echo $value['division_id'];?>"><?php echo $value['div_name'];?></option>
            <?php } ?>
              
            </select>
    

            
            <label for="exampleFormControlSelect1">জেলা</label>
            <select id="dis_name" name="dis_search" class="form-control" id="exampleFormControlSelect1 district">
            <option value="">Select Division First</option>
            </select>

    
            <label for="exampleFormControlSelect1">কিওয়রড লিখুন</label>
           <input class="form-control"  style="color:black; width: 100%;"type="text" name="search">
  
      <br>
           <input class="btn btn-primary" type="submit" name="submit" value="search">
        
  </form>
  </section>
</div>



<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p style="font-size: 30px;" class="nospace font-xs">ক্রয় করুন </p>
    </div>
 <div class="row row2">
              <?php
              $key = $select->productViewjoinSPpagination($start_form,$per_page);
         
              foreach ($key as $value) {
      
              
            ?>
  <div class="col-md-4"> 
    <figure><a class="imgover" href="viewproduct.php?productid=<?php echo $value['product_id']; ?>"><img style="height: 250px; width: 270px;" src="<?php echo $value['product_image']; ?>" alt=""></a>
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
            <figcaption>
              <ul class="nospace meta clear">
  
                
              </ul>
              <h6 class="heading"><a href="#"><?php echo $value['product_title']; ?></a></h6>
            </figcaption>
          </figure>
        </div>

<?php } ?>

</div>
    <!-- ################################################################################################ -->
  </section>
    <?php 


$getCourse = $select->productViewjoinSP();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
  </section>
        <nav class="pagination">
        <ul>
          <?php echo "<li><a href='ourmarket.php?page=1'>".'&laquo;'."Previous</a></li>"; 
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<li><a href='ourmarket.php?page=".$i."'>".$i."</a>";
            }; ?>
         
       <?php echo "<li><a href='ourmarket.php?page=1'>".'&raquo;'."Next</a></li>"; ?>
     
        </ul>
      </nav>
 
      <br>
</div>
<?php include 'footer.php'; ?>