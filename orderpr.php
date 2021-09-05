<?php 
include 'header.php'; 

Session::checkSession($redirect_link_var);
  


?>
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
   
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>

 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading">কৃষক বাজার বিস্তারিত</header>
             
     
         
        </figure>

      </div>
 
      <table class="table table-dark table-bordered">

          <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Price</th>                     
                          <th>Quantity</th>      
                          <th>Image</th>                
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                       
 
if ($customer_id==true) {
  
  $orderview = $select->vieworderProduct($customer_id);
}
                         
              $i = 0;
              $totals =0;
              $totalproduct='';
              foreach ($orderview as $values) {
                $i++;
                $getpr = $select->productViewIDpr($values['product_id']);
                foreach ($getpr as  $val) {
            
                  $totalproduct = $val['product_qty'];
                }
                        ?>

                        <tr style="color: green;">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $values['product_title']; ?></td>
                          <td><?php echo $total =($values['product_price']*$values['product_qty']); ?> <input type="hidden" values="<?php echo $values['product_price']; ?>" name="product_price">TAKA</td>
                          <td> 
                          <?php echo $values['product_qty']; ?>
                        </td>
                 
                          <td><img style="height: 80px; width: 100px;" src="<?php echo $values['product_image']; ?>"></td>

                          
                         <td><?php  if($values['process']==0){
                           echo "<span style='color:red;'>Pending</span>";
                         }elseif ($values['process']==1) {
                          echo "<span style='color:green;'>Delivered</span>";
                          echo '<a class="btn btn-info" href="viewproduct.php?productid='.$values['product_id'].'">Feedback Now</a>';
                         } ?>
                         
                        </td>
                          
                        
                        </tr>

                        

      
                      <?php $totals += $total; } ?>
                      </tbody>
                      <h2>Total: <?php echo $totals;  ?> Taka</h2>
                      <h2>Due: <?php echo $due = $select->sleepamount($customer_id);  ?> Taka</h2>

                      <?php  if($select->sleepamount($customer_id)!=0){
                        echo '<a class="btn btn-info" href="payment.php">Pay</a>';
                        }  ?>
                         
         
                    </table>



      
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<?php include 'footer.php'; ?>

