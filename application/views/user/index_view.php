<?php if (!defined('BASEPATH')){exit('No direct script access allowed');} ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/ripples.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>skins/fish/css/full-slider.css">

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
    <style>
        body{
            background-color: #2c3e50;
        }
    </style>
<body>

<!-- Navigation -->
<div class="navbar navbar-warning navbar-fixed-top" style="margin-bottom: 0;background-color: #2C3E50">
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
                <li class=""><a href="#about">About</a></li>
                <li class=""><a href="#register">I am new one</a></li>
                <li class=""><a href="#login">Let me log in</a></li>
                <li class=""><a href="<?php echo site_url('post/my_post'); ?>">Enroll now!!</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Full Page Image Background Carousel Header -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>skins/fish/images/cover1a.png');"></div>
            <div class="header-text hidden-xs">
                <div class="col-md-12 text-center">
                    <h2>
                        <span>Welcome to Bookerie</span>
                    </h2>
                    <br>
                    <h3>
                        <span>Old to you, new to me ! </span>
                    </h3>
                    <br>
                    <div >
                        <a href="#login" class="btn btn-theme btn-sm btn-min-block"  style="color: #ffffff">Login</a>
                        <a href="#register" class="btn btn-theme btn-sm btn-min-block" style="color: #ffffff">Register</a>
                    </div>

                </div>
            </div><!-- /header-text -->
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>skins/fish/images/cover2.png');"></div>
            <div class="carousel-caption">
                <h2>Caption 2</h2>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>skins/fish/images/cover3.png');"></div>
            <div class="carousel-caption">
                <h2>Caption 3</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>

<!-- Page Content -->
    <div class="row">
        <div class="main" id="about">
            <section  style="background-color:white">
                <div class="row">
                    <h2 style="text-align: center;padding-top: 100px; color: #2c3e50"><b>About</b></h2>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <img src="<?php echo base_url(); ?>skins/fish/images/book1.jpg" alt="" width="550px" height="270px">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="main" id="login">
            <section  style="background-color:#18BC9C;padding-top: 150px">
                <div class="row">
                    <div  class="col-md-offset-2 col-md-3" style="margin-top: 0px">
                        <h1 style="color: white"><b>Login</b></h1>
                        <br>
                        <h4  style="color: white" >Sign in to have full power to explore the book world</h4>
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class=" col-md-4 ">
                        <div class="login-form" >
                            <form class="form-horizontal"method="POST" id="frmLogin" name="frmLogin"
                                  action="<?php echo site_url('user/login'); ?>" >
                                <fieldset>
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="focusedInput1" >Username</label>
                                        <input class="form-control" id="lgUsername" type="text" name="lgUsername">
                                    </div>
                                    <div class="form-group label-floating has-warning">
                                        <label class="control-label" for="focusedInput1" >Password</label>
                                        <input class="form-control" id="lgPassword" type="password" name="lgPassword">
                                    </div>
                                    <div class="form-group">
                                        <div >
                                            <button type="submit" class="btn btn-raised btn-warning"
                                                    name="btnLogin" id="btnLogin" style="background-color: #18bc9c;"
                                            >Login</button>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <p class="message">Not registered? <a href="#register">Create an account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<div class="row">
    <div class="main" id="register">
        <section  style="background-color:white;padding-top: 100px">
            <div class="row">
                <div  class="col-md-offset-2 col-md-3" style="margin-top: 0px">
                    <h1 style="color: #2c3e50"><b>Register</b></h1>
                    <br>
                    <h4  style="color: #2c3e50" ><b>Create an account to sell book!!</b></h4>
                </div>
                <div class="col-md-1">

                </div>
                <div class=" col-md-4 ">
                    <div class="login-form" >
                        <form class="form-horizontal" id="frmRegister" name="frmRegister"
                              action="<?php echo site_url('user/register'); ?>" method="POST" >
                            <fieldset>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="focusedInput1" >Username</label>
                                    <input class="form-control" id="txtUsername" type="text" name="txtUsername">
                                </div>
                                <div class="form-group label-floating ">
                                    <label class="control-label" for="focusedInput1" >Email</label>
                                    <input class="form-control" id="txtEmail" type="email" name="txtEmail">
                                </div>
                                <div class="form-group label-floating ">
                                    <label class="control-label" for="focusedInput1" >Password</label>
                                    <input class="form-control" id="txtPassRetype" type="password" name="txtPassRetype">
                                </div>
                                <div class="form-group label-floating ">
                                    <label class="control-label" for="focusedInput1" >Retype Password</label>
                                    <input class="form-control" id="txtPass" type="password" name="txtPass">
                                </div>
                                <div class="form-group">
                                    <div >
                                        <button type="submit" class="btn btn-raised btn-warning" name="btnRegister" id="btnRegister" style="background-color: #18bc9c;">Sign Up</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    <hr>

    <!-- Footer -->
    <footer >
        <div class="row">
            <div class="col-lg-12" style="color: white;">
                <p>Copyright &copy; Liucuxiu 2016</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>


<!-- /.container -->


<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 8000 //changes the speed
    });
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    });

</script>

</body>
</html>
