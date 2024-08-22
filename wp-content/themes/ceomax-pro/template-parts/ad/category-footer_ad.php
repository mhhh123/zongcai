<!--分类横幅广告-->
<?php if ( _ceo('cat_ad_show') == true): ?>
    <div class="ceo-home-ads ceo-ad ceo-ads b-b">
    	<div class="ceo-adsgg " style="max-width: 1440px;margin: auto;position: relative;">
        <!--广告按钮-->
        <?php get_template_part( 'template-parts/footer/ceo', 'ad' ); ?>
        <!--广告按钮-->
    	<?php echo _ceo('cat_ad_img'); ?>
    	</div>
    </div>
<?php endif;  ?>
<!--分类横幅广告-->