<?php
global $ceo_width_4;
if(empty($ceo_width_4)){
    $ceo_width_4='ceo-width-1-4';
}
$post_id = get_the_ID();
?>
<div class="ajax-item ceo-width-1-1@s ceo-width-1-2 <?php echo $ceo_width_4;?>@xl">
    <div class="card-item b-r-4 ceo-background-default ceo-overflow-hidden ceo-img-icons">
        <div class="ceo-img-ico-i"><i class="ceofont ceoicon-image-line"></i> <?php echo ceo_img_quantity(); ?>张</div>
    
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
        <div class="ceo_cat_img">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover ceo-display-block ceo-overflow-hidden">
        	    <img data-src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="ceo-width-1-1@s lazyload">
        	</a>
        	<div class="ceo_cat_img_box ceo-position-bottom">
        	    <div class="ceo_cat_img_box_fit">
                    <h2 class="ceo-text-truncate"><a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p>浏览 <?php post_views('', ''); ?>次 · <?php  echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?></p>
                </div>
            </div>
    	</div>
        <?php ?>
    </div>
</div>
