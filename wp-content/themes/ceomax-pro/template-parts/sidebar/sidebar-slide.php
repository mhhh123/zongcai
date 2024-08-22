<?php 
	$side_slide = _ceo('side_slide');
	if(!$side_slide){
?>

<div class="ceo-container ceo-margin-bottom">
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>右侧边栏<i class="ceofont ceoicon-arrow-right-s-line"></i>轮播模块，设置该模块内容！</p>
	</div>
</div>
	
<?php }else { ?>
<div class="slide ceo-margin-bottom b-r-4 b-a ceo-background-default ceo-padding-small">
    <div class="ceo-position-relative ceo-visible-toggle" tabindex="-1" ceo-slideshow="autoplay: true">
        <ul class="ceo-slideshow-items">
            <?php 
            if ($side_slide) { 
            	foreach ( $side_slide as $key => $value) {
            ?>
            <li>
                <a class="ceo-display-block ceo-height-1-1" href="<?php echo $side_slide[$key]['link'] ?>" target="_blank" rel="noreferrer nofollow">
                    <img src="<?php echo $side_slide[$key]['img'] ?>" alt="<?php echo $side_slide[$key]['title']; ?> 到期时间：<?php echo $side_slide[$key]['date']; ?>" ceo-cover>
                </a>
            </li>
            <?php } } ?>
        </ul>
        <ul class="ceo-slideshow-nav ceo-dotnav ceo-position-bottom-center"></ul>
    </div>
</div>
<?php } ?>
<!-- 侧边栏轮播广告模块 -->