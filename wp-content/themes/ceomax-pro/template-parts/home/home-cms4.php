<?php 
	$cms4 = _ceo('cms4');
	if(!$cms4){
?>

<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>CMS模块，设置该模块内容！</p>
	</div>
</div>
<?php }else { ?>
<div class="home_cms4">
    <ul class="ceo-container">
        <div class="home_cms4_b">
            <?php 
			if ($cms4) { 
				foreach ( $cms4 as $key => $value) {
			?>
            <div class="home_cms4_mk">
                <div class="home_cms4_k ceo-dongtai">
                    <div class="home_cms4_mk_title ceo-flex">
                        <a href="<?php echo $value['links']; ?>" target="_blank" class="ceo-flex-1"><i class="ceofont <?php echo $value['icon']; ?>"></i><?php echo $value['h1']; ?></a>
                        <a href="<?php echo $value['links']; ?>" target="_blank" class="home_cms4_mk_i"><i class="ceofont ceoicon-more-line"></i></a>
                    </div>
                    <div class="home_cms4_mk_tag">
                        <?php 
							 if ( $value['tags'] ) {
								foreach ( $value['tags'] as $k => $v) {
						?>
                        <a href="<?php echo $v['link']; ?>" target="_blank"><?php echo $v['title']; ?></a>
                        <?php } } ?>
                    </div>
                </div>
            </div>
			<?php } } ?>
        </div>
    </ul>
</div>
<?php } ?>