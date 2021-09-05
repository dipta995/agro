<?php 
include 'header.php';  

 ?>




 <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
   
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>

 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading">পেমেন্ট</header>


          <div class="mainclass">
          	<div class="row">
          		
	          	<div class="col-md-6 left-image">
	          		<img src="images_new/bkash.jpg">
	          		
	          	</div>
	          	<div class="col-md-6 rightform">
	          		<h3 style="margin-top: 30px; text-align: center; color: #fff;">BKASH PAYMENT METHOD</h3>
	          		<h4 style="margin-top: 30px; text-align: center; color: #fff;">Bkash Account : 01781898010</h4>
                <h4 style="margin-top: 30px; text-align: center; color: #fff;">
	          		
<?php
 	 if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = $catinsert = $insert->paymentdatainsert($_POST,$customer_id);
    if ($data) {
      echo "<script> window.location = 'viewcart.php';</script>";
    }
}
?>
                </h4>
	          		<form style="margin-top: 50px; margin-left: 80px; " class="paymentfrm" action="" method="post">

	          			<label>Bkash Number</label>
	          			<input type="number" placeholder="Enter your bkash number" name="account_no">
                  <label>OTP Number</label>
	          			<input type="number" placeholder="Enter your OTP number" name="otp">
	          			<label>Amount</label>
	          			<input type="text" readonly value="<?php echo $select->sleepamount($customer_id);  ?>" name="accounts">
	          			<button>Confirm</button>
	          		</form>
	          	</div>
          	</div>

          	
          </div>
             
     <div>

     </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<?php include 'footer.php'; ?>

          
                   
                 
                      
             



 

