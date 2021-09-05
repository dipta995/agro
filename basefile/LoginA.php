<?php
include_once 'dbconnection.php';
  include_once '../basefile/SessionClass.php';
    Session::checkLogin();

class LoginA  extends DBconnection
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
	                    Session::set("acc",$value['acc']);
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
					

