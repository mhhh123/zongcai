<?php
$audio_url=get_post_meta(get_the_ID(),'audio_url',1);
$post_has_video = ! empty($audio_url) ? true : false;
$post_id =  get_the_ID();
?>
<div class="card-item b-r-4 ceo-background-default ceo-overflow-hidden ceo-vip-icons">
    <?php if (_ceo('ceo_cat_viptb') == true && _ceo('ceo_shop_whole') && CeoShopCoreProduct::hasVipFree($post_id)) : ?>
    <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
    <span class="meta-vip-tag"></span>
    <?php endif; ?>
    <?php endif; ?>
    <div class="ceo_app_img">
    	<a href="<?php the_permalink(); ?>" post-id="<?php echo get_the_ID();?>" <?php echo _target_blank();?> video-data="<?php echo $audio_url;?>" video-allow-play="<?php echo _ceo('yinyue_unlogin_allow_play') ? 1: (is_user_logged_in() ? 1 : 0) ?>" class="ceo-music-cat post-audio cover ceo-display-block ceo-overflow-hidden <?php if($post_has_video)echo 'post-has-video ' ?>" style="background: #1a1a1a;text-align: center;">
            <audio id="player-<?php echo get_the_ID();?>" class="audio-play" autoplay="autoplay" preload="none" src=""></audio>
            <div class="audio-pan">
                <img id="audioplayer" class="play-icon" src="<?php echo get_template_directory_uri();?>/static/images/play.png">
                <img class="play-dot" src="<?php echo get_template_directory_uri();?>/static/images/zhen-btn.png">
                <img class="play-zhen" src="<?php echo get_template_directory_uri();?>/static/images/zhen.png" style="transform: rotate(-9deg);">
                <img class="play-pan" src="<?php echo get_template_directory_uri();?>/static/images/pan.png" style="animation: 0s ease 0s 1 normal none running none;">
            </div>
    	</a>
	</div>
    <?php ?>
    <div class="ceo-padding-remove">
        <?php if(_ceo('ceo_cat_title') == true ): ?>
        <div class="ceo-music-cat-title card-title-desc">
            <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="title ceo-display-block" title="<?php the_title(); ?>">
                <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>