<?php 
include_once 'dbconnection.php';


class SelectClass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
	public function textshort($text, $limit = 300){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')); // string possition into space 
        $text = $text."...";
        return $text;

    }


	public function selectQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return $msg='no result found';
		}
	}
	public function selectQuery_one($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result){
			return $result;
		} else {
			return $msg='no result found';
		}
	}


	// category view
	public function categoryView(){
		$sqlquery = "SELECT * FROM category";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function categoryViewid($id){
		$sqlquery = "SELECT * FROM category WHERE category_id = '$id'";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	//category view end


		// div view
	public function divView(){
		$sqlquery = "SELECT * FROM division_table";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
		public function divViewid($id){
			$sqlquery = "SELECT * FROM division_table WHERE division_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	//div end

		public function confirmtableview($customer_id){
		$sqlquery = "SELECT * FROM confirm_table WHERE customer_id=$customer_id";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
//dis view
	public function disView(){
			$sqlquery = "SELECT * FROM district_table ";
			$result = self::selectQuery($sqlquery);
			return $result;
 
		}
		 
		/*	public function disViewjoin($id){
			$sqlquery = "SELECT * FROM district_table LEFT JOIN division_table WHERE district_table.division_id=division_table.division_id WHERE division_id=$id";
			$result = self::selectQuery($sqlquery);
			return $result;

		}*/
			public function disViewidjoin($id){
						$sqlquery = "SELECT * FROM division_table LEFT JOIN district_table ON district_table.division_id=division_table.division_id WHERE district_id=$id";
						$result = self::selectQuery($sqlquery);
						return $result;

					}

		public function unitView(){
			$sqlquery = "SELECT * FROM unit_table ";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function disViewid($id){
			$sqlquery = "SELECT * FROM district_table WHERE division_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	//dis view end
//contact view
	public function contactView(){
			$sqlquery = "SELECT * FROM contact_table ";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function contactViewseen(){
			$sqlquery = "SELECT * FROM contact_table WHERE seen = 0";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function contactViewid($id){
			$sqlquery = "SELECT * FROM contact_table WHERE contact_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	//dis view end

	//product view
	public function productViewjoinpagination($start_form,$per_page){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id WHERE ourmarket='0' AND verify ='0' LIMIT $start_form,$per_page";
		$result = self::selectQuery($sqlquery);
		return $result;

	
	}
	public function productViewjoinpaginationadm($start_form,$per_page){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id left join farmer_table on product_table.farmer_id = farmer_table.farmer_id ORDER BY verify DESC LIMIT $start_form,$per_page ";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function productViewjoin(){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id WHERE ourmarket='0' AND verify ='0'";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function productViewjoinadmin(){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function productViewjoinfarm($farm){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id WHERE ourmarket='0' AND farmer_id='$farm'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function productViewjoinSP(){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id WHERE ourmarket='1'  AND verify ='0' ";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function productViewjoinSPpagination($start_form,$per_page){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id WHERE ourmarket='1'  AND verify ='0' limit $start_form,$per_page";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function productViewsearch($a,$b,$c){
		$sqlquery = "SELECT * FROM product_table WHERE division_id LIKE '%$a%' AND  district_id LIKE '%$b%' AND product_title LIKE '%$c%' ";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function productViewID($id){
		$sqlquery = "SELECT * FROM product_table WHERE category_id = '$id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function productViewIDpr($id){
		$sqlquery = "SELECT * FROM product_table WHERE product_id = '$id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function productViewIDpagination($start_form,$per_page,$id){
			$sqlquery = "SELECT * FROM product_table WHERE category_id = '$id' limit $start_form,$per_page";
			$result = self::selectQuery_one($sqlquery);
			return $result;

		}

	public function productdescription($id){
			$sqlquery = "SELECT * FROM product_table WHERE product_id = '$id'  AND verify ='0' ";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function productView(){
			$sqlquery = "SELECT * FROM product_table";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function slideView(){
			$sqlquery = "SELECT * FROM slide_table";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function slideViewid($id){
			$sqlquery = "SELECT * FROM slide_table where slide_id = $id";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	public function productdescriptionjoin($id){
				$sqlquery = "SELECT * FROM product_table LEFT JOIN category ON product_table.category_id = category.category_id LEFT JOIN division_table ON product_table.division_id = division_table.division_id LEFT JOIN district_table ON product_table.district_id = district_table.district_id WHERE product_id = '$id'";
				$result = self::selectQuery($sqlquery);
				return $result;

			}

	//product view end

	// post view
	public function postView(){
		$sqlquery = "SELECT * FROM post_table";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function postViewctrl(){
		$sqlquery = "SELECT * FROM post_table WHERE front_view=0 limit 6";
		$result = self::selectQuery($sqlquery);
		return $result;

	}

	public function postdescription($id){
			$sqlquery = "SELECT * FROM post_table WHERE post_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	//post view end

// macro view
	public function macroView(){
		$sqlquery = "SELECT * FROM macro_green";
		$result = self::selectQuery($sqlquery);
		return $result;

	}

	public function macroViewid($id){
			$sqlquery = "SELECT * FROM macro_green WHERE macro_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	
	//article view end// macro view
	public function articleView(){
		$sqlquery = "SELECT * FROM article_table";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function articleViewsingle(){
		$sqlquery = "SELECT * FROM article_table WHERE article_status=1 ORDER BY creation Desc limit 1 ";
		$result = self::selectQuery($sqlquery);
		return $result;

	}

	public function articleViewid($id){
			$sqlquery = "SELECT * FROM article_table WHERE article_id = '$id'";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
	
	//article view end


//cart view


	public function viewCart($customer_id){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN cart_table ON cart_table.product_id = product_table.product_id WHERE customer_id='$customer_id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function viewCartfarm($farmer_id){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN cart_table ON cart_table.product_id = product_table.product_id WHERE farmer_id='$farmer_id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function viewCartfarmcount($farmer_id){
		$sqlquery = "SELECT * FROM cart_table WHERE farmer_id='$farmer_id' AND process=0";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}

	public function viewCartcustomercount($farmer_id){
		$sqlquery = "SELECT * FROM cart_table WHERE customer_id='$farmer_id' AND process=0";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}





	
	public function viewCartprocess($farmer_id){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN cart_table ON cart_table.product_id = product_table.product_id WHERE cart_table.farmer_id='$farmer_id' AND cart_table.process = 0";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
	public function viewCartProduct($customer_id){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN cart_table ON cart_table.product_id = product_table.product_id WHERE customer_id='$customer_id' ";
		$result = self::selectQuery_one($sqlquery);
		return $result;
	}
	public function vieworderProduct($customer_id)
	{
		$sqlquery = "SELECT * FROM product_table LEFT JOIN order_table ON order_table.product_id = product_table.product_id WHERE customer_id='$customer_id' order by created_at Desc ";
		$result = self::selectQuery_one($sqlquery);
		return $result;
	}

	public function feedbackcheck($customer_id,$product)
	{
		$sqlquery = "SELECT * FROM  order_table  WHERE customer_id='$customer_id' AND  product_id='$product' AND process=1 ";
		$result = self::selectQuery_one($sqlquery);
		return $row = mysqli_num_rows($result);
		// return $result;
	}

	public function sellproduct($farmer_id)
 {
 
	 $que = "SELECT * FROM order_table WHERE farmer_id = $farmer_id AND process=1 ";
	return $result = self::selectQuery_one($que);
	   
 
 }
 public function sellproduct_cal($farmer_id)
 {
	 $price=0;
	 $prices=0;
	 $que = "SELECT * FROM order_table WHERE farmer_id = $farmer_id AND process=1";
	 $result = self::selectQuery_one($que);
	 foreach ($result as $key => $value) {
		 $price += $value['product_price']*$value['product_qty'];
	 }
	 $que = "SELECT * FROM return_money WHERE farmer_id = $farmer_id";
	 $results = self::selectQuery_one($que);
	 foreach ($results as $key => $values) {
		 $prices += $values['return_amount'];
	 }
	  
	   return $price-$prices;
 
 }
 

 public function farmerlist()
 {
	$que = "SELECT * FROM  farmer_table";
	return $result = self::selectQuery_one($que);
	
 }
 public function orderaccount($farmer_id)
 {
	$que = "SELECT * FROM  order_table where farmer_id = $farmer_id and process=1";
	return $result = self::selectQuery_one($que);
 }

 public function returnmoney($farmer_id)
 {
	$que = "SELECT * FROM  return_money where farmer_id = $farmer_id ";
	return $result = self::selectQuery_one($que);
 }




 public function paidfarmer($farmer_id = null)
 {
	 $prices = 0;
	$que = "SELECT * FROM return_money WHERE farmer_id = $farmer_id";
	$results = self::selectQuery_one($que);
	foreach ($results as $key => $values) {
		$prices += $values['return_amount'];
	}
	return $prices;
 }

	public function sleeplistcustomer()
	{
		
		$sqlquery = "SELECT * FROM  customer_table INNER JOIN  sleep_table ON sleep_table.customer_id = customer_table.customer_id  order by sleep_table.created_time desc";
		$result = self::selectQuery_one($sqlquery);
		return $result;
	}
 
	public  function productlist($sleep_no)
	{
		$sqlquery = "SELECT * FROM   product_table INNER JOIN  order_table ON product_table.product_id = order_table.product_id  WHERE order_table.sleep_no = $sleep_no  order by order_table.created_at desc";
			$result = self::selectQuery_one($sqlquery);
			return $result;
	}
	public function sleepamount($customer_id)
	{
		$total = 0;
		$totals = 0;
		$sqlquery = "SELECT * FROM sleep_table  WHERE customer_id='$customer_id' ";
		$result = self::selectQuery_one($sqlquery);
		foreach ($result as  $value) {
			$total += $value['account'];
		}
		$sqlquerys = "SELECT * FROM pay_table  WHERE customer_id='$customer_id' ";
		$results = self::selectQuery_one($sqlquerys);
		foreach ($results as  $values) {
			$totals += $values['accounts'];
		}
		return $final = $total - $totals;
	}
	public function payablecustomer($customer_id){
		$sqlquery = "SELECT * FROM cart_table WHERE customer_id='$customer_id' AND cart_table.process = 1";
		$result = self::selectQuery_one($sqlquery);
		return $result;
	}
	public function paytablecustomer($customer_id){
		$sqlquery = "SELECT * FROM pay_table WHERE customer_id='$customer_id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;
	}



	public function myorderedproduct($customer_id){
		$sqlquery = "SELECT * FROM product_table LEFT JOIN cart_table ON cart_table.product_id = product_table.product_id WHERE cart_table.farmer_id='$customer_id' AND cart_table.process = 1";
		$result = self::selectQuery_one($sqlquery);
		return $result;




	}

 
 
 
	public function viewCartcount($browser_id){
		$sqlquery = "SELECT * FROM cart_table WHERE browser_id='$browser_id'";
		$result = self::selectQuery_one($sqlquery);
		return $result;

	}
 
 
	
//end cart view

	//customer view
	public function customerView(){
		$sqlquery = "SELECT * FROM customer_table ORDER BY customer_id DESC";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function adminView(){
		$sqlquery = "SELECT * FROM admin_table ORDER BY admin_id DESC";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
	public function adminViewid($id){
		$sqlquery = "SELECT * FROM admin_table WHERE admin_id=$id";
		$result = self::selectQuery($sqlquery);
		return $result;

	}
		//customer view





		//customer view
		public function farmerView(){
			$sqlquery = "SELECT * FROM farmer_table ORDER BY farmer_id DESC";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
			//customer view






		//about view
		public function aboutdetailsview(){
			$sqlquery = "SELECT * FROM aboutdes_table limit 1";
			$result = self::selectQuery($sqlquery);
			return $result;

		}public function aboutdetailsviewid($id){
			$sqlquery = "SELECT * FROM aboutdes_table where aboutdes_id = $id ";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function aboutme(){
			$sqlquery = "SELECT * FROM aboutme_table limit 1";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function aboutmeid($id){
			$sqlquery = "SELECT * FROM aboutme_table where aboutme_id = $id ";
			$result = self::selectQuery($sqlquery);
			return $result;

		}
		public function commentview($id){
			$sqlquery = "SELECT * FROM comment_table LEFT JOIN replay_table on comment_table.comment_id = replay_table.comment_id where product_id = $id ";
			$result = self::selectQuery_one($sqlquery);
			return $result;

		}
		public function commentviewadmin(){
			$sqlquery = "SELECT * FROM comment_table LEFT JOIN product_table on comment_table.product_id = product_table.product_id left join farmer_table on farmer_table.farmer_id = product_table.farmer_id where comment_table.replay = 0 ";
			$result = self::selectQuery_one($sqlquery);
			return $result;

		}

		public function countratting($id){
			$sqlquery = "SELECT * FROM ratting where product_id = $id";
			$result = self::selectQuery_one($sqlquery);
 
			//$value = mysqli_fetch_array($result);
			  $rows = mysqli_num_rows($result);
			 $val=0;
			 foreach ($result as  $value) {
				 $val += $value['rat_count'];
			 }
			 if ($rows>0) {
				  
			 
			 return round($val/$rows);
			 }

		}
			//about view

//update product limit
public function productcountlimit($product,$userid,$identity){
	$sqlquery = "SELECT * FROM product_table where product_id = $product";
	$result = self::selectQuery_one($sqlquery);
	$value = mysqli_fetch_array($result);
	
	if ($identity=='farmer') {
		 	$qry = "SELECT * FROM cart_table WHERE product_id=$product AND process=0 AND farmer_id=$userid";
			$res = self::selectQuery_one($qry);
			$cart_value = mysqli_fetch_array($res);
	}elseif ($identity=='customer') {
		$qry = "SELECT * FROM cart_table WHERE product_id=$product AND process=0 AND customer_id=$userid";
		$res = self::selectQuery_one($qry);
		$cart_value = mysqli_fetch_array($res);
	}

	return $total  = $value['product_qty']+$cart_value['product_qty'];
	  

}




}



 ?>



