<?php
	$post_id =  get_the_ID();
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
    $ceoshop_4_zz_sz = _ceo('ceoshop_4_zz_sz');
?>
<div class="ceo-shop4-zl ceo-shop4" <?php if(_ceo('ceoshop_4_bg') == true): ?>style="background: url(<?php echo _ceo('ceoshop_4_bg_img'); ?>) 0 0 no-repeat;background-size: cover;"<?php endif; ?>>
    <div class="ceo-container">
	<?php get_template_part( 'template-parts/single/single', 'breadcrumbs' ); ?>
	</div>
    <div class="ceo-shop4-top ceo-container">
        <header>
            <h1 title="<?php the_title(); ?>">
                <?php get_template_part( 'template-parts/single/single', 'biaoqian' ); ?>
                <?php the_title(); ?>
            </h1>
            <div class="ceo-shop4-titles ceo-text-small ceo-text-muted ceo-text-truncate ceo-overflow-auto" style="text-align: center;">
    		    <?php if(_ceo('ceoshop_single_rq_zz') == true): ?>
    		    <span class="ceo-text-small ceo-single-right"><i class="ceofont ceoicon-shield-user-line"></i> <?php the_author_posts_link(); ?></span>
    		    <?php endif; ?>
    
    			<?php if(_ceo('ceoshop_single_cat') == true): ?>
    			<span class="ceo-display-inline-block ceo-single-right ceo-flex-middle"><i class="ceofont ceoicon-list-check"></i> <?php
    			$category = get_the_category();
    			if($category[0]){
    				echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
    			}
    			?></span>
    			<?php endif; ?>
    		    <?php if(_ceo('ceoshop_single_rq_fabu') == true): ?>
    			<span class="ceo-display-inline-block ceo-single-right ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
    			<?php endif; ?>
    
    			<?php if(_ceo('ceoshop_single_sc_num') == true): ?>
    			<span class="ceo-display-inline-block ceo-single-right ceo-flex-middle"><i class="ceofont ceoicon-star-line"></i> <?php echo count_collection_current_post( $post_id ) ?></span>
    			<?php endif; ?>
    
    			<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
    			<span class="ceo-display-inline-block ceo-single-right ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
    			<?php endif; ?>
    
    			<?php if(_ceo('ceoshop_single_bj_bianji') == true): ?>
    			<span class="ceo-display-inline-block ceo-flex ceo-flex-middle"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?>
    			</span>
    			<?php endif; ?>
    		</div>
		</header>
        <div class="deankcpic">
            <img src="<?php echo post_thumbnail_src(); ?>" data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>">
        </div>

        <div class="ceo-shop4-bhgx">
            <?php if(_ceo('ceoshop_4_shuxing_bh') == true): ?>
            <div class="ceo-shop4-bh"><?php echo _ceo('ceoshop_4_shuxing_bhbt'); ?>：<?php echo get_the_ID(); ?> </div>
            <?php endif; ?>

            <?php if(_ceo('ceoshop_4_shuxing_gx') == true): ?>
            <div class="ceo-shop4-gx"> <?php echo _ceo('ceoshop_4_shuxing_gxbt'); ?>：<?php echo date("Y-m-d",strtotime($post->post_modified));?></div>
            <?php endif; ?>
        </div>
        <div class="deankcinfos">
            <div class="deankcinfo_s">
                <div class="deancurprices">
                    <span class="sellP">
                        <?php if (_ceo('ceo_shop_whole')) : ?>
			            <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                        <em>¥</em>
                        <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
                        <?php echo _ceo('ceo_shop_currency_name'); ?>
                        <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
                        <span class="ceo-shop4-vip">
                            <span class="shop4_tp">
                                <a href="/member/center/" target="_blank" class="ceoshop-vip2">升级VIP</a>
                                <label>尊享海量资源免费下载特权</label>
                            </span>
                        </span>
                        <?php endif; ?>
			            <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="deankcinfo_r">
                <!--下载按钮-->
                <?php if (_ceo('ceo_shop_whole')) : ?>
        		<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
        			<?php if (get_current_user_id() == 0 && (!_ceo('ceo_shop_tourist_buy') || CeoShopCoreProduct::getTypeId(get_the_ID()) == 2)) : ?>
        				<a href="#modal-login" data-product-id="<?php echo get_the_ID() ?>" class="z1 makeFunc" ceo-toggle>
        					<i class="ceofont ceoicon-shopping-cart-line"></i>
        					<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
        				</a>
        			<?php else : ?>
        				<a href="javascript:void(0)" data-product-id="<?php echo get_the_ID() ?>" data-flush="<?php echo CeoShopCoreProduct::getTypeId(get_the_ID()) == 1 ? '1': '0' ?>" class="z1 makeFunc btn-ceo-purchase-product" data-style="slide-down">
        					<i class="ceofont ceoicon-shopping-cart-line"></i>
        					<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
        				</a>
        			<?php endif; ?>
        		<?php endif; ?>
        		<?php endif; ?>

                <!--升级会员-->
                <a class="shop4-vip" href="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hyl']; ?>" target="_blank" >
                    <i class="ceofont ceoicon-vip-crown-2-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hy']; ?>
                </a>

                <!--演示按钮-->
                <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
                <a class="shop4-demo" href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" >
                <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
                </a>
                <?php }?>
            </div>
        </div>
        <?php if(_ceo('ceoshop_4_zz') == true): ?>
        <div class="mother"><i class="ceofont ceoicon-shopping-cart-line"></i><?php echo _ceo('ceoshop_4_zz_title'); ?>：
            <?php
        	if ($ceoshop_4_zz_sz) {
        		foreach ( $ceoshop_4_zz_sz as $key => $value) {
        	?>
        	<span><?php echo $value['title']; ?><em></em></span>
            <?php } } ?>
            <div class="hont"><i class="ceofont ceoicon-information-line"></i><?php echo _ceo('ceoshop_4_ys'); ?></div>
        </div>
        <?php endif; ?>
    </div>
</div>