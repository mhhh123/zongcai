<section id="ceoxiangguan" class="ceo-background-default b-b ceo-margin-bottom-20 ceo-margin-top-20 b-r-4 ceo-single-foos ceo-xiangguan">
	<div class="ceo-qa-commont section-title ceo-flex ceo-flex-middle">
		<h3 class="ceo-position-relative ceo-flex-1 ceo-display-inline-block ceo-margin-remove"><i class="ceofont ceoicon-file-text-line"></i> <?php echo _ceo('single_article_title'); ?></h3>
	</div>
	<div class="card ceo-margin-top">
		<div class="ceo-grid-ceosmls" ceo-grid>
			<?php

            ///////////start CACHE ////////////////
            $args_c = ['cat' => get_the_category()[0]->term_id, 'showposts' => _ceo('single_article_num')];//args 查询参数
            if (CeoCache::is()) {
                $_the_cache_key  = 'single-relevant' . '-' . md5(json_encode($args_c));
                $_the_cache_data = CeoCache::get($_the_cache_key);
            } else {

            }
            ///////////end CACHE ////////////////

            ?>
			<?php
            if ($_the_cache_data && is_string($_the_cache_data)) {
                echo $_the_cache_data;
            } else {
                if (CeoCache::is()) {
                    ob_start('ceocache_ob');
                }

            $wp_query2 = new WP_Query($args_c);
            while ($wp_query2->have_posts()) : $wp_query2->the_post(); ?>

			<div class="ceo-width-1-1@s ceo-width-1-2 ceo-width-1-4@xl">
				<?php get_template_part( 'template-parts/single/single', 'xiangguan' );?>

			</div>
			<?php endwhile;
            wp_reset_query();
            if (CeoCache::is()) {
                CeoCache::set($_the_cache_key, ob_get_contents());
                ob_end_flush();
            }
            }
			?>

		</div>
	</div>
</section>