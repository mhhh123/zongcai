<?php
$post_id =  get_the_ID();
$ceo_post_video=get_post_meta(get_the_ID(),'post_video_url',1);
$post_has_video = ! empty($ceo_post_video) ? true : false;
?>
<div class="card-item b-r-4 ceo-background-default ceo-overflow-hidden ceo-vip-icons">
    <?php if (_ceo('ceo_cat_viptb') == true && _ceo('ceo_shop_whole') && CeoShopCoreProduct::hasVipFree($post_id)) : ?>
    <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
    <span class="meta-vip-tag"></span>
    <?php endif; ?>
    <?php endif; ?>

    <?php
        $img_w=_ceo('thumbnail-px')['width'];
        $img_h=_ceo('thumbnail-px')['height'];
        $style_w_h='';
    if(!empty($category = get_queried_object())){
        $category_id=$category->term_id;
        $thumbnail_custom = get_term_meta($category_id, 'thumbnail_px_custom', 'true');
        if(!empty($thumbnail_custom) && !empty($thumbnail_custom['height'])){
            $img_w = ! empty($thumbnail_custom['width']) ? $thumbnail_custom['width'] : '';
            $img_h = ! empty($thumbnail_custom['height']) ? $thumbnail_custom['height'] : '';
            $style_w_h = 'height:'.$img_h.'px';
        }
    }
    ?>
    <div class="ceo_app_img">
    	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="ceo-cardvideo-loop post-video ceo-display-block ceo-cover-container <?php if($post_has_video)echo 'post-has-video ' ?>">
            <?php
                if(!empty($ceo_post_video)){
                    echo '<span class="play-icon"></span>';
                    echo '<video autoplay="autoplay" loop="loop" data-src="'.$ceo_post_video.'" src="" style="display: none;" ceo-cover></video>';
                }
            ?>
    	    <img src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" class="ceo-width-1-1@s" ceo-cover>
    	</a>
	</div>
    <?php

    ?>
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