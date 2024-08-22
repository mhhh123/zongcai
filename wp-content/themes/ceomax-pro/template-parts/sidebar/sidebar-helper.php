<section class="helper b-a b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom ceo-position-relative">
	<h5 class="ceo-margin-remove-bottom"><?php echo _ceo('side_helper_title'); ?></h5>
	<div class="ceo-padding-small ceo-padding-remove-left">
		<p class="ceo-text-small ceo-text-muted"><?php echo _ceo('side_helper_content'); ?></p>
		<a href="#qq" class="ceo-qun btn change-color b-r-4 ceo-display-inline-block ceo-light" ceo-toggle=""><i class="ceofont ceoicon-qq-fill"></i><?php echo _ceo('side_helper_btn'); ?></a>
		<div class="helper-thumb"><img src="<?php echo _ceo('side_helper_bg'); ?>" alt="<?php bloginfo('name'); ?>"></div>
	</div>
	<?php
	$side_helper_modal = _ceo('side_helper_modal');
	if (is_array( $side_helper_modal) ):
	?>
	<div id="qq" ceo-modal="" class="ceo-modal">
		<div class="ceo-modal-dialog ceo-modal-body">
			<h4><?php echo $side_helper_modal['title']; ?></h4>
			<div class="ceo-text-small">
				<?php echo $side_helper_modal['content']; ?>
				
			</div>
		</div>
	</div>
	<?php endif; ?>
	
</section>
<!-- 侧边栏帮助模块 -->