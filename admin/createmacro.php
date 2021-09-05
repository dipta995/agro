<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Macro Post</h4><a href="createmacro.php">Create new macro</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->macroInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->macroUpdate($_POST,$_FILES,$_GET['editmacro']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                if (isset($_GET['deletemacro'])) {
                  $deletecat = $_GET['deletemacro'];
                $delete->macroDelete($deletecat);
                }elseif (isset($_GET['editmacro'])) {
                  

              $key = $select->macroViewid($_GET['editmacro']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Macro Title</label>
                      <input type="text" name="macro_title" class="form-control" id="exampleInputName1" value="<?php echo $value['macro_title'];?>">
                    </div>
                    
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>Macro image</label>
                      <input type="file" name="macro_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['macro_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">macro details</label>
                      <textarea name="macro_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['macro_details'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">macro Title</label>
                      <input type="text" name="macro_title" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    
                  
                      
                    <div class="form-group">
                      <label>macro image</label>
                      <input type="file" name="macro_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">macro details</label>
                      <textarea name="macro_details" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
                          <th>imamge</th>                     
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->macroView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['macro_title']; ?></td>
                          <td><?php echo $select->textshort($value['macro_details'],60); ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['macro_image']; ?>"></td>
                         
                          <td>
                            <a href="?editmacro=<?php echo $value['macro_id']; ?>">Edit</a>
                            <a href="?deletemacro=<?php echo $value['macro_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
               <?php include_once 'footer.php'; ?>