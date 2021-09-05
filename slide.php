<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

  
    <div class="carousel-item active">
       <img style="width: auto; height: 400px;" class="d-block w-100" src="images_new/Farming pic.webp" alt="Third slide">
       <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
           <div class="float-right carousel-caption d-none d-md-block">
    <h1 style="font-size: 80px; color: red;">কৃষি বাতায়ন </h1>
    <p style=" font-size: 40px; color: blue;">পুষ্টি গুণ নিশ্চিত করা লক্ষ্য</p>
  </div>
        </div>
         
       </div>
      
    </div>
   
    <?php 

      $key = $select->slideView();
             
              foreach ($key as $value) {
           
    ?>
    <div class="carousel-item">
       <img style="width: auto; height: 400px;" class="d-block w-100" src="<?php echo $value['slide_image']; ?>" alt="Third slide">
       <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <style type="text/css">
            .titlecls{
              font-size: 80px;
            }.detailscls{
              font-size: 40px;
            }
          </style>
           
            <div class="carousel-caption d-none d-md-block">
              <?php echo $value['slide_title']; ?> <br>
              <?php echo $value['slide_details']; ?>
            </div>
        </div>
         
       </div>
     
    </div>
    <?php } ?>
     
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>