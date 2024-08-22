<?php
	$home_img_1 = _ceo('home_img_1');
	if(!$home_img_1){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>图片模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<div class="home_img1 ceo-container">
	<div class="ceo-position-relative ceo-visible-toggle ceo-overflow-hidde" tabindex="-1" ceo-slider>
		<ul class="ceo-grid-ceosmls ceo-slider-items ceo-child-width-1-2 ceo-child-width-1-6@s" ceo-grid>
            <?php
    		if ($home_img_1) {
    			foreach ( $home_img_1 as $key => $value) {
    		?>
            <li>
                <a href="<?php echo $home_img_1[$key]['link']; ?>" target="_blank" rel="noreferrer nofollow">
                    <img src="<?php echo $home_img_1[$key]['img']; ?>">
                </a>
            </li>
    		<?php } } ?>
        </ul>
    </div>
</div>
<?php } ?>