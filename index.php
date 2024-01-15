<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>
<head>
  <link rel="shortcut icon" href="./new/fav.png" type="image/x-icon">
<title>Student  Management System || Home Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--bootstrap-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!--coustom css-->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<!--script-->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- js -->
<script src="js/bootstrap.js"></script>
<!-- /js -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--/fonts-->
<!--hover-girds-->
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
<!--/hover-grids-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
</head>
	<body>
<?php include_once('includes/header.php');?>
<!-- Slider -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<style>
   .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 500px;
      object-fit: cover;
    }
</style>

 <!-- Swiper -->
 <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="./new/1a (1).jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="./new/1a (2).jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="./new/1a (3).jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="./new/1a (4).jpg" alt="">
      </div>
      
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->




  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>
<!-- Slider -->




<div class="callbacks_container" style="margin-top:-20px; margin-left:20px;">
        <ul class="rslides" id="slider">
         <li>     
          <h3 style="color: black;"><b>Student Management System</b></h3>      
           <p style="color: black;">Registered Students can Login Here</p>             
          <div class="readmore">
          <a href="user/login.php">Student Login<i class="glyphicon glyphicon-menu-right"> </i></a>
          </div>
         </li>

 
        </ul>
      </div>









<div class="welcome" style="margin-top:-100px;">
	<div class="container">
		<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
		<h3><b><?php  echo htmlentities($row->PageTitle);?></b></h3>
		<p><?php  echo ($row->PageDescription);?></p><?php $cnt=$cnt+1;}} ?> </p>
	</div>
</div>
<!--/welcome-->


<!--testmonials-->
<div class="testimonials">
	<div class="container">
			<div class="testimonial-nfo">
        <h3><b>Public Notices</b></h3>
         <marquee  style="height:350px;" direction ="up" onmouseover="this.stop();" onmouseout="this.start();">
				<?php
$sql="SELECT * from tblpublicnotice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

 
		<a href="view-public-notice.php?viewid=<?php echo htmlentities ($row->ID);?>" target="_blank" style="color:#fff;">
          <?php  echo htmlentities($row->NoticeTitle);?>(<?php  echo htmlentities($row->CreationDate);?>)</a>
          <hr /><br />
				    
			<?php $cnt=$cnt+1;}} ?>
	</marquee></div>
	</div>
</div>
<!--\testmonials-->
<!--specfication-->

<!--/specfication-->
<?php include_once('includes/footer.php');?>
<!--/copy-rights-->
	</body>
</html>
