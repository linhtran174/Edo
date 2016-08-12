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

				<div class="col-md-12" style="margin-top:30px; margin-bottom: 20px">
					
					<button id="addCourseBtn" type="button" class="btn btn-primary">Thêm khóa học mới
					</button>
				
				</div>

				<!-- form add course  -->
				<div id ="addCourseDiv" class="collapsed col-md-12" >
					<form id="addCourseForm">
						<input style="width: 100%;" type="text"  name="course_name"placeholder="Ten"><br><br>
						<textarea style="width: 100%;" type="text" name="course_desc"placeholder="gioi thieu"></textarea> <br><br>
						<input style="width: 100%;" type="text" name="course_shortDesc"placeholder="gioi thieu ngan">   <br><br>
						<input style="width: 100%;" type="text" name="course_video"placeholder="link video gioi thieu">  <br><br>
						<input style="width: 100%;" type="text" name="course_totalTime"placeholder="tong thoi gian (giay)">  <br><br>
						<input style="width: 100%;" type="text" name="course_level"placeholder="do kho">  <br><br>
						<input style="width: 100%;" type="text" name="course_fee"placeholder="gia khoa hoc">  <br><br>
						<textarea style="width: 100%;" type="text" name="course_why"placeholder="loi ich khoa hoc"></textarea>  <br><br>
						<textarea style="width: 100%;" type="text" name="course_require"placeholder="yeu cau khoa hoc"></textarea><br><br>				
					</form>
						<button id="submitAddCourseBtn">Gửi yêu cầu</button>
				</div>
				<button id="loadingBar"class="btn btn-lg btn-warning collapsed"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>
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

		
		$('#addCourseBtn').on('click', function(){
			toggleAddCourseBtnState();

			//clear Form
			if($('#addCourseBtn').hasClass('btn-danger'));
				$('#addCourseForm').find("input[type=text], textarea").val("");
		

			//toggle div:
			$('#addCourseDiv').toggleClass('collapsed');
		})


		$('#submitAddCourseBtn').on('click',function(){
			console.log($('#addCourseForm').serialize());

			$('#addCourseDiv').toggleClass('collapsed');
			$.post({
				url: '<?php echo site_url('teacher_controller/add_course') ?>',
				data: $('#addCourseForm').serialize(),
				success: (data, status, jqXHR )=>{
					$('#loadingBar').toggleClass('collapsed');
					alert("Tạo khóa học thành công");
				},
				error: (data, status, jqXHR )=>{
					$('#loadingBar').toggleClass('collapsed');
					alert("Tạo khóa học thất bại, đã có lỗi xảy ra");
				}
			});
			$('#loadingBar').toggleClass('collapsed');
			toggleAddCourseBtnState();
		})

	</script>

	<!-- Linh tre trau's library -->
	<script type="text/javascript">

		function toggleAddCourseBtnState(){
			var $jAddCourseBtn = $('#addCourseBtn');
			if($jAddCourseBtn.hasClass('btn-primary')){
				$jAddCourseBtn.html("Hủy bỏ khóa học");
				$jAddCourseBtn.removeClass('btn-primary');
				$jAddCourseBtn.addClass('btn-danger');
			}
			else if($jAddCourseBtn.hasClass('btn-danger')){
				$jAddCourseBtn.html("Thêm khóa học mới");
				$jAddCourseBtn.addClass('btn-primary');
				$jAddCourseBtn.removeClass('btn-danger');
			}
			console.log($jAddCourseBtn);
		}

	</script>

	<style type="text/css">
		.collapsed{
			display: none;
		}

		.glyphicon-refresh-animate {
		    -animation: spin .7s infinite linear;
		    -webkit-animation: spin2 .7s infinite linear;
		}

		@-webkit-keyframes spin2 {
		    from { -webkit-transform: rotate(0deg);}
		    to { -webkit-transform: rotate(360deg);}
		}

		@keyframes spin {
		    from { transform: scale(1) rotate(0deg);}
		    to { transform: scale(1) rotate(360deg);}
		}
	</style>
</body>
</html>
