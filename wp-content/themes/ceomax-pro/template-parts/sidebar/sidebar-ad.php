<?php 
	$side_ad = _ceo('side_ad');
	if(!$side_ad){ 
?>

<div class="ceo-container ceo-margin-bottom">
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>右侧边栏<i class="ceofont ceoicon-arrow-right-s-line"></i>广告模块，设置该模块内容！</p>
	</div>
</div>
	
<?php }else { ?>

<?php 
if ($side_ad) { 
	foreach ( $side_ad as $key => $value) {
?>
<section class="side-ad b-r-4 b-a ceo-background-default ceo-overflow-hidden ceo-margin-medium-bottom">
	<div class="ceo-padding-small">
		<a href="<?php echo $side_ad[$key]['url'] ?>" target="_blank" rel="noreferrer nofollow" class="ceo-display-block ceo-text-center">
		    <img src="<?php echo $side_ad[$key]['img'] ?>" alt="<?php echo $side_ad[$key]['title']; ?> 到期时间：<?php echo $side_ad[$key]['date']; ?>" class="b-r-4">
		</a>
	</div>
</section>
<?php } }?>
<?php } ?>
<!-- 侧边栏广告模块 -->