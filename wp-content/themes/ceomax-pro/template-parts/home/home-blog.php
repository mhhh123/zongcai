<?php
$blog = _ceo('blog');
if(!$blog){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>文章列表，设置该模块内容！</p>
	</div>
</div>
<?php }else {
	if ($blog) {
		foreach ( $blog as $key => $value) {
?>
<section class="blog">
	<div class="ceo-container ceo-margin-medium-top ceo-margin-bottom-40">
		<div class="section-title ceo-flex ceo-flex-middle">
		    <i class="ceofont <?php echo $blog[$key]['icon']; ?> ceo-icon-index"></i>
			<h3 class="ceo-display-inline-block ceo-margin-remove">
				<?php
					if(!$value['title']){
						echo get_cat_name( $value['id'] );
					}else {
						echo $value['title'];
					}
				?>
			</h3>

			<div class="sub-nav ceo-flex-1 ceo-visible@s">
			    <ul class="ceo-text-small ceo-margin-remove ceo-padding-remove">
			        <?php
                    $itemurl_cat_arr = ! empty($value['itemurl']) ? $value['itemurl'] : [];
                    if($itemurl_cat_arr){
                        foreach ($itemurl_cat_arr as $v){
                            $tempLink = get_category_link($v);
                            if ($tempLink == '') continue;
                            echo '<li class="cat-item"><a href="'.$tempLink.'" title="'.get_cat_name($v).'">'.get_cat_name($v).'</a> </li>';
                        }
                    }
    				?>
				</ul>
			</div>
			<div class="sub-nav ceo-visible@s">
				<ul class="ceo-text-small ceo-margin-remove ceo-padding-remove">
					<li><span class="all ceo-display-inline-block"><a href="<?php echo get_category_link($value['id']); ?>" target="_blank" >查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a></span></li>
				</ul>
			</div>
		</div>
		<div class="ceo-grid ceo-margin-top-30" ceo-grid>
			<?php
            ///////////start CACHE ////////////////
            $args_c = ['cat' => $value['id'], 'showposts' => $value['num']];//args 查询参数
            if (CeoCache::is()) {
                $_the_cache_key  = 'home-blog' . '-' . md5(json_encode($args_c));
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
                    <div class="ceo-width-1-1@s ceo-width-1-2@m ceo-width-1-2@l ceo-width-1-2@xl">
                        <?php get_template_part('template-parts/home/loop', 'blog'); ?>

                    </div>
                <?php endwhile;
                wp_reset_query();
                if (CeoCache::is()) {
                    CeoCache::set($_the_cache_key, ob_get_contents());
                    ob_end_flush();
                } } ?>
		</div>
	</div>
</section>
<?php } } ?>
<?php } ?>
