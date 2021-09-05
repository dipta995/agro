  <?php
  include_once 'basefile/SelectClass.php';
  include_once 'basefile/InsertClass.php';
  $redirect_link = "";
if (empty($_REQUEST['re_link']) || $_REQUEST['re_link']==NULL) {
}else{
  
$redirect_link = $_REQUEST['re_link'];
}
  include_once 'basefile/Login.php';
 
  $select = new SelectClass();
  $insert = new InsertClass();

  $lg = new Login();

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
   $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
$login = $lg->Logincustomer($customer_email,$customer_password,$redirect_link);

}
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['farmer'])){
   $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
$login = $lg->Loginfarmer($customer_email,$customer_password,$redirect_link);

}      
      ?>

        <form class="login-form" method="post" action="">
            <div class="form-header">

                <h3>লগইন করুন</h3>
                      <span style="color:red; font-weight: 200px;">
                      <h3> <a href="index.php">মুল পেইজে ফিরুন</a></h3>
                      <span style="color:red; font-weight: 200px;">

                      <?php if (isset($login)){
                      echo $login;
                      }  ?>

            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" name="customer_email" placeholder="ইমেইল দিন!(address@email.com)">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" name="customer_password" class="form-input" placeholder="পাসওয়ার্ড দিন!">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button style="margin-bottom: 5px; background-color: green;" class="form-button" name="customer" type="submit">আমি ক্রেতা</button>

                <button style="margin-top: 5px; background-color: orange;" class="form-button" name="farmer" type="submit">আমি কৃষক</button>
            </div>
            <div class="form-footer">
            নতুন করে <a href="signup.php">রেজিস্ট্রেশন</a> করুন 
            </div>
        </form>
    </div>
</body>
</html>