<?php
	$yewu_1_mk = _ceo('yewu_1_mk');
	if(!$yewu_1_mk){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>业务模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<div class="yewu1 yewu1-mall" style="background-image: url(<?php if(_ceo('yewu_1_sz'))echo _ceo('yewu_1_sz')['yewu_1_img']; ?>);">
	<div class="yewu1-title">
		<h1><?php if(_ceo('yewu_1_sz'))echo _ceo('yewu_1_sz')['yewu_1_title']; ?></h1>
		<h2><?php if(_ceo('yewu_1_sz'))echo _ceo('yewu_1_sz')['yewu_1_desc']; ?></h2>
	</div>
	<div class="ceo-container">
		<div class="yewu1-app">
			<ul>
			    <?php 
        			if ($yewu_1_mk) { 
        				foreach ( $yewu_1_mk as $k => $value) {
        			?>
				<li>
				    <a href="<?php echo $value['link']; ?>" target="_blank">
    					<div class="yewu1-app-card" target="_blank">
    						<div class="yewu1-app-card-bg" style="background-image: url(<?php echo $value['img']; ?>)">
    						</div>
    						<div class="yewu1-app-card-top">
    							<i class="ceofont <?php echo $value['icon']; ?>"></i>
    							<h2><?php echo $value['title']; ?></h2>
    							<p><?php echo $value['desc']; ?></p>
    						</div>
    						<div class="yewu1-app-card-bottom">
    							<ul>
    							    <?php 
        							 if ( $value['yewu_1_mk_js'] ) {
        								foreach ( $value['yewu_1_mk_js'] as $k => $v) {
            						?>
    								<li>
    									<?php echo $v['title']; ?>
    								</li>
    								<?php } } ?>
    							</ul>
    						</div>
    					</div>
					</a>
				</li>
				<?php } } ?>
			</ul>
		</div>
	</div>
	<div class="yewu1-bottom">
	</div>
</div>
<?php }?>