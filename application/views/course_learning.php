<html>
<head>
    <meta charset='utf-8' />
    <title>Đăng nhập</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet"
    href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href=<?php echo base_url("assets/css/template.css")?>
    type="text/css" />
    <link rel="stylesheet" href=<?php echo base_url("assets/css/course-learning.css")?>
    type="text/css" />
    <script src="<?php echo base_url("assets/js/jquery-2.2.4.min.js")?>"></script>
</head>
<body>
    <div style="width: 260px; position: fixed; top:0; left:0;
    height: 100%; background-color: rgb(66, 67, 110);">
        <div style="width: 100%; height: 73px; background-color: rgb(38,45,63);
    border-bottom: 2px dotted black;">
            <img style="padding-left: 30px; padding-top: 10px" src="<?php echo base_url("assets/images/logo.png") ?>">
        </div>
        <div style="height: 60px; background-color: rgb(38,45,63); border-left: 6px solid rgb(11,156,81);">
            <p class="w1"><a href="<?php echo base_url() ?>">HOME</a></p>
        </div>
        <div style="height: 50px;">
            <p class="w1"><a href="<?php echo base_url("course_controller")?>">CATALOG</a></p>
        </div>
        <div style="height: 50px;">
            <p class="w1"><a href="">SETTING</a></p>
        </div>
    </div>

    <div class="container-fluid" style="margin-left: 260px;" >
        <!-- <div class="header">
            <div class="container">
                <h4>Tiêu đề tên khóa học ở đây</h4>
                <div class="glyphicon glyphicon-download-alt">Resources</div>
            </div>
        </div> 

        <div style="width:100%; margin-top:70px">
            <div id="link-video-lesson"></div>
        </div>

        <div id="db-link-video-lesson" style="display:none">
            <?=$videolink?>
        </div> -->
        <div class="header">
            <p>Tiêu đề khóa học ở đây</p>
            <!-- <div class="glyphicon glyphicon-download-alt">Resources</div> -->
        </div>
    </div>

</body>
<script type="text/javascript">
    function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    }

    var link = $('#db-link-video-lesson').html().trim();
    var myId = getId(link);

    $('#link-video-lesson').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>')
</script>
</html>