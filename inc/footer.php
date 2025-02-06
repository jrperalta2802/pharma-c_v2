</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<p style="color: white">At Pharma-C, we offer convenient access to high-quality healthcare products, from prescription medications to wellness supplements and medical equipment. We focus on affordability, reliability, and fast delivery to ensure a seamless shopping experience. Trust Pharma-C for all your healthcare needs.</p>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Our Hours</h4>
						<ul>
						<li>Monday to Sunday</li>
						<li>7:30 AM - 12:30 PM</li>
						
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Developers</h4>
						<ul>
							<li>Realino Peralta Jr.</li>
							<li>Carem Trina Joana Rivera</li>
							<li>Lhee Angelo Plamenco</li>
							<li>Miguel Christopher Jose</li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li>0917-595-352</li>
							<li>0927-307-6028</li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			
			<!-- <div class="payment_top">
			  <div class="payment">
			<img src="images/payment.jpg" alt="payment" />
			</div>
			</div> -->
			
			<div class="copy_right">
				<p>Web and Mobile Systems [2025]</p>
				<p>© Pharma-C &amp; All Rights Reserved.</p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>

</body>
</html>
