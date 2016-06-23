<?php
error_reporting(0);

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$person_name=$_POST['person_name'];
$about_agents=$_POST['about_agents'];
$property_name=$_POST['property_name'];
$description=$_POST['description'];
$actual_price=$_POST['actual_price'];
$google_location=$_POST['google_location'];
$property_type=$_POST['property_type'];
$video=$_POST['video'];

/*number_of_bedrooms*/

$number_of_bathroom = $_POST['number_of_bathroom'];
$number_of_bathroom_res.=  implode('^', $number_of_bathroom);

$number_of_bedrooms = $_POST['number_of_bedrooms'];
$number_of_bedrooms_res = implode('^', $number_of_bedrooms);


/*otherrooms*/
$otherrooms = $_POST['otherrooms'];
$otherrooms_res = implode('^', $otherrooms);

/*possessiontime*/
$possessiontime = $_POST['possessiontime'];
$possessiontime_res = implode('^', $possessiontime);

/*restrictions*/
$restrictions = $_POST['restrictions'];
$restrictions_res = implode('^', $restrictions);

/*interiors*/
$interiors = $_POST['interiors'];
$interiors_res = implode('^', $interiors);

/*amenities*/
$amenities = $_POST['amenities'];
$amenities_res = implode('^', $amenities);

$amenities_all_res = $otherrooms_res.$possessiontime_res.$restrictions_res.$interiors_res.$amenities_res;
$brochure = $_POST['brochure'];

$transaction_type = $_POST['transaction_type'];
$property_size=$_POST['property_size'];
$overview=$_POST['overview'];
$city=$_POST['city'];
$location_of_the_property=$_POST['geocomplete'];

$amenities=$_POST['amenities'];



// Create connection
include "../db-config.php"; 


date_default_timezone_set("Asia/Kolkata");
$myday=date("M d ,Y");
echo"<br>";
$sql = "INSERT INTO door_property_details (name, email, mobile, person_name, about_agents, property_name, description, transaction_type, property_type, actual_price, number_of_bedrooms, number_of_bathroom, property_size, overview, city, location_of_the_property, google_location, video, brochure, amenities,date_of_creat,type, status) VALUES ('$name','$email',$mobile,'$person_name','$about_agents','$property_name','$description','$transaction_type','$property_type','$actual_price','$number_of_bedrooms_res','$number_of_bathroom_res','$property_size','$overview','$city','$location_of_the_property','$google_location','$video','$brochure','$amenities_all_res','$myday','p',1)";
//echo $sql;
if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully<br>";
  $last_id=$conn->insert_id;
//  echo $last_id."<br>";

  /****************************Upload Start************************/
// floor_plan # of uploaded
  if(isset($_FILES['brochure'])){

   $name_array = $_FILES['brochure']['name'];
   $tmp_name_array = $_FILES['brochure']['tmp_name'];
     // Number of files
   $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
   $static_final_name = $person_name."-".time()."-";

   for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
    $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
    if(move_uploaded_file($tmp_name_array[$i], "uploads/brochure/".$static_final_name.$i.".".$extension)){
     $img=$static_final_name.$i.".".$extension;
     $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'brochure','$img')";
//echo $sql;
     if ($conn->query($sql) === TRUE) {
      echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
    }

  } else {
   echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
 }

}

}// floor_plan # of uploaded
if(isset($_FILES['floor_plan'])){

 $name_array = $_FILES['floor_plan']['name'];
 $tmp_name_array = $_FILES['floor_plan']['tmp_name'];
     // Number of files
 $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
 $static_final_name = $person_name."-".time()."-";

 for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
  if(move_uploaded_file($tmp_name_array[$i], "uploads/floor_plan/".$static_final_name.$i.".".$extension)){
   $img=$static_final_name.$i.".".$extension;
   $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'floor_plan','$img')";
//echo $sql;
   if ($conn->query($sql) === TRUE) {
    echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
  }

} else {
 echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
}

}

}

    // layout_plan # of uploaded
if(isset($_FILES['layout_plan'])){

 $name_array = $_FILES['layout_plan']['name'];
 $tmp_name_array = $_FILES['layout_plan']['tmp_name'];
     // Number of files
 $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
 $static_final_name = $person_name."-".time()."-";

 for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
  if(move_uploaded_file($tmp_name_array[$i], "uploads/layout_plan/".$static_final_name.$i.".".$extension)){
   $img=$static_final_name.$i.".".$extension;
   $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'layout_plan','$img')";
//echo $sql;
   if ($conn->query($sql) === TRUE) {
    echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
  }
} else {
 echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
}

}

}

    // cover_image # of uploaded
if(isset($_FILES['cover_image'])){

 $name_array = $_FILES['cover_image']['name'];
 $tmp_name_array = $_FILES['cover_image']['tmp_name'];
     // Number of files
 $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
 $static_final_name = $person_name."-".time()."-";

 for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
  if(move_uploaded_file($tmp_name_array[$i], "uploads/cover_image/".$static_final_name.$i.".".$extension)){
   $img=$static_final_name.$i.".".$extension;
   $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'cover_image','$img')";
//echo $sql;
   if ($conn->query($sql) === TRUE) {
    echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
  }
} else {
 echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
}

}

}
/*    // cover_image # of uploaded
if(isset($_FILES['bathroom_image'])){

     $name_array = $_FILES['bathroom_image']['name'];
     $tmp_name_array = $_FILES['bathroom_image']['tmp_name'];
     // Number of files
     $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
     $static_final_name = $person_name."-".time()."-";

     for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
          $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
          if(move_uploaded_file($tmp_name_array[$i], "uploads/bathroom_image/".$static_final_name.$i.".".$extension)){
               $img=$static_final_name.$i.".".$extension;
              $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'bathroom_image','$img')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
}
          } else {
               echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
          }

     }

}
    // cover_image # of uploaded
if(isset($_FILES['bedrooms_image'])){

     $name_array = $_FILES['bedrooms_image']['name'];
     $tmp_name_array = $_FILES['bedrooms_image']['tmp_name'];
     // Number of files
     $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
     $static_final_name = $person_name."-".time()."-";

     for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
          $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
          if(move_uploaded_file($tmp_name_array[$i], "uploads/bedrooms_image/".$static_final_name.$i.".".$extension)){
               $img=$static_final_name.$i.".".$extension;
              $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'bedrooms_image','$img')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo $static_final_name.$i.".".$extension." floor_plan upload is complete<br>";
}
          } else {
               echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
          }

     }

   }*/




   /****************************Upload end************************/
   header("Location: ./?msg=success");   
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: ./?msg=error");
}



$conn->close();
?>
<a href="./">Go Home</a>