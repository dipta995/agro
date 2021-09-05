<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <?php 
          if (isset($_GET['readit'])) {
               $key = $select->contactViewid($_GET['readit']);
              
              foreach ($key as $value) {
          
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title"><?php echo $value['name']; ?></h4>
                  <p><?php echo $value['email']; ?> </p>
                  <p><?php echo $value['phone']; ?> </p>
                  <p><?php echo $value['comment']; ?> </p>
                  <p class="card-description">                  
                  </p>         

                </div>
              </div>
            </div>
          </div>

        <?php } } else{

 if (isset($_GET['editcontact'])) {
                  $editcontact = $_GET['editcontact'];
                $update->contactUpdate($editcontact);
                }
                   if (isset($_GET['deletecontact'])) {
                  $deletecat = $_GET['deletecontact'];
                $delete->contactDelete($deletecat);
                }
          ?>
          <table class="table table-dark table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>name</th>
                          <th>Email</th>
                          <th>phone</th>
                          <th>contact</th>                     
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->contactView();
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td><?php echo $value['phone']; ?></td>
                          <td><?php echo $select->textshort($value['comment'],50); ?> <a href="?readit=<?php echo $value['contact_id']; ?>">read</a> </td>
                          <td>
                            <a href="?editcontact=<?php echo $value['contact_id']; ?>">
                              <?php if ($value['seen']==0) {
                                echo "Seen";
                              }else{
                                echo "Already seen";}?>
                            </a>
                            <a href="?deletecontact=<?php echo $value['contact_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
       <?php } ?>
               <?php include_once 'footer.php'; ?>