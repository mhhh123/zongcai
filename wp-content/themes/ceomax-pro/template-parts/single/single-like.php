<section id="ceoxiangguan" class="ceo-background-default b-b ceo-margin-bottom-20 ceo-margin-top-20 b-r-4 ceo-padding-30px ceo-xiangguan">
	<div class="ceo-xiangguan-wen">
	    <div class="ceo-qa-commont">
            <span class="ceo-qa-turn"><i class="ceofont ceoicon-heart-add-line"></i> <?php echo _ceo('single_article_c_title'); ?></span>
        </div>
	    <ul class="xgart-row">
            <?php
            $current_category = get_the_category();
            $cat='';
            if ($current_category && ! empty($current_category[0])) {
                $cat=$current_category[0]->cat_ID;
            }
            $posts_per_page = !empty(_ceo('single_article_c_num'))?_ceo('single_article_c_num'):10;

            $args_c = array(
                'cat'            => $cat,
                'post_type'      => 'post',
                'posts_per_page' => $posts_per_page,
                'post_status'    => 'publish',

            );
            if (CeoCache::is()) {
                $_the_cache_key  = md5(json_encode($args_c));
                $_the_cache_data = CeoCache::get($_the_cache_key);
            }

            $wp_query2 = new WP_Query($args_c);

            // 循环
            if ($_the_cache_data && is_string($_the_cache_data)) {
                echo $_the_cache_data;
            } else {
            ob_start('ceocache_ob');
            while ($wp_query2->have_posts()) : $wp_query2->the_post();
            ?>
            <li>
                <a href="<?php the_permalink();?>" <?php echo _target_blank();?> ><?php the_title();?></a>
                <span><?php echo get_the_date("Y-m-d",get_post());?></span>
            </li>

            <?php
            endwhile;
            // 重置查询
            wp_reset_query();
                if (CeoCache::is()) {
                    CeoCache::set($_the_cache_key, ob_get_contents());
                    ob_end_flush();
                }}
            ?>

        </ul>
	</div>
</section>