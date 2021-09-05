<?php 
include_once 'dbconnection.php';




class DeleteClass extends DBconnection{


	public function __construct(){
		$this->connectDataBase();
		
		
	}
	public function supportdeleteQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return $msg='no result found';
		}
	}
	public function deleteQuery($query){
		$delete_row = $this->con->query($query) or die($this->con->error.__LINE__);		
		if($delete_row){
			return $delete_row;
		}else{
			return false;
		}
	}

	public function categoryDelete($id){
		$sqlquery = "DELETE  FROM category WHERE category_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'createcat.php';</script>";
		

	}
	public function divDelete($id){
		$sqlquery = "DELETE  FROM division_table WHERE division_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'creatediv.php';</script>";
		

	}public function deleteconfirm($id){
		$sqlquery = "DELETE  FROM confirm_table WHERE browser_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'viewcart.php';</script>";
		

	}
	public function disDelete($id){
		$sqlquery = "DELETE  FROM district_table WHERE district_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'createdis.php';</script>";
		

	}
	public function contactDelete($id){
		$sqlquery = "DELETE  FROM contact_table WHERE contact_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'message.php';</script>";
		

	}
	public function cartDelete($id){
		$sqlquery = "DELETE  FROM cart_table WHERE cart_id = '$id'";
		$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'viewcart.php';</script>";
		

	}
	public function postDelete($id){
	$query = "SELECT * FROM post_table WHERE post_id = '$id'";
    $getData = self::supportdeleteQuery($query);
    if ($getData) {
        while ($delimg = $getData->fetch_assoc()) { 
            $dellink = '../'.$delimg['post_image'];
            unlink($dellink);
        }
    }
			$sqlquery = "DELETE  FROM post_table WHERE post_id = '$id'";
			$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'createpost.php';</script>";
			

		}
		public function slideDelete($id){
	$query = "SELECT * FROM slide_table WHERE slide_id = '$id'";
    $getData = self::supportdeleteQuery($query);
    if ($getData) {
        while ($delimg = $getData->fetch_assoc()) { 
            $dellink = '../'.$delimg['slide_image'];
            unlink($dellink);
        }
    }
			$sqlquery = "DELETE  FROM slide_table WHERE slide_id = '$id'";
			$result = self::deleteQuery($sqlquery);
		echo "<script> window.location = 'createslide.php';</script>";
			

		}
		
	public function macroDelete($id){
		$query = "SELECT * FROM macro_green WHERE macro_id = '$id'";
	    $getData = self::supportdeleteQuery($query);
	    if ($getData) {
	        while ($delimg = $getData->fetch_assoc()) { 
	            $dellink = '../'.$delimg['macro_image'];
	            unlink($dellink);
	        }
	    }
				$sqlquery = "DELETE  FROM macro_green WHERE macro_id = '$id'";
				$result = self::deleteQuery($sqlquery);
			echo "<script> window.location = 'createpost.php';</script>";
				

			}
	public function articleDelete($id){
			$query = "SELECT * FROM article_table WHERE article_id = '$id'";
		    $getData = self::supportdeleteQuery($query);
		    if ($getData) {
		        while ($delimg = $getData->fetch_assoc()) { 
		            $dellink = '../'.$delimg['article_image'];
		            unlink($dellink);
		        }
		    }
					$sqlquery = "DELETE  FROM article_table WHERE article_id = '$id'";
					$result = self::deleteQuery($sqlquery);
				echo "<script> window.location = 'createarticle.php';</script>";
					

				}


		public function productDelete($id){
			$query = "SELECT * FROM product_table WHERE product_id = '$id'";
		    $getData = self::supportdeleteQuery($query);
		    if ($getData) {
		        while ($delimg = $getData->fetch_assoc()) { 
		            $dellink = '../'.$delimg['product_image'];
		            unlink($dellink);
		        }
		    }
					$sqlquery = "DELETE  FROM product_table WHERE product_id = '$id'";
					$result = self::deleteQuery($sqlquery);
			echo "<script> window.location = 'createproduct.php';</script>";
					

				}
				 public function adminDelete($id){
							$query = "SELECT * FROM admin_table WHERE admin_id = '$id'";
						    $getData = self::supportdeleteQuery($query);
						    if ($getData) {
						        while ($delimg = $getData->fetch_assoc()) { 
						            $dellink = '../'.$delimg['image'];
						            unlink($dellink);
						        }
						    }
									$sqlquery = "DELETE  FROM admin_table WHERE admin_id = '$id'";
									$result = self::deleteQuery($sqlquery);
							echo "<script> window.location = 'admincontrol.php';</script>";
									

								}
				 

}


 ?>



