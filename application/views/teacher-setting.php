<html>
<head>
    <title>Cài đặt</title>
    <?php $this->load->view('header');?>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/teacher-setting.css")?>
    type="text/css" />
</head>
<body>
    <div class="wrapper">
        <div class="sideBar-expand" id="left">
            <div class="logoBar">
                <img src="<?php echo base_url("assets/images/logo.png") ?>">
            </div>
            <div class="logoItem">
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
            <div class="logoItem" style="background: #42516E;">
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
                    <h4>&nbsp &nbsp &nbsp &nbsp Cài đặt</h4> 
                </div>
            </div>

            <div class="container" style="width:100%; margin-top:70px"> 
                <div style="height: 40px"></div>
                <div class="col-sm-3">
                    <div class="col-sm-12 formNav">
                        <p style="font-weight: 500">TÀI KHOẢN</p>
                        <a onclick="loadForm(1)">
                            Thông tin cá nhân
                        </a><br><br>
                        <a onclick="loadForm(2)">
                            Mật khẩu
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-6">
                    <form id="form1" action=<?php echo site_url('teacher_controller/change_teacher_info')?>>
                        <div class="col-sm-12">
                            <p style="font-weight: 500">Thông tin cá nhân</p>
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="text" name="teacher_fname" value="<?php echo $teacher->teacher_fname?>" placeholder="Họ">
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="text" name="teacher_lname" value="<?php echo $teacher->teacher_lname?>" placeholder="Tên">
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="text" name="teacher_email" value="<?php echo $teacher->teacher_email?>" placeholder="Email">
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="text" name="teacher_job" value="<?php echo $teacher->teacher_job?>" placeholder="Nghề nghiệp giáo viên">
                        </div>
                        <div class="col-md-12 settingForm">
                            <textarea name="teacher_desc" style="width: 100%; height: 150px; "><?php echo $teacher->teacher_desc?></textarea>
                        </div>

                        <div class="col-sm-12" style="top:15px; width: 100%;" >
                            <input onclick="submitForm(1)" style="float:right; width: 100px" type="button" class="btn btn-primary" value="Lưu lại">
                        </div>
                    </form>
                    <form id="form2" action=<?php echo site_url('teacher_controller/change_teacher_password')?> style="display:none">
                        <div class="col-sm-12">
                            <p style="font-weight: 500">Mật khẩu</p>
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="password" name="old_pass" placeholder="Mật khẩu cũ">
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="password" name="new_pass" placeholder="Mật khẩu mới">
                        </div>
                        <div class="col-md-12 settingForm">
                            <input type="password" name="new_pass_repeat" placeholder="Mật khẩu mới (nhắc lại)">
                        </div>

                        <div class="col-sm-12" style="top:15px; width: 100%;" >
                            <input onclick="submitForm(2)" style="float:right; width: 100px" type="button" class="btn btn-primary" value="Lưu lại">
                        </div>
                    </form>
                </div>

            </div>



        </div>

    </body>

    <style type="text/css">
    </style>


    <script type="text/javascript">
        window.onload = function () {
            this.activeForm = 1;
        }

        function loadForm(formID){
            if(formID == this.activeForm) return;
            var form = "form"+formID.toString();

            document.getElementById(form).style.display = "block";
            form =  "form"+this.activeForm.toString();
            document.getElementById(form).style.display = "none";
            this.activeForm = formID;
        }

        function submitForm(formID){
            var form = "form"+formID.toString();
            var myForm = document.getElementById(form);
            var request = new XMLHttpRequest();

            request.open("POST",myForm.action,false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var content = "";
            for (var i = 0; i < myForm.length-1; i++) {
                content += myForm.elements[i].name+"="+myForm.elements[i].value;
                if(i!=myForm.length-2) content += "&";
            }
            request.send(content);

            if((request.status==200) && (request.responseText=="success")) {
                alert("Thông tin của bạn đã được lưu lại thành công");

            }
            else{
                alert("Lưu thông tin thất bại");
            }
        }

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

    </html>
