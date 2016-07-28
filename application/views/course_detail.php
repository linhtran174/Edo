<?=$course[0]->teacher_fname,' ',$course[0]->teacher_lname?>
<?php var_dump($course) ?>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url("assets/customscrollbar/jquery.mCustomScrollbar.css")?>" />
	<link href="<?=("assets/font-awesome-4.6.3/css/font-awesome.mine.css")?>">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


	<script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- <script src="<?=("assets/font-awesome-4.6.3/fonts/")?>"></script> -->

	<script src="<?php echo base_url("assets/customscrollbar/jquery.mCustomScrollbar.concat.min.js")?>"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/template.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/course-detail.css")?>">
</head>
<body>
	<div id="myNavbar">
		<div class="container" style="position: relative">
			<div class="col-md-3" style="width: 250px;"><a id="logoA" href=""><img src="<?php echo base_url("assets/images/logo.png")?>" style=""></img></a></div>
			<div style=" position:absolute; right:0; top:25px">
				<a class="myNavItem" href="">LỚP HỌC CỦA TÔI</a>
				<a class="myNavItem" href="">CATALOG</a>
				<a class="myNavItem" style="color: orange;" href="">ĐĂNG NHẬP</a>
				<a class="myNavItem" style="color: orange;" href="">ĐĂNG KÝ</a>
			</div>
		</div>
	</div>
	
	<!-- course sort desc -->
	<div class="container nano">
		<div class="head">
			<div class="wrapper">
				<!-- <p class="program">NANODEGREE PROGRAM</p> -->
				<!-- <p class="title">Android Basics Nanodegree program by <span><img src="<?php echo base_url("assets/images/google.png")?>"></span></p> -->

				<p class="title">
					<?=$course[0]->course_name?>
					<br>
					<div class="learn">
						Giảng dạy bởi 
						<a href="#">
							<?=$course[0]->teacher_fname,' ',$course[0]->teacher_lname?>
						</a>
					</div>
				</p>

				<p class="learn"><?=$course[0]->course_shortDesc?></p>
				<div class="video">
					<iframe src="https://www.youtube.com/embed/Bb3qPrsqoMQ" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>
		<div class="col-md-6 left">
			<p class="content"><?=$course[0]->course_desc?></p>
		</div>
		<div class="col-md-6 right">
			<!-- <p class="header title">CO-CREATED BY:</p>
			<div class="authorpic">
				<img src="<?php echo base_url("assets/images/google.png")?>">
			</div>
			<br> -->
			<div class="col-sm-4">
				<p class="header">ĐÁNH GIÁ</p>
				<div style="font-size:18;">
					<?php
					$rate = (int)($course[0]->course_rate);
					// $rate = 8;
					$under = false;
					for($i = 10; $i <= 50; $i+=10){
						if(!$under){
							if($i < $rate){
								echo "<i class=\"fa fa-star rated\"></i>";
							} else {
								$length = ($rate + 10 - $i)*10;
								echo "
								<span class=\"rating\">
									<i class=\"fa fa-star star-under\"></i>
									<i class=\"fa fa-star star-over\" style=\"width:$length%\"></i>
								</span>";
								$under = true;
							}
						} else {
							echo "
							<i class=\"fa fa-star star-under\"></i>
							";
						}
					}
					?>
				</div>
				<p class="allreview">View all reviews (382)</p>
			</div>
			<div class="col-sm-4">
				<!-- <p class="header">TIMELINE<span><img class="helpimg" src="<?php echo base_url("assets/images/help.png")?>"></span></p> -->
				<p class="header">THỜI LƯỢNG VIDEO</p>
				<p class="time">
					<?php
					$init = $course[0]->course_totalTime;
					$hours = floor($init / 3600);
					$minutes = floor(($init / 60) % 60);
					$seconds = $init % 60;
					if($hours > 0){
						echo "$hours giờ ";
					}
					if($minutes > 0){
						echo "$minutes phút ";
					}
					if($seconds > 0){
						echo "$seconds giây";
					}
					?>
				</p>
			</div>
			<div class="col-sm-4">
				<!-- <p class="header">SKILL LEVEL<span><img class="helpimg" src="<?php echo base_url("assets/images/help.png")?>"></span></p> -->
				<p class="header">ĐỘ KHÓ</p>
				<div>
					<?php
					$level = (int)$course[0]->course_level;
					for($i=1;$i<=3;$i++){
						if($i<=$level){
							echo "<img src=\"";
							echo base_url("assets/images/check.png");
							echo "\">";
						} else {
							echo "<img src=\"";
							echo base_url("assets/images/check2.png");
							echo "\">";
						}
					}
					?>
				</div>
			</div>
			<div style="clear:both"></div>

<!-- 			<p class="sal">BASE SALARY: ANDROID DEVELOPER</p>
			<p class="sal-content">$54.4 TO $136K</p>

			<div class="col-sm-6 chart">
				<img style="padding-top:90px;" src="<?php echo base_url("assets/images/paysa.png")?>">	
			</div>
			<div class="col-sm-6 chart">
				<div class="paysa-right">
				</div>
			</div> -->
		</div>

		<div class="col-xs-12 trial">
			<p class="title">Start with a one-week free trial</p>
			<div class="box" >
				<div class="wrapper">
					<p class="program">Nanodegree Program</p>
					<p class="content1">Starting at <span style="color:#0a9d59">$199 USD/ month</span></p>
					<p class="content2">Graduate in 12 months, get a 50% tution refund</p>
					<button type="button" class="btn button-primary">TRY FOR FREE</button>
				</div>
			</div>
			<div style="clear:both"></div>
			<div class="uconnect">
				<div>
					<img src="<?php echo base_url("assets/images/iconmap.png")?>">
					<div>
						<p>Add <span style="color:#0a9d59;text-decoration:underline;">UConnect:</span> Face-to-face learning, now available for all Nanodegree students!
							<br><span style="color:#0a9d59;text-decoration:underline;">Enroll now</span> for a 2 week trial.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end sort desc -->

	<!-- start syllabus -->
	<div class="syllabus">
		<div class="container">
			<div class="col-xs-12">
				<p class="title">Nanodegree Program Syllabus</p>
				<ul class="horizontal-slide">
					<li class="item">
						<div>
							<p class="project">PROJECT</p>
							<p class="projecttitle">Build a Single Screen App</p>
							<p class="projectcontent">Design and implement a simple app that displays information about a small business.</p>
							<p class="support">SUPPORTING COURSES</p>
							<p class="supportcontent"><u>Android Development for Beginners</u></p>
						</div>
					</li>
					<li class="item">
						<div>
							<p class="project">PROJECT</p>
							<p class="projecttitle">Build a Single Screen App</p>
							<p class="projectcontent">Design and implement a simple app that displays information about a small business.</p>
							<p class="support">SUPPORTING COURSES</p>
							<p class="supportcontent"><u>Android Development for Beginners</u></p>
						</div>
					</li>
					<li class="item">
						<div>
							<p class="project">PROJECT</p>
							<p class="projecttitle">Build a Single Screen App</p>
							<p class="projectcontent">Design and implement a simple app that displays information about a small business.</p>
							<p class="support">SUPPORTING COURSES</p>
							<p class="supportcontent"><u>Android Development for Beginners</u></p>
						</div>
					</li>
					<li class="item">
						<div>
							<p class="project">PROJECT</p>
							<p class="projecttitle">Build a Single Screen App</p>
							<p class="projectcontent">Design and implement a simple app that displays information about a small business.</p>
							<p class="support">SUPPORTING COURSES</p>
							<p class="supportcontent"><u>Android Development for Beginners</u></p>
						</div>
					</li>
					<li class="item">
						<div>
							<p class="project">PROJECT</p>
							<p class="projecttitle">Build a Single Screen App</p>
							<p class="projectcontent">Design and implement a simple app that displays information about a small business.</p>
							<p class="support">SUPPORTING COURSES</p>
							<p class="supportcontent"><u>Android Development for Beginners</u></p>
						</div>
					</li>					
				</ul>
			</div>
		</div>
	</div>
	<!-- end syllabus -->

	<!-- start review -->
	<div class="review">
		<div class="container">
			<div class="col-xs-12">
				<div class="heading">
					<p class="title">Student Reviews</p>
					<p class="desc">Latest reviews from our Nanodegree Students</p>
				</div>

				<div class="col-sm-4 item">
					<div class="stats">
						<div class="avg col-xs-offset-3">
							<p class="result">4.9</p>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<p class="total">(328)</p>
						</div>

						<div class="col-xs-12 line">
							<div class="col-xs-3 title">5 STARS</div>
							<div class="col-xs-7 bar" >
								<div class="progress ratingBar" >
									<div class="progress-bar a3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90.9%">
										298
									</div>
								</div>
							</div>
							<div class="col-xs-2 percent">90.9%</div>
						</div>

						<div class="col-xs-12 line">
							<div class="col-xs-3 title">4 STARS</div>
							<div class="col-xs-7 bar" >
								<div class="progress ratingBar" >
									<div class="progress-bar a3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 8%">
										23
									</div>
								</div>
							</div>
							<div class="col-xs-2 percent">90.9%</div>
						</div>

						<div class="col-xs-12 line">
							<div class="col-xs-3 title">3 STARS</div>
							<div class="col-xs-7 bar" >
								<div class="progress ratingBar" >
									<div class="progress-bar a3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
										5
									</div>
								</div>
							</div>
							<div class="col-xs-2 percent">1.5%</div>
						</div>

						<div class="col-xs-12 line">
							<div class="col-xs-3 title">2 STARS</div>
							<div class="col-xs-7 bar" >
								<div class="progress ratingBar" >
									<div class="progress-bar a3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										0
									</div>
								</div>
							</div>
							<div class="col-xs-2 percent">0.0%</div>
						</div>

						<div class="col-xs-12 line">
							<div class="col-xs-3 title">1 STARS</div>
							<div class="col-xs-7 bar" >
								<div class="progress ratingBar" >
									<div class="progress-bar a3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
										2
									</div>
								</div>
							</div>
							<div class="col-xs-2 percent">90.9%</div>
						</div>

					</div>
				</div>

				<div class="col-sm-4 item">
					<div class="card">
						<p class="left">Udacity Student</p>
						<div class="right">
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
						</div>
						<div style="clear:both"></div>
						<p class="content">This is the best online platform I ever try before. Thanks a lot for udacity :)</p>
						<p class="date">Jul 12, 2015</p>
					</div>
				</div>

				<div class="col-sm-4 item">
					<div class="card">
						<p class="left">Udacity Student</p>
						<div class="right">
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
						</div>
						<div style="clear:both"></div>
						<p class="content">This is the best online platform I ever try before. Thanks a lot for udacity :)</p>
						<p class="date">Jul 12, 2015</p>
					</div>
				</div>

				<div class="col-sm-4 item">
					<div class="card">
						<p class="left">Udacity Student</p>
						<div class="right">
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
						</div>
						<div style="clear:both"></div>
						<p class="content">This is the best online platform I ever try before. Thanks a lot for udacity :)</p>
						<p class="date">Jul 12, 2015</p>
					</div>
				</div>

				<div class="col-sm-4 item">
					<div class="card">
						<p class="left">Udacity Student</p>
						<div class="right">
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
						</div>
						<div style="clear:both"></div>
						<p class="content">This is the best online platform I ever try before. Thanks a lot for udacity :)</p>
						<p class="date">Jul 12, 2015</p>
					</div>
				</div>

				<div class="col-sm-4 item">
					<div class="card">
						<p class="left">Udacity Student</p>
						<div class="right">
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
							<span class="glyphicon glyphicon-star myStarRating"></span>
						</div>
						<div style="clear:both"></div>
						<p class="content">This is the best online platform I ever try before. Thanks a lot for udacity :)</p>
						<p class="date">Jul 12, 2015</p>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="leftpage">
					<img src="<?php echo base_url("assets/images/arrowleft.png")?>"/>
					<p>PREVIOUS PAGE</p>					
				</div>

				<div class="rightpage">
					<p>NEXT PAGE</p>	
					<img src="<?php echo base_url("assets/images/arrowright.png")?>">
				</div>
			</div>

		</div>
	</div>
	<!-- end review -->

	<!-- start why -->
	<div class="container why">
		<div class="wrapper">
			<p class="title">Why Take This Nanodegree Program?</p>
			<p class="content">We built this program with Google specifically to support aspiring Android Developers with no programming experience. Our goal is to ensure you get the real-world skills you need to actually start building Android apps. From there, you can hone your skills in our Android Developer Nanodegree program, and you'll have a portfolio of completed projects to highlight your achievements. Android's global reach also allows us to layer social good into the curriculum - you'll build apps that do real and positive work in the world, from preserving a dying Native American language, to monitoring seismic activity.</p>
		</div>

		<ul class="nav nav-tabs col-xs-offset-1 col-xs-10">
			<li class="active col-xs-6"><a data-toggle="tab" href="#home">WHAT DO I GET?</a></li>
			<li class="col-xs-6"><a data-toggle="tab" href="#menu1">WHAT IS NANODEGREE</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="col-sm-offset-1 col-sm-5">
					<div>
						<div class="line" style="margin-top:35px">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">Personalized feedback on projects</p>
							<br>
						</div>

						<div class="line">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">Access to course materials</p>
							<br>
						</div>

						<div class="line">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">Verified Nanodegree Credential</p>
							<br>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div>
						<div class="line" style="margin-top:35px">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">Coach-supported forums</p>
							<br>
						</div>

						<div class="line">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">1:1 appointments with Udacity staff and mentors</p>
							<br>
						</div>

						<div class="line">
							<img src="<?php echo base_url("assets/images/check.png")?>">
							<p style="text-indent: 10px;">Best-in-class courses taught by expert instructors</p>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade col-sm-offset-1 col-sm-10">
				<div style="padding: 30px;line-height: 30px">
					<p>A Nanodegree program is an innovative curriculum path that is outcome-based and career-oriented. Every program has a clear end-goal, and the ideal path to get you there. Courses are built with industry leaders like Google, AT&T, and Facebook, and are taught by leading subject matter experts. Students benefit from personalized mentoring and project-review throughout, and have regular access to instructors and course managers through moderated forums.</p>
					<br>
					<p>Graduates earn an industry-recognized credential and benefit from extensive career support. The ultimate goal of a Nanodegree program is to teach the skills you need, for the career you want, so you can build the life you deserve.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end why -->

	<!-- start android -->
	<div class="container android">
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
							<div class="col-xs-6 nano-left">
								<p class="title">Android Basics Nanodegree program by 
									<span><img src="<?php echo base_url("assets/images/google.png")?>" height="50px"></span>
								</p>
								<p class="content-green">Be in the first 100 to graduate and get a full scholarship from Google and Udacity to the Android Developer Nanodegree program.</p>
								<p class="content">Android apps are everywhere, and learning to build them can be a fantastic career move. No programming experience? No problem! The skills you learn in this beginning Nanodegree program will accelerate your journey to becoming an working Android Developer.</p>

								<button type="button" class="btn button-primary">TRY FOR FREE</button>
							</div>
							<div class="col-xs-6 nano-right">
								<img width="315px" height="340px" src="<?php echo base_url("assets/images/android.png")?>">
							</div>
						</div>

						<div class="item">
							<div class="col-xs-6 nano-left">
								<p class="title">Android Basics Nanodegree program by 
									<span><img src="<?php echo base_url("assets/images/google.png")?>" height="50px"></span>
								</p>
								<p class="content-green">Be in the first 100 to graduate and get a full scholarship from Google and Udacity to the Android Developer Nanodegree program.</p>
								<p class="content">Android apps are everywhere, and learning to build them can be a fantastic career move. No programming experience? No problem! The skills you learn in this beginning Nanodegree program will accelerate your journey to becoming an working Android Developer.</p>

								<button type="button" class="btn button-primary">TRY FOR FREE</button>
							</div>
							<div class="col-xs-6 nano-right">
								<img width="315px" height="340px" src="<?php echo base_url("assets/images/android.png")?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end android -->

	<!-- start story -->
	<div class="story">
		<div class="container">
			<div class="col-xs-12">
				<p class="title">Student Success Story</p>
				<p class="content">"I literally knew nothing about computer science... it gave me a really good foundational base in web development, and I'm excited to puth that to use in the workplace."</p>
				<p class="graduate">NANODEGREE GRADUATE</p>
				<p class="graduatecontent">KELLY MARCHISIO</p>
				<p class="job">Web Solutions Engineer, Google</p>
				<p class="company">OUR NANODEGREE GRADUATES HAVE BEEN HIRED BY INDUSTRY LEADING COMPANIES</p>
				<div class="logo">
					<img src="<?php echo base_url("assets/images/bwcloudera.png")?>">
					<img src="<?php echo base_url("assets/images/bwmongo.png")?>">
					<img src="<?php echo base_url("assets/images/bwgoogle.png")?>">
					<img src="<?php echo base_url("assets/images/bwfacebook.png")?>">
				</div>
			</div>
		</div>
	</div>
	<!-- end story -->

	<!-- start req -->
	<div class="container req">
		<p class="title">Prerequisites and Requirements</p>
		<p class="content col-sm-offset-2 col-sm-8">Entering students should be motivated to learn and be comfortable with basic computer skills like managing files, navigating the Internet and running programs
			<br><br>We will use Android Studio to build our apps, so you should have access to a computer that can run Android Studio in order to follow along (see Android Studio's System Requirements for details). Don’t worry, you do not need to install Android Studio in advance -- we will provide detailed installation instructions as part of the
		</p>
		<div style="clear:both"></div>
		<div class="col-xs-12">
			<p class="titlecourse">FEATURED PREREQUISITE FREE COURSES</p>
			<div class="col-sm-3 box"><p>Android Development for Beginners</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Multi-screen Apps</p></div>
			<div style="clear:both;margin-bottom:40px;"></div>
			<p class="titlecourse">COMING SOON</p>
			<div class="col-sm-3 box"><p>Android Basics: Networking</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
		</div>
	</div>
	<!-- end req -->

	<!-- start program -->
	<div class="program">
		<div class="container">
			<p class="title">Program Leads</p>

			<div class="wrapper">
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">SHANEA KINGROBERSON</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">SHANEA KING-ROBERSON</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 item">
					<div class="group">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
						<p class="name">KATHERINE KUAN</p>
						<p class="work">CURRICULUM DIRECTOR</p>
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<!-- end program -->

	<div class="container last">
		<div class="col-xs-12">
			<p class="title">Start with a one-week free trial.</p>
			<button type="button" class="btn button-primary">START NANODEGREE</button>
			<div class="col-sm-offset-3 col-sm-6 uconnect">
				<div>
					<img src="<?php echo base_url("assets/images/iconmap.png")?>">
					<div>
						<p>Add <span style="color:#0a9d59;text-decoration:underline;">UConnect:</span> Face-to-face learning, now available for all Nanodegree students!
							<br><span style="color:#0a9d59;text-decoration:underline;">Enroll now</span> for a 2 week trial.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="myLinks">
		<div class="container">
			<div style="height: 60px"></div>
			<div style="padding-bottom: 20px"class="col-xs-6 col-md-3">
				<p style="margin:0; font-size:14.5px; font-weight: 500;">TÀI NGUYÊN CHO HỌC VIÊN</p>

				<div style="height: 32px">
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Blog
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Trợ giúp & Hỏi đáp 
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chợ khóa học
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chương trình kết nối cựu học viên
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng Android
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng iOS
					</p>
				</div>
			</div>
			<div style="padding-bottom: 20px"class="col-xs-6 col-md-3">
				<p style="margin:0; font-size:14.5px; font-weight: 500;">TÀI NGUYÊN CHO HỌC VIÊN</p>

				<div style="height: 32px">
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Blog
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Trợ giúp & Hỏi đáp 
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chợ khóa học
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chương trình kết nối cựu học viên
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng Android
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng iOS
					</p>
				</div>
			</div>
			<div style="padding-bottom: 20px"class="col-xs-6 col-md-3">
				<p style="margin:0; font-size:14.5px; font-weight: 500;">TÀI NGUYÊN CHO HỌC VIÊN</p>

				<div style="height: 32px">
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Blog
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Trợ giúp & Hỏi đáp 
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chợ khóa học
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Chương trình kết nối cựu học viên
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng Android
					</p>
				</div>
				<div class="a1Text">
					<div class="dotBullet"></div>
					<p style=" margin-left:18px; position: absolute;">
						Ứng dụng iOS
					</p>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3" style="min-height: 60px">
				<img style="position: absolute; right: 0; top: -30px;" src="<?php echo base_url("assets/images/logo.png")?>"></img>
			</div>
		</div>
	</div>
	<div id="myFooter">
		<div class="container" style="position:relative;">
			<p>OWS - DOANH NGHIỆP KHOA HỌC CÔNG NGHỆ HÀNG ĐẦU THẾ GIỚI</p>
			<img src="<?php echo base_url("assets/images/cards.png")?>"></img>
		</div>
	</div>

	<script>
		(function($){
			$(window).on("load",function(){
				$(".horizontal-slide").mCustomScrollbar({
					axis:"x",
					theme:"edo",
				});
			});
		})(jQuery);
	</script>
</body>
</html>