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
	<link rel="stylesheet" href=<?php echo base_url("assets/css/teacher-course-detail.css")?>
	type="text/css" />
	<script src="<?php echo base_url("assets/ckeditor/ckeditor.js") ?>"></script>
</head>
<body>
	<div class="wrapper">
		<div class="sideBar-expand animate" id="left">
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

		<div class="right-collapse animate" id="right">
			<div class="fixed-bar">
				<div class="header-wrapper">
					<span class="glyphicon glyphicon-menu-hamburger menu-btn" id="trig"></span>
					<h4>&nbsp &nbsp &nbsp &nbsp Khóa học của tôi</h4> 
				</div>
			</div>

			<div class="container-fluid right-content">
				<form class="form-horizontal" role="form">
					<div class="course-area">
						<h3 class="toggle-list" data-toggle="collapse" data-target="#course-toggle">
							Thông tin khóa học
							<span class="icontoggle glyphicon glyphicon-triangle-bottom" style="float:right"></span>
						</h3>

						<div id="course-toggle" class="collapse">
							<input type="hidden" name="course_id" value="<?php echo $course->course_id ?>">
							<div class="form-group">
								<label class="control-label col-sm-2" for="course_name">Tên khóa học: *</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_name" name="course_name" value="<?php echo $course->course_name ?>">
								</div>
							</div>					

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_shortDesc">Giới thiệu ngắn:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_shortDesc" name="course_shortDesc" value="<?php echo $course->course_shortDesc ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_desc">Mô tả chi tiết: *</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_desc" id="course_desc"><?php echo $course->course_desc ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_why">Lợi ích:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_why" id="course_why"><?php echo $course->course_why ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_require">Yêu cầu:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control myck" name="course_require" id="course_require"><?php echo $course->course_require ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_totalTime">Tổng thời gian(s): *</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="course_totalTime" id="course_totalTime" value="<?php echo $course->course_totalTime ?>">
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
							<script>
								var value = <?php echo $course->course_level ?>;
								$("input[name=course_level][value="+value+"]").attr('checked', true);
							</script>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_createAt">Chỉnh sửa lần cuối:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_createAt" name="course_createAt" value="<?php echo $course->course_createAt ?>" disabled>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_video">Video giới thiệu:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_video" name="course_video" value="<?php echo $course->course_video ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_fee">Giá:</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" id="course_fee" name="course_fee" value="<?php echo $course->course_fee ?>">
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
						</div>
					</div>
					<!-- end course information  -->

					<?php
					$currentTopic = 0;
					foreach ($topics as $t) {
						?>
						<div class="topic-area">
							<h3 class="toggle-list" data-toggle="collapse" data-target="#topic-toggle-<?php echo $currentTopic?>">Topic <?php echo $currentTopic+1?>
								<span class="icontoggle glyphicon glyphicon-triangle-bottom" style="float:right"></span>
							</h3>

							<div id="topic-toggle-<?php echo $currentTopic?>" class="collapse">

								<input type="hidden" name="topic_id" value="<?php echo $t->topic_id ?>">
								<div class="form-group" style="margin-left:40px;margin-right:8px;">
									<label class="control-label col-sm-2" for="topic_name">Tên topic:</label>
									<div class="col-sm-10">
										<input class="form-control" type="text" id="topic_name" name="topic_name" value="<?php echo $t->topic_name ?>">
									</div>
								</div>

								<?php
								$currentLesson=0;
								foreach($t->lessons as $l){
									?>
									<div class="lesson-area">
										<h4 class="toggle-lesson-list" data-toggle="collapse" data-target="#lesson-toggle-<?php echo $currentTopic ,"-", $currentLesson ?>">Bài <?php echo $currentLesson+1?>
											<span class="icontoggle glyphicon glyphicon-menu-down" style="float:right"></span>
										</h4>

										<div id="lesson-toggle-<?php echo $currentTopic ,"-", $currentLesson ?>" class="collapse">
											<input type="hidden" name="lesson_id" value="<?php echo $l->lesson_id ?>">

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_name">Tên bài học:</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="lesson_name" name="lesson_name" value="<?php echo $l->lesson_name ?>">
												</div>
											</div>

											<input type="hidden" name="lesson_topicId" value="<?php echo $l->lesson_topicId ?>">

											<div class="form-group">
												<label class="control-label col-sm-2" for="<?php echo "lesson_desc_", $currentTopic ,"_", $currentLesson ?>" >Giới thiệu:</label>
												<div class="col-sm-10">
													<textarea rows="10" class="form-control myck" id="<?php echo "lesson_desc_", $currentTopic ,"_", $currentLesson ?>" name="lesson_desc"><?php echo $l->lesson_desc ?>
													</textarea>
													<script>

													</script>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_video">Link bài học:</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="<?php echo "lesson_video_", $currentTopic ,"_", $currentLesson ?>" name="lesson_video" value="<?php echo $l->lesson_video ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_mate">Tài liệu:</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="lesson_mate" name="lesson_mate" value="<?php echo $l->lesson_mate ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_totalTime">Thời gian bài học (s): *</label>
												<div class="col-sm-10">
													<input class="form-control" type="number" id="lesson_totalTime" name="lesson_totalTime" value="<?php echo $l->lesson_totalTime ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_type">Loại bài học:</label>
												<div class="col-sm-10" >
													<select class="form-control lesson_type" id="<?php echo "lesson_type_", $currentTopic ,"_", $currentLesson ?>">
														<option value="1">Video</option>
														<option value="2">Text</option>

													</select>
												</div>
												<script>
													var value = <?php echo $l->lesson_type ?>;
													var ltypexx = "<?php echo "lesson_type_", $currentTopic ,"_", $currentLesson ?>";
													var lvideoxx = "<?php echo "lesson_video_", $currentTopic ,"_", $currentLesson ?>";

													$("#"+ltypexx).val(value);

													if( $("#"+ltypexx).val() == 2) {
														$("#"+lvideoxx).prop('disabled', true);
													}
													else {
														$("#"+lvideoxx).prop('disabled', false);
													};
												</script>
											</div>
										</div>
									</div>
									<?php
									$currentLesson++;
								}
								?>
							</div>
						</div>
						<?php
						$currentTopic++;
					}
					?>
						<div class="submit-btn">
							<button type="submit" class="btn btn-success">Lưu thay đổi</button>
						</div>
				</form>				
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

		$(".lesson_type").on('change', function(e){
			var ltypexx = this.id;
			var lvideoxx = "lesson_video_" + ltypexx.substring(12);

			if( $(this).val() == 2) {
				$("#"+lvideoxx).attr('disabled', 'disabled');
			}
			else {
				$("#"+lvideoxx).removeAttr('disabled');
			}
		});

		$('.toggle-list').click(function(){
			$(this).find('.icontoggle').toggleClass('glyphicon-triangle-bottom  glyphicon-triangle-top');
		});

		$('.toggle-lesson-list').click(function(){
			$(this).find('.icontoggle').toggleClass('glyphicon-menu-down  glyphicon-menu-up');
		});

		

		$('.myck').click(function(){
			editor = CKEDITOR.replace(this);
			// editor.on('blur', function(e){
			// 	var okToDestroy = false;

			// 	if (e.editor.checkDirty()) {
   //     				 get data with e.editor.getData() and do some ajax magic
   //     				okToDestroy = true;
   //     			} else {
   //     				okToDestroy = true;
   //     			}

   //     			if (okToDestroy ){
   //     				e.editor.destroy();
   //     				// alert("destroyed");
   //     			}
   //     		})
})

		// $(function(){
		// 	$('.myck').each(function(){
		// 		CKEDITOR.replace( $(this).attr('id') );
		// 	})
		// });

		// for(item in CKEDITOR.instances){
		// 	var mycks = Object.keys(CKEDITOR.instances);
		// 	var item = CKEDITOR.instances[mycks[item]];
		// 	if (item) {
		// 		item.on('focus', function (event) {
		// 			showToolBarDiv(event);
		// 		});

		// 		item.on('blur', function (event) {
		// 			hideToolBarDiv(event);
		// 		});
		// 	}
		// }

		// function showToolBarDiv( event )
		// {
		// 	$('#'+event.editor.id+'_top').show();
		// 	$('#'+event.editor.id+'_bottom').show();
		// }

		// function hideToolBarDiv( event )
		// {
		// 	$('#'+event.editor.id+'_top').hide();
		// 	$('#'+event.editor.id+'_bottom').hide();
		// }



	</script>
</body>
</html>
