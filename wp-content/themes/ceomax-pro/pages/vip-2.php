<?php
/**
 * Template name: VIP介绍2
 */
get_header();
$vip2_top_sz = _ceo('vip2_top_sz');
$vip2_privilege_sz = _ceo('vip2_privilege_sz');
$vip2_qa_sz = _ceo('vip2_qa_sz');

$vip = _ceo('ceo_shop_vip_info');
?>
<div class="coe_vip2_top ceo-background-cover" style="background-image: url(<?php echo _ceo('vip2_top_img'); ?>);">
	<div class="coe_vip2_max ceo-container">
	    <div class="coe_vip2_logo">
	        <a rel="home" href="/"><img itemprop="logo" src="<?php echo _ceo('vip2_top_logo'); ?>"></a>
        </div>
		<h2><?php echo _ceo('vip2_top_title'); ?></h2>
		<div class="coe_vip2_privilege_list">
		    <?php
			if ($vip2_top_sz) {
				foreach ( $vip2_top_sz as $key => $value) {
			?>
			<span><i class="ceofont <?php echo $vip2_top_sz[$key]['ico']; ?>"></i><?php echo $vip2_top_sz[$key]['title']; ?></span>
			<?php } } ?>
		</div>
	</div>
</div>

<div class="ceo_vip2_bg">
	<div class="ceo_vip2_content ceo-container">
	    <div class="" ceo-grid>
	        <?php
        		if ($vip) {
        			foreach ( $vip as $key => $value) {
        		?>
    		<div class="ceo_vip2_box ceo-width-1-1@s ceo-width-1-2@m ceo-width-1-4@l ceo-width-1-4@xl">
    		    <div class="ceo_vip2_types">
        			<div class="ceo_vip2_type_top">
        			    <?php if ($vip[$key]['tags']): ?>
            	        <div class="tag"><?php echo $vip[$key]['tags']; ?></div>
            	        <?php endif; ?>
        				<div class="ceo_vip2_type_top_title"><?php echo $vip[$key]['name']; ?></div>
        				<div class="ceo_vip2_type_price">
        					<div class="ceo_vip2_p_num">¥ <?php echo $vip[$key]['price']; ?><em><?php echo _ceo('ceo_shop_currency_name'); ?></em></div>
        				</div>
        				<div class="ceo_vip2_text">每天可下载<?php echo $vip[$key]['number']; ?>个VIP资源</div>
        				<div class="ceo_vip2_touse">
        				    <?php if( is_user_logged_in() ){ ?>
        				    <a href="javascript:void(0)" class="btn-ceo-svip ceo_vip2_btn" data-vip-id="<?php echo $vip[$key]['id'] ?>" data-style="slide-down">立即开通</a>
        				    <?php }else{ ?>
            				<a href="#modal-login" ceo-toggle>立即开通</a>
            				<?php } ?>
        				</div>
        			</div>
        			<ul class="ceo_vip2_vip_type_privilege">
        				<li class="ceo_vip2_line"><h3><span>套餐介绍</span></h3></li>
        				<p><?php echo $vip[$key]['desc']; ?></p>
        			</ul>
    			</div>
    		</div>
    		<?php } } ?>
    		
		</div>
	</div>
</div>

<div class="ceo_vip2_activity ceo-background-default">
    <div class="ceo-container">
    	<div class="ceo_vip2_activity_title"><?php echo _ceo('vip2_privilege_title'); ?></div>
    	<div class="ceo_vip2_activity_box">
        	<ul class="ceo_vip2_activity_gifts ceo-grid-small" ceo-grid>
        	    <?php
    			if ($vip2_privilege_sz) {
    				foreach ( $vip2_privilege_sz as $key => $value) {
    			?>
        		<li class="ceo-width-1-2 ceo-width-1-6@xl">
        		    <div class="ceo_vip2_activity_gifts_b ceo-dt">
            		    <i class="ceofont <?php echo $vip2_privilege_sz[$key]['ico']; ?>"></i>
            			<span><?php echo $vip2_privilege_sz[$key]['title']; ?></span>
            			<p><?php echo $vip2_privilege_sz[$key]['subtitle']; ?></p>
        			</div>
        		</li>
        		<?php } } ?>
        	</ul>
    	</div>
    
    	<div class="ceo_vip2_btn_box">
    		<a href="<?php echo _ceo('vip2_privilege_link'); ?>" class="ceo-dt"><?php echo _ceo('vip2_privilege_an'); ?></a>
    	</div>
	</div>
</div>

<div class="ceo_vip2_qa ceo-background-default">
    <div class="ceo-container">
    	<div class="ceo_vip2_activity_title">
    	    <span><?php echo _ceo('vip2_qa_title'); ?></span>
    	    <p><?php echo _ceo('vip2_qa_subtitle'); ?></p>
	    </div>
    	<div class="ceo_vip2_qa_box">
    	    <ul ceo-accordion>
    	        <?php
    			if ($vip2_qa_sz) {
    				foreach ( $vip2_qa_sz as $key => $value) {
    			?>
                <li>
                    <a class="ceo-accordion-title" href="#"><?php echo $vip2_qa_sz[$key]['title']; ?></a>
                    <div class="ceo-accordion-content">
                        <p><?php echo $vip2_qa_sz[$key]['content']; ?></p>
                    </div>
                </li>
                <?php } } ?>
            </ul>
	    </div>
	</div>
</div>
<div class="ceo_vip2_footer" style=" background: #3253e3 url(<?php echo _ceo('vip2_footer_img'); ?>) center top no-repeat;">
    <div class="ceo_vip2_footer_wrapper">
        <h3><?php echo _ceo('vip2_footer_title'); ?></h3>
        <a href="#">立即加入</a>
    </div>
</div>
<?php get_footer();?>