<?php
$post_id = get_the_ID();
$forum_comment_num = get_forum_comment_num($post_id);
?>

<article class="forum-box-list-loop">
    <div class="ceo-grid-ceosmls" ceo-grid>
        <div class="ceo-width-auto">
        	<div class="ceo-flex ceo-flex-middle ceo-text-small ceo-flex-middle ceo-text-truncate">
			    <div class="ceo-flex-1 ceo-flex ceo-flex-middle">
                    <div class="avatar ceo-border-circle ceo-overflow-hidden">
            		<?php echo get_avatar(get_the_author_meta( 'ID' ), 50); ?>
            		</div>
        		</div>
    		</div>
        </div>
    	<div class="ceo-width-expand info">
        	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>" class="title"><?php the_title(); ?></a>
          	<div class="item">
          	    <div class="ceo-flex">
              		<div class="ceo-flex-1">
                		<span class="ceo-text-small ceo-user-admin"><?php the_author_posts_link(); ?></span>
                		<span class="ceo-community-ymd cat ceo-visible@s"><i class="ceofont ceoicon-subtract-line"></i><?php ceo_forum_cat(); ?></span>
                    	<span class="ceo-community-ymd ceo-visible@s"><i class="ceofont ceoicon-calendar-todo-line"></i><?php the_time('Y-m-d') ?></span>
        			</div>
        			<div class="btns">
                    	<span class="ceo-community-ymd"><i class="ceofont ceoicon-eye-line"></i><?php post_views('', ''); ?></span>
                    	<span class="ceo-community-ymd"><i class="ceofont ceoicon-discuss-line"></i><?php echo $forum_comment_num;?></span>
        			</div>
    			</div>
    		</div>
        </div>
    </div>
</article>