<?php
@ob_start();
session_start();
if(!isset($_SESSION['admin'])){
header("Location:./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Doors India :: Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      	<script src="ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
      <style>
      .dltresult {
    position: fixed;
    top: 72px;
    background: #1F859C;
    padding: 10px 20px;
    right: 30px;
    color: #fff;
}
      </style>
  </head>
  <body>

  <div class="container-fluid admin-header">
  <div class="container">
    <div class="row">
        <div class="col-md-10 admin-logo">
		  <img src="images/logo.png">
		</div>
		<div class="col-md-2 signout">
		  <a href="logincheck.php?c=logout">Signout &nbsp;<i class="glyphicon glyphicon-off"></i></a>
		</div>
	</div>
  </div>
  </div>
  
  <div class="container-fluid admin-menu">
  <div class="container">
    <div class="row">
	  <nav class="navbar">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./">Dashboard</a></li>
        <li><a href="#">Add Property</a></li>
      </ul>
    </div>
	</nav>
	</div>
	</div>
  </div>
     <?php
                            include "../db-config.php";        
$id=$_GET['id'];
                                    $sql = "SELECT * FROM door_property_details WHERE id=".$id;
                                    $result = $conn->query($sql);
//echo $sql;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                $name=$row['name'];
                                                $property_name=$row['property_name'];
                                                $overview=$row['overview'];
                                                $description=$row['description'];
                                                $email=$row['email'];
                                                $person_name=$row['person_name'];
                                                $about_agents=$row['about_agents'];
                                                $mobile=$row['mobile'];
                                                $geocomplete=$row['location_of_the_property'];
                                                $amenities=$row['amenities'];
                                                $property_type=$row['property_type'];
                                                $transaction_type=$row['transaction_type'];
                                                $actual_price=$row['actual_price'];
                                                $city=$row['city'];
                                                $property_size=$row['property_size'];
                                                $google_location=$row['google_location'];
                                                $video=$row['video'];
                                                $number_of_bedrooms=$row['number_of_bedrooms'];
                                                $number_of_bathroom=$row['number_of_bathroom'];
                                                }
                                            }
                                            ?>
  <div class="container forms">
  <div class="row">
	 <h2 class="col-md-12"><i class="glyphicon glyphicon-plus"></i> Add Property</h2>  	 
	</div>
  <div class="row">
  <div class="col-md-7">
  <form role="form" id="addprop" action="update.php" method="post" enctype="multipart/form-data">
      <div class="form-group" style="display:none;">
      <label for="imie" class="col-md-3 no-pad">Name:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="name"  id="name" placeholder="Name of the Contact Person">
      </div>
    </div>
      <div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property Name:</label>
      <div class="col-md-9">
          <?php echo "ID:".$_GET['id']; ?>
          <input type="text" class="form-control" name="p_id" style="" readonly value="<?php echo $_GET['id']; ?>" id="p_id" placeholder="ID">
        <input type="text" class="form-control" name="property_name" value="<?php echo $property_name ?>" id="property_name" placeholder="Name of the Property">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property Overview:</label>
      <div class="col-md-9">
        <textarea class="form-control" name="overview" id="overview" placeholder="Detailed Overview of the Property"><?php echo $overview ?> </textarea>
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property description:</label>
      <div class="col-md-9">
        <textarea class="form-control" name="description" id="description" placeholder="Property Description"><?php echo $description ?></textarea>
				
      </div>
    </div>
      <div class="form-group">
      <label for="miejscowosc" class="col-md-3 no-pad">Property Type:</label>
      <div class="col-md-9">
         <select name="property_type" id="property_type" class="form-control">
          <option <?php if($property_type=="Apartment"){ echo "selected";} ?> >Apartment</option>
          <option <?php if($property_type=="Villa"){ echo "selected";} ?> >Villa</option>
          <option <?php if($property_type=="Studio Apartment"){ echo "selected";} ?> >Studio Apartment</option>
          <option <?php if($property_type=="Penthouse"){ echo "selected";} ?> >Penthouse</option>
          <option <?php if($property_type=="Builder Floor"){ echo "selected";} ?> >Builder Floor</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="miejscowosc" class="col-md-3 no-pad">Transaction Type:</label>
      <div class="col-md-9">
        <select name="transaction_type" id="transaction_type">
          <option <?php if($transaction_type=="1 BHK"){ echo "selected";} ?>>1 BHK</option>
          <option <?php if($transaction_type=="2 BHK"){ echo "selected";} ?>>2 BHK</option>
          <option <?php if($transaction_type=="3 BHK"){ echo "selected";} ?>>3 BHK</option>
          <option <?php if($transaction_type=="4 BHK"){ echo "selected";} ?>>4 BHK</option>
          <option <?php if($transaction_type=="5 BHK"){ echo "selected";} ?>>5 BHK</option>
        </select>
      </div>
    </div>
   <div class="form-group">
      <label for="email" class="col-md-3 no-pad">Price:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="actual_price" value="<?php echo $actual_price; ?>"  id="actual_price" placeholder="Price of Property">
      </div>
    </div>
      
    <div class="form-group">
      <label for="haslo" class="col-md-3 no-pad">Property Size:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="property_size" value="<?php echo $property_size; ?>" id="property_size" placeholder="Area in Sq.Ft, pleas enter only numbers">
      </div>
    </div>
      <div class="form-group">
      <label for="nazwisko" class="col-md-3 no-pad">Address:</label>
      <div class="col-md-9">
      <input id="geocomplete" name="geocomplete" class="form-control" type="text"  value="<?php echo $geocomplete ?>"  placeholder="Type in an address" value="" />
<input id="find" type="button" value="find" />
     
      <fieldset>
        <label>Latitude</label><br>
        <input name="lat" type="text" value="" style="display:none;">
        <input name="lat_res" id="lat_res" type="text" value="" readonly>
      <br>
        <label>Longitude</label><br>
        <input name="lng" type="text" value=""  style="display:none;">
        <input name="lng_res" id="lng_res" type="text" value="" readonly>
      <br>
        <input name="formatted_address" type="text" value="" style="display:none;">
      </fieldset>
      
      <a id="reset" href="#" style="display:none;">Reset Marker</a>
         <div class="map_canvas"></div>
    
      </div>
    </div>
      
          <textarea class="form-control" name="google_location" id="google_location" readonly placeholder="Google Location Map embed Link" style="display:none;"><?php echo $google_location; ?></textarea>
     
     
 <div class="form-group">
      <label for="video" class="col-md-3 no-pad">Video:</label>
      <div class="col-md-9">
          <textarea class="form-control" name="video"  id="video"  placeholder="Youtube or Vimeo Video embed Link"><?php echo $video; ?></textarea>
      </div>
    </div> 
     	
    <div class="form-group">
      <label for="plec" class="col-md-3 no-pad">Bedrooms:</label>
      <div class="col-md-9">
          <select id="number_of_bedrooms" name="number_of_bedrooms[]" multiple="multiple">
             
                    <option <?php if (strpos($number_of_bedrooms, '1') !== false){ echo "selected";} ?> >1</option>
                    <option <?php if (strpos($number_of_bedrooms, '2') !== false){ echo "selected";} ?> >2</option>
                    <option <?php if (strpos($number_of_bedrooms, '3') !== false){ echo "selected";} ?> >3</option>
                    <option <?php if (strpos($number_of_bedrooms, '4') !== false){ echo "selected";} ?> >4</option>
					<option <?php if (strpos($number_of_bedrooms, '5') !== false){ echo "selected";} ?> >5</option>
                    <option <?php if (strpos($number_of_bedrooms, '6') !== false){ echo "selected";} ?> >6</option>
                    <option <?php if (strpos($number_of_bedrooms, '7') !== false){ echo "selected";} ?> >7</option>
                    <option <?php if (strpos($number_of_bedrooms, '8') !== false){ echo "selected";} ?> >8</option>
                    <option <?php if (strpos($number_of_bedrooms, '9') !== false){ echo "selected";} ?> >9</option>
            </select>
       
      </div>
    </div>
	
	 <div class="form-group">
      <label for="plec" class="col-md-3 no-pad">Bathrooms:</label>
      <div class="col-md-9">
          <select id="number_of_bathroom" name="number_of_bathroom[]" multiple="multiple">
                
                   <option <?php if (strpos($number_of_bathroom, '1') !== false){ echo "selected";} ?> >1</option>
                    <option <?php if (strpos($number_of_bathroom, '2') !== false){ echo "selected";} ?> >2</option>
                    <option <?php if (strpos($number_of_bathroom, '3') !== false){ echo "selected";} ?> >3</option>
                    <option <?php if (strpos($number_of_bathroom, '4') !== false){ echo "selected";} ?> >4</option>
					<option <?php if (strpos($number_of_bathroom, '5') !== false){ echo "selected";} ?> >5</option>
                    <option <?php if (strpos($number_of_bathroom, '6') !== false){ echo "selected";} ?> >6</option>
                    <option <?php if (strpos($number_of_bathroom, '7') !== false){ echo "selected";} ?> >7</option>
                    <option <?php if (strpos($number_of_bathroom, '8') !== false){ echo "selected";} ?> >8</option>
                    <option <?php if (strpos($number_of_bathroom, '9') !== false){ echo "selected";} ?> >9</option>
            </select>
       
      </div>
    </div>
      <div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Property Images:</label>
      <div class="col-md-9">
                  <?php
          $sql = "SELECT * FROM door_images WHERE p_id=$id AND type = 'cover_image'";
                                    $result = $conn->query($sql);
//echo $sql;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                ?>
          <a href="javascript:;"  class="img-delete" id="<?php echo $row['id']; ?>" filepath="<?php echo $row['image']; ?>" ><img src="uploads/cover_image/<?php echo $row['image']; ?>" style="width:100px;"></a>
          <?php
                                                
                                                }
                                            }
                                            ?>
        <input type="file" name="cover_image[]" id="cover_image" multiple  accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
<!--	   <div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Bedroom Images:</label>
      <div class="col-md-9">
        <input type="file" name="bedrooms_image[]" id="bedrooms_image" multiple  accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
	
    <div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Bathroom Images:</label>
      <div class="col-md-9">
        <input type="file" name="bathroom_image[]" id="bathroom_image" multiple  accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>-->
	<div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">layout Images:</label>
      <div class="col-md-9">
           <?php
          $sql = "SELECT * FROM door_images WHERE p_id=$id AND type = 'layout_plan'";
                                    $result = $conn->query($sql);
//echo $sql;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                ?>
          <a href="javascript:;"  class="img-delete" id="<?php echo $row['id']; ?>" filepath="<?php echo $row['image']; ?>" ><img src="uploads/layout_plan/<?php echo $row['image']; ?>" style="width:100px;"></a>
          <?php
                                                
                                                }
                                            }
                                            ?>
        <input type="file" name="layout_plan[]" id="layout_plan" multiple  accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
	
	<div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Floor Plan Images:</label>
      <div class="col-md-9">
           <?php
          $sql = "SELECT * FROM door_images WHERE p_id=$id AND type = 'floor_plan'";
                                    $result = $conn->query($sql);
//echo $sql;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                ?>
          <a href="javascript:;"  class="img-delete" id="<?php echo $row['id']; ?>" filepath="<?php echo $row['image']; ?>" ><img src="uploads/floor_plan/<?php echo $row['image']; ?>" style="width:100px;"></a>
          <?php
                                                
                                                }
                                            }
                                            ?>
        <input type="file" name="floor_plan[]" id="floor_plan" multiple accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
	<div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Brochure:</label>
      <div class="col-md-9">
          <?php
          $sql = "SELECT * FROM door_images WHERE p_id=$id AND type = 'brochure'";
                                    $result = $conn->query($sql);
//echo $sql;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                ?>
          <a href="javascript:;"  class="img-delete" id="<?php echo $row['id']; ?>" filepath="<?php echo $row['image']; ?>" ><img src="uploads/brochure/<?php echo $row['image']; ?>" style="width:100px;"></a>
          <?php
                                                
                                                }
                                            }
                                            ?>
        <input type="file" name="brochure[]" id="brochure" multiple>
        <p class="help-block">format: psd</p>
      </div>
    </div>
     
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Person Name :</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="person_name" value="<?php echo $person_name ?>" id="person_name" placeholder="Contact Person Name">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Email:</label>
      <div class="col-md-9">
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>"  placeholder="Email ID">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">About Agents :</label>
      <div class="col-md-9">
        <textarea class="form-control" name="about_agents" id="about_agents" placeholder="Details about Agents"><?php echo $about_agents ?></textarea>
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Mobile:</label>
      <div class="col-md-9">
        <input type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo $mobile ?>"  placeholder="Mobile Number">
      </div>
    </div>
 
    

	
    <div class="form-group">
        <label class="col-sm-3 no-pad">Other Rooms</label>
        <div class="col-sm-9">
            <select id="otherrooms" name="otherrooms[]" multiple="multiple">
                <option <?php if (strpos($amenities, 'Bathrooms') !== false){ echo "selected";} ?> >Bathrooms</option>
                <option <?php if (strpos($amenities, 'Servant Room') !== false){ echo "selected";} ?> >Servant Room</option>
                <option <?php if (strpos($amenities, 'Pooja Room') !== false){ echo "selected";} ?> >Pooja Room</option>
                <option <?php if (strpos($amenities, 'Kitchen') !== false){ echo "selected";} ?> >Kitchen</option>
                <option <?php if (strpos($amenities, 'Dining Room') !== false){ echo "selected";} ?> >Dining Room</option>
                <option <?php if (strpos($amenities, 'Balcony') !== false){ echo "selected";} ?> >Balcony</option>
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label class="col-sm-3 no-pad">Possession Time</label>
        <div class="col-sm-9">
            <select id="possessiontime" name="possessiontime[]">
                <option <?php if (strpos($amenities, 'Ready to Move') !== false){ echo "selected";} ?> >Ready to Move</option>
                <option <?php if (strpos($amenities, 'Under Construction') !== false){ echo "selected";} ?> >Under Construction</option>
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label class="col-sm-3 no-pad">Restrictions</label>
        <div class="col-sm-9">
            <select id="restrictions" name="restrictions[]" multiple="multiple">
                <option <?php if (strpos($amenities, 'Family Only') !== false){ echo "selected";} ?> >Family Only</option>
                <option <?php if (strpos($amenities, 'Vegetarian Only') !== false){ echo "selected";} ?> >Vegetarian Only</option>
                <option <?php if (strpos($amenities, 'Bachelors Only') !== false){ echo "selected";} ?> >Bachelors Only</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 no-pad">Interiors</label>
        <div class="col-sm-9">
            <select id="interiors" name="interiors[]">
                <option <?php if (strpos($amenities, 'Furnished') !== false){ echo "selected";} ?> >Furnished</option>
                <option <?php if (strpos($amenities, 'Semi-Furnished') !== false){ echo "selected";} ?> >Semi-Furnished</option>
                <option <?php if (strpos($amenities, 'UnFurnished') !== false){ echo "selected";} ?> >UnFurnished</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 no-pad">Amenities</label>
        <div class="col-sm-9">
            <select id="amenities" name="amenities[]" multiple="multiple">
                    <option <?php if (strpos($amenities, 'Power Backup') !== false){ echo "selected";} ?> >Power Backup</option>
                    <option <?php if (strpos($amenities, 'Security / Fire Alarm') !== false){ echo "selected";} ?> >Security / Fire Alarm</option>
                    <option <?php if (strpos($amenities, 'Air Conditioner') !== false){ echo "selected";} ?> >Air Conditioner</option>
                    <option <?php if (strpos($amenities, 'Private Garden / Terrace') !== false){ echo "selected";} ?> >Private Garden / Terrace</option>
                    <option <?php if (strpos($amenities, 'Intercom Facility') !== false){ echo "selected";} ?> >Intercom Facility</option>
                    <option <?php if (strpos($amenities, 'Water Storage') !== false){ echo "selected";} ?> >Water Storage</option>
                    <option <?php if (strpos($amenities, 'Piped-gas') !== false){ echo "selected";} ?> >Piped-gas</option>
                    <option <?php if (strpos($amenities, 'Internet/wi-fi connectivity') !== false){ echo "selected";} ?> >Internet/wi-fi connectivity</option>
                    <option <?php if (strpos($amenities, '>Water purifier') !== false){ echo "selected";} ?> >Water purifier</option>
                    <option <?php if (strpos($amenities, 'Visitor Parking<') !== false){ echo "selected";} ?> >Visitor Parking</option>
                    <option <?php if (strpos($amenities, 'Sports and Recreation') !== false){ echo "selected";} ?> >Sports and Recreation</option>
                    <option <?php if (strpos($amenities, 'Swimming Pool') !== false){ echo "selected";} ?> >Swimming Pool</option>
                    <option <?php if (strpos($amenities, 'Restaurant') !== false){ echo "selected";} ?> >Restaurant</option>
                    <option <?php if (strpos($amenities, 'Air Filter') !== false){ echo "selected";} ?> >Air Filter</option>
                    <option <?php if (strpos($amenities, 'Geyser') !== false){ echo "selected";} ?> >Geyser</option>
                    <option <?php if (strpos($amenities, 'Playground') !== false){ echo "selected";} ?> >Playground</option>
                    <option <?php if (strpos($amenities, 'TV Set') !== false){ echo "selected";} ?> >TV Set</option>
                    <option <?php if (strpos($amenities, 'Squash Court') !== false){ echo "selected";} ?> >Squash Court</option>
                    <option <?php if (strpos($amenities, 'Fitness Center / GYM') !== false){ echo "selected";} ?> >Fitness Center / GYM</option>
                    <option <?php if (strpos($amenities, 'Cricket') !== false){ echo "selected";} ?> >Cricket</option>
                    <option <?php if (strpos($amenities, 'Golf simulator facility') !== false){ echo "selected";} ?> >Golf simulator facility</option>
                    <option <?php if (strpos($amenities, 'Table tennis') !== false){ echo "selected";} ?> >Table tennis</option>
                    <option <?php if (strpos($amenities, 'Badminton') !== false){ echo "selected";} ?> >Badminton</option>
                    <option <?php if (strpos($amenities, 'Tennis') !== false){ echo "selected";} ?> >Tennis</option>
                    <option <?php if (strpos($amenities, 'Billiards') !== false){ echo "selected";} ?> >Billiards</option>
                    <option <?php if (strpos($amenities, 'Snooker') !== false){ echo "selected";} ?> >Snooker</option>
                    <option <?php if (strpos($amenities, 'Lift') !== false){ echo "selected";} ?> >Lift</option>
                    <option <?php if (strpos($amenities, 'Club house/Community Center') !== false){ echo "selected";} ?> >Club house/Community Center</option>
                    <option <?php if (strpos($amenities, 'Security Personnel') !== false){ echo "selected";} ?> >Security Personnel</option>
                    <option <?php if (strpos($amenities, 'Maintenance Staff') !== false){ echo "selected";} ?> >Maintenance Staff</option>
                    <option <?php if (strpos($amenities, 'Water softening plant') !== false){ echo "selected";} ?> >Water softening plant</option>
                    <option <?php if (strpos($amenities, 'Shopping Centre') !== false){ echo "selected";} ?> >Shopping Centre</option>
                    <option <?php if (strpos($amenities, 'Waste Disposal') !== false){ echo "selected";} ?> >Waste Disposal</option>
                    <option <?php if (strpos($amenities, 'Rain Water Harvesting') !== false){ echo "selected";} ?> >Rain Water Harvesting</option>
                    <option <?php if (strpos($amenities, 'Amphi Theater') !== false){ echo "selected";} ?> >Amphi Theater</option>
                    <option <?php if (strpos($amenities, 'Steam and sauna room') !== false){ echo "selected";} ?> >Steam and sauna room</option>
                    <option <?php if (strpos($amenities, 'Sky walk') !== false){ echo "selected";} ?> >Sky walk</option>
                    <option <?php if (strpos($amenities, 'Dog park') !== false){ echo "selected";} ?> >Dog park</option>
                    <option <?php if (strpos($amenities, 'Multipurpose  hall') !== false){ echo "selected";} ?> >Multipurpose  hall</option>
                    <option <?php if (strpos($amenities, 'Library') !== false){ echo "selected";} ?> >Library</option>
                    <option <?php if (strpos($amenities, 'Children play area') !== false){ echo "selected";} ?> >Children play area</option>
                    <option <?php if (strpos($amenities, 'Jogging track') !== false){ echo "selected";} ?> >Jogging track</option>
                    <option <?php if (strpos($amenities, 'Internal roads') !== false){ echo "selected";} ?> >Internal roads</option>
                    <option <?php if (strpos($amenities, 'Garden') !== false){ echo "selected";} ?> >Garden</option>
            </select>
        </div>
    </div>
	
  
 
    <div class="form-group">
      <label for="haslo" class="col-md-3 no-pad">city:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="city" value="<?php echo $city;?>" id="city" placeholder="City">
      </div>
    </div>

 
 
	
    
    <div class="row">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-success">Update Property</button>
      </div>
    </div>
  </form>
  </div>
</div>
  </div>
<div class="dltresult">Doubel click on image to delete</div>

<div class="clearfix">&nbsp;</div>

<div class="container-fluid footer-wrap">
  <div class="container text-center">
    <p>Copyright 2016 | All Rights Reserved by doorsind</p>
  </div>
</div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      
      <!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
     <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
      <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#addprop").validate({
    
        // Specify the validation rules
        rules: {
            name: {
                required: true
            },
            overview: {
                required: true
            },
            property_name: {
                required: true
            },
            description: {
                required: true
            },
            email: {
                required: true
            },
            person_name: {
                required: true
            },
            about_agents: {
                required: true
            },
            mobile: {
                required: true,
                number: true
            },
            geocomplete: {
                required: true
            },
            property_type: {
                required: true
            },
            actual_price: {
                required: true
            },
            city: {
                required: true
            },
            property_size: {
                required: true
            },
            google_location: {
                required: true
            },
            video: {
                required: true
            },
            number_of_bedrooms: {
                required: true
            },
            number_of_bathroom: {
                required: true
            },
            bathroom_image: {
                required: true,
                extension: "gif|jpeg|jpg"
            },
            bedrooms_image: {
                required: true,
                extension: "gif|jpeg|jpg"
            },
            cover_image: {
                required: true,
                extension: "gif|jpeg|jpg"
            },
            layout_plan: {
                required: true,
                extension: "gif|jpeg|jpg"
            },
            floor_plan: {
                required: true,
                extension: "gif|jpeg|jpg"
            }
        },
        
        // Specify the validation error messages
        messages: {
            name: "Please enter your first name",
            overview: "Please enter your first name",
            property_name: "Please enter your first name",
            description: "Please enter your first name",
            email: "Please enter your first name",
            person_name: "Please enter your first name",
            about_agents: "Please enter your first name",
            mobile: "Please enter your first name",
            geocomplete: "Please enter your first name",
            property_type: "Please enter your first name",
            actual_price: "Please enter your first name",
            city: "Please enter your first name",
            property_size: "Please enter your first name",
            google_location: "Please enter your first name",
            video: "Please enter your first name",
            number_of_bedrooms: "Please enter your first name",
            number_of_bathroom: "Please enter your first name",
            bathroom_image: "Please enter your first name",
            bedrooms_image: "Please enter your first name",
            cover_image: "Please enter your first name",
            layout_plan: "Please enter your first name",
            floor_plan: "Please enter your first name"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
	<script>
	          $(function() {

          $('body').on('click', '.list-group .list-group-item', function() {
            $(this).toggleClass('active');
          });
          $('.list-arrows button').click(function() {
            var $button = $(this),
              actives = '';
            if ($button.hasClass('move-left')) {
              actives = $('.list-right ul li.active');
              actives.clone().appendTo('.list-left ul');
              actives.remove();
            } else if ($button.hasClass('move-right')) {
              actives = $('.list-left ul li.active');
              actives.clone().appendTo('.list-right ul');
              actives.remove();
            }
          });
          $('.dual-list .selector').click(function() {
            var $checkBox = $(this);
            if (!$checkBox.hasClass('selected')) {
              $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
              $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
            } else {
              $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
              $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
            }
          });
          $('[name="SearchDualList"]').keyup(function(e) {
            var code = e.keyCode || e.which;
            if (code == '9') return;
            if (code == '27') $(this).val(null);
            var $rows = $(this).closest('.dual-list').find('.list-group li');
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
            $rows.show().filter(function() {
              var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
              return !~text.indexOf(val);
            }).hide();
          });

        });
	</script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#amenities').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        }); 
        $('#number_of_bedrooms').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#number_of_bathroom').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#property_type').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#otherrooms').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#transaction_type').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#possessiontime').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#restrictions').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#interiors').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
    });
</script>
       <!--Google maps start-->
       <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    
    <script src="js/jquery.geocomplete.js"></script>
    
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
          map: ".map_canvas",
          details: "form ",
          markerOptions: {
            draggable: true
          }
        });
        
        $("#geocomplete").bind("geocode:dragged", function(event, latLng){
           $("input[name=lat_res]").val(latLng.lat());
          $("input[name=lng_res]").val(latLng.lng());
          $("#google_location").val(latLng.lat()+","+latLng.lng());
          $("#reset").show();
        });
        
        
        $("#reset").click(function(){
          $("#geocomplete").geocomplete("resetMarker");
          $("#reset").hide();
          return false;
        });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        }).click();
      });
    </script>
      <!--Goole maps end-->
      <script>
    window.onload = function() {
         $('.img-delete').dblclick(function(){
        //alert($(this).attr("id"));
            $(this).hide();
            $.get( "delete-img.php?id="+$(this).attr("id")+"&file="+$(this).attr("filepath"), function( data ) {
              $( ".dltresult" ).show().html( data );
                //$( ".dltresult" ).delay(2000).hide();
                //alert(data);
                if(data=="success"){
                    
                }
              
            });
    });
        CKEDITOR.replace( 'overview' );
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'about_agents' );
    };
</script>
  </body>
</html>
