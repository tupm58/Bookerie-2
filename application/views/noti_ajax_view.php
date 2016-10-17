<ul class="notificationsContent">
    <?php if (isset($notification)){
        foreach ($notification as $p){
            ?>
            <li class="noti" style="display: inline-block;" id="<?php echo $p['post_id']?>"
                onclick=editNoti(<?php echo $p['id']?>);>
                <?php
                if($p['avatar']==''){
                    ?>
                    <img src="<?php echo base_url() . "uploads/images/avatar/default.png"; ?>" class="img-circle"
                         style="height:40px; width:40px;margin-right: 8px;float:left;">
                    <?php
                }else{
                    ?><img src="<?php echo base_url().$p['avatar']; ?>" class="img-circle"
                           style="height:40px; width:40px;margin-right: 8px;float:left;">
                    <?php
                }
                ?>
                <p style=""><b><?php echo $p['username']?></b> commented on "<?php echo $p['name']; ?>"</p>
            </li>
            <?php
        }
    }?>
</ul>