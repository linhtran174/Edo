<?php
	echo '<div id ="Category">
						<h5><span id="title">',$title,'</span></h5>
					</div>';
	foreach($courses as $course){
			echo '<div class="row info">
						<div class="col-md-4 icon">
							<img class="courseImg" src=',base_url("assets/images/simple.png"),'>
						</div>
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-8">
							<a style ="display: inline-block;" href=',site_url("course_controller/get_course_detail/".$course->course_id),'>',$course->course_name,'</a>
							<p>10 PROJECTS</p>
							<p>',$course->course_desc,'</p>
							<p>BUILT BY <b>GOOGLE</b></p>
						</div>
					</div>';
			// echo "<pre>";
			// print_r($course);
		}
?>