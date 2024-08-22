<?php 
/* Template Name: 单页合集 */ 
get_header(); 
?>

<?php if ( _ceo('ceo_heji') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('heji_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('heji_title'); ?>
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
		<div class="page-about ceo-margin-medium-bottom ceo-margin-top-20" ceo-grid>
			<div class="ceo-width-1-1 ceo-width-1-6@s">
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'page-nav',//用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
					'container'  => 'nav',  //容器标签
					'container_class' => 'page-menu b-a ceo-background-default',//ul父节点class值
					'menu_id'   => '',  //ul节点id值
					'menu_class'   => 'ceo-list ceo-margin-remove',  //ul节点id值
					'echo'  => true,//是否输出菜单，默认为真
				) );
				?>
			</div>
			<div class="ceo-width-1-1@s ceo-width-5-6@m ceo-width-5-6@l ceo-width-5-6@xl">
				<div class="page-main single-content b-r-4 b-a ceo-padding ceo-background-default ceo-margin-medium-bottom">
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
		</div>
	</div>
<?php get_footer(); ?>