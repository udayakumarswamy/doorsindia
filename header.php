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
    <body class="index" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


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

  <div class="container menubar">
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
