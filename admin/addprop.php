<?php
session_start();
include 'header.php';
?>  
  <div class="container forms">
  <div class="row">
	 <h2 class="col-md-12"><i class="glyphicon glyphicon-plus"></i> Add Property</h2>  	 
	</div>
  <div class="row">
  <div class="col-md-7">
  <form role="form" id="addprop" action="addnew.php" method="post" enctype="multipart/form-data">
      <div class="form-group" style="display:none;">
      <label for="imie" class="col-md-3 no-pad">Name:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="name"  id="name" placeholder="Name of the Contact Person">
      </div>
    </div>
      <div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property Name:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="property_name" id="property_name" placeholder="Name of the Property">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property Overview:</label>
      <div class="col-md-9">
        <textarea class="form-control" name="overview" id="overview" placeholder="Detailed Overview of the Property"></textarea>
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Property description:</label>
      <div class="col-md-9">
        <textarea class="form-control" name="description" id="description" placeholder="Property Description"></textarea>
				
      </div>
    </div>
      <div class="form-group">
      <label for="miejscowosc" class="col-md-3 no-pad">Property Type:</label>
      <div class="col-md-9">
        <select name="property_type[]" id="property_type">
          <option>Apartment</option>
          <option>Villa</option>
          <option>Studio Apartment</option>
          <option>Penthouse</option>
          <option>Builder Floor</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="miejscowosc" class="col-md-3 no-pad">Transaction Type:</label>
      <div class="col-md-9">
        <select name="transaction_type" id="transaction_type">
          <option>1 BHK</option>
          <option>2 BHK</option>
          <option>3 BHK</option>
          <option>4 BHK</option>
          <option>5 BHK</option>
        </select>
      </div>
    </div>
   <div class="form-group">
      <label for="email" class="col-md-3 no-pad">Price:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="actual_price" id="actual_price" placeholder="Price of Property">
      </div>
    </div>
      
    <div class="form-group">
      <label for="haslo" class="col-md-3 no-pad">Property Size:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="property_size" id="property_size" placeholder="Area in Sq.Ft, pleas enter only numbers">
      </div>
    </div>
      <div class="form-group">
      <label for="nazwisko" class="col-md-3 no-pad">Address:</label>
      <div class="col-md-9">
      <input id="geocomplete" name="geocomplete" class="form-control" type="text" placeholder="Type in an address" value="" />
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
       <textarea class="form-control" name="google_location" id="google_location" readonly placeholder="Google Location Map embed Link" style="display:none;"></textarea>

     
 <div class="form-group">
      <label for="video" class="col-md-3 no-pad">Video:</label>
      <div class="col-md-9">
          <textarea class="form-control" name="video"  id="video"  placeholder="Youtube or Vimeo Video embed Link"></textarea>
      </div>
    </div> 
     	
    <div class="form-group">
      <label for="plec" class="col-md-3 no-pad">Bedrooms:</label>
      <div class="col-md-9">
          <select id="number_of_bedrooms" name="number_of_bedrooms[]" multiple="multiple">
             
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
		    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
		    <option>10</option>
            </select>
       
      </div>
    </div>
	
	 <div class="form-group">
      <label for="plec" class="col-md-3 no-pad">Bathrooms:</label>
      <div class="col-md-9">
          <select id="number_of_bathroom" name="number_of_bathroom[]" multiple="multiple">
                
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
		    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
		    <option>10</option>
            </select>
       
      </div>
    </div>
      <div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Property Images:</label>
      <div class="col-md-9">
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
        <input type="file" name="layout_plan[]" id="layout_plan" multiple  accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
	
	<div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Floor Plan Images:</label>
      <div class="col-md-9">
        <input type="file" name="floor_plan[]" id="floor_plan" multiple accept="image/gif, image/jpeg,, image/jpg">
        <p class="help-block">format: jpeg, jpg</p>
      </div>
    </div>
	<div class="form-group">
      <label for="propimage" class="col-md-3 no-pad">Brochure:</label>
      <div class="col-md-9">
        <input type="file" name="brochure[]" id="brochure" multiple>
        <p class="help-block">format: psd</p>
      </div>
    </div>
     
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Person Name :</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="person_name" id="person_name" placeholder="Contact Person Name">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Email:</label>
      <div class="col-md-9">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email ID">
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">About Agents :</label>
      <div class="col-md-9">
        <textarea class="form-control" name="about_agents" id="about_agents" placeholder="Details about Agents"></textarea>
      </div>
    </div>
	<div class="form-group">
      <label for="imie" class="col-md-3 no-pad">Mobile:</label>
      <div class="col-md-9">
        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
      </div>
    </div>
 
    

	
    <div class="form-group">
        <label class="col-sm-3 no-pad">Other Rooms</label>
        <div class="col-sm-9">
            <select id="otherrooms" name="otherrooms[]" multiple="multiple">
                <option>Bathrooms</option>
                    <option>Servant Room</option>
                    <option>Pooja Room</option>
                    <option>Kitchen</option>
					<option>Dining Room</option>
                    <option>Balcony</option>
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label class="col-sm-3 no-pad">Possession Time</label>
        <div class="col-sm-9">
            <select id="possessiontime" name="possessiontime[]">
                <option>Ready to Move</option>
                <option>Under Construction</option>
            </select>
        </div>
    </div> 
    <div class="form-group">
        <label class="col-sm-3 no-pad">Restrictions</label>
        <div class="col-sm-9">
            <select id="restrictions" name="restrictions[]" multiple="multiple">
                <option>Family Only</option>
                <option>Vegetarians only</option>
                <option>Bachelors Only</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 no-pad">Interiors</label>
        <div class="col-sm-9">
            <select id="interiors" name="interiors[]">
                <option>Furnished</option>
                <option>Semi-Furnished</option>
                <option>UnFurnished</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 no-pad">Amenities</label>
        <div class="col-sm-9">
            <select id="amenities" name="amenities[]" multiple="multiple">
                    <option>Power Backup</option>
                    <option>Security / Fire Alarm</option>
                    <option>Air Conditioned</option>
                    <option>Private Garden / Terrace</option>
                    <option>Intercom Facility</option>
                    <option>Water Storage</option>
                    <option>Piped-gas</option>
                    <option>Internet/wi-fi connectivity</option>
                    <option>Water purifier</option>
                    <option>Visitor Parking</option>
                    <option>Sports and Recreation</option>
                    <option>Swimming Pool</option>
                    <option>Squash Court</option>
                    <option>Fitness Center / GYM</option>
                    <option>Cricket</option>
                    <option>Golf simulator facility</option>
                    <option>Table tennis</option>
                    <option>Badminton</option>
                    <option>Tennis</option>
                    <option>Billiards</option>
                    <option>Snooker</option>
                    <option>Lift</option>
                    <option>Club house/Community Center</option>
                    <option>Security Personnel</option>
                    <option>Maintenance Staff</option>
                    <option>Water softening plant</option>
                    <option>Shopping Centre</option>
                    <option>Waste Disposal</option>
                    <option>Rain Water Harvesting</option>
                    <option>Amphi Theater</option>
                    <option>Steam and sauna room</option>
                    <option>Sky walk</option>
                    <option>Dog park</option>
                    <option>Multipurpose  hall</option>
                    <option>Library</option>
                    <option>Children play area</option>
                    <option>Jogging track</option>
                    <option>Internal roads</option>
                    <option>Garden</option>
            </select>
        </div>
    </div>
	
  
 
    <div class="form-group">
      <label for="haslo" class="col-md-3 no-pad">city:</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="city" id="city" placeholder="City">
      </div>
    </div>

 
 
	
    
    <div class="row">
      <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-success">Add Property</button>
      </div>
    </div>
  </form>
  </div>
</div>
  </div>


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
        $('#transaction_type').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true
        });
        $('#otherrooms').multiselect({
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
        CKEDITOR.replace( 'overview' );
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'about_agents' );
    };
</script>
  </body>
</html>