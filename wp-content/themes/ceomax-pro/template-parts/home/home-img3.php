<?php
	$home_img_3 = _ceo('home_img_3');
	if(!$home_img_3){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>图片模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<div class="home_img3 ceo-container">
    <div class="ceo-position-relative ceo-visible-toggle ceo-overflow-hidde" tabindex="-1" ceo-slider>
		<ul class="ceo-grid-ceosmls ceo-slider-items ceo-child-width-1-2 ceo-child-width-1-4@s" ceo-grid>
            <?php
    		if ($home_img_3) {
    			foreach ( $home_img_3 as $key => $value) {
    		?>
            <li>
                <a href="<?php echo $home_img_3[$key]['link']; ?>" target="_blank" rel="noreferrer nofollow">
                    <img src="<?php echo $home_img_3[$key]['img']; ?>">
                </a>
            </li>
    		<?php } } ?>
        </ul>
    </div>
</div>
<?php } ?>