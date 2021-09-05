<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Post</h4><a href="createpost.php">Create new Post</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $postinsert = $insert->postInsert($_POST,$_FILES);
                    if (isset($postinsert)) {
                      echo $postinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $postupdate = $update->postUpdate($_POST,$_FILES,$_GET['editpost']);
                    if (isset($postupdate)) {
                      echo $postupdate;
                    }
                }

                if (isset($_GET['deletepost'])) {
                  $deletecat = $_GET['deletepost'];
                $delete->postDelete($deletecat);
                }elseif (isset($_GET['editpost'])) {
                  

              $key = $select->postdescription($_GET['editpost']);
    
              foreach ($key as $value) {
         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Post Title</label>
                      <input type="text" name="post_title" class="form-control" id="exampleInputName1" Value="<?php echo $value['post_title'];?>">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">View</label>
                        <select name="front_view" class="form-control" id="exampleSelectGender">
                          <?php
                          $b = $value['front_view']; 
                            if ($b == 0) {
                              ?>
                             
                               <option name="front_view" value="0"> <?php echo "YES"; ?> </option>
                          <option name="front_view" value="1">NOT</option>
                         <?php }elseif ($b == 1) { ?>
                           <option name="front_view" value="1"> <?php echo "NO"; ?> </option>
                          <option name="front_view" value="0">YES</option>
                        <?php } ?>
                        </select>
                      </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>Post image</label>
                      <input type="file" name="post_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['post_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">Post details <span style="color:blue;">(10 to 400 words)</span></label>
                      <textarea name="post_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['post_details'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Post Title</label>
                      <input type="text" name="post_title" class="form-control" id="exampleInputName1" placeholder="Enter post title">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">View</label>
                        <select name="front_view" class="form-control" id="exampleSelectGender">
                          <option name="front_view" value="0">YES</option>
                          <option name="front_view" value="1">NOT</option>
                        </select>
                      </div> 
                      
                    <div class="form-group">
                      <label>Post image</label>
                      <input type="file" name="post_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">Post details<span style="color:blue;">(10 to 400 words)</span></label>
                      <textarea name="post_details" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
                          <th>Show</th>                     
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->postView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['post_title']; ?></td>
                          <td><?php echo $select->textshort($value['post_details'],60); ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['post_image']; ?>"></td>
                          <td>

                            <?php $a = $value['front_view'];
                            if ($a==0) {
                             echo 'YES';
                            }elseif($a==1){
                              echo "NO";
                            }else{
                              echo "something wrong";                            }

                            ?>
                              
                          </td>
                          <td>
                            <a href="?editpost=<?php echo $value['post_id']; ?>">Edit</a>
                            <a href="?deletepost=<?php echo $value['post_id']; ?>">Delete</a>
                           
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