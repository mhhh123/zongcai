<!--内页底部广告位-->
<?php if ( _ceo('single_ad_foo') == true): ?>
<div class="ceo-ad ceo-background-default b-b ceo-margin-bottom-20 ceo-margin-top-20">
	<div class="ceo-padding-remove-bottom " style="position: relative;">
	<!--广告按钮-->
    <?php get_template_part( 'template-parts/footer/ceo', 'ad' ); ?>
    <!--广告按钮-->
	<?php echo _ceo('single_ad_foo_img'); ?>
	</div>
</div>
<?php endif;  ?>
<!--内页底部广告位-->