<?php 
include 'header.php'; 
Session::checkSession($redirect_link_var);

$productid = $_GET['productid'];


/*
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 
  
$link; */


?>
 
</div>

 
</div>
 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    
    <div class="content"> 
      
      <div id="gallery">
        <figure>
          <header class="heading">কৃষক বাজার বিস্তারিত</header>
             <?php
             if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['commentsend'])) {
                    $commentsend = $insert->commentInsert($_POST,$productid);
                    if (isset($commentsend)) {
                      echo $commentsend;
                      echo "<script> window.location = '$redirect_link_var';</script>";
                    }
                }
              $key = $select->productdescription($productid);
              foreach ($key as $value) {
              
            ?>
            <style type="text/css">
              .comment{
                height: 400px;
                overflow: auto;
              }
            </style>
         <div class="row">
          <div class="col-md-2">
          <div class="stars">

</div>

          </div>
           <div class="productind col-md-4">
              <img src="<?php echo $value['product_image'];?>">
              <div class="comment">
                <?php
              $key = $select->commentview($productid);
              foreach ($key as $comvalue) {
              
            ?>
                <h4><?php echo $comvalue['name']; ?> <span style="font-size: 14px;margin-left: 10px;"><?php echo $comvalue['date']; ?></span></h4> 
                <p><?php echo $comvalue['comment']; ?></p>
                <p><?php echo "REPLAY:".$comvalue['replay']; ?></p>

                <hr>
              <?php } ?>
                
              </div>
          
           </div>
        <div class="spandes col-md-6">
           <ul>
             <li><span><?php echo $value['product_title'];?></span></li>
             <li>
            
             <?php $count = $select->countratting($value['product_id']);
                if ($count>0) {
                
             for ($i=0; $i < $count; $i++) { 
             echo '<span style="color: orange;" class="fa fa-star checked"></span>';
             }
             for ($i=0; $i < 5- $count; $i++) { 
              echo '<span style="color:#444;" class="fa fa-star"></span>';
             }
            }else{
              for ($i=0; $i < 5; $i++) { 
                echo '<span style="color:#444;" class="fa fa-star"></span>';
                }
            }

              

            ?>
             </li>
             <li><span>মূল্য:</span><?php echo $value['product_price'].' Taka / '.$value['unit_name'];?></li>
              
             <li><span>বিস্তারিত:</span><?php echo $value['product_details'];?></li>
             <li><span>যোগাযোগ করুনঃ</span>০১****</li>
             <?php
               if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['cart'])) {
                    $catinsert = $insert->cartproInsert($_POST);
                    if (isset($catinsert)) {
                      echo $catinsert;
                      echo "<script> window.location = 'viewcart.php';</script>";
                    }
                }
             ?>
             <form method="post" action="">
               <input value="<?php echo $productid; ?>" type="hidden" name="product_id">
              <!--  <input type="number" id="inputDisabled" anable value="<?php //echo $value['product_qty']; ?>" min="1" name="product_qty"> -->
              <input type="hidden" value="<?php echo $value['farmer_id'];?>" name="farmer_id">
               <input type="hidden" value="<?php echo $value['product_price'];?>" name="product_price">
               <input type="hidden" value="<?php echo $value['product_image'];?>" name="product_image">

               <input type="hidden" value="<?php echo session_id();?>" name="browser_id">
               <input type="hidden" value="<?php echo $customer_id;?>" name="customer_id">
            
              


 

<div class="quantity">
  <?php if($value['product_qty']==0){ echo "<span style='color:red'>Out of Stock</span>"; }else{ ?>
  <input style="padding: 10px;" type="number" value="1" name="product_qty" min="1" max="<?php echo $value['product_qty'];?>" step="1">  <br>
</div>
<div>
 <br> 
 
 <?php if ($farmer_id==true) {
   
 }else{ ?>
 <input class="btn btn-primary" type="submit" name="cart" value="Add to cart"><?php }} ?>

</div>

 

             
             </form>
             <?php
if ($customer_id==true) {
  
  $orderview = $select->feedbackcheck($customer_id,$productid);
   
    if ( $orderview>0) {
?>
                 <div style="margin-top: 10px;">
                <form method="post" action="">

                  <input type="hidden" value="<?php 
                    if (Session::get('farmer_id') == true) {
                       echo Session::get('farmer_name');
                  }else{
                    echo Session::get('customer_name');
                  }

                  ?>" name="name">
              
                  <input type="hidden" value="<?php
                    if (Session::get('farmer_id') == true) {
                       echo Session::get('farmer_email');
                  }else{
                    echo Session::get('customer_email');
                  } ?>" name="email">
                  <textarea name="comment"></textarea>
                  <input style="margin-top: 5px;
                  " type="submit" name="commentsend" value="Comment" class="btn btn-primary">
                </form>
              </div>
             
           </ul>
           <?php
  if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['ratting'])) {
      $catinsert = $insert->addRatting($_POST,$_GET['productid'],$userid,$identity);
      if (isset($catinsert)) {
        echo $catinsert;
         
      }
  }
?>


<div class="row">
  <div class="col-md-7">
  <form action="" method="post">
    <input value="5" class="star star-5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input value="4" class="star star-4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input value="3" class="star star-3" id="star-3" type="radio" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input value="2" class="star star-2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input value="1" class="star star-1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>
 
  <button style="margin-left:60px;" name="ratting" class="btn btn-info">Rat us</button>
  </form>
  </div>
</div>
<?php }} ?>
          </div>
        </div>
          <?php } ?>
        </figure>
 
 
      </div>
     

    </div>
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
  div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
<?php include 'footer.php';?>