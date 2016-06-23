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
  <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css"/>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
      .images-view img{
        width: 100%;
        }.list-view li:last-child{
          display: none;
        }
        </style>
      </head>
      <body id="page-top" class="index">

        <div class="container-fluid head-top hidden-xs">
          <div class="container">
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
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img src="images/logo.png"></a>
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
        </nav>
      </div>
    </div>
    <?php

    include "db-config.php"; 
    $sql = "SELECT * FROM door_property_details WHERE id = '".$_GET['id']."'";
        //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
                                        // output data of each row
      while($row = $result->fetch_assoc()) {

        $overview= $row['overview'];
        $description= $row['description'];
        $property_name= $row['property_name'];
        $about_agents= $row['about_agents'];
        $transaction_type= $row['transaction_type'];
        $property_type= $row['property_type'];
        $actual_price= $row['actual_price'];
        $number_of_bedrooms= $row['number_of_bedrooms'];
        $number_of_bathroom= $row['number_of_bathroom'];
        $property_size= $row['property_size'];
        $amenities= $row['amenities'];
        $city= $row['city'];
        $location_of_the_property= $row['location_of_the_property'];
        $google_location= $row['google_location'];
        $video= $row['video'];
        $date_of_creat= $row['date_of_creat'];


      }
    } else {
      echo "0 results";
    }
                                    //$conn->close();
    ?>
    <div class="container-fluid propdetail-slider">
     <div class="row">
      <div class="detail-overlay">
        <div class="container">
          <div class="row">
           <!--<div class="col-md-12"><img src="images/<?php echo $property_type;?>.png"></div>-->
         </div>
         <div class="row">
          <div class="col-md-12">
            <div class="detail-left">
             <h2><?php echo $property_name; ?></h2>
             <p><?php echo $location_of_the_property; ?></p>
           </div>
           <div class="detail-right">
            <ul>
              <li class="text-right">
               <h3>price</h3>
               <p>Rs. <?php echo $actual_price; ?></p>
               <div class="onwards">Onwards</div>
             </li>
             <li class="text-right">
               <h3>bedroom</h3>
               <p><?php echo $transaction_type; ?> </p>
               <div class="onwards">Onwards</div>
             </li>
          <!--<li class="text-right">
          	<h3>baths</h3>
          	<p><?php echo $number_of_bathroom; ?> Baths</p>
                <div class="onwards">Onwards</div>
              </li>-->
              <li class="text-right">
               <h3>property size</h3>
               <p><?php echo $property_size; ?> Sq.Ft</p>
               <div class="onwards">Onwards</div>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div id="carousel-home" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">

    <?php
    $sql = "SELECT image FROM door_images WHERE p_id = ".$_GET['id']." AND type like 'cover_image'";
        //echo $sql;
    $i=0;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
       ?>
       <div class="item <?php if($i==0){echo 'active';} ?>" style="background: url(admin/uploads/cover_image/<?php echo $row['image']; ?>)no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;"></div>
        
        <?php
        $i++;
      }
    }
    ?>
    <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
      <span aria-hidden="true"><img src="images/left-arrow.png"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
      <span aria-hidden="true"><img src="images/right-arrow.png"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>


<div class="container property_full">   
  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#overview" id="overview-tab" role="tab" data-toggle="tab" aria-controls="home" 
        aria-expanded="true">
        <span class="text"><i class="glyphicon glyphicon-eye-open"></i> Overview</span>
      </a>
    </li>
    <li role="presentation" class="next">
      <a href="#location" role="tab" id="location-tab" data-toggle="tab" aria-controls="location">
        <span class="text"><i class="glyphicon glyphicon-map-marker"></i> Location Map</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#layout" role="tab" id="layout-tab" data-toggle="tab" aria-controls="layout">
        <span class="text"><i class="flaticon-layout-with-one-column-and-two-rows"></i> Layout</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#floor" role="tab" id="floor-tab" data-toggle="tab" aria-controls="floor">
        <span class="text"><i class="flaticon-plan"></i> Floor Plan</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#amenities" role="tab" id="amenities-tab" data-toggle="tab" aria-controls="amenities">
        <span class="text"><i class="flaticon-sleeping-bed-silhouette"></i> Features</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#video" role="tab" id="amenities-tab" data-toggle="tab" aria-controls="video">
        <span class="text"><i class="flaticon-retina"></i> Video</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#brochure" role="tab" id="amenities-tab" data-toggle="tab" aria-controls="brochure">
        <span class="text"><i class="flaticon-download-arrow-with-line"></i> E-Brochure</span>
      </a>
    </li>
  </ul>

  <div id="myTabContent" class="tab-content">
   <!--overview-->
   <div role="tabpanel" class="tab-pane fade in active" id="overview" aria-labelledby="overview-tab">
    <div class="row horz-head">
     <div class="col-md-1 col-xs-3">
      <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
    </div>
    <div class="col-md-5 col-xs-9">
      <h2>overview</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
  </div>

  <?php echo $overview; ?>



</div>
<!--overview-->

<!--location-->
<div role="tabpanel" class="tab-pane fade" id="location" aria-labelledby="location-tab">
  <div class="row horz-head">
   <div class="col-md-1 col-xs-3">
    <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
  </div>
  <div class="col-md-5 col-xs-9">
    <h2>Location</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
</div>
<div>
  <?php echo $google_location;?>
</div>
</div>
<!--location-->

<!--layout-->
<div role="tabpanel" class="tab-pane fade" id="layout" aria-labelledby="layout-tab">
  <div class="row horz-head">
   <div class="col-md-1 col-xs-3">
    <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
  </div>
  <div class="col-md-5 col-xs-9">
    <h2>Layout</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
</div>

<!--popup gallery starts-->
<div id="main">
  <div class="row">
   <ul class="gallery clearfix">
    <?php
    $sql = "SELECT image FROM door_images WHERE p_id = ".$_GET['id']." AND type like 'layout_plan'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
       ?>
       <li class="col-md-3">
        <div class="gal-each"><a href="admin/uploads/layout_plan/<?php echo $row['image']; ?>" rel="prettyPhoto[gallery2]" title="">
          <img src="admin/uploads/layout_plan/<?php echo $row['image']; ?>" alt="" class="img-responsive"/></a></div>
        </li>
        <?php
      }
    }
    ?>
  </ul>
</div>
</div>



</div>
<!--layout-->

<!--floor-->
<div role="tabpanel" class="tab-pane fade" id="floor" aria-labelledby="floor-tab">
  <div class="row horz-head">
   <div class="col-md-1 col-xs-3">
    <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
  </div>
  <div class="col-md-5 col-xs-9">
    <h2>Floor Plan</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
</div>
<div class="images-view">
  <?php
  $sql = "SELECT image FROM door_images WHERE p_id = ".$_GET['id']." AND type like 'floor_plan'";
        //echo $sql;

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     ?>
     <img src="admin/uploads/floor_plan/<?php echo $row['image']; ?>" class="img-responsive">

     <?php

   }
 }

 ?>

</div>
</div>
<!--floor-->

<!--amenities-->
<div role="tabpanel" class="tab-pane fade" id="amenities" aria-labelledby="amenities-tab">
  <div class="row horz-head">
   <div class="col-md-1 col-xs-3">
    <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
  </div>
  <div class="col-md-5 col-xs-9">
    <h2>amenities</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
</div>
<div class="amenity clearfix">
 <div class="amenity-each">


  <ul>
    <li><h4>Rooms &amp; Area </h4></li>
    <li <?php if (strpos($amenities, 'Bathrooms')){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Bathrooms.png"></div>
     <div class="amen">Bathrooms <?php echo implode(', ', explode('^', $number_of_bathroom)); ?></div>
   </li>
   <li <?php if (strpos($amenities, 'Servant Room') == false){ ?> class="un" <?php } ?> >
    <div class="amenityimg"><img src="images/Amenities/Servant Room.png"></div>
    <div class="amen">Servant Room</div>
  </li>
  <li <?php if (strpos($amenities, 'Pooja Room') == false){ ?> class="un" <?php } ?> >
   <div class="amenityimg"><img src="images/Amenities/Pooja Room.png"></div>
   <div class="amen">Pooja Room</div>
 </li>
 <li <?php if (strpos($amenities, 'Balcony') == false){ ?> class="un" <?php } ?> >
   <div class="amenityimg"><img src="images/Amenities/Balcony.png"></div>
   <div class="amen">Balcony</div>
 </li>
 <li <?php if (strpos($amenities, 'Kitchen') == false){ ?> class="un" <?php } ?> >
   <div class="amenityimg"><img src="images/Amenities/Kitchen.png"></div>
   <div class="amen">Kitchen</div>
 </li>
</ul>
</div>

<div class="amenity-each">
  <ul>
    <li><h4>Procession Time</h4></li>
    <li <?php if (strpos($amenities, 'Ready to Move') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Ready to Move.png"></div>
     <div class="amen">Ready to Move</div>
   </li>
   <li <?php if (strpos($amenities, 'Under Construction') == false){ ?> class="un" <?php } ?> > 
     <div class="amenityimg"><img src="images/Amenities/Under Construction.png"></div>
     <div class="amen">Under Construction</div>
   </li>
   <li class=""><h4>Basics</h4></li>
   <li  <?php if (strpos($amenities, 'Furnished') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Furnished.png"></div>
     <div class="amen">Furnished</div>
   </li>
   <li  <?php if (strpos($amenities, 'Semi-Furnished') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Semi-Furnished.png"></div>
     <div class="amen">Semi-Furnished</div>
   </li>
 </ul>
</div>

<div class="amenity-each">
  <ul>
    <li><h4>Amenities</h4></li>
    <li  <?php if (strpos($amenities, 'Air Conditioner') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Air Conditioner.png"></div>
     <div class="amen">Air Conditioner</div>
   </li>
   <li  <?php if (strpos($amenities, 'Air Filter') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Air Filter.png"></div>
     <div class="amen">Air Filter</div>
   </li>
   <li  <?php if (strpos($amenities, 'Geyser') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Geyser.png"></div>
     <div class="amen">Geyser</div>
   </li>
   <li  <?php if (strpos($amenities, 'Lift') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/lift.png"></div>
     <div class="amen">Lift</div>
   </li>
   <li  <?php if (strpos($amenities, 'Pool') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Pool.png"></div>
     <div class="amen">Pool</div>
   </li>
   <li  <?php if (strpos($amenities, 'Garden') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Garden.png"></div>
     <div class="amen">Garden</div>
   </li>
 </ul>
</div>

<div class="amenity-each">
  <ul>
    <li>&nbsp;</li>
    <li  <?php if (strpos($amenities, 'Internet/wi-fi connectivity') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Wi-fi.png"></div>
     <div class="amen">Wi-fi</div>
   </li>
   <li  <?php if (strpos($amenities, 'Fitness Center / GYM') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Gym.png"></div>
     <div class="amen">Fitness Center / GYM</div>
   </li>
   <li  <?php if (strpos($amenities, 'Restaurant') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Restaurant.png"></div>
     <div class="amen">Restaurant</div>
   </li>
   <li <?php if (strpos($amenities, 'TV Set') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/TV Set.png"></div>
     <div class="amen">TV Set</div>
   </li>
   <li  <?php if (strpos($amenities, 'Parking') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Parking.png"></div>
     <div class="amen">Parking</div>
   </li>
   <li  <?php if (strpos($amenities, 'Playground') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Playground.png"></div>
     <div class="amen">Playground</div>
   </li>
 </ul>
</div>

<div class="amenity-each">
  <ul>
    <li><h4>Restrictions</h4></li>
    <li  <?php if (strpos($amenities, 'Family Only') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Family Only.png"></div>
     <div class="amen">Family Only</div>
   </li>
   <li  <?php if (strpos($amenities, 'Vegetarian Only') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Vegetarian Only.png"></div>
     <div class="amen">Vegetarian Only</div>
   </li>
   <li  <?php if (strpos($amenities, 'Bachelors Only') == false){ ?> class="un" <?php } ?> >
     <div class="amenityimg"><img src="images/Amenities/Bacheloirs.png"></div>
     <div class="amen">Bachelors</div>
   </li>
 </ul>
</div>
</div>		  
</div>
<!--amenities-->
<!--location-->
<div role="tabpanel" class="tab-pane fade" id="video" aria-labelledby="location-tab">
  <div class="row horz-head">
   <div class="col-md-1 col-xs-3">
    <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
  </div>
  <div class="col-md-5 col-xs-9">
    <h2>video</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
</div>
<div>
            <?php //echo $video;

            $ytarray=explode("/", $video);
            $ytendstring=end($ytarray);
            $ytendarray=explode("?v=", $ytendstring);
            $ytendstring=end($ytendarray);
            $ytendarray=explode("&", $ytendstring);
            $ytcode=$ytendarray[0];
            echo "<iframe width=\"800\" height=\"600\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe>";
            ?>
          </div>
        </div>
        <!--video-->   <!--location-->
        <div role="tabpanel" class="tab-pane fade" id="brochure" aria-labelledby="location-tab">
          <div class="row horz-head">
           <div class="col-md-1 col-xs-3">
            <div class="icon-wrap"><i class="glyphicon glyphicon-tag"></i></div>
          </div>
          <div class="col-md-5 col-xs-9">
            <h2>brochure</h2>
          </div>
        </div>
        <div>
          <?php
          $sql = "SELECT image FROM door_images WHERE p_id = ".$_GET['id']." AND type like 'brochure'";
        //echo $sql;

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             ?>
             <embed src="admin/uploads/brochure/<?php echo $row['image']; ?>" width="100%" height="2100px">

              <?php

            }
          }

          ?>
        </div>
      </div>
      <!--video-->
    </div>
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

   $sql1 = "SELECT * FROM door_property_details WHERE transaction_type like '%".$transaction_type."' and location_of_the_property like '%".$location_of_the_property."%' and city like '%".$city."' and property_type like '%".$property_type."' ORDER BY id DESC LIMIT 3";
        //echo $sql1;
   $result1 = $conn->query($sql1);

   if ($result1->num_rows > 0) {
                                        // output data of each row
    while($row = $result1->fetch_assoc()) {
      ?>
      <div class="col-md-4" onclick="javascript:location.href='view.php?id=<?php echo $row["id"] ?>'">
       <div class="latest-each">
         <div class="latest-img">

          <?php
          $sql = "SELECT image FROM door_images WHERE p_id = ".$row['id']." AND type like 'cover_image'";
          
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row1 = $result->fetch_assoc()) {
             ?>
             <img src="admin/uploads/cover_image/<?php echo $row1['image']; ?>" class="img-responsive">
             <?php

           }
         }

         ?>
       </div>
       <div class="prop-location clearfix">
         <div class="col-md-8 col-xs-8 overme titel"><i class="glyphicon glyphicon-map-marker"></i> <?php echo $row["location_of_the_property"] ?></div>
         <div class="col-md-4 col-xs-4 price">Rs <?php echo $row["actual_price"] ?> onwards</div>
       </div>
       <div class="prop-details">
         <h4><?php echo $row["property_name"] ?></h4>
         <div class="desc"><?php echo $row["description"] ?></div>
       </div>
       <div class="clearfix amenities">
        <div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $row["property_size"] ?> Sq.Ft onwards</div>
        <div class="col-md-6 col-xs-6"><i class="glyphicon glyphicon-lamp"></i> <?php echo $row["transaction_type"] ?> onwards</div>
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



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>

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

<script type="text/javascript">
$(document).ready(function(){
  $("area[rel^='prettyPhoto']").prettyPhoto();

  $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',theme:'light_square',slideshow:10000,
    autoplay_slideshow: false});
  $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',slideshow:10000, hideflash: true});


});
</script>

</body>
</html>
