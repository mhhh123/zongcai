<div class="ceo-grid-medium" ceo-grid>
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
	
	<div class="ajax-item ceo-width-1-1@s ceo-width-1-2@xl">
		<?php get_template_part( 'template-parts/home/loop', 'blog' ); ?>
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