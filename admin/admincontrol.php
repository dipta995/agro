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
                  
           if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->admindatains($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->admindataup($_POST,$_FILES,$_GET['editadmin']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                if (isset($_GET['deladmin'])) {
                  $deladmin = $_GET['deladmin'];
                $delete->adminDelete($deladmin);
                }elseif (isset($_GET['editadmin'])) {
                  
              $key = $select->adminViewid($_GET['editadmin']);
    
              foreach ($key as $value) {
         
              ?>
                 <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Name</label>
                      <input type="text" name="admin_name" class="form-control" id="exampleInputName1" value="<?php echo $value['admin_name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Email</label>
                      <input type="text" name="admin_email" class="form-control" id="exampleInputName1" value="<?php echo $value['admin_email']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Password</label>
                      <input type="text" name="admin_password" class="form-control" id="exampleInputName1" value="<?php echo $value['admin_password']; ?>">
                    </div>
                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>Image</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['image'];?>">
                        </div>
                      </div>
                      
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Access</label>
                      <select name="acc" class="form-control">

                        
                          <?php
                          if ($value['acc']==0) {
                            echo  '<option value="0">Admin</option>';
                            echo  '<option value="1">Morderator</option>';
                            
                          }elseif ($value['acc']==1) {
                            echo  '<option value="1">Morderator</option>';
                            echo  '<option value="0">Admin</option>';
                          }
                          ?>
                    
                        
                      </select>
                    </div>
                    
                   
                    <button type="submit" name="update" class="btn btn-primary mr-2">Submit</button>
           
                  </form>
                  

          <?php } }else{ ?>
                   <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Name</label>
                      <input type="text" name="admin_name" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Email</label>
                      <input type="text" name="admin_email" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Admin Password</label>
                      <input type="text" name="admin_password" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                        <div class="form-group">
                      <label for="exampleInputName1">Access</label>
                      <select name="acc" class="form-control">
                        <option value="0">Admin</option>
                        <option value="1">Morderator</option>
                      </select>
                    </div>
                   
                    <button type="submit" name="insert" class="btn btn-primary mr-2">Submit</button>
           
                  </form>

          <?php } ?>
  
               

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
                          <th>Act</th>
                          <th>Image</th>
                         
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->adminView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['admin_name']; ?></td>
                          <td><?php echo $value['admin_email']; ?></td>
                        
                          <td><?php 
                                if ($value['acc']==0) {
                                  echo 'Admin';
                                }elseif ($value['acc']==1) {
                                  echo 'Morderator';
                                }

                             ?></td>
                          <td><img src="../<?php echo $value['image']; ?>"></td>
                          <td> <a href="?editadmin=<?php echo $value['admin_id']; ?>">Edit</a> </td>
                          <td> <a href="?deladmin=<?php echo $value['admin_id']; ?>">Delete</a> </td>
                       
                          
                          
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       
              <?php include_once 'footer.php'; ?>