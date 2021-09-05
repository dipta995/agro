<?php
include_once 'dbconnection.php';
  include_once 'basefile/SessionClass.php';
    Session::checkLogin();
    

class Login  extends DBconnection
{
	public function __construct(){
		$this->connectDataBase();

} 
	public function selectQuery($query){
		$result = $this->con->query($query);
		if($result){
			return $result;
		} else {
			return $msg='no result found';
		}
	}
	public function  Logincustomer($a,$b,$redirect_link){

			$customer_email = mysqli_real_escape_string($this->con, $a);
			$customer_password = mysqli_real_escape_string($this->con, $b);

			if (empty($customer_email) || empty($customer_password)) {
				$loginmsg = "ইমেইল এবং পাসওয়ার্ড দিন";
				return $loginmsg;
			}elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
 				 $loginmsg = "সঠিক ইমেইল দিন";
 				 return $loginmsg;
			}elseif (strlen($customer_password)<6) {
 				 $loginmsg = "কমপক্ষে ৭ ডিজিটের পাসওয়ার্ড দিন";
 				 return $loginmsg;
			}else{
				$sql = "SELECT * FROM customer_table WHERE customer_email= '$customer_email' and customer_password = '$customer_password' AND lock_cus=0";
		
				$result = self::selectQuery($sql);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
              if ($row > 0) {
                    Session::set("login", true);
                    Session::set("customer_id",$value['customer_id']);
                    Session::set("customer_name",$value['customer_name']);
                    Session::set("customer_email",$value['customer_email']);
                    Session::set("image",$value['image']);
  
                       if (empty($redirect_link)) {
                	header("Location:index.php");
                }else{
                	header("Location:".$redirect_link);
                }
                } else {
                    $loginmsg = "দয়া করে সঠিক ইমেইল এবং পাসওয়ার্ড দিন";
					return $loginmsg;

                }
            }else{
					$loginmsg = "দয়া করে কিছুক্ষণ পর আবার চেষ্টা করুণ";
					return $loginmsg;

				}

			} 

		}

			public function  Loginfarmer($a,$b,$redirect_link){

				$farmer_email = mysqli_real_escape_string($this->con, $a);
				$farmer_password = mysqli_real_escape_string($this->con, $b);

				if (empty($farmer_email) || empty($farmer_password)) {
					$loginmsg = "ইমেইল এবং পাসওয়ার্ড দিন";
				return $loginmsg;
				}elseif (!filter_var($farmer_email, FILTER_VALIDATE_EMAIL)) {
 				 $loginmsg = "সঠিক ইমেইল দিন";
 				 return $loginmsg;
				}elseif (strlen($farmer_password)<6) {
 				 $loginmsg = "কমপক্ষে ৭ ডিজিটের পাসওয়ার্ড দিন";
 				 return $loginmsg;
				}else{
		
					$sql = "SELECT * FROM farmer_table WHERE farmer_email= '$farmer_email' and farmer_password = '$farmer_password' AND lock_far=0";
					$result = self::selectQuery($sql);
					if ($result !=false) {
	                $value = mysqli_fetch_array($result);
	                $row = mysqli_num_rows($result);
	              if ($row > 0) {
	                    Session::set("login", true);
	                    Session::set("farmer_id",$value['farmer_id']);
	                    Session::set("farmer_name",$value['farmer_name']);
	                    Session::set("farmer_email",$value['farmer_email']);
	                    Session::set("image",$value['image']);
	  
	                      if (empty($redirect_link)) {
                	header("Location:index.php");
                }else{
                	header("Location:".$redirect_link);
                }
	                } else {
	                    $loginmsg = "দয়া করে সঠিক ইমেইল এবং পাসওয়ার্ড দিন";
						return $loginmsg;

	                }
	            }else{
						$loginmsg = "দয়া করে কিছুক্ষণ পর আবার চেষ্টা করুণ";
						return $loginmsg;

					}

				} 

			}

			public function  AdminLogin($a,$b){

				$farmer_email = mysqli_real_escape_string($this->con, $a);
				$farmer_password = mysqli_real_escape_string($this->con, $b);

				if (empty($farmer_email) || empty($farmer_password)) {
					$loginmsg = "ইমেইল এবং পাসওয়ার্ড দিন";
				return $loginmsg;
				}elseif (!filter_var($farmer_email, FILTER_VALIDATE_EMAIL)) {
 				 $loginmsg = "সঠিক ইমেইল দিন";
 				 return $loginmsg;
				}elseif (strlen($farmer_password)<6) {
 				 $loginmsg = "কমপক্ষে ৭ ডিজিটের পাসওয়ার্ড দিন";
 				 return $loginmsg;
				}else{
		
					$sql = "SELECT * FROM admin_table WHERE admin_email= '$farmer_email' and admin_password = '$farmer_password'";
					$result = self::selectQuery($sql);
					if ($result !=false) {
	                $value = mysqli_fetch_array($result);
	                $row = mysqli_num_rows($result);
	              if ($row > 0) {
	                    Session::set("login", true);
	                    Session::set("admin_id",$value['admin_id']);
	                    Session::set("admin_name",$value['admin_name']);
	                    Session::set("image",$value['image']);
	  
	                      
                	header("Location:index.php");
              
	                } else {
	                    $loginmsg = "দয়া করে সঠিক ইমেইল এবং পাসওয়ার্ড দিন";
						return $loginmsg;

	                }
	            }else{
						$loginmsg = "দয়া করে কিছুক্ষণ পর আবার চেষ্টা করুণ";
						return $loginmsg;

					}

				} 

			}



}
?>
					


					<!-- else{
				$sql = "SELECT * FROM farmer_table WHERE farmer_email= '$customer_email' and farmer_password = '$customer_password'";
				$result = self::selectQuery($sql);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
              if ($row > 0) {
                    Session::set("login", true);
                    Session::set("farmer_id",$value['farmer_id']);
                    Session::set("farmer_name",$value['farmer_name']);
  
                    header("Location:index.php");
                } else {
                    $loginmsg = "Invelied user or password";
					return $loginmsg;

                }
            }else{
					$loginmsg = "Invelied user or password";
					return $loginmsg;

				}

			}

		}
 -->