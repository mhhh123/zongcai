<?php 
	$cms2 = _ceo('cms2');
	if(!$cms2){
?>

<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>CMS模块，设置该模块内容！</p>
	</div>
</div>
<?php }else { ?>

<section class="fastlink ceo-container ceo-overflow-hidden">
	<div class="ceo-position-relative ceo-visible-toggle" tabindex="-1" ceo-slider>
		<ul class="ceo-grid-small ceo-slider-items ceo-child-width-1-1@s ceo-child-width-1-4@m" ceo-grid>
			<?php 
			if ($cms2) { 
				foreach ( $cms2 as $key => $value) {
			?>
			<li>
				<div class="fastlink-item ceo-background-default b-a b-r-4 ceo-padding-small">
					<div class="fastlink-title b-b ceo-flex ceo-flex-middle ceo-text-bolder">
						<i class="ceofont <?php echo $value['icon']; ?>"></i><?php echo $value['h1']; ?><span class="ceo-text-muted ceo-margin-small-left ceo-text-small"><?php echo $value['des']; ?></span>
					</div>
					<?php 
					$cms2_style = $value['cms2_style'];
					if( $cms2_style == 'img' ){ ?>
					
					<div class="fastlink-img ceo-position-relative">
						<a href="<?php echo $value['img']['link']; ?>" target="_blank" class="ceo-display-block">
							<img src="<?php echo $value['img']['img_url']; ?>" alt="<?php bloginfo('name'); ?>" class="ceo-width-1-1">
						</a>
					</div>
					<?php } elseif( $cms2_style == 'tags' ) { ?>
					
					<div class="ceo-list tags-item ceo-margin-remove-bottom">
						<?php 
							 if ( $value['tags'] ) {
								foreach ( $value['tags'] as $k => $v) {
						?>

						<a href="<?php echo $v['link']; ?>" target="_blank" class="b-r-4"><?php echo $v['title']; ?></a>
						<?php } } ?>
						
					</div>
					<?php } elseif( $cms2_style == 'icons' ) { ?>
					
					<div class="fastlink-icons tags-item ceo-margin-remove-bottom">
						<?php 
							 if ( $value['icons'] ) {
								foreach ( $value['icons'] as $k => $v) {
						?>
						<div class="fastlink-icons-d">
							<a href="<?php echo $v['link']; ?>" target="_blank">
							<i class="ceofont <?php echo $v['icon']; ?>"></i>
							<span><?php echo $v['title']; ?></span>
							</a>
						</div>
						<?php } } ?>
						
					</div>
					<?php }else { ?>
					
					<ul class="fastlink-list ceo-padding-remove">
						<?php 
							 if ( $value['list'] ) {
								foreach ( $value['list'] as $k => $v) {
						?>
						<li><a href="<?php echo $v['link']; ?>" target="_blank" class="ceo-text-truncate"><?php echo $v['title']; ?></a></li>
						<?php } } ?>

					</ul>	
					<?php } ?>

				</div>
			</li>
			<?php } } ?>

		</ul>
	</div>
</section>
<?php } ?>