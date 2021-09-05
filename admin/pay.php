<?php 
include 'header.php';  
$customer_id = $_GET['customerid'];

 ?>

 
 
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Account</h4>
                  <p class="card-description">                  
                  </p>
              
                        <div class="row">
                                    
                            
                                    <div class="col-md-6">
                                    
                                    <h4 style="margin-top: 30px; text-align: center; color: #fff;">
                                        
                    <?php
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                        $data =  $catinsert = $insert->paymentdatainsert($_POST,$customer_id);
                        if ($data) {
                            echo "<script> window.location = 'ordercustomer.php';</script>";
                        }
                    }
                    ?>
                                    </h4>
                                    <form method="post" action="" class="forms-sample">
                                        <div class="form-group">

                                            <label>Bkash Number</label>
                                            <input type="hidden" value="00000000000" name="account_no">
                                    <label>OTP Number</label>
                                            <input type="hidden" value="0000" name="otp">
                                            <label>Amount</label>
                                            <input class="form-control" type="text" readonly value="<?php echo $select->sleepamount($customer_id);  ?>" name="accounts">
                    </div>
                                            <button class="btn btn-success">Confirm</button>
                                        </form>
                                    </div>
                                </div>


                </div>
              </div>
            </div>
          </div>
  <?php include 'footer.php'; ?>

          
                   
                 
                      
             



 

