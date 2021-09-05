<?php 
include_once 'dbconnection.php';

class UpdateClass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}


	public function updateQuery($query){
		$update_row = $this->con->query($query) or die($this->con->error.__LINE__);		
		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}

public function supportdeleteQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return $msg='no result found';
		}
	}

	//cagegory update 
	public function categoryUpdate($data,$id){
		$category_name = mysqli_real_escape_string($this->con, $data['category_name']);
		$sqlquery = "UPDATE category
					 SET 
					 category_name = '$category_name'
					 WHERE category_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>category name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>category name not updated</span>";
				return $message;
			}
	}
	//cat end
//Div update 
	public function divUpdate($data,$id){
		$div_name = mysqli_real_escape_string($this->con, $data['div_name']);
		$sqlquery = "UPDATE division_table
					 SET 
					 div_name = '$div_name'
					 WHERE division_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>division name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>division name not updated</span>";
				return $message;
			}
	}
	//cat end

	//............ update 
	public function upconfirmtable($id){
		 
		$sqlquery = "UPDATE confirm_table
					 SET 
					 confermation = '1'
					 WHERE confirm_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>  updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'> not updated</span>";
				return $message;
			}
	}public function uppaytable($id){
		 
		$sqlquery = "UPDATE pay_table
					 SET 
					 view = '1'
					 WHERE pay_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {



				$message = "<span style='color:green;'>  updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'> not updated</span>";
				return $message;
			}
	}public function upprocess($id){
		 
		$sqlquery = "UPDATE cart_table
					 SET 
					 process = '1'
					 WHERE browser_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
			 
				echo "<script> window.location = 'viewcart.php';</script>";
			}else{
				$message = "<span style='color:red;'> not updated</span>";
				return $message;
			}
	}
	//............... end
//Dis update 
	public function disUpdate($data,$id){
		$division_id = mysqli_real_escape_string($this->con, $data['division_id']);
		$dis_name = mysqli_real_escape_string($this->con, $data['dis_name']);
		$sqlquery = "UPDATE district_table
					 SET 
					 division_id = '$division_id',
					 dis_name = '$dis_name'
					 WHERE district_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>district name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>district name not updated</span>";
				return $message;
			}
	}
	//cat end
	//contact update 
	public function contactUpdate($id){
		
		$sqlquery = "UPDATE contact_table
					 SET 
					 seen = '1'
					 WHERE contact_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>district name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>district name not updated</span>";
				return $message;
			}
	}
	//contact end
	//contact update 
	public function lockCustomer($id){
		
		$sqlquery = "UPDATE customer_table
					 SET 
					 lock_cus = '1'
					 WHERE customer_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Customer Locked successfully</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Customer Not Locked successfully</span>";
				return $message;
			}
	}
	public function unlockCustomer($id){
		
		$sqlquery = "UPDATE customer_table
					 SET 
					 lock_cus = '0'
					 WHERE customer_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Customer UnLocked successfully</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Customer Not UnLocked successfully</span>";
				return $message;
			}
	}
	//contact end
	//contact update 
	public function lockFarmer($id){
		
		$sqlquery = "UPDATE farmer_table
					 SET 
					 lock_far = '1'
					 WHERE farmer_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Customer Locked successfully</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Customer Not Locked successfully</span>";
				return $message;
			}
	}
	public function unlockFarmer($id){
		
		$sqlquery = "UPDATE farmer_table
					 SET 
					 lock_far = '0'
					 WHERE farmer_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Customer UnLocked successfully</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Customer Not UnLocked successfully</span>";
				return $message;
			}
	}
	//contact end
//cart update
// public function quantityupCustomer($product_id,$product_qty,$id){
// 	$query = "SELECT * FROM product_table WHERE product_id='$product_id'";
// 		    $getData = self::updateQuery($query);
// 			$query = "SELECT * FROM cart_table WHERE product_id='$product_id' AND process=0 AND customer_id=$id";
// 		    $getData = self::updateQuery($query);
// 			$product_quantity = mysqli_fetch_array($getData);
// 			//$rows = mysqli_num_rows($result);
// 			$a = $product_quantity['product_qty'];
// 			$sqlquery = "UPDATE product_table
// 			SET 
// 			product_qty = $a-$product_qty 
// 			WHERE product_id = '$product_id'";
// 		$uprow = self::updateQuery($sqlquery);

// }
public function orderConfirm($data)
{
	$orderid = mysqli_real_escape_string($this->con,$data['order_id']);
	$sqlquery = "UPDATE order_table
	SET 
	process = '1'
	WHERE order_id = $orderid";
$insert_row = self::updateQuery($sqlquery);

}
		public function cartUpdate($data,$userid){
		
		$product_qty = mysqli_real_escape_string($this->con, $data['product_qty']);
	 
		$cart_id = mysqli_real_escape_string($this->con, $data['cart_id']);
		 
			 

		 
 

			// $query = "SELECT * FROM cart_table WHERE product_id=$product_id AND customer_id=$userid";
			// $getData = self::updateQuery($query);
			// $pr = mysqli_fetch_array($getData);

			// $product = $pr['product_id'];
		 
		 
			 


			$sqlquery = "UPDATE cart_table
					 SET 
					 product_qty = $product_qty
					 WHERE cart_id = $cart_id AND customer_id = $userid";
		$insert_row = self::updateQuery($sqlquery);

	





	 
		
		if ($insert_row) {
				$message = "<span style='color:green;'>district name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>district name not updated</span>";
				return $message;
			}
	}
	//cart end



	//postupdate 
	public function postUpdate($data,$file,$id){
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
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE post_table
					 SET 
					 post_title = '$post_title',
					 post_details = '$post_details',
					 front_view = '$front_view'
					 WHERE post_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE post_table
					 SET 
					  post_title = '$post_title',
					 post_details = '$post_details',
					 front_view = '$front_view',
					 post_image = '$uploaded_image'
					 WHERE post_id = '$id'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>post name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post name not updated</span>";
				return $message;
			}
	}
	//post end
 //macro update 
	public function macroUpdate($data,$file,$id){
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
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE macro_green
					 SET 
					 macro_title = '$macro_title',
					 macro_details = '$macro_details'
					 WHERE macro_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{
	    	//delete previous image
	    	$query = "SELECT * FROM macro_green WHERE macro_id = '$id'";
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = '../'.$delimg['macro_image'];
	            unlink($dellink);
	        }
	    }
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE macro_green
					 SET 
					  macro_title = '$macro_title',
					 macro_details = '$macro_details',
					
					 macro_image = '$uploaded_image'
					 WHERE macro_id = '$id'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>post name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post name not updated</span>";
				return $message;
			}
	}
	//post end//article update 
	public function articleUpdate($data,$file,$id){
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
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE article_table
					 SET 
					 article_title = '$article_title',
					 article_status = '$article_status',
					 article_description = '$article_description'
					 WHERE article_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{
	    	//delete previous image
	    	$query = "SELECT * FROM article_table WHERE article_id = '$id'";
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = '../'.$delimg['article_image'];
	            unlink($dellink);
	        }
	    }
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE article_table
					 SET 
					  article_title = '$article_title',
					  article_status = '$article_status',
					 article_description = '$article_description',
					
					 article_image = '$uploaded_image'
					 WHERE article_id = '$id'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>post name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post name not updated</span>";
				return $message;
			}
	}
	//article end
 
	//product 
	public function productUpdate($data,$file,$id){
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
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE product_table
					 SET 
					 product_title = '$product_title',
					 product_price = '$product_price',
					 product_qty = '$product_qty',
					 unit_name = '$unit_name',
					 division_id = '$division_id',
					 district_id = '$district_id',
					 category_id = '$category_id',
					 product_details = '$product_details',
					 ourmarket = '$ourmarket'
					 WHERE product_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{

	    	//delete previous image
	    	$query = "SELECT * FROM product_table WHERE product_id = '$id'";
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = '../'.$delimg['product_image'];
	            unlink($dellink);
	        }
	    }
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE product_table
					 SET 
					  product_title = '$product_title',
					 product_price = '$product_price',
					 product_qty = '$product_qty',
					 unit_name = '$unit_name',
					 division_id = '$division_id',
					 district_id = '$district_id',
					 category_id = '$category_id',
					 product_details = '$product_details',
					 product_image = '$uploaded_image',
					 ourmarket = '$ourmarket'
					 WHERE product_id = '$id'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>product name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>product name not updated</span>";
				return $message;
			}
	}
	public function verifyupdate($id){
		$sqlquery = "UPDATE product_table
					 SET 
					 verify = '0'
					 WHERE product_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>product name updated</span>";
				return $message;
				echo header('Location:createproduct.php');
				
			}else{
				$message = "<span style='color:red;'>product name not updated</span>";
				return $message;
			}

	}
	public function productUpdatefarm($data,$file,$id,$farm){
		$product_title = mysqli_real_escape_string($this->con, $data['product_title']);
		$product_price = mysqli_real_escape_string($this->con, $data['product_price']);
		$product_qty = mysqli_real_escape_string($this->con, $data['product_qty']);
		$unit_name = mysqli_real_escape_string($this->con, $data['unit_name']);
		$division_id = mysqli_real_escape_string($this->con, $data['div_search']);
		$district_id = mysqli_real_escape_string($this->con, $data['dis_search']);
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
	    $move_image = "images_new/".$unique_image;

	    if (empty($product_title) || empty($product_price) || empty($product_qty) || empty($unit_name) || empty($division_id)|| empty($district_id)|| empty($category_id)|| empty($product_details)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>লাল স্টার দেয়া ঘর পুরন করুণ</span>";
				return $loginmsg;


		} 


		elseif (is_numeric($product_title)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>সংখ্যা ব্যবহার করা যাবে না</span>";
 				 return $loginmsg;
 		}
 		elseif (!is_numeric($product_qty)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>পণ্যের পরিমান সংখ্যা লিখুন</span>";
 				 return $loginmsg;
 		}    


		elseif (!is_numeric($product_price)) {
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>পণ্যের দাম সংখ্যা লিখুন</span>";
 				 return $loginmsg;
 		}elseif (empty($file_name)) {
	    	
		$sqlquery = "UPDATE product_table
					 SET 
					 product_title = '$product_title',
					 product_price = '$product_price',
					 product_qty = '$product_qty',
					 unit_name = '$unit_name',
					 division_id = '$division_id',
					 district_id = '$district_id',
					 category_id = '$category_id',
					 product_details = '$product_details',
					 verify = '1'
					 WHERE product_id = '$id' AND farmer_id = '$farm'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{

	    	//delete previous image
	    	$query = "SELECT * FROM product_table WHERE product_id = '$id'"; 
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = $delimg['product_image'];
	            unlink($dellink);
	        }
	    }
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE product_table
					 SET 
					  product_title = '$product_title',
					 product_price = '$product_price',
					 product_qty = '$product_qty',
					 unit_name = '$unit_name',
					 division_id = '$division_id',
					 district_id = '$district_id',
					 category_id = '$category_id',
					 product_details = '$product_details',
					 product_image = '$uploaded_image',
					 verify = '1'
					 WHERE product_id = '$id'AND farmer_id = '$farm'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>product name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>product name not updated</span>";
				return $message;
			}
	}
	//product end


	//about update 
	public function aboutdesUpdate($data,$id){
		$aboutdes_title = mysqli_real_escape_string($this->con, $data['aboutdes_title']);
		$aboutdes_details = mysqli_real_escape_string($this->con, $data['aboutdes_details']);
		$sqlquery = "UPDATE aboutdes_table
					 SET 
					 aboutdes_title = '$aboutdes_title',
					 aboutdes_details = '$aboutdes_details'
					 WHERE aboutdes_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>district name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>district name not updated</span>";
				return $message;
			}
	}


 

	public function aboutmeUpdate($data,$file,$id){
		$aboutme_name = mysqli_real_escape_string($this->con, $data['aboutme_name']);
		$aboutme_details = mysqli_real_escape_string($this->con, $data['aboutme_details']);
		 


		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images_new/".$unique_image;
	    $move_image = "../images_new/".$unique_image;
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE aboutme_table
					 SET 
					 aboutme_name = '$aboutme_name',
					 aboutme_details = '$aboutme_details'
					 WHERE aboutme_id = '$id'";
		$insert_row = self::updateQuery($sqlquery);
	    }else{

	    	//delete previous image
	    	$query = "SELECT * FROM aboutme_table WHERE aboutme_id = '$id'"; 
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = '../'.$delimg['image'];
	            unlink($dellink);
	        }
	    }
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE aboutme_table
					 SET 
					  aboutme_name = '$aboutme_name',
					 aboutme_details = '$aboutme_details',
					 image = '$uploaded_image'
					 WHERE aboutme_id = '$id'";
					 $insert_row = self::updateQuery($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>product name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>product name not updated</span>";
				return $message;
			}
	}
	//about end
		 public function slideUpdate($data,$file,$id){
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
			    if (empty($file_name)) {
			    	
				$sqlquery = "UPDATE slide_table
							 SET 
							 slide_title = '$slide_title',
							 slide_details = '$slide_details'
							 WHERE slide_id = '$id'";
				$insert_row = self::updateQuery($sqlquery);
			    }else{

			    	//delete previous image
			    	$query = "SELECT * FROM slide_table WHERE slide_id = '$id'"; 
			    $getData = self::supportdeleteQuery($query);
			    if ($getData) {
			        while ($delimg = $getData->fetch_assoc()) { 
			            $dellink = '../'.$delimg['slide_image'];
			            unlink($dellink);
			        }
			    }
			    	    move_uploaded_file($file_temp, $move_image);
			    	$sqlquery = "UPDATE slide_table
							 SET 
							  slide_title = '$slide_title',
							 slide_details = '$slide_details',
							 slide_image = '$uploaded_image'
							 WHERE slide_id = '$id'";
							 $insert_row = self::updateQuery($sqlquery);
			    }
				if ($insert_row) {
						$message = "<span style='color:green;'>product name updated</span>";
						return $message;
					}else{
						$message = "<span style='color:red;'>product name not updated</span>";
						return $message;
					}
			}
			//about end
		  public function admindataup($data,$file,$id){
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


			     if (empty($admin_name) || empty($admin_email) || empty($admin_password)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>Please Make sure No field is an empty!</span>";
				return $loginmsg;


		} elseif (!preg_match("/^[a-zA-Z ]*$/",$admin_name)) {
		 				 
		 				 $loginmsg = "<span style='color:red; font-size: 15px;'>(A-Z অথবা a-z) ব্যবহার যোগ্য</span>";
		 				 return $loginmsg;
				}


		elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) { 
 				 $loginmsg = "<span style='color:red; font-size: 15px;'>Enter a valied email</span>";
 				 return $loginmsg;
		}    


		elseif (empty($file_name)) {
			    	
				$sqlquery = "UPDATE admin_table
							 SET 
							 admin_name = '$admin_name',
							 admin_email = '$admin_email',
							 admin_password = '$admin_password',
							 acc = '$acc'
							 WHERE admin_id = '$id'";
				$insert_row = self::updateQuery($sqlquery);
			    }else{

			    	//delete previous image
			    	$query = "SELECT * FROM admin_table WHERE admin_id = '$id'"; 
			    $getData = self::supportdeleteQuery($query);
			    if ($getData) {
			        while ($delimg = $getData->fetch_assoc()) { 
			            $dellink = '../'.$delimg['image'];
			            unlink($dellink);
			        }
			    }
			    	    move_uploaded_file($file_temp, $move_image);
			    	$sqlquery = "UPDATE admin_table
							 SET 
							  admin_name = '$admin_name',
							 admin_email = '$admin_email',
							 admin_password = '$admin_password',
							 acc = '$acc',
							 image = '$uploaded_image'
							 WHERE admin_id = '$id'";
							 $insert_row = self::updateQuery($sqlquery);
			    }
				if ($insert_row) {
						$message = "<span style='color:green;'>product name updated</span>";
						return $message;
					}else{
						$message = "<span style='color:red;'>product name not updated</span>";
						return $message;
					}
			}
			//about end
		 

}


 ?>



