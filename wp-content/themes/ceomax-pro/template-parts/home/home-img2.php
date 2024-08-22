<?php
	$home_img_2 = _ceo('home_img_2');
	if(!$home_img_2){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>图片模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<div class="home_img2 ceo-container">
    <ul class="ceo-grid-ceosmls" ceo-grid>
        <?php
		if ($home_img_2) {
			foreach ( $home_img_2 as $key => $value) {
		?>
        <li class="ceo-width-1-5">
            <a href="<?php echo $home_img_2[$key]['link']; ?>" target="_blank" rel="noreferrer nofollow" class="ceo-dongtai">
                <img src="<?php echo $home_img_2[$key]['img']; ?>">
            </a>
        </li>
		<?php } } ?>
    </ul>
</div>
<?php } ?>