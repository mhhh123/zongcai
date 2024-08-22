<?php
if(!empty($author)){
    $user_id=$author;
}

$all_collections = $wpdb->get_results( $wpdb->prepare("select post_id from $wpdb->collection where user_id = %d LIMIT 0,10", $user_id ) );

if( $all_collections ){
	foreach ($all_collections as $key => $value) {
		$collections_posts[] = $value->post_id;
	}

	$args = array(
		'post_type' => 'post',
		'post__in' => $collections_posts,
		'ignore_sticky_posts' => 1,
	);
	$collection_posts = new WP_Query($args);
}
?>
<div class="ceo-container">
	<div class="ceo-animation-slide-left-small" ceo-grid>
		<?php
		//我的收藏
		if( $collection_posts && $collection_posts->have_posts() ){
			while( $collection_posts->have_posts() ) : $collection_posts->the_post();
		?>

		<div class="ajax-item ceo-width-1-1@s ceo-width-1-4@xl">
			<?php get_template_part( 'template-parts/home/loop', 'card' ); ?>

		</div>
		<?php endwhile; ?>
		<?php }else{ ?>
		<div class="ceo-width-1-1">
			<div class="ceo-alert-primary ceo-width-1-2 ceo-container" ceo-alert>
				<a class="ceo-alert-close" ceo-close></a>
				<p class="ceo-padding-small ceo-text-center">这家伙很懒，暂无收藏！</p>
			</div>
		</div>

		<?php } ?>
	</div>
    <div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
        <?php fenye(); ?>
    </div>
</div>