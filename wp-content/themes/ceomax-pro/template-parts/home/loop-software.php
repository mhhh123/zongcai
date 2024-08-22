<?php
global $ceo_width_4;
if (empty($ceo_width_4)) {
    $ceo_width_4 = 'ceo-width-1-4';
}
$post_id =  get_the_ID();
?>
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
<div class="ceo-width-1-1@s ceo-width-1-4@m ceo-width-1-4@l <?php echo $ceo_width_4;?>@xl">
    <div class="ceo_category_software_s card-item b-r-4 ceo-background-default ceo-overflow-hidden ceo-vip-icons">
        <div class="ceo_category_software">
            <ul>
                <li>
                	<div class="ceo_category_software_inner">
                    	<h5><a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> ><?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?></a></h5>
                        <div class="ceo_category_software_film">
                        	<div class="ceo_category_software_film_icon">
                            	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> style="background:url(<?php echo post_thumbnail_src($img_w,$img_h); ?>) center no-repeat; background-size:cover;" alt="<?php the_title(); ?>"></a>
                            </div>
                            <div class="ceo_category_software_film_mid">
                            	<div class="ceo_category_software_film_star"><?php echo soft_score_output(get_post_down_info_by_key('评分')); ?></div>
                                <p><?php echo get_post_down_info_by_key('大小'); ?><em>|</em><?php echo get_post_down_info_by_key('语言'); ?></p>
                            </div>
                            <div class="ceo_category_software_film_dl">
                            	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> >下载</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>