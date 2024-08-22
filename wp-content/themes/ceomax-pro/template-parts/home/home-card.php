<?php
	$card = _ceo('card');
	if(!$card){
?>

<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>卡片列表，设置该模块内容！</p>
	</div>
</div>
<?php
	}else {
	if ($card) {
		foreach ( $card as $key => $value) {
        global $ceo_width_4;
        $ceo_width_4='ceo-width-1-4';
    if(!empty($value['enable5col'])){
        $ceo_width_4='ceo-width-1-5';
    }
?>

<section class="card">
	<div class="ceo-container ceo-margin-medium-top ceo-margin-bottom-40">
		<div class="ceo-home-card section-title ceo-flex ceo-flex-middle">
		    <i class="ceofont <?php echo $card[$key]['icon']; ?> ceo-icon-index"></i>
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
                $display_cat_arr = ! empty($value['cat_id']) ? $value['cat_id'] : [];
                if($display_cat_arr){
                    foreach ($display_cat_arr as $v){
                        $tempLink = get_category_link($v);
                        if ($tempLink == '') continue;
                        echo '<li class="cat-item cat-item-'.$v.'"><a href="'.$tempLink.'" title="'.get_cat_name($v).'">'.get_cat_name($v).'</a> </li>';
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
		<div class="card ceo-grid-medium ceo-home-card-top" ceo-grid>
			<?php
            ///////////start CACHE ////////////////
            if (CeoCache::is()) {
                $_the_cache_key = 'home_card'.'-'.$value['id'].'-'.$value['num'];//args 指定的key
                $_the_cache_data = CeoCache::get($_the_cache_key);
            }else{

            }
            ///////////end CACHE ////////////////

            ?>
			<?php
            if ($_the_cache_data && is_string($_the_cache_data)) {
                echo $_the_cache_data;
            }else{
                ob_start('ceocache_ob');

                $wp_query2 = new WP_Query(['cat' => $value['id'], 'showposts' => $value['num']]);
            while ($wp_query2->have_posts()) : $wp_query2->the_post();

            ?>
		    <?php
				$index_card_style = $value['index_card_style'];
				if( $index_card_style == 'card' ){ ?>
			<?php get_template_part( 'template-parts/home/loop', 'card_2' );?>

			<?php } elseif( $index_card_style == 'software' ) { ?>

			<?php get_template_part( 'template-parts/home/loop', 'software' );?>

			<?php } elseif( $index_card_style == 'album' ) { ?>

			<?php get_template_part( 'template-parts/home/loop', 'album' );?>

			<?php } elseif( $index_card_style == 'music' ) { ?>

			<?php get_template_part( 'template-parts/loop/loop', 'home_music' );?>

			<?php } elseif( $index_card_style == 'cardvideo' ) { ?>

			<?php get_template_part( 'template-parts/loop/loop', 'home_cardvideo' );?>

			<?php } elseif( $index_card_style == 'sucai' ) { ?>

			<?php get_template_part( 'template-parts/loop/loop', 'home_sucai' );?>

			<?php } elseif( $index_card_style == 'img' ) { ?>

			<?php get_template_part( 'template-parts/loop/loop', 'home_img' );?>

			<?php } elseif( $index_card_style == 'imgs' ) { ?>

			<?php get_template_part( 'template-parts/loop/loop', 'home_imgs' );?>

			<?php }else ?>
		    <?php endwhile; wp_reset_query();
            if (CeoCache::is()) {
                CeoCache::set($_the_cache_key, ob_get_contents());
                ob_end_flush();
            } } ?>
		</div>
	</div>
</section>
<?php } }  } ?>
