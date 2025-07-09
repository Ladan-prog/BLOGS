<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>News Update || Home One</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/icofont.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png"> -->
    
    <style>

img {
    /* max-width: 100%; */
    height: auto;
    width: 100% !important;
}

.mainarea img {
    height:755px !important;
}
.area1 img {
    height:250px !important;
}

.main-menu nav ul li a {
    font-size: 12px !important;
 
}
.mt-3 {
    margin-top:30px;
}

.mb-3 {
    margin-bottom:30px;
}

.my-3 {
    margin-bottom:30px;
    margin-top:30px;
    margin-left:15px;
}

    </style>


</head>

<body>
    <!-- <div id="preloader"></div> -->
    <!-- header area start -->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-t">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="d-weather-area">
                                <span><i class="icofont icofont-time"></i></span>
                                <span class="h-date">
                                    <?php echo date("l, F d Y")?>
                                </span>
                                <span><i class="icofont icofont-rainy-sunny"></i></span>
                                <span class="h-weather">61<sup>o</sup>f</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="h-social-area">
                                <a href="#" class="i fa fa-facebook"></a>
                                <a href="#" class="i fa fa-twitter"></a>
                                <a href="#" class="i fa fa-google-plus"></a>
                                <a href="#" class="i fa fa-linkedin"></a>
                                <a href="#" class="i fa fa-pinterest"></a>
                                <a href="#" class="i fa fa-vimeo"></a>
                                <a href="#" class="i fa fa-youtube-play"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="logo">
                            <a href="index.php"><img src="img/logo.png" alt="logo" style="width:150px !important"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="h-banner-area">
                            <a href="#"><img src="img/banner/header-top-banner1.jpg" alt="banner"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-xs hidden-sm">
            <div class="menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-11">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                         <?php 
$categories=$dbpdo->query("Select * from categories")->fetchAll(PDO::FETCH_OBJ);
foreach($categories as $category) 
            echo "<li><a href='showcategory.php?code=$category->id'>$category->catname</a></li>";
              ?>
                                       
                                      
                           <?php 
            if(!empty($_SESSION['articleuser']))
echo "
        <li ><a href='postarticle.php' >Add Article</a></li>
        <li ><a href='logout.php' >Logout</a></li>";
        else
          echo "        
        <li ><a href='login.php' >Login</a></li>";
        ?>
                                       
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="header-search-form">
                                <button type=submit id="search-btn"><i class="fa fa-search"></i></button>
                                <form method=post action="searchresults.php">
                                    <input type="text" name="search" id="search" required="" placeholder="search here">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu start -->
        <div class="mobile-menu-area hidden-md hidden-lg">
            <div class="mobile-menu">
                <div class="container">
                    <nav id="mobile-menu">
	                    <ul>
                            <li class="active"><a href="index.html">homepage</a>
                            <ul>
                                <li class="active"><a href="index.html">home verson One</a>
                                    <ul>
                                    <li><a href="#">home verson</a></li>
                                    <li><a href="#">home verson</a></li>
                                    </ul></li>
                                <li><a href="index-2.html">home verson Two</a>
                                    <ul>
                                        <li><a href="#">home verson</a></li>
                                        <li><a href="#">home verson</a></li>
                                    </ul></li>
                                <li><a href="index-3.html">home verson Three</a></li>
                            </ul></li>
                            <li><a href="#">fashion</a>
                                <ul>
                                    <li><a href="#">fashion one</a></li>
                                    <li><a href="#">fashion two</a></li>
                                    <li><a href="#">fashion three</a></li>
                                    <li><a href="#">fashion four</a></li>
                                </ul></li>
                            <li><a href="#">tech</a></li>
                            <li><a href="#">sports</a></li>
                            <li><a href="#">travel</a></li>
                            <li><a href="about-us.html">about us</a></li>
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li  class="active"><a href="index.html">home one</a></li>
                                    <li><a href="index-2.html">home two</a></li>
                                    <li><a href="index-3.html">home three</a></li>
                                    <li><a href="blog-standard.html">Blog Standard</a></li>
                                    <li><a href="blog-two-column.html">Blog Column Two</a></li>
                                    <li><a href="blogpost-details-sidebar.html">Blog Details With Sidebar</a></li>
                                    <li><a href="blogpost-details.html">Blog Details</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="coming-soon.html">Coming soon</a></li>
                                    <li><a href="maintenance.html">Maintenance</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul></li>
                        </ul>
	                </nav>
                </div>
            </div>
        </div>
        <!-- mobile menu end -->
    </header>
    <!-- header area end -->
    <!-- slider post area start -->
