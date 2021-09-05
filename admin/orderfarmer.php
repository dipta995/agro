<?php   include 'header.php';?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customers</h4> 
                  <p class="card-description">                  
                  </p>
                  <?php 
                  
              /*   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $catinsert = $update->categoryUpdate($_POST,$_GET['editcat']);
                    if (isset($catinsert)) {
                      echo $catinsert;
                    }
                }*/
        
               
             
                ?>

               
             
                         
                       
                 
           <table class="table table-dark table-bordered">

          <thead>
                        <tr>
                          <th>#</th>
                          <th>name</th>
                          <th>Account No</th>
                          <td>Total Selling</td>
                                    <td>Due</td>
                                              
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['payment'])){
  $catinsert = $insert->farmerpay($_POST);
  if (isset($catinsert)) {
    echo $catinsert;
  }
}

         $sell = $select->farmerlist();
         $i = 0;
foreach ($sell as $key => $value) {
   $i++;
   $orderprice=0;
   $paidprice=0;
   $farmer_id = $value['farmer_id'];
   $order = $select->orderaccount($farmer_id);
   foreach ($order as $key => $or) {
     $orderprice += $or['product_price'] *$or['product_qty'];
   }

   $return = $select->returnmoney($farmer_id);
   foreach ($return as $key => $rt) {
     $paidprice += $rt['return_amount'];
   }
   ?>

 <tr>
   <td><?php echo $i; ?></td>
<td><?php echo $value['farmer_name'];?></td>
<td><?php echo $value['farmer_phone'];?></td>
<td><?php echo $orderprice;?> Taka</td>
 
 



 

  <td>
  <form action="" method="post">
    <input style="padding: 10px; " type="number" value="<?php echo $orderprice-$paidprice; ?>" step=".01" min="0" max="<?php echo $orderprice-$paidprice; ?>" name="return_amount">
    <input type="hidden" value="<?php echo $farmer_id; ?>" name="farmer_id">
    <input class="btn btn-info" type="submit" value="Pay" name="payment">
  </form>
  </td>
</tr>
                       
           <?php }       ?> 
                      
                    </table>
         
       
              <?php include_once 'footer.php'; ?>