<div id="myNavbar">
	<div class="container" style="position: relative">
		<div style="width: 250px;">
			<a href="<?php echo site_url("view_controller/index")?>">
			<img id="logoA"
				src=<?php echo base_url("assets/images/logo.png")?>></img></a>
		</div>
		<div style="position: absolute; right: 0; top: 25px">
			<?php if($this->session->userdata('login') != NULL){ ?>
			<a class="myNavItem" href="<?php echo site_url("my_classroom")?>">LỚP HỌC CỦA TÔI</a> 
			<?php }?>
			<a class="myNavItem"
				href="<?php echo site_url("catelog")?>">CATALOG</a> 
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