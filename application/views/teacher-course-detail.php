
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
				<form id="edit-course-form" class="form-horizontal" role="form">
					<div class="course-area">
						<h3 class="toggle-list" data-toggle="collapse" data-target="#course-toggle">
							Thông tin khóa học
							<span class="icontoggle glyphicon glyphicon-triangle-bottom" style="float:right"></span>
						</h3>

						<div id="course-toggle" class="collapse">
							<input type="hidden" name="course[course_id]" value="<?php echo $course->course_id ?>">
							<div class="form-group">
								<label class="control-label col-sm-2" for="course_name">Tên khóa học: *</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_name" name="course[course_name]" value="<?php echo $course->course_name ?>" required>
								</div>
							</div>					

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_shortDesc">Giới thiệu ngắn:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_shortDesc" name="course[course_shortDesc]" value="<?php echo $course->course_shortDesc ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_desc">Mô tả chi tiết: *</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control" onclick="initCK(this)" name="course[course_desc]" id="course_desc" required><?php echo $course->course_desc ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_why">Lợi ích:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control" onclick="initCK(this)" name="course[course_why]" id="course_why"><?php echo $course->course_why ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_require">Yêu cầu:</label>
								<div class="col-sm-10">
									<textarea rows="10" class="form-control" onclick="initCK(this)" name="course[course_require]" id="course_require"><?php echo $course->course_require ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_totalTime">Tổng thời gian(s): *</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="course[course_totalTime]" id="course_totalTime" value="<?php echo $course->course_totalTime ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_level">Độ khó:</label>
								<div class="col-sm-10">
									<label class="radio-inline"><input class="level-radio" type="radio" name="course[course_level]" value="1">Dễ</label>
									<label class="radio-inline"><input class="level-radio" type="radio" name="course[course_level]" value="2">Cơ bản</label>
									<!-- <label class="radio-inline"><input class="level-radio" type="radio" name="course[course_level]" value="3">Vừa</label> -->
									<label class="radio-inline"><input class="level-radio" type="radio" name="course[course_level]" value="3">Nâng cao</label>
									<!-- <label class="radio-inline"><input class="level-radio" type="radio" name="course[course_level]" value="5">Khó</label> -->
								</div>
							</div>
							<script>
								var value = <?php echo $course->course_level ?>;
								$("input[class=level-radio][value="+value+"]").attr('checked', true);
							</script>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_createAt">Chỉnh sửa lần cuối:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_createAt" name="course[course_createAt]" value="<?php echo $course->course_createAt ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_video">Video giới thiệu:</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" id="course_video" name="course[course_video]" value="<?php echo $course->course_video ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_fee">Giá:</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" id="course_fee" name="course[course_fee]" value="<?php echo $course->course_fee ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="course_cate">Loại khóa học: *</label>
								<div class="col-sm-10">
									<select class="form-control" id="course_cate" name="course[course_cate]">
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
					$currentTopic = 1;
					$currentAbsoluteLesson = 1;
					foreach ((array)$topics as $t) {
						?>
						<input type="hidden" name="topics[<?php echo $currentTopic?>][topic_id]" value="<?php echo $t->topic_id ?>">
						<div class="topic-area" id="topic-area-<?php echo $currentTopic?>">
							<div class="toggle-list" data-toggle="collapse" data-target="#topic-toggle-<?php echo $currentTopic?>" >
								<div class="col-xs-10 nopadding">
									<h3 id="topic_header_<?php echo $currentTopic?>">Topic: <?php echo $t->topic_name ?>
									</h3>
								</div>
								<div class="col-xs-2 icon-glyph">
									<span class="icontoggle glyphicon glyphicon-triangle-bottom" style="float:right"></span>
									<span class="icondelete glyphicon glyphicon-remove-circle" style="float:right" onclick="removeDiv('topic-area-<?php echo $currentTopic?>')"></span>
								</div>
							</div>
							<div style="clear:both"></div>

							<div id="topic-toggle-<?php echo $currentTopic?>" class="collapse">

								<div class="form-group" style="margin-left:40px;margin-right:8px;">
									<label class="control-label col-sm-2" for="topic_name_<?php echo $currentTopic?>">Tên topic: *</label>
									<div class="col-sm-10">
										<input required class="form-control topic_name" type="text" onblur="updateTopicHeader(<?php echo $currentTopic?>)" id="topic_name_<?php echo $currentTopic?>" name="topics[<?php echo $currentTopic?>][topic_name]" value="<?php echo $t->topic_name ?>">
									</div>
								</div>

								<?php
								$currentLesson=1;
								foreach((array)$t->lessons as $l){
									?>
									<input type="hidden" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_id]" value="<?php echo $l->lesson_id ?>">
									<div class="lesson-area" id="lesson-area-<?php echo $currentTopic,"-",$currentLesson?>">
										<div class="toggle-lesson-list" data-toggle="collapse" data-target="#lesson-toggle-<?php echo $currentTopic ,"-", $currentLesson ?>">
											<div class="col-xs-10 nopadding">
												<h4 id="lesson_header_<?php echo $currentTopic ,"_", $currentLesson ?>">Bài học: <?php echo $l->lesson_name ?>
												</h4>
											</div>
											<div class="col-xs-2 icon-glyph">
												<span class="icontoggle glyphicon glyphicon-menu-down" style="float:right"></span>
												<span class="icondelete glyphicon glyphicon-remove-circle" style="float:right" onclick="removeDiv('lesson-area-<?php echo $currentTopic,"-",$currentLesson,"',",$currentAbsoluteLesson?>)"></span>
											</div>
											<div style="clear:both"></div>
										</div>

										<div id="lesson-toggle-<?php echo $currentTopic ,"-", $currentLesson ?>" class="collapse">

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_name_<?php echo $currentTopic,"_",$currentLesson?>">Tên bài học: *</label>
												<div class="col-sm-10">
													<input required class="form-control" type="text" id="lesson_name_<?php echo $currentTopic,"_",$currentLesson?>" onblur="updateLessonHeader(<?php echo $currentTopic,",",$currentLesson?>)" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_name]" value="<?php echo $l->lesson_name ?>">
												</div>
											</div>

											<input type="hidden" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_topicId]" value="<?php echo $l->lesson_topicId ?>">

											<div class="form-group">
												<label class="control-label col-sm-2" for="<?php echo "lesson_desc_", $currentTopic ,"_", $currentLesson ?>" >Giới thiệu:</label>
												<div class="col-sm-10">
													<textarea rows="10" class="form-control" onclick="initCK(this)" id="<?php echo "lesson_desc_", $currentTopic ,"_", $currentLesson ?>" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_desc]"><?php echo $l->lesson_desc ?>
													</textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_video">Link bài học:</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="<?php echo "lesson_video_", $currentTopic ,"_", $currentLesson ?>" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_video]" value="<?php echo $l->lesson_video ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_mate">Tài liệu:</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" id="lesson_mate" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_mate]" value="<?php echo $l->lesson_mate ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_totalTime">Thời gian bài học (s): *</label>
												<div class="col-sm-10">
													<input required  class="form-control" type="number" id="lesson_totalTime" name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_totalTime]" value="<?php echo $l->lesson_totalTime ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="lesson_type">Loại bài học:</label>
												<div class="col-sm-10" >
													<select name="lessons[<?php echo $currentAbsoluteLesson?>][lesson_type]" class="form-control lesson_type" onchange="isVideoDisabled(<?php echo $currentTopic ,",", $currentLesson ?>)" id="<?php echo "lesson_type_", $currentTopic ,"_", $currentLesson ?>">
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
									$currentAbsoluteLesson++;
								}
								if($t->lessons){
									?>
									<div class="add-lesson" id="add-lesson-<?php echo $currentTopic,"-",$currentLesson?>" onclick="addLessonTemplate(<?php echo $currentTopic,",",$currentLesson,",",$l->lesson_topicId?>)">
										<h5>Thêm bài học +</h5>
									</div>
									<?php
								} else {
									?>
									<div class="add-lesson" id="add-lesson-<?php echo $currentTopic,"-",$currentLesson?>" onclick="addLessonTemplate(<?php echo $currentTopic,",",$currentLesson,",",$t->topic_id?>)">
										<h5>Thêm bài học +</h5>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<?php
						$currentTopic++;
					}
					?>
					<div class="add-topic" onclick="addTopicTemplate(this)">
						<h4>Thêm Topic +</h4>
					</div>

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
				$('#left').attr("class", "sideBar-collapse animate");
				$('#right').attr("class","right-expand animate");
				$('.w1').attr("class","w1 hidden");
			}
		});

		function isVideoDisabled(currentTopic, currentLesson){
			var ltype = "lesson_type_"+currentTopic+"_"+currentLesson;
			var lvideo = "lesson_video_"+ltype.substring(12);
			if( $("#"+ltype).val() == 2) {
				$("#"+lvideo).attr("disabled", "disabled");
			} else {
				$("#"+lvideo).removeAttr("disabled");
			}
		}

		$('.toggle-list').click(function(){
			$(this).find('.icontoggle').toggleClass('glyphicon-triangle-bottom  glyphicon-triangle-top');
		});

		$('.toggle-lesson-list').click(function(){
			$(this).find('.icontoggle').toggleClass('glyphicon-menu-down  glyphicon-menu-up');
		});

		// expand all collapsed div to see error (if any)
		$('.submit-btn').click(function(){
			$(".collapse").each(function(){
				$(this).collapse('show');
			});
		});

		$("#edit-course-form").on("submit", function() {
			for(item in CKEDITOR.instances){
				var ck = CKEDITOR.instances[item];
				if (ck) {
					ck.updateElement();
				}
			}

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('course_controller/teacher_edit_course_run')?>',
				data: $(this).serialize(),
				success: function(data){
					// alert(data);
					$('#edit-course-form').html(data);
					alert("Thay đổi đã được lưu lại!");
				}
			});
			return false;
		});

		function initCK(editor){
			console.log(editor);
			CKEDITOR.replace(editor);
		}

		function removeDiv(target, curAbsoluteLesson){
			console.log(target +" "+curAbsoluteLesson);
			if(target.indexOf("topic")!==-1){
				var id = target.substring(11);
				$("#"+target).replaceWith('<input type="hidden" name="topics['+id+'][isDeleted]" value="true">');
			} else if(target.indexOf("lesson")!==-1){
				var id = target.substring(12);
				$("#"+target).replaceWith('<input type="hidden" name="lessons['+curAbsoluteLesson+'][isDeleted]" value="true">');
			}
		}

		var currentTopic = <?php echo $currentTopic?>;
		var currentTopicId = -1;
		var currentAbsoluteLesson = <?php echo $currentAbsoluteLesson?>;

		function addTopicTemplate(el){
			console.log(currentTopic);
			console.log(el);
			var topicTemplate = '\
			<input type="hidden" name="topics['+currentTopic+'][topic_id]" value="'+currentTopicId+'">\
			<div class="topic-area" id="topic-area-'+currentTopic+'">\
				<div class="toggle-list" data-toggle="collapse" data-target="#topic-toggle-'+currentTopic+'" >\
					<div class="col-xs-10 nopadding">\
						<h3 id="topic_header_'+currentTopic+'">Topic: \
						</h3>\
					</div>\
					<div class="col-xs-2 icon-glyph">\
						<span class="icontoggle glyphicon glyphicon-triangle-bottom" style="float:right"></span>\
						<span class="icondelete glyphicon glyphicon-remove-circle" style="float:right" onclick="removeDiv(\'topic-area-'+currentTopic+'\')"></span>\
					</div>\
				</div>\
				<div style="clear:both"></div>\
				\
				<div id="topic-toggle-'+currentTopic+'" class="collapse">\
					\
					<input type="hidden" name="topics['+currentTopic+'][topic_id]" value="'+currentTopicId+'">\
					<div class="form-group" style="margin-left:40px;margin-right:8px;">\
						<label class="control-label col-sm-2" for="topic_name_'+currentTopic+'">Tên topic:</label>\
						<div class="col-sm-10">\
							<input required class="form-control topic_name" type="text" onblur="updateTopicHeader('+currentTopic+')" id="topic_name_'+currentTopic+'" name="topics['+currentTopic+'][topic_name]">\
						</div>\
					</div>\
					<div class="add-lesson" id="add-lesson-'+currentTopic+'-1" onclick="addLessonTemplate('+currentTopic+',1,'+currentTopicId+')">\
						<h5>Thêm bài học +</h5>\
					</div>\
				</div>\
			</div>\
			';

			currentTopic++;
			currentTopicId--;
			$(el).before(topicTemplate);
		};

		$('.topic_name').blur(function(){
			var target = "topic_header_" + this.id.substring(11);
			$("#"+target).text('Topic: ' + $(this).val());
		});

		function updateTopicHeader(id){
			var target = "topic_header_" + id;
			$("#"+target).text('Topic: ' + $("#topic_name_"+id).val());
		}

		function addLessonTemplate(currentTopic, currentLesson, lessonTopicId) {
			console.log(currentTopic+" "+currentLesson +" "+lessonTopicId);
			var nextLesson = currentLesson + 1;
			var lessonTemplate = '\
			<div class="lesson-area" id="lesson-area-'+currentTopic+'-'+currentLesson+'">\
				<div class="toggle-lesson-list" data-toggle="collapse" data-target="#lesson-toggle-'+currentTopic+'-'+currentLesson+'">\
					<div class="col-xs-10 nopadding">\
						<h4 id="lesson_header_'+currentTopic+'_'+currentLesson+'">Bài học: \
						</h4>\
					</div>\
					<div class="col-xs-2 icon-glyph">\
						<span class="icontoggle glyphicon glyphicon-menu-down" style="float:right"></span>\
						<span class="icondelete glyphicon glyphicon-remove-circle" style="float:right" onclick="removeDiv(\'lesson-area-'+currentTopic+'-'+currentLesson+'\','+currentAbsoluteLesson+')"></span>\
					</div>\
					<div style="clear:both"></div>\
				</div>\
				\
				<div id="lesson-toggle-'+currentTopic+'-'+currentLesson+'" class="collapse">\
					<input type="hidden" name="lessons['+currentAbsoluteLesson+'][lesson_id]" value="">\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_name_'+currentTopic+'_'+currentLesson+'">Tên bài học: *</label>\
						<div class="col-sm-10">\
							<input required class="form-control" type="text" id="lesson_name_'+currentTopic+'_'+currentLesson+'" onblur="updateLessonHeader('+currentTopic+','+currentLesson+')" name="lessons['+currentAbsoluteLesson+'][lesson_name]" value="" onblur="">\
						</div>\
					</div>\
					\
					<input type="hidden" name="lessons['+currentAbsoluteLesson+'][lesson_topicId]" value="'+lessonTopicId+'">\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_desc_'+currentTopic+'_'+currentLesson+'" >Giới thiệu:</label>\
						<div class="col-sm-10">\
							<textarea rows="10" class="form-control" onclick="initCK(this)" id="lesson_desc_'+currentTopic+'-'+currentLesson+'" name="lessons['+currentAbsoluteLesson+'][lesson_desc]">\
							</textarea>\
						</div>\
					</div>\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_video">Link bài học:</label>\
						<div class="col-sm-10">\
							<input class="form-control" type="text" id="lesson_video_'+currentTopic+'_'+currentLesson+'" name="lessons['+currentAbsoluteLesson+'][lesson_video]" value="">\
						</div>\
					</div>\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_mate">Tài liệu:</label>\
						<div class="col-sm-10">\
							<input class="form-control" type="text" id="lesson_mate" name="lessons['+currentAbsoluteLesson+'][lesson_mate]" value="">\
						</div>\
					</div>\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_totalTime">Thời gian bài học (s): *</label>\
						<div class="col-sm-10">\
							<input required class="form-control" type="number" id="lesson_totalTime" name="lessons['+currentAbsoluteLesson+'][lesson_totalTime]" value="">\
						</div>\
					</div>\
					\
					<div class="form-group">\
						<label class="control-label col-sm-2" for="lesson_type">Loại bài học:</label>\
						<div class="col-sm-10" >\
							<select name="lessons['+currentAbsoluteLesson+'][lesson_type]" class="form-control lesson_type" onchange="isVideoDisabled('+currentTopic+','+currentLesson+')" id="lesson_type_'+currentTopic+'_'+currentLesson+'">\
								<option value="1">Video</option>\
								<option value="2">Text</option>\
								\
							</select>\
						</div>\
					</div>\
				</div>\
			</div>\
			<div class="add-lesson" id="add-lesson-'+currentTopic+'-'+nextLesson+'" onclick="addLessonTemplate('+currentTopic+','+nextLesson+','+lessonTopicId+')">\
				<h5>Thêm bài học +</h5>\
			</div>\
			';

			// console.log(lessonTemplate);
			currentAbsoluteLesson++;
			$("#add-lesson-"+currentTopic+"-"+currentLesson).replaceWith(lessonTemplate);
		}

		function updateLessonHeader(curTopic, curLesson){
			console.log(curTopic +" "+ curLesson);
			var target = "lesson_header_" + curTopic +"_"+ curLesson;
			$("#"+target).text('Bài học: ' + $("#lesson_name_"+curTopic+"_"+curLesson).val());
			console.log("#lesson_name_"+curTopic+"_"+curLesson);
		}

	</script>
</body>
</html>
