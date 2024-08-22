<?php get_header(); ?>
<main class="main">
	<div class="ceo-container">
		<section class="site-classification-box card ceo-margin-medium-top ceo-margin-medium-bottom">
			<h3 class="ceo-text-bolder ceo-margin-bottom-20"><?php single_cat_title(); ?></h3>
			<div class="ceo-grid-ceosmls" ceo-grid>
				<?php while (have_posts()) : the_post(); ?>
				<div class="ceo-width-1-2 ceo-width-1-5@m ceo-width-1-5@l ceo-width-1-5@xl">
					<?php include(TEMPLATEPATH . '/inc/sitenav/loop/card.php'); ?>
				</div>
				<?php endwhile; ?> 
			</div>
		</section>
	</div>
</main>
<?php get_footer(); ?>