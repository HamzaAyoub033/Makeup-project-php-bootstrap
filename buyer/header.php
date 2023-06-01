<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
    	<title>Auto Part</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="js/bootstrap.min.js">
        <link rel="stylesheet" href="icons/font/flaticon.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css" media="all">
        <link rel="stylesheet" href="css/detailpage.css">
        <link rel="stylesheet" href="css/cart.css">
        <link rel="stylesheet" href="css/allproducts.css">

        <body>
                 
                 <nav class="navbar navbar-inverse">
  					<div class="container-fluid">
    					<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span> 
                            </button>
      						<a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
    					</div>
    					<ul class="nav navbar-nav">
      						<li><a href="../index.php">Home</a></li>
                            <li><a href="all_products.php">Poducts</a></li>
      						<li><a href="about.php">About Us</a></li>
                            <li><a href="contact_us.php">Contact Us</a></li>
                            <li><a href="my_account.php">My Account</a></li>
      						
    					</ul>
                        <div class="info">
                            <ul>
                            	<li><a href="#" style="color:#F9F5F6;"><?php
                    	
				if(!isset($_SESSION['user'])){
							
					echo "<b>WELCOME Guest!</b>";		
				}
				else{
								
					echo "WELCOME: &nbsp;" . $_SESSION['user']['buyer_name'] ;				
					}
				?>
                            	</a></li>
                                <li><a href="#"><i class="fa fa-user-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i><sup> </sup><span>$0</span></a>
                                </li>
							</ul>
	                    </div>
                   </div>  
				</nav>
</head>