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
    if(empty($paged)){
        if (CeoCache::is()) {
            $_the_cache_key  = $_SERVER['REQUEST_URI'];
            $_the_cache_data = CeoCache::get($_the_cache_key);
        }
    }

    global $wp_query;
    $oriQueryVars = $wp_query->query_vars;

    // 获取置顶文章
    $stickyPosts = get_option('sticky_posts');
    if ($stickyPosts) {
        $stickyQuery = new WP_Query(array('post__in' => $stickyPosts, 'category_name' => $oriQueryVars['category_name'], 'ignore_sticky_posts' => true));
    } else {
        $stickyQuery = null;
    }

    if ($oriQueryVars['paged'] > 1) {
        // 重新查询文章
        $newQueryVars = $oriQueryVars;
        $maxNumPages = $wp_query->max_num_pages;
        $newQueryVars['post__not_in'] = $stickyPosts;
        $newQueryVars['offset'] = ($oriQueryVars['paged'] - 1) * $oriQueryVars['posts_per_page'] - $stickyQuery->post_count;
        $wp_query->query($newQueryVars);
        $wp_query->max_num_pages = $maxNumPages;
    } else {
        // 重新查询文章
        $newQueryVars = $oriQueryVars;
        $newQueryVars['post__not_in'] = $stickyPosts;
        $newQueryVars['posts_per_page'] -= $stickyQuery->post_count;
        $wp_query->query($newQueryVars);
        // 插入置顶文章
        if ($stickyQuery->posts) {
            array_unshift($wp_query->posts, ...$stickyQuery->posts);
        }
        $wp_query->post_count = count($wp_query->posts);
    }
    
    
    if(have_posts()) :
        if ($_the_cache_data && is_string($_the_cache_data)) {
            echo $_the_cache_data;
        } else {
            ob_start('ceocache_ob');
    while (have_posts()) : the_post(); ?>
    <?php ?>
	<div class="ajax-item ceo-width-1-1@s ceo-width-1-2 ceo-width-1-<?php echo $width_col; ?>@xl">
		<?php get_template_part( 'template-parts/home/loop', 'card' ); ?>
	</div>
	<?php endwhile;
        if (CeoCache::is()) {
            CeoCache::set($_the_cache_key, ob_get_contents());
            ob_end_flush();
        }}
	else: ?>

	<?php get_template_part( 'template-parts/ad/category', 'footer_ad' ); ?>
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