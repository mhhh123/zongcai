<?php
/**
 * Template name: QQ群联盟
 */

get_header();
?>
<?php
    $ceo_qqqun_sz = _ceo('ceo_qqqun_sz');
?>
<?php if ( _ceo('ceo_qqqun') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('ceo_qqqun_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('ceo_qqqun_title'); ?>
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
    <div class="ceo-qqqun-bg">
        <div class="ceo-grid-medium ceo-qqqun" ceo-grid>
            <?php
    		if ($ceo_qqqun_sz) {
    			foreach ( $ceo_qqqun_sz as $key => $value) {
    		?>
        	<div class="ajax-item ceo-width-1-1@s ceo-width-1-2 ceo-width-1-5@xl ceo-dt">
                <li class="ceo-qqqun-lb">
                    <span class="joinqq">
                        <span class="img"><img src="<?php echo $value['qqqun_img']; ?>"></span>
                        <span class="qqone">
                            <span class="lianmeng">
                                <span class="qq"><?php echo $value['qqqun_title']; ?></span>
                            </span>
                            <span class="number">群号：<?php echo $value['qqqun_haoma']; ?></span>
                            <em><?php echo $value['qqqun_renshu']; ?></em>
                        </span>
                    </span>
                    <a href="<?php echo $value['qqqun_link']; ?>" rel="nofollow" target="_blank">加入QQ群</a>
                </li>
        	</div>
        	<?php } } ?>
        </div>
    </div>
    <section class="ceo-container ceo-margin-medium-bottom ceo-margin-top-20 ceo-qqqun-row">
    	<div class="ceo-container">
    		<div class="ceo-background-default ceo-padding-app ceo-margin-medium-bottom ceo-margin-top-20">
    			<?php while(have_posts()) : the_post(); ?>
    			<?php the_content(); ?>
    			<?php endwhile; ?>
    		</div>	
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