<style>
    body {
        background-color: #18BC9C;
    }
    #demoImg {
        width: 100px;
        height: 100px;
    }
    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 150px;
        height: 150px;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;

    }
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 150px;
        height: 150px;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
</style>
<br>
<br>
<br>




<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <?php
                        if($user['avatar']== ''){
                            ?>
                    <img src="<?php echo base_url() . "uploads/images/avatar/default.png"; ?>" class="img-responsive" alt="">
                    <?php
                    }else{
                            ?>
                            <img src="<?php echo base_url().$user['avatar']; ?>" class="img-responsive" alt="">
                            <?php
                        }
                    ?>
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $user['username'];?>
                    </div>
<!--                    <div class="profile-usertitle-job">-->
<!--                        Developer-->
<!--                    </div>-->
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
<!--                <div class="profile-userbuttons">-->
<!--                    <button type="button" class="btn btn-success btn-sm">Follow</button>-->
<!--                    <button type="button" class="btn btn-danger btn-sm">Message</button>-->
<!--                </div>-->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="">
                            <a href="#">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <?php echo $user['email']?> </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                <?php echo $user['address']?> </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="glyphicon glyphicon-earphone"></i>
                                <?php echo $user['phone']?> </a>
                        </li>
                        <?php
                            if ($user['user_id'] == $userid){
                        ?>
                                <li>
                                    <a  href="#" data-toggle="modal" data-target="#editProfile">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Account Settings </a>
                                </li>
                        <?php
                            }
                        ?>

                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3"  style="background-color: red">a</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3" style="background-color: yellow">a</div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3" style="background-color: violet">a</div>

                </div>
            </div>
        </div>
    </div>
</div>
<center>
    <strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">Bookerie</a></strong>
</center>
<br>
<br>
<!--edit profile modal-->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit profile
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo site_url('user/update'); ?>" method="post"
                      role="form" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Address</label>
                            <div class="col-md-10">
                                <input name="address" type="text" class="form-control" placeholder="Enter your address" value="<?php echo $user['address'];?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Phone</label>
                            <div class="col-md-10">
                                <input name="phone" type="number" class="form-control" placeholder="Enter your phone" value="<?php echo $user['phone'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFile" class="col-md-2 control-label">Avatar</label>
                            <div class="col-md-10">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input name="userfile" id="userfile" type="file"  multiple="">
                                <img src="#" id="demoImg">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <input type="submit" id="editProfile" name="editProfile" value="Edit" class="btn  btn-raised btn-warning"
                                       style="background-color: #18BC9C">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#demoImg').hide();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#demoImg').attr('src', e.target.result);
                $('#demoImg').show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile").change(function(){
        readURL(this);
    });
</script>