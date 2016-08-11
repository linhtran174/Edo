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
// print_r($courses[0])
?>
<html>
<head>
	<meta charset='utf-8' />
	<title>Giáo viên</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url("assets/font-awesome-4.6.3/css/font-awesome.min.css")?>">
	<script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/template.css")?>">
	<link rel="stylesheet" href=<?php echo base_url("assets/css/teacher-courses.css")?>
	type="text/css" />

</head>
<body>
	<div class="wrapper">
		<div class="sideBar-expand" id="left">
			<div class="logoBar">
				<img src="<?php echo base_url("assets/images/logo.png") ?>">
			</div>
			<div class="logoItem">
				<span class="glyphicon glyphicon-home icon"> </span>
				<p class="w1"><a href="<?php echo site_url('teacher_controller') ?>">
					Trang chủ
				</a></p>
			</div>
			<div class="logoItem" style="background: #42516E;">
				<span class="glyphicon glyphicon-th-list icon"> </span>
				<p class="w1"><a href=<?php echo site_url("teacher_controller/my_courses")?>>
					Khóa học của tôi
				</a></p>
			</div>
			<div class="logoItem">
				<span class="glyphicon glyphicon-cog icon"></span>
				<p class="w1"><a href=<?php echo site_url("teacher_controller/setting")?>>
					Cài đặt
				</a></p>
			</div>
			<div class="logoItem bottom">
				<span class="glyphicon glyphicon-log-out icon"></span>
				<p class="w1"><a href=<?php echo site_url('teacher_controller/logout');?>>
					Đăng xuất
				</a></p>
			</div>
		</div>

		<div class="right-collapse" id="right">
			<div class="fixed-bar">
				<div class="header-wrapper">
					<span class="glyphicon glyphicon-menu-hamburger menu-btn" id="trig"></span>
					<h4>&nbsp &nbsp &nbsp &nbsp Khóa học của tôi</h4> 
				</div>
			</div>

			<div id="mainContent" class="container-fluid right-content">
				<div class="col-md-12" style="margin-top:30px;">
					<a href="<?php echo site_url("teacher_controller/add_course")?>">
						<button id="addCourse" type="button" class="btn btn-primary">Thêm khóa học mới
						</button>
					</a>				
				</div>
				<?php
				foreach ($courses as $c) {
					?>
					<div class="col-md-12">
						<div class="courseCard">
							<div class="col-sm-7 col-lg-8">
								<p class="course-name"><?php echo $c->course_name?>
								</p>
								<?php
								if($c->course_level == 1){
									echo "<p class=\"col-xs-2 nopadding course-desc\">Dễ</p>";

								} else if($c->course_level == 2){
									echo "<p class=\"col-xs-3 nopadding course-desc\">Trung bình</p>";

								} else if($c->course_level == 3) {
									echo "<p class=\"col-xs-3 nopadding course-desc\">Khó</p>";
								}
								?>
								<p class="col-sm-4 nopadding course-desc ">
									<?php echo date("F j, Y",strtotime($c->course_createAt))?>								
								</p>
								<p class="col-sm-3 nopadding course-desc ">
									<?php
									$init = $c->course_totalTime;
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
								<div class="col-sm-3 nopadding course-desc align-right">
									<?php
									$rate = (int)($c->course_rate);
									printStar($rate);
									?>
								</div>
							</div>

							<div class="col-xs-5 col-lg-4 buttons">
								<form action="<?php echo site_url("teacher_controller/view_course"),"/",$c->course_id;?>">
									<button type="submit" class="btn btn-primary">Xem &nbsp
										<span class="glyphicon glyphicon-eye-open"/>
									</button>
								</form>

								<form action="<?php echo site_url("teacher_controller/edit_course"),"/",$c->course_id;?>">
									<button type="submit" class="btn btn-success">Sửa &nbsp
										<span class="glyphicon glyphicon-edit"/>
									</button>
								</form>

								<form action="<?php echo site_url("teacher_controller/delete_course"),"/",$c->course_id;?>">
									<button type="submit" class="btn btn-danger">Xóa &nbsp
										<span class="glyphicon glyphicon-trash"/>
									</button>
								</form>
							</div>
							<div style="clear:both"></div>
						</div>
					</div>
					<?php
				}
				?>
				sdjsdklds, sdlfj, sdklj
				
				<!-- form add course  -->
				<div class="col-md-12" >
					<form id ="addCourse">
						<input type="text" placeholder="Ten">
						<input type="text" placeholder="gioi thieu"> 
						<input type="text" placeholder="gioi thieu ngan">   
						<input type="text" placeholder="video gioi thieu">  
						<input type="text" placeholder="tong thoi gian ">  
						<input type="text" placeholder="do kho">  
						<input type="text" placeholder="gia khoa hoc">  
						<input type="text" placeholder="loi ich khoa hoc">  
						<input type="text" placeholder="yeu cau khoa hoc">
						  
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#trig').on('click', function () {
			$('#left').toggleClass("sideBar-expand sideBar-collapse");
			$('#right').toggleClass("right-collapse right-expand");
			$('.w1').toggleClass("hidden");
		});

		$(window).resize(function() {
			if ($(window).width() < 992) {
				$('#left').attr("class", "sideBar-collapse");
				$('#right').attr("class","right-expand");
				$('.w1').attr("class","w1 hidden");
			}
		});

		$('#addCourse').on('click', function(){
			loadForm();

		})

	</script>

	<!-- Linh tre trau's library -->
	<script type="text/javascript">
		function loadForm(){
			//clear box

			var aBox = $('mainContent').append('<div')
		}

	</script>
</body>
</html>
