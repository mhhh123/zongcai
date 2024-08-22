<?php
if(!empty($author)){
    $user_id=$author;
}
?>
<div class="ceo-container">
	<div class="ceo-animation-slide-left-small" ceo-grid>
		<?php
        //我的发布
        global $wp_query;
        $page=!empty(get_query_var('paged')) ?get_query_var('paged') :1;
        $wp_query = new WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => get_option( 'posts_per_page' ),
                'post_status'    => 'publish',
                'author' => $user_id,
                'paged' => $page

            )
        );

        if(have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="ajax-item ceo-width-1-1@s ceo-width-1-4@xl">
			<?php get_template_part( 'template-parts/home/loop', 'card' ); ?>

		</div>
		<?php endwhile; else: ?>
		<div class="ceo-width-1-1">
			<div class="ceo-alert-primary ceo-width-1-2 ceo-container" ceo-alert>
				<a class="ceo-alert-close" ceo-close></a>
				<p class="ceo-padding-small ceo-text-center">这家伙很懒，暂无动态！</p>
			</div>
		</div>
		<?php endif;
        wp_reset_query();
        ?>
	</div>
    <div class="fenye ceo-text-center ceo-text-small ceo-margin-large-top ceo-margin-large-bottom">
        <?php fenye(); ?>
    </div>
</div>