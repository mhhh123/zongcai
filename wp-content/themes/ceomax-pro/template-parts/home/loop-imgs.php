<?php
$ceo_post_video=get_post_meta(get_the_ID(),'post_video_url',1);
$post_has_video = ! empty($ceo_post_video) ? true : false;
$post_id =  get_the_ID();
?>
<div class="card-item ceo-background-default ceo-overflow-hidden ceo-imgs-icons">
    <div class="ceo-imgs-ico-i"><i class="ceofont ceoicon-fire-fill"></i><?php post_views('', ''); ?></div>

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
    <div class="ceo_cat_imgs">
    	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="ceo_cat_imgs_cover cover ceo-display-block ceo-overflow-hidden <?php if($post_has_video)echo 'post-has-video ' ?>">
            <?php
                if(!empty($ceo_post_video)){
                    echo '<span></span>';
                }
            ?>
    	    <img data-src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="ceo-width-1-1@s lazyload">
    	</a>
    	<div class="ceo_cat_imgs_box ceo-position-bottom">
        	<div class="ceo_cat_imgs_moteghj">
            	<h5><?php echo get_post_down_info_by_key('姓名'); ?></h5>
            	<div class="ceo-flex">
                    <p class="ceo-flex-1">地址：<?php echo get_post_down_info_by_key('地址'); ?></p>
                    <?php echo CeoShopCoreProduct::getPriceFormat($post_id, true, true, 1) ?>
                </div>
            </div>
        </div>
	</div>
	
	<div class="ceo_cat_imgs_motebtmsd">
        <?php if(get_post_meta( get_the_ID(), 'ceo_tuji_style', true )){?>
        <div class="ceo_cat_imgs_modergd"><?php echo get_the_tag_list('','');?></div>
        <?php }?>
    </div>
    <?php ?>
</div>
