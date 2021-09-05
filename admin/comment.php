<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <?php 
          error_reporting(0);
               $key = $select->commentviewadmin();
              
              foreach ($key as $value) {
          
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div style="border: 2px solid green;"><p><?php echo $value['farmer_name']; ?></p><p><?php echo $value['product_title']; ?></p><img style="height:60px; width:50px;" src="../<?php echo $value['product_image']; ?>"></div>
                  <div style="border: 2px solid red;">
                    
                  <h4 class="card-title"><?php echo $value['name']."("; ?><?php echo $value['email'].")"; ?> </h4>  
                  <p><span style="font-size: 16px;color: red;">Comment:</span><?php echo $value['comment']; ?> </p>
                  </div>
                          

           <form action="" method="post">
              <textarea name="replay"></textarea>
              <input type="hidden" value="<?php echo $value['comment_id']; ?>" name="comment_id">
              <input class="btn btn-success" type="submit" value="Replay" name="replaysend">
            </form>
                </div>
              </div>
            </div>
          </div>
          

        <?php }  

   if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['replaysend'])) {
                    $commentsend = $insert->replayInsert($_POST,$productid);
                    if (isset($commentsend)) {
                      echo $commentsend;
                      echo "<script> window.location = 'comment.php';</script>";
                    }
                }
          ?>
   
      
               <?php include_once 'footer.php'; ?>