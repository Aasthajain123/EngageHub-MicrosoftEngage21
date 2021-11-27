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
        <img src="images/students/1.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          <h3 class="slider-heading-text">A GOOD  <span class="education">STUDENT</span></h3>
          <p class="slider-para-text">Maintains good work habits</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/students/2.jpg" alt="Chicago">
        <div class="carousel-caption">
          <h3 class="slider-heading-text">BEING A <span class="education">STUDENT</span> IS EASY</h3>
          <p class="slider-para-text">learning requires actual work</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/students/3.jpg" alt="New York">
        <div class="carousel-caption">
          <h3 class="slider-heading-text">TO BECOME A GOOD <span class="education">STUDENT</span></h3>
          <p class="slider-para-text">You need to get motivated</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/students/4.jpg" alt="New York">
        <div class="carousel-caption last-img">
          <h3 class="slider-heading-text">A GOOD <span class="education">STUDENT</span></h3>
          <p class="slider-para-text">Should be hardworking</p>
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

 <!-- STUDENTS SECTION START -->

<section class="education-sec">
  <div class="container-fluid">
    <div class="container cutm-border">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="education-para"><span class="edu">Students</span> are tomorrow’s leaders of a country</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STUDENTS SECTION END -->


 <!-- OUR STUDENTS SECTION START-->

<section class="professors-sec">
	<div class="container-fluid">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-12">
					<p class="aboutUs-heading skilled-pro">OUR STUDENTS</p>
					<p class="aboutUs-para profesor-para">Students are the future of our society. They need not only be trained for gainful employment, rather, <br>they should be prepared to lead.</p>
				</div>
			</div>
		</div>
	</div>

<!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
       <?php 
        $data = mysqli_query($sql_con,"select *from students ORDER BY id DESC LIMIT 10");
        while ($row = mysqli_fetch_array($data)) {
           $depname =  $row['dep'];
           $data2 = mysqli_query($sql_con,"select *from departments where id = '$depname'");
            $deprow = mysqli_fetch_array($data2);
         ?>   
      <div class="swiper-slide">
        <div class="Box">
          <img src="<?php echo $row['img']; ?>" alt="">
        </div>
        <div class="detail">
          <h3><?php echo $row['firstname']." ".$row['lastname']; ?><br><span><?php echo $deprow['depname']; ?></span> <br>
          <span><?php echo $row['stdemail'] ?></span></h3>
        </div>
      </div>
      <?php } ?>
    </div>
    
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>

<!-- OUR STUDENTS SECTION END -->

<!-- ACHIVEMENT SECTION START -->

<section class="achivement-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="pround-text">Our Students are Shining!</p>  
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid blur-bg">
    <div class="container bottom-space">
      <div class="row text-center blur-row">
        <div class="col-sm-12">
          <?php 
          $data = mysqli_query($sql_con,"select *from students");
          $row = mysqli_num_rows($data);
           ?>          
          <p class="achive-para number"><?php echo $row; ?></p>
          <p class="achive-para2">Students</p>
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