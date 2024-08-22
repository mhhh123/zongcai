<div class="ceo-child-width-1-2 ceo-child-width-1-5@m ceo-grid-medium" ceo-grid="masonry: true">
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

    if(have_posts()) :
        if ($_the_cache_data && is_string($_the_cache_data)) {
            echo $_the_cache_data;
        } else {
            ob_start('ceocache_ob');
    while (have_posts()) : the_post(); ?>
	<?php get_template_part( 'template-parts/loop/loop', 'flow2' ); ?>
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