<?php if(_ceo('ceo_app_cd') == true ): ?>
<?php
	$ceo_app_cd_an = _ceo('ceo_app_cd_an');
	if(!$ceo_app_cd_an)
?>
<section class="aui-scrollView">
	<div class="aui-palace aui-palace-one">
	    <?php
		if ($ceo_app_cd_an) {
			foreach ( $ceo_app_cd_an as $key => $value) {
		?>
		<a href="<?php echo $ceo_app_cd_an[$key]['link']; ?>" class="aui-palace-grid">
			<div class="aui-palace-grid-icon">
				<img src="<?php echo $ceo_app_cd_an[$key]['img']; ?>" alt="">
			</div>
			<div class="aui-palace-grid-text">
				<h2><?php echo $ceo_app_cd_an[$key]['title']; ?></h2>
			</div>
		</a>
		<?php } } ?>
	</div>
	<div class="divHeight"></div>
</section>
<?php ?>
<?php endif; ?>