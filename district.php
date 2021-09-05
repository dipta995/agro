    

    <?php
      include_once 'basefile/SelectClass.php';
      $select = new SelectClass();
      if (isset($_GET['division']) && !empty($_GET['division'])) {
    $key = $select->disViewjoin($_GET['division']);
              foreach ($key as $value) {
      	
     
 echo '<option value="'.$value['district_id'].'">'.$value['dis_name'].'</option>';
              
            }else{
      	echo "Error";
      }
            } ?>