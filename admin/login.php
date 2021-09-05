  <?php
  include_once '../basefile/SelectClass.php';
  include_once '../basefile/InsertClass.php';
  include_once '../basefile/LoginA.php';
  $select = new SelectClass();
  $insert = new InsertClass();
  $lg = new LoginA();
  ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../layout/styles/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Mina&display=swap" rel="stylesheet">

</head>
<body>
    <div class="wrap">

      <?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
   $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
$login = $lg->AdminLogin($customer_email,$customer_password);

}
         
      ?>

        <form class="login-form" method="post" action="">
            <div class="form-header">

                <h3>Admin Login</h3>
                      <span style="color:red; font-weight: 200px;">
                       
                      <span style="color:red; font-weight: 200px;">

                      <?php if (isset($login)){
                      echo $login;
                      }  ?>

            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" name="customer_email" placeholder="Enter email(address@email.com)">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" name="customer_password" class="form-input" placeholder="Enter Password">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button style="margin-bottom: 5px; background-color: green;" class="form-button" type="submit">Login</button>
 
            </div>
            
        </form>
    </div>
</body>
</html>