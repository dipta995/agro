<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Division</h4><a href="creatediv.php">Create new Division</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $divinsert = $insert->divInsert($_POST);
                    if (isset($divinsert)) {
                      echo $divinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $divinsert = $update->divUpdate($_POST,$_GET['editdiv']);
                    if (isset($divinsert)) {
                      echo $divinsert;
                    }
                }

                if (isset($_GET['deletediv'])) {
                  $deletediv = $_GET['deletediv'];
                $delete->divDelete($deletediv);
                }elseif (isset($_GET['editdiv'])) {
                  

              $key = $select->divViewid($_GET['editdiv']);
    
              foreach ($key as $value) {
         
              ?>
  
                   <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Division Name</label>
                      <input type="text" name="div_name" class="form-control" id="exampleInputUsername1" value="<?php echo $value['div_name']; ?>">
                    </div>                  
                    <button name="update" type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Division Name</label>
                      <input type="text" name="div_name" class="form-control" id="exampleInputUsername1" placeholder="Divisin Name">
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
                          <th>Division name</th>
                          <th>Action</th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->divView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['div_name']; ?></td>
                          <td>
                            <a href="?editdiv=<?php echo $value['division_id']; ?>">Edit</a>
                            <a href="?deletediv=<?php echo $value['division_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
           <?php include_once 'footer.php'; ?>