<?php
    $goTop_qq_sz = _ceo('goTop_qq_sz');
    $goTop_zidingyi_sz = _ceo('goTop_zidingyi_sz');
?>

<?php if(_ceo('goTop') == true): ?>
<div class="wapnone ceo_follow_service" style="top:<?php echo _ceo('goTop_gd'); ?>%">
    <!--活动按钮-->
    <?php if(_ceo('goTop_hd') == true): ?>
    <div class="ceo-footer-sidebar-girl animated">
        <a href="<?php if(_ceo('goTop_hd_sz'))echo _ceo('goTop_hd_sz')['goTop_hd_lj']; ?>" target="_blank">
            <img class="girl" src="<?php if(_ceo('goTop_hd_sz'))echo _ceo('goTop_hd_sz')['goTop_hd_img']; ?>">
            <div class="livechat-hint rd-notice-tooltip rd-notice-type-success rd-notice-position-left single-line show_hint">
                <div class="rd-notice-content"><?php if(_ceo('goTop_hd_sz'))echo _ceo('goTop_hd_sz')['goTop_hd_bt']; ?></div>
            </div>
            <div class="animated-circles">
                <div class="circle c-1"></div>
                <div class="circle c-2"></div>
                <div class="circle c-3"></div>
            </div>
        </a>
    </div>
    <?php endif; ?>
    <!--侧边栏跟随客服---->
	<ul>
	    <?php if(_ceo('goTop_qiandao') == true): ?>
	    <?php if( is_user_logged_in() ){ ?>
        <!--签到-->
        <li class="ceo_follow_service_box ceo_follow_service_consult ceo_footer_s">
            <a href="javascript:void(0)" class="ceo_today_active btn-ceo-sign ceo-sign member-sign" data-style="down">
		        <i class="ceofont ceoicon-calendar-todo-line"></i>
		    </a>
        </li>
        <?php } ?>
        <?php endif; ?>
        
        <?php if(_ceo('goTop_lottery') == true): ?>
        <!--抽奖-->
        <div class="ceo_follow_service_box ceo_follow_service_consult ceo_footer_s">
            <a href="javascript:void(0)" class="btn-ceo-lottery ceo-display-block">
                <i class="ceofont ceoicon-signal-tower-line"></i>
            </a>
        </div>
        <?php endif; ?>
        
	    <?php if(_ceo('goTop_qq') == true): ?>
		<li class="ceo_follow_service_box ceo_follow_service_consult">
		    <span class="ceo_follow_qq" href="javacript:;"><i class="ceofont <?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_ico']; ?>"></i>
			<div class="ceo_follow_service_consult_cont"> <span class="ceo_follow_service_triangle"></span>
				<div class="ceo_follow_service_consult_cont_top">
				    <span class="ceo_follow_service_hint">
						<span><i class="ceo_follow_service_iconlx ceofont ceoicon-discuss-line"></i> <?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_dinbu']; ?> </span>
					</span>
					<?php
        			if ($goTop_qq_sz) {
        				foreach ( $goTop_qq_sz as $key => $value) {
        			?>
    				<a class="ceo_follow_service_button" href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['goTop_qq_qq']; ?>&site=qq&menu=yes" target="_blank"><?php echo $value['goTop_qq_bt']; ?></a>
        			<?php } } ?>
				</div>
				<span class="ceo_follow_service_phone"> <?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_shuoming']; ?> </span>
				<span class="ceo_follow_service_check_site">
					<span onclick="window.open('<?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_dibu_link']; ?>')">
					    <i class="ceo_follow_service_icongd ceofont <?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_dibu_ico']; ?>"></i><?php if(_ceo('goTop_qq_sz_top'))echo _ceo('goTop_qq_sz_top')['goTop_qq_dibu']; ?>
					</span>
				</span>
			</div>
			</span>
		</li>
		<?php endif; ?>

		<?php if(_ceo('goTop_weixin') == true): ?>
		<li class="ceo_follow_service_box ceo_follow_service_qr ceo_footer_s">
		    <a href="javacript:;"><i class="ceofont <?php if(_ceo('goTop_weixin_sz_top'))echo _ceo('goTop_weixin_sz_top')['goTop_weixin_ico']; ?>"></i>
			<div class="ceo_follow_service_qr_cont">
			    <span class="ceo_follow_service_triangle"></span>
				<div class="ceo_follow_service_qrimg">
				    <span class="ceo_follow_service_qrimg_site" style="background: url(<?php if(_ceo('goTop_weixin_sz_top'))echo _ceo('goTop_weixin_sz_top')['goTop_weixin_bg']; ?>)"></span>
				    <?php if(_ceo('goTop_weixin_sz_top'))echo _ceo('goTop_weixin_sz_top')['goTop_weixin_title']; ?>
				</div>
				<div class="ceo_follow_service_qrtext">
				    <span><?php if(_ceo('goTop_weixin_sz_top'))echo _ceo('goTop_weixin_sz_top')['goTop_weixin_content']; ?></span>
				</div>
			</div>
			</a>
		</li>
		<?php endif; ?>

		<?php if(_ceo('goTop_zidingyi') == true): ?>
		<?php
		if ($goTop_zidingyi_sz) {
			foreach ( $goTop_zidingyi_sz as $key => $value) {
		?>
		<li class="ceo_follow_service_box ceo_follow_service_ax ceo_footer_s">
		    <a href="<?php echo $value['goTop_zidingyi_link']; ?>" target="_blank"><i class="ceofont <?php echo $value['goTop_zidingyi_ico']; ?>"></i>
			<div class="ceo_follow_service_ax_cont"> <span class="ceo_follow_service_triangle"></span> <?php echo $value['goTop_zidingyi_bt']; ?> </div>
			</a>
		</li>
		<?php } } ?>
		<?php endif; ?>

		<li class="ceo_follow_service_box ceo_follow_service_ax goTop ceo_footer_s">
		    <a href="#header" class="ceo-display-block" ceo-scroll><i class="ceofont ceoicon-arrow-up-s-line"></i>
			<div class="ceo_follow_service_ax_cont"> <span class="ceo_follow_service_triangle"></span> <span> 返回顶部 </span> </div>
			</a>
		</li>
	</ul>
</div>
<!--侧边栏跟随客服---->
<?php endif; ?>
<div class="ceo-app-gotop gotops ceo-hidden@s" id="gotops">
    <a href="#header" class="ceo-display-block" ceo-scroll>
        <i class="ceofont ceoicon-arrow-up-s-line"></i>
    </a>
</div>