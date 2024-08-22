<?php
/**
 * Template name: 友情链接
 */

get_header();
?>


<?php if ( _ceo('ceo_link') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('ceo_link_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('ceo_link_title'); ?>
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

<div class="ceo-container ceo-margin-top-20">
    <div class="ceo-link-row ceo-margin-top-20">
        <?php while(have_posts()) : the_post(); ?>
    		<?php the_content(); ?>
    	<?php endwhile; ?>
        <ul class="ceo-link-plinks">
    		<?php
    		wp_list_bookmarks(array(
    		    'show_description' => true,
    		    'show_name'        => true,
    		    'orderby'          => 'rating',
    		    'title_before'     => '<h2>',
    		    'title_after'      => '</h2>',
    		    'order'            => 'DESC',
    		    'show_description' => '0',
    		));
    		?>
    	</ul>
    </div>
    <section class="ceo-container ceo-margin-large-top">
    		<div class="ceo-margin-large-bottom">
    		    <!--评论模块-->
    			<?php if(_ceo('comments_close') == true ): ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
				<?php endif; ?>
    			<?php endif; ?>
    		</div>
    </section>
</div>
<?php get_footer();?>