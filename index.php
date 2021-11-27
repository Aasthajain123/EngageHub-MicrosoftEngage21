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
        <img src="images/4.png" alt="Los Angeles">
        <div class="carousel-caption last-img">
        <h2 class="slider-heading-text"><span class="education">ENGAGE   </span>  HUB</h3>
          <h3 class="slider-heading-text"><span class="education">WE PROVIDE</span> CLASSROOM EXPERIENCE</h3>
          <p class="slider-para-text">Start learning now!</p>
        </div>
           
      </div>
      <div class="carousel-item">
        <img src="images/2.jpg" alt="Chicago">
        <div class="carousel-caption">
          <h3 class="slider-heading-text"><span class="education"></span>GIVE QUIZZES!</h3>
          <p class="slider-heading-text"></p>
        </div> 
      
      </div>
      <div class="carousel-item">
        <img src="images/3.jpg" alt="New York">
        <div class="carousel-caption">
          <h3 class="slider-heading-text"><span class="education"></span>BY DISCUSSION WITH YOUR PEERS</h3>
          <p class="slider-para-text">Boost your knowledge</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="images/5.jpg" alt="New York">
        <div class="carousel-caption">
          <h3 class="slider-heading-text">THIS IS ENGAGE HUB!<span class="education"></span></h3>
          <p class="slider-heading-text"></p>
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
    
   
<!-- EDUCATION SECTION START -->

<section class="education-sec">
  <div class="container-fluid">
    <div class="container cutm-border">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="education-para"><span class="edu">Engage Hub</span> is the digitalized platform using which you can boost your knowledge!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- EDUCATION SECTION END -->

<!-- WE DO SECTION START -->

<section class="we-do-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="what-we-text">WHAT <span class="we-do"> WE ARE FOR</span></p>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-graduation-cap mb-2 card-icons"></i>
              <h5 class="card-title text-uppercase my-3">Real Time Quizzes</h5>
              <p class="card-text">Here After studying a topic you can check your knowledge instantly by giving examhand to hand.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-book mb-2 card-icons"></i>
              <h5 class="card-title text-uppercase my-3">Doubt Resolution with Peers</h5>
              <p class="card-text middle-card-text">Here you can have a doubt Resolution woth your peers which will boost up your knowledge.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-globe mb-2 card-icons"></i>
              <h5 class="card-title text-uppercase my-3">Digital Education</h5>
              <p class="card-text">Feel of Real Classroom just in one click.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WE DO SECTION END -->

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
        <div class="col-md-4">
        <?php 
          $data = mysqli_query($sql_con,"select *from teachers where status = '1'");
          $row = mysqli_num_rows($data);
           ?>          
          <p class="achive-para number"><?php echo $row; ?></p>
          <p class="achive-para2">Certified Teachers</p>
        </div>
        <div class="col-md-4">
          <?php 
          $data = mysqli_query($sql_con,"select *from students");
          $row = mysqli_num_rows($data);
           ?>
          <p class="achive-para number"><?php echo $row; ?></p>
          <p class="achive-para2">Students</p>
        </div>
        <div class="col-md-4">
          <?php 
          $data = mysqli_query($sql_con,"select *from subscribe");
          $row = mysqli_num_rows($data);
           ?>
          <p class="achive-para number"><?php echo $row; ?></p>
          <p class="achive-para2">Subscribers</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ACHIVEMENT SECTION END -->

<!-- CAREER ADVICE SECTION START -->

<section class="career-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="career-heading">CAREER GROWTH</p>
        </div>
        <div class="col-lg-6 career-content">
          <img src="images/career.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 career-content">
          <p class="grow-text ourteam">Our Teachers</p>
          <div class="professionals">
            <p class="grow-sub-text"><i class="fas fa-check check"></i>They focus on goals and results</p>
            <p class="grow-sub-text"><i class="fas fa-check check"></i>Team members are diverse</p>
            <p class="grow-sub-text"><i class="fas fa-check check"></i>Good leadership</p>
            <p class="grow-sub-text"><i class="fas fa-check check"></i>They’re organised</p>
          </div>    
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CAREER ADVICE SECTION END -->

<!-- SUBSCRIBE SECTION START -->

<section class="subscribe-sec">
  <div class="container-fluid">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12">
          <p class="pround-text sub-main-para">SUBSCRIBE NOW!</p>
          <p class="sub-para">Enter your email address to get the latest news, special events and student activities delivered right to your inbox.</p>
          <div class="subscribe-grid">
            <form action="" method="post">
              <input class="email-type" type="email" placeholder="Enter your email.." name="Subscribe" required="true">
              <button type="submit" name="subscribebtn" class="btn-subscribe">SUBSCRIBE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SUBSCRIBE SECTION END -->

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
</body>
</html>
<?php 
if (isset($_POST['subscribebtn'])) {
   $email = $_POST['Subscribe'];
    $data = mysqli_query($sql_con,"select *from subscribe");
    while ($row = mysqli_fetch_array($data)) {
    $emaildb = $row['emails'];
    if($emaildb == $email){
        echo "<script>alert('Email already exist')</script>";
        exit();
        }
    }
   mysqli_query($sql_con,"insert into subscribe (emails) values ('$email')");
   echo "<script>alert('You are successfully subscribed')</script>";
}
 ?>