<html>
<head>
    <meta charset='utf-8' />
    <title>Giáo viên</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url("assets/font-awesome-4.6.3/css/font-awesome.min.css")?>"> -->
    <script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
    <script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/template.css")?>">
    <link rel="stylesheet" href=<?php echo base_url("assets/css/teacher-home.css")?>
    type="text/css" />
</head>
<body>
    <div class="wrapper">
        <div class="sideBar-expand" id="left">
            <div class="logoBar">
                <img src="<?php echo base_url("assets/images/logo.png") ?>">
            </div>
            <div class="logoItem" style="background: #42516E;">
                <span class="glyphicon glyphicon-home icon"> </span>
                <p class="w1"><a href="<?php echo site_url('teacher_controller') ?>">
                    Trang chủ
                </a></p>
            </div>
            <div class="logoItem">
                <span class="glyphicon glyphicon-th-list icon"> </span>
                <p class="w1"><a href=<?php echo site_url("teacher_controller/my_courses")?>>
                    Khóa học của tôi
                </a></p>
            </div>
            <div class="logoItem">
                <span class="glyphicon glyphicon-cog icon"></span>
                <p class="w1"><a href=<?php echo site_url("teacher_controller/setting")?>>
                    Cài đặt
                </a></p>
            </div>
            <div class="logoItem bottom">
                <span class="glyphicon glyphicon-log-out icon"></span>
                <p class="w1"><a href=<?php echo site_url('teacher_controller/logout');?>>
                    Đăng xuất
                </a></p>
            </div>
        </div>

        <div class="right-collapse" id="right">
            <div class="fixed-bar">
                <div class="header-wrapper">
                <span class="glyphicon glyphicon-menu-hamburger menu-btn" id="trig"></span>
                    <h4>&nbsp &nbsp &nbsp &nbsp Trang chủ</h4> 
                </div>
            </div>

            <div class="container" style="width:100%; margin-top:70px">

            </div>
        </div>
        <script type="text/javascript">
            $('#trig').on('click', function () {
                $('#left').toggleClass("sideBar-expand sideBar-collapse");
                $('#right').toggleClass("right-collapse right-expand");
                $('.w1').toggleClass("hidden");
            });

            $(window).resize(function() {
                if ($(window).width() < 992) {
                    $('#left').attr("class", "sideBar-collapse");
                    $('#right').attr("class","right-expand");
                    $('.w1').attr("class","w1 hidden");
                }
            });
        </script>
    </body>
    </html>
