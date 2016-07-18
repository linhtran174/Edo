<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edo</title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" media="screen">
</head>
<body>
	<div class="container-fluid">
		<div class="headernav">
			<div class="container">
				<div class="col-md-7">
					<a href="#"><img src="<?php echo base_url()?>assets/images/logo.png" alt="logo"></a>
				</div>
				<div class="col-md-5">
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
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="container">
							<div class="col-sm-6 nano-left">
								<p class="title">Android Basics Nanodegree program by 
									<span><img src="<?php echo base_url()?>assets/images/google-text.png" height="50px"></span>
								</p>
								<br>
								<p class="content">Android apps are everywhere, and learning to build them can be a fantastic career move. No programming experience? No problem! The skills you learn in this beginning Nanodegree program will accelerate your journey to becoming an working Android Developer.</p>
								<br>
								<p class="content-green">Be in the first 100 to graduate and get a full scholarship from Google and Udacity to the Android Developer Nanodgree program.</p>
								<br><br>
								<button type="button" class="btn btn-primary">TRY FOR FREE</button>
							</div>
							<div class="col-sm-6">
								<img width="100%" height="100%" src="<?php echo base_url()?>assets/images/nano.png">
							</div>
						</div>
					</div>

					<div class="item">
						<div class="container">
							<div class="col-sm-6 nano-left">
								<p class="title">Android Basics Nanodegree program by 
									<span><img src="<?php echo base_url()?>assets/images/google-text.png" height="50px"></span>
								</p>
								<br>
								<p class="content">Android apps are everywhere, and learning to build them can be a fantastic career move. No programming experience? No problem! The skills you learn in this beginning Nanodegree program will accelerate your journey to becoming an working Android Developer.</p>
								<br>
								<p class="content-green">Be in the first 100 to graduate and get a full scholarship from Google and Udacity to the Android Developer Nanodgree program.</p>
								<br><br>
								<button type="button" class="btn btn-primary">TRY FOR FREE</button>
							</div>
							<div class="col-sm-6">
								<img width="100%" height="100%" src="<?php echo base_url()?>assets/images/nano.png">
							</div>
						</div>
					</div>

					<div class="item">
						<div class="container">
							<div class="col-sm-6 nano-left">
								<p class="title">Android Basics Nanodegree program by 
									<span><img src="<?php echo base_url()?>assets/images/google-text.png" height="50px"></span>
								</p>
								<br>
								<p class="content">Android apps are everywhere, and learning to build them can be a fantastic career move. No programming experience? No problem! The skills you learn in this beginning Nanodegree program will accelerate your journey to becoming an working Android Developer.</p>
								<br>
								<p class="content-green">Be in the first 100 to graduate and get a full scholarship from Google and Udacity to the Android Developer Nanodgree program.</p>
								<br><br>
								<button type="button" class="btn btn-primary">TRY FOR FREE</button>
							</div>
							<div class="col-sm-6">
								<img width="100%" height="100%" src="<?php echo base_url()?>assets/images/nano.png">
							</div>
						</div>
					</div>

				</div>

				<!-- Left and right controls -->
				<a class="slide-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="slide-next" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<!-- /.carousel -->

		<div class="container">
			<div>
				<div class="col-md-6">
					<iframe id="ytplayer" type="text/html" width="100%" height="400"
					src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=0&origin=http://example.com"
					frameborder="0"></iframe>
				</div>
				<div class="col-md-6">
					<p class="title">Join for Free</p>
					<form role="form">
						<div class="form-group">
							<div class="col-md-6" style="padding-left: 0">
								<input type="email" class="form-control" id="fname" placeholder="First name">
							</div>
							<div class="col-md-6" style="padding-right: 0">
								<input type="email" class="form-control" id="lname" placeholder="Last name">
							</div>
							<div style="clear:both"></div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-default">JOIN FOR FREE</button>
						<p>By signing an account Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, reiciendis!</p>
					</form>

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
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>