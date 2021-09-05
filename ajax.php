<?php
include_once 'basefile/SelectClass.php';
$select = new SelectClass();
 
 $country=$_POST["div_name"];
 $show = $select->disViewid($country);
 foreach ($show as $key) {
     echo '<option value="'.$key['district_id'].'">'.$key['dis_name'].'</option>';
 }

 
  
?>