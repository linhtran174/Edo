<html>
<head>
<title>Đăng nhập</title>
	<?php $this->load->view('header'); ?>
	<link rel="stylesheet" href=<?php echo base_url("assets/css/Sign_in.css")?> type="text/css" />

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
						<div class="another-login" style ="display: none;">
							<p>
								<a href="*">
								<img class="icon" src=<?php echo base_url("assets/images/Facebook-3-128.png")?>>Đăng nhập bằng Facebook
								</a>
							</p>
						</div>
						<div class="another-login" id="google" style ="display: none;">
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