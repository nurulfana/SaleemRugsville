<!--
Matric Number: A175171
Name: Nurul Farhanah binti Sallehuddin
-->
<?php
session_start();
if(!$_SESSION["login"]){
   header("location:login.php");
   die;
}

 ?>
 
<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Saleem Rugsville System : Home</title>
  
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CARDS -->
    <style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Fredoka One');
body {
  background-color: #fff
  ;
}

.title {
  font-family: 'Fredoka One', cursive;
  text-align: center;
  color: #FFF;
  display: flex;"
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 50vh;
  letter-spacing: 1px;
}

.title2 {
  font-family: 'Fredoka One', cursive;
  text-align: center;
  color: #FFF;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 20vh;
  letter-spacing: 1px;
}
h1 {
  background-image: url(https://media.giphy.com/media/Wq40U4rxLSr2G6XqtB/giphy.gif);
  background-size: cover;
  color: transparent;
  -moz-background-clip: text;
  -webkit-background-clip: text;
  text-transform: uppercase;
  font-size: 120px;
  line-height: .75;
  margin: 10px 0;
}

  
        @import url('https://fonts.googleapis.com/css2?family=Rubik');

         h2 {
          font-family: 'Tahoma';
        letter-spacing: 3px;
        font-size:24px; 
    text-align: center;
    padding-top: 15px;
    padding-bottom: 17px;
}
ul{
  margin:0;
  padding:0;
  list-style:none;
}
.heading.heading-icon {
    display: block;
}
.padding-lg {
  display: block;
  padding-bottom: 20px;
}
.practice-area.padding-lg {
    padding-bottom: 55px;
    padding-top: 55px;
}
.practice-area .inner{ 
     border:1px solid #999999; 
   text-align:center; 
   margin-bottom:28px; 
   padding:40px 25px;
}
.our-webcoderskull .cnt-block:hover {
    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
    border: 0;
}
.practice-area .inner h3{ 
    color:#3c3c3c; 
  font-size:24px; 
  font-weight:500;
  font-family: 'Tahoma', serif;
  padding: 10px 0;
}
.practice-area .inner p{ 
    font-size:14px; 
  line-height:22px; 
  font-weight:400;
}
.practice-area .inner img{
  display:inline-block;
}

.our-webcoderskull .cnt-block{ 
   float:left; 
   width:100%; 
   background:#fff; 
   padding:30px 20px; 
   text-align:center; 
   border:2px solid #d5d5d5;
   margin: 0 0 28px;
}
.our-webcoderskull .cnt-block figure{
   width:148px; 
   height:148px; 
   border-radius:100%; 
   display:inline-block;
   margin-bottom: 15px;
}
.our-webcoderskull .cnt-block img{ 
   width:148px; 
   height:148px; 
   border-radius:100%; 
   object-fit: cover;
}
.our-webcoderskull .cnt-block h3{ 
   color:#2a2a2a; 
   font-size:20px; 
   font-weight:500; 
   padding:6px 0;
}
.our-webcoderskull .cnt-block h3 a{
  text-decoration:none;
  color:#2a2a2a;
}
.our-webcoderskull .cnt-block h3 a:hover{
  color:#337ab7;
}
.our-webcoderskull .cnt-block p{ 
   color:#2a2a2a; 
   font-size:13px; 
   line-height:20px; 
   font-weight:400;
}
/* Solid border */
hr.solid {
  border-top: 2px solid #bbb;
}
/* Hover pictures 3 */
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
  filter: grayscale(1) blur(3px);
  -webkit-filter: grayscale(1) blur(3px);
  -webkit-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  padding: 10px;
  background: rgba(0, 0, 0, 0.6);
}

.hovereffect a.info {
  display: inline-block;
  text-decoration: none;
  padding: 7px 14px;
  border: 1px solid #fff;
  margin: 50px 0 0 0;
  background-color: transparent;
}

.hovereffect a.info:hover {
  box-shadow: 0 0 5px #fff;
}

.hovereffect a.info, .hovereffect h2 {
  -webkit-transform: scale(0.7);
  -ms-transform: scale(0.7);
  transform: scale(0.7);
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
  opacity: 0;
  filter: alpha(opacity=0);
  color: #fff;
  text-transform: uppercase;
}

.hovereffect:hover a.info, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}
.btn{
    width: 300px;
    height: 60px;
    background-color: #808080;
    color: white;
    cursor: pointer;
}
h4{
  font-family: 'Fredoka One', cursive;
  font-size: 30px;
  text-align: center;
}

    </style>
</head>

<body>
<?php $stafflevel=$_SESSION["stafflevel"];
  //echo "<script>alert($stafflevel);</script>";
  if ($stafflevel == 'Admin') {
    include 'nav_bar.php';
  }elseif ($stafflevel =='Normal Staff') {
    include 'nav_bar2.php';
  } ?>
<div class="title">
 <h1>saleem<br/>rugsville</h1>
 <br><br><br></div>
<div class="title2">
  <?php $stafflevel=$_SESSION["stafflevel"];
  //echo "<script>alert($stafflevel);</script>";
  if ($stafflevel == 'Admin') { ?>
    <a href="http://lrgs.ftsm.ukm.my/users/a175171/mypt4/products.php"><button type="button" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i>  ADD PRODUCTS</button></a>
    <a href="http://lrgs.ftsm.ukm.my/users/a175171/mypt4/search.php"><button type="button" class="btn"><i class="fa fa-search" aria-hidden="true"></i>  SEARCH PRODUCTS</button></a>
  <?php } elseif ($stafflevel =='Normal Staff') { ?>
    <a href="http://lrgs.ftsm.ukm.my/users/a175171/mypt4/orders2.php"><button type="button" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i>  ADD ORDERS</button></a>
    <a href="http://lrgs.ftsm.ukm.my/users/a175171/mypt4/search.php"><button type="button" class="btn"><i class="fa fa-search" aria-hidden="true"></i>  SEARCH PRODUCTS</button></a>
  <?php 
  } ?>
</br></br></br></div>
</div>
 <div class="container">
  <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
    <div class="hovereffect">
      <img src="carpets/coffee.jpg" class="img-responsive">
        <div class="overlay">
          <h2>Carpets</h2>
        </div>
    </div>
  </div>
  <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
    <div class="hovereffect">
      <img src="carpets/rainbiw.jpg" class="img-responsive">
      <div class="overlay">
        <h2>Rugs</h2>
      </div>
    </div>
  </div>
 <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
    <div class="hovereffect">
      <img src="carpets/curtain.jpg" class="img-responsive">
      <div class="overlay">
        <h2>Curtains</h2>
      </div>
    </div>
  </div>
</div>
      
  <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <br></br><h4>THE STORY</h4>
            <br></br>
          </div>
          <div class="col-md-8 col-md-offset-2 col-lg-8" style="padding-bottom: 20px">
                  <p style="text-align: justify; font-size: 15px;">
                  Saleem Guzelgoz started his own simple carpet shop in Cappadocia, Turkey called Le Bazaar d’Orient in 1973. Back then, carpets and rugs weren’t as popular as they are now, but Saleem was a designer at heart and have begun experimenting with rug designs of all shapes, sizes, and colours. Despite the slow growth in his business, he is always passionate and hard-working. Each month, he would bring in and put up quality unique designs for sale; which what makes Le Bazaar d’Orient peaked as the hottest carpet shop among tourists during this time.</p>
                  
                  <p style="text-align: justify; font-size: 15px;">Reaching that popularity, he was finally able to create his own company with the name "Saleem Rugsville" and it expanded internationally, opening outlets in the United Kingdom, Mexico and Jamaica by the mid-1980s. In 1990, he branched out to selling curtains. Since then, Saleem Rugsville have grown into one of the finest carpet shops in the world and the place physically and buy carpet online platform.</p>

                  <p style="text-align: justify; font-size: 15px;">Today, Saleem Rugsville provide the most exquisite hand-knotted and hand-woven rugs and curtains of the highest quality and unique designs. The business has expanded over the years and what was once a simple little carpet shop has grown to three levels of incredible carpet, rug and curtain selection. Our growth has also included expansion to the internet, where we can reach out to people all over the world.</p>

                  
                    <blockquote class="blockquote text-center text-danger">
                    <p style="text-align: justify; font-size: 16px;">"We appreciate our home as much as everyone else do too. Of course we would like to fill them up with beautiful lovely to the eyes to see home products. After all, everyone deserves to feel like royals in their own home.</p>
                    <footer class="blockquote-footer">Saleem Guzelgoz, <cite title="The Greek Way">CEO of Saleem Rugsville</cite></footer>
      </blockquote>
        </div>
      </div>
    </div>

</hr>
<hr>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="our-webcoderskull padding-lg">
  <div class="container">
    <div class="row heading heading-icon">
        <br></br><h4>OUR TEAM</h4>
        <br></br>
    </div>
    <ul class="row">
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 320px;">
            <figure><img src="http://www.ftsm.ukm.my/gambar/akmalaris.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="http://www.webcoderskull.com/">Mr. Akmal Aris </a></h3>
            <p>Senior Staff</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 320px;">
            <figure><img src="http://www.ftsm.ukm.my/gambar/fari.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="#">Ts. Noor Faridatul Ainun Zainal </a></h3>
            <p>Senior Staff</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 320px;">
            <figure><img src="http://www.ftsm.ukm.my/gambar/masura.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="http://www.webcoderskull.com/">Ts. Masura Rahmat </a></h3>
            <p>Administrator</p>
          </div>
       </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 320px;">
            <figure><img src="http://www.ftsm.ukm.my/gambar/jun.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="http://www.webcoderskull.com/">Ms. Junaidah Mohamed Kassim </a></h3>
            <p>Normal Staff</p>
          </div>
      </li>
    </ul>
  </div>
</section></hr>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
</body>
</html>
