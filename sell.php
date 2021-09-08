<?php   include 'header.php';?>
<style>
    label,td{
        color: black;
    }
    .redmark{
      color: red;

    }
</style>
     
 
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add product</h4><a href="productup.php">Create new product</a>
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
                          
                               <th>image</th>                 
                          <th>price</th>                     
                          <th>Quantity</th>                     
                                             
                          <th>Sold At</th>                     
                        </tr>
                      </thead>
                      <tbody>
                          <h4 style="text-align: center;">Due:</h4>
                          <h3 style="text-align: center;">
                        <?php

               echo $select->sellproduct_cal($farmer_id)." TAKA";
               $key = $select->sellproduct($farmer_id);
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?></h3>
                        <tr>
                          <td><?php echo $i; ?></td>
                      
                    
                          <td><img style="height: 80px; width: 100px;" src="<?php echo $value['product_image']; ?>"></td>
                          <td><?php echo $value['product_price']; ?></td>
                          <td><?php echo $value['product_qty']. " /". $value['unit_name']; ?></td>
                          <td><?php echo $value['created_at']; ?></td>
               
                       
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
      <?php include 'footer.php'; ?>