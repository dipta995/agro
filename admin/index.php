<?php include_once 'header.php'; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>
                  <div class="row">
                     
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        
                        <div class="col-md-6 col-xl-7">
                          <div class="table-responsive mb-3 mb-md-0">
                            <table class="table table-borderless report-table">

                             <?php 
                             $key = $select->productView(); 
                             $key1 = $select->categoryView(); 
                             $key2 = $select->contactView(); 
                             $key3 = $select->articleView(); 
                             $key4 = $select->postView(); 
                             $key5 = $select->macroView(); 
                            $key6 = $select->customerView(); 
                            $key7 = $select->farmerView(); 
                            $farmerpost=mysqli_num_rows($key);
                            $category=mysqli_num_rows($key1);
                            $contact=mysqli_num_rows($key2); 
                            $articleview=mysqli_num_rows($key3);
                            $postview=mysqli_num_rows($key4);
                            $macroview=mysqli_num_rows($key5);
                            $totalcustomer=mysqli_num_rows($key6);
                            $totalfarmer=mysqli_num_rows($key7);
                              
                             ?>
                              <tr>
                                <td class="text-muted">Total Farmers</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $totalfarmer;?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"> <?php echo $totalfarmer;?></h5></td>
                              </tr>   
                               <tr>
                                <td class="text-muted">Total Customers</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $totalcustomer;?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"> <?php echo $totalcustomer;?></h5></td>
                              </tr>  

                                <tr>
                                <td class="text-muted">Total Products</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $farmerpost;?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"> <?php echo $farmerpost;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Number of Category</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $farmerpost;?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $farmerpost;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Number of Message</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $contact;?>%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $contact;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Number of Article</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $articleview;?>%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $articleview;?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Number of Post</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $postview;?>%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td>
                                  <h5 class="font-weight-bold mb-0"><?php echo $postview;?></h5></td>
                              </tr><tr>
                                <td class="text-muted">Number of Micro-Green</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $macroview;?>%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo $macroview;?></h5></td>
                              </tr>
                               
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once 'footer.php'; ?>