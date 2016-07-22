<html>
<head>
<meta charset='utf-8' />
<title>Khóa học</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">
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
					<form>
						<input class="form-control" type="text" name="nameCourse" placeholder="tên khóa học"/>
						<!-- <span style="display: hidden; "><input type="submit" name="tên"></span> -->
					</form>
				</div>
				<div id="information">
				<div class="col-md-3" id="filter">
					<div style="display: block; position: relative;" class="properties">
						<h5>CATEGORY</h5>
						<a class="category">All</a><br/>
						<a class="category">Android</a><br/>
						<a class="category">Databas</a><br/>
						<a class="category">Web</a><br/>
						<a class="category">Non-tech</a>
					</div>
					<div style="display: block; position: relative;" id="line"></div>
					<div style="display: block; position: relative;" class="properties">
						<h5>TYPE</h5>
						<p><input type="checkbox" class="checkbox">  Khóa ngắn hạn</p>
						<p><input type="checkbox" class="checkbox">  Khóa miễn phí</p>
						<p><input type="checkbox" class="checkbox">  Khóa trả phí</p>
					</div>
					<div style="display: block; position: relative; margin-top:40px" class="properties">
						<h5>SKILL LEVEL</h5>
						<p><input type="checkbox" class="checkbox">  Mới bắt đầu</p>
						<p><input type="checkbox" class="checkbox">  Thành thạo</p>
						<p><input type="checkbox" class="checkbox">  Cao cấp</p>
					</div>
				</div>
				<div class="col-md-9" >
					<div id="Category">
						<h5 id="CategoryName">Android</h5>
					</div>

					<?php foreach ($courses as $course) {
						echo '<div class="row info">
						<div class="col-md-4">
							<img class="courseImg" src=',base_url("assets/images/simple.png"),'>
						</div>
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-8">
							<a>',$course->course_name,'</a>
							<p>10 PROJECTS</p>
							<p>',$course->course_shortDesc,'</p>
							<p>BUILT BY <b>GOOGLE</b></p>
						</div>
					</div>';
					} ?>
				

				</div>
				</div>
		</div>
	</div>
	
	<?php $this->load->view('footer');?>
</body>
</html>