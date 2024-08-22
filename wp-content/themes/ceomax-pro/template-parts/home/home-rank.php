<?php $rank_num = _ceo('rank_num');?>

<section class="rank">
	<div class="ceo-container ceo-margin-medium-top ceo-margin-medium-bottom">
	    <div class="section-title ceo-flex ceo-flex-middle">
	        <i class="ceofont <?php echo _ceo('rank_icon'); ?> ceo-icon-index"></i>
			<h3 class="ceo-flex-1 ceo-display-inline-block ceo-margin-remove"><?php echo _ceo('rank_title','排行榜'); ?></h3>
			<a href="<?php echo _ceo('rank_link'); ?>" target="_blank" class="more b-r-4 ceo-display-inline-block ceo-text-small ceo-text-muted">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
		</div>
		<div class="b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-medium-top">
			<div class="ceo-grid-collapse" ceo-grid>
				<div class="rank-menu ceo-width-1-1@s ceo-padding ceo-padding-remove-right ceo-width-auto@xl" ceo-switcher>
					<?php if( _ceo('show_rank_view') == true ): ?>
					<li><a href="#"><i class="ceofont ceoicon-eye-line ceo-margin-right"></i>浏览排行榜</a></li>
					<?php endif; ?>
					<?php if( _ceo('show_rank_zan') == true ): ?>
					<li><a href="#"><i class="ceofont ceoicon-thumb-up-line ceo-margin-right"></i>点赞排行榜</a></li>
					<?php endif; ?>
					<?php if( _ceo('show_rank_collect') == true ): ?>
					<li><a href="#"><i class="ceofont ceoicon-star-line ceo-margin-right"></i>收藏排行榜</a></li>
					<?php endif; ?>
					<?php if( _ceo('show_rank_comment') == true ): ?>
					<li><a href="#"><i class="ceofont ceoicon-message-2-line ceo-margin-right"></i>评论排行榜</a></li>
					<?php endif; ?>
				</div>
				<div id="component-tab-left" class="ceo-width-1-1@s ceo-switcher ceo-width-expand">
					<?php if( _ceo('show_rank_view') == true ): ?>
					<div class="rank-main ceo-padding ceo-animation-slide-left-small ceo-animation-slide-left-small">
						<?php
						$args=array(
							'ignore_sticky_posts' => 1,
							'meta_key' => 'views',
							'orderby' => 'meta_value_num',
							'showposts' => $rank_num
						);
                        ///////////start CACHE ////////////////
                        if (CeoCache::is()) {
                            $_the_cache_key = 'show_rank_view'.'-'.$rank_num.'-'.$rank_num;//args 指定的key
                            $_the_cache_data = CeoCache::get($_the_cache_key);
                        }
                        ///////////end CACHE ////////////////

                        if ($_the_cache_data && is_string($_the_cache_data)) {
                            echo $_the_cache_data;
                        } else {
                            $wp_query2 = new WP_Query($args);
                        ob_start('ceocache_ob');
						if ( $wp_query2->have_posts() ) : while ( $wp_query2->have_posts() ) : $wp_query2->the_post();
						?>

						<div class="rank-item ceo-padding-small ceo-margin-bottom  ceo-active">
							<div class="ceo-grid-medium ceo-rank-link-a" ceo-grid>
								<div class="ceo-width-auto ceo-visible@s">
									<a href="<?php the_permalink(); ?>" target="_blank" class="rank-item-cover b-r-4 ceo-display-block ceo-overflow-hidden">
										<img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload">
									</a>
								</div>
								<div class="ceo-width-auto">
									<div class="rank-tese rank-item-title">
										<a href="<?php the_permalink(); ?>" target="_blank">
										<?php get_template_part( 'template-parts/tese/rank', 'tese' ); ?>
									    <?php the_title(); ?>
									    </a>
									</div>
								</div>
								<div class="ceo-width-auto rank-item-cat ceo-text-center ceo-text-small">
								    <i class="ceofont ceoicon-folder-2-line"></i>
									<?php
									$category = get_the_category();
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
									?>
								</div>
								<div class="ceo-width-auto rank-item-author ceo-text-center ceo-text-center ceo-text-small ceo-visible@s">
									<i class="ceofont ceoicon-shield-user-line"></i><?php the_author_posts_link(); ?>
								</div>
								<div class="ceo-width-expand ceo-text-right rank-item-count ceo-text-small">
									<i class="ceofont ceoicon-eye-line"></i><span class="ceo-text-warning"> <?php post_views('', ''); ?> </span>浏览
								</div>
							</div>
						</div>

						<?php endwhile; endif;
                            wp_reset_query();
                            if (CeoCache::is()) {
                                CeoCache::set($_the_cache_key, ob_get_contents());
                                ob_end_flush();
                        } } ?>

					</div>
					<?php endif; ?>
					<!-- 浏览排行 -->

					<?php if( _ceo('show_rank_zan') == true ): ?>
					<div class="rank-main ceo-padding ceo-animation-slide-left-small">
						<?php
						$args=array(
							'ignore_sticky_posts' => 1,
							'meta_key' => 'dotGood',
							'orderby' => 'meta_value_num',
							'showposts' => $rank_num
						);
                        ///////////start CACHE ////////////////
                        if (CeoCache::is()) {
                            $_the_cache_key = 'show_rank_zan'.'-'.$rank_num.'-'.$rank_num;//args 指定的key
                            $_the_cache_data = CeoCache::get($_the_cache_key);
                        }else{
                        }
                        ///////////end CACHE ////////////////
                        if ($_the_cache_data && is_string($_the_cache_data)) {
                            echo $_the_cache_data;
                        } else {
                        ob_start('ceocache_ob');
                            $wp_query2 = new WP_Query($args);

                            if ( $wp_query2->have_posts() ) : while ( $wp_query2->have_posts() ) : $wp_query2->the_post();
						?>

						<div class="rank-item ceo-padding-small ceo-margin-bottom">
							<div class="ceo-grid-medium ceo-rank-link-a" ceo-grid>
								<div class="ceo-width-auto ceo-visible@s">
									<a href="<?php the_permalink(); ?>" target="_blank" class="rank-item-cover b-r-4 ceo-display-block ceo-overflow-hidden">
										<img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload">
									</a>
								</div>
								<div class="ceo-width-auto">
									<div class="rank-tese rank-item-title">
										<a href="<?php the_permalink(); ?>" target="_blank">
										<?php get_template_part( 'template-parts/tese/rank', 'tese' ); ?>
									    <?php the_title(); ?>
									    </a>
									</div>
								</div>
								<div class="ceo-width-auto rank-item-cat ceo-text-center ceo-text-small">
								    <i class="ceofont ceoicon-folder-2-line"></i>
									<?php
									$category = get_the_category();
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
									?>
								</div>
								<div class="ceo-width-auto rank-item-author ceo-text-center ceo-text-center ceo-text-small ceo-visible@s">
									<i class="ceofont ceoicon-shield-user-line"></i><?php the_author_posts_link(); ?>
								</div>
								<div class="ceo-width-expand ceo-text-right rank-item-count ceo-text-small">
									<i class="ceofont ceoicon-thumb-up-line"></i><span class="ceo-text-warning"> <?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?> </span>点赞
								</div>
							</div>
						</div>

						<?php endwhile; endif;
                            wp_reset_query();
                            if (CeoCache::is()) {
                                CeoCache::set($_the_cache_key, ob_get_contents());
                                ob_end_flush();
                        } } ?>

					</div>
					<?php endif; ?>
					<!-- 点赞排行 -->

					<?php if( _ceo('show_rank_collect') == true ): ?>
					<div class="rank-main ceo-padding ceo-animation-slide-left-small">
						<?php
						global $wpdb;
    					$wpdb->collection = $wpdb->prefix.'collection';
						$args=array(
							'ignore_sticky_posts' => 1,
							'orderby' => 'meta_value_num',
							'showposts' => $rank_num
						);
                        ///////////start CACHE ////////////////
                        if (CeoCache::is()) {
                            $_the_cache_key = 'show_rank_collect'.'-'.$rank_num.'-'.$rank_num;//args 指定的key
                            $_the_cache_data = CeoCache::get($_the_cache_key);
                        }else{

                        }
                        ///////////end CACHE ////////////////
                        if ($_the_cache_data && is_string($_the_cache_data)) {
                            echo $_the_cache_data;
                        } else {
                        ob_start('ceocache_ob');
                            $wp_query2 = new WP_Query($args);
						if ( $wp_query2->have_posts() ) : while ( $wp_query2->have_posts() ) : $wp_query2->the_post();
						?>

						<div class="rank-item ceo-padding-small ceo-margin-bottom">
							<div class="ceo-grid-medium ceo-rank-link-a" ceo-grid>
								<div class="ceo-width-auto ceo-visible@s">
									<a href="<?php the_permalink(); ?>" target="_blank" class="rank-item-cover b-r-4 ceo-display-block ceo-overflow-hidden">
										<img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload">
									</a>
								</div>
								<div class="ceo-width-auto">
									<div class="rank-tese rank-item-title">
										<a href="<?php the_permalink(); ?>" target="_blank">
										<?php get_template_part( 'template-parts/tese/rank', 'tese' ); ?>
									    <?php the_title(); ?>
									    </a>
									</div>
								</div>
								<div class="ceo-width-auto rank-item-cat ceo-text-center ceo-text-small">
								    <i class="ceofont ceoicon-folder-2-line"></i>
									<?php
									$category = get_the_category();
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
									?>
								</div>
								<div class="ceo-width-auto rank-item-author ceo-text-center ceo-text-center ceo-text-small ceo-visible@s">
									<i class="ceofont ceoicon-shield-user-line"></i><?php the_author_posts_link(); ?>
								</div>
								<div class="ceo-width-expand ceo-text-right rank-item-count ceo-text-small">
									<i class="ceofont ceoicon-star-line"></i><span class="ceo-text-warning"> <?php echo count_collection_current_post( $post->ID ); ?> </span>收藏
								</div>
							</div>
						</div>
						<?php endwhile; endif;
                            wp_reset_query();
                            if (CeoCache::is()) {
                                CeoCache::set($_the_cache_key, ob_get_contents());
                                ob_end_flush();
                        } } ?>

					</div>
					<?php endif; ?>
					<!-- 收藏排行 -->

					<?php if( _ceo('show_rank_comment') == true ): ?>
					<div class="rank-main ceo-padding ceo-animation-slide-left-small">
						<?php
                        $args=array(
                            'post_type'             => array( 'post' ),
                            'showposts'             => $rank_num,
                            'ignore_sticky_posts'   => true,
                            'orderby'               => 'comment_count',
                            'order'                 => 'desc',
                        );

                        ///////////start CACHE ////////////////
                        if (CeoCache::is()) {
                            $_the_cache_key = 'show_rank_comment'.'-'.$rank_num.'-'.$rank_num;//args 指定的key
                            $_the_cache_data = CeoCache::get($_the_cache_key);
                        }else{

                        }
                        ///////////end CACHE ////////////////
                        if ($_the_cache_data && is_string($_the_cache_data)) {
                            echo $_the_cache_data;
                        } else {
                        ob_start('ceocache_ob');
                            $wp_query2 = new WP_Query($args);
                        while ( $wp_query2->have_posts() ) : $wp_query2->the_post();
						?>

						<div class="rank-item ceo-padding-small ceo-margin-bottom">
							<div class="ceo-grid-medium ceo-rank-link-a" ceo-grid>
								<div class="ceo-width-auto ceo-visible@s">
									<a href="<?php the_permalink(); ?>" target="_blank" class="rank-item-cover b-r-4 ceo-display-block ceo-overflow-hidden">
										<img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="lazyload">
									</a>
								</div>
								<div class="ceo-width-auto">
									<div class="rank-tese rank-item-title">
										<a href="<?php the_permalink(); ?>" target="_blank">
										<?php get_template_part( 'template-parts/tese/rank', 'tese' ); ?>
									    <?php the_title(); ?>
									    </a>
									</div>
								</div>
								<div class="ceo-width-auto rank-item-cat ceo-text-center ceo-text-small">
								    <i class="ceofont ceoicon-folder-2-line"></i>
									<?php
									$category = get_the_category();
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
									?>
								</div>
								<div class="ceo-width-auto rank-item-author ceo-text-center ceo-text-center ceo-text-small ceo-visible@s">
									<i class="ceofont ceoicon-shield-user-line"></i><?php the_author_posts_link(); ?>
								</div>
								<div class="ceo-width-expand ceo-text-right rank-item-count ceo-text-small">
									<i class="ceofont ceoicon-message-2-line"></i><span class="ceo-text-warning"> <?php echo $post->comment_count; ?> </span>评论
								</div>
							</div>
						</div>

						<?php endwhile;
                            wp_reset_query();
                            if (CeoCache::is()) {
                                CeoCache::set($_the_cache_key, ob_get_contents());
                                ob_end_flush();
                        } } ?>

					</div>
					<?php endif;
					?>
					<!-- 评论排行 -->

				</div>
			</div>
		</div>
	</div>
</section>
