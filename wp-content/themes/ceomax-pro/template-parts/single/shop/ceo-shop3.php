<?php
    $post_id=get_the_ID();
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
    $ceoshop_3_zz_sz = _ceo('ceoshop_3_zz_sz');
?>
<div class="ceo-shop3-zl">
    <div class="snyc" <?php if(_ceo('ceoshop_3_bg') == true): ?>style="background: url(<?php echo _ceo('ceoshop_3_bg_img'); ?>) no-repeat center top;background-size: 100% 100%;"<?php endif; ?>>
        <div class="proimg">
            <img src="<?php echo post_thumbnail_src(); ?>&h=126&w=126&zc=1" data-src="<?php echo post_thumbnail_src(); ?>&h=126&w=126&zc=1" alt="<?php the_title(); ?>">
        </div>
        <header class="text">
            <h1 class="p1" title="<?php the_title(); ?>">
                <?php get_template_part( 'template-parts/single/single', 'biaoqian' ); ?>
                <?php the_title(); ?>
            </h1>
            <div class="p2">
                <div class="ceo-text-small ceo-text-muted ceo-flex ceo-text-truncate ceo-overflow-auto">
				    <div class="avatar ceo-flex ceo-flex-middle">
					    <?php if(_ceo('ceoshop_single_rq_zz') == true): ?>
					    <span class="ceo-text-small ceo-display-block ceo-single-right"><i class="ceofont ceoicon-shield-user-line"></i> <?php the_author_posts_link(); ?></span>
					    <?php endif; ?>

						<?php if(_ceo('ceoshop_single_cat') == true): ?>
						<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-list-check"></i> <?php
						$category = get_the_category();
						if($category[0]){
							echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						}
						?></span>
						<?php endif; ?>
				    </div>
				    <?php if(_ceo('ceoshop_single_rq_fabu') == true): ?>
					<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
					<?php endif; ?>

					<?php if(_ceo('ceoshop_single_sc_num') == true): ?>
					<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-star-line"></i> <?php echo count_collection_current_post( $post_id ) ?></span>
					<?php endif; ?>

					<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
					<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
					<?php endif; ?>

					<?php if(_ceo('ceoshop_single_bj_bianji') == true): ?>
					<span class="ceo-display-inline-block ceo-flex ceo-flex-middle"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?>
					</span>
					<?php endif; ?>
				</div>
            </div>

            <div class="p3">
                <?php if(_ceo('ceoshop_3_shuxing_bh') == true): ?>
                <span>
                    <i><?php echo _ceo('ceoshop_3_shuxing_bhbt'); ?></i>
                    <b><?php echo get_the_ID(); ?></b>
                </span>
                <?php endif; ?>

                <?php if(!empty($down_info_arr)){?>
                    <?php
                    if(!empty($down_info_arr)){
                        foreach ($down_info_arr as $k=>$v){
                            $number=$k+1;
                            echo '<span><i>'.$v['title'].'：</i>'.'<b>'.$v['desc'].'</b></span>';
                        }
                    }
                    ?>
                <?php } ?>

                <?php if(_ceo('ceoshop_3_shuxing_gx') == true): ?>
                <span>
                    <i><?php echo _ceo('ceoshop_3_shuxing_gxbt'); ?></i>
                    <b><?php echo date("Y-m-d",strtotime($post->post_modified));?></b>
                </span>
                <?php endif; ?>
            </div>
        </header>
    </div>

    <div class="pricelt">
        <span class="sellP">
            <?php if (_ceo('ceo_shop_whole')) : ?>
			<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
            <em>¥</em>
            <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
            <?php echo _ceo('ceo_shop_currency_name'); ?>
            <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
            <span class="ceo-shop3-vip">
                <span class="stag_tp">
                    <a href="/member/center/" target="_blank" class="ceoshop-vip2">升级VIP</a>
                    <label>尊享海量资源免费下载特权</label>
                </span>
            </span>
            <?php endif; ?>
			<?php endif; ?>
        </span>

        <!--点赞收藏按钮-->
        <?php if(_ceo('ceoshop_3_anniu_dzsc') == true): ?>
        <div class="p4">
            <a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="ceo-display-inline-block btn change-color dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
    		<i class="ceofont ceoicon-thumb-up-line"></i> 点赞 (<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
        	</a>
            <?php echo zongcai_post_collection_button( get_the_ID() );?>
        </div>
        <?php endif; ?>

    </div>
    <div class="buyopa">
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
        <a class="shop3-vip" href="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hyl']; ?>" target="_blank" >
            <i class="ceofont ceoicon-vip-crown-2-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hy']; ?>
        </a>

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
    <div class="mother"><i class="ceofont ceoicon-shopping-cart-line"></i><?php echo _ceo('ceoshop_3_zz_title'); ?>：
        <?php
    	if ($ceoshop_3_zz_sz) {
    		foreach ( $ceoshop_3_zz_sz as $key => $value) {
    	?>
    	<span><?php echo $value['title']; ?><em></em></span>
        <?php } } ?>
    </div>
    <?php endif; ?>
</div>