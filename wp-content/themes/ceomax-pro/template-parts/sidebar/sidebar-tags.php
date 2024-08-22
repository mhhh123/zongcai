<section class="side-tag b-r-4 b-a ceo-background-default ceo-margin-bottom">
	<div class="b-b ceo-padding-small ceo-flex ceo-flex-middle">
		<span class="side-title <?php if(_ceo('side_title_style') == true): ?>side-title-style<?php endif; ?> ceo-position-relative"><?php echo _ceo('side_tag_title'); ?></span>
	</div>
	<ul class="ceo-list tags-item ceo-padding-small ceo-margin-remove">
		<?php
		$side_tag_num =  _ceo('side_tag_num');
		$tags_list = get_tags( array('number' => $side_tag['num'], 'orderby' => '', 'order' => 'DESC', 'hide_empty' => false) );
		if($tags_list){
            shuffle($tags_list);
        }
		$count=0;
		if ($tags_list) {
			foreach($tags_list as $tag) {
				$count++;
				echo '<a ceo-tooltip="' . $tag->count . '个相关文章" href="'.get_tag_link($tag->term_id).'" target="_blank" class="b-r-4 ceo-text-small" >'.$tag->name.'</a>';
				if( $count > $side_tag_num ) break;
			}
		}
		?>
	</ul>
</section>