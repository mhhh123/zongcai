<section class="side-art b-a b-r-4 ceo-background-default ceo-margin-bottom">
	<div class="b-b ceo-padding-small ceo-clearfix  ceo-flex ceo-flex-middle">
		<span class="side-title <?php if(_ceo('side_title_style') == true): ?>side-title-style<?php endif; ?> ceo-h5 ceo-float-left ceo-margin-remove ceo-position-relative"><?php echo _ceo('side_art_title'); ?></span>
		<span class="home-time ceo-float-right ceo-display-inline-block ceo-text-muted ceo-text-small ceo-flex-1 ceo-text-right"></span>
	</div>
	<ul class="ceo-list ceo-padding-remove ceo-overflow-auto ceo-sidebar-wenzhang">
		<?php
		$side_art_num = _ceo('side_art_num');
		$cat = get_the_category();
		foreach($cat as $key=>$category){
			$catid = $category->term_id;
		}
		$args = array('orderby' => 'rand','showposts' => $side_art_num ,'cat' => $catid );

        ///////////start CACHE ////////////////
        $args_c = array('orderby' => 'rand','showposts' => $side_art_num ,'cat' => $catid );//args 查询参数
        if (CeoCache::is()) {
            $_the_cache_key  = 'sidebar-article' . '-' . md5(json_encode($args_c));
            $_the_cache_data = CeoCache::get($_the_cache_key);
        } else {

        }
        ///////////end CACHE ////////////////

        if ($_the_cache_data && is_string($_the_cache_data)) {
            echo $_the_cache_data;
        } else {
            if(CeoCache::is()){
                ob_start('ceocache_ob');
            }

            $wp_query2 = new WP_Query($args_c);
		while ($wp_query2->have_posts()) : $wp_query2->the_post();
		?>

		<li class="ceo-margin-remove-top">
			<div class="b-b ceo-padding-small">
				<div ceo-grid class="ceo-grid-small">
					<div class="ceo-width-1-3">
						<a href="<?php the_permalink(); ?>" class="side-art-cover b-r-4 ceo-display-block ceo-overflow-hidden">
							<img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload" >
						</a>
					</div>
					<div class="ceo-width-2-3 ceo-sidebar-article-c">
						<div class="ceo-card">
							<p class="ceo-margin-small-bottom">
								<a href="<?php the_permalink(); ?>" target="_blank" class="ceo-display-block ceo-text-truncate"><?php the_title();?></a>
							</p>
							<div class="ceo-sidebar-article-ch ceo-text-meta ceo-margin-small-top ceo-flex">
								<span class="ceo-margin-right"><i class="ceofont ceoicon-calendar-todo-line"></i><?php the_time('Y-m-d') ?></span>
								<span class="ceo-margin-right ceo-flex ceo-flex-middle"><i class="ceofont ceofont ceoicon-eye-line"></i><?php post_views('', ''); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php endwhile;?>
		<?php wp_reset_query();
        if (CeoCache::is()) {
            CeoCache::set($_the_cache_key, ob_get_contents());
            ob_end_flush();
        } } ?>
	</ul>
</section>
<!-- 侧边栏热门文章模块 -->
