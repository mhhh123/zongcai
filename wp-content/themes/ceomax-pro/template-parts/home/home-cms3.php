<?php
	$cms3 = _ceo('cms3');
	if(!$cms3){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>图片模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<div class="home_cms3 ceo-container">
    <ul>
        <?php
		if ($cms3) {
			foreach ( $cms3 as $key => $value) {
		?>
        <li class="ceo-dongtai">
            <a href="<?php echo $cms3[$key]['link']; ?>" target="_blank" rel="noreferrer nofollow"><img src="<?php echo $cms3[$key]['img']; ?>"><em><?php echo $cms3[$key]['title']; ?></em></a>
        </li>
        <?php } } ?>
    </ul>
</div>
<?php } ?>