<?php
@session_start();
if(!isset($_SESSION['admin'])){
header("Location:./login.php");
}
include "../db-config.php"; 
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
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="properties.php">Properties</a></li>
        <li><a href="deals.php">Deals</a></li>
        <li><a href="contacts.php">Contacts</a></li>
        <li><a href="testimonials.php">Testimonials</a></li>
        <li><a href="news.php">News</a></li>
      </ul>
    </div>
	</nav>
	</div>
	</div>
  </div>