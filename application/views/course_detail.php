<?php
function printStar($rate){
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
}
// echo '<pre>';
// print_r($course);
// print_r($topics);
// print_r($reviews);
// echo '</pre>';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $course[0]->course_name?></title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url("assets/customscrollbar/jquery.mCustomScrollbar.css")?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome-4.6.3/css/font-awesome.min.css")?>">
	<script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
	<script src="<?php echo base_url("assets/customscrollbar/jquery.mCustomScrollbar.concat.min.js")?>"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/template.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/course-detail.css")?>">
</head>
<body>
	<?php $this->load->view('Navbar');?>
	
	<!-- course sort desc -->
	<div class="container nano">
		<div class="head">
			<div class="wrapper">
				<p class="title">
					<?php echo $course[0]->course_name?>
					<br>
					<div class="learn">
						Giảng dạy bởi 
						<a href="#">
							<?php echo $course[0]->teacher_fname,' ',$course[0]->teacher_lname?>
						</a>
					</div>
				</p>

				<p class="learn"><?php echo $course[0]->course_shortDesc?></p>

				<?php 
				if($course[0]->course_video){
					?>
					<div class="video videoContainer">
						
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="col-md-6 left">
			<p class="content"><?php echo $course[0]->course_desc?></p>
		</div>
		<div class="col-md-6 right">
			<div class="col-xs-4 nopadding">
				<p class="header">ĐÁNH GIÁ</p>
				<div style="font-size:18;">
					<?php
					$rate = (int)($course[0]->course_rate);
					printStar($rate);
					?>
				</div>
				<p class="allreview">
					<?php
					if((int)($course[0]->course_rate) == 0){
						echo "<a>Chưa có đánh giá nào</a>";
					} else {
						echo "
						<a href=\"#reviews\">
							Xem tất cả ($total)
						</a>
						";
					}
					?>
				</p>
			</div>
			<div class="col-xs-4 nopadding">
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
			<div class="col-xs-4 nopadding">

				<p class="header">ĐỘ KHÓ</p>
				<div class="level">
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

			<div style="margin-top: 20px">
				<span class="fa fa-tag"></span>
				<p style="display: inline-block;">Miễn phí</p>
			</div>
			<a type="button" href="
			<?php 
			echo base_url("index.php/my_classroom/load_lesson/{$course[0]->course_id}");
			?>
			" class="btn button-primary" style="display:flex;align-items:center;justify-content:center;">BẮT ĐẦU HỌC NGAY</a>
		</div>
	</div>
	<!-- end sort desc -->

	<!-- start syllabus -->
	<div class="syllabus">
		<div class="container">
			<div class="col-xs-12">
				<p class="title">Giáo trình khóa học</p>
				<ul class="horizontal-slide">
					<?php
					$i = 1;
					foreach ($topics as $t) {
						echo "
						<li class=\"item\" data-toggle=\"modal\" data-target=\"#syllabusModal\" data-topic-id=\"",$t['topic_id'],"\" data-topic-no=\"$i\">
							<div class=\"wrapper\">
								<p class=\"project topic-no-$i\">Phần $i</p>
								<p class=\"projecttitle topic-title-$i\">",$t['topic_name'],"</p>
								<div class=\"projectcontent topic-content-$i\">
									";
									foreach($t['lessons'] as $l){
										echo "
										<i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i>
										<p>&nbsp ",$l->lesson_name,"</p>
										<br><br>
										";
									}
									echo "
								</div>
							</div>
						</li>
						";
						$i++;
					}
					?>
					
					<div id="syllabusModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>

								</div>
								<div class="modal-body">
									<p class="modal-topic-no">Phần x</p>
									<p class="modal-topic-title">
										Tên phần x
									</p>
									
									<div class="modal-topic-content-wrapper">
									</div>
								</div>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>
	<!-- end syllabus -->

	<!-- start review -->
	<div class="review">
		<div class="container">
			<div class="col-xs-12 ajaxload">
				<div class="heading">
					<p class="title" id="reviews">Đánh giá của học viên</p>
					<p class="desc">Những đánh giá mới nhất</p>
				</div>

				<?php
				if((int)($course[0]->course_rate) == 0){
					echo "
					<h4 style=\"text-align:center;\">Hiện khóa học chưa có đánh giá nào</h4>
					";
				} else {
					?>					

					<div class="col-sm-4 item review-wrapper">
						<div class="stats">
							<div class="avg col-md-offset-3 col-sm-offset-1 col-xs-offset-3">
								<?php 
								$rate = (double)($course[0]->course_rate)/10;
								echo "
								<p class=\"result\">$rate</p>
								";
								printStar($rate*10);
								?>								
								<p class="total">(<?php echo $total?>)</p>
							</div>

							<?php
							for($i=5;$i>=1;$i--){
								$curRate = round((double)($avg[$i]/$total*100.0),1);
								echo "
								<div class=\"col-xs-12 line\">
									<div class=\"col-xs-3 title\">$i SAO</div>
									<div class=\"col-xs-6 bar\" >
										<div class=\"progress ratingBar\" >
											<div class=\"progress-bar a3\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $curRate%\">
												$avg[$i]
											</div>
										</div>
									</div>
									<div class=\"col-xs-3 percent\">$curRate%</div>
								</div>
								";
							}
							?>
						</div>
					</div>

					<?php
					$i = 0;
					foreach ($reviews as $r) {
						echo "
						<div class=\"col-sm-4 item\" data-toggle=\"modal\" data-target=\"#reviewModal\" data-review-no=\"$i\">
							<div class=\"card\">
								<div class=\"col-md-7 col-sm-12 nopadding left review-stud-$i\">
									<p>$r->stud_name</p>
								</div>
								<div class=\"col-md-5 col-sm-12 nopadding stars review-star-$i\">
									";
									$rate = $r->review_rate * 10;
								// echo $rate*10;
									printStar($rate);
									echo "
								</div>
								<div style=\"clear:both\"></div>
								<p class=\"content review-content-$i\">$r->review_content</p>
								<p class=\"date review-date-$i\">".date("F j, Y",strtotime($r->review_date)) ."</p>
							</div>
						</div>
						";
						$i++;
					}
					?>

					<div id="reviewModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>

								</div>
								<div class="modal-body">
									<div class="col-sm-9 nopadding modal-student-name" style="padding:0">
										<p>მუხრან ხეთაგური</p>
									</div>
									<div class="col-sm-3 nopadding stars modal-review-star">
									</div>
									<div style="clear:both"></div>

									<div class="modal-content-wrapper">Tôi đang có ý định thành lập công ty riêng, rất cần những kiến thức này. Khoá học thực sự bổ ích. Tôi còn muốn học thêm các vấn đề pháp lý ở công ty cổ phần, không biết có khoá học nào không ?
									</div>
									<div class="modal-review-date">
										July 1, 2016
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php
				}
				?>
			</div>
			
			<?php
			if((int)($course[0]->course_rate) > 0){
				?>
				<div class="col-xs-12">
					<div class="pagi">
						<?php echo $this->pagination->create_links();?>
					</div>
				</div>
				<?php
			}
			?>

			<!-- <div class="col-xs-12">
				<div class="leftpage">
					<img src="<?php echo base_url("assets/images/arrowleft.png")?>"/>
					<p>PREVIOUS PAGE</p>					
				</div>

				<div class="rightpage">
					<p>NEXT PAGE</p>	
					<img src="<?php echo base_url("assets/images/arrowright.png")?>">
				</div>
			</div> -->

		</div>
	</div>
	<!-- end review -->

	<!-- start why -->
	<div class="container why">
		<div class="wrapper">
			<p class="title">Lợi ích từ khóa học</p>
			<p class="content col-sm-offset-1 col-sm-10"><?php echo $course[0]->course_why?></p>
		</div>

		<!-- <ul class="nav nav-tabs col-xs-offset-1 col-xs-10">
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
		</div> -->
	</div>
	<!-- end why -->

	<!-- start android -->
	<!-- <div class="container android">
		<div class="slideshow">
			<div class="container">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
					</ol>

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
	</div> -->
	<!-- end android -->

	<!-- start story -->
	<!-- <div class="story">
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
	</div> -->
	<!-- end story -->

	<!-- start req -->
	<div class="container req">
		<p class="title">Yêu cầu khóa học</p>
		<p class="content col-sm-offset-1 col-sm-10">
			<?php echo $course[0]->course_require?>
		</p>
		<div style="clear:both"></div>
		<!-- <div class="col-xs-12">
			<p class="titlecourse">FEATURED PREREQUISITE FREE COURSES</p>
			<div class="col-sm-3 box"><p>Android Development for Beginners</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Multi-screen Apps</p></div>
			<div style="clear:both;margin-bottom:40px;"></div>
			<p class="titlecourse">COMING SOON</p>
			<div class="col-sm-3 box"><p>Android Basics: Networking</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
			<div class="col-sm-3 box"><p>Android Basics: Data Storage</p></div>
		</div> -->
	</div>
	<!-- end req -->

	<!-- start program -->
	<div class="program">
		<div class="container">
			<p class="title">Giới thiệu về giảng viên</p>

			<div class="col-xs-12 col-sm-10 col-md-8 instructor-col">
				<div class="row">
					<div class="col-xs-12">
						<p class="head">Giảng viên khóa học</p>
					</div>
				</div>

				<div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
						<img class="pic" src="<?php echo base_url("assets/images/elipse.png")?>" height="100px">
					</div>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
						<h3 class="name teacher-name" aria-expanded="false" data-toggle="collapse" href="#teacher-detail" style="cursor:pointer">
							<span class="icontoggle glyphicon glyphicon-chevron-down"></span>
							<a class="teacher-name"><?php echo $course[0]->teacher_fname,' ',$course[0]->teacher_lname?>
							</a>
							<h4 class="job"><?php echo $course[0]->teacher_job?></h4>
						</h3>
						<div id="teacher-detail" class="collapse">
							
							<div class="profile-box" data-toggle-target="hide" style="display: block;">
								<p class="desc"><?php echo $course[0]->teacher_desc?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end program -->

	<!-- <div class="container last">
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
	</div> -->

	<?php $this->load->view('footer');?>
	<script>
		function getId(url) {
			var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
			var match = url.match(regExp);

			if (match && match[2].length == 11) {
				return match[2];
			} else {
				return 'error';
			}
		}

		var link = "<?php echo $course[0]->course_video?>";
		var myId = getId(link);

		$('.videoContainer').html('<iframe width="640" height="360" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');


		$('.teacher-name').click(function(){
			$(this).find(".icontoggle").toggleClass("glyphicon-chevron-down glyphicon-chevron-right")
		});

		(function($){
			$(window).on("load",function(){
				$(".horizontal-slide").mCustomScrollbar({
					axis:"x",
					theme:"edo",
				});
			});
		})(jQuery);

		$(document).ready(function(){
			$("#syllabusModal").on('show.bs.modal', function(e){
				var topicNo = $(e.relatedTarget).data('topic-no');
				console.log("topicNo: " + topicNo);

				// get topic-no-$i and set
				var selectedClass = "topic-no-" + topicNo;
				console.log(selectedClass);
				var tmp = $("."+selectedClass).text();
				$(".modal-topic-no").text(tmp);

				// get topic-title-$i and set
				selectedClass = "topic-title-" + topicNo;
				console.log(selectedClass);
				tmp = $("."+selectedClass).text();
				$(".modal-topic-title").text(tmp);

				// get topic-content-$i and set
				selectedClass = "topic-content-" + topicNo;
				console.log(selectedClass);
				tmp = $("."+selectedClass).html();
				$(".modal-topic-content-wrapper").html(tmp);
			});

			$("#reviewModal").on('show.bs.modal', function(e){
				var reviewNo = $(e.relatedTarget).data('review-no');
				console.log("reviewNo: " + reviewNo);

				// get review-stud-$i and set
				var selectedClass = "review-stud-" + reviewNo;
				console.log(selectedClass);
				var tmp = $("."+selectedClass).html();
				$(".modal-student-name").html(tmp);

				// get review-star-$i and set
				selectedClass = "review-star-" + reviewNo;
				tmp = $("."+selectedClass).html();
				$(".modal-review-star").html(tmp);

				// get review-content-$i and set
				selectedClass = "review-content-" + reviewNo;
				tmp = $("."+selectedClass).html();
				$(".modal-content-wrapper").html(tmp);

				// get review-date-$i and set
				selectedClass = "review-date-" + reviewNo;
				tmp = $("."+selectedClass).html();
				$(".modal-review-date").html(tmp);
			});
		})
	</script>
</body>
</html>