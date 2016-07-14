<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edo</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">
</head>
<body>
	<div class="container-fluid">
		<div class="headernav">
			<div class="container">
				<div class="col-md-8">
					<a href="#"><img src="assets/images/logo.png" alt="logo"></a>
				</div>
				<div class="col-md-4">
					<div class="col-md-3 item" id="home"><a href="#">HOMEPAGE</a></div>
					<div class="col-md-3 item" id="catalog"><a href="#">CATALOG</a></div>
					<div class="col-md-3 item" id="signin"><a href="#">SIGN IN</a></div>
					<div class="col-md-3 item" id="signup"><a href="#">SIGN UP</a></div>
				</div>
			</div>
		</div>


		<!-- Carousel -->
		<div class="container-fluid">
			<br>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

					<div class="item active">
						<!-- <img src="assets/images/img_chania.jpg" alt="Chania" width="460" height="345"> -->
						<div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
					</div>

					<div class="item">
						<!-- <img src="assets/images/img_chania2.jpg" alt="Chania" width="460" height="345"> -->
						<div class="carousel-caption">
							<h3>Chania</h3>
							<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
						</div>
					</div>

					<div class="item">
						<!-- <img src="assets/images/img_flower.jpg" alt="Flower" width="460" height="345"> -->
						<div class="carousel-caption">
							<h3>Flowers</h3>
							<p>Beatiful flowers in Kolymbari, Crete.</p>
						</div>
					</div>

					<div class="item">
						<!-- <img src="assets/images/img_flower2.jpg" alt="Flower" width="460" height="345"> -->
						<div class="carousel-caption">
							<h3>Flowers</h3>
							<p>Beatiful flowers in Kolymbari, Crete.</p>
						</div>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<!-- /.carousel -->

		<div class="container">
			<div>
				<div class="col-md-6">
					<img src="assets/images/500.svg">
				</div>
				<div class="col-md-6">
					register
				</div>
			</div>
		</div>

		<br><br><br>

		<!-- start program -->
		<div class="container program">
			<p>Our Nanodegree program graduates work for amazing companies</p>

			<div class="col-md-3">

			</div>
			<div class="col-md-3">

			</div>
			<div class="col-md-3">

			</div>
			<div class="col-md-3">

			</div>
		</div>
		<!-- end program -->

	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>