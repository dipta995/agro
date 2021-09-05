<?php 
include_once 'dbconnection.php';

class InsertClass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
	public function insertQuery($query){
		$insert = $this->con->query($query) or die($this->con->error.__LINE__);
		if($insert){
			return $insert;
		} else {
			return false;
		}
	}
		public function supportinsertQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return $msg='no result found';
		}
	}

	//cagegory insert 
	public function categoryInsert($data){
		$category_name = mysqli_real_escape_string($this->con, $data['category_name']);
		if (empty($category_name)) {
			$message = "<span style='color:Red;'>Create New category</span>";
				return $message;
		}else{

			$sqlquery = "INSERT INTO  category(category_name)VALUES('$category_name')";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>category name inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>category name not inserted</span>";
					return $message;
				}
				}
	}
	//cat end
//cagegory insert 
	public function divInsert($data){
		$div_name = mysqli_real_escape_string($this->con, $data['div_name']);
		if (empty($div_name)) {
			$message = "<span style='color:Red;'>Create New division</span>";
				return $message; 
		}else{
		$sqlquery = "INSERT INTO  division_table(div_name)VALUES('$div_name')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>division name inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>division name not inserted</span>";
				return $message;
			}
		}
	}
	//cat end
//cagegory insert 
	public function disInsert($data){
		$division_id = mysqli_real_escape_string($this->con, $data['division_id']);
		$dis_name = mysqli_real_escape_string($this->con, $data['dis_name']);
		if (empty($division_id) || empty($dis_name)) {
			$message = "<span style='color:Red;'>Create New District</span>";
				return $message;
		}else{
		$sqlquery = "INSERT INTO  district_table(division_id,dis_name)VALUES('$division_id','$dis_name')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>district name inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>district name not inserted</span>";
				return $message;
			}
		}
	}

	public function paymentdatainsert($data,$id){
		$account_no = mysqli_real_escape_string($this->con, $data['account_no']);
		$otp = mysqli_real_escape_string($this->con, $data['otp']);
		$accounts = mysqli_real_escape_string($this->con, $data['accounts']);
		if (empty($account_no) || empty($otp)) {
			$message = "<span style='color:Red;'>All Field is Required</span>";
				return $message;
		}else{

		$sqlquery = "INSERT INTO  pay_table(account_no,otp,accounts,customer_id)VALUES('$account_no','$otp','$accounts','$id')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
			$message = "<span style='color:Red;'>Paid</span>";
			return $message;
			}else{
				 echo "<script> window.location = 'viewcart.php';</script>";
			}
		 

	}



	}
	public function paymentdatainsertfarm($data,$id){
		$account = mysqli_real_escape_string($this->con, $data['account']);
		$amount = mysqli_real_escape_string($this->con, $data['amount']);
		if (empty($account) || empty($amount)) {
			$message = "<span style='color:Red;'>Create New District</span>";
				return $message;
		}else{

			$sql = "SELECT * FROM pay_table WHERE account= '$account' and farmer_id = '$id' AND amount = '$amount' AND view=0";
		
				$result = self::insertQuery($sql);

			$value = mysqli_fetch_array($result);
			 $row = mysqli_num_rows($result);
			if ($row>0) {

			 
				 echo "<script> window.location = 'viewcart.php';</script>";
			}else{ 







		$sqlquery = "INSERT INTO  pay_table(account,amount,farmer_id)VALUES('$account','$amount','$id')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				 echo "<script> window.location = 'viewcart.php';</script>";
			}else{
				 echo "<script> window.location = 'viewcart.php';</script>";
			}
		}
	}
}
	//cat end

	public function orderconfirmcust($data){
		$browser_id = mysqli_real_escape_string($this->con, $data['browser_id']);
		$customer_id = mysqli_real_escape_string($this->con, $data['customer_id']);
		$farmer_id = mysqli_real_escape_string($this->con, $data['farmer_id']);
		 
		$sql = "SELECT * FROM confirm_table WHERE customer_id='$customer_id' LIMIT 1";
    $inserts = self::insertQuery($sql);
		 $value = mysqli_fetch_array($inserts);
			 	 $row = mysqli_num_rows($inserts);

			 	 $sqls = "SELECT * FROM confirm_table WHERE farmer_id='$farmer_id' LIMIT 1";
    $insertd = self::insertQuery($sqls);
		 $value = mysqli_fetch_array($insertd);
			 	 $rows = mysqli_num_rows($inserts);
              if ($row > 0) {
                   $sqlquery = "UPDATE cart_table
					 SET 
					 process = '1'
					 WHERE customer_id = '$customer_id'";
		$insert_row = self::insertQuery($sqlquery);
		 return "<script> window.location = 'viewcart.php';</script>";
                }elseif($rows>0){
                	$sqlquery = "UPDATE cart_table
					 SET 
					 process = '1'
					 WHERE farmer_id = '$farmer_id'";
		$insert_row = self::insertQuery($sqlquery);
		 return "<script> window.location = 'viewcart.php';</script>";
                }


                else{

		$sqlquery = "INSERT INTO  confirm_table(customer_id,farmer_id)VALUES('$customer_id','$farmer_id')";
		$insert_row = self::insertQuery($sqlquery);
		$sqlquery = "UPDATE cart_table
					 SET 
					 process = '1'
					 WHERE customer_id = '$customer_id' || farmer_id = '$farmer_id'";
		$insert_row = self::insertQuery($sqlquery);

		if ($insert_row) {
				 return "<script> window.location = 'viewcart.php';</script>";
			}else{
				$message = "<span style='color:red;'>Try again</span>";
				return $message;
			}
		 }
	}
	//cat end

	//cagegory insert 
	public function contactInsert($data){
		$name = mysqli_real_escape_string($this->con, $data['name']);
		$email = mysqli_real_escape_string($this->con, $data['email']);
		$phone = mysqli_real_escape_string($this->con, $data['phone']);
		$comment = mysqli_real_escape_string($this->con, $data['comment']);
		 if (empty($name) || empty($email) || empty($phone) || empty($comment)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>সবগুলো ঘর পুরন করুণ</span>";
				return $loginmsg;


		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>সঠিক ইমেইল দিন</span>";
 				 return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		 				 $loginmsg = "<span style='color:red; font-size: 15px;'>(A-Z অথবা a-z) ব্যবহার যোগ্য</span>";
		 				 return $loginmsg;
				}


		elseif (strlen($phone)<10 && strlen($phone)<=14) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>কমপক্ষে ১১ থেকে ১৪ ডিজিটের মোবাইল নাম্বার দিন</span>";
 				 return $loginmsg;
		}
		    


		elseif (!is_numeric($phone)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>০-৯ পর্যন্ত ইংরেজী সংখ্যা বযবহার করুন</span>";
 				 return $loginmsg;
 		}

		elseif (strlen($comment)<10 && strlen($comment)<=300) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>কমপক্ষে 10 থেকে 300 ওয়ারড ব্যবহার করুণ</span>";
 				 return $loginmsg;
		} else{
			
		$sqlquery = "INSERT INTO  contact_table(name,email,phone,comment)VALUES('$name','$email','$phone','$comment')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>message Send</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Something wrong please try again</span>";
				return $message;
			}
		}


	}



		public function commentInsert($data,$product_id){
				
				$comment = mysqli_real_escape_string($this->con, $data['comment']);
				$name = mysqli_real_escape_string($this->con, $data['name']);
				$email = mysqli_real_escape_string($this->con, $data['email']);
				 if (empty($comment)) {
						$loginmsg = "<span style='color:red; font-size: 15px;'>সবগুলো ঘর পুরন করুণ</span>";
						return $loginmsg;


				}  

				elseif (strlen($comment)<00 && strlen($comment)<=200) {
		 				 $loginmsg = "<span style='color:red; font-size: 15px;'>300 ওয়ারড ব্যবহার করুণ</span>";
		 				 return $loginmsg;
				} else{
					
				$sqlquery = "INSERT INTO  comment_table(comment,name,email,product_id)VALUES('$comment','$name','$email','$product_id')";
				$insert_row = self::insertQuery($sqlquery);
				if ($insert_row) {
						$message = "<span style='color:green;'>message Send</span>";
						return $message;
					}else{
						$message = "<span style='color:red;'>Something wrong please try again</span>";
						return $message;
					}
				}


			}


		public function replayInsert($data){
						
						$replay = mysqli_real_escape_string($this->con, $data['replay']);
						$comment_id = mysqli_real_escape_string($this->con, $data['comment_id']);
						
						 if (empty($replay)) {
								$loginmsg = "<span style='color:red; font-size: 15px;'>সবগুলো ঘর পুরন করুণ</span>";
								return $loginmsg;


						}  
 						 else{
							
						$sqlquery = "INSERT INTO  replay_table(replay,comment_id)VALUES('$replay','$comment_id')";
						$comsql = "UPDATE comment_table
					 SET 
					 replay = '1'
					 WHERE comment_id = '$comment_id'";
						$insert_row = self::insertQuery($sqlquery);
						$comup = self::insertQuery($comsql);
						if ($insert_row) {
								$message = "<span style='color:green;'>message Send</span>";
								return $message;
							}else{
								$message = "<span style='color:red;'>Something wrong please try again</span>";
								return $message;
							}
						}


					}












	//cat end

//cart for buy insert 
public function quantityup($product_id,$product_qty){
	$query = "SELECT * FROM product_table WHERE product_id='$product_id'";
		    $getData = self::insertQuery($query);
			$product_quantity = mysqli_fetch_array($getData);
			//$rows = mysqli_num_rows($result);
			$a = $product_quantity['product_qty'];
			$sqlquery = "UPDATE product_table
			SET 
			product_qty = $a-$product_qty 
			WHERE product_id = '$product_id'";
		$uprow = self::insertQuery($sqlquery);

}

public function farmerpay($data)
{
	$farmer_id = mysqli_real_escape_string($this->con, $data['farmer_id']);
	$return_amount = mysqli_real_escape_string($this->con, $data['return_amount']);
	if (!empty($farmer_id)) {
		 
	
	$sqlquery = "INSERT INTO  return_money(farmer_id,return_amount)VALUES('$farmer_id','$return_amount')";
	return self::insertQuery($sqlquery);


}
}
	public function cartproInsert($data){
		$product_id = mysqli_real_escape_string($this->con, $data['product_id']);
		$product_qty = mysqli_real_escape_string($this->con, $data['product_qty']);
		$product_price = mysqli_real_escape_string($this->con, $data['product_price']);
		$product_image = mysqli_real_escape_string($this->con, $data['product_image']);
		$browser_id = mysqli_real_escape_string($this->con, $data['browser_id']);
		$customer_id = mysqli_real_escape_string($this->con, $data['customer_id']);
		$farmer_id = mysqli_real_escape_string($this->con, $data['farmer_id']);
	 
		$product_pr = $product_qty*$product_price;

			$chk = "";
			$chks = "";

		




		$query = "SELECT * FROM cart_table WHERE customer_id='$customer_id' AND product_id = $product_id";
		    $getData = self::insertQuery($query);
			$row = mysqli_num_rows($getData);
			if ($row>0) {
				 $sqlquery = "UPDATE cart_table
					 SET 
					 product_qty = '$product_qty' 
					 WHERE product_id = '$product_id'";
					  
		$uprow = self::insertQuery($sqlquery);
		
			 
		    	
		//$this->quantityup($product_id,$product_qty);
		
		if ($uprow) {
					echo "<script> window.location = 'viewcart.php';</script>";
			}else{
				$message = "<span style='color:red;'>update</span>";
				return $message;
			}

		 
		    	} else{

		    $sqlquery = "INSERT INTO  cart_table(product_id,product_qty,product_price,product_image,browser_id,customer_id,farmer_id)VALUES('$product_id','$product_qty','$product_price','$product_image','$browser_id','$customer_id','$farmer_id')";
		$insert_row = self::insertQuery($sqlquery);

		//$this->quantityup($product_id,$product_qty);
		if ($insert_row) {
				$message = "<span style='color:green;'>কার্ডে যুক্ত করা হয়েছে</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>পূনরায় চেষ্টা করুণ</span>";
				return $message;
			}
		    }
	}
	
	//cart for buy end
//order table


 
 public function addToOrder($customer_id)
 {
	 $sleep_no = time();

	 
	$query = "SELECT * FROM cart_table WHERE customer_id = $customer_id";
	$cartpr = self::supportinsertQuery($query);

$price = 0;
foreach ($cartpr as $value) {
		$product_id = $value['product_id'];
		$product_qty = $value['product_qty'];
		$product_price =$value['product_price'];
		$product_image =$value['product_image'];
		$farmer_id =$value['farmer_id'];
		
	
		$price += $product_qty*$product_price;
		$sqlquery = "INSERT INTO  order_table(product_id,product_qty,product_price,customer_id,product_image,sleep_no,farmer_id)VALUES('$product_id','$product_qty','$product_price','$customer_id','$product_image','$sleep_no','$farmer_id')";
		 self::insertQuery($sqlquery);


		 $query = "SELECT * FROM product_table WHERE product_id = $product_id";
	$productget = self::insertQuery($query);
	$val = mysqli_fetch_array($productget);
	$old_qty = $val['product_qty'];

		$upsql = "UPDATE product_table
					 SET 
					 product_qty = $old_qty-$product_qty 
					 WHERE product_id = '$product_id'";
					 self::insertQuery($upsql);
	}
	// $row = mysqli_num_rows($cartpr);
	 $sleepque = "INSERT INTO  sleep_table(sleep_no,account,customer_id)VALUES('$sleep_no','$price','$customer_id')";
		$send = self::insertQuery($sleepque);
	if ($send) {

		$q = "DELETE  FROM cart_table WHERE customer_id = '$customer_id'";
		$result = self::insertQuery($q);
			/*$message = "<span style='color:green;'>Post inserted</span>";*/
			echo "<script> window.location = 'orderpr.php';</script>";
		 
		}else{

			$message = "<span style='color:red;'>post not inserted</span>";
			return $message;
		}


 }
//customerreg insert 
	public function customerreg($data,$file){
		$customer_name = mysqli_real_escape_string($this->con, $data['customer_name']);
		$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);
		//$customer_password = md5($customer_password);
		$customer_address = mysqli_real_escape_string($this->con, $data['customer_address']);
		$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
		//$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "images_new/".$unique_image;

	   
	    if (empty($customer_name) || empty($customer_email) || empty($customer_password) || empty($customer_address) || empty($customer_phone)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>সবগুলো ঘর পুরন করুণ</span>";
				return $loginmsg;


		}elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) { 
 				 $loginmsg = "সঠিক ইমেইল দিন";
 				 return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$customer_name)) {
		 				 $loginmsg = "(A-Z অথবা a-z) ব্যবহার যোগ্য";
		 				 return $loginmsg;
				}


		elseif (strlen($customer_phone)<10 && strlen($customer_phone)<=14) {
 				 $loginmsg = "কমপক্ষে ১১ থেকে ১৪ ডিজিটের মোবাইল নাম্বার দিন";
 				 return $loginmsg;
		}
		    


		elseif (!is_numeric($customer_phone)) {
 				 $loginmsg = "০-৯ পর্যন্ত ইংরেজী সংখ্যা বযবহার করুন";
 				 return $loginmsg;
 		}

		elseif (strlen($customer_password)<6) {
 				 $loginmsg = "কমপক্ষে ৭ ডিজিটের পাসওয়ার্ড দিন";
 				 return $loginmsg;
		}else{

	$sql = "SELECT * FROM customer_table WHERE customer_email='$customer_email' LIMIT 1";
    $inserts = self::insertQuery($sql);

				$value = mysqli_fetch_array($inserts);
			 	 $row = mysqli_num_rows($inserts);
              if ($row > 0) {
                    $loginmsg = "এই ইমেইলের আন্ডারে একটি একাউন্ট আছে";
 				 return $loginmsg;
                }else{

	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  customer_table(customer_name,customer_email,customer_password,customer_address,customer_phone,image)VALUES('$customer_name','$customer_email','$customer_password','$customer_address','$customer_phone','$uploaded_image')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				/*$message = "<span style='color:green;'>Post inserted</span>";*/
				return header('Location:login.php');
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
                }

 		}

	}
	public function farmerreg($data,$file){
		$customer_name = mysqli_real_escape_string($this->con, $data['customer_name']);
		$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);
		//$customer_password = md5($customer_password);
		$customer_address = mysqli_real_escape_string($this->con, $data['customer_address']);
		$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "images_new/".$unique_image;

	   
	    if (empty($customer_name) || empty($customer_email) || empty($customer_password) || empty($customer_address) || empty($customer_phone)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>সবগুলো ঘর পুরন করুণ</span>";
				return $loginmsg;


		}elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
 				 $loginmsg = "সঠিক ইমেইল দিন";
 				 return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$customer_name)) {
		 				 $loginmsg = "(A-Z অথবা a-z) ব্যবহার যোগ্য";
		 				 return $loginmsg;
				}


		elseif (strlen($customer_phone)<10 && strlen($customer_phone)<=14) {
 				 $loginmsg = "কমপক্ষে ১১ থেকে ১৪ ডিজিটের মোবাইল নাম্বার দিন";
 				 return $loginmsg;
		}
		    


		elseif (!is_numeric($customer_phone)) {
 				 $loginmsg = "০-৯ পর্যন্ত ইংরেজী সংখ্যা বযবহার করুন";
 				 return $loginmsg;
 		}

		elseif (strlen($customer_password)<6) {
 				 $loginmsg = "কমপক্ষে ৭ ডিজিটের পাসওয়ার্ড দিন";
 				 return $loginmsg;
		}else{

			$sql = "SELECT * FROM farmer_table WHERE farmer_email='$customer_email' LIMIT 1";
		    $inserts = self::insertQuery($sql);

				$value = mysqli_fetch_array($inserts);
			 	 $row = mysqli_num_rows($inserts);
              if ($row > 0) {
                    $loginmsg = "এই ইমেইলের আন্ডারে একটি একাউন্ট আছে";
 				 return $loginmsg;
                }else{

	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  farmer_table(farmer_name,farmer_email,farmer_password,farmer_address,farmer_phone,image)VALUES('$customer_name','$customer_email','$customer_password','$customer_address','$customer_phone','$uploaded_image')";
			$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				/*$message = "<span style='color:green;'>Post inserted</span>";*/
				return header('Location:login.php');
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
                }

 		}

	}

	 
	public function productInsert($data,$file){
		$product_title = mysqli_real_escape_string($this->con, $data['product_title']);
		$product_price = mysqli_real_escape_string($this->con, $data['product_price']);
		$product_price = str_replace(' ', '', $product_price);
		$product_qty = mysqli_real_escape_string($this->con, $data['product_qty']);
		$product_qty = str_replace(' ', '', $product_qty);
		$ourmarket = mysqli_real_escape_string($this->con, $data['ourmarket']);
		$unit_name = mysqli_real_escape_string($this->con, $data['unit_name']);
		$division_id = mysqli_real_escape_string($this->con, $data['division_id']);
		$district_id = mysqli_real_escape_string($this->con, $data['district_id']);
		$category_id = mysqli_real_escape_string($this->con, $data['category_id']);
		$product_details = mysqli_real_escape_string($this->con, $data['product_details']);


		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['product_image']['name'];
	    $file_size = $file['product_image']['size'];
	    $file_temp = $file['product_image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "../images_new/".$unique_image;

	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  product_table(product_title,product_price,product_qty,ourmarket,unit_name,division_id,district_id,category_id,product_details,product_image)VALUES('$product_title','$product_price','$product_qty','$ourmarket','$unit_name','$division_id','$district_id','$category_id','$product_details','$uploaded_image')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Post inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
	}

	public function productInsertfarm($data,$file){
		$farmer_id = mysqli_real_escape_string($this->con, $data['farmer_id']);
		$product_title = mysqli_real_escape_string($this->con, $data['product_title']);
		$product_price = mysqli_real_escape_string($this->con, $data['product_price']);
		$product_qty = mysqli_real_escape_string($this->con, $data['product_qty']);
		$unit_name = mysqli_real_escape_string($this->con, $data['unit_name']);
		$division_id = mysqli_real_escape_string($this->con, $data['div_search']);
		$district_id = mysqli_real_escape_string($this->con, $data['dis_search']);
		$category_id = mysqli_real_escape_string($this->con, $data['category_id']);
	/*	$verify = mysqli_real_escape_string($this->con, $data['verify']);*/
		$product_details = mysqli_real_escape_string($this->con, $data['product_details']);

 
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['product_image']['name'];
	    $file_size = $file['product_image']['size'];
	    $file_temp = $file['product_image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "images_new/".$unique_image;



	    if (empty($product_title) || empty($product_price) || empty($product_qty) || empty($unit_name) || empty($division_id)|| empty($district_id)|| empty($category_id)|| empty($product_details)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>লাল স্টার দেয়া ঘর পুরন করুণ</span>";
				return $loginmsg;


		} 


		elseif (is_numeric($product_title)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>সংখ্যা ব্যবহার যোগ্য নয় !</span>";
 				 return $loginmsg;
 		}    
	elseif (!is_numeric($product_qty)) {
	 				 $loginmsg = "<span style='color:red; font-size: 15px;'>পণ্যের পরিমান সংখ্যা লিখুন</span>";
	 				 return $loginmsg;
	 		}    


		elseif (!is_numeric($product_price)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>পণ্যের দাম সংখ্যা লিখুন</span>";
 				 return $loginmsg;
 		}
	 
		
		else{


	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  product_table(farmer_id,product_title,product_price,product_qty,unit_name,division_id,district_id,category_id,product_details,product_image,verify)VALUES('$farmer_id','$product_title','$product_price','$product_qty','$unit_name','$division_id','$district_id','$category_id','$product_details','$uploaded_image','1')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>পণ্যটি ভেরিফিকেশ্ন করা হচ্ছে</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>আবার চেষ্টা করুণ</span>";
				return $message;
			}
		}
	}
	//product Insert end


	
//post insert 
	public function postInsert($data,$file){
		$post_title = mysqli_real_escape_string($this->con, $data['post_title']);
		$post_details = mysqli_real_escape_string($this->con, $data['post_details']);
		$front_view = mysqli_real_escape_string($this->con, $data['front_view']);


		
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['post_image']['name'];
	    $file_size = $file['post_image']['size'];
	    $file_temp = $file['post_image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "../images_new/".$unique_image;

	    if (empty($post_title) || empty($post_details) || empty($file_temp)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>Create A New Post</span>";
				return $loginmsg;


		} else{

	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  post_table(post_title,post_details,front_view,post_image)VALUES('$post_title','$post_details','$front_view','$uploaded_image')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Post inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
		}
	}
	//post end


	
	//macro insert 
		public function macroInsert($data,$file){
			$macro_title = mysqli_real_escape_string($this->con, $data['macro_title']);
			$macro_details = mysqli_real_escape_string($this->con, $data['macro_details']);
	


			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['macro_image']['name'];
		    $file_size = $file['macro_image']['size'];
		    $file_temp = $file['macro_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "images_new/".$unique_image;
		    $move_image = "../images_new/".$unique_image;

		    move_uploaded_file($file_temp, $move_image);
			
			$sqlquery = "INSERT INTO  macro_green(macro_title,macro_details,macro_image)VALUES('$macro_title','$macro_details','$uploaded_image')";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
		}
		//macro end


		//article insert 
		public function articleInsert($data,$file){
			$article_title = mysqli_real_escape_string($this->con, $data['article_title']);
			$article_description = mysqli_real_escape_string($this->con, $data['article_description']);
			$article_status = mysqli_real_escape_string($this->con, $data['article_status']);
	
			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['article_image']['name'];
		    $file_size = $file['article_image']['size'];
		    $file_temp = $file['article_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "images_new/".$unique_image;
		    $move_image = "../images_new/".$unique_image;
		     if (empty($article_title) || empty($article_description) || empty($file_temp)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>Create A New Article</span>";
				return $loginmsg;


		}elseif (strlen($article_description)<10 && strlen($article_description)<=400) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>You can use 10 to 400 Limited Chrecter</span>";
 				 return $loginmsg;
		} else{


		    move_uploaded_file($file_temp, $move_image);
			
			$sqlquery = "INSERT INTO  article_table(article_title,article_description,article_image,article_status)VALUES('$article_title','$article_description','$uploaded_image','$article_status')";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
			}
		}
		//article end

		//slide insert 
		public function slideInsert($data,$file){
			$slide_title = mysqli_real_escape_string($this->con, $data['slide_title']);
			$slide_details = mysqli_real_escape_string($this->con, $data['slide_details']);
	


			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['slide_image']['name'];
		    $file_size = $file['slide_image']['size'];
		    $file_temp = $file['slide_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "images_new/".$unique_image;
		    $move_image = "../images_new/".$unique_image;

		    move_uploaded_file($file_temp, $move_image);
			
			$sqlquery = "INSERT INTO  slide_table(slide_title,slide_details,slide_image)VALUES('$slide_title','$slide_details','$uploaded_image')";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
		}
		//article end
		public function admindatains($data,$file){
					$admin_name = mysqli_real_escape_string($this->con, $data['admin_name']);
					$admin_email = mysqli_real_escape_string($this->con, $data['admin_email']);
					$admin_password = mysqli_real_escape_string($this->con, $data['admin_password']);
					$acc = mysqli_real_escape_string($this->con, $data['acc']);
			


					$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
				    $file_name = $file['image']['name'];
				    $file_size = $file['image']['size'];
				    $file_temp = $file['image']['tmp_name'];

				    $div            = explode('.', $file_name);
				    $file_ext       = strtolower(end($div));
				    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
				    $uploaded_image = "images_new/".$unique_image;
				    $move_image = "../images_new/".$unique_image;

				    move_uploaded_file($file_temp, $move_image);
					
					$sqlquery = "INSERT INTO  admin_table(admin_name,admin_email,admin_password,acc,image)VALUES('$admin_name','$admin_email','$admin_password','$acc','$uploaded_image')";
					$insert_row = self::insertQuery($sqlquery);
					if ($insert_row) {
							$message = "<span style='color:green;'>Post inserted</span>";
							return $message;
						}else{
							$message = "<span style='color:red;'>post not inserted</span>";
							return $message;
						}
				}
				//article end


		//ratting add

		public function addRatting($data,$product_id,$id,$identity){
			$rat_count = mysqli_real_escape_string($this->con, $data['star']);
			 
			if ($identity=='farmer') {
				$sql = "SELECT * FROM ratting WHERE product_id= '$product_id' and farmer_id = '$id'";
		
				$result = self::insertQuery($sql);

			$value = mysqli_fetch_array($result);
			 $row = mysqli_num_rows($result);
			 if ($row>0) {
				$message = "<span style='color:red;'>Already Ratting by you</span>";
				return $message;
			 }else{

				 $sqlquery = "INSERT INTO  ratting(product_id,farmer_id,rat_count)VALUES('$product_id','$id','$rat_count')";
				 $insert_row = self::insertQuery($sqlquery);
			 }
			}elseif($identity=='customer') {
				$sql = "SELECT * FROM ratting WHERE product_id= '$product_id' and customer_id = '$id'";
		
				$result = self::insertQuery($sql);

			$value = mysqli_fetch_array($result);
			 $row = mysqli_num_rows($result);
			 if ($row>0) {
				$message = "<span style='color:red;'>Already Ratting by you</span>";
				return $message;
			 }else{
				$sqlquery = "INSERT INTO  ratting(product_id,customer_id,rat_count)VALUES('$product_id','$id','$rat_count')";
				$insert_row = self::insertQuery($sqlquery);
			 }
		}
		else{
			$message = "<span style='color:red;'>something wrong</span>";
				return $message;
		}

		 if ($insert_row) {
			$message = "<span style='color:green;'>Ratting  Done </span>";
			return $message;
		}else{
			$message = "<span style='color:red;'>Something wrong try again</span>";
			return $message;
		}
	}




}	


 