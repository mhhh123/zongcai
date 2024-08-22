<section class="side-art b-a b-r-4 ceo-background-default ceo-margin-bottom">
	<div class="b-b ceo-padding-small ceo-clearfix  ceo-flex ceo-flex-middle">
		<span class="side-title <?php if(_ceo('side_title_style') == true): ?>side-title-style<?php endif; ?> ceo-h5 ceo-float-left ceo-margin-remove ceo-position-relative"><?php echo _ceo('side_double_title'); ?></span>
	</div>
	<ul class="ceo-sidebar-double ceo-padding-small ceo-overflow-auto ceo-sidebar-wenzhang ceo-grid" ceo-grid>
		<?php
		$side_art_num = _ceo('side_double_num');
		$cat = get_the_category();
		foreach($cat as $key=>$category){
			$catid = $category->term_id;
		}
		$args = array('orderby' => 'rand','showposts' => $side_art_num ,'cat' => $catid );
		$query_posts = new WP_Query();
		$query_posts->query($args);
		while ($query_posts->have_posts()) : $query_posts->the_post();
		?>

		<li class="ceo-margin-remove-top ceo-width-1-2">
			<a href="<?php the_permalink(); ?>" class="ceo-display-block ceo-overflow-hidden">
			    <img data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" src="<?php echo get_template_directory_uri().'/static/images/thumb-ing.gif'; ?>" class="b-r-4 lazyload">
				<p><?php the_title();?></p>
			</a>
		</li>
		<?php endwhile;?>
		<?php wp_reset_query(); ?>

	</ul>
</section>
<!-- 侧边栏双栏文章模块 -->