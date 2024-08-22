<?php
	$current_category = get_the_category();//获取当前文章所属分类ID
	$prev_post = get_previous_post($current_category,'');//与当前文章同分类的上一篇文章
	$next_post = get_next_post($current_category,'');//与当前文章同分类的下一篇文章
?>

<div class="ceo-grid-small ceo-margin-bottom" ceo-grid>
	<?php if( _ceo('turnpage' ) == '1') {?>
	
	<?php
	$categories = get_the_category();
	$categoryIDS = array();
	foreach ($categories as $category) {
	array_push($categoryIDS, $category->term_id);
	}
	$categoryIDS = implode(",", $categoryIDS);
	?>
	<div class="ceo-width-1-2">
		<div class="ceo-display-block ceo-text-truncate ceo-background-default ceo-padding-small b-r-4 b-a">
		<i class="ceofont ceoicon-arrow-left-s-line ceo-margin-right"></i>
		<?php if (get_previous_post($categoryIDS)) { previous_post_link('%link','%title',true);} else { echo "已是最后文章";} ?>
		</div>
	</div>
	<div class="ceo-width-1-2 ceo-text-right">
		<div class="ceo-display-block ceo-text-truncate ceo-background-default ceo-padding-small b-r-4 b-a">
		<?php if (get_next_post($categoryIDS)) { next_post_link('%link','%title',true);} else { echo "已是最新文章";} ?><i class="ceofont ceoicon-arrow-right-s-line ceo-margin-left"></i>
		</div>
	</div>
	
	<?php }else { ?>
	
	<div class="ceo-width-1-2">
		<?php if (!empty( $prev_post )){ ?>
        <div class="b-r-4 ceo-inline ceo-overflow-hidden ceo-width-1-1 ceo-page-img" style="height:100px">
            <?php aye_pageturn_thumb($prev_post->ID);?>
            <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom">
            	<span>上一篇：</span>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="ceo-display-block ceo-text-truncate"><?php echo $prev_post->post_title; ?></a>
            </div>
        </div>
		<?php }else { ?>
		<div class="b-r-4 ceo-inline ceo-overflow-hidden ceo-width-1-1 ceo-page-img" style="height:100px">
            <?php aye_pageturn_thumb($prev_post->ID);?>
            <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom">
            	<span>上一篇：</span>
            	<p class="ceo-margin-small-top-s">已经没有上一篇了!</p>
            </div>
        </div>
		<?php } ?>
	</div>
	<div class="ceo-width-1-2">
		<?php if (!empty( $next_post )){ ?>
		<div class="b-r-4 ceo-inline ceo-overflow-hidden ceo-width-1-1 ceo-page-img" style="height:100px">
            <?php aye_pageturn_thumb($next_post->ID);?>
            <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom">
            	<span>下一篇：</span>
            	<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="ceo-display-block ceo-text-truncate"><?php echo $next_post->post_title; ?></a>
            </div>
        </div>
	    <?php }else { ?>
	    <div class="b-r-4 ceo-inline ceo-overflow-hidden ceo-width-1-1 ceo-page-img" style="height:100px">
            <?php aye_pageturn_thumb($next_post->ID);?>
            <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom">
            	<span>下一篇：</span>
            	<p class="ceo-margin-small-top-s">已经没有下一篇了!</p>
            </div>
        </div>
	    <?php } ?>
	</div>
	<?php }?>
</div>