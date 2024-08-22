<?php
	$l_slide = _ceo('l_slide');
	if(!$l_slide){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>幻灯模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<section class="ceo_slide2 slide ceo-padding ceo-padding-remove-horizontal">
	<div class="ceo-container">
		<div class="ceo-grid-collapse" ceo-grid>
			<div class="l_slide ceo-width-auto">
				<section class="ceo-background-default">
					<div class="ceo-container">
						<div class="ceo-visible-toggle ceo-light ceo-position-relative" tabindex="-1" ceo-slideshow autoplay="true" autoplay-interval="5000">
								<ul class="slide-ul b-r-4 ceo-slideshow-items" style="height:<?php echo _ceo('slide2_height'); ?>px">
						<?php
						if ($l_slide) {
							foreach ( $l_slide as $key => $value) {
						?>

						<li>
							<a href="<?php echo $l_slide[$key]['link']; ?>" target="_blank" class="slide-item ceo-display-block ceo-width-1-1 ceo-height-1-1 ceo-position-relative">
								<img src="<?php echo $l_slide[$key]['img']; ?>" ceo-cover>
							</a>
						</li>
						<?php } } ?>

					</ul>
							<a class="ceo-position-center-left ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-previous ceo-slideshow-item="previous"></a>
							<a class="ceo-position-center-right ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-next ceo-slideshow-item="next"></a>
							<ul class="ceo-slideshow-nav ceo-dotnav ceo-position-bottom-center ceo-margin-small-bottom"></ul>

						</div>
					</div>
				</section>
			</div>
			<div class="ceo-width-expand ceo-visible@s">
				<?php
					$simg_01 = _ceo('simg_01');
					$simg_02 = _ceo('simg_02');
				?>
				<div class="s_slide b-r-4 ceo-overflow-hidden ceo-inline">
					<a href="<?php echo $simg_01['link']; ?>" target="_blank">
					    <img src="<?php echo $simg_01['img']; ?>">
					    <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom ceo-padding-remove">
					    	<span class="ceo-display-block"><?php echo $simg_01['title']; ?></span>
					    </div>
				    </a>
				</div>
				<div class="s_slide b-r-4 ceo-overflow-hidden ceo-inline">
					<a href="<?php echo $simg_02['link']; ?>" target="_blank">
					    <img src="<?php echo $simg_02['img']; ?>">
					    <div class="ceo-overlay ceo-overlay-primary ceo-position-bottom ceo-padding-remove">
					    	<span class="ceo-display-block"><?php echo $simg_02['title']; ?></span>
					    </div>
				    </a>
				</div>
			</div>
		</div>
	</div>
</section>
<style>.fastlink {padding-bottom: 30px;margin-top: 20px!important;}</style>
<?php } ?>