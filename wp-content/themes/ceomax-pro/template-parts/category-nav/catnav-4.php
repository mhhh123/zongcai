<?php
	$term = get_category(get_query_var('cat'));
?>
<?php if ( _ceo('ceo-cat-mbx') == true): ?>
<div class="ceo-container ceo-catnav-wz">
<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
</div>
<?php endif; ?>
<?php
$cate_background_img=get_term_meta($cat,'cate_background_img',1);
if(!empty($cate_background_img['url'])){ ?>
<section class="cat-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo $cate_background_img['url']; ?>);">
<?php }elseif(_ceo('category_default_thum')){ ?>
<section class="cat-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('category_default_thum'); ?>);">
<?php }?>
	<div class="ceo-overlay-primary ceo-position-cover"></div>
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
<div class=" ceo-container">
    <div class="" style="position: relative;">
    	<h3 class="ceo-cat-4-h3"><?php single_cat_title(); ?>
            <?php if ( _ceo('ceo-cat-tj') == true): ?>
            <i class="ceo-cat-tj" ceo-tooltip="共 <?php echo aye_get_cat_postcount($term->term_id); ?> 篇文章"><?php echo aye_get_cat_postcount($term->term_id); ?></i>
            <?php endif; ?>
        </h3>
    	<p class="ceo-cat-4-p" style="position: absolute;top: -120px;color: #fff;"><?php echo category_description();?></p>
    	<?php if(_ceo('ceo-cat-an') == true ): ?>
    	<a class="ceo-web-nav" href="<?php if(_ceo('ceo-cat-an-sz'))echo _ceo('ceo-cat-an-sz')['ceo-cat-an-link']; ?>"  target="_blank"><?php if(_ceo('ceo-cat-an-sz'))echo _ceo('ceo-cat-an-sz')['ceo-cat-an-title']; ?></a>
    	<?php endif; ?>
    </div>
    <div class="ceo-side-lie ceo-padding-left-30 ceo-grid-medium" ceo-grid>
        <section class="ceo-side-lie-z list-nav single-main b-b ceo-background-default ceo-catnav-3" style=" margin-top: -80px!important;">
            <?php if(_ceo('ceo-cat-nav') == true ): ?>
        	<ul class="ceo-margin-remove-bottom">
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
        
            <?php if ( _ceo('ceo-cat4-jgsx') == true): ?>
            <div class="ceo-htt"></div>
        	<div class="ceo-text-small ceo-flex ceo-flex-middle ceo-catnav-3s ceo-catnav-ck">
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
        <div class="ceo-side-lie-y ceo-width-auto" style="padding-left: 0;margin-top: -80px!important;padding-left: 20px;">
            <div class="sidebar" style="height: 93.63%">
            <section class="ceo-catnav-3 ceo-background-default ceo-position-relative" style="height: 100%">
                <div class="ceo_sidebar_web">
                    <div class="content_ccmrt" style="background: url(<?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-img']; ?>) center center no-repeat;background-size: 100% 100%;">
                        <h2><?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-title']; ?></h2>
                        <button class="ceo-button ceo-button-small">
                          <a class="ceo-web-ys" href="<?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-link']; ?>" rel="noreferrer nofollow" target="_blank"><?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-an']; ?></a>
                        </button>
                    </div>
                    <div class="content_ccmrm">
                        <p><?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-jy']; ?></p>
                        <p><?php if(_ceo('ceo-cat-fl-sz'))echo _ceo('ceo-cat-fl-sz')['ceo-cat-fl-jyf']; ?></p>
                    </div>
                    <div class="cate-hot-content">
                        <?php
                        $wp_query = new WP_Query(
                            array(
                                'cat'            => get_queried_object_id(),
                                'post_type'      => 'post',
                                'posts_per_page' => 10,
                                'post_status'    => 'publish',
                                'meta_key'       => 'views',
                                'orderby'        => 'meta_value_num',
                                'order'          => 'DESC',
                            )
                        );
    
                        // 循环
                        while (have_posts()) : the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" <?php echo _target_blank();?>><?php the_title(); ?></a>
                                <span><?php echo get_the_date("Y-m-d"); ?></span>
                            </li>
    
                        <?php
                        endwhile;
                        // 重置查询
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
</div>