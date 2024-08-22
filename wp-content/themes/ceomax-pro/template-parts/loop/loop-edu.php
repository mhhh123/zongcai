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
$post_id =  get_the_ID();
?>
<div class="card-item ceo-background-default ceo-overflow-hidden ceo-vip-icons">
    <?php if (_ceo('ceo_cat_viptb') == true && _ceo('ceo_shop_whole') && CeoShopCoreProduct::hasVipFree($post_id)) : ?>
    <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
    <span class="meta-vip-tag"></span>
    <?php endif; ?>
    <?php endif; ?>
    <div class="ceo-loop-edu">
        <div class="ceo_app_img">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover ceo-display-block ceo-overflow-hidden">
        	    <img data-src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="ceo-width-1-1@s lazyload">
        	</a>
    	</div>
        <?php ?>
        <div class="ceo-loop-edu-text">
            <div class="ceo-loop-edu-text-title">
                <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>">
                    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?>
                </a>
            </div>
            <div class="ceo-loop-edu-text-subtitle">
                <div class="ceo-loop-edu-text-subtitle-author"><i class="ceofont ceoicon-user-follow-line"></i><?php the_author_posts_link(); ?></div>
                <div class="ceo-loop-edu-text-subtitle-keshi"><?php echo get_post_down_info_by_key('课时'); ?>
                <?php if(_ceo('ceo_cat_demo') == true ): ?>
                <div class="ceo_freepath_keshi ceo-loop-edu-text-subtitle-keshi-demo">
                    <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
                        <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" ceo-tooltip="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>">
                            <i class="ceofont ceoicon-computer-line"></i>
                        </a>
                    <?php }?>
                </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="ceo-loop-edu-text-desc">
                <p>
                <?php
                $get_the_content= preg_replace ( '/\[gallery (.*?)\]/s' , '' , get_the_content() );
                echo wp_trim_words( $get_the_content, 60 );
                ?>
                </p>
            </div>
            <div class="ceo-loop-edu-text-pay">
                <span><?php post_views('', ''); ?>人已学习</span>
                <em>
                <?php
    			$category = get_the_category();
    			if($category[0]){
    				echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
    			} ?>
    			</em>
            </div>
        </div>
    </div>
</div>
