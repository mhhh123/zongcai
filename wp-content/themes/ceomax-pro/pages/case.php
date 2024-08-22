<?php
/**
 * Template name: 案例展示
 */

get_header();
?>
<?php
    $ceo_case_sz = _ceo('ceo_case_sz');
?>
<?php if ( _ceo('ceo_case') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('ceo_case_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('ceo_case_title'); ?>
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
<div class="ceo-container">
    <?php if(_ceo('ceo_case_desc_kg') == true): ?>
    <div class="ceo-case-desc">
        <li><?php echo _ceo('ceo_case_desc'); ?><li>
    </div>
    <?php endif; ?>
    <div class="ceo-grid-medium ceo-case" ceo-grid>
        <?php
		if ($ceo_case_sz) {
			foreach ( $ceo_case_sz as $key => $value) {
		?>
    	<div class="ajax-item ceo-width-1-1@s ceo-width-1-2 ceo-width-1-5@xl ceo-dt">
            <div class="ceo-case-mk b-r-4 ceo-background-default ceo-overflow-hidden ceo-vip-icons">
                <a href="<?php echo $value['cp_link']; ?>" target="_blank"><span><i class="ceofont ceoicon-hashtag"></i><?php echo $value['cp_title']; ?></span></a>
            	<a href="<?php echo $value['al_link']; ?>" class="cover ceo-display-block ceo-overflow-hidden">
                    <img src="<?php echo $value['al_img']; ?>" class="ceo-width-1-1@s">
            	</a>
                <div class="ceo-case-title-mk">
                    <div class="ceo_t_home_mk_a">
                        <a href="<?php echo $value['al_link']; ?>" class="title" title="<?php echo $value['al_title']; ?>"><?php echo $value['al_title']; ?></a>
                        <p><?php echo $value['al_desc']; ?></p>
                        <a href="<?php echo $value['al_link']; ?>" target="_blank" class="ceo_t_home_mk_btn">点击查看<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                    </div>
                </div>
            </div>
    	</div>
    	<?php } } ?>
    </div>
</div>
<?php get_footer();?>