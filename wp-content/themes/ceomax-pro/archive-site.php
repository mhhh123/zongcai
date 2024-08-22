<?php get_header();?>
<main class="main">
	<?php include TEMPLATEPATH.'/inc/sitenav/template-parts/top.php'; ?>
	<div class="ceo-container">
		<?php include TEMPLATEPATH.'/inc/sitenav/template-parts/nav.php'; ?>
		<?php if(_ceo('ceo_sitenav_hot_switch') == true): ?>
		<?php include TEMPLATEPATH.'/inc/sitenav/template-parts/hot.php'; ?>
		<?php endif; ?>
		<?php include TEMPLATEPATH.'/inc/sitenav/index.php' ;?>
	</div>
</main>
<?php get_footer(); ?>



