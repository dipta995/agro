<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customers</h4> 
                  <p class="card-description">                  
                  </p>
       

                </div>
              </div>
            </div>
          </div>
          <table class="table table-dark table-bordered">

          <thead>
                        <tr>
                          <th>#</th>
                          <th>Sleep Number</th>
                          <th>Customer Name</th>
                          <th>Customer Phone</th>
                          <th>Due</th>   

                                             
                                              
                          <th></th>                     
                        </tr>
                      </thead> 
                      <tbody>
          <?php
          
                         $key = $select->sleeplistcustomer();
               $i = 0;
              foreach ($key as $value) {  $i++;          ?>

                 <tr style="color: green;">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['sleep_no']; ?></td>
                             <td><?php echo $value['customer_name']; ?></td>
                             <td><?php echo $value['customer_phone']; ?></td>
                             <td>
                             <?php echo $due = $select->sleepamount($value['customer_id']);  ?> Taka
                             <?php if ($due>0) {
                               echo "<a href='pay.php?customerid=". $value['customer_id']."'>Pay</a>";
                             } ?>
                             </td>
                             <td> <a href="?sleepno=<?php echo $value['sleep_no']; ?>">View order</a></td>
                         
                        </tbody>
                
             
                         
                       
                      <?php } ?>
           <table class="table table-dark table-bordered">

          <thead>
                      
                      </thead>
                      <tbody>
                        
<?php 
 if (isset($_POST['confirm'])) {
  $update->orderConfirm($_POST);
 }
if (isset($_GET['sleepno'])) {
  $sleep = $_GET['sleepno'];

$pr  = $select->productlist($sleep);
foreach ($pr as $values) {
 

?>
                        <tr style="color: green;">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $values['product_title']; ?></td>
                          <td><?php echo $total =($values['product_price']*$values['product_qty']); ?> Taka</td>
                          <td><?php echo $values['product_qty']; ?></td>
                 
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $values['product_image']; ?>"></td>

                         
                          <td> 
                           <?php 
                            if ($values['process']==0) {
                              
                           ?>
                         <form method="post" action="">
                           <input type="hidden" value="<?php echo $values['order_id']; ?>" name="order_id" id="">
                           <input class="btn btn-info" type="submit" name="confirm" value="Confirm Now">
                         </form>

                         <?php } else { echo "Devivered "; }?>
                        </td>
                          
                         
                        </tr>

                        <?php } }?>

       
                      </tbody>
                      
                 
                      
                    </table>
         
       
              <?php include_once 'footer.php'; ?>