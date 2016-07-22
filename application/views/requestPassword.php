<html>
<head>
<meta charset='utf-8' />
<title>Yêu cầu lấy lại mật khẩu</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/Sign_in.css")?>
	type="text/css" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/template.css")?>
	type="text/css" />
</head>
<body>
	<?php $this->load->view('Navbar');?>
	<div class="container" style="margin-bottom: 40px;">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" id="form">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				<form>
					<h2>Yêu cầu tạo lại mật khẩu</h2>
					<p>Để tạo lại mật khẩu, bạn phải điền email của bạn trước. Đường dẫn để bạn khởi tại lại mật khẩu sẽ được gửi vào email của bạn</p>
					<input class="form-control" type="text" name="email" placeholder="email">
					<button type="submit" class="btn button-primary">Submit</button>
				</form>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer');?>
</body>
</html>