<?php 
	include('include/header.php');
  include('admin/include/dbcon.php');
 ?>

 <!-- SLIDER SECTION START -->

<section class="navbar-bottom-space fixNavColor">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/teachers/1.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          <h3 class="slider-heading-text"><span class="education">TEACHING</span> IS VERY NOBEL PROFESSION</h3>
          <p class="slider-para-text">That shapes the character and caliber</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/teachers/2.jpg" alt="Chicago">
        <div class="carousel-caption">
          <h3 class="slider-heading-text"><span class="education">TEACHING</span> IS TRUTH</h3>
          <p class="slider-para-text">Mediated by personality</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/teachers/3.jpg" alt="New York">
        <div class="carousel-caption">
          <h3 class="slider-heading-text">GOOD <span class="education">TEACHING</span> IS MORE</h3>
          <p class="slider-para-text">A giving of right questions than a giving of right answers</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/teachers/4.jpg" alt="New York">
        <div class="carousel-caption last-img">
          <h3 class="slider-heading-text"><span class="education">TEACHER</span> WHO EDUCATE CHILDREN</h3>
          <p class="slider-para-text">Deserve more honor than parents</p>
        </div>   
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</section>

 <!-- SLIDER SECTION END -->

 <!-- TEACHERS SECTION START -->

<section class="education-sec">
  <div class="container-fluid">
    <div class="container cutm-border">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="education-para"><span class="edu">Teaching</span> is the essential profession, the one that makes all professions possible.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEACHERS SECTION END -->


 <!-- OUR PROFESSORS SECTION START-->

<section class="professors-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="aboutUs-heading skilled-pro">OUR SKILLED PROFESSORS</p>
          <p class="aboutUs-para profesor-para">Teaching is an instinctual art, mindful of potential, craving of realizations, <br>a pausing, seamless process. Teachers can inspire hope, ignite the imagination, and instill<br> a love of learning. Good teaching must be slow enough so that it is not confusing, and fast enough so that <br>it is not boring.</p>
        </div>
      </div>
    </div>
  </div>

<!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php 
        $data = mysqli_query($sql_con,"select *from teachers where status = '1' ORDER BY id DESC LIMIT 10");
        while ($row = mysqli_fetch_array($data)) {
           $depname =  $row['dep'];
           $data2 = mysqli_query($sql_con,"select *from departments where id = '$depname'");
            $deprow = mysqli_fetch_array($data2);
         ?>         
      <div class="swiper-slide">
        <div class="Box">
         
          <img src="<?php echo $row['img'] ?>" alt="">
        </div>
        <div class="detail">
          <h3><?php echo $row['firstname']." ".$row['lastname']; ?><br><span><?php echo $deprow['depname']; ?></span> <br>
          <span><?php echo $row['emailfld'] ?></span></h3>
        </div>
     
      </div>
       <?php } ?>
    </div>
    
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>

<!-- OUR PROFESSORS SECTION END -->

<!-- ACHIVEMENT SECTION START -->

<section class="achivement-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="pround-text">We Have Something To Be Proud Of</p>  
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid blur-bg">
    <div class="container bottom-space">
      <div class="row text-center blur-row">
        <div class="col-sm-12">
          <?php 
          $data = mysqli_query($sql_con,"select *from teachers where status = '1'");
          $row = mysqli_num_rows($data);
           ?>          
          <p class="achive-para number"><?php echo $row; ?></p>
          <p class="achive-para2">Certified Teachers</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ACHIVEMENT SECTION END -->

<?php 
	include('include/footer.php');
 ?>

 <!-- Numbers count animation -->
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.countup.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.number').countUp({delay: 10,time: 2000});
  });
</script>

  <!-- Swiper JS -->
  <script src="js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      autoplay: {
        delay: 3000,
      },
      coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 150,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
</body>
</html>