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
                  
           

                if (isset($_GET['lockfarmer'])) {
                  $lockcus = $_GET['lockfarmer'];
                $update->lockFarmer($lockcus);
                } 

                if (isset($_GET['unlockfarmer'])) {
                  $unlockcus = $_GET['unlockfarmer'];
                $update->unlockFarmer($unlockcus);
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
                          <th>Address</th>
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->farmerView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['farmer_name']; ?></td>
                          <td><?php echo $value['farmer_email']; ?></td>
                          <td><?php echo $value['farmer_phone']; ?></td>
                          <td><img src="../<?php echo $value['image']; ?>"></td>
                          <td><?php echo $value['farmer_address']; ?></td>
                          <td>
                            <?php
                            if ($value['lock_far']==0) { ?>
                             
                            <a href="?lockfarmer=<?php echo $value['farmer_id']; ?>">Lock Now</a>
                            <?php }else{ ?>
                             <a href="?unlockfarmer=<?php echo $value['farmer_id']; ?>">Un-Lock Now</a>
                         <?php } ?>
                        
                             
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       
              <?php include_once 'footer.php'; ?>