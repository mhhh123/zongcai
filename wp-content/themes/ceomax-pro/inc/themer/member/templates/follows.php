<?php

if(empty($user_id)){
    $user_id=get_current_user_id();
}
?>

<div class="profile-tab" data-user="<?php echo $user_id;?>">
    <div class="profile-tab-item active">我关注的人</div>
    <div class="profile-tab-item">关注我的人</div>
</div>
<div class="profile-tab-content active">
    <?php
    if($follows && is_array($follows)){ ?>
        <ul class="follow-items">
            <?php foreach ($follows as $follow)
                echo CEO_Follow::load_template_static('follow', array('follow' => $follow));
            ?>
        </ul>
        <?php if($total>$number) { ?><div class="load-more-wrap"><div href="javascript:;" class="btn load-more j-user-follows"><?php _e( 'Load more posts', 'ceo' );?></div></div><?php } ?>
    <?php }else{ ?>
        <div class="profile-no-content">
            您目前没有关注任何人～
        </div>
    <?php } ?>
</div>
<div class="profile-tab-content">
    <div class="profile-no-content follow-items-loading">
    </div>
    <ul class="follow-items" style="display: none;"></ul>
    <div class="load-more-wrap" style="display: none;"><div href="javascript:;" class="btn load-more j-user-followers" data-page="0"><?php _e( 'Load more posts', 'ceo' );?></div></div>
    <div class="profile-no-content" style="display: none;">
        目前没有关注您的人~
    </div>
</div>