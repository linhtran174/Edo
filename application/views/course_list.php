<?php
	echo '<div id ="Category">
						<h5><span id="title">',$title,'</span></h5>
					</div>';
	if(count($courses) == 0){
		echo '<div class="row info">
					<div class="col-md-4 icon">
							<img class="courseImg" src=',base_url("assets/images/notfound.png"),'>
					</div>
					<div class="col-md-8">
						<p><b>OPPS!! KHÔNG TÌM THẤY KHÓA HỌC </b></p>
					</div>
			  </div>';
	}
	else{
		foreach($courses as $course){
			echo '<div class="row info">
						<div class="col-md-4 icon">
							<img class="courseImg" src=',base_url("assets/images/simple.png"),'>
						</div>
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-8">
							<div>
								<a style ="display: inline-block;" href=',base_url("course_controller/get_course_detail/".$course->course_id),'>',$course->course_name,'</a>
								<span style="float:right;">Trình độ: ',$course->course_level,'</span>
							</div>
							<p>',$course->topic,' TOPICS</p>
							<p>',$course->course_desc,'</p>
							<p>BUILT BY <b>',$course->teacher_name,'</b></p>
						</div>
					</div>';
			// echo "<pre>";
			// print_r($course);
		}
	}
	echo "<div style='display: none;' id='collect'>",$collect,"</div>";
?>
