<?php
	$cat_show = _ceo('cat_show');
	if (!$cat_show){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>热门分类，设置该模块内容！</p>
	</div>
</div>
<?php }else { ?>

<section class="topic">
	<div class="ceo-container ceo-margin-medium-top ceo-margin-bottom-40">
		<div class="ceo-catshow-h section-title ceo-flex ceo-flex-middle">
		    <i class="ceofont <?php echo _ceo('show_cat_icon'); ?> ceo-icon-index"></i>
			<h3 class="ceo-flex-1 ceo-display-inline-block ceo-margin-remove"><?php echo _ceo('show_cat_title'); ?></h3>
			<a href="<?php echo _ceo('show_cat_link'); ?>" target="_blank" class="more b-r-4 ceo-display-inline-block ceo-text-small ceo-text-muted">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
		</div>
		<div class="ceo-home-catshow-top" ceo-grid>
			<?php
			if ($cat_show) {
				foreach ( $cat_show as $key => $value) {
			?>
			<div class="ceo-dongtai-s ceo-width-1-1@s ceo-width-1-2@m ceo-width-1-2@l ceo-width-1-2@xl">
				<div class="ceo-dongtai topic-item b-r-4 ceo-background-default">
					<div ceo-grid>
						<div class="ceo-width-expand@xl">
							<h3><a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class="ceo-display-block"><?php echo $value['title']; ?></a></h3>
							<ul class="ceo-list ceo-text-small">
								<?php
                                ///////////start CACHE ////////////////
                                $args_c = ['cat' => $value['id'], 'showposts' => 4];//args 查询参数
                                if (CeoCache::is()) {
                                    $_the_cache_key  = 'home-catshow' . '-' . md5(json_encode($args_c));
                                    $_the_cache_data = CeoCache::get($_the_cache_key);
                                } else {
                                }
                                ///////////end CACHE ////////////////
                                ?>
								<?php
                                if ($_the_cache_data && is_string($_the_cache_data)) {
                                    echo $_the_cache_data;
                                } else {
                                    ob_start('ceocache_ob');
            
                                    $wp_query2 = new WP_Query($args_c);
                                    while ($wp_query2->have_posts()) : $wp_query2->the_post(); ?>
            								<li class="b-b"><a href="<?php the_permalink(); ?>"target="_blank" class="ceo-display-block ceo-text-truncate"><?php the_title(); ?></a></li>
            								<?php endwhile; wp_reset_query();
            
                                    if (CeoCache::is()) {
                                        CeoCache::set($_the_cache_key, ob_get_contents());
                                        ob_end_flush();
                                    }
                                }
								?>
							</ul>
							<div class="info ceo-flex ceo-flex-middle">
								<?php if( $value['user_show'] == true){ ?>
								<div class="avatar ceo-flex ceo-flex-middle ceo-right-s">
									<?php echo get_avatar($value['user'], 20); ?>
									<span class="ceo-text-small ceo-display-block ceo-margin-small-left">
										<?php
											$author_obj = get_user_by('id', $value['user'] );
											echo  $author_obj->display_name;
										?>
									</span>
								</div>
								<?php }else{} ?>
								<?php if(_ceo('show_cat_number') == true ): ?>
								<p class="ceo-text-small ceo-margin-remove"><i class="ceofont ceoicon-edit-2-line ceo-icon-juzon"></i>共 <span class="ceo-text-warning"><?php echo wp_get_cat_postcount($value['id']); ?></span> 篇文章</p>
								<?php endif; ?>
							</div>
						</div>
						<div class="ceo-width-auto@xl ceo-position-relative ceo-sj-yc">
							<div class="topic-item-cover b-r-4 ceo-overflow-hidden ceo-catshow-top">
								<img src="<?php echo $value['img']?>">
							</div>
								<a href="<?php echo get_category_link($value['id']); ?>" target="_blank" class="view b-r-4 ceo-text-small ceo-fenlei-s">进入分类<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php } ?>