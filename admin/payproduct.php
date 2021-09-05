<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <?php 
          
               $key = $select->commentviewadmin();
              
              foreach ($key as $value) {
          
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                          
 
                </div>
              </div>
            </div>
          </div>
          

        <?php }  

/*   if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['replaysend'])) {
                    $commentsend = $insert->replayInsert($_POST,$productid);
                    if (isset($commentsend)) {
                      echo $commentsend;
                      echo "<script> window.location = 'comment.php';</script>";
                    }
                }*/
          ?>
   
      
               <?php include_once 'footer.php'; ?>