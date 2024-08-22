<?php
	$switcher = _ceo('switcher');
	if(_ceo('index_switcher_new_enable')){
        $switcher_zxfb=array(
            'enable5col'=>1,
            'num'=>_ceo('index_switcher_limit'),
            'title'=>_ceo('index_switcher_new'),
            'index_switcher_new_load_type' => _ceo('index_switcher_new_load_type'),
            'index_switcher_ajax'=>_ceo('index_switcher_ajax'),
            'id'=>(array) _ceo('index_switcher_new_cat_id'),
            'url'=>_ceo('index_switcher_new_url'),
        );
        array_unshift($switcher, $switcher_zxfb);
    }

	if(!$switcher){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>分类切换，设置该模块内容！</p>
	</div>
</div>
<?php }else {  ?>
<section class="switcher">
	<div class="ceo-container ceo-margin-medium-top ceo-margin-medium-bottom">
		<ul class="ceo-cat-switcher cat-switcher ceo-padding-remove" ceo-switcher>
		    <?php if(_ceo('switcher_title') ): ?>
		    <h5><?php echo _ceo('switcher_bt'); ?></h5>
		    <em></em>
		    <?php endif; ?>
			<?php
			   if ($switcher) {
				   foreach ( $switcher as $key => $value) {
			?>
			<li class="section-title ceo-display-inline-block ceo-flex ceo-flex-middle ceo-cat-switcher-z">
				<h3 class="ceo-flex-1 ceo-margin-remove ceo-position-relative">
				<?php
				   if(!$value['title']){
					   echo get_cat_name( $value['id'] );
				   }else {
					   echo $value['title'];
				   }
				?>
				</h3>
			</li>
			<?php } } ?>
		</ul>
		<div class="ceo-switcher ceo-padding-remove ceo-switcher-top">
			<?php
			   if ($switcher) {
				   foreach ( $switcher as $key => $value) {
                       $ceo_width_4='ceo-width-1-4';
                       if(!empty($value['enable5col'])){
                           $ceo_width_4='ceo-width-1-5';
            } ?>
			<div class="card ceo-animation-slide-left-small">
				<div class="ceo-grid-medium" ceo-grid>
					<?php
                   if(is_array($value['id'])){
                       // 获取置顶
                       $stickyPosts = get_option('sticky_posts');
                       if ($stickyPosts) {
                           $stickyQuery = new WP_Query(array('post__in' => $stickyPosts, 'category__in' => $value['id'], 'ignore_sticky_posts' => true));
                       } else {
                           $stickyQuery = null;
                       }

                       ///////////start CACHE ////////////////
                        $currentPaged = get_query_var( 'paged' );
                        if ($currentPaged > 1) {
                           $args_c = [
                               'category__in' => $value['id'],
                               'showposts' => $value['num'],
                               'post__not_in' => $stickyPosts,
                               'post_status' => 'publish',
                               'offset' => $value['num'] * ($currentPaged - 1) - $stickyQuery->post_count
                           ];//args 查询参数
                       } else {
                           $args_c = [
                               'category__in' => $value['id'],
                               'showposts' => $value['num'] - $stickyQuery->post_count,
                               'post__not_in' => $stickyPosts,
                               'post_status' => 'publish',
                           ];//args 查询参数
                       }
                       if (CeoCache::is()) {
                           $_the_cache_key  = 'home-switcher' . '-' . md5(json_encode($args_c));
                           $_the_cache_data = CeoCache::get($_the_cache_key);
                       } else {
                       }
                       ///////////end CACHE ////////////////
                       if(!$_the_cache_data){
                           $wp_query2 = new WP_Query($args_c);
                            // 添加置顶到查询中
                               if ($currentPaged <= 1) {
                                   if ($stickyQuery->posts) {
                                       array_unshift($wp_query2->posts, ...$stickyQuery->posts);
                                   }
                                   $wp_query2->post_count = count($wp_query2->posts);
                               }
                           
    
                           $sumQuery = new WP_Query(
                               [
                                   'category__in' => $value['id'],
                                   'showposts' => $value['num'],
                                   'post_status' => 'publish',
                               ]
                           );
                           $wp_query2->max_num_pages = $sumQuery->max_num_pages;
                           $wp_query2->set('paged', get_query_var( 'paged' ));
                       }

                   }else{

                       ///////////start CACHE ////////////////
                       $args_c = ['cat' => $value['id'], 'showposts' => $value['num']];//args 查询参数
                       if (CeoCache::is()) {
                           $_the_cache_key  = 'home-switcher' . '-' . md5(json_encode($args_c));
                           $_the_cache_data = CeoCache::get($_the_cache_key);
                       } else {
                       }
                       if(!$_the_cache_data){
                           $wp_query2 = new WP_Query($args_c);
                       }
                       ///////////end CACHE ////////////////
                   }

                    ?>
					<?php
                       if ($_the_cache_data && is_string($_the_cache_data)) {
                           echo $_the_cache_data;
                       } else if($wp_query2) {
                           ob_start('ceocache_ob');

                    while ($wp_query2->have_posts()) : $wp_query2->the_post();

					?>
					<div class="ceo-width-1-1@s ceo-width-1-2 ceo-width-1-4@m ceo-width-1-4@l <?php echo $ceo_width_4; ?>@xl">
						<?php get_template_part( 'template-parts/home/loop', 'card' );?>
					</div>
					<?php endwhile; wp_reset_query();
                           if (CeoCache::is()) {
                               if(ob_get_contents()){
                                   CeoCache::set($_the_cache_key, ob_get_contents());
                                   ob_end_flush();
                               }
                           }
                       }
                    ?>
				</div>
				<div class="section-more ceo-text-center ceo-margin-top-30 ceo-light">
				   <?php if (isset($value['index_switcher_new_load_type'])): ?>
                        <?php if($value['index_switcher_new_load_type'] == 1):?>
                            <?php if(!empty($value['url'])):?>
                                <a href="<?php echo $value['url'];?>" data-id="<?php if(is_array($value['id'])){echo implode(',',$value['id']);}else{echo $value['id'];}?>" data-num="<?php echo $value['num'];?>" data-width="<?php echo $ceo_width_4;?>" data-page="1" class="btn change-color ceo-display-inline-block ajax-show-post">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                            <?php else: ?>
                                <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class="btn change-color ceo-display-inline-block">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                            <?php endif; ?>
                        <?php elseif($value['index_switcher_new_load_type'] == 2):?>
                            <a href="javascript:void(0)" data-id="<?php if(is_array($value['id'])){echo implode(',',$value['id']);}else{echo $value['id'];}?>" data-num="<?php echo $value['num'];?>" data-width="<?php echo $ceo_width_4;?>" data-page="1" class="btn change-color ceo-display-inline-block ajax-show-post">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                        <?php else:?>
                            <div class="fenye ceo-text-center ceo-text-small ceo-margin-medium-top ceo-margin-medium-bottom ajax-paginate-show-post">
                                <?php
                                global $wp_query;
                                $wp_query = $wp_query2;
                                fenye()
                                ?>
                            </div>
                        <?php endif;?>
                   <?php else: ?>
                    <?php
                        if(isset($value['index_switcher_ajax'])):
                    ?>
                        <?php if(!empty($value['index_switcher_ajax'])){?>
			        <a href="javascript:void(0)" data-id="<?php if(is_array($value['id'])){echo implode(',',$value['id']);}else{echo $value['id'];}?>" data-num="<?php echo $value['num'];?>" data-width="<?php echo $ceo_width_4;?>" data-page="1" class="btn change-color ceo-display-inline-block ajax-show-post">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                            <?php }else{?>
                            <a href="<?php echo $value['url'];?>" data-id="<?php if(is_array($value['id'])){echo implode(',',$value['id']);}else{echo $value['id'];}?>" data-num="<?php echo $value['num'];?>" data-width="<?php echo $ceo_width_4;?>" data-page="1" class="btn change-color ceo-display-inline-block ajax-show-post">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                        <?php }?>

                    <?php elseif($value['url']):?>
                    <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class="btn change-color ceo-display-inline-block">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                    <?php else:?>
                    <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank" class="btn change-color ceo-display-inline-block">查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                    <?php endif;?>
                     <?php endif; ?>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php } ?>
