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
			<div class="teacher-wrapper">
				<div class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">BẠN LÀ GIÁO VIÊN?
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url("teacher_controller/register")?>">Đăng ký</a></li>
						<li><a href="<?php echo site_url("teacher_controller/login")?>">Đăng nhập</a></li>
					</ul>
				</div>
			</div>

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

<style type="text/css">
.teacher-wrapper {
    float: right;
    margin-top: 15px;
    margin-left: 30px;
    margin-right: 10px;
    padding-bottom: 7px;
    padding-top: 10px;
    text-decoration: none;
    color: black;
}

.teacher-wrapper a {
	color: #337ab7;
}

.teacher-wrapper:hover{
	cursor: pointer;
	/*border-bottom: 2px solid #337ab7;*/
	color: #337ab7;
}

.teacher-wrapper a:hover {
	color: #337ab7;
}

.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
 }

</style>