<html>
<head>
	<meta charset='utf-8' />
	<title>Đăng nhập</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href=<?php echo base_url("assets/css/template.css")?>
	type="text/css" />
	<link rel="stylesheet" href=<?php echo base_url("assets/css/studying.css")?>
	type="text/css" />
	<script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>

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
			<p class="w1"><a href="<?php echo site_url("course_controller")?>">
				<span class="glyphicon glyphicon-th-list"></span>

			</a></p>
		</div>
		<div class="logoItem">
			<p class="w1"><a href=<?php echo site_url('my_classroom/setting')?>>
				<span class="glyphicon glyphicon-cog"></span>
			</a></p>
		</div>

		<div class="logoItem bottom">
			<p class="w1"><a href=<?php echo site_url('logout')?>>
				<span class="glyphicon glyphicon-log-out"></span>
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
				<p><a href=',site_url('my_classroom/load_lesson/'.$course->course_id.'/'.$lesson->lesson_id),'>
					Bài ',$j+1,': ',$lesson->lesson_name,'
				</a></p>';
			}
			echo '</div>';

		}
		?>

	</div>
	<div class="topBar">
		<div class="container" style="width:100%">
			<h4 style="margin: 0; padding-top: 30px;"><?php echo $course->course_name?></h4>	
		</div>
	</div> 
	<div class="lessonContent" >
		<div class="container" id="videoContainer" style="width:100%; text-align: center; margin-top:70px">		
			<?php
			//print_r( $active_lesson);
		// 	echo '<iframe id="lessonVideo" class="col-lg-offset-1 col-sm-12 col-lg-10"
		// 	src="',$active_lesson->lesson_video,'">
		// </iframe>'
			?>
		</div>

		<div class="container lessonDesc">
			<p class="title">Video: <?=$active_lesson->lesson_name?></p>
			
			<p class="title">Tài liệu bài học:
				<?php
				if($active_lesson->lesson_mate){
					echo "
					<a href=\"$active_lesson->lesson_mate\">Download
					</a>
					";
				} else echo "Không có."
				?>
			</p>
		</div>
	</div>
</body>


<script type="text/javascript">
	function toggle(list){
		var query = 'list'.concat(list);
		var list = document.getElementById(query);
		list.style.display = list.style.display === 'none' ? '' : 'none';

	}

	// function resizeVideo(){
	// 	console.log("sdfsdf");
	// 	var lessonVideo = document.getElementById("lessonVideo");
	// 	var width = parseInt(lessonVideo.style.width.split("p")[0]);
	// 	var height = width/2;
	// 	lessonVideo.style.height = height.toString().concat("px");
	// 	console.log(lessonVideo.style);
	// }

	function getId(url) {
		var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
		var match = url.match(regExp);

		if (match && match[2].length == 11) {
			return match[2];
		} else {
			return 'error';
		}
	}

	var link = "<?=$active_lesson->lesson_video?>";
	var myId = getId(link);

	$('#videoContainer').html('<iframe height="400" class="col-lg-offset-1 col-sm-12 col-lg-10" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');

</script>

</html>
