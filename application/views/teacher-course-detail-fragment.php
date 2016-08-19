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
								<select class="form-control lesson_type" onchange="isVideoDisabled(<?php echo $currentTopic ,",", $currentLesson ?>)" id="<?php echo "lesson_type_", $currentTopic ,"_", $currentLesson ?>">
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