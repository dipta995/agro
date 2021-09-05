<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add district</h4><a href="createdis.php">Create new district</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $catinsert = $insert->disInsert($_POST);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $catinsert = $update->disUpdate($_POST,$_GET['editdis']);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }

                if (isset($_GET['deletedis'])) {
                  $deletedis = $_GET['deletedis'];
                $delete->disDelete($deletedis);
                }elseif (isset($_GET['editdis'])) {
                  

              $key = $select->disViewidjoin($_GET['editdis']);
    
              foreach ($key as $value) {
         
              ?>
  
                   <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Division Name</label>
                      <select name="division_id" class="form-control">
                        <option class="form-control" value="<?php echo $value['division_id']; ?>" ><?php echo $value['div_name']; ?></option>
               <?php
              $key = $select->divView();
              foreach ($key as $values) {
              
            ?>
                        <option class="form-control" value="<?php echo $values['division_id']; ?>" ><?php echo $values['div_name']; ?></option>
                      <?php } ?>
                      </select>
                    </div> 
                     <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" name="dis_name" class="form-control" id="exampleInputUsername1" value="<?php echo $value['dis_name']; ?>">
                    </div>                  
                    <button name="update" type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample">
                     <div class="form-group">
                      <label for="exampleInputUsername1">Division Name</label>
                      <select name="division_id" class="form-control">
                        
               <?php
              $key = $select->divView();
              foreach ($key as $values) {
              
            ?>
                        <option class="form-control" value="<?php echo $values['division_id']; ?>" ><?php echo $values['div_name']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">district Name</label>
                      <input type="text" name="dis_name" class="form-control" id="exampleInputUsername1" placeholder="district Name">
                    </div>                  
                    <button name="insert" type="submit" class="btn btn-primary mr-2">Submit</button>
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
                          <th>divisin name</th>
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->disView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['dis_name']; ?></td>
                          <td>
                            <a href="?editdis=<?php echo $value['district_id']; ?>">Edit</a>
                            <a href="?deletedis=<?php echo $value['district_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       
              <?php include_once 'footer.php'; ?>