<?php
$down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>
<?php
if(get_term_meta(get_queried_object_id(),'cat_theme',1)==3){
    $sing_class='single-main ceo-width-auto';
}else{
    $sing_class='single ceo-width-expand';
}
?>

<div class="ceo-category-web ceo-grid-medium" ceo-grid>
    <div class="<?php echo $sing_class; ?> ">
        <?php
        if(empty($paged)){
            if (CeoCache::is()) {
                $_the_cache_key  = $_SERVER['REQUEST_URI'];
                $_the_cache_data = CeoCache::get($_the_cache_key);
            }
        }
    
        if(have_posts()) :
            if ($_the_cache_data && is_string($_the_cache_data)) {
                echo $_the_cache_data;
            } else {
                ob_start('ceocache_ob');
        while (have_posts()) : the_post(); ?>
        <?php ?>
	    <?php get_template_part( 'template-parts/loop/loop', 'dns' ); ?>
		<?php endwhile;
            if (CeoCache::is()) {
                CeoCache::set($_the_cache_key, ob_get_contents());
                ob_end_flush();
            }}
    	else: ?>

		<div class="ceo-width-auto">
			<div class="ceo-alert-primary ceo-width-1-2 ceo-container" ceo-alert>
				<a class="ceo-alert-close" ceo-close></a>
				<p class="ceo-padding-small ceo-text-center">暂无内容！</p>
			</div>
		</div>

		<?php endif; ?>
		<div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
			<?php fenye(); ?>
		</div>
	</div>
    <?php
    if(get_term_meta(get_queried_object_id(),'cat_theme',1)==3){
        $div_sidebar_class='sidebar-column';
    }else{
        $div_sidebar_class='ceo-width-auto';
    }
    ?>
</div>

<script>
    //跟随
    $(function () {
        jQuery(".sidebar-column").theiaStickySidebar({
            additionalMarginTop: 0
        })
    });
</script>