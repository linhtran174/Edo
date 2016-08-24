<html>
<head>
<meta charset='utf-8' />
<title>Trang chủ</title>
	<?php $this->load->view('header'); ?>
	<link rel="stylesheet"
	href=<?php echo base_url("assets/css/Homepage.css")?>/>
</head>
<body>
	<?php $this->load->view('Navbar');?>
	
		<!-- carousel  -->
	<div class="slideshow">
		<div class="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="col-sm-6 nano-left">
							<p class="title">
								Android Basics Nanodegree program by <span><img
									src=<?php echo base_url("assets/images/google.png")?> height="50px"></span>
							</p>
							<p class="content">Android apps are everywhere, and learning to
								build them can be a fantastic career move. No programming
								experience? No problem! The skills you learn in this beginning
								Nanodegree program will accelerate your journey to becoming an
								working Android Developer.</p>
							<p class="content-green">Be in the first 100 to graduate and get
								a full scholarship from Google and Udacity to the Android
								Developer Nanodegree program.</p>
							<button type="button" class="btn button-primary">TRY FOR FREE</button>
						</div>
						<div class="col-sm-6 nano-right">
							<img width="315px" height="340px" src=<?php echo base_url("assets/images/50.png")?>>
						</div>
					</div>

					<div class="item">
						<div class="col-sm-6 nano-left">
							<p class="title">
								Android Basics Nanodegree program by <span><img
									src=<?php echo base_url("assets/images/google.png")?> height="50px"></span>
							</p>
							<p class="content">Android apps are everywhere, and learning to
								build them can be a fantastic career move. No programming
								experience? No problem! The skills you learn in this beginning
								Nanodegree program will accelerate your journey to becoming an
								working Android Developer.</p>
							<p class="content-green">Be in the first 100 to graduate and get
								a full scholarship from Google and Udacity to the Android
								Developer Nanodegree program.</p>
							<button type="button" class="btn button-primary">TRY FOR FREE</button>
						</div>
						<div class="col-sm-6 nano-right">
							<img width="315px" height="340px" src=<?php echo base_url("assets/images/50.png")?>>
						</div>
					</div>

					<!-- Left and right controls -->
					<!-- <a class="slide-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="slide-next" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a> -->
				</div>
			</div>
		</div>
	</div>
	<!-- end carousel -->

	<!-- join for free -->
	<div class="container join">
		<div>
			<div class="col-sm-6 left">
				<!-- <span class="glyphicons glyphicons-play-button"></span> -->
				<p class="text">
					Watch the Android<br>Basics by Google
				</p>

			</div>
			<div class="col-sm-6 right">
				<div class="wrapper">
					<p class="title">Join for Free</p>
					<form action="<?php echo base_url('register_control/index')?>" method="post" role="form">

						<div class="col-md-12 row">
							<div class="col-md-6" style="margin-bottom: 10px">
								<input id="fname" class="form-control" type="text" name="fname" id="fname" value="<?php echo set_value('fname')?>" placeholder="Tên">
									<div class="error" id="fname_error"><?php echo form_error('fname')?></div>
							</div>

							<div class="col-md-6">
								<input id="lname" class="form-control" id="lname" type="text" name="lname" value="<?php echo set_value('lname')?>" placeholder="Họ">
									<div class="error" id="lname_error"><?php echo form_error('lname')?></div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-12 row">
								<input class="form-control" type="text" id="email" name="email" value="<?php echo set_value('email')?>" placeholder="Email">
								<div class="error" id="email_error"><?php echo form_error('email')?></div>	
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-12 row">
								<input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu">
								<div class="error" id="pass_error"><?php echo form_error('password')?></div>
							</div>
						</div>

						<button type="submit" class="btn button-primary">JOIN FOR FREE</button>
						<p class="term">
							By creating an account I consent to Udacity's <u>Terms of Service</u>
							and agree to receiving marketing communications.
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end join for free -->

	<!-- start program -->
	<div class="container program">
		<p class="title">Our Nanodegree program graduates work for amazing
			companies</p>

		<div class="wrapper">
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/woman.png")?> height="100px">
					<p class="name">KELLY</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/google.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/man.png")?> height="100px">
					<p class="name">JON</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/intuit.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/woman.png")?> height="100px">
					<p class="name">KELLY</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/google.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/man.png")?> height="100px">
					<p class="name">JON</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/intuit.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/woman.png")?> height="100px">
					<p class="name">KELLY</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/google.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/man.png")?> height="100px">
					<p class="name">JON</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/intuit.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/woman.png")?> height="100px">
					<p class="name">KELLY</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/google.png")?> height="50px">
				</div>
			</div>
			<div class="col-sm-3 item">
				<div>
					<img class="pic" src=<?php echo base_url("assets/images/man.png")?> height="100px">
					<p class="name">JON</p>
					<p class="work">WORKS FOR:</p>
					<img class="brand" src=<?php echo base_url("assets/images/intuit.png")?> height="50px">
				</div>
			</div>
			<div style="clear: both"></div>
		</div>

		<p class="title" style="margin-bottom: 60px">Discover your path to a
			great career</p>
		<button type="button" class="btn button-primary">VIEW ALL PROGRAMS</button>
	</div>
	<!-- end program -->

	<!-- start freecourse -->
	<div class="freecourse container">
		<div class="col-md-6 left">
			<div class="wrapper">
				<p class="title">Data Analyst Nanodegree Program</p>
				<p class="content">Learn to clean up messy data, uncover patterns
					and insights, make predictions using machine learning and clearly
					communicate critical findings.</p>
				<button type="button" class="btn button-primary">LEARN MORE</button>
			</div>
		</div>

		<div class="col-md-6 right">
			<div class="wrapper">
				<div class="title">
					<img src=<?php echo base_url("assets/images/triangle.png")?>>
					<p>Free Courses</p>
				</div>
				<p class="content">Enhance your skillset and boost your hireability
					through innovative, independent learning.</p>
				<button type="button" class="btn button-default">EXPLORE COURSES</button>
			</div>
		</div>
	</div>
	<!-- end freecourse -->

	<!-- intro -->
	<div class="intro container">
		<div class="col-md-6 left">
			<div class="wrapper">
				<p class="title">Introducing Udacity Connect</p>
				<p class="content">Immerse yourself in face-to-face learning and
					accelerate your success. UConnect brings Udacity to a city near
					your.</p>
				<button type="button" class="btn button-primary">LEARN MORE</button>
			</div>
		</div>

		<div class="col-md-6 right">
			<img src=<?php echo base_url("assets/images/intro.png")?>>
		</div>
	</div>
	<!-- end intro -->

	<?php $this->load->view('footer');?>
</body>
</html>