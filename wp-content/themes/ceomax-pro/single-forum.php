<?php
    $post_id = get_the_ID();
    $author_id = (int)get_post_field( 'post_author', $post_id );
    $forum_comment_num = get_forum_comment_num($post_id);
    get_header();
wp_enqueue_script('questionjs',get_template_directory_uri().'/static/js/question.js');
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="ceo-container ceo-margin-top-20">
    <!--当前位置-->
    <div class="ceo-flex">
        <?php if(_ceo('single_mbx_mianbaoxie') == true): ?>
            <div class="crumb ceo-flex-1 ceo-text-small">
                <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
            </div>
        <?php endif; ?>
        <?php if(_ceo('single_tg') == true): ?>
            <div class="crumb ceo-crumb-tg ceo-text-small">
                <a href="<?php echo _ceo('single_tg_link'); ?>" target="_blank"> <i class="ceofont ceoicon-edit-2-line"></i> <?php echo _ceo('single_tg_title'); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <!--当前位置-->
	<div class="ceo-grid-ceosmls" ceo-grid>
		<div class="ceo-width-1-1 ceo-width-auto@s">
	        <div class="wp">

                <div class="ceo-background-default b-a b-r-4 ceo-margin-bottom">
                    <header class="single-forum-head">
                        <div class="info ceo-flex ceo-flex-middle ceo-text-small ceo-text-muted ceo-flex ceo-flex-middle ceo-text-truncate ceo-margin-bottom">
                            <div class="ceo-flex-1 ceo-flex ceo-flex-middle">
                                <div class="avatar ceo-border-circle ceo-overflow-hidden ceo-user-adminimg">
                        		<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
                        		</div>
                        		<span class="ceo-text-small ceo-display-block ceo-user-admin"><?php the_author_posts_link(); ?></span>
                            	<span class="ceo-community-ymd"><?php echo the_time('Y年m月j日'); ?></span>
                            	<span class="ceo-community-ymd">发帖：</span>
                        	</div>
                        	<div class="ceo-info-y">
                            	<span class=""><?php post_views('', ''); ?></span> 浏览
                        	</div>
                        </div>
                        <div class="ceo-single-title ceo-margin-bottom">
                    		<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                    	</div>
                    	<div class="single-forum-an">
                    	    <a href="#comments" class="hd" ceo-scroll><i class="ceofont ceoicon-edit-2-line"></i> 回帖</a>
                    	    <?php echo ceotheme_forum_like_button();?>
                    	    <?php ceo_single_forum_ts(); ?>
                    	    <span class="ceo-community-ymd"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?></span>
                	    </div>
                    </header>
                </div>
			    <article class="ceo-background-default single-warp b-a b-r-4 ceo-margin-bottom">
			        <div class="single-forum-xq">
			            <span>帖子详情</span>
		            </div>
                    <div class="single-forum-content single-content">
                        <?php the_content(); ?>
                    </div>

                    <!--文章版权-->
    				<div class="ceo-text-small ceo-text-pu ceo-margin-remove ceo-cop-text ceo-hh-p b-r-4" ceo-alert>
    					<p class="ceo-margin-remove-bottom"><i class="ceofont ceoicon-information-line"></i> <?php echo _ceo('forum_single_bq'); ?>转载请注明出处：<?php the_permalink(); ?></p>
    				</div>

                	<!--文章标签-->
                    <?php
                    $tags_arrs = get_the_terms(get_the_ID(), 'forum_tag');
                    if($tags_arrs){
                    ?>
                    <div class="tags-item ceo-single-tags ceo-margin-top">
                        <?php foreach ($tags_arrs as $v) {

                         ?>
                        <a href="<?php echo get_term_link($v->term_id);?>" rel="tag" title="<?php echo $v->name;?>"># <?php echo $v->name;?></a>
                        <?php }?>
                    </div>
                    <?php }?>
                </article>
                <!--评论模块-->
    			<?php if(_ceo('comments_close') == true ): ?>
    			<?php if ( comments_open() || get_comments_number() ) : ?>
    			<?php comments_template( '', true ); ?>
    			<?php endif; ?>
    			<?php endif; ?>
			</div>
		</div>
		<?php get_template_part( 'sidebar', 'forum' ); ?>
	</div>
</div>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
