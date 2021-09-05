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
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        if (isset($_GET['deletcart'])) {
                          $delid = $_GET['deletcart'];
                          $delete->cartDelete($delid);
                        }
 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatecart'])) {
 
    $update->cartUpdate($_POST,$customer_id);
 }

if ($customer_id==true) {
  
  $orderview = $select->viewCartProduct($customer_id);
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
                            <form method="post" action="">
                              <input type="hidden" name="cart_id" value="<?php echo $values['cart_id']; ?>">
                             

                          <input type="number" style="width: 50px; " value="<?php echo $values['product_qty']; ?>" name="product_qty" min="1" max="<?php echo $totalproduct; ?>" class="from-control" step="1"> 
                          <button name="updatecart">UP</button>
                            </form>
                        <style>
                          input[type="number"] {
                          -moz-appearance: auto;
                              appearance: auto;
}
                        </style>
                        </td>
                 
                          <td><img style="height: 80px; width: 100px;" src="<?php echo $values['product_image']; ?>"></td>

                          <td> <a class="btn btn-danger" href="?deletcart=<?php  echo $values['cart_id']; ?>">Remove</a></td>
                         
                          
                        
                        </tr>

                        

      
                      <?php $totals += $total; } ?>
                      </tbody>
                      <h2>Total: <?php echo $totals;  ?></h2> 


                      <?php 
                      
                        if (isset($_POST['ordertbl'])) {
                        
                         $insert->addToOrder($customer_id);
                        }
                        if ($totals!=0) {
                          
                       
                      ?>
<form action="" method="post">
  
  <input class="btn btn-primery" type="submit" value="Confirm order" name="ordertbl">
</form>
                
                <?php } ?>      
                       
         
                    </table>



      
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<?php include 'footer.php'; ?>

