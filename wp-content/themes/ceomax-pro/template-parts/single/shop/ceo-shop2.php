<?php
    $post_id=get_the_ID();
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>

<?php if(_ceo('ceoshop_2_shangjia') == true): ?>
<section class="ceo-sidebar-shop sidebar-shop-box b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
    <?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'author' ); ?>
</section>
<?php endif; ?>

<section class="ceo-sidebar-shop b-a b-r-4 ceo-background-default ceo-margin-bottom">
    <!--资源价格-->
    <?php if(_ceo('ceoshop_2_xiazai_jg') == true): ?>
    <div class="ceo-sidebar-shop-price">
        <span class="sellP">
            <?php if (_ceo('ceo_shop_whole')) : ?>
			<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
            <em>¥</em>
            <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
            <?php echo _ceo('ceo_shop_currency_name'); ?>
            <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
            <?php endif; ?>
			<?php endif; ?>
        </span>
    </div>
    <?php endif; ?>

    <!--下载按钮-->
    <span class="ceo-sidebar-shop-down">
        <?php if (_ceo('ceo_shop_whole')) : ?>
		<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
			<?php if (get_current_user_id() == 0 && (!_ceo('ceo_shop_tourist_buy') || CeoShopCoreProduct::getTypeId(get_the_ID()) == 2)) : ?>
				<a href="#modal-login" data-product-id="<?php echo get_the_ID() ?>" class="z1 makeFunc" ceo-toggle>
					<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
				</a>
			<?php else : ?>
				<a href="javascript:void(0)" data-product-id="<?php echo get_the_ID() ?>" data-flush="<?php echo CeoShopCoreProduct::getTypeId(get_the_ID()) == 1 ? '1': '0' ?>" class="z1 makeFunc btn-ceo-purchase-product" data-style="slide-down">
					<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
				</a>
			<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
    </span>

    <!--演示按钮-->
    <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
    <span class="ceo-sidebar-shop-demo">
        <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" >
        <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
        </a>
    </span>
    <?php }?>

    <!--点赞收藏-->
    <?php if(_ceo('ceoshop_2_xiazai_dzsc') == true): ?>
    <ul class="ceo-sidebar-shop-sz">
        <li class="ceo-sidebar-shop-good">
        <a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="ceo-display-inline-block btn change-color dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
    		<i class="ceofont ceoicon-thumb-up-line"></i> 点赞 (<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
    	</a>
        </li>
        <li class="ceo-sidebar-shop-good">
        <?php echo zongcai_post_collection_button( get_the_ID() );?>
        </li>
    </ul>
    <?php endif; ?>
</section>

<section class="ceo-sidebar-shop b-a b-r-4 ceo-background-default ceo-margin-bottom">
    <!--信息属性-->
    <ul>
        <?php if(!empty($down_info_arr)){?>
            <?php
            if(!empty($down_info_arr)){
                foreach ($down_info_arr as $k=>$v){
                    $number=$k+1;
                    echo '<li><span class="ceo-sidebar-shop-title">'.$v['title'].'：</span>'.'<span class="ceo-sidebar-shop-content">'.$v['desc'].'</span>';
                    if($number%3==0){
                        echo '</li>';
                    }
                }
            }
            ?>
        <?php } ?>
        <?php if(_ceo('ceoshop_2_shuxing_bh') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_2_shuxing_bhbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo get_the_ID(); ?></span>
        </li>
        <?php endif; ?>
        <?php if(_ceo('ceoshop_2_shuxing_gx') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_2_shuxing_gxbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo date("Y-m-d",strtotime($post->post_modified));?></span>
        </li>
        <?php endif; ?>
    </ul>
    <!--信息属性-->
    <?php if(_ceo('ceoshop_2_shuxing_lx') == true): ?>
    <div class="ceo-sidebar-shop-WP ceo-flex">
        <div class="ceo-flex-1">
            <div class="ceo-sidebar-shop-L"><?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_zbt']; ?>
            </div>
            <div class="ceo-sidebar-shop-C"><a target="_blank" href="<?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_anlj']; ?>"><i class="ceofont <?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_antb']; ?>"></i><?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_anbt']; ?></a>
            </div>
        </div>
        <div class="ceo-sidebar-shop-R">
            <span class="sy-hover-box"><i class="ceofont <?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_xztb']; ?>"></i><?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_xzxz']; ?>
            </span>
            <div class="sy-hover"><span><?php if(_ceo('ceoshop_2_shuxing_lx_sz'))echo _ceo('ceoshop_2_shuxing_lx_sz')['ceoshop_2_shuxing_lx_xznr']; ?></span>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'shouquan' ); ?>
<style>.sidebar .user-info{display: none}</style>