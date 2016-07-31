<html>
<head>
<meta charset='utf-8' />
<title>Đăng nhập</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/template.css")?>
	type="text/css" />
</head>
<body>
	<div style="width: 300px; position: absolute;
	height: 100%; background-color: rgb(66, 67, 110);">
			<div style="width: 100%; height: 100px; background-color: rgb(38,45,63);
			border-bottom: 1px solid black;">
			<img src="<?php echo base_url("assets/images/logo.png") ?>">
			</div>
			<div style="height: 60px; background-color: rgb(38,45,63); border-left: 6px solid rgb(11,156,81);">
				<p class="w1"><a href="<?php echo base_url() ?>">HOME</a></p>
			</div>
			<div style="height: 50px;">
				<p class="w1"><a href="<?php echo base_url("course_controller")?>">CATALOG</a></p>
			</div>
			<div style="height: 50px;">
				<p class="w1"><a href="">SETTING</a></p>
			</div>
	</div>
	<div style="position: absolute;" >
		
	</div>

</body>
<style type="text/css">
.w1{
	color: white;
	padding-top: 20px;
	padding-left: 30px;
}
.w1 a{
	text-decoration: none;
	color: white;	
}
.w1 a:hover{
	text-decoration: none;
	/*//color: white;	*/
}

</style>
</html>