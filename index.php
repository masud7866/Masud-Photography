<?php
include "admin/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Masud's Photography</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ==================================================
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">-->

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<!--<script type="text/javascript" src="js/modernizr.custom.js"></script>-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h1>Masud's Photography</h1>
          <hr>
          <p>Photo Gallery</p>
          <a href="#about" class="btn btn-default btn-lg page-scroll">Learn More</a> </div>
      </div>
    </div>
  </div>
</header>
<!-- Navigation -->
<div id="nav">
  <nav class="navbar navbar-custom">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-main-collapse">
        <ul class="nav navbar-nav">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden"> <a href="#page-top"></a> </li>
          <li> <a class="page-scroll" href="#about">About</a> </li>
          <li> <a class="page-scroll" href="#portfolio">Photos</a> </li>
          <li> <a class="page-scroll" href="#contact">Contact</a> </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>About Me</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-12 text-center"><img src="img/about.jpg" class="img-responsive"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="about-text">
          <p>I am Masudur Rahman, a student of Computer Science & Engineering, photographer by hobby. <br>I capture natural photos mostly.<br>
          This website represents the photos taken by me and other photographers.<br>
          My goal is to showcase the natural beauties of Bangladesh along with other beautiful scenery.</p>
          <a href="#portfolio" class="btn btn-default btn-lg page-scroll">See Photos</a> </div>
      </div>
    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Photos</h2>
      <hr>
    </div>
    <div class="categories">
      <ul class="cat1">
          <h3 style="display: inline; font-weight: bold" >Album</h3>
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">All</a></li>
              <?php
              foreach (get_all_albums() as $row1) {
                  ?>
                  <li><a href="#" data-filter=".album<?php echo $row1[0]?>"><?php echo $row1[1]?></a></li>
                  <?php
              }
              ?>
          </ol>
        </li>
      </ul>
        <ul class="cat2" style="padding-top: 15px;">
            <h3 style="display: inline; font-weight: bold" >Photographer</h3>
            <li>
                <ol class="type">
                    <li><a href="#" data-filter="*" class="active">All</a></li>
                    <?php
                    foreach (get_all_photographers() as $row1) {
                        ?>
                        <li><a href="#" data-filter=".photographer<?php echo $row1[0]?>"><?php echo $row1[1]?></a></li>
                        <?php
                    }
                    ?>
                </ol>
            </li>
        </ul>

       <!-- <ul class="cat">
            <li>
                <ol class="type">
                    <li><a href="#" data-filter2="*" class="active">All</a></li>
                    <li><a href="#" data-filter2=".masud">Masud</a></li>
                    <li><a href="#" data-filter2=".safa">Safa</a></li>
                </ol>
            </li>
        </ul> -->
      <div class="clearfix"></div>
    </div>
    <div class="row">
        <?php
        $get_all_photos = get_all_photos();
        if(!$get_all_photos)
        {
                ?>

        <h3 class="text-danger text-center">No Photos Found!</h3>
        <?php
        }
        else{
        ?>
      <div class="portfolio-items">
          <?php
          foreach ($get_all_photos as $row) {
              ?>
              <div class="col-sm-6 col-md-3 col-lg-3 <?php echo "album".$row[7]." photographer".$row[6]?>">
                  <div class="portfolio-item">
                      <div class="hover-bg"><a href="img/portfolio/<?php echo $row[8]?>" title="<?php if($row[4]=="0000-00-00"){$row[4]="Unknown";} if($row[5]==""){$row[5]="Unknown";} if($row[3]==""){$row[3]="No Camera Found";} echo "Date of Capture: ".$row[4].", Location: ".$row[5].", Camera: ".$row[3];?>"
                                               data-lightbox-gallery="gallery1">
                              <div class="hover-text">
                                  <h4><?php if($row[2]==""){$row[2]="No Caption";} echo $row[2]?></h4>
                              </div>
                              <img src="img/portfolio/<?php echo $row[8]?>" class="img-responsive" alt="<?php echo $row[1]?>"> </a>
                      </div>
                  </div>
              </div>
              <?php
          }
          }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Get In Touch</h2>
      <hr>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <div class="row" >
        <div style="margin: 0 auto;">
            <ul class="contact2">
                <li><span class="fa fa-user" title="Name"></span> <span>Masudur Rahman</span></li>
                <li><span class="fa fa-envelope" title="E-Mail"></span><span>masud7866@gmail.com</span></li>
                <li><span class="fa fa-phone" title="Phone"></span> <span>+8801731279192</span></li>
            </ul>
        </div>
      </div>
      <div class="social">
          <div class="section-title center">
              <h2>Social Links</h2>
              <hr>
          </div>
        <ul>
          <li><a href="http://fb.com/masud7866"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/masud7866"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.instagram.com/masud7866/"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://www.linkedin.com/in/masud7866/"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="https://plus.google.com/u/0/+MasudRahman7866"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 Masud. Designed by <a href="http://fb.com/masud7866" rel="nofollow">Masud Rahman</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>



</body>
</html>