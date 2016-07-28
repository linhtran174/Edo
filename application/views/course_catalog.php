<html>
<head>
<meta charset='utf-8' />
<title>Khóa học</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">
	<script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link
	href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese"
	rel="stylesheet">
<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet"
	href=<?php echo base_url("assets/css/course.css")?> type="text/css" />
<link rel="stylesheet"
	href=<?php echo base_url("assets/css/template.css")?> type="text/css" />
</head>
<body>
	<?php $this->load->view('Navbar');?>
	
	<div style="display: block; position: relative" id="content">
		<div class="container">
				<div class="col-md-5">
				<h3 style="margin:0;">Các Khóa học </h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-5">
					<form action="<?php echo base_url('search')?>" method="post" id="search">
						<input class="form-control" type="text" name="name" id="name" value="<?php echo set_value('name')?>" placeholder="tìm kiếm khóa học"/>
						<!-- <span style="display: hidden; "><input type="submit" name="tên"></span> -->
					</form>
				</div>
				<div id="information">
				<div class="col-md-3" id="filter">
					<div style="display: block; position: relative;" class="properties">
						<h5>CATEGORY</h5>
						<p class="cate"><a href="<?php echo base_url('catelog')?>" class="category">All</a></p>
						<p class="cate"><a href="<?php echo base_url('catelog/android')?>" class="category">Android</a></p>
						<p class="cate"><a href="<?php echo base_url('catelog/database')?>" class="category">Database</a></p>
						<p class="cate"><a href="<?php echo base_url('catelog/web')?>" class="category">Web</a></p>
						<p class="cate"><a href="<?php echo base_url('catelog/non-tech')?>" class="category">Non-tech</a></p>
						<p class="cate"><a href="<?php echo base_url('catelog/datascience')?>" class="category">Data Science</a></p>
					</div>
					<div style="display: block; position: relative;" id="line"></div>
					<form action="<?php echo base_url('catelog/filter')?>" method="POST">
					<div style="display: block; position: relative;" class="properties">
						<h5>TYPE</h5>
						<!-- <p><input type="checkbox" class="checkbox">  Khóa ngắn hạn</p> -->
						<p><input type="radio" name="fee[]" value = '0' onchange="this.form.submit()" >  Khóa miễn phí</p>
						<p><input type="radio" name="fee[]" value = '1' onchange="this.form.submit()">  Khóa trả phí</p>
						<!-- <input type="submit" class="btn default"> -->
					</div>
					<div style="display: block; position: relative; margin-top:40px" class="properties">
						<h5>SKILL LEVEL</h5>
						<p><input type="radio"  id="1" name="level[]" value="1" onchange="this.form.submit()">  Mới bắt đầu</p>
						<p><input type="radio"  id="2" name="level[]" value="2" onchange="this.form.submit()">  Thành thạo</p>
						<p><input type="radio"  id="3" name="level[]" value="3" onchange="this.form.submit()">  Cao cấp</p>
						<!-- <input type="submit" class="btn default"> -->
					</div>
					</form>
				</div>
				<div class="col-md-9" id="content-box">
					<div id="Category">
						<h5 id="CategoryName"><?php echo $title?></h5>
					</div>

					<?php foreach ($courses as $course) {
						echo '<div class="row info">
						<div class="col-md-4 icon">
							<img class="courseImg" src=',base_url("assets/images/simple.png"),'>
						</div>
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-8">
							<a style ="display: inline-block;" href=',base_url("course_controller/getCourseDetail/".$course->course_id),'>',$course->course_name,'</a>
							<p>10 PROJECTS</p>
							<p>',$course->course_desc,'</p>
							<p>BUILT BY <b>GOOGLE</b></p>
						</div>
					</div>';
					} ?>
				

				</div>
				</div>
		</div>
	</div>
	
	<?php $this->load->view('footer');?>

	<script type="text/javascript">
		$(function(){
			$('#search').each(function(){
				$('input').keypress(function(e){
					if(e.which == 10 || e.which == 13){
						this.form.submit();
					}
				});
			});
		});
		$(function(){
			$('#level').each(function(e){
				if($('input[type="radio"]').prop("checked") == true){
					document.getElmentById('level').submit();
				}
			});
		});
	</script>
</body>
</html>