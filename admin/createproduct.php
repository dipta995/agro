<?php   include 'header.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add product</h4><a href="createproduct.php">Create new product</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  $per_page = 20;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page; 



                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $productinsert = $insert->productInsert($_POST,$_FILES);
                    if (isset($productinsert)) {
                      echo $productinsert;
                    }
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $product = $update->productUpdate($_POST,$_FILES,$_GET['editproduct']);
                    if (isset($product)) {
                      echo $product;
                    }
                }
                if (isset($_GET['verifyid'])) {
                  $verify = $update->verifyupdate($_GET['verifyid']);
                }

                if (isset($_GET['deleteproduct'])) {
                  $delproduct = $_GET['deleteproduct'];
                $delete->productDelete($delproduct);
                }elseif (isset($_GET['editproduct'])) {
                  

              $key = $select->productdescriptionjoin($_GET['editproduct']);
    
              foreach ($key as $value) {


         
              ?>
                <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">product Title</label>
                      <input type="text" name="product_title" class="form-control" id="exampleInputName1" value="<?php echo $value['product_title'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product price</label>
                      <input type="text" name="product_price" class="form-control" id="exampleInputName1" value="<?php echo $value['product_price'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product quantity</label>
                      <input type="text" name="product_qty" class="form-control" id="exampleInputName1" value="<?php echo $value['product_qty'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleSelectGender">Show Our market</label>
                        <select name="ourmarket" class="form-control" id="exampleSelectGender">
                        <?php
                        if ($value['ourmarket']==0) { ?>
                           <option name="ourmarket" value="0">No</option>
                           <option name="ourmarket" value="1">Yes</option>
                      <?php  }elseif ($value['ourmarket']==1) { ?>
                         <option name="ourmarket" value="1">Yes</option>
                         <option name="ourmarket" value="0">No</option>
                         <?php
                      }
                        ?>
                        
                          
                        </select>
                      </div> 
                     <div class="form-group">
                      <label for="exampleInputName1">Unit</label>
                       <select name="unit_name" class="form-control" id="exampleSelectGender">
                               <option name="unit_name" value="<?php echo $value['unit_name']; ?>"> <?php echo $value['unit_name']; ?> 
                    <?php

                      $keys = $select->unitView();
            
                     while ($key = $keys->fetch_assoc()) { 
                             
                    ?>

                             </option>
                               <option name="unit_name" value="<?php echo $key['unit_name']; ?>"> <?php echo $key['unit_name']; ?> </option>
                             <?php } ?>
                         
                        
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">Division</label>
                        <select name="division_id" class="form-control" id="exampleSelectGender">
                               <option name="division_id" value="<?php echo $value['division_id']; ?>"> <?php echo $value['div_name']; ?> 
                    <?php

                      $keys = $select->divView();
            
                     while ($key = $keys->fetch_assoc()) { 
                             
                    ?>

                             </option>
                               <option name="division_id" value="<?php echo $key['division_id']; ?>"> <?php echo $key['div_name']; ?> </option>
                             <?php } ?>
                         
                        
                        </select>
                      </div>

                                          <div class="form-group">
                      <label for="exampleSelectGender">District</label>
                        <select name="district_id" class="form-control" id="exampleSelectGender">
                               <option name="district_id" value="<?php echo $value['district_id']; ?>"> <?php echo $value['dis_name']; ?> 
                    <?php

                      $keys = $select->disView();
            
                     while ($key = $keys->fetch_assoc()) { 
                             
                    ?>

                             </option>
                               <option name="district_id" value="<?php echo $key['district_id']; ?>"> <?php echo $key['dis_name']; ?> </option>
                             <?php } ?>
                         
                        
                        </select>
                      </div>

                                          <div class="form-group">
                      <label for="exampleSelectGender">View</label>
                        <select name="category_id" class="form-control" id="exampleSelectGender">
                               <option name="category_id" value="<?php echo $value['category_id']; ?>"> <?php echo $value['category_name']; ?> 
                    <?php

                      $keys = $select->categoryView();
            
                     while ($key = $keys->fetch_assoc()) { 
                             
                    ?>

                             </option>
                               <option name="category_id" value="<?php echo $key['category_id']; ?>"> <?php echo $key['category_name']; ?> </option>
                             <?php } ?>
                         
                        
                        </select>
                      </div>

                      
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <label>product image</label>
                      <input type="file" name="product_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="../<?php echo $value['product_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">product details</label>
                      <textarea name="product_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['product_details'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">product Title</label>
                      <input type="text" name="product_title" class="form-control" id="exampleInputName1" placeholder="Enter product title">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product price</label>
                      <input type="text" name="product_price" class="form-control" id="exampleInputName1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product quantity</label>
                      <input type="text" name="product_qty" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Show Our market</label>
                        <select name="ourmarket" class="form-control" id="exampleSelectGender">
                          <option name="ourmarket" value="1">Yes</option>
                          <option name="ourmarket" value="0">No</option>
                          
                        </select>
                      </div> 
                       <div class="form-group">
                      <label for="exampleSelectGender">Unit</label>
                        <select name="unit_name" class="form-control" id="exampleSelectGender">
                              <?php
              $key = $select->unitView();
              foreach ($key as $value) {
              ?>
                          <option name="unit_name" value="<?php echo $value['unit_name'];?>"><?php echo $value['unit_name'];?></option>
                        <?php } ?>
                        </select>
                      </div> 
                      <div class="form-group">
                      <label for="exampleSelectGender">Division</label>
                        <select name="division_id" class="form-control" id="exampleSelectGender">
                              <?php
              $key = $select->divView();
              foreach ($key as $value) {
              ?>
                          <option name="division_id" value="<?php echo $value['division_id'];?>"><?php echo $value['div_name'];?></option>
                        <?php } ?>
                        </select>
                      </div> 
                      <div class="form-group">
                      <label for="exampleSelectGender">District</label>
                        <select name="district_id" class="form-control" id="exampleSelectGender">
                              <?php
              $key = $select->disView();
              foreach ($key as $value) {
              ?>
                          <option name="district_id" value="<?php echo $value['district_id'];?>"><?php echo $value['dis_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">View</label>
                        <select name="category_id" class="form-control" id="exampleSelectGender">
                              
                    <?php

                      $keys = $select->categoryView();
            
                     while ($key = $keys->fetch_assoc()) { 
                             
                    ?>

                             
                               <option name="category_id" value="<?php echo $key['category_id']; ?>"> <?php echo $key['category_name']; ?> </option>
                             <?php } ?>
                         
                        
                        </select>
                      </div>
                    <div class="form-group">
                     
                       
                          <label>product image</label>
                      <input type="file" name="product_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                   
                     
                    
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">product details</label>
                      <textarea name="product_details" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" name="insert" class="btn btn-primary mr-2">insert</button>
           
                  </form>

          <?php } ?>
  

                    </div>
              </div>
            </div>
           
        
         
         
          </div>
          <table class="table table-dark table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Farmer</th>
                          <th>Description</th>                     
                          <th>image</th>                     
                          <th>price</th>                     
                          <th>qty</th>                     
                          <th>cat name</th>                     
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
            /*  $key = $select->productViewjoinadmin();*/
               $key = $select->productViewjoinpaginationadm($start_form,$per_page);
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['product_title']; ?></td>
                          <td><?php echo $value['farmer_name']; ?> <br> Phone: <?php echo $value['farmer_phone']; ?><br> Address: <?php echo $value['farmer_address']; ?></td>
                          <td><?php echo $select->textshort($value['product_details'],100); ?></td>
                          <td><img style="height: 80px; width: 100px;" src="../<?php echo $value['product_image']; ?>"></td>
                          <td><?php echo $value['product_price']; ?></td>
                          <td><?php echo $value['product_qty']; ?></td>
                          <td><?php echo $value['category_name']; ?></td>
                          <td>
                            <a style="color: red;" href="?verifyid=<?php echo $value['product_id']; ?>"><?php
                              if ($value['verify']==0) {
                                
                              }else{
                                echo "verify";
                              }
                            ?></a>
                            <a href="?editproduct=<?php echo $value['product_id']; ?>">Edit</a>
                            <a href="?deleteproduct=<?php echo $value['product_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>



                     <?php 


$getCourse = $select->productViewjoinadmin();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
  </section>
   



<div class="pagination">
   
  <?php echo "<a href='createproduct.php?page=1'>".'&laquo;'."Previous</a>"; 
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<a href='createproduct.php?page=".$i."'>".$i."</a>";
            }; ?>
         
       <?php echo "<a href='createproduct.php?page=1'>".'&raquo;'."Next</a>"; ?>
   
</div>







 
      <br>
         
         </div>
          </div>
        </div>
              <?php include_once 'footer.php'; ?>