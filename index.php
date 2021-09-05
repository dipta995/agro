<?php include 'header.php'; ?>
 
 
</div>

 
<div class="wrapper row3">
  <?php include 'slide.php'; ?>
  <main class="hoc container clear"> 
    <!-- main body -->
    <section id="services">
      <div class="sectiontitle">
        <p style="font-size: 20px;" class="nospace font-xs">লেটেস্ট ব্লগ </p>
      </div>
      <ul class="nospace group grid-3">
         <?php
              $key = $select->postViewctrl();
              foreach ($key as $value) {
              
            ?>
        <li class="one_third">
          <article><a href="#"><img style="height: 50px; width: 50px;" src="<?php echo $value['post_image'];?>"></a>
            <h6 class="heading"><?php echo $value['post_title'];?></h6>
            <p><?php echo $select->textshort($value['post_details'],200);?></p>
            <footer><a href="viewpost.php?postid=<?php echo $value['post_id'];?>">More Details &raquo;</a></footer>
          </article>
        </li>
       
       <?php }  ?>
      </ul>
    </section>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="bgded overlay" style="background-image:url('images/pics.jpg');">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <p style="font-size: 20px;" class="nospace font-xs">আধুনিক কৃষি ও কৃষক </p> 
    </div>

    <?php
              $key = $select->articleViewsingle();
              foreach ($key as $value) {
              
            ?>
    <article id="points" class="group">
      <div class="two_third first">
        <h6 style="color: orange;" class="heading"><?php echo $value['article_title'];?></h6>
        <p><?php echo $value['article_description'];?></p>
       
      </div>
      <div class="one_third last"><a class="imgover" href="#"><img src="<?php echo $value['article_image'];?>" alt=""></a></div>
    </article>

  <?php } ?>
 
  </section>
</div>
 
<div class="wrapper row2">
  <section class="hoc container clear"> 
 
    <div id="comments">
        
        <h2>কমেন্ট লিখুন</h2>
        <?php 
          if($_SERVER['REQUEST_METHOD']=='POST'){
                    $contactins = $insert->contactInsert($_POST);
                    if (isset($contactins)) {
                      echo $contactins;
                    }
                }
        ?>
        <form action="" method="post"> 
          <div class="one_third first">
            <label for="name">নাম <span class="comred">*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">ইমেইল <span  class="comred">*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">ফোন নাম্বার  <span  class="comred">*</span></label> 
            <input type="text" name="phone" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="comment">আপনার কমেন্ট লিখুন <span  class="comred">*</span></label>
            <textarea placeholder="Min-10 And Max-300" name="comment" id="comment" cols="25" rows="10" required></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="সাবমিট করুন">
            &nbsp;
            <input type="reset" name="reset" value="পুনরায় তৈরি করুন">
          </div>
        </form>
      </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<?php include 'footer.php';?>