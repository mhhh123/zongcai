<div class="site-item b-a b-r-4 ceo-background-default ceo-padding-small">
	<a href="<?php the_permalink(); ?>" target="_blank" class="ceo-grid-small" ceo-grid ceo-tooltip="title: <?php 
				if (has_excerpt()) {
					echo $description = get_the_excerpt();
				}else {
					echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"…");
				} 
				?>; pos: bottom">
		<div class="ceo-width-auto">
		    <div class="thumb ceo-cover-container">
			    <img src="<?php echo site_thumbnail_src(); ?>" alt="<?php the_title(); ?>" ceo-cover/>
			</div>
		</div>
		<div class="ceo-width-expand">
			<span class="ceo-margin-remove"><?php the_title(); ?></span>
			<p class="ceo-text-truncate">
				<?php 
				if (has_excerpt()) {
					echo $description = get_the_excerpt();
				}else {
					echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"…");
				} 
				?>
			</p>
		</div>
	</a>
</div>