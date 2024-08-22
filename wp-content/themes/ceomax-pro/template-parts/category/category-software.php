<div class="ceo-grid-medium" ceo-grid>
    <?php 
    $width_col=4;
    $category_this = get_queried_object();
    $category_id_this=$category_this->term_id;
    $is_enable_5_col = get_term_meta($category_id_this, 'is_enable_5_col', 'true');
    if($is_enable_5_col){
        $width_col=5;
    }
    ?>
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
	<?php
    if(empty($paged)){
        if (CeoCache::is()) {
            $_the_cache_key  = $_SERVER['REQUEST_URI'];
            $_the_cache_data = CeoCache::get($_the_cache_key);
        }
    }

    if(have_posts()) :
        if ($_the_cache_data && is_string($_the_cache_data)) {
            echo $_the_cache_data;
        } else {
            ob_start('ceocache_ob');
    while (have_posts()) : the_post(); ?>
    <?php ?>
	<div class="ajax-item ceo-width-1-1@s ceo-width-1-<?php echo $width_col; ?>@xl">
	    <!--软件列表-->
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
        <!--软件列表-->
	</div>
	<?php endwhile;
        if (CeoCache::is()) {
            CeoCache::set($_the_cache_key, ob_get_contents());
            ob_end_flush();
        }}
	else: ?>
	<div class="ceo-width-1-1">
		<div class="ceo-alert-primary ceo-width-1-2 ceo-container" ceo-alert>
			<a class="ceo-alert-close" ceo-close></a>
			<p class="ceo-padding-small ceo-text-center">暂无内容！</p>
		</div>
	</div>
	<?php endif; ?>
</div>

<div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
	<?php fenye(); ?>
</div>