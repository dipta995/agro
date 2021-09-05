<?php 
 include_once 'basefile/InsertClass.php';

  $insert = new InsertClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="layout/styles/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Mina&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrap">
   <?php 
          if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['customer'])){
                    $contactins = $insert->customerreg($_POST,$_FILES);
                     
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['farmer'])){
                    $contactins = $insert->farmerreg($_POST,$_FILES);
                    
                }
        ?>

        <form class="login-form" method="post" action="" enctype="multipart/form-data">
            <div class="form-header">
                <br>

                <h3>রেজিস্ট্রেশন করুন</h3>

                      <span style="color:red; font-weight: 200px;">
                      <h3> <a href="index.php">মুল পেইজে ফিরুন</a></h3>
                      <span style="color:red; font-weight: 200px;">

                      <?php if (isset($contactins)){
                      echo $contactins;
                      }  ?>
             
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" name="customer_name" placeholder="নাম দিন">
            </div>
            <div class="form-group">
            <!--Email Input-->
                <input type="text" class="form-input" name="customer_email" placeholder="ইমেইল দিন!(address@email.com)">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="text" name="customer_phone" class="form-input" placeholder="মোবাইল নাম্বার দিন">
            </div>
             <!--Password Input-->
            <div class="form-group">
                <input type="file" name="image" class="form-input" placeholder="">
            </div>
            <div class="form-group">
              
                <textarea name="customer_address" rows="3" cols="35" placeholder="বর্তমান ঠিকানা দিন"></textarea>
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="text" name="customer_password" class="form-input" placeholder="পাসওয়ার্ড দিন!">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" name="customer" type="submit">কাস্টমার</button>
            </div> 
             <div class="form-group">
                <button class="form-button" name="farmer" type="submit">কৃষক</button>
            </div>
            <div class="form-footer">
            পূর্বের একাউন্টে <a class="anchor" href="login.php">লগইন</a> করুন 
            </div>
        </form>
    </div>
</body>
</html>