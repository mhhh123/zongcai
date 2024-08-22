<?php 
/* Template Name: 热门标签 */ 
get_header(); 
?>
<?php if ( _ceo('ceo_tags') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('tags_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('tags_title'); ?>
	</div>
</section>
<?php endif; ?>
<?php if(_ceo('ceo_bolang') == true ): ?>
<div class="ceo-meihua-boo">
	<svg class="ceo-meihua-boo-waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
		<defs>
			<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
		</defs>
		<g class="ceo-meihua-boo-parallax">
			<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
			<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
			<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
			<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
		</g>
	</svg>
</div>
<?php endif; ?>

<section class="ceo-container ceo-margin-top-20">
	<div class="ceo-margin-large-bottom ceo-margin-top-20" ceo-grid="masonry: true">
		<?php 
		$tags_list = get_tags('orderby=count&order=DESC&number=44');
		if($tags_list) { 
			foreach($tags_list as $tag) {
				echo '<div class="ceo-width-1-1@s ceo-width-1-4@m ceo-width-1-4@l ceo-width-1-4@xl"><div class="page-tags-item ceo-background-default b-a b-r-4"><div class="ceo-margin-bottom b-b"><a class="name ceo-margin-bottom ceo-display-inline-block ceo-position-relative" href="'.get_tag_link($tag).'">'. $tag->name .'</a><small class="ceo-text-muted">x '. $tag->count .'</small></div>'; 
				$posts = get_posts( "tag_id=". $tag->term_id ."&numberposts=5" );
				if( $posts ){
					foreach( $posts as $post ) {
						setup_postdata( $post );
						echo '<li><a href="'.get_permalink().'">';
						echo the_title();	
						echo '</a></li>';
					}
				}
				echo '</div></div>';
			} 
		} 
		?>

	</div>
</section>
<?php get_footer(); ?>