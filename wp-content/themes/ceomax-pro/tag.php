<?php get_header(); ?>
<section class="ceo-padding-small ceo-background-default b-t">
	<div class="ceo-container ceo-flex ceo-flex-middle">
		<div class="single-head ceo-flex-1">
			<div class="ceo-tag-page ceo-padding ceo-padding-remove-left">
				<h1 class="ceo-h2 ceo-margin-small-bottom">#<?php single_tag_title(); ?></h1>
				<p class="ceo-display-block ceo-text-muted ceo-margin-small-bottom"><?php echo get_term(get_queried_object_id())->description; ?></p>
				<p class="ceo-display-block ceo-text-muted">标签为 #<?php single_tag_title(); ?> 内容如下：</p>
			</div>
		</div>
	</div>
</section>
<section class="ceo-container">
	<div class="crumbs ceo-text-small ceo-padding-small ceo-padding-remove-horizontal">
		<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
	</div>
	<div class="ceo-grid-medium ceo-flex-top ceo-flex-wrap-top ceo-grid" ceo-grid="masonry:true">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="ceo-width-1-1@s ceo-width-1-2 ceo-width-1-3@l ceo-width-1-5@xl ceo-first-column" >
			<?php get_template_part( 'template-parts/loop/loop', 'flow' ); ?>
		</div>
		<?php endwhile; else: ?>
		<div class="ceo-width-1-1">
			<div class="ceo-alert-primary ceo-width-1-2 ceo-container" ceo-alert>
				<a class="ceo-alert-close" ceo-close></a>
				<p class="ceo-padding-small ceo-text-center">这是一个没有灵魂的标签...</p>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
	<?php fenye(); ?>
	</div>
</section>
<?php get_footer(); ?>