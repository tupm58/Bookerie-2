<br>
<br>
<br>
<br>
<br>


    <div class="row">

        <div class=" col-md-7 col-md-offset-3" >
            <div class="card" style="padding: 20px;">
                <h3 class="card-header">Edit post</h3>
                <div class="card-block">
                    <form class="form-horizontal" action="<?php echo site_url('post/xl_update/'). $p['post_id']; ?>" method="post"
                      role="form" enctype="multipart/form-data">
                    <fieldset>

                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Book name</label>
                            <div class="col-md-10">
                                <input name="name" type="text" class="form-control" placeholder="Enter book name"
                                   value="<?php echo $p['name']; ?>">
                              
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="select111" class="col-md-2 control-label">Quality</label>
                            <div class="col-md-10">
                                <select name="quality" id="select111" class="form-control">
                                    <?php
                                    foreach ($quality as $q) {
                                        $selected = ($q['content'] == $p['content']) ? " selected='selected'" : "";

                                    ?>
                                        <option <?php echo $selected; ?> value="<?php echo $q['quality_id']?>" > <?php echo $q['content']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">Origin Price</label>
                            <div class="col-md-10">
                                <input name="oprice" type="number" class="form-control"
                                       placeholder="Enter origin price" value="<?php echo $p['oprice'] ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputName" class="col-md-2 control-label">New Price</label>
                            <div class="col-md-10">
                                <input name="sprice" type="number" class="form-control" placeholder="Enter new price"
                                value="<?php echo $p['sprice'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-md-2 control-label" placeholder="Enter book name">Description</label>

                            <div class="col-md-10">
                                <textarea name="description" class="form-control" rows="3" id="textArea"
                                          value=""><?php echo $p['description'] ?></textarea>
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

                                <input type="submit" id="editPost" name="editPost" value="Update"
                                       class="btn  btn-raised btn-warning"
                                       style="background-color: #18BC9C">

                                    <button id="editPost" 
                                           class="btn btn-default">
                                        <a href="<?php echo base_url('post'); ?>">
                                        Cancel </a>
                                    </button>

                            </div>
                        </div>
                    </fieldset>
                </form>
                </div>
            </div>
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