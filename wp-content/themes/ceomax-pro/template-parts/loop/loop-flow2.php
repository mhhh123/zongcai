<?php
$post_id =  get_the_ID();
?>
<div class="ceo-card ceo-flex ceo-flex-center ceo-flex-middle">
    <div class="flow-item b-r-4 ceo-background-default ceo-overflow-hidden ceo-vip-icons">
        <?php if (_ceo('ceo_cat_viptb') == true && _ceo('ceo_shop_whole') && CeoShopCoreProduct::hasVipFree($post_id)) : ?>
        <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
        <span class="meta-vip-tag"></span>
        <?php endif; ?>
        <?php endif; ?>
        <div class="ceo_app_img ceo-cat-sucai-box">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover ceo-display-block ceo-cat-sucai">
                <span><i class="ceofont ceoicon-download-line"></i> 立即下载</span>
        	    <img data-src="<?php echo site_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload">
        	</a>
        	<?php if(_ceo('ceo_cat_title') == true ): ?>
            <div class="ceo-cat-sucai-title ceo-position-bottom ceo-text-truncate">
                <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>">
                    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line"></i><?php endif; ?><?php the_title(); ?>
                </a>
            </div>
            <?php endif; ?>
    	</div>
        <?php ?>
    </div>
</div>