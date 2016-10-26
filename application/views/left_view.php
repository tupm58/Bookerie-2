<style>
    .btn.btn-fab{
        border-radius: 1%;
    }
    .orderButton{
        background-color: #18BC9C !important;
        color: white !important;

    }
</style>
<div class="container" style="margin-left: 56px; " >

<?php
    if ($userid != ''){
    ?>
        <div class="row"  >
            <div class="col-md-2" style="position: fixed;margin-top: 100px">
                <div class="row">
                    <div>
                        <button type="button"
                                class="btn btn-raised btn-fab-mini btn-warning btn-lg col-md-12"
                                data-toggle="modal" data-target="#createNewPost" style="background-color: #18BC9C">
                            Create a new post
                        </button>
                    </div>

                </div>
                <div class="row">
                    <button class="btn btn-default btn-fab col-md-2 orderButton">
                        <a style="color:white;" href=" <?php echo site_url('post/post_order_by_name'); ?> ">
                            <span class="glyphicon glyphicon-sort-by-alphabet"></span>
                        </a>
                    </button>
                    <button class="btn btn-default btn-fab col-md-2 orderButton">
                        <a style="color:white;" href=" <?php echo site_url('post/post_order_by_name_desc'); ?> ">
                            <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                        </a>
                    </button>
                    <button class="btn btn-default btn-fab col-md-2 orderButton">
                        <a style="color:white;" href=" <?php echo site_url('post/post_order_by_price'); ?> ">
                            <span class="glyphicon glyphicon-sort-by-attributes"></span>
                        </a>
                    </button>
                    <button class="btn btn-default btn-fab col-md-2 orderButton">
                        <a style="color:white;" href=" <?php echo site_url('post/post_order_by_price_desc'); ?> ">
                            <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
                        </a>
                    </button>
                </div>
            </div>

        </div>
    <?php
    }else{
        ?>
        <div class="row">
            <div class="col-md-2" style="position: fixed;margin-top: 100px">
                <div class="row">
                    <div>
                        <a type="button"
                                class="btn btn-raised btn-fab-mini btn-warning btn-lg col-md-12"
                                 style="background-color: #18BC9C" href="<?php echo base_url('user/#login')?>">
                            Login to create post!
                        </a>
                    </div>

                </div>
            </div>
    <?php
    }
?>

