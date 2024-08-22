<?php
/**
 * Template Name: 客服QQ验证
 */

get_header();
?>
<?php
    $ceo_qq_kefu_sz = _ceo('ceo_qq_kefu_sz');
?>
<div class="ceo-checkqq-top ceo-background-cover" style="background-image: url(<?php echo _ceo('ceo_qq_kefu_bg'); ?>);"></div>
<div class="ceo-container">
    <div class="ceo-checkqq ceo-margin-top-20 ceo-margin-bottom-20">
        <div class="b-r-4 ceo-background-default ceo-overflow-hidden ceo-position-relative ceo-padding-30px">
            <div class="search" colSpan=4 rowSpan=2 align=center valign="middle">
    			<form method="get" class="b-r-4 b-a ceo-form ceo-flex ceo-overflow-hidden search-form" action="<?php echo home_url();?>">
    			    <input name=fname id="fname" value="" placeholder="请输入您需要验证的客服：手机号、QQ号" class="ceo-input ceo-flex-1 ceo-text-small"
                               onBlur="if (this.value==''){this.value='';}" onFocus="if (this.value==''){this.value='';}"
                        />
    				<button id="search-qq" type="image"><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></button>
    			</form>
    			<p class="ceo-checkqq-desc"><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('ceo_qq_kefu_title'); ?></p>
    		</div>
    	</div>
    </div>
    
    <div id="modal_check_kefu_qq" ceo-modal>
        <div class="ceo-modal-dialog ceo-modal-body ceo-margin-auto-vertical b-r-12">
            <div class="ceo-login-title">
                <h3 class="ceo-modal-title ceo-text-align"></h3>
            </div>
            <p class="title-minor" style="text-align: center">
                <em></em>
                <span id="kefu-modal-msg"></span>
                <em></em>
            </p>
        </div>
    </div>
    <?php if(_ceo('ceo_qq_kefu') == true ): ?>
    <div class="ceo-checkqq-mk ceo-grid-medium ceo-grid" ceo-grid>
        <?php
		if ($ceo_qq_kefu_sz) {
			foreach ( $ceo_qq_kefu_sz as $key => $value) {
		?>
        <div class="ceo-width-1-1@s ceo-width-1-2@xl">
            <div class="ceo-checkqq-box ceo-dongtai">
                <div class="ceo-checkqq-box-img">
                    <img src="<?php echo $value['img']; ?>">
                </div>
                <div class="ceo-checkqq-box-title">
                    <div class="ceo-checkqq-box-title-name"><?php echo $value['title']; ?><p><i class="ceofont <?php echo $value['ico']; ?>"></i><?php echo $value['p']; ?></p></div>
                    <div class="ceo-checkqq-box-title-where"><?php echo $value['position']; ?></div>
                    <div class="ceo-checkqq-box-title-desc"><?php echo $value['explain']; ?></div>
                </div>
                <div class="ceo-checkqq-box-title-an">
                    <a href="<?php echo $value['link']; ?>" target="_blank" rel="noreferrer nofollow"><?php echo $value['link_title']; ?></a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
    <?php endif; ?>
</div>
<?php get_footer();?>