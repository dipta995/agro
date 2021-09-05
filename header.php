  <?php
  include_once 'basefile/SelectClass.php';
  include_once 'basefile/InsertClass.php';
  include_once 'basefile/UpdateClass.php';
  include_once 'basefile/DeleteClass.php';
  include_once 'basefile/SessionClass.php';
  $select = new SelectClass();
  $insert = new InsertClass();
  $update = new UpdateClass();
  $delete = new DeleteClass();
  Session::withoutlogin();
  $protocol = $_SERVER['SERVER_PROTOCOL'];
if (strpos($protocol,"HTTPS")) {
   $protocol = "HTTPS://";
}else{
    $protocol = "HTTP://";
}
$redirect_link_var = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $browser_id = session_id();
  $customer_id = Session::get('customer_id');


  $farmer_id = Session::get('farmer_id');
  $productcount = "";
  $identity = "";


  ?>
  
  
<!DOCTYPE html>
<html lang="">
<head>
  <link rel="shortcut icon" href="images_new/agrologo.png" />
   
<title>ভূমিজ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/custom.css" rel="stylesheet" type="text/css" media="all">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="top">
  <style type="text/css">
    .comred{
      color: red;
    }
    
.quantity {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}

input[type=number]
{
  -moz-appearance: textfield;
}

.quantity input {
  width: 45px;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: 1px solid #eee;
}

.quantity input:focus {
  outline: 0;
}

.quantity-nav {
  float: left;
  position: relative;
  height: 42px;
}

.quantity-button {
  position: relative;
  cursor: pointer;
  border-left: 1px solid #eee;
  width: 20px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "Trebuchet MS", Helvetica, sans-serif !important;
  line-height: 1.7;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.quantity-button.quantity-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
}

.quantity-button.quantity-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
}
  </style>


<div> 

  <header  id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1><a href="index.php">ভূমিজ</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">হোম</a></li>
        <li><a class="drop" href="farmermarket.php">কৃষক বাজার</a>
          <ul>
             <?php
                    if (isset($_GET['action']) && $_GET['action']== 'logout') {
                        Session::destroy();
                    }
                    ?>
            <?php
              $key = $select->categoryView();
              foreach ($key as $value) {
              
            ?>
            <li><a href="catpage.php?categoryid=<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></a></li>
          <?php } ?>
        
          </ul>
        </li>
        <li><a href="ourmarket.php">আজকের বাজার</a></li>
        <li><a href="productup.php">
          <?php
          if (Session::get('farmer_id') == true) {
                      echo "বিক্রয় করুন";
               
                     
                    }
        ?>
          
        </a></li>
        
        <li><a href="macrogreen.php">মাইক্রো_গ্রীন </a></li>
        <li><a href="article.php">সম্পাদকীয় প্রবন্ধ</a></li>
        <li><a href="about.php">এবাউট</a></li>
         
        <li>
 <?php
                    if (Session::get('customer_id') == true) {
                       ?>
                      <img style="height: 50px; width: 50px; border-radius: 50%; margin-bottom: -60px;" src="<?php echo Session::get('image'); ?>"><a  href="#"></a>
                      <?php
               
                     echo Session::get('customer_name');
                     ?>
                        <ul>
          <?php if ($customer_id==true) {
            echo '<li><a href="orderpr.php">order</a></li>';
          }  ?>
                        
            <li><a href="?action=logout">logout</a></li>

          </ul><?php
                    }else if (Session::get('farmer_id') == true) {
                      ?>
                      <img style="height: 50px; width: 50px; border-radius: 50%; margin-bottom: -60px;" src="<?php echo Session::get('image'); ?>"><a  href="#"></a>
                      <?php 
                      echo Session::get('farmer_name');
                      ?>
                        <ul>
          
                        <?php if($farmer_id==true){
            echo '<li><a href="sell.php">Sell History</a></li>';
          } ?>
            <li><a href="?action=logout">logout</a></li>

          </ul><?php
               
                     
                    }


                    else{ echo '<a href="login.php">'.'Login</a>';} ?>

       
        </li>
        <li>
        <?php if ($customer_id ==true && $farmer_id==false) { ?>  
        <a class="drop" href="viewcart.php">কার্ড<span style="color: white;">( 
<?php
  if($farmer_id==true && $customer_id ==false){
    $productcou = $farmer_id;
    $userid = $farmer_id;
    $identity = "farmer";
     $key = $select->viewCartfarmcount($productcou);
  $total_rows = mysqli_num_rows($key);
  if ($total_rows==0) {
    echo "0";
  }else{
    echo $total_rows;
  }
  }
  
  
  if ($customer_id ==true && $farmer_id==false) {
    $productcount = $customer_id;
    $userid = $customer_id;
    $identity = "customer";
     $key = $select->viewCartcustomercount($productcount);
  $total_rows = mysqli_num_rows($key);
  if ($total_rows==0) {
    echo "0";
  }else{
    echo $total_rows;
  }
  }else{
    $identity = "";
  }






?>

        )</span></a> <?php } ?>
          
           
        </li>
        </li>
        
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>