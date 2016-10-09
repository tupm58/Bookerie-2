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

    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/material.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/ripples.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/fish/custom.js" ></script>


    <script>
        $(document).ready(function() {
            $.material.init();
        });
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=850222938441779";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
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
                <li class="<?php echo ($module === 'baivietcuatoi') ? 'active' : ''; ?>"><a href="<?php echo site_url('post/my_post'); ?>">My Posts</a></li>

            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" placeholder="Search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:10px;padding-bottom:10px;">
                        <img src="<?php echo base_url().$useravatar; ?>" class="img-circle" width="41px";height="41px" style="margin-right: 8px">
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


<?php flush();?>
<!--load nhanh hơn-->
