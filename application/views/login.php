<html>
<head>
<title>Login</title>
<link rel="stylesheet"
	href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href=<?php echo base_url("assets/css/login.css")?>
	type="text/css" />

<style>
</style>
</head>
<body>
	<div class="login-page">
		<div class="form">
			<form class="register-form">
				<input type="text" id="fname" placeholder="first name" /> 
				<input type="text" id="lname" placeholder= "last name" />
				<input type="password" placeholder="password" /> 
				<input type="text"	placeholder="email address" />
				<button class="submit">create</button>
				<p class="message">
					Already registered? <a href="#">Sign In</a>
				</p>
				<div class="line" style="margin-top: 10px; margin-bottom: 20px;">
            		<div class="grey-line-left"></div>
            		<div class="grey-line-cir" style="border-color:rgb(153,153,153);"></div>
          		  	<div class="grey-line-right"></div>
        		</div>
        		<button class="log-in-with"><img src=<?php echo base_url('assets/images/Facebook-3-128.png')?> style="height: 20px; width: 20px; margin-right: 10px;">LOG IN WITH FACEBOOK</button>
        		<button class="log-in-with"><img src=<?php echo base_url('assets/images/Google+alt.png')?> style="height: 20px; width: 20px; margin-right: 10px;">LOG IN WITH GOOGLE</button>
			</form>
			<form class="login-form">
				<input type="text" placeholder="username" /> <input type="password"
					placeholder="password" />
				<button class="submit">login</button>
				<a  style="margin-top:10px; color: #4CAF50" href="*">Forgot password</a>
				<p class="message">
					Not registered? <a href="#">Create an account</a>
				</p>
				<div class="line" style="margin-top: 10px; margin-bottom: 20px;">
            		<div class="grey-line-left"></div>
            		<div class="grey-line-cir" style="border-color:rgb(153,153,153);"></div>
          		  	<div class="grey-line-right"></div>
        		</div>
        		<button class="log-in-with"><img src=<?php echo base_url('assets/images/Facebook-3-128.png')?> style="height: 20px; width: 20px; margin-right: 10px;">LOG IN WITH FACEBOOK</button>
        		<button class="log-in-with"><img src=<?php echo base_url('assets/images/Google+alt.png')?> style="height: 20px; width: 20px; margin-right: 10px;">LOG IN WITH GOOGLE</button>
			</form>
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js');?>"
		type="text/javascript"></script>
	<script type="text/javascript">
	$('.message a').click(function(){
		   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
	<script type="text/javascript"
		src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</body>
</html>