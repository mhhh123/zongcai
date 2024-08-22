<?php
/**
 * Template name: VIP介绍
 */
get_header();
$vip = _ceo('ceo_shop_vip_info');
?>
<div class="ceo_vipbgs"><img src="<?php echo _ceo('vip_top_img'); ?>" style="width: 100%;"></div>
<div class="ceo-container" id="page-content" style="max-width: 1200px;">
    <div class="ceo-pages-vip">
        <?php if(_ceo('ceo_pages_vip_cj') == true): ?>
        <div class="ceo_portal_block_summary">
            <div class="ceo_vip_txtop"><h1><?php echo _ceo('vip_cjtq'); ?><em></em></h1></div>
        	<div class="ceo_youshi_box">
            	<ul>
                	<li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_1']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_1']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_1']; ?></p>
                    </li>
                    <li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_2']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_2']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_2']; ?></p>
                    </li>
                    <li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_3']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_3']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_3']; ?></p>
                    </li>
                    <li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_4']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_4']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_4']; ?></p>
                    </li>
                    <li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_5']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_5']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_5']; ?></p>
                    </li>
                    <li>
                    	<div class="ceo_vip_icon"><img src="<?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_img_6']; ?>"></div>
                        <h5><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_bt_6']; ?></h5>
                        <p><?php if(_ceo('vip_cjtq_sz'))echo _ceo('vip_cjtq_sz')['vip_cjtq_txt_6']; ?></p>
                    </li>
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if(_ceo('ceo_pages_vip_tc') == true): ?>
        <div class="yuvip_buy">
        	<div class="yuvip_title"><?php echo _ceo('vip_tc'); ?><em></em></div>
        	<ul>
        	    <?php
        		if ($vip) {
        			foreach ( $vip as $key => $value) {
        		?>
        		<li>
        		    <div class="item">
            			<div class="con">
            				<?php if( is_user_logged_in() ){ ?>
    				        <a href="javascript:void(0)" class="btn-ceo-svip" data-vip-id="<?php echo $vip[$key]['id'] ?>" data-style="slide-down">立即开通</a>
    				        <?php }else{ ?>
            				<a href="#modal-login" ceo-toggle>立即开通</a>
            				<?php } ?>
            			</div>
				    </div>
        		</li>
        		<?php } } ?>
        	</ul>
        </div>
        <?php endif; ?>

        <?php if(_ceo('ceo_pages_vip_tq') == true): ?>
        <div class="yuvip_serve_father">
            <h3 class="yuvip_title" style="margin-top: 50px;"><?php echo _ceo('vip_tq'); ?><em></em></h3>
            <div class="yuvip_serve">
                <ul>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_1']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_1']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_1']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_2']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_2']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_2']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_3']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_3']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_3']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_4']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_4']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_4']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_5']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_5']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_5']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_6']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_6']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_6']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_7']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_7']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_7']; ?></em>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="<?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_img_8']; ?>">
                            <p><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_bt_8']; ?></p>
                            <em><?php if(_ceo('vip_tq_sz'))echo _ceo('vip_tq_sz')['vip_tq_txt_8']; ?></em>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <?php if(_ceo('ceo_pages_vip_dp') == true): ?>
        <div class="ceo_vip_ping">
            <div class="deanw1180">
                <div class="yuvip_title"><?php echo _ceo('vip_dp'); ?><em></em></div>
                <div class="clear"></div>
                <ul>
                    <?php
                        $vip_dp_sz = _ceo('vip_dp_sz');
                    ?>
                    <div class="portal_block_summary">
                        <?php
            			if ($vip_dp_sz) {
            				foreach ( $vip_dp_sz as $key => $value) {
            			?>
                        <li>
                            <div class="deanmbavar">
                                <img src="<?php echo $vip_dp_sz[$key]['img']; ?>" width="80">
                                <span></span>
                            </div>
                            <div class="clear"></div>
                            <div class="deanmbusename"><?php echo $value['bt']; ?><b>VIP</b></div>
                            <div class="clear"></div>
                            <p><b>"</b><?php echo $value['pj']; ?><b>"</b></p>
                        </li>
                        <?php } } ?>
                    </div>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php if(_ceo('ceo_pages_vip_db') == true): ?>
<div class="yuvip_pic ceo-background-cover" style="background-image: url(<?php if(_ceo('vip_db_sz'))echo _ceo('vip_db_sz')['vip_db_img']; ?>);">
    <div class="yuvip_pic_title"><?php if(_ceo('vip_db_sz'))echo _ceo('vip_db_sz')['vip_db_bt']; ?></div>
    <div class="yuvip_pic_title_small"><?php if(_ceo('vip_db_sz'))echo _ceo('vip_db_sz')['vip_db_txt']; ?></div>
</div>
<?php endif; ?>
<?php get_footer();?>