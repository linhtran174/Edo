<html>
<head>
<meta charset='utf-8' />
<title>Đăng nhập</title>
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
	href=<?php echo base_url("assets/css/Sign_In.css")?> type="text/css" />
<link rel="stylesheet"
	href=<?php echo base_url("assets/css/template.css")?> type="text/css" />
</head>
<body>
	<?php $this->load->view('Navbar');?>
	
	<div class="container" id="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" id="form">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<form method="post" action="">
							<h2>Đăng nhập</h2>
							<input class="form-control" placeholder="Email" id="email" type="text" name="email" value="<?php echo set_value('email')?>"/>
							<div class="error" id="email_error"><?php echo form_error('email')?></div>	
							<input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu">
							<div class="error" id="pass_error"><?php echo form_error('password')?></div>
							<a href="<?php echo site_url("view_controller/request_pass")?>" id="forgot"><p>Quên mật khẩu</p></a>
							<button type="submit" class="btn button-primary">Đăng nhập</button>
						</form>
						<div id="or">
							<div class="line" id="line-left"></div>
							<p style="display: inline-block;">Or</p>
							<div class="line" id="line-right"></div>
						</div>
						<div class="another-login">
							<p>
								<a href="*">
								<img class="icon" src=<?php echo base_url("assets/images/Facebook-3-128.png")?>>Đăng nhập bằng Facebook
								</a>
							</p>
						</div>
						<div class="another-login" id="google">
							<p>						
								<a href="*">
								<img class="icon" src=<?php echo base_url("assets/images/Google+alt.png")?>>
								Đăng nhập bằng Google
								</a>
							</p>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<div style="text-align: center;">
		<p>Bạn chưa có tài khoản? <a href="<?php echo site_url("register")?>"">Đăng ký nhanh</a></p>
	</div>
	<?php $this->load->view('footer');?>
</body>
</html>