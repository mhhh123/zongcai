<div class="ceo-margin-medium-top ceo-margin-medium-bottom">
<?php
	$args=array(
		'taxonomy' => 'sitecat',
		'hide_empty'=>'0',
		'hierarchical'=>1,
		'parent'=>'0',
	);
	$categories=get_categories($args);
	foreach($categories as $category){
		$cat_id = $category->term_id;
?>

	<section class="card ceo-margin-bottom">
		<h3 class="section-title ceo-margin-medium-top ceo-margin-bottom-20" id="site<?php echo $category->term_id; ?>" ><?php echo $category->name;?><span class="ceo-float-right"><a href="<?php echo get_category_link( $category->term_id )?>" target="_blank" class="ceo-text-muted ceo-text-small" >查看更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a></span></h3>
		<div class="ceo-grid-ceosmls" ceo-grid>

			<?php
				$salong_posts = new WP_Query(
					array(
						'post_type' => 'site',//自定义文章类型，这里为video
						'ignore_sticky_posts' => 1,//忽略置顶文章
						'posts_per_page' => 10,//显示的文章数量
						'tax_query' => array(
							array(
								'taxonomy' => 'sitecat',//分类法名称
								'field'    => 'id',//根据分类法条款的什么字段查询，这里设置为ID
								'terms'    => $cat_id,//分类法条款，输入分类的ID，多个ID使用数组：array(1,2)
							)
						),
					)
				);
				if ($salong_posts->have_posts()): while ($salong_posts->have_posts()): $salong_posts->the_post(); 
			?>
			<div class="ceo-width-1-2 ceo-width-1-5@m ceo-width-1-5@l ceo-width-1-5@xl">
				<?php include(TEMPLATEPATH . '/inc/sitenav/loop/card.php'); ?>
			</div>
			<?php endwhile; endif; ?>

		</div>
	</section>
<?php }?>

</div>