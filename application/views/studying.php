<html>
<head>
<meta charset='utf-8' />
<title>Đăng nhập</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet"> -->
<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/template.css")?>
	type="text/css" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/studying.css")?>
	type="text/css" />

</head>
<body>
	<div class="sideBar">
		<div class="logoBar">
			<a href="<?php echo site_url('my_classroom') ?>">
			<img  src='<?php echo base_url('assets/images/logo-icon.png') ?>'>
			</a>
		</div>
		<div class="logoItem">
			<p class="w1"><a href="<?php echo site_url('my_classroom') ?>">
			<span class="glyphicon glyphicon-home"></span>
			
			</a></p>
		</div>
		<div class="logoItem">
			<p class="w1"><a href="<?php echo base_url("course_controller")?>">
			<span class="glyphicon glyphicon-th-list"></span>
			
			</a></p>
		</div>
		<div class="logoItem">
		<p class="w1"><a href="">
		<span class="glyphicon glyphicon-cog"></span>
		
		</a></p>
		</div>
	</div>

	<div class="lessonBar">

		<div style="height: 70px; border-bottom:1px solid">
			<p id="courseTitle"><?php echo $course->course_name ?></p>
		</div>
		<div class="col-md-12">
		<p style="padding-top: 15px; font-size: 16px; color:lightgreen">
			CHỦ ĐIỂM
		</p>
		</div>

		<?php 
		foreach ($topics as $i => $topic){
			echo '
			<div onClick="toggle(',$i,')" class="col-md-12 topicCard">
			<p>
			CĐ',$i+1,': ',$topic->topic_name,'
			</p>
			</div>';
			echo '<div id="list',$i,'" class="col-md-12 lessonList">';
			foreach ($topic->lessons as $j => $lesson) {
				echo '
				<p><a href=',base_url('my_classroom/load_lesson/'.$course->course_id.'/'.$lesson->lesson_id),'>
				Bài ',$j+1,': ',$lesson->lesson_name,'
				</a></p>';
			}
			echo '</div>';

		}
		?>

	</div>
	<div class="topBar">
			<div class="container" style="width: 100%">
				<h4 style="margin: 0; padding-top: 30px">Home</h4>	
			</div>
	</div> 
	<div class="lessonContent" >


		<div class="container" style="width:100%; margin-top:70px">		
			


		</div>
		
		
	</div>

</body>


<script type="text/javascript">
	function toggle(list){
		var query = 'list'.concat(list);
		var list = document.getElementById(query);
		list.style.display = list.style.display === 'none' ? '' : 'none';


	}
</script>

</html>
