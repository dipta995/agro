<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Slide</h4><a href="createslide.php">Create new Slide</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->slideInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->slideUpdate($_POST,$_FILES,$_GET['editslide']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                if (isset($_GET['deleteslide'])) {
                  $deletecat = $_GET['deleteslide'];
                $delete->slideDelete($deletecat);
                }elseif (isset($_GET['editslide'])) {
                  

              $key = $select->slideViewid($_GET['editslide']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Slide Title</label>
                       
                       <textarea name="slide_title" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['slide_title'];?></textarea>
                    </div>
                     <div class="form-group">
                      <label for="exampleTextarea1">Slide details</label>
                      <textarea name="slide_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['slide_details'];?></textarea>
                    </div>
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>Slide image</label>
                      <input type="file" name="slide_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['slide_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                   
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Slide Title</label>
                       <textarea name="slide_title" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                     <div class="form-group">
                      <label for="exampleTextarea1">Slide details</label>
                      <textarea name="slide_details" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                  
                      
                    <div class="form-group">
                      <label>Slide image</label>
                      <input type="file" name="slide_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
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
                          <th>Title</th>
                          <th>Description</th>                     
                          <th>image</th>                     
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->slideView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['slide_title']; ?></td>
                          <td><?php echo $value['slide_details']; ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['slide_image']; ?>"></td>
                         
                          <td>
                            <a href="?editslide=<?php echo $value['slide_id']; ?>">Edit</a>
                            <a href="?deleteslide=<?php echo $value['slide_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
             <?php include_once 'footer.php'; ?>