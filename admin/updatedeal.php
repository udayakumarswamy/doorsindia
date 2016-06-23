<?php
error_reporting(0);
$id=$_POST['p_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$person_name=$_POST['person_name'];
$about_agents=$_POST['about_agents'];
$property_name=$_POST['property_name'];
$description=$_POST['description'];
$actual_price=$_POST['actual_price'];
$discounted_price=$_POST['discounted_price'];
$number_of_units_sold=$_POST['number_of_units_sold'];
$number_of_units_available=$_POST['number_of_units_available'];
$google_location=$_POST['google_location'];
$property_type=$_POST['property_type'];
$video=$_POST['video'];

 
/*number_of_bedrooms*/

  $number_of_bathroom = $_POST['number_of_bathroom'];
 
    $N = count($number_of_bathroom);
$number_of_bathroom_res="";
    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      $number_of_bathroom_res.= $number_of_bathroom[$i]."^";
    }

$number_of_bedrooms = $_POST['number_of_bedrooms'];
 
    $N = count($number_of_bedrooms);
$number_of_bedrooms_res="";
    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      $number_of_bedrooms_res.= $number_of_bedrooms[$i]."^";
    }


/*otherrooms*/
  $otherrooms = $_POST['otherrooms'];
 
    $N = count($otherrooms);
$otherrooms_res="";
    for($i=0; $i < $N; $i++)
    {
      $otherrooms_res.= $otherrooms[$i]."^";
    }

/*possessiontime*/
  $possessiontime = $_POST['possessiontime'];
 
    $N = count($possessiontime);
$possessiontime_res="";
    for($i=0; $i < $N; $i++)
    {
      $possessiontime_res.= $possessiontime[$i]."^";
    }
/*restrictions*/
  $restrictions = $_POST['restrictions'];
 
    $N = count($restrictions);
$restrictions_res="";
    for($i=0; $i < $N; $i++)
    {
      $restrictions_res.= $restrictions[$i]."^";
    }
/*interiors*/
  $interiors = $_POST['interiors'];
 
    $N = count($interiors);
$interiors_res="";
    for($i=0; $i < $N; $i++)
    {
      $interiors_res.= $interiors[$i]."^";
    }


/*amenities*/
  $amenities = $_POST['amenities'];
 
    $N = count($amenities);
$amenities_res="";
    for($i=0; $i < $N; $i++)
    {
      $amenities_res.= $amenities[$i]."^";
    }
echo"<br>";

$amenities_all_res = $otherrooms_res.$possessiontime_res.$restrictions_res.$interiors_res.$amenities_res;
  $brochure = $_POST['brochure'];
 
    

  
  //$transaction_type = $_POST['transaction_type'];
  $transaction_type = "";

//echo $number_of_bedrooms."-<br>".$br;
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
$sql = "UPDATE door_deal_details SET 
name='$name',
email='$email',
mobile=$mobile,
person_name='$person_name',
about_agents='$about_agents',
property_name='$property_name',
description='$description',
transaction_type='$transaction_type',
property_type='$property_type',
actual_price='$actual_price',
discounted_price='$discounted_price',
number_of_units_sold='$number_of_units_sold',
number_of_units_available='$number_of_units_available',
number_of_bedrooms='$number_of_bedrooms_res',
number_of_bathroom='$number_of_bathroom_res',
property_size='$property_size',
overview='$overview',
city='$city',
location_of_the_property='$location_of_the_property',
google_location='$google_location',
video='$video',
amenities='$amenities_all_res'
WHERE id=$id";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
$last_id=$_POST['id'];
   echo $last_id."<br>";
    
    /****************************Upload Start************************/
// floor_plan # of uploaded
if(isset($_FILES['brochure'])){

     $name_array = $_FILES['brochure']['name'];
     $tmp_name_array = $_FILES['brochure']['tmp_name'];
     // Number of files
     $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
     $static_final_name = $property_name."-".time()."-";

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
     $static_final_name = $property_name."-".time()."-";

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
     $static_final_name = $property_name."-".time()."-";

     for($i = 0; $i < $count_tmp_name_array; $i++){
          // Get extension of current file
          $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);

          // Pay attention to $static_final_name 
          if(move_uploaded_file($tmp_name_array[$i], "uploads/layout_plan/".$static_final_name.$i.".".$extension)){
               $img=$static_final_name.$i.".".$extension;
              $sql = "INSERT INTO door_images (p_id,type,image) VALUES ($last_id,'layout_plan','$img')";
echo $sql;
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
     $static_final_name = $property_name."-".time()."-";

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
    // cover_image # of uploaded
if(isset($_FILES['bathroom_image'])){

     $name_array = $_FILES['bathroom_image']['name'];
     $tmp_name_array = $_FILES['bathroom_image']['tmp_name'];
     // Number of files
     $count_tmp_name_array = count($tmp_name_array);

     // We define the static final name for uploaded files (in the loop we will add an number to the end)
     $static_final_name = $property_name."-".time()."-";

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
     $static_final_name = $property_name."-".time()."-";

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

}



    
    /****************************Upload end************************/
     header("Location: ./?msg=success");   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ./?msg=error");
}



$conn->close();
?>
<a href="./">Go Home</a>