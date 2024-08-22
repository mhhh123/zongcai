<?php get_header(); ?>
<section class="ceo-padding-small ceo-background-default b-t">
	<div class="ceo-container ceo-flex ceo-flex-middle">
		<div class="single-head ceo-flex-1">
			<div class="ceo-padding ceo-padding-remove-left">
				<?php
                $args=array('s'=>$s);
				$allsearch = new WP_Query($args);
				$key = get_search_query(1);
				if(empty($key)){
				    $key = get_query_var( 'p' );
                }
				$count = $allsearch->post_count;
				echo '<h1 class="ceo-h3">「'. $key .'」</h1>';

				if(is_search()){
                    global $wp_query;
                    $count = $wp_query->found_posts;
                }
				echo '<p class="ceo-display-block ceo-text-muted ceo-margin-remove">共搜索到<strong> ' . $count .' </strong>条「' . $key .'」的相关内容。</p>' ;
				wp_reset_query();
				?>

			</div>
		</div>
	</div>
</section>
<section class="ceo-pages-search ceo-container">
    <div class="ceo-grid-collapse" ceo-grid>
        <div class="ceo-width-1-1 ceo-width-expand@s">
        	<div class="crumbs ceo-text-small ceo-padding-small ceo-padding-remove-horizontal">
        		<?php if (function_exists('cmp_breadcrumbs')) {
                    cmp_breadcrumbs();
                }?>
        	</div>
    	</div>
        <div class="ceo-width-1-1 ceo-width-auto@s">
        	<div class="ceo-search-icon ceo-text-small ceo-padding-small ceo-padding-remove-horizontal">
        	    <span>排序：</span>
                <a href="<?php echo get_search_link(); ?>"> <i class="ceofont ceoicon-calendar-2-line"></i>发布时间 </a>
                <a href="<?php echo get_search_link(); ?>?order=modified"> <i class="ceofont ceoicon-time-line"></i>更新时间 </a>
                <a href="<?php echo get_search_link(); ?>?order=hot"> <i class="ceofont ceoicon-fire-line"></i>浏览量 </a>
        	</div>
    	</div>
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
				<p class="ceo-padding-small ceo-text-center">这是一个没有灵魂的搜索词...</p>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
	<?php fenye(); ?>
	</div>
</section>
<?php get_footer(); ?>