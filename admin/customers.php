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
                  <?php 
                  
              /*   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $catinsert = $update->categoryUpdate($_POST,$_GET['editcat']);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }*/

                if (isset($_GET['lockcustomer'])) {
                  $lockcus = $_GET['lockcustomer'];
                $update->lockCustomer($lockcus);
                } 

                if (isset($_GET['unlockcustomer'])) {
                  $unlockcus = $_GET['unlockcustomer'];
                $update->unlockCustomer($unlockcus);
                }
                ?>
  

                </div>
              </div>
            </div>
          </div>
          <table class="table table-dark table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Image</th>
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->customerView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['customer_name']; ?></td>
                          <td><?php echo $value['customer_email']; ?></td>
                          <td><?php echo $value['customer_phone']; ?></td>
                          <td><img src="../<?php echo $value['image']; ?>"></td>
                          <td>
                            <?php
                            if ($value['lock_cus']==0) { ?>
                             
                            <a href="?lockcustomer=<?php echo $value['customer_id']; ?>">Lock Now</a>
                            <?php }else{ ?>
                             <a href="?unlockcustomer=<?php echo $value['customer_id']; ?>">Un-Lock Now</a>
                         <?php } ?>
                        
                             
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       
              <?php include_once 'footer.php'; ?>