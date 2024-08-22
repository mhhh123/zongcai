<?php 
/* Template Name: 公告页面 */ 
?>
<?php get_header(); ?>

<?php if ( _ceo('ceo_gonggao') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('gonggao_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('gonggao_title'); ?>
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

<div class="ceo-container" id="page-content">
    <div id="gonggao_content">
        <ul class="ceo-cbp-tmtimeline">
            <?php query_posts("post_type=gonggao&post_status=
            publish&posts_per_page=-1");if (have_posts()) : 
            while (have_posts()) : the_post(); ?>
            <li class="ceo-gonggao-li">
                <h2 class="ceo-gonggao-title"><?php the_title(); ?></h2>
                <div class="ceo-gonggao-about">
                    <span class="ceo-gonggao-Btn"><i class="ceofont ceoicon-vip-crown-2-line"></i> <?php the_author() ?></span>
                    <?php the_time('Y年n月j日 G:i'); ?></div>
                <div class="ceo-gonggao-entry-content">
                    <blockquote><?php the_content(); ?></blockquote>
                </div>
                <?php endwhile;endif; ?>
            </li>
        </ul>
    </div>
</div>
    
<?php get_footer();?>