<?php

$userId = get_current_user_id();
$currencyName = ceo_shop_get_balance_name();

$isVip = CeoShopCoreUser::getVipGradeId($userId) != -1;

$orderResult = CeoShopMemberOrder::getOrderList($userId, 1, 5);
$downloadResult = CeoShopMemberDownload::getDownloadList($userId, 1, 5);

$vip_module = _ceo('ceo_shop_vip_module');

?>
<div class="member-center">
    <div class="top ceo-margin-bottom">
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="left">
                    <div class="above">
                        <div class="ceo-grid-ceossss" ceo-grid>
                            <div class="ceo-width-auto">
                                <div class="img">
                                    <?php echo get_avatar($user_id, 66); ?>
                                </div>
                            </div>
                            <div class="ceo-width-expand">
                                <span class="name">
                                    <a href="<?php echo get_author_posts_url($user_id, get_userdata($user_id)->user_nicename); ?>"><?php echo $current_user->display_name; ?></a>
                                    <em><i class="ceofont ceoicon-vip-crown-2-line"></i><?php echo CeoShopCoreUser::getVipGrade($userId) ?></em>
                                </span>
                                <?php if (!$isVip) : ?>
                                    <p><?php echo $vip_module['title1'] ?></p>
                                <?php else : ?>
                                    <p>会员有效期至：<?php echo CeoShopCoreUser::getVipTerm($userId) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (true) : ?>
                    <div class="below">
                        <span><?php echo $vip_module['title2'] ?></span>
                        <a href="javascript:void(0)" class="btn-ceo-svip" data-style="slide-down">立即开通</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="right ceo-background-default">
                    <div class="title ceo-flex">
                        <span class="ceo-flex-1">我的资产</span>
                        <a href="/member/income/"><i class="ceofont ceoicon-funds-line"></i>我的收益</a>
                    </div>
                    <div class="ceo-grid-ceossss" ceo-grid>
                        <div class="ceo-width-1-1 ceo-width-1-2@s">
                            <div class="item item1">
                                <span><?php echo CeoShopCoreUser::getBalance($userId) ?><em><?php echo $currencyName ?></em></span>
                                <p>账户余额</p>
                                <a href="javascript:void(0)" class="btn1 btn-ceo-recharge" data-style="slide-down">充值</a>
                                <a href="/member/property/" class="btn2">明细</a>
                            </div>
                        </div>
                        <div class="ceo-width-1-1 ceo-width-1-2@s">
                            <div class="item item2">
                                <span><?php echo CeoShopCoreUser::getIntegral($userId) ?><em>积分</em></span>
                                <p>账户积分</p>
                                <a href="javascript:void(0)" class="btn1 btn-ceo-exchange" data-style="slide-down">兑换</a>
                                <a href="/member/integral/" class="btn2">明细</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle ceo-margin-bottom">
        <ul class="ceo-child-width-1-2 ceo-child-width-1-4@s ceo-grid-ceosmls" ceo-grid>
            <li>
                <a href="/member/order/" class="item item1 ceo-flex">
                    <i></i>
                    <span class="ceo-flex-1">购买订单</span>
                    <p><?php echo CeoShopMemberOrder::getOrderSum($userId) ?></p>
                </a>
            </li>
            <li>
                <a href="/member/viporder/" class="item item2 ceo-flex">
                    <i></i>
                    <span class="ceo-flex-1">会员订单</span>
                    <p><?php echo CeoShopMemberOrder::getVipOrderSum($userId) ?></p>
                </a>
            </li>
            <li>
                <a href="/member/card/" class="item item3 ceo-flex">
                    <i></i>
                    <span class="ceo-flex-1">代金券</span>
                    <p><?php echo CeoShopMemberCard::getCardCount($userId, 1) ?></p>
                </a>
            </li>
            <li>
                <a href="/member/vipcard/" class="item item4 ceo-flex">
                    <i></i>
                    <span class="ceo-flex-1">会员优惠券</span>
                    <p><?php echo CeoShopMemberCard::getVipCardCount($userId, 1) ?></p>
                </a>
            </li>
        </ul>
    </div>
    <div class="bottom ceo-background-default">
        <div class="ceo-grid-large" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="item">
                    <div class="ceo-flex">
                        <div class="title ceo-flex-1">我的订单</div>
                        <a href="/member/order/" class="more">更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                    </div>
                    <?php if (!empty($orderResult['data'])) : ?>
                    <ul>
                        <?php foreach ($orderResult['data'] as $r) : ?>
                            <li class="ceo-flex">
                                <a href="<?php echo get_permalink($r->product_id) ?>" class="ceo-text-truncate ceo-flex-1"><?php echo $r->post_title ?></a>
                                <span><?php echo $r->pay_time ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else : ?>
                    <div class="empty">
                        <i></i>
                        <p>没有找到相关内容~</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="item">
                    <div class="ceo-flex">
                        <div class="title ceo-flex-1">我的下载</div>
                        <a href="/member/download/" class="more">更多<i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                    </div>
                    <?php if (!empty($downloadResult['data'])) : ?>
                    <ul>
                        <?php foreach ($downloadResult['data'] as $r) : ?>
                            <li class="ceo-flex">
                                <a href="<?php echo get_permalink($r->product_id) ?>" class="ceo-text-truncate ceo-flex-1"><?php echo $r->post_title ?></a>
                                <span><?php echo $r->created_time ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else : ?>
                    <div class="empty">
                        <i></i>
                        <p>没有找到相关内容~</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>