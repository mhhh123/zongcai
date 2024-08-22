<?php
$post_id = get_the_ID();
$question_comment_num = get_question_comment_num($post_id);
$xz = (!empty($question_comment_num)) ? ' xz' : '' ;
?>

<article class="question-box-list-loop">
    <div class="ceo-grid-collapse" ceo-grid>
        <div class="ceo-width-auto">
        	<a class="quantity<?php echo $xz;?>" href="<?php echo get_the_permalink( $post_id ); ?>#comments">
        		<?php echo $question_comment_num;?><span>回答</span>
            </a>
        </div>
    	<div class="ceo-width-expand info">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>" class="title"><?php the_title(); ?></a>
          	<div class="item">
          	    <div class="ceo-flex ceo-flex-middle ceo-text-small ceo-text-truncate">
              		<div class="ceo-flex-1 ceo-flex ceo-flex-middle">
                        <div class="avatar ceo-border-circle ceo-overflow-hidden ceo-user-adminimg">
                		<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
                		</div>
                		<span class="ceo-text-small ceo-display-block ceo-user-admin"><?php the_author_posts_link(); ?></span>
                		<span class="ceo-community-ymd cat ceo-visible@s"><i class="ceofont ceoicon-subtract-line"></i><?php ceo_question_cat(); ?></span>
                    	<span class="ceo-community-ymd ceo-visible@s"><i class="ceofont ceoicon-calendar-todo-line"></i><?php the_time('Y-m-d') ?></span>
                    	<span class="ceo-community-ymd"><i class="ceofont ceoicon-eye-line"></i><?php post_views('', ''); ?></span>
                    	<?php ceo_question_reward(); ?>
        			</div>
        			<div class="btns"><?php ceo_question_cat_comment(); ?></div>
    			</div>
    		</div>
        </div>
    </div>
</article>