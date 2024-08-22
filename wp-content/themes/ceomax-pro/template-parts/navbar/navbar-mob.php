<?php if(_ceo('modal_show') == true): ?>
<!--整站弹窗公告-->
<div id="home-modal" ceo-modal>
	<div class="ceo-tan home-modal ceo-padding-remove ceo-modal-dialog ceo-modal-body ceo-margin-auto-vertical">
		<div class="b-r-12 ceo-background-default ceo-overflow-hidden ceo-position-relative">
		    <div class="home-modal-bg ceo-overflow-hidden ceo-position-top">
		        <img src="<?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_bg']; ?>">
		    </div>
    		<div class="home-modal-main ceo-text-center ceo-position-relative ceo-position-z-index">
    		    <div class="ceo-padding ceo-margin-bottom ceo-tanchuang-gg ceo-margin-bottom-40">
        			<h3 class="ceo-margin-bottom"><?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_title']; ?></h3>
        			<p class="ceo-margin-remove ceo-margin-bottom-20"><?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_content']; ?></p>
        			<div class="ceo-container ceo-grid-small" ceo-grid>
        			    <div class="ceo-width-1-2 ceo-light">
        			       <a href="<?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_btn_url']; ?>" class="ceo-tanchuang-gg-an header-btn-search-s ceo-dt change-color btn-search-all" target="_blank" rel="nofollow" ><?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_btn']; ?></a> 
        			    </div>
        			    <div class="ceo-width-1-2">
        			       <span id="home-modal-close" class="ceo-tanchuang-gg-an home-modal-btn home-modal-close b-r-4 ceo-display-inline-block"><?php if(_ceo('modal_show_sz'))echo _ceo('modal_show_sz')['modal_btn_g']; ?></span> 
        			    </div>
        			</div>
    			</div>
    		</div>
		</div>
		<div class="home-modal-bottom">
		    <ul>
		        <li></li>
		        <li></li>
		    </ul>
		</div>
	</div>
</div>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/static/js/jquery.cookie.js'></script>
<script>
	if($.cookie('isLogin')){
	}else{
		UIkit.modal('#home-modal').show();
		$.cookie('isLogin', 'true', { expires: 30 , path: '/'}); //设置cookie过期时间为30天
	}

	$('#home-modal-close').click(function(){
		UIkit.modal('#home-modal').hide();
	});
</script>
<?php endif; ?>