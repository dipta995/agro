<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Details</h4> 
                  <p class="card-description">                  
                  </p>
                  <?php 
                 /* if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insertab'])){
                    $postinsert = $insert->articleInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }*/
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updateab'])){
                    $postupdate = $update->aboutdesUpdate($_POST,$_GET['aboutdesid']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                /*if (isset($_GET['deleteaboutdes'])) {
                  $deletecat = $_GET['deleteaboutdes'];
                $delete->aboutdesDelete($deletecat);
                }else*/if (isset($_GET['aboutdesid'])) {
                  

              $key = $select->aboutdetailsviewid($_GET['aboutdesid']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">About Title</label>
                      <input type="text" name="aboutdes_title" class="form-control" id="exampleInputName1" value="<?php echo $value['aboutdes_title'];?>">
                    </div>
                    
                 
                    <div class="form-group">
                      <label for="exampleTextarea1">About details</label>
                      <textarea name="aboutdes_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['aboutdes_details'];?></textarea>
                    </div>
                    <button type="submit" name="updateab" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } } ?>
                 
  

                </div>
              </div>
            </div>
           
        <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">article Post</h4> 
                  <p class="card-description">                  
                  </p>
                  <?php 
              /*    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->articleInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }*/
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->aboutmeUpdate($_POST,$_FILES,$_GET['editaboutme']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                /*if (isset($_GET['deleteaboutme'])) {
                  $deletecat = $_GET['deleteaboutme'];
                $delete->articleDelete($deletecat);
                }else*/if (isset($_GET['editaboutme'])) {
                  

              $key = $select->aboutmeid($_GET['editaboutme']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Developer Name</label>
                      <input type="text" name="aboutme_name" class="form-control" id="exampleInputName1" value="<?php echo $value['aboutme_name'];?>">
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>article image</label>
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
                      <label for="exampleTextarea1">Designation</label>
                      <textarea name="aboutme_details" class="form-control" id="exampleTextarea1" rows="10"><?php echo $value['aboutme_details'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }?>
         
  

                </div>
              </div>
            </div>
           
        
         
         
          </div>
          <table class="table table-dark table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>                     
                                        
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->aboutdetailsview();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['aboutdes_title']; ?></td>
                          <td><?php echo $select->textshort($value['aboutdes_details'],60); ?></td>
                          
                         
                          <td>
                            <a href="?aboutdesid=<?php echo $value['aboutdes_id']; ?>">Edit</a>
                            
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                    <table class="table table-dark table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Designation</th>                     
                          <th>image</th>                     
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->aboutme();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['aboutme_name']; ?></td>
                          <td><?php echo $select->textshort($value['aboutme_details'],60); ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['image']; ?>"></td>
                         
                          <td>
                            <a href="?editaboutme=<?php echo $value['aboutme_id']; ?>">Edit</a>
                            
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
             <?php include_once 'footer.php'; ?>