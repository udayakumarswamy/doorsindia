<?php
include "db-config.php"; 
$news = '';
$result = $conn->query("SELECT * FROM door_news WHERE id=1");
$num_rows = $result->num_rows;
if ($num_rows) {
  $row = $result->fetch_assoc();
  $news = $row['news'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Doors India</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/doors.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body id="page-top" class="index">
    	<div class="container-fluid head-top hidden-xs">
    		<div class="container hidden-xs">
    			<div class="row">
    				<div class="col-md-6 text-left">
    					<img src="images/news.png"></i> Latest News: <?php echo $news; ?>
    				</div>
    				<div class="col-md-6 text-right">
    					<img src="images/call.png"> +91 0700078025 | +91 9700078025
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="container menubar">
    		<div class="row">
    			<nav class="navbar navbar-custom" role="navigation">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
    							<i class="fa fa-bars"></i>
    						</button>
    						<a class="navbar-brand page-scroll" href="index.php"><img src="images/logo.png"></a>
    					</div>

    					<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    						<ul class="nav navbar-nav navbar-right">
    							<li class="page-scroll active">
    								<a href="#page-top">Home</a>
    							</li>
    							<li class="page-scroll">
    								<a href="#deals">Deals</a>
    							</li>
    							<li class="page-scroll">
    								<a href="listing.php">Projects</a>
    							</li>
    							<li class="page-scroll">
    								<a href="about.php">About Us</a>
    							</li>
    							<li class="page-scroll">
    								<a href="#Contact">Contact</a>
    							</li>
    						</ul>
    					</div>
    				</div>
    			</nav>
    	</div>


    	<header class="intro">
    		<div class="intro-body">
    			<div class="container-fluid">
    				<div class="row">
    					<div id="carousel-home" class="carousel slide carousel-fade" data-ride="carousel">
    						<div class="carousel-inner">
    							<div class="active item"></div>
    						</div>
    					</div>
    				</div>

    				<div class="row searchbar">
    					<div class="container">
    						<form action="listing.php" method="get">
    							<div class="col-md-2">
    								<div class="select">
    									<span class="placeholder">Select City</span>
    									<ul>
    										<?php
    										$sql = "SELECT DISTINCT city FROM `door_property_details` WHERE status = 1";
    										$result = $conn->query($sql);
    										if ($result->num_rows > 0) {
    											while($row = $result->fetch_assoc()) {
    												?>
    												<li data-value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></li>
    												<?php
    											}
    										}
    										?>
    									</ul>
    									<input type="hidden" name="city">
    								</div>
    							</div>
    							<div class="col-md-4">
    								<input type="text" name="area" class="search-query" placeholder="Search by Locality">
    							</div>
    							<div class="col-md-2">
    								<div class="select">
    									<span class="placeholder">Property Type</span>
    									<ul>
    										<?php
    										$sql = "SELECT DISTINCT property_type FROM `door_property_details` WHERE status = 1";
    										$result = $conn->query($sql);
    										if ($result->num_rows > 0) {
    											while($row = $result->fetch_assoc()) {
    												?>
    												<li data-value="<?php echo $row['property_type']; ?>"><?php echo $row['property_type']; ?></li>
    												<?php
    											}
    										}
    										?>
    									</ul>
    									<input type="hidden" name="property_type">
    								</div>
    							</div>
    							<div class="col-md-2">
    								<div class="select">
    									<span class="placeholder">Select BHK</span>
    									<ul>
    										<?php
    										$sql = "SELECT DISTINCT transaction_type FROM `door_property_details` WHERE status = 1";
    										$result = $conn->query($sql);
    										if ($result->num_rows > 0) {
    											while($row = $result->fetch_assoc()) {
    												?>
    												<li data-value="<?php echo $row['transaction_type']; ?>"><?php echo $row['transaction_type']; ?></li>
    												<?php
    											}
    										}
    										?>
    									</ul>
    									<input type="hidden" name="variant">
    								</div>
    							</div>
    							<div class="col-md-2 text-left">
    								<button type="submit" class="btn btn-success">Search</button>
    							</div>		
    						</form>

    						<div class="down text-center visible-xs page-scroll">
    								<a href="#deals"><img src="images/down.png"></a>
    						</div>
    					</div>
    				</div>		  
    			</div>
    		</div>
    	</header>


    	<div class="container-fluid whatwedo-wrap">
    		<div class="container whatwedo hidden-xs" id="About">
    			<div class="row horz-head">
    				<div class="col-md-1 col-xs-3">
    					<div class="icon-wrap"><i class="flaticon-business"></i></div>
    				</div>
    				<div class="col-md-5 col-xs-9">
    					<h2>Our Best Deals for you</h2>
    					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    				</div>
    			</div>
    			<div class="divider"></div>

    			<div class="row">
    				<?php
    				$sql = "SELECT * FROM door_deal_details ORDER BY id DESC LIMIT 6";
    				$result = $conn->query($sql);
    				if ($result->num_rows > 0) {
    					while($row = $result->fetch_assoc()) {
									$sql1 = "SELECT image FROM door_images WHERE p_id = ".$row['id']." AND type like 'cover_image'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row1 = $result1->fetch_assoc()) {
											$image = $row1['image'];
										}
									}
    						?>
    						<div class="col-md-3 wedo wedohover">
    							<div class="wedo1 block" style="background: url(admin/uploads/cover_image/<?php echo $image; ?>);background-size: 100% auto;">
    								<h3><?php echo $row["property_name"] ?></h3>
    								<h4><?php echo $row["transaction_type"] ?></h4>
<!--     								<p><?php echo $row["description"] ?></p> -->
    								<div class="wedo-details">
    									<ul>
    										<li><i class=""></i> 124 Listings</li>
    										<li><i class=""></i> <?php echo $row["actual_price"] ?> Value </li>
    										<li><i class=""></i> 57 Sold</li>
    										<li><a href="view_deal.php?id=<?php echo $row["id"] ?>">View More</a></li>
    									</ul>
    								</div>
    							</div>
    						</div>
    						<?php
    					}
    				}
    				?>

    			</div>	
    		</div>
              </div>


    		<!--for mobile-->
    		<div class="container whatwedo visible-xs" id="deals">
    			<div class="row horz-head">
    				<div class="col-md-1 col-xs-3">
    					<div class="icon-wrap"><i class="flaticon-business"></i></div>
    				</div>
    				<div class="col-md-5 col-xs-9">
    					<h2>Our Best Deals for you</h2>
    					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    				</div>
    			</div>
    			<div class="divider"></div>

    			<div class="row">
    				<div class="col-xs-12" data-wow-delay="0.2s">
    					<div class="carousel slide" data-ride="carousel" id="wedo-carousel">
    						<div class="carousel-inner">
    							<?php
    				$sql = "SELECT * FROM door_deal_details ORDER BY id DESC LIMIT 6";
    				$result = $conn->query($sql);
    				if ($result->num_rows > 0) {
    					while($row = $result->fetch_assoc()) {
									$sql1 = "SELECT image FROM door_images WHERE p_id = ".$row['id']." AND type like 'cover_image'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row1 = $result1->fetch_assoc()) {
											$image = $row1['image'];
										}
									}
    						?>
    									<!-- Quote 1 -->
    									<div class="item">
    										<div class="col-md-3 wedo wedohover">
    											<div class="wedo1" style="background: url(admin/uploads/cover_image/<?php echo $image; ?>);background-size: 100% auto;">
    												<h3>aaaResidential</h3>
    												<h4>real estate</h4>
    												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the</p>
    												<div class="wedo-details">
    													<ul>
    														<li><i class=""></i> 124 Listings</li>
    														<li><i class=""></i> 1.2Cr Value </li>
    														<li><i class=""></i> 57 Sold</li>
    													</ul>
    												</div>
    											</div>
    										</div>
    									</div>
    									<?php
    								}
    							}
    							?>



    							<!-- Quote 2 -->
    							<div class="item">
    								<div class="col-md-3 wedo wedohover">
    									<div class="wedo2">
    										<h3>Apartment</h3>
    										<h4>real estate</h4>
    										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the</p>
    										<div class="wedo-details">
    											<ul>
    												<li><i class=""></i> 124 Listings</li>
    												<li><i class=""></i> 1.2Cr Value </li>
    												<li><i class=""></i> 57 Sold</li>
    											</ul>
    										</div>
    									</div>
    								</div>
    							</div>
    							<!-- Quote 3 -->
    							<div class="item">
    								<div class="col-md-3 wedo wedohover">
    									<div class="wedo3">
    										<h3>Multifamily</h3>
    										<h4>real estate</h4>
    										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the</p>
    										<div class="wedo-details">
    											<ul>
    												<li><i class=""></i> 124 Listings</li>
    												<li><i class=""></i> 1.2Cr Value </li>
    												<li><i class=""></i> 57 Sold</li>
    											</ul>
    										</div>
    									</div>
    								</div>
    							</div>
    							<!-- Quote 4 -->
    							<div class="item">
    								<div class="col-md-3 wedo wedohover">
    									<div class="wedo4">
    										<h3>Land</h3>
    										<h4>real estate</h4>
    										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the</p>
    										<div class="wedo-details">
    											<ul>
    												<li><i class=""></i> 124 Listings</li>
    												<li><i class=""></i> 1.2Cr Value </li>
    												<li><i class=""></i> 57 Sold</li>
    											</ul>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>	
    		</div>
    	</div>

    	<div class="container latestprops" id="Projects">
    		<div class="row horz-head">
    			<div class="col-md-1 col-xs-3">
    				<div class="icon-wrap"><i class="flaticon-commerce"></i></div>
    			</div>
    			<div class="col-md-5 col-xs-9">
    				<h2>latest properties</h2>
    				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    			</div>
    		</div> 
    		<div class="divider"></div>

    		<div class="row">
    			<?php


    			$sql = "SELECT * FROM door_property_details ORDER BY id DESC LIMIT 6";
        //echo $sql;
    			$result = $conn->query($sql);

    			if ($result->num_rows > 0) {
                        // output data of each row
    				while($row = $result->fetch_assoc()) {
    					?>

    					<div class="col-md-4" onclick="javascript:location.href='view.php?id=<?php echo $row["id"] ?>'">
    						<div class="latest-each">
    							<div class="latest-img">

    								<?php
    								$sql1 = "SELECT image FROM door_images WHERE p_id = ".$row['id']." AND type like 'cover_image'";
        //echo $sql;

    								$result1 = $conn->query($sql1);

    								if ($result1->num_rows > 0) {
    									while($row1 = $result1->fetch_assoc()) {
    										?>
    										<img src="admin/uploads/cover_image/<?php echo $row1['image']; ?>" class="img-responsive desaturate">


    										<?php

    									}
    								}

    								?>
    							</div>
    							<div class="prop-location clearfix">
    								<div class="col-md-8 col-xs-8 overme titel"><i class="glyphicon glyphicon-map-marker"></i> <?php echo $row["location_of_the_property"] ?></div>
    								<div class="col-md-4 col-xs-4 price">Rs. <?php echo $row["actual_price"] ?> onwards</div>
    							</div>
    							<div class="prop-details">
    								<h4><?php echo $row["property_name"] ?></h4>
    								<div class="desc"><?php echo $row["description"] ?></div>
    							</div>
    							<div class="clearfix amenities">
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $row["property_size"] ?> Sq.Ft onwards</div>
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $row["transaction_type"] ?> onwards </div>
    								<!-- <div class="col-md-4 col-xs-4"><i class="glyphicon glyphicon-lamp"></i> <?php echo $row["number_of_bedrooms"] ?> Baths </div> -->
    							</div>
    						</div>
    					</div>

    					<?php
    				}
    			} else {
    				echo "0 results";
    			}
    			$conn->close();
    			?>

    		</div> 
    	</div>  

<!--
<div class="container-fluid talking-about">
    <div class="container">
	    <div class="row horz-head">
		  <div class="col-md-1 col-xs-3">
			<div class="icon-wrap"><i class="flaticon-right-quote-sign"></i></div>
		  </div>
		  <div class="col-md-5 col-xs-9">
			<h2>People Talking about us</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		  </div>
        </div>  
		<div class="divider"></div>
		<div class="carousel-reviews">
        <div class="row">
            <div id="carousel-people" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner"> 
					<div class="col-md-4 col-sm-6">
        				    <div class="row">
						        <div class="col-md-4"><img src="images/person1.jpg" class="img-circle"></div>
								<div class="col-md-8">
								<p>I do acknowledge that the novel concept, dedication and hardwork of doors.com team is beginning to bear fruit.
                                I have been personally satisfied with the quality of response received so far.I wish the doors team good luck and more success in the future for its sincerity and dedication.</p>
								<h4>Kim</h4>
								</div>
					        </div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="row">
						        <div class="col-md-4"><img src="images/person2.jpg" class="img-circle"></div>
								<div class="col-md-8">
								<p>The bottom line for us, is the time saving. I would urge anyone & everyone who’s looking to build their dream home to reach out to these brilliant advisors & give it a try. I almost enjoyed it.</p>
								<h4>Sid</h4>
								</div>
					        </div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="row">
						        <div class="col-md-4"><img src="images/person1.jpg" class="img-circle"></div>
								<div class="col-md-8">
								<p>I was extremely impressed with the ease of the representatives helping us find our new home.Kudos to the team!</p>
								<h4>Akshara</h4>
								</div>
					        </div>
						</div>					
                </div>
            </div>
        </div>
	  </div>
    </div>
  </div>
-->

<div class="container-fluid" id="Contact">
	<div class="container newsletter">
		<div class="row">
			<div class="col-md-12 mrgb30 clearfix">
				<i class="glyphicon glyphicon-envelope"></i>
			</div>
			<div class="newsletter-form">
				<form action="" method="post" name="contact" id="contact" onsubmit="return validate_contact(this)">
					<input type="text" name="phone" id="phone" required placeholder="Please Enter Your Mobile number">
					<p>Receive Call Back from authorized DOORS executive. Enter your Mobile number and hit Enter!</p>
					<p id="contactResponse"></p>
					<input type="submit" class="shoot" value="Enter" name="Shoot"/>
				</form>
				<script>
				function validate_contact() {
					var phone = document.getElementById("phone").value;
					if(phone != '' && !isNaN(phone)) {
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
							if (xhttp.readyState == 4 && xhttp.status == 200) {
								if(xhttp.responseText == '200') {
									document.getElementById("contactResponse").innerHTML = "Thank you..!, Our executive will get back you soon...";
								} else {
									document.getElementById("contactResponse").innerHTML = "Sorry..!, Your request could not be process now.";
								}
							}
						};
						xhttp.open("GET", "ajax_contact.php?phone="+phone, true);
						xhttp.send();
					}
					else {
						alert('Please enter your mobile number.');
					}

					return false;
				}
				</script> 
			</div>
		</div>
	</div>  
</div>
</div>

<div class="container-fluid footer-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Projects</a></li>
				</ul>
			</div>
			<div class="col-md-1 text-right"><img src="images/footer-logo.png" alt="logo"></div>
		</div>  
	</div>
</div>

<div class="container-fluid foot-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-xs-12"><p>Copyright 2016 | All Rights Reserved by doorsind</p></div>
			<div class="col-md-2 col-xs-12 foot-social">
				<ul>
					<li><a href="#"><img src="images/twitter.png" alt="twitter"></a></li>
					<li><a href="#"><img src="images/gplus.png" alt="google plus"></a></li> 
					<li><a href="#"><img src="images/fb.png" alt="facebook"></a></li>
				</ul>
			</div>
		</div>  
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/custom.js"></script>

<script>$('.carousel').carousel();</script>
<script>
$('.select').on('click','.placeholder',function(){
	var parent = $(this).closest('.select');
	if ( ! parent.hasClass('is-open')){
		parent.addClass('is-open');
		$('.select.is-open').not(parent).removeClass('is-open');
	}else{
		parent.removeClass('is-open');
	}
}).on('click','ul>li',function(){
	var parent = $(this).closest('.select');
	parent.removeClass('is-open').find('.placeholder').text( $(this).text() );
	parent.find('input[type=hidden]').attr('value', $(this).attr('data-value') );
});
</script>
<script>
$('.block').hover(function(){
	$(this).addClass('hovered');
}, function(){
	$(this).removeClass('hovered');
});
</script>

</body>
</html>