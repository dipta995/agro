<?php
	include_once '../basefile/SessionClass.php';
  include_once '../basefile/InsertClass.php';
	include_once '../basefile/SelectClass.php';
	include_once '../basefile/DeleteClass.php';
	include_once '../basefile/UpdateClass.php';
	$insert = new InsertClass();
	$select = new SelectClass();
	$delete = new DeleteClass();
	$update = new UpdateClass();
  Session::checkSessionall()
	?> 
	<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
 
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  
  <link rel="stylesheet" href="css/style.css">
  
  <link rel="shortcut icon" href="images_new/agrologo.png" />
</head>
<body>
  <div class="container-scroller">
    
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/log.png" class="mr-2" alt="logo"/></a>
        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
 
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="ti-email mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>

              <?php
               $key = $select->contactViewseen();
              
              foreach ($key as $value) {
               
              ?>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"><?php echo $value['name'];?>
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    <?php echo $select->textshort($value['comment'],25);?>
                  </p>
                </div>
              </a>
            <?php } ?>
        <a href="message.php">See message</a>
            </div>
          </li>
       
          </li>
          <li class="nav-item nav-profile dropdown">
            <p style="color: #4378c7;font-size: 16px;margin-right: 10px;margin-top: 10px;font-weight: 800;">
              <?php
              echo Session::get('admin_name');
              ?>
            </p>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              <img src="<?php echo '../'.Session::get('image');?>" >
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a href="?action=logout" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <?php 
               if (isset($_GET['action']) && $_GET['action']== 'logout') {
                        Session::destroy();
                    }
              ?>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
   <style>
.pagination {
  display: inline-block;
  margin-left: 350px;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #e6f9ff;}
</style>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="comment.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Comment</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Users List</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="customers.php">Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="farmers.php">Farmers</a></li>
                <?php 
                if (Session::get('acc')==0) {
               
               
                ?>
                <li class="nav-item"> <a class="nav-link" href="admincontrol.php">Admin</a></li>
              <?php } ?>
              </ul>
            </div>
          </li>
           <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="ti-palette menu-icon"></i>
                        <span class="menu-title">Product Tracking</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="ordercustomer.php">Customer Order</a></li>
                          <li class="nav-item"> <a class="nav-link" href="orderfarmer.php">Farmers Order</a></li> 
                      
                         
                        </ul>
                      </div>
                    </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Customers Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="creatediv.php">Division</a></li>
                <li class="nav-item"> <a class="nav-link" href="createdis.php">District</a></li>
                <li class="nav-item"> <a class="nav-link" href="createcat.php">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="createpost.php">Post</a></li>
                <li class="nav-item"> <a class="nav-link" href="createarticle.php">Article</a></li>
                <li class="nav-item"> <a class="nav-link" href="createproduct.php">Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="createmacro.php">Macro-Green</a></li>
                <li class="nav-item"> <a class="nav-link" href="createslide.php">Slide</a></li>
                <li class="nav-item"> <a class="nav-link" href="createabout.php">About</a></li>
                
                
               
              </ul>
            </div>
          </li>
 
 
        </ul>
      </nav>
