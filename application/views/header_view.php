<?php if (!defined('BASEPATH')){exit('No direct script access allowed');} ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/ripples.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skins/fish/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skins/fish/css/noti.css">

    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/material.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/ripples.min.js" ></script>
<!--    <script src="--><?php //echo base_url(); ?><!--js/fish/custom.js" ></script>-->

    <script src="<?php echo base_url(); ?>nodejs/node_modules/socket.io-client/socket.io.js"></script>
<!--    <script src="js/nodeClient.js"></script>-->

    <script>
        $(document).ready(function() {
            $.material.init();

            //Document Click hiding the popup
            $(document).click(function()
            {
                $("#notificationContainer").hide();
            });

            //Popup on click
            $("#notificationContainer").click(function()
            {
                return false;
            });
        });

    </script>
</head>
<body>

<script>
    $('#searchForm input').keydown(function(e) {
        if (e.keyCode == 13) {
            $('#searchForm').submit();
        }
    });
</script>
<div class="navbar navbar-warning  navbar-fixed-top" style="margin-bottom: 0;background-color: #2C3E50">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">Bookerie</a>
        </div>
        <div class="navbar-collapse collapse navbar-warning-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($module === 'home') ? 'active' : ''; ?>"><a href="<?php echo site_url('post'); ?>">Home</a></li>
                <li class="<?php echo ($module === 'baivietcuatoi') ? 'active' : ''; ?>"><a href="<?php echo site_url('post'); ?>">My Posts</a></li>


            </ul>
            <form class="navbar-form navbar-left" id="searchForm" action=" <?php echo site_url('post/search'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" id="search" name="search" placeholder="Search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li id="notification_li">
                    <a href="#" id="notificationLink">Notifications</a>
<!--                    --><?php // if ($count_noti == 0){
//                        ?>
<!--                        <span id="notification_count" >0</span>-->
<!--                    --><?php
//                    }
//                    ?>
                    <?php if ($count_noti != 0){
                        ?>
                        <span id="notification_count"><?php echo $count_noti?></span>
                        <?php
                    }?>

                    <div id="notificationContainer">
                        <div id="notificationTitle">Notifications</div>
                        <div id="notificationsBody" class="notifications">
                        </div>
                        <div id="notificationFooter"><a href="#">See All</a></div>
                    </div>

                </li>

                <li class="dropdown">

                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:10px;padding-bottom:10px;">
                        <?php
                            if($useravatar==''){
                        ?>
                                <img src="<?php echo base_url() . "uploads/images/avatar/default.png"; ?>" class="img-circle"  style="height:40px; width:40px;margin-right: 8px">
                                <?php
                        }else{
                        ?><img src="<?php echo base_url().$useravatar; ?>" class="img-circle"  style="height:40px; width:40px;margin-right: 8px">
                                <?php
                            }
                        ?>
                        <?php echo $username; ?>
                        <b class="caret"></b>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('user/profile/') . $userid; ?>">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('user/logout'); ?>">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="noti-box">
    <div class="row" style="padding:15px">
        <div class="col-md-1">
            <span class="glyphicon glyphicon-comment"></span>
        </div>
        <div class="col-md-10">

        </div>
    </div>
</div>
<script>
    var customId = '<?php echo $userid ; ?>' ;
    console.log("cus"+customId);
    var count = '<?php echo $count_noti?>';
    console.log(count);
    var socket = io.connect( 'http://localhost:8080' );
    socket.on('connect',function(data){
        socket.emit('storeClientIfo', {customId:  customId})
    });
    function editNoti(noti_id) {
//        var post_id = $('#noti' + noti_id).attr('id');
        var post_id =  $.trim($('#noti' + noti_id).val());

        console.log("A"+post_id);
        $.ajax({
            url: '<?php echo site_url('notification/edit_noti/')?>' + noti_id,
            data: {
            },
            type: 'POST',
            success: function (data) {
                window.location.href = '<?php echo base_url('/post/post_detail/') ; ?>' + post_id;
            }
        });
    }

    $('#notificationLink').click(function(){
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        $.ajax({
            url: '<?php echo site_url('notification/load_noti');?>',
            type: 'GET',
            success: function (data) {
                $('#notificationsBody').html(data);
            }
        });
        return false;
    });
    socket.on('message', function(data) {
        console.log("a"+data.senderId);
        if (count==0){
            $('#notification_li').append( '<span id="notification_count">1</span>');
            count = count +1;
        }else{
            $('#notification_count').html(function(i,val){
                return val*1+1;
            });
        }

        $('.noti-box').show().fadeOut(10000);
        $('.noti-box .row .col-md-10').html('<a href="'+ '<?php echo base_url('/post/post_detail/') ; ?>' + data.post_id + ' ">' + data.senderName +' has commented on your post' + '</a>');
    });
</script>

<?php flush();?>
<!--load nhanh hơn-->
