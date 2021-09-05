<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">article Post</h4><a href="createarticle.php">Create new article</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->articleInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->articleUpdate($_POST,$_FILES,$_GET['editarticle']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                if (isset($_GET['deletearticle'])) {
                  $deletecat = $_GET['deletearticle'];
                $delete->articleDelete($deletecat);
                }elseif (isset($_GET['editarticle'])) {
                  

              $key = $select->articleViewid($_GET['editarticle']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">article Title</label>
                      <input type="text" name="article_title" class="form-control" id="exampleInputName1" value="<?php echo $value['article_title'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">article View</label>
                      <select name="article_status" class="form-control">
                        <?php 
                          if ($value['article_status']==1) {
                            echo "<option value='1'>Front view </option><option value='0'>Null</option>";
                          } elseif ($value['article_status']==0) {
                            echo "<option value='0'>Null</option><option value='1'>Front view </option>";
                          }
                         ?>
                      </select>
                    </div>
                    
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>article image</label>
                      <input type="file" name="article_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['article_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">article details</label>
                      <textarea name="article_description" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['article_description'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">article Title</label>
                      <input type="text" name="article_title" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">article View</label>
                      <select name="article_status" class="form-control">
                        <option  value="1">Front view</option>
                        <option value="0">Null</option>
                      </select>
                    </div>
                    
                  
                      
                    <div class="form-group">
                      <label>article image</label>
                      <input type="file" name="article_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">article details</label>
                      <textarea name="article_description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
              $key = $select->articleView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['article_title']; ?></td>
                          <td><?php echo $select->textshort($value['article_description'],60); ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['article_image']; ?>"></td>
                         
                          <td>
                            <a href="?editarticle=<?php echo $value['article_id']; ?>">Edit</a>
                            <a href="?deletearticle=<?php echo $value['article_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
             <?php include_once 'footer.php'; ?>