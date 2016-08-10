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
					<input class="form-control" type="text" id="name" placeholder="tìm kiếm khóa học" onchange="search()"/>
						<!-- <span style="display: hidden; "><input type="submit" name="tên"></span> -->
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
						<p><input type="checkbox" value="0" name="fee" onchange="filter_fee(0);">  Khóa miễn phí</p>
						<p><input type="checkbox" value="1" name="fee" onchange="filter_fee(1);">  Khóa trả phí</p>
						<!-- <input type="submit" class="btn default"> -->
					</div>
					<div style="display: block; position: relative; margin-top:40px" class="properties">
						<h5>SKILL LEVEL</h5>
						<p><input type="checkbox" value="1" name="level">  Mới bắt đầu</p>
						<p><input type="checkbox" value="2" name="level">  Thành thạo</p>
						<p><input type="checkbox" value="3" name="level">  Cao cấp</p>
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
		category = 0;
		var name = null;
		fee = -1;
	 	level = 0;

		url = "<?php echo site_url('course_controller/get_from_view')?>";

			data = {
				"category": category,
				"name": name,
				"fee": fee,
				"level": level
			};
			$('#course').load(url,data, function(){
				// var collection = jQuery.parseJSON(res.collect);
				var collect = JSON.parse($('#collect').html());
				//console.log(collect);
				category = collect['category'];
				name = collect['name'];
				fee = collect['fee'];
				level = collect['level'];

			    // console.log(category);
			});

		function pickCatagory(index){
			category = index;

			data ={
				"category": category,
				"name": name,
				"fee": fee,
				"level": level
			};

			$('#course').load(url, data, function(){
				var collect = JSON.parse($('#collect').html());
				//console.log(collect);
				category = collect['category'];
				name = collect['name'];
				fee = collect['fee'];
				level = collect['level'];
			});
		}


		function search(){
			name = $('#name').val();
			// console.log(name);

			data ={
				"category": category,
				"name": name,
				"fee": fee,
				"level": level
			};

			$('#course').load(url, data, function(){
				var collect = JSON.parse($('#collect').html());
				//console.log(collect);
				category = collect['category'];
				name = collect['name'];
				fee = collect['fee'];
				level = collect['level'];
			});
		}

		function filter_fee(){
			data={
				"category": category,
				"name": name,
				"fee": fee,
				"level": level
			};
			$('#course').load(url, data, function(){
				var collect = JSON.parse($('#collect').html());
				//console.log(collect);
				category = collect['category'];
				name = collect['name'];
				fee = collect['fee'];
				level = collect['level'];
			});
		}
		
		var allRadios1 = document.getElementsByName('fee');
		var allRadios2 = document.getElementsByName('level');
		var booRadio1;
		var booRadio2;

		for(var x = 0; x < allRadios1.length; x++){
			allRadios1[x].onclick = function(){
				if(booRadio1 == this){
					fee = -1;
					filter_fee();
					booRadio1 = null;
				}
				else{
					fee = this.value;
					booRadio1 = this;
					filter_fee();
				}
			}
		}

		for(var x = 0; x < allRadios2.length; x++){
			allRadios2[x].onclick = function(){
				if(booRadio2 == this){
					level = 0;
					filter_fee();
					booRadio2 = null;
				}
				else{
					level = this.value;
					booRadio2 = this;
					filter_fee();
				}
			}
		}
	</script>
</body>
</html>