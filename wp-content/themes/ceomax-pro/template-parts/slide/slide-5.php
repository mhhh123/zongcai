<?php
	$slide_quanping = _ceo('slide_quanping');
	if(!$slide_quanping){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>幻灯模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<section class="slide_05 ceo-background-default">
	<div class="ceo-visible-toggle ceo-light ceo-position-relative" tabindex="-1" ceo-slideshow autoplay="true" autoplay-interval="5000">
		<ul class="slide-ul ceo-slideshow-items" style="height:<?php echo _ceo('slide_quanping_height'); ?>px">
			<?php
			if ($slide_quanping) {
				foreach ( $slide_quanping as $key => $value) {
			?>

			<li>
				<a href="<?php echo $slide_quanping[$key]['link']; ?>" target="_blank" class="slide-item ceo-display-block ceo-width-1-1 ceo-height-1-1 ceo-position-relative" style="height:<?php echo _ceo('slide_quanping_height'); ?>px">
					<img src="<?php echo $slide_quanping[$key]['img']; ?>" ceo-cover>
				</a>
			</li>
			<?php } } ?>
		</ul>
		<a class="ceo-position-center-left ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-previous ceo-slideshow-item="previous"></a>
		<a class="ceo-position-center-right ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-next ceo-slideshow-item="next"></a>
		<ul class="ceo-slideshow-nav ceo-dotnav ceo-position-bottom-center ceo-margin-small-bottom"></ul>
	</div>
</section>
<style>.fastlink {padding-bottom: 30px;margin-top: 20px!important;}</style>
<?php } ?>