<?php   include 'header.php';?>
<style>
    label,td{
        color: black;
    }
    .redmark{
      color: red;

    }
</style>
     
<script type="text/javascript">
 $(document).ready(function(){

    
     $("#div_name").change(function(){
           var div_name=$("#div_name").val();
           $.ajax({
            type:"post",
            url:"ajax.php",
            data:"div_name="+div_name,
            success:function(data){
                    $("#dis_name").html(data);
            }
           });
     });
 });
</script>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add product</h4><a href="productup.php">Create new product</a>
                  <p class="card-description">                  
                  </p>
                  <?php 
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                    $productinsert = $insert->productInsertFarm($_POST,$_FILES,$farmer_id);
                    if (isset($productinsert)) {
                      echo $productinsert;
                    }  
                }
                 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
                    $product = $update->productUpdateFarm($_POST,$_FILES,$_GET['editproduct'],$farmer_id);
                    if (isset($product)) {
                      echo $product;
                    }
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
                      <label for="exampleInputName1">product Title <span class="redmark">*</span></label> 
                      <input type="text" name="product_title" class="form-control" id="exampleInputName1" value="<?php echo $value['product_title'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product price<span class="redmark">*</span></label>
                      <input type="text" name="product_price" class="form-control" id="exampleInputName1" value="<?php echo $value['product_price'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product quantity<span class="redmark">*</span></label>
                      <input type="text" name="product_qty" class="form-control" id="exampleInputName1" value="<?php echo $value['product_qty'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Unit<span class="redmark">*</span></label>
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
                    
                    <select id="div_name" name="div_search" class="form-control" id="exampleFormControlSelect1 division">
              <option name="div_search" value="<?php echo $value['division_id'];?>"><?php echo $value['div_name'];?></option>
                <?php
              $key = $select->divView();
              foreach ($key as $values) {
              
            ?>
              <option name="div_search" value="<?php echo $values['division_id'];?>"><?php echo $values['div_name'];?></option>
            <?php } ?>
              
            </select>
                      <div class="form-group">
                      <label for="exampleSelectGender">District<span class="redmark">*</span></label>
                        <select id="dis_name" name="dis_search" class="form-control" id="exampleFormControlSelect1 district">
                          <option name="dis_search" value="<?php echo $value['division_id'];?>"><?php echo $value['dis_name'];?></option>
          
            </select>
                      </div>
                                          <div class="form-group">
                      <label for="exampleSelectGender">View<span class="redmark">*</span></label>
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
                      <input class="form-control" type="file" name="product_image" class="file-upload-default">
                     
                        </div>
                        <div class="col-md-3">
                          <img style="height: 115px; width: 180px;" src="<?php echo $value['product_image'];?>">
                        </div>
                      </div>
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">product details<span class="redmark">*</span></label>
                      <textarea name="product_details" class="form-control" id="exampleTextarea1" rows="4"><?php echo $value['product_details'];?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
           
                  </form>
                  

          <?php } }else{ ?>
                  <form method="post" action="" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                     
                      <input type="hidden" name="farmer_id" class="form-control" id="exampleInputName1" value="<?php echo $farmer_id;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">product Title<span class="redmark">*</span></label>
                      <input type="text" name="product_title" class="form-control" id="exampleInputName1" placeholder="Enter product title">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product price<span class="redmark">*</span></label>
                      <input type="text" name="product_price" class="form-control" id="exampleInputName1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">product quantity<span class="redmark">*</span></label>
                      <input type="text" name="product_qty" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Unit<span class="redmark">*</span></label>
                        <select name="unit_name" class="form-control" id="exampleSelectGender">
                              <?php
              $key = $select->unitView();
              foreach ($key as $value) {
              ?>
                          <option name="unit_name" value="<?php echo $value['unit_name'];?>"><?php echo $value['unit_name'];?></option>
                        <?php } ?>
                        </select>
                      </div> 
                     <select id="div_name" name="div_search" class="form-control" id="exampleFormControlSelect1 division">
              <option >--Select--</option>
                <?php
              $key = $select->divView();
              foreach ($key as $value) {
              
            ?>
              <option name="div_search" value="<?php echo $value['division_id'];?>"><?php echo $value['div_name'];?></option>
            <?php } ?>
              
            </select>
                      <div class="form-group">
                      <label for="exampleSelectGender">District<span class="redmark">*</span></label>
                        <select id="dis_name" name="dis_search" class="form-control" id="exampleFormControlSelect1 district">
          
            </select>
                      </div>
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">View<span class="redmark">*</span></label>
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
                      <input class="form-control"  type="file" name="product_image" class="file-upload-default">
                     
                   
                     
                    
                      
                    </div>
              
                    <div class="form-group">
                      <label for="exampleTextarea1">product details<span class="redmark">*</span></label>
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
                          
                          <th>Description</th>                     
                          <th>Status</th>                     
                          <th>imamge</th>                     
                          <th>price</th>                     
                          <th>qty</th>                     
                          <th>cat name</th>                     
                          <th></th>                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
              $key = $select->productViewjoinfarm($farmer_id);
              $i = 0;
              foreach ($key as $value) {
                $i++;
              
            ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value['product_title']; ?>
                          <br>
                          <?php $count = $select->countratting($value['product_id']);
                if ($count>0) {
                
             for ($i=0; $i < $count; $i++) { 
             echo '<span style="color: orange;" class="fa fa-star checked"></span>';
             }
             for ($i=0; $i < 5- $count; $i++) { 
              echo '<span style="color:#444;" class="fa fa-star"></span>';
             }
            }else{
              for ($i=0; $i < 5; $i++) { 
                echo '<span style="color:#444;" class="fa fa-star"></span>';
                }
            }

              

            ?>
                        
                        </td>
                          <td><?php echo $select->textshort($value['product_details'],60); ?></td>
                          <td><?php if ($value['verify']=='1') {
                            echo "Pending";
                          } else{
                            echo "verified";
                          }



                          
                          ?></td>
                          <td><img style="height: 80px; width: 100px;" src="<?php echo $value['product_image']; ?>"></td>
                          <td><?php echo $value['product_price']; ?></td>
                          <td><?php echo $value['product_qty']; ?></td>
                          <td><?php echo $value['category_name']; ?></td>
                          <td>
                            <a href="?editproduct=<?php echo $value['product_id']; ?>">Edit</a>
                            <a href="?deleteproduct=<?php echo $value['product_id']; ?>">Delete</a>
                           
                          </td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
         
         </div>
          </div>
        </div>
      <?php include 'footer.php'; ?>