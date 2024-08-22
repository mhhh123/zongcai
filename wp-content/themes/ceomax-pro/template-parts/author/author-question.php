<?php
if(!empty($author)){
    $user_id=$author;
}
?>
<div class="ceo-container">
	<div class="ceo-animation-slide-left-small">
	    <div class="wp" style="margin: 0 auto;">
            <div class="ceo-cet-question-box b-r-4 b-a ceo-background-default">
                <div class="question-box-list">
                	<?php
                    //我的问题
                    global $wp_query;
                    $page=!empty(get_query_var('paged')) ?get_query_var('paged') :1;
                    $wp_query = new WP_Query(
                        array(
                            'post_type'      => 'question',
                            'posts_per_page' => 20,
                            'post_status'    => 'publish',
                            'author' => $user_id,
                            'paged' => $page
                        )
                    );
                    if(have_posts()) : while (have_posts()) : the_post(); ?>
                	    <?php get_template_part( 'template-parts/loop/loop', 'question' ); ?>
                	<?php endwhile;endif; ?>
            	</div>
            </div>
        </div>
    </div>
</div>