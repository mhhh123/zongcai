<?php
global $ceo_width_4;
if(empty($ceo_width_4)){
    $ceo_width_4='ceo-width-1-4';
}
$post_id = get_the_ID();
?>
<div class="ajax-item ceo-width-1-1@s ceo-width-1-2 <?php echo $ceo_width_4;?>@xl">
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
    
        //修复无法自定义尺寸问题
        $category_id='';
        if(!empty($category = get_queried_object())){
            $category_id=$category->term_id;
        }
        if (is_home() || is_single()) {
            $cate_arrs = get_the_category(get_the_ID());
            if ( ! empty($cate_arrs[0])) {
                $category_id = $cate_arrs[0]->term_id;
            }
        }
        if($category_id){
            $thumbnail_custom = get_term_meta($category_id, 'thumbnail_px_custom', 'true');
            if(!empty($thumbnail_custom) && !empty($thumbnail_custom['height'])){
                $img_w = ! empty($thumbnail_custom['width']) ? $thumbnail_custom['width'] : '';
                $img_h = ! empty($thumbnail_custom['height']) ? $thumbnail_custom['height'] : '';
                $style_w_h = 'height:'.$img_h.'px';
            }
        }
        //end
    
        ?>
        <div class="ceo_app_img ceo-cat-sucai-box">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover ceo-display-block ceo-overflow-hidden ceo-cat-sucai">
                <span><i class="ceofont ceoicon-download-line"></i> 立即下载</span>
        	    <img data-src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="ceo-width-1-1@s lazyload">
        	</a>
        	<?php if(_ceo('ceo_cat_title') == true ): ?>
            <div class="ceo-cat-sucai-title ceo-position-bottom ceo-text-truncate">
                <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>">
                    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?>
                </a>
            </div>
            <?php endif; ?>
	    </div>
    </div>
</div>
