<?php
	$cat_special = _ceo('cat_special');
	if (!$cat_special){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>专题频道，设置该模块内容！</p>
	</div>
</div>
<?php }else { ?>

<section class="zhuanti ceo-margin-medium-bottom">
    <div class="ceo-container ceo-margin-medium-top ceo-margin-medium-bottom">
        <div class="ceo-zhuanti-wrap">
            <div class="content container">
                <div class="section-title ceo-flex-middle">
                    <ul class="ceo-cat-switcher cat-switcher ceo-padding-remove" ceo-switcher>
                       <h5><?php echo _ceo('special_title'); ?></h5>
        		       <em></em>
                    </ul>
    	        </div>
    	        <div class="ceo-grid-medium" ceo-grid>
                    <?php
            		if ($cat_special) {
            			foreach ( $cat_special as $key => $value) {
            		?>
                    <div class="ceo-width-1-2 ceo-width-1-4@s">
                        <div class="ceo-zhuanti-item ceo-dongtai">
                            <a href="<?php echo get_category_link( $value['id'] ); ?>" target="_blank">
                                <div class="ceo-zhuanti-item-thumb">
                                    <i class="ceo-zhuanti-thumb " style="background-image:url(<?php echo $value['img']?>"/>)"></i>
                                    <h5> <span class="r"><i class="ceofont ceoicon-edit-2-line"></i> <?php echo wp_get_cat_postcount($value['id']); ?> 篇文章</span> </h5>
                                </div>
                                <h2><?php echo $value['title']; ?></h2>
                                <div class="entry">
                                    <?php echo $value ['describe'];?>
                                </div>
                                <div class="btns">
                                    <span class="btn">查看专题</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>