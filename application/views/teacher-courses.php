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
				<div id="list-course">
				<?php
				foreach ($courses as $c) {
					?>
					<div class="col-md-12" id="<?php echo $c->course_id;?>">
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
								<form action="<?php echo site_url("course_controller/teacher_edit_course"),"/",$c->course_id;?>">
									<button type="submit" class="btn btn-primary">Chi tiết &nbsp
										<span class="glyphicon glyphicon-eye-open"/>
									</button>
								</form>

								<!--
								<form action="<?php echo site_url("teacher_controller/edit_course"),"/",$c->course_id;?>">
									<button type="submit" class="btn btn-success">Sửa &nbsp
										<span class="glyphicon glyphicon-edit"/>
									</button>
								</form>
								-->

								<div id="delete">
									<button type="submit" style="margin-bottom: 1em;" class="btn btn-danger del-course-btn" onclick="delete_course('<?php echo $c->course_id;?>');">Xóa &nbsp
										<span class="glyphicon glyphicon-trash"/>
									</button>
								</div>
								<?php if($c->course_status == "unpublic"){?>
								<div id="change-status">
									<button style="margin-bottom: 1em;" class="btn btn-default" onclick="change(<?php echo $c->course_id?>);">PUBLIC</button>
								</div>
								<?php }?>
							</div>
							<div style="clear:both"></div>
						</div>
					</div>
					<?php
				}
				?>
				</div>
				<!-- form add course  -->
				<div id ="addCourseDiv" class=" col-md-12" style=" display:none; margin-top: 20px;" >
					<form id="addCourseForm" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="course_name">Tên khóa học: *</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" id="course_name" name="course_name" placeholder="Tên khóa học">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="course_shortDesc">Giới thiệu ngắn:</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" id="course_shortDesc" name="course_shortDesc" placeholder="Tóm tắt">
							</div>
						</div>

						<div class="form-group">
								<label class="control-label col-sm-2" for="course_desc">Mô tả chi tiết: *</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_desc" id="course_desc" placeholder="Mô tả"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_why">Lợi ích:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_why" id="course_why" placeholder="Lợi ích"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_require">Yêu cầu:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_require" id="course_require" placeholder="Yêu cầu"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_totalTime">Tổng thời gian(s): *</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="course_totalTime" id="course_totalTime" placeholder="Tổng thời gian">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_level">Độ khó:</label>
								<div class="col-sm-10">
									<label class="radio-inline"><input type="radio" name="course_level" value="1">Dễ</label>
									<label class="radio-inline"><input type="radio" name="course_level" value="2">Cơ bản</label>
									<label class="radio-inline"><input type="radio" name="course_level" value="3">Vừa</label>
									<label class="radio-inline"><input type="radio" name="course_level" value="4">Nâng cao</label>
									<label class="radio-inline"><input type="radio" name="course_level" value="5">Khó</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="course_video">Video giới thiệu:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_video" name="course_video">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_fee">Giá:</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" id="course_fee" name="course_fee" placeholder="Giá">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_cate">Loại khóa học: *</label>
								<div class="col-sm-10">
									<select class="form-control" id="course_cate">
										<?php
										foreach ($categories as $c) {
											if($course->course_cate == $c->cate_id){
												echo "
												<option selected value=\"$c->cate_id\">$c->cate_name</option>
												";
											} else {

												echo "
												<option value=\"$c->cate_id\">$c->cate_name</option>
												";
											}
										}								
										?>
									</select>
								</div>
							</div>
					</form>
						<button id="submitAddCourseBtn">Gửi yêu cầu</button>
				</div>
				<button id="loadingBar" style ="display:none" class="btn btn-lg btn-warning "><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>

				<div class="col-md-12" style="margin-top:30px; margin-bottom: 20px">
					
					<button id="addCourseBtn" type="button" class="btn btn-primary">Thêm khóa học mới
					</button>
				
				</div>
				<div class="col-md-12" style="border: 1px solid black; padding-bottom: 30px; margin-bottom: 30px;">
				<h4> Dịch vụ upload video lên thẳng server của OWS. Nhanh khủng khiếp!!</h4>
				<form id="uploadVideoForm" enctype="multipart/form-data">
					<input type="file" name="fileToUpload" id="fileToUpload"></input>
				</form>
				    
				<button style=" margin-bottom: 20px;"id="uploadVideoBtn" class="btn btn-primary">
					Upload ngay!!
				</button><br>
				<button id="loadingBar2" style ="display:none" class="btn btn-lg btn-warning "><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Đang upload, chờ tí...</button>
				</div>


			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('#uploadVideoBtn').on('click', function(){
		$('#loadingBar2').toggle();
		var formData = new FormData();
		formData.append("fileToUpload", $('#fileToUpload')[0].files[0]);

		var request = new XMLHttpRequest();
		var base_url = "<?php echo base_url()?>";
		request.open("POST",base_url + "upload.php");
		request.send(formData);

		request.onload = function (){
			if(request.status == 200){
				var notification = '<div class="col-md-12"><p>Up xong rồi, link đây: </p><input style="width: 100%" type="text" value="'+request.responseText.replace("File uploaded at:","")+'"> </div>';
				$('#uploadVideoBtn').after(notification);
				$('#loadingBar2').toggle();
			}
			else{
				console.log("upload is failed!!");	
			}
		}
	});

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
			$('#addCourseDiv').toggle();
		});


		$('#submitAddCourseBtn').on('click',function(){
			console.log($('#addCourseForm').serialize());

			$('#addCourseDiv').toggle();
			$.post({
				url: '<?php echo site_url('course_controller/teacher_add_course') ?>',
				data: $('#addCourseForm').serialize(),
				success: (data, status, jqXHR )=>{
					$('#loadingBar').toggle();
					alert("Tạo khóa học thành công");
					location.reload();
				},
				error: (data, status, jqXHR )=>{
					$('#loadingBar').toggle();
					alert("Tạo khóa học thất bại, đã có lỗi xảy ra");
				}
			});
			$('#loadingBar').toggle();
			toggleAddCourseBtnState();
		});

		// function delete(id){
		// 	console.log(id);
		// }
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

	<!-- helper -->
	<script type="text/javascript">
		function toggleAddCourseBtnState(){
			var $jAddCourseBtn = $('#addCourseBtn');
			if($jAddCourseBtn.hasClass('btn-primary')){
				$('#list-course').fadeOut('fast');
				$jAddCourseBtn.html("Hủy bỏ khóa học");
				$jAddCourseBtn.removeClass('btn-primary');
				$jAddCourseBtn.addClass('btn-danger');
			}
			else if($jAddCourseBtn.hasClass('btn-danger')){
				$('#list-course').fadeIn();
				$jAddCourseBtn.html("Thêm khóa học mới");
				$jAddCourseBtn.addClass('btn-primary');
				$jAddCourseBtn.removeClass('btn-danger');
			}
			console.log($jAddCourseBtn);
		}


		function delete_course(id){
			//console.log(id);
			url = "<?php echo site_url('course_controller/teacher_delete_course'); ?>";
			data = {"id": id};
			// $.post(url, data, function(data, status){
			// 	console.log(status);
			// });
			$.ajax({
				url: url,
				type: 'post',
				data: data,
				success: function(data, textStatus, jQxhr){
					console.log("success");
					$('#'+id).fadeOut();
				},
				error: function(jQxhr, textStatus, errorThrown){
					console.log(errorThrown);
				}
			});
		}

		function change(id){
			url = "<?php echo site_url('course_controller/public_course'); ?>";
			data = {'id' : id};
			//console.log(id);
			$.ajax({
				url: url,
				type: "post",
				data: data,
				success: function(data, textStatus, jQxhr){
					console.log("success");
					location.reload();
				},
				error: function(jQxhr, textStatus, errorThrown){
					console.log(errorThrown);
				}
			});
		}
	</script>

</body>
</html>
