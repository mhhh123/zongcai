<section class="b-r-4 b-a ceo-background-default ceo-margin-bottom">
	<div class="b-b ceo-padding-small ceo-flex ceo-flex-middle">
		<span class="side-title <?php if(_ceo('side_title_style') == true): ?>side-title-style<?php endif; ?> ceo-position-relative"><?php echo _ceo('side_comment_title'); ?></span>
	</div>
	<div class="new-comment ceo-padding-small ceo-overflow-auto" >
		<?php
		$side_comment_num = _ceo('side_comment_num');
		$new_comment_num = $new_comment_show = $side_comment_num;
		$comments = get_comments('status=approve&order=DESC&number='.$new_comment_num);
		foreach($comments as $comment) :
		$output = '<li class="b-b"><div class="avatar ceo-display-inline-block">'.get_avatar($comment, 24).'</div>' .get_comment_author().'：<p class="content b-r-4 ceo-background-muted"><a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . $comment->comment_content . '</a></p></li>';
		echo $output;
		endforeach;
		?>
	</div>
</section>
<!-- 侧边栏热门评论模块 -->