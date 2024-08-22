<?php
/* Template Name: 我的收藏  */

global $wpdb;
$wpdb->collection = $wpdb->prefix.'collection';
$user_id        = get_current_user_id();
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
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>我的收藏</h2>
    </div>
    <section class="user-box user-side">
    	<div class="ceo-container">
			<?php
			if( $collection_posts && $collection_posts->have_posts() ){
				while( $collection_posts->have_posts() ) : $collection_posts->the_post();
			?>
			<?php get_template_part( 'template-parts/loop/loop', 'side' ); ?>
			<?php endwhile; ?>
			<?php }else{ ?>
			<p>抱歉，您目前没有收藏任何文章～</p>
			<?php } ?>
    	</div>
    </section>
</div>