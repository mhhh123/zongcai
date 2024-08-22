<?php 
	$cms1 = _ceo('cms1');
	if(!$cms1){ 
?>

<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>CMS模块，设置该模块内容！</p>
	</div>
</div>
	
<?php }else { ?>

<section class="fastnav ceo-background-default ceo-margin-bottom-20 ceo-visible@s">
	<div class="ceo-container ceo-padding ceo-fastnav-p">
		<div class="ceo-grid" ceo-grid>
			<?php 
			if ($cms1) { 
				foreach ( $cms1 as $key => $value) {
			?>
			<div class="ceo-width-1-4">
				<div class="fastnav-item ceo-flex ceo-flex-middle">
					<div class="ceo-margin-small-right">
						<i class="ceofont <?php echo $cms1[$key]['icon']; ?> item-i"></i>
					</div>
					<div class="ceo-text-truncate">
						<h3 class="ceo-margin-remove-top">
							<a href="<?php echo $cms1[$key]['link']; ?>" target="_blank" class="ceo-flex ceo-flex-middle">
								<span class="ceo-text-bold"><?php echo $cms1[$key]['title']; ?></span>
								<span class="go change-color ceo-margin-small-left">go<i class="ceofont ceoicon-arrow-right-s-line"></i></span>
							</a>
						</h3>
						<p class="ceo-text-small ceo-text-muted ceo-margin-remove ceo-text-truncate"><?php echo $cms1[$key]['des']; ?></p>
					</div>
				</div>
			</div>
			<?php } } ?>

		</div>
	</div>
</section>
<?php } ?>