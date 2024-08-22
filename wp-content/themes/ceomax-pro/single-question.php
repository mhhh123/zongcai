<?php
    $post_id = get_the_ID();
    $author_id = (int)get_post_field( 'post_author', $post_id );
    $question_comment_num = get_question_comment_num($post_id);
    $objquestion = new CeoQuestion();
    $objquestion->checkQuestion($post_id);//问题过期自动悬赏
    get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="ceo-background-default single-question-topmk ceo-margin-bottom">
    <div class="ceo-container">
        <header class="single-question-head">
            <div class="info ceo-flex ceo-flex-middle ceo-text-small ceo-text-muted ceo-flex ceo-flex-middle ceo-text-truncate ceo-margin-bottom">
                <div class="ceo-flex-1 ceo-flex ceo-flex-middle">
                    <div class="avatar ceo-border-circle ceo-overflow-hidden ceo-user-adminimg">
            		<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
            		</div>
            		<span class="ceo-text-small ceo-display-block ceo-user-admin"><?php the_author_posts_link(); ?></span>
                	<span class="ceo-community-ymd"><?php echo the_time('Y年m月j日'); ?></span>
                	<span class="ceo-community-ymd">提问：</span>
            	</div>
            	<div class="ceo-info-y">
                	<span class=""><?php post_views('', ''); ?></span> 浏览
            	</div>
            </div>
            <div class="ceo-single-title ceo-margin-bottom">
        		<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        	</div>
        	<div class="single-question-an">
        	    <a href="#comments" class="hd" ceo-scroll><i class="ceofont ceoicon-edit-2-line"></i> 写回答</a>
        	    <?php echo ceotheme_question_like_button();?>
        	    <?php ceo_single_question_ts(); ?>
                <?php ceo_question_reward(); ?>
                <span class="ceo-community-ymd"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?></span>
    	    </div>
        </header>
    </div>
</div>
<div class="ceo-container ceo-margin-top-20">
	<div class="ceo-grid-ceosmls" ceo-grid>
		<div class="ceo-width-1-1 ceo-width-auto@s">
	        <div class="wp">
			    <article class="ceo-background-default single-warp b-a b-r-4 ceo-margin-bottom">
			        <div class="single-question-xq">
			            <span>问题详情</span>
		            </div>
                    <div class="single-question-content single-content">
                        <?php the_content();
                        $select_answer_id = get_question_select_answer(get_the_ID());
                        if($select_comment = get_comment($select_answer_id)){
                        ?>
                        <div class="single-question-bestanswer b-r-4 b-a">
                            <div class="ceo-flex sj">
                                <div class="title ceo-flex-1">最佳答案</div>
                                <div class="rewarder">
                                    <div class="avatar">
                                        <a href="/author/<?php echo the_author_meta( 'user_login',$select_comment->user_id ); ?>">
                                            <?php echo get_avatar( $select_comment->user_id,20);?>
                                            <span><?php echo $select_comment->comment_author;?></span>
                                        </a>
                                    </div>
                                    <span class="rewarder reward"><?php ceo_question_rewardner(); ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <p><?php echo $select_comment->comment_content;?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!--文章版权-->
    				<div class="ceo-text-small ceo-text-pu ceo-margin-remove ceo-cop-text ceo-hh-p b-r-4" ceo-alert>
    					<p class="ceo-margin-remove-bottom"><i class="ceofont ceoicon-information-line"></i> <?php echo _ceo('question_single_bq'); ?>转载请注明出处：<?php the_permalink(); ?></p>
    				</div>

                	<!--文章标签-->
                    <?php
                    $tags_arrs = get_the_terms(get_the_ID(), 'question_tag');
                    if($tags_arrs){
                    ?>
                    <div class="tags-item ceo-single-tags ceo-margin-top">
                        <?php foreach ($tags_arrs as $v) { ?>
                        <a href="<?php echo get_term_link($v->term_id);?>" rel="tag" title="<?php echo $v->name;?>"># <?php echo $v->name;?></a>
                        <?php }?>
                    </div>
                    <?php }?>
                </article>
                <!--评论模块-->
    			<?php if(_ceo('comments_close') == true ): ?>
    			<?php if ( comments_open() || get_comments_number() ) : ?>
    			<?php comments_template( '/comments-question.php', true ); ?>
    			<?php endif; ?>
    			<?php endif; ?>
			</div>
		</div>
		<?php get_template_part( 'sidebar', 'question' ); ?>
	</div>
</div>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>