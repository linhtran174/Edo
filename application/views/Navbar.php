<div id="myNavbar">
	<div class="container" style="position: relative">
		<div style="width: 250px;">
			<a id="logoA" href="<?php echo site_url("view_controller/index")?>"><img
				src=<?php echo base_url("assets/images/logo.png")?> style=""></img></a>
		</div>
		<div style="position: absolute; right: 0; top: 25px">
			<a class="myNavItem" href="">LỚP HỌC CỦA TÔI</a> 
			<a class="myNavItem"
				href="<?php echo site_url("view_controller/course_catalog")?>">CATALOG</a> 
			<?php 
				if($this->session->userdata('login') == NULL){
			?>
			<a class="myNavItem" style="color: orange;"
				href="<?php echo site_url("login")?>">ĐĂNG NHẬP</a>
			<a class="myNavItem" style="color: orange;"
				href="<?php echo site_url("register")?>">ĐĂNG KÝ</a>
			<?php
				}
				else{
			?>
			<a class="myNavItem" style="color: orange;"
				href="<?php echo site_url("logout")?>">THOÁT</a>
			<?php }?>
		</div>
	</div>
</div>