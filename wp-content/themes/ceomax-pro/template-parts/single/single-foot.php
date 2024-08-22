<div class="single-foot ceo-text-center ceo-padding-an" id="single-anniu">
	<?php if (_ceo('single_collection') == true ): ?>
	<?php echo zongcai_post_collection_button( get_the_ID() );?>
	<?php endif ?>
	
	<?php if (_ceo('single_shang') == true ): ?>
    <a class="reward ceo-display-inline-block btn change-color" href="javascript:void(0)" onClick="dashangToggle()" title="打赏，支持一下"><i class="ceofont ceoicon-gift-2-line"></i> 打赏
    </a>
    <div class="ceo_shang_box">
        <div class="ceo_shang_top">
        	<a class="ceo_shang_close" href="javascript:void(0)" onClick="dashangToggle()" title="关闭"><i class="ceofont ceoicon-close-line"></i></a>
            <img class="ceo_shang_logo" src="<?php echo _ceo('head_logo');?>">
    		<p><?php if(_ceo('single_shang_sz'))echo _ceo('single_shang_sz')['single_shang_title']; ?></p>
        </div>
        <div class="ceo_shang_ma">
            <div class="ceo_shang_pay">
            	<div class="ceo_shang_payimg">
            		<img src="<?php if(_ceo('single_shang_sz'))echo _ceo('single_shang_sz')['single_shang_img']; ?>">
            	</div>
        	    <div class="ceo_pay_explain"><?php if(_ceo('single_shang_sz'))echo _ceo('single_shang_sz')['single_shang_fotitle']; ?></div>
        	</div>
    	</div>
    </div>
    <?php endif ?>
    
	<?php if (_ceo('single_zan') == true ): ?>
	<a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="ceo-display-inline-block btn change-color dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
		<i class="ceofont ceoicon-thumb-up-line"></i> 点赞 (<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
	</a>
	<?php endif ?>
	
	<?php
		$meta = [
	        'down_show' => get_post_meta( get_the_ID(), 'down_show', true ),
	        'down_title' => get_post_meta( get_the_ID(), 'down_title', true ),
	        'down_des' => get_post_meta( get_the_ID(), 'down_des', true ),
	        'down_code' => get_post_meta( get_the_ID(), 'down_code', true ),
	        'down_url' => get_post_meta( get_the_ID(), 'down_url', true ),
	        'down_login' => get_post_meta( get_the_ID(), 'down_login', true ),
	    ];
		if (is_array($meta)) :
		if( $meta['down_show'] == true ):
			if( true ) {
	?>

	<a href="#single-down" id="single-down" class="ceo-display-inline-block btn change-color" ceo-toggle>资源下载<i class="ceofont ceoicon-download-line"></i></a>

	<!-- 免登陆下载 -->
	<div id="single-down" ceo-modal>
	    <div class="ceo-modal-dialog ceo-modal-body">
	    	<h2 class="ceo-h4 ceo-text-center">资源下载</h2>
	    	<p class="b-b ceo-padding-small ceo-padding-remove-horizontal ceo-padding-remove-top ceo-text-small"><b>资源名称</b>：<?php echo $meta['down_title']; ?></p>
	        <p class="b-b ceo-padding-small ceo-padding-remove-horizontal ceo-padding-remove-top ceo-text-small"><b>资源简介</b>：<?php echo $meta['down_des']; ?></p>
	    	<?php if( is_user_logged_in() ) { ?>
			<p class="ceo-text-small"><b>其他信息</b>：<?php echo $meta['down_code']; ?></p>
	        <p class="ceo-text-left ceo-text-center ceo-margin-top">
	            <a href="<?php echo $meta['down_url']; ?>" target="_blank" class="ceo-button ceo-button-primary" type="button">立即下载</a>
	        </p>
	    	<?php
	    	//1 $meta['down_login']==1 免登录下载
	    	}elseif($meta['down_login']==1)  { ?>
                <p class="ceo-text-small"><b>其他信息</b>：<?php echo $meta['down_code']; ?></p>
                <p class="ceo-text-left ceo-text-center ceo-margin-top">
                    <a href="<?php echo $meta['down_url']; ?>" target="_blank" class="ceo-button ceo-button-primary" type="button">立即下载</a>
                </p>
	    	<?php }else  { ?>
			<div class="ceo-alert-primary" ceo-alert>
			    <p class="ceo-text-small">请登录后下载！</p>
			</div>
			<p class="ceo-text-left ceo-text-center ceo-margin-top">
	            <?php if(_ceo('modal_login') == 1 ){ ?>
					<a href="#modal-login"class="ceo-button ceo-button-primary" ceo-toggle>立即登录</a>
				<?php }else { ?>
					<a href="<?php echo home_url(user_trailingslashit('/user/login')); ?>" class="ceo-button ceo-button-primary">立即登录</a>
				<?php } ?>
	        </p>
			<?php } ?>
	    </div>
	</div>
	<?php }else { ?>

	<!-- 登陆后下载 -->
	<div id="single-down" ceo-modal>
	    <div class="ceo-modal-dialog ceo-modal-body">
	        <h2 class="ceo-h4 ceo-text-center">资源下载</h2>
	        <p class="b-b ceo-padding-small ceo-padding-remove-horizontal ceo-padding-remove-top ceo-text-small"><b>资源名称</b>：<?php echo $meta['down_title']; ?></p>
	        <p class="b-b ceo-padding-small ceo-padding-remove-horizontal ceo-padding-remove-top ceo-text-small"><b>资源简介</b>：<?php echo $meta['down_des']; ?></p>
	        <p class="ceo-text-small"><b>其他信息</b>：<?php echo $meta['down_code']; ?></p>
	        <p class="ceo-text-left ceo-text-center ceo-margin-top">
	            <a href="<?php echo $meta['down_url']; ?>" target="_blank" class="ceo-button ceo-button-primary" type="button">立即下载</a>
	        </p>
	    </div>
	</div>
	<?php } ?>
	<?php endif; endif; ?>

</div>

<!--版权-->
<?php if (_ceo('single_cop') == true ): ?>
<div class="single-cop">
	<div class="ceo-alert-banquan b-r-4" ceo-alert>
		<p class="ceo-margin-remove-bottom ceo-margin-small-top ceo-margin-bottom-20"><?php echo _ceo('single_cop_text'); ?></p>
		<?php if (_ceo('single_cop_link') == true ): ?>
	    <p class="ceo-margin-small-bottom"><i class="ceofont ceoicon-map-pin-line"></i><a href="<?php bloginfo('url'); ?>" target="_blank"><?php bloginfo('name'); ?></a> <i class="ceofont ceoicon-arrow-right-s-line"></i> <?php $category = get_the_category();	if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';} ?> <i class="ceofont ceoicon-arrow-right-s-line"></i> <?php the_title(); ?> <i class="ceofont ceoicon-arrow-right-s-line"></i> <?php the_permalink(); ?></p>
	    <?php endif ?>
	</div>
</div>
<?php endif ?>

<!--标签-->
<?php if (_ceo('single_tag') == true ): ?>
<div class="ceo-margin-top b-t">
	<div class="tags-item ceo-single-tags">
		<?php the_tags('', '') ?>
	</div>
</div>
<?php endif ?>