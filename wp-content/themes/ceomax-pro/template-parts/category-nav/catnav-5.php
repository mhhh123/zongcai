<?php
	$term = get_category(get_query_var('cat'));
?>
<section class="cat5-bg">
    <?php
    $cate_background_img=get_term_meta($cat,'cate_background_img',1);
    if(!empty($cate_background_img['url'])){ ?>
	    <div class="cat5-bg-img" style="background-image:url(<?php echo $cate_background_img['url']; ?>)"></div>
    <?php }elseif(_ceo('category_default_thum')){ ?>
        <div class="cat5-bg-img" style="background-image:url(<?php echo _ceo('category_default_thum'); ?>)"></div>
    <?php }else{?>
        <div class="cat5-bg-img" style="background-image:url(<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=220&w=1920&zc=1)"></div>
    <?php }?>
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-container">
    	<div class="cat5-title">
    		<h3 class="ceo-light ceo-margin-remove"><?php single_cat_title(); ?>
                <?php if ( _ceo('ceo-cat-tj') == true): ?>
                <i class="ceo-cat-tj" ceo-tooltip="共 <?php echo aye_get_cat_postcount($term->term_id); ?> 篇文章"><?php echo aye_get_cat_postcount($term->term_id); ?></i>
                <?php endif; ?>
            </h3>
    		<p><?php echo category_description();?></p>
    	</div>
    </div>
</section>
<?php if(_ceo('ceo_bolang') == true ): ?>
<div class="ceo-meihua-boo">
	<svg class="ceo-meihua-boo-waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
		<defs>
			<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
		</defs>
		<g class="ceo-meihua-boo-parallax">
			<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
			<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
			<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
			<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
		</g>
	</svg>
</div>
<?php endif; ?>
            
<section class="list-nav b-b ceo-background-default ceo-catnav-1">
    <?php if(_ceo('ceo-cat-nav') == true ): ?>
	<ul class="ceo-container ceo-margin-remove-bottom">
	    <div class="ceo-lanmu-fenlei">
		<dt><i class="ceofont ceoicon-list-check"></i><?php echo _ceo('ceo_cat_nav_title1'); ?>：</dt>
		<?php
        $archive_filter_cat_1_arrs=(array) _ceo('archive_filter_cat_1');
        $archive_filter_cat_1=implode(' ',$archive_filter_cat_1_arrs);
        foreach ($archive_filter_cat_1_arrs as $v) {
            $term_v = get_term($v, 'category');
            if ($term_v) {
                echo '<li class="cat-item cat-item-'.$term_v->term_id.'"><a href="'.get_category_link($term_v->term_id).'">' . $term_v->name . '</a></li>';
            }
        }
		?>
		</div>
	</ul>
	<?php endif; ?>
    <?php ceo_catnav_ji(); ?>

	<div class="ceo-container ceo-text-small ceo-flex ceo-flex-middle ceo-catnav-ck">
        <?php
            get_template_part( 'template-parts/category-nav/catnav-bar' );
        ?>
    </div>

    <?php if ( _ceo('ceo-cat5-jgsx') == true): ?>
    <div class="ceo-htt"></div>
    <div class="ceo-container ceo-text-small ceo-flex ceo-flex-middle ceo-catnav-ck">
        <div class="ceo-catnav-ss ceo-flss ceo-shouji-pass ceo-flex-1">
            <ul class="ceo-container ceo-margin-remove-bottom">
                <dt class="cat-item-dt"><i class="ceofont ceoicon-vip-diamond-line"></i>价格筛选：</dt>
                <li class="cat-item"><a href="<?php echo get_category_link(get_queried_object_id()); ?>">全部</a></li>
				<li class="cat-item"><a href="<?php echo get_category_link(get_queried_object_id()); ?>?filter_type_1=1">免费</a></li>
				<li class="cat-item"><a href="<?php echo get_category_link(get_queried_object_id()); ?>?filter_type_2=1">收费</a></li>
				<li class="cat-item"><a href="<?php echo get_category_link(get_queried_object_id()); ?>?filter_type_3=1">VIP专属</a></li>
				<li class="cat-item cat-item-18"><a href="<?php echo get_category_link(get_queried_object_id()); ?>?filter_type_4=1">VIP免费</a></li>
            </ul>
		</div>
		<?php if ( _ceo('ceo-cat-vip') == true): ?>
		<a class="ceo-cat-vip-Btn" href="<?php if(_ceo('ceo-cat-vip-sz'))echo _ceo('ceo-cat-vip-sz')['ceo-cat-vip-link']; ?>" target="_blank"><i class="ceofont <?php if(_ceo('ceo-cat-vip-sz'))echo _ceo('ceo-cat-vip-sz')['ceo-cat-vip-ico']; ?>"></i> <?php if(_ceo('ceo-cat-vip-sz'))echo _ceo('ceo-cat-vip-sz')['ceo-cat-vip-title']; ?></a>
		<?php endif; ?>
		<div class="ceo-fl-icon">
		    <?php if ( _ceo('ceo-cat-sx') == true): ?>
            <a class="hot ceo-category-shaixuan" href="<?php echo get_category_link($cat) ?>"> <i class="ceofont ceoicon-time-line"></i>最新 </a>
            <a class="hot ceo-category-shaixuan" href="<?php echo get_category_link($cat) ?>?order=hot"> <i class="ceofont ceoicon-fire-line"></i>最热 </a>
            <a class="hot ceo-category-shaixuan" href="<?php echo get_category_link($cat) ?>?order=rand"> <i class="ceofont ceoicon-refresh-line"></i>随机 </a>
        <?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
</section>