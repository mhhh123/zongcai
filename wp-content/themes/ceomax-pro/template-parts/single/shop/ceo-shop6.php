<?php
	$post_id =  get_the_ID();
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>

<?php if(_ceo('ceoshop_6_shangjia') == true): ?>
<section class="ceo-sidebar-shop sidebar-shop-box b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
    <?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'author' ); ?>
</section>
<?php endif; ?>

<section class="ceo-sidebar-shop ceo-sidebar-shop6-tops b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
    <!--资源价格-->
    <?php if (_ceo('ceo_shop_whole')) : ?>
    <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
    <?php if(_ceo('ceoshop_6_xiazai_jg') == true): ?>
    <div class="ceo-sidebar-shop6-price">
        <span class="sellP">
            <em>¥</em>
            <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
            <?php echo _ceo('ceo_shop_currency_name'); ?>
            <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
        </span>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    
    <!--下载按钮-->
    <?php if (_ceo('ceo_shop_whole')) : ?>
	<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
		<?php if (get_current_user_id() == 0 && (!_ceo('ceo_shop_tourist_buy') || CeoShopCoreProduct::getTypeId(get_the_ID()) == 2)) : ?>
		<span class="ceo-sidebar-shop6-down">
			<a href="#modal-login" data-product-id="<?php echo get_the_ID() ?>" class="z1 makeFunc" ceo-toggle>
				<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
			</a>
		</span>
		<?php else : ?>
		<span class="ceo-sidebar-shop6-down">
			<a href="javascript:void(0)" data-product-id="<?php echo get_the_ID() ?>" data-flush="<?php echo CeoShopCoreProduct::getTypeId(get_the_ID()) == 1 ? '1': '0' ?>" class="z1 makeFunc btn-ceo-purchase-product" data-style="slide-down">
				<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
			</a>
		</span>
		<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>

    <!--演示按钮-->
    <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
    <span class="ceo-sidebar-shop-demo">
        <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" >
        <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
        </a>
    </span>
    <?php }?>

    <!--点赞收藏-->
    <?php if(_ceo('ceoshop_6_xiazai_dzsc') == true): ?>
    <ul class="ceo-sidebar-shop-sz">
        <li class="ceo-sidebar-shop-good ceo-sidebar-shop-6-an">
        <a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="ceo-display-inline-block btn change-color dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
    		<i class="ceofont ceoicon-thumb-up-line"></i> 点赞 (<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
    	</a>
        </li>
        <li class="ceo-sidebar-shop-good ceo-sidebar-shop-6-an">
        <?php echo zongcai_post_collection_button( get_the_ID() );?>
        </li>
    </ul>
    <?php endif; ?>
    <!--信息属性-->
    <ul class="ceo-shop6-sidebar-xxbox">
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
        <?php if(_ceo('ceoshop_6_shuxing_bh') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_6_shuxing_bhbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo get_the_ID(); ?></span>
        </li>
        <?php endif; ?>
        <?php if(_ceo('ceoshop_6_shuxing_fbl') == true): ?>
		<li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_6_shuxing_fblbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><div id="div_html"></div></span>
        </li>
        <?php endif; ?>
        <?php if(_ceo('ceoshop_6_shuxing_gx') == true): ?>
        <li>
            <span class="ceo-sidebar-shop-title"><?php echo _ceo('ceoshop_6_shuxing_gxbt'); ?>： </span>
            <span class="ceo-sidebar-shop-content"><?php echo date("Y-m-d",strtotime($post->post_modified));?></span>
        </li>
        <?php endif; ?>
    </ul>
    <?php if(_ceo('ceoshop_6_shuxing_ads') == true): ?>
    <a class="ceo-shop6-sidebar-img" href="<?php echo _ceo('ceoshop_6_shuxing_ads_link'); ?>" target="_blank"><img src="<?php echo _ceo('ceoshop_6_shuxing_ads_img'); ?>"></a>
    <?php endif; ?>
</section>
<?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'shouquan' ); ?>
<?php if(_ceo('ceoshop_6_shuxing_fbl') == true): ?>
<script type="text/javascript">
var s = ""; 
s += ""+ window.screen.width+""; s += "x"+ window.screen.height+"";
document.getElementById("div_html").innerHTML = s;
</script>
<?php endif; ?>
<style>.sidebar .user-info{display: none}</style>