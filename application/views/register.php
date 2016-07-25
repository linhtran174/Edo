<html>
<head>
<meta charset='utf-8' />
<title>Đăng Ký</title>
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
	<div class="container" id="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" id="form">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2>Đăng ký</h2>
						<form method="post" action="">
							<div class="row">
								<div class="col-md-6">
									<input id="fname" class="form-control" type="text" name="fname" id="fname" value="<?php echo set_value('fname')?>" placeholder="Tên">
									<div class="error" id="fname_error"><?php echo form_error('fname')?></div>
									
								</div>
								<div class="col-md-6">
									<input id="lname" class="form-control" id="lname" type="text" name="lname" value="<?php echo set_value('lname')?>" placeholder="Họ">
									<div class="error" id="lname_error"><?php echo form_error('lname')?></div>	
								</div>
							</div>
							<input class="form-control" type="text" id="email" name="email" value="<?php echo set_value('email')?>" placeholder="Email">
							<div class="error" id="email_error"><?php echo form_error('email')?></div>	
							<input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu">
							<div class="error" id="pass_error"><?php echo form_error('password')?></div>	
							<p>By signing up you agree to E-learning 
								<a href="*" id="term">Terms of Service</a>
							</p>
							<button type="submit" class="btn button-primary">Đăng ký</button>
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
						<div class="another-login">
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
	<?php $this->load->view('footer');?>
</body>
</html>