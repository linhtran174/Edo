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
<link rel="stylesheet" href=<?php echo base_url("assets/css/myClassroom.css")?>
	type="text/css" />

</head>
<body>
	<div class="sideBar">
		<div class="logoBar">
			<img style="padding-left: 20px" src="<?php echo base_url("assets/images/logo.png") ?>">
		</div>
		<div class="logoItem">
			<p class="w1"><a href="<?php echo site_url('my_classroom') ?>">
			<span class="glyphicon glyphicon-home"> </span>
			Trang chủ
			</a></p>
		</div>
		<div class="logoItem">
			<p class="w1"><a href="<?php echo site_url("course_controller")?>">
			<span class="glyphicon glyphicon-th-list"> </span>
			Chợ khóa học
			</a></p>
		</div>
		<div class="logoItem">
			<p class="w1"><a href="">
			<span class="glyphicon glyphicon-cog"></span>
			Cài đặt
			</a></p>
		</div>
		<div class="logoItem bottom">
			<p class="w1"><a href=<?php echo site_url('logout');?>>
			<span class="glyphicon glyphicon-log-out"></span>
			Đăng xuất
			</a></p>
		</div>
	</div>

	<div style="margin-left: 260px;" >
		<div style="width: 100%; position:fixed; top:0; left:260; background-color: white; z-index:10; height: 70px; box-shadow: 0px 0.5px 10px #c1c1c1;">
			<div class="container" style="width: 100%">
				<h4 style="margin: 0; padding-top: 30px">Cài đặt</h4>	
			</div>
		</div> 

		<div class="container" style="width:100%; margin-top:70px">	
			<div style="height: 40px"></div>
			<div class="col-sm-3">
			<div class="col-sm-12 formNav">
				<p style="font-weight: 500">TÀI KHOẢN</p>
				<a onclick="loadForm(1)">
					Thông tin cá nhân
				</a><br><br>
				<a onclick="loadForm(2)">
					Mật khẩu
				</a>
			</div>
			</div>
			<div class="col-sm-9 col-md-6">
				<form id="form1" action=<?php echo site_url('account/change_stud_info')?>>
					<div class="col-sm-12">
					<p style="font-weight: 500">Thông tin cá nhân</p>
					</div>
					<div class="col-md-12 settingForm">
						<input type="text" name="stud_fname" value=<?php echo $student->stud_fname?>>
					</div>
					<div class="col-md-12 settingForm">
						<input type="text" name="stud_lname" value=<?php echo $student->stud_lname?>>
					</div>
					<div class="col-md-12 settingForm">
						<input type="text" name="stud_email" value=<?php echo $student->stud_email?>>
					</div>

					<div class="col-sm-12" style="top:15px; width: 100%;" >
						<input onclick="submitForm(1)" style="float:right; width: 100px" type="button" class="btn btn-primary" value="Lưu lại">
					</div>
				</form>
				<form id="form2" action=<?php echo site_url('account/change_stud_password')?> style="display:none">
					<div class="col-sm-12">
					<p style="font-weight: 500">Mật khẩu</p>
					</div>
					<div class="col-md-12 settingForm">
						<input type="password" name="old_pass" placeholder="Mật khẩu cũ">
					</div>
					<div class="col-md-12 settingForm">
						<input type="password" name="new_pass" placeholder="Mật khẩu mới">
					</div>
					<div class="col-md-12 settingForm">
						<input type="password" name="new_pass_repeat" placeholder="Mật khẩu mới (nhắc lại)">
					</div>

					<div class="col-sm-12" style="top:15px; width: 100%;" >
						<input onclick="submitForm(2)" style="float:right; width: 100px" type="button" class="btn btn-primary" value="Lưu lại">
					</div>
				</form>
			</div>

		</div>
		
		
		
	</div>

</body>

<style type="text/css">
</style>


<script type="text/javascript">
	window.onload = function () {
		this.activeForm = 1;
	}

	function loadForm(formID){
		if(formID == this.activeForm) return;
		var form = "form"+formID.toString();
		
		document.getElementById(form).style.display = "block";
		form =	"form"+this.activeForm.toString();
		document.getElementById(form).style.display = "none";
		this.activeForm = formID;
	}

	function submitForm(formID){
		var form = "form"+formID.toString();
		var myForm = document.getElementById(form);
		var request = new XMLHttpRequest();
		
		request.open("POST",myForm.action,false);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var content = "";
		for (var i = 0; i < myForm.length-1; i++) {
			content += myForm.elements[i].name+"="+myForm.elements[i].value;
			if(i!=myForm.length-2) content += "&";
		}
		request.send(content);
		
		if((request.status==200) && (request.responseText=="success")) {
			alert("Thông tin của bạn đã được lưu lại thành công");
			
		}
		else{
			alert("Lưu thông tin thất bại");
		}
	}

</script>

</html>
