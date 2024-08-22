<?php
$ceo_post_video=get_post_meta(get_the_ID(),'post_video_url',1);
$post_has_video = ! empty($ceo_post_video) ? true : false;
$post_id =  get_the_ID();

global $ceo_width_4;
if (empty($ceo_width_4)) {
    $ceo_width_4 = 'ceo-width-1-4';
}


?>
<div class="ceo-width-1-1@s ceo-width-1-2  ceo-width-1-4@m ceo-width-1-4@l <?php echo $ceo_width_4;?>@xl">
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
        <div class="ceo_app_img">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover ceo-display-block ceo-overflow-hidden <?php if($post_has_video)echo 'post-has-video ' ?>">
    
                <?php
                    if(!empty($ceo_post_video)){
                        echo '<span></span>';
                    }
                ?>
        	    <img data-src="<?php echo post_thumbnail_src($img_w,$img_h); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="ceo-width-1-1@s lazyload">
        	</a>
    	</div>
        <?php

        ?>
        <div class="ceo-padding-remove">
            <?php if(_ceo('ceo_cat_title') == true ): ?>
            <div class="card-title-desc">
                <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="title ceo-display-block" title="<?php the_title(); ?>">
                    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>

        <?php if(_ceo('ceo_cat_tops') == true ): ?>
        <div class="ceo_freepath_subtitle">
            <!--分类-->
            <?php if(_ceo('ceo_cat_catfl') == true ): ?>
            <div class="ceo_freepath_zhujiang">
                <?php
    			$category = get_the_category();
    			if($category[0]){
    				echo '<a href="'.get_category_link($category[0]->term_id ).'"><i class="ceofont ceoicon-folder-open-line ceo-right-3"></i>'.$category[0]->cat_name.'</a>';
    			} ?>
    		</div>
    		<?php endif; ?>
    		<!--演示-->
    		<?php if(_ceo('ceo_cat_demo') == true ): ?>
            <div class="ceo_freepath_keshi">
                <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
                    <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" ceo-tooltip="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>">
                        <i class="ceofont ceoicon-computer-line"></i>
                    </a>
                <?php }?>
            </div>
            <?php endif; ?>
            <!--标签-->
            <div class="ceo_biaoqian">
            <?php get_template_part( 'template-parts/tese/custom', 'tese' ); ?>
            <?php if(_ceo('ceo_cat_tese') == true ): ?>
            <?php
            $tese_arr = get_post_meta( get_the_ID(), 'ceo-tese-tag', true );
            if(!empty($tese_arr)){
                $ymetaValue = $tese_arr;
            }else{
                $ymetaValue='';
            }
            
            if ($ymetaValue == 'default') {
                $ymetaValue = _ceo('test_tag_default_use');
            }
            
            if (($ymetaValue=="remen")) {
                echo '<div class="ceo-tese-remen"><span class="i">#</span>热门</div>';
            }

            elseif (($ymetaValue=="dujia")) {
                echo '<div class="ceo-tese-dujia"><span class="i">#</span>独家</div>';
            }

            elseif (($ymetaValue=="zuixin")) {
                echo '<div class="ceo-tese-zuixin"><span class="i">#</span>最新</div>';
            }

            elseif (($ymetaValue=="tuijian")) {
                echo '<div class="ceo-tese-tuijian"><span class="i">#</span>推荐</div>';
            }

            elseif (($ymetaValue=="jingpin")) {
                echo '<div class="ceo-tese-jingpin"><span class="i">#</span>精品</div>';
            }

        	elseif (($ymetaValue=="buxuanze")) {
           	    echo '';
           	}
            ?>
            <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    	<?php if(_ceo('ceo_cat_foos') == true ): ?>
    	<div class="ceo-padding-small card-foot ceo-card-foot">
    		<div class="item-foot ceo-flex ceo-flex-middle">
    			<div class="avatar ceo-flex-1 ceo-flex ceo-flex-middle">
    		    <?php if(_ceo('ceo_cat_archive') == true ): ?>
    				<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
    			<?php endif; ?>
    		    <?php if(_ceo('ceo_cat_archive_t') == true ): ?>
    				<span class="ceo-font-mini ceo-display-block ceo-margin-small-left"><?php the_author_posts_link(); ?></span>
    			<?php endif; ?>
    			</div>
    			<div class="cat ceo-font-mini ceo-text-truncate">
    			    <?php if(_ceo('ceo_cat_riqi') == true ): ?>
    			    <span class="ceo-yc ceo-ycd ceo-display-inline-block ceo-flex ceo-flex-middle ceo-card-margin-left" ceo-tooltip="<?php the_time('Y-m-d') ?>" ><i class="ceofont ceoicon-calendar-todo-line"></i> <?php  echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?>
    			    </span>
    			    <?php endif; ?>
    			    <?php if(_ceo('ceo_cat_views') == true ): ?>
    				<span class="ceo-ycd ceo-display-inline-block ceo-flex ceo-flex-middle ceo-card-margin-left"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?>
    				</span>
    				<?php endif; ?>
    				<?php if (_ceo('ceo_cat_jiage') == true && _ceo('ceo_shop_whole')) : ?>
                    <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                    <?php echo CeoShopCoreProduct::getPriceFormat($post_id, true, true, 1) ?>
                    <?php endif; ?>
                    <?php endif; ?>
    			</div>
    		</div>
    	</div>
    	<?php endif; ?>
    </div>
</div>
