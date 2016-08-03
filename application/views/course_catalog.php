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
					<form id="search">
						<input class="form-control" type="text" id="name" placeholder="tìm kiếm khóa học"/>
						<!-- <span style="display: hidden; "><input type="submit" name="tên"></span> -->
					</form>
				</div>
				<div id="information">
				<div class="col-md-3" id="filter">
					<div style="display: block; position: relative;" class="properties">
						<h5>CATEGORY</h5>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(0)">All</a></p>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(1)">Android</a></p>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(4)">Database</a></p>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(3)">Web</a></p>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(2)">Non-tech</a></p>
						<p class="cate"><a href="#" class="category" onclick="pickCatagory(5)">Data Science</a></p>
					</div>
					<div style="display: block; position: relative;" id="line"></div>
					<form>
					<div style="display: block; position: relative;" class="properties">
						<h5>TYPE</h5>
						<!-- <p><input type="checkbox" class="checkbox">  Khóa ngắn hạn</p> -->
						<p><input type="checkbox" onchange="filter(0,0)" unchecked="unchecked">  Khóa miễn phí</p>
						<p><input type="checkbox" onchange="filter(1,0)" unchecked="unchecked">  Khóa trả phí</p>
						<!-- <input type="submit" class="btn default"> -->
					</div>
					<div style="display: block; position: relative; margin-top:40px" class="properties">
						<h5>SKILL LEVEL</h5>
						<p><input type="checkbox" onchange="filter(-1,1)" unchecked="unchecked">  Mới bắt đầu</p>
						<p><input type="checkbox" onchange="filter(-1,2)" unchecked="unchecked">  Thành thạo</p>
						<p><input type="checkbox" onchange="filter(-1,3)" unchecked="unchecked">  Cao cấp</p>
						<!-- <input type="submit" class="btn default"> -->
					</div>
					</form>
				</div>
				<div class="col-md-9" id="content-box">
					<span id="course"></span>
				</div>
				</div>
		</div>
	</div>
	
	<?php $this->load->view('footer');?>

	<script type="text/javascript">
		var category;
		var name;
		var bill;
		var lv;
		$(document).ready(function(){
			url = "<?php echo site_url('course_controller/list_course')?>";
			$('#course').load(url,function(res){
			});
		});

		function pickCatagory(index){
		    category = index;
			//console.log(category);
			url = "<?php echo site_url('course_controller/list_course')?>";
			data = {"category" : category};
			$('#course').load(url,data);
		}
		
		$(function(){
			$('#search').each(function(){
				$('input').keypress(function(e){
					if(e.which == 10 || e.which == 13){
						 name = $('#name').val();
						 //console.log(name);
						 url = "<?php echo site_url('course_controller/list_course')?>";
						 data = {"name" : name};
						 $('#course').load(url,data);
					}
				});
			});
		});

		function filter(fee, level){
			bill = fee;
			lv = level;
			data = {"fee" : bill,
					"level": level};
			url = "<?php echo site_url('course_controller/list_course')?>";
			$('#course').load(url,data);
		}
	</script>
</body>
</html>