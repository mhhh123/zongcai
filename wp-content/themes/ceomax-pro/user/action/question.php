<?php
/* Template Name: 我的提问  */

global $wpdb;
$user_id        = get_current_user_id();
$paged = ! empty($_GET["pg"]) ? (int)$_GET["pg"] : 1;
$args = array(
    'post_type'           => 'question',
    'author'             => $user_id,
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => 10,
    'paged'                => $paged
);
global $wp_query;
$wp_query = new WP_Query($args);
?>

<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>我的提问</h2>
    </div>
	<div class="user-question">
		<?php
		if( $wp_query && $wp_query->have_posts() ){
			while( $wp_query->have_posts() ) : $wp_query->the_post();
		?>
		<div class="question-box-list">
		    <?php get_template_part( 'template-parts/loop/loop', 'question' ); ?>
	    </div>

		<?php endwhile; ?>

		<?php }else{ ?>

		<p>您目前没有发布任何问题～</p>
		<?php } ?>
	</div>
    <div class="fenye ceo-text-center ceo-text-small ceo-margin-top ceo-margin-bottom">
        <?php
        $args = array(
            'prev_next'          => 0,
            'format'       => '?pg=%#%',
            'before_page_number' => '',
            'mid_size'           => 2,
            'current' => max( 1, $paged ),
            'prev_next'    => True,
            'prev_text'    => __('上一页'),
            'next_text'    => __('下一页'),
        );
        $page_arr=paginate_links($args);
        if ($page_arr) {
            echo $page_arr;
        }else{

        } ?>
    </div>
</div>