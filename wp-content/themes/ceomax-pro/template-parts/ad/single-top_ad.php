<!--内页顶部广告位-->
<?php if ( _ceo('single_ad_show') == true): ?>
<div class="ceo-ad ceo-ads">
	<div class="ceo-adsgg ceo-singlead" style="max-width: 1440px;margin: auto;position: relative;">
    <!--广告按钮-->
    <?php get_template_part( 'template-parts/footer/ceo', 'ad' ); ?>
    <!--广告按钮-->
	<?php echo _ceo('single_ad_img'); ?>
	</div>
</div>
<?php endif;  ?>
<!--内页顶部广告位-->