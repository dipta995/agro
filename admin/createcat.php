<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4><a href="createcat.php">Create new Category</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $catinsert = $insert->categoryInsert($_POST);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $catinsert = $update->categoryUpdate($_POST,$_GET['editcat']);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }

                if (isset($_GET['deletecat'])) {
                  $deletecat = $_GET['deletecat'];
                $delete->categoryDelete($deletecat);
                }elseif (isset($_GET['editcat'])) {
                  

              $key = $select->categoryViewid($_GET['editcat']);
    
              foreach ($key as $value) {
         
              ?>
  
                   <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" name="category_name" class="form-control" id="exampleInputUsername1" value="<?php echo $value['category_name']; ?>">
                    </div>                  
                    <button name="update" type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" name="category_name" class="form-control" id="exampleInputUsername1" placeholder="Category Name">
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
                          <th>Category name</th>
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->categoryView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['category_name']; ?></td>
                          <td>
                            <a href="?editcat=<?php echo $value['category_id']; ?>">Edit</a>
                            <a href="?deletecat=<?php echo $value['category_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       
              <?php include_once 'footer.php'; ?>