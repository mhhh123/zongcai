<?php 
/* Template Name: 我的评论 */ 
$user_id        = get_current_user_id();
$args = array(
	'author__in' => $user_id,
	'status'     => 'approve',
	'number'     => 10,
);
$author_comment = get_comments( $args );

$count_args = array(
	'author__in' => $user_id,
	'count'      => true,
	'status'     => 'approve',
);
$author_comment_count = get_comments( $count_args );
?>
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>个人资料</h2>
    </div>
    <div class="user-comment user-box">
    	<?php if( $author_comment ){ ?>
    	<?php foreach($author_comment as $comment) : ?>
    	<article class="user-comment-item ceo-comment b-b">
    		<header class="ceo-comment-header ceo-margin-remove-bottom ceo-grid-small" ceo-grid>
    			<div class="ceo-width-auto">
    				<a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comments" class="avatar">
    					<?php echo get_avatar( $comment->user_id,40);?>
    				</a>
    			</div>
    			<div class="ceo-width-expand">
    				<div class="">
    					<div class="user-comment-content b-r-4 ceo-display-inline-block ceo-background-muted ceo-text-small"><?php echo $comment->comment_content; ?></div>
    					<p class="ceo-margin-remove-bottom"><span class="ceo-text-small">查看原文：</span><a href="<?php echo get_permalink($comment->comment_post_ID); ?>" class="ceo-margin-small-bottom ceo-text-small"><?php echo get_the_title($comment->comment_post_ID); ?></a><i class="ceofont ceoicon-share-forward-line ceo-margin-left"></i></p>
    				</div>
    			</div>
    		</header>
    	</article>
    	<?php endforeach; ?>
    	<?php }else{ ?>
    	<p>您还没有评论</p>
    	<?php } ?> 
    </div>
</div>