<?php
$ceoshop_single_an_zdy = _ceo('ceoshop_single_an_zdy');
$ceoshop_1_zz_sz = _ceo('ceoshop_1_zz_sz');
$meta = get_post_meta( get_the_ID(), 'my_post_options', true );
$post_id=get_the_ID();
?>
<div class="ceo-shop1-zl">
    <div style="overflow: hidden;padding-bottom: 20px;">
        <!-- 左侧 -->
        <div class="bannerL">
            <div class="course-img">
                <img src="<?php echo post_thumbnail_src(); ?>" data-src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" class="bigImg" style="height:<?php echo _ceo('ceoshop_1_img'); ?>px";>
            </div>

            <!--编号模块-->
            <div class="main_info_top_b">
                <div class="main_info_top_item">
                    <span class="item_titles"><?php echo _ceo('ceoshop_single_gx'); ?></span>
                    <span class="item_content1"><?php the_modified_time('Y年m月d日'); ?></span>
                </div>
                <div class="main_info_top_item2">
                    <span class="item_titles"><?php echo _ceo('ceoshop_single_bh'); ?></span>
                    <span class="item_content2"><?php echo get_the_ID(); ?></span>
                </div>
            </div>
            <!--编号模块-->

            <!--资源模块-->
            <div class="risktips report" style="cursor:pointer;">
                <i class="ceofont ceoicon-volume-up-line"></i><span><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php if(_ceo('ceoshop_shangjia_kf'))echo _ceo('ceoshop_shangjia_kf')['ceoshop_single_kf_qq']; ?>&amp;site=qq&amp;menu=yes" target="_blank"><?php echo _ceo('ceoshop_single_ts'); ?></a></span>
            </div>
            <!--举报模块-->
        </div>
        <!-- 中间 -->
        <div class="bannerMid">

            <!--标题模块-->
            <header class="midTitle">
                <h1 title="<?php the_title(); ?>">
                    <?php get_template_part( 'template-parts/single/single', 'biaoqian' ); ?>
	    			<?php the_title(); ?>
    			</h1>
            </header>
            <!--标题模块-->

            <!--信息模块-->
            <div class="ceo-text-small ceo-text-muted ceo-flex ceo-text-truncate ceo-overflow-auto ceoshop-mall-sc">
				<?php if(_ceo('ceoshop_single_rq_zz') == true): ?>
				<div class="avatar ceo-flex ceo-flex-middle ceo-margin-medium-right-ceoshop">
				<span class="ceo-display-block"><i class="ceofont ceoicon-shield-user-line"></i> <?php the_author_posts_link(); ?></span>
				</div>
				<?php endif; ?>
				<?php if(_ceo('ceoshop_single_rq_fabu') == true): ?>
				<span class="ceo-display-inline-block ceo-margin-medium-right-ceoshop ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
				<?php endif; ?>
				<?php if(_ceo('ceoshop_single_cat') == true): ?>
				<span class="ceo-display-inline-block ceo-margin-medium-right-ceoshop ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-list-check"></i> <?php
				$category = get_the_category();
				if($category[0]){
					echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
				}
				?></span>
				<?php endif; ?>
				<?php if(_ceo('ceoshop_single_sc_num') == true): ?>
				<span class="ceo-display-inline-block ceo-margin-medium-right-ceoshop ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-star-line"></i> <?php echo count_collection_current_post( $post_id ) ?></span>
				<?php endif; ?>
				<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
				<span class="ceo-display-inline-block ceo-margin-medium-right-ceoshop ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
				<?php endif; ?>

				<?php if(_ceo('ceoshop_single_bj_bianji') == true): ?>
				<span class="ceo-display-inline-block ceo-margin-medium-right ceo-flex ceo-flex-middle"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?></span>
				<?php endif; ?>

			</div>
			<!--信息模块-->

            <!--简介模块-->
            <?php if(_ceo('ceoshop_single_jianjie') == true): ?>
            <div class="main_info_price">
                <div class="main_info_price_r" style="background: url(<?php echo _ceo('ceoshop_single_jianjie_img'); ?>);background-size: 100% 100%;">
                    <b><?php echo _ceo('ceoshop_single_jianjie_title'); ?></b>丨<?php echo _ceo('ceoshop_single_jianjie_title2'); ?>
                    <div class="collection  add_collect" data-id="AFQPYY">
                    <span><a href="<?php echo _ceo('ceoshop_single_jianjie_title_l'); ?>" target="_blank"><i class="ceofont <?php echo _ceo('ceoshop_single_jianjie_title_i'); ?>"></i><?php echo _ceo('ceoshop_single_jianjie_title_y'); ?></a></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!--简介模块-->

            <!--增值服务-->
            <?php if(_ceo('ceoshop_1_zz') == true): ?>
            <div class="main_info_tb">
                <div class="main_info_tb_items">
                    <i class="ceofont ceoicon-shopping-cart-line"></i><?php echo _ceo('ceoshop_1_zz_title'); ?>：
                </div>
                <?php
            	if ($ceoshop_1_zz_sz) {
            		foreach ( $ceoshop_1_zz_sz as $key => $value) {
            	?>
                <div class="main_info_tb_item">
                    <span class="left_title"><?php echo $value['title']; ?></span>
                </div>
                <?php } } ?>
            </div>
            <?php endif; ?>
            <!--增值服务-->

            <!--价格模块-->
            <div class="priceBtn">
                <div class="mob">
                    <span class="sellP">
                        <?php if (_ceo('ceo_shop_whole')) : ?>
						<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                        <em>¥</em>
                        <span id="priceinfo"><?php echo CeoShopCoreProduct::getPriceFormat($post_id,false) ?></span>
                        <?php echo _ceo('ceo_shop_currency_name'); ?>
                        <?php echo CeoShopCoreProduct::getVipDiscountInfoFormat($post_id, get_current_user_id()) ?>
                        <em><?php echo _ceo('ceoshop_single_an_bt'); ?></em>
						<?php endif; ?>
						<?php endif; ?>
                    </span>
                    <!--点赞收藏按钮-->
                    <?php if(_ceo('ceoshop_3_anniu_dzsc') == true): ?>
                    <div class="ceo-shop1-dzsc">
                        <a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="ceo-display-inline-block btn change-color dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
                		<i class="ceofont ceoicon-thumb-up-line"></i> 点赞 (<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
                    	</a>
                        <?php echo zongcai_post_collection_button( get_the_ID() );?>
                    </div>
                    <?php endif; ?>
                </div>
                <!--价格模块-->

                <!--下载模块-->
                <?php if (_ceo('ceo_shop_whole')) : ?>
				<?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
					<?php if (get_current_user_id() == 0 && (!_ceo('ceo_shop_tourist_buy') || CeoShopCoreProduct::getTypeId(get_the_ID()) == 2)) : ?>
					<a href="#modal-login" data-product-id="<?php echo get_the_ID() ?>" class="makeFunc z1" ceo-toggle>
						<i class="ceofont ceoicon-shopping-cart-line"></i>
						<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
					</a>
					<?php else : ?>
					<a href="javascript:void(0)" data-product-id="<?php echo get_the_ID() ?>" data-flush="<?php echo CeoShopCoreProduct::getTypeId(get_the_ID()) == 1 ? '1': '0' ?>" class="makeFunc z1 btn-ceo-purchase-product" data-style="slide-down">
						<i class="ceofont ceoicon-shopping-cart-line"></i>
						<span id="shop_single_an_id"><?php echo CeoShopCoreProduct::getPayButtonText(get_the_ID(), get_current_user_id()) ?></span>
					</a>
					<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>

                <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
                <a class="seeDetail" href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow" >
                    <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
                </a>
                <?php }?>
                <a class="needSay add_collect" href="<?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hyl']; ?>" target="_blank" >
                    <i class="ceofont ceoicon-vip-crown-2-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_hy']; ?>
                </a>
                <?php
    			if ($ceoshop_single_an_zdy) {
    				foreach ( $ceoshop_single_an_zdy as $key => $value) {
    			?>
				<a class="shopcustom add_collect" href="<?php echo $value['ceoshop_single_an_zdy_lj']; ?>" target="_blank" >
                    <i class="ceofont <?php echo $value['ceoshop_single_an_zdy_tb']; ?>"></i> <?php echo $value['ceoshop_single_an_zdy_bt']; ?>
                </a>
    			<?php } } ?>
                <!--下载模块-->

            </div>
        </div>

        <!-- 右边商家信息 -->
        <?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'author' ); ?>
    </div>
</div>