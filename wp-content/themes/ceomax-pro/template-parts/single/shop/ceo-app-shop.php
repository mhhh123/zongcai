<?php
    $post_id=get_the_ID();
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
    $ceoshop_3_zz_sz = _ceo('ceoshop_3_zz_sz'); 
?>

<div class="ceo_app_shop">
    <div class="app_shop_mk" <?php if(_ceo('ceoshop_3_bg') == true): ?>style="background: url(<?php echo _ceo('ceoshop_3_bg_img'); ?>) no-repeat center top;background-size: 100% 100%;"<?php endif; ?>>
        <?php if(_ceo('ceo_app_shop_img') == true): ?>
        <div class="app_shop_img">
            <img src="<?php echo post_thumbnail_src(); ?>" data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>">
        </div>
        <?php endif; ?>
        <header class="app_shop_title">
            <h1 class="app_shop_title_h1" title="<?php the_title(); ?>">
                <?php get_template_part( 'template-parts/single/single', 'biaoqian' ); ?>
                <?php the_title(); ?>
            </h1>
            <div class="p2">
                <div class="ceo-text-small ceo-text-muted ceo-flex ceo-text-truncate ceo-overflow-auto">
				    <div class="avatar ceo-flex-middle">
					    <?php if(_ceo('ceoshop_single_rq_zz') == true): ?>
					    <span class="ceo-text-small ceo-display-block ceo-single-right"><i class="ceofont ceoicon-shield-user-line"></i> <?php the_author_posts_link(); ?></span>
					    <?php endif; ?>
				    </div>
				    <?php if(_ceo('ceoshop_single_rq_fabu') == true): ?>
					<span class="ceo-flex-1 ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
					<?php endif; ?>
					<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
					<span class="ceo-display-inline-block ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
					<?php endif; ?>
					
					<?php if(_ceo('ceoshop_single_bj_bianji') == true): ?>
					<span class="ceo-display-inline-block ceo-single-left ceo-flex ceo-flex-middle"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?>
					</span>
					<?php endif; ?>
				</div>
            </div>
        </header>
    </div>
    
    <?php if(_ceo('ceoshop_app_box') == true): ?>
    <div class="app_shop_box">
        <div class="app_shop_jg ceo-flex">
            <span class="app_shop_jg_se ceo-flex-1">
                <?php if (_ceo('ceo_shop_whole')) : ?>
				<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                <em style="font-size: 12px;">¥</em>
                <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
                <em style="font-size: 12px;"><?php echo _ceo('ceo_shop_currency_name'); ?></em>
				<?php endif; ?>
				<?php endif; ?>
            </span>
        
            <!--VIP权限-->
            <?php if (_ceo('ceo_shop_whole')) : ?>
    		<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
            <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
            <?php endif; ?>
    		<?php endif; ?>
        </div>
        <script>
            $('.pricelt li').click(function () { !$(this).hasClass('disabled') && $(this).addClass("on").siblings().removeClass("on"); });
        </script>
        <div class="app_shop_an">
            <div class="xz">
                <!--下载按钮-->
                <div class="xz1">
                    <?php if (_ceo('ceo_shop_whole')) : ?>
        				<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
        					<?php if (get_current_user_id() == 0 && (!_ceo('ceo_shop_tourist_buy') || CeoShopCoreProduct::getTypeId(get_the_ID()) == 2)) : ?>
        					<a href="#modal-login" data-product-id="<?php echo get_the_ID() ?>" class="z1" ceo-toggle>
        						<i class="ceofont ceoicon-shopping-cart-line"></i>
        						<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
        					</a>
        					<?php else : ?>
        					<a href="javascript:void(0)" data-product-id="<?php echo get_the_ID() ?>" data-flush="<?php echo CeoShopCoreProduct::getTypeId(get_the_ID()) == 1 ? '1': '0' ?>" class="z1 btn-ceo-purchase-product" data-style="slide-down">
        						<i class="ceofont ceoicon-shopping-cart-line"></i>
        						<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
        					</a>
        					<?php endif; ?>
        				<?php endif; ?>
    				<?php endif; ?>
                </div>
                
                <!--升级会员-->
                <div class="xz1">
                    <a class="shop3-vip" href="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hyl']; ?>" target="_blank" >
                        <i class="ceofont ceoicon-vip-crown-2-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hy']; ?>
                    </a>
                </div>
            </div>
            
            <!--演示按钮-->
            <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
            <span class="ceo-shop3-demo">
                <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" >
                <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
                </a>
            </span>
            <?php }?>
            
            <!--提示语-->
            <?php if(_ceo('ceoshop_3_y') == true): ?>
            <div class="hont"><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('ceoshop_3_ys'); ?></div>
            <?php endif; ?>
            
        </div>
        <?php if(_ceo('ceoshop_3_zz') == true): ?>
        <div class="app_mother"><i class="ceofont ceoicon-shopping-cart-line"></i><?php echo _ceo('ceoshop_3_zz_title'); ?>：
            <?php 
        	if ($ceoshop_3_zz_sz) { 
        		foreach ( $ceoshop_3_zz_sz as $key => $value) {
        	?>
        	<span><?php echo $value['title']; ?><em></em></span>
            <?php } } ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>