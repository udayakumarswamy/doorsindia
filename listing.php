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

    	<div class="container-fluid head-top">
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

    	<div class="container pagemenu">
    		<div class="row">
    			<nav class="navbar navbar-custom" role="navigation">
    				<div class="container">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
    							<i class="fa fa-bars"></i>
    						</button>
    						<a class="navbar-brand page-scroll" href="index.php"><img src="images/logo.png"></a>
    					</div>

    					<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    						<ul class="nav navbar-nav navbar-right">
    							<li class="page-scroll active">
    								<a href="index.php">Home</a>
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
    	</div>

    	<div class="container-fluid bar">
    		<div class="container listingbar">   
    			<!--newform-->
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
    						<input type="hidden" name="city"/>
    					</div>
    				</div>
    				<div class="col-md-4">
    					<input type="text" name="area" class="search-query" placeholder="Search by ">
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
    						<input type="hidden" name="variant"/>
    					</div>
    				</div>
    				<div class="col-md-2 text-left">
    					<button type="submit" class="btn btn-success">Filter</button>
    				</div>		
    			</form>
    		</div>
    	</div>

    	<!--properties-->
    	<div class="container">
    		<div class="row horz-head">
    			<div class="col-md-1 col-xs-3">
    				<div class="icon-wrap"><i class="glyphicon flaticon-business"></i></div>
    			</div>
    			<div class="col-md-5 col-xs-9">
    				<h2>Properties</h2>
    				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    			</div>
    		</div>  

    		<div class="divider"></div>
    		<div class="row">

    			<?php
    			$condition = [];
    			if(isset($_GET['variant']) && !empty($_GET['variant'])) {
    				$condition[] = "transaction_type like '%".$_GET['variant']."%'";
    			}
    			if (isset($_GET['area']) && !empty($_GET['area'])) {
    				$condition[] = "location_of_the_property like '%".$_GET['area']."%'";
    			}
    			if (isset($_GET['city']) && !empty($_GET['city'])) {
    				$condition[] = "city like '%".$_GET['city']."%'";
    			}
    			if (isset($_GET['property_type']) && !empty($_GET['property_type'])) {
    				$condition[] = "property_type like '%".$_GET['property_type']."%'";
    			}
    			$where = implode(' AND ', $condition);

    			$sql = "SELECT * FROM door_property_details ". ( $where != '' ? ' WHERE '.$where : '' );
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
    								<div class="col-md-7 col-xs-6 overme titel"><i class="glyphicon glyphicon-map-marker"></i> <?php echo $row["location_of_the_property"] ?></div>
    								<div class="col-md-5 col-xs-6 price">Rs <?php echo $row["actual_price"] ?> <div class="onwards">onwards</div></div>
    							</div>
    							<div class="prop-details">
    								<h4><?php echo $row["property_name"] ?></h4>
    								<div class="desc"><?php echo $row["description"] ?></div>
    							</div>
    							<div class="clearfix amenities">
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $row["property_size"] ?> Sq.Ft 
    									<span class="onwards black">onwards</span>
    								</div>
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $row["transaction_type"] ?> 
    									<span class="onwards black">onwards</span>
    								</div>

    								<!--<div class="col-md-4 col-xs-4"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $row["number_of_bathroom"] ?> Bedrooms </div>-->
    								<!--<div class="col-md-4 col-xs-4"><i class="glyphicon glyphicon-lamp"></i> <?php echo $row["number_of_bedrooms"] ?> Baths </div>-->
    							</div>
    						</div>
    					</div>

    					<?php
    				}
    			} else {
    				echo "0 results";
    			}
    			// $conn->close();
    			?>


    		</div> 
    	</div>  



    	<div class="container-fluid similar-props">
    		<div class="container">
    			<div class="row horz-head">
    				<div class="col-md-1 col-xs-3">
    					<div class="icon-wrap"><i class="flaticon-right-quote-sign"></i></div>
    				</div>
    				<div class="col-md-5 col-xs-9">
    					<h2>Similar Properties</h2>
    					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    				</div>
    			</div>  

    			<div class="divider"></div>
    			<div class="row">
    				<?php
    			$sql = "SELECT * FROM door_property_details WHERE status =1 LIMIT 3";
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
    								<div class="col-md-7 col-xs-6 overme titel"><i class="glyphicon glyphicon-map-marker"></i> <?php echo $row["location_of_the_property"] ?></div>
    								<div class="col-md-5 col-xs-6 price">Rs <?php echo $row["actual_price"] ?> <div class="onwards">onwards</div></div>
    							</div>
    							<div class="prop-details">
    								<h4><?php echo $row["property_name"] ?></h4>
    								<div class="desc"><?php echo $row["description"] ?></div>
    							</div>
    							<div class="clearfix amenities">
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $row["property_size"] ?> Sq.Ft 
    									<span class="onwards black">onwards</span>
    								</div>
    								<div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $row["transaction_type"] ?> 
    									<span class="onwards black">onwards</span>
    								</div>

    								<!--<div class="col-md-4 col-xs-4"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $row["number_of_bathroom"] ?> Bedrooms </div>-->
    								<!--<div class="col-md-4 col-xs-4"><i class="glyphicon glyphicon-lamp"></i> <?php echo $row["number_of_bedrooms"] ?> Baths </div>-->
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
    </div>  

    <div class="container-fluid">
    	<div class="container newsletter">
    		<div class="row">
    			<div class="col-md-12 mrgb30 clearfix">
    				<i class="glyphicon glyphicon-envelope"></i>
    			</div>
    			<div class="newsletter-form">
    				<form>
    					<input type="text" name="phone" id="phone" placeholder="Please Enter Your Mobile number">
    					<p>Receive Call Back from authorized DOORS executive. Enter your Mobile number and hit Shoot!</p>
    					<input type="submit" class="shoot" value="Shoot"/>
    				</form> 
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



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script>
  (function($) {

  	'use strict';

  	$(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
  		var $target = $(e.target);
  		var $tabs = $target.closest('.nav-tabs-responsive');
  		var $current = $target.closest('li');
  		var $parent = $current.closest('li.dropdown');
  		$current = $parent.length > 0 ? $parent : $current;
  		var $next = $current.next();
  		var $prev = $current.prev();
  		var updateDropdownMenu = function($el, position){
  			$el
  			.find('.dropdown-menu')
  			.removeClass('pull-xs-left pull-xs-center pull-xs-right')
  			.addClass( 'pull-xs-' + position );
  		};

  		$tabs.find('>li').removeClass('next prev');
  		$prev.addClass('prev');
  		$next.addClass('next');

  		updateDropdownMenu( $prev, 'left' );
  		updateDropdownMenu( $current, 'center' );
  		updateDropdownMenu( $next, 'right' );
  	});
  })(jQuery);
  </script>
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

</body>
</html>