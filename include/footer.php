	
	<!-- MOVE TO TOP BUTTON START-->

	<i class="fa fa-arrow-up cd-top" aria-hidden="true"></i>

	<!-- MOVE TO TOP BUTTON END -->
	
	<!-- Footer Section Start -->

	<section class="footer-section">
		<div class="container-fluid">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12 main-para-div">
						<p class="footer-main-heading">Keep Visiting!</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Location</p>
						<i class="fas fa-map-marker-alt footer-icons"></i>
						<p class="footer-sub-para">Silicon Valley</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Contact us</p>
						<p class="footer-sub-para"><i class="fas fa-mobile-alt footer-icons"></i>+91 9876543210</p>
						<p class="footer-sub-para"><i class="fas fa-fax footer-icons"></i>+91 9876578430</p>
						<p class="footer-sub-para"><i class="far fa-envelope footer-icons mail-icon"></i>jainaastha1002@gmail.com</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Drop a Mail</p>
						<p class="footer-sub-para"><i class="far fa-envelope footer-icons mail-icon"></i>jainaastha1002@gmail.com</p>

					</div>
					<div class="col-sm-12 main-para-div2">
						<p class="footer-sub-para footer-last-para">Engage Hub <span class="footer-line">|</span> Designed for Microsoft Engage Program by Aastha Jain</p>
						<a href="#"><i class="social-icons fab fa-facebook-f fb" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-twitter tw" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-instagram ig" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-pinterest pin" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>		
	</section>	

	<!-- Footer section end -->

	<!-- SCRIPT LINKS Start -->

    <!-- <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Back to to move -->
    <script type="text/javascript" src="js/backtotop.js"></script>
    

	<!-- NAVBAR BACKGROUND COLOR CLASS ADD -->

	<script type="text/javascript">
		var scroll_start = 0;
		var startchange = $('.fixNavColor');
		var offset = startchange.offset();
		$(document).ready(function() {
		
		if (startchange.length){
		$(document).scroll(function() { 
		scroll_start = $(this).scrollTop();

		if(scroll_start > offset.top) {
		$('nav').addClass('fixClass');
		} 
		else{
		$('nav').removeClass('fixClass');
		}
		});
		}
		});
	</script>

<script>
if ( window.history.replaceState ) {
  	window.history.replaceState( null, null, window.location.href );
}
</script>