<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} ?>
<style>
    .close1 {
        position: absolute;
        top: -8px;
        right: -2px;
        z-index: 200;
        /*background-color: #FFF;*/
        padding: 4px 1px 1px;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        /*opacity: .2;*/
        text-align: center;
        font-size: 20px;
        line-height: 10px;
        /*border-radius: 50%;*/
    }
    .avatar {
        border-radius: 50%;
        width:50px;
        height: 50px;
    }

</style>
<br>
<br>

<br>
<br>

<br>

<div>

    <?php foreach ($post as $p): ?>
        <br>
        <div class="row">
            <?php
                if ($p['avatar'] ==''){
                    ?>
                    <img class="col-md-1 col-md-offset-3 img-circle"  src="<?php echo base_url() . "uploads/images/avatar/default.png"; ?>"
                         alt="Loading image...">
            <?php
                }else{
            ?>
                    <div>
                        <img class="col-md-1 col-md-offset-3 img-circle" style="height:66px" src="<?php echo base_url().$p['avatar']; ?>"
                             alt="Loading image...">
                    </div>

            <?php
                }
            ?>


            <!--                                <div class="col-md-1 col-md-offset-2">-->
            <?php //echo $p['username']; ?><!--</div>-->

            <div class="col-md-6 ">
                <div class="card" id="card-post">
                    <!--                        <div class="card-height-indicator" ></div>-->
                    <div class="card-content" style="position: inherit !important; min-height: 100%">
                        <?php
                        if ($p['user_id'] == $userid) {
                            ?>
                            <span class="close1">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="glyphicon glyphicon-inverse glyphicon-chevron-down"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit</a></li>
                                            <li><a href="#deleteModal"
                                                   data-id="<?php echo $p['post_id'];?>"
                                                   data-toggle="modal"
                                                   class="deleteButton">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                    Delete</a></li>
                                        </ul>
                                    </div>

                                </span>
                        <?php } ?>
                        <div class="card-image">
                            <?php
                            if ($p['image']) {
                                ?>
                                <img style="max-height: 600px;" src="<?php echo base_url() . $p['image']; ?>" alt="Loading image...">
                                <?php
                            }
                            ?>

                            <h3 class="card-image-headline"><?php echo $p['name'] ?></h3>
                        </div>

                        <div class="card-body">
                            <h4>
                                <b><a href="<?php echo base_url('/post/post_detail/') . $p['post_id']; ?>"><?php echo $p['name'] ?></a></b>
                            </h4>
                            <p><?php echo $p['description']; ?></p>
                            <p>Giá bán:<?php echo $p['sprice']; ?></p>
                            <p>Chất lượng: <?php echo $p['quality']; ?> </p>
                        </div>
                        <footer class="card-footer">
                            <div style="margin-left:15px">
                                <button class="btn btn-raised btn-xs">Share</button>
                                <button class="btn btn-raised btn-xs btn-warning"
                                        style="background-color: #18BC9C"
                                        onclick="$(this).closest('.row').find('#'+<?php echo $p['post_id'] ?>).focus()">
                                    Comments
                                </button>
                            </div>
                            <div class="date sub-text"><?php echo $p['time']; ?></div>
                            <div class="actionBox">
                                <ul class="commentList" id="commentList<?php echo $p['post_id'];?>">
                                    <?php
                                    foreach ($p['comments'] as $comment) {
                                        ?>
                                        <li>
                                            <div class="commenterImage">
                                                <?php if($comment['avatar']==''){
                                                ?>
                                                    <img src="<?php echo base_url() . "uploads/images/avatar/default.png"; ?>"/>

                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src="<?php echo base_url() .$comment['avatar']; ?>" style="height:30px"/>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <b><?php echo $comment['username']; ?></b>
                                            <div class="commentText">
                                                <p class=""><?php echo $comment['content']; ?></p>
                                                <span class="date sub-text"><?php echo $comment['time']; ?></span>
                                            </div>
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <input class=" form-control is-empty message col-md-3 content "
                                               id="<?php echo $p['post_id'] ?>" type="text" placeholder="Your comments"
                                               name="content">
                                    </div>
                                    <div class="col-md-2">
                                        <button class=" myButton btn btn-raised btn-warning"
                                                id="<?php echo $p['post_id'] ?>"
                                                style="bottom: 0px !important ;background-color: #18BC9C;">
                                            Add
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </footer>
                    </div>
                </div>
            </div>

        </div>
        <br>
    <?php endforeach; ?>
</div>
</div>


<!--  ADD Modal -->
<div class="modal fade" id="createNewPost" tabindex="-1" role="dialog"
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
                    Create new post
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo site_url('post/add'); ?>" method="post"
                      role="form" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Book name</label>
                            <div class="col-md-10">
                                <input name="name" type="text" class="form-control" placeholder="Enter book name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="select111" class="col-md-2 control-label">Quality</label>
                            <div class="col-md-10">
                                <select name="quality" id="select111" class="form-control">
                                    <option value="1">New</option>
                                    <option value="2">Like New</option>
                                    <option value="3">Very Good</option>
                                    <option value="4">Good</option>
                                    <option value="5">Acceptable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Origin Price</label>
                            <div class="col-md-10">
                                <input name="oprice" type="number" class="form-control"
                                       placeholder="Enter origin price">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">New Price</label>
                            <div class="col-md-10">
                                <input name="sprice" type="number" class="form-control" placeholder="Enter new price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-md-2 control-label" placeholder="Enter book name">Description</label>

                            <div class="col-md-10">
                                <textarea name="description" class="form-control" rows="3" id="textArea"></textarea>
                                <span class="help-block">Write something about your book</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFile" class="col-md-2 control-label">Photo</label>

                            <div class="col-md-10">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input name="userfile" id="userfile" type="file" multiple="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <input type="submit" id="createPost" name="createPost" value="Post"
                                <input type="submit" id="createPost" name="createPost" value="Post"
                                       class="btn  btn-raised btn-warning"
                                       style="background-color: #18BC9C"
                                >
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- DELETE Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #18bc9c;padding: 11px;" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color:white;">Delete post</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this post ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteConfirm" >Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- EDIT Modal -->
<script>
    $('#createNewPost').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });
    $(document).ready(function () {
        $('.myButton').click(function () {

            var check = true;
            check = (content != '') ? check : false;
            var post_id = $(this).attr('id');
            var content = $.trim($('#' + post_id).val());

            alert("aaa" + post_id + content);
            if (check) {
                $.ajax({
                    url: '<?php echo site_url('comment/add_comment')?>',
                    data: {
                        "content": content,
                        "post_id": post_id
                    },
                    type: 'POST',
                    beforeSend: function () {
                        alert("bat dau gui data");
                    },
                    success: function (data) {
                        alert(content);
                        $('#commentList'+post_id).append('<li> <div class="commenterImage">' +
                            '<img src="<?php echo base_url().$useravatar; ?>"  style="height:30px"/> ' +
                            '</div>' +
                            "<b>" + "<?php echo $username; ?>" + "</b> " +
                            "<div class='commentText'> " +
                            "<p>"+ content + "</p>"+
                            "</div> </li>");
                        $('#commentList'+post_id).scrollTop($('#commentList'+post_id)[0].scrollHeight);
                        $('#' + post_id).val('');

                    }
                });
            }
        });
        $('.deleteButton').click(function(){
            var postId = $(this).data('id');
            console.log(postId);
//            $(".modal-body #bookId").val(postId);
            $('#deleteConfirm').click(function(){
                $.ajax({
                    url: '<?php echo site_url('post/delete/')?>'+postId,
                    type: 'DELETE',
                    beforeSend: function () {
                        alert("bat dau gui data");
                    },
                    success: function (data) {
                        alert("success");
                        location.reload();
                    }
                });
            })
        });
    });

</script>

