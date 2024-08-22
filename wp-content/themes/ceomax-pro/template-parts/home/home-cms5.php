<?php 
	$cms5_tags = _ceo('cms5_tags');
	if(!$cms5_tags){
?>

<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>CMS模块，设置该模块内容！</p>
	</div>
</div>
<?php }else { ?>
<div class="home_cms5 ceo-container">
    <div class="home_cms5_mk">
        <div class="home_cms5_title">
        	<span><i class="ceofont <?php echo _ceo('cms5_icon'); ?>"></i><?php echo _ceo('cms5_title'); ?></span>
            <em><?php echo _ceo('cms5_title2'); ?></em>
        </div>
        <div class="home_cms5_link">
            <?php
    		if ($cms5_tags) {
    			foreach ( $cms5_tags as $key => $value) {
    		?>
            <li>
                <a href="<?php echo $cms5_tags[$key]['link']; ?>" target="_blank" class="ceo-dongtai">
                    <img src="<?php echo $cms5_tags[$key]['img']; ?>">
                    <span><?php echo $cms5_tags[$key]['title']; ?></span>
                </a>
            </li>
            <?php } } ?>
        </div>
    </div>
</div>
<?php } ?>