<?php

$userId = get_current_user_id();
$vipNameArr = CeoShopCoreUser::getVipGradeList(2, false);

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberOrder::getVipOrderList($userId, $page, $pageSize);

?>
<div class="member-order">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的订单</span>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box purchase ceo-background-default">
                    <div class="title">购买订单</div>
                    <span><?php echo CeoShopMemberOrder::getOrderSum($userId) ?></span><em>条</em>
                    <p>最近7日订单 <?php echo CeoShopMemberOrder::getOrderSum($userId, 7) ?> 条</p>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box vip ceo-background-default">
                    <div class="title">会员订单</div>
                    <span><?php echo CeoShopMemberOrder::getVipOrderSum($userId) ?></span><em>条</em>
                    <p>最近7日订单 <?php echo CeoShopMemberOrder::getVipOrderSum($userId, 7) ?> 条</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom ceo-background-default">
        <div class="title">
            <a href="/member/order">购买订单</a>
            <a href="/member/viporder" class="current">会员订单</a>
        </div>

        <div class="vip">
            <?php if (!empty($result['data'])) : ?>
                <div class="box">
                    <div class="header">
                        <div class="header-1">会员等级</div>
                        <div class="header-2">支付金额</div>
                        <div class="header-3">开通时间</div>
                        <div class="header-4">到期时间</div>
                    </div>
                    <ul class="list">
                        <?php foreach ($result['data'] as $row) : ?>
                            <li>
                                <div class="list-1"><?php echo $vipNameArr[$row->vip_id] ?? '未知' ?></div>
                                <div class="list-2"><?php echo $row->actual_money ?></div>
                                <div class="list-3"><?php echo $row->pay_time ?></div>
                                <div class="list-4"><?php echo $row->end_time ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="paginate">
                    <?php
                    echo paginate_links([
                        'format'       => '?mpaged=%#%',
                        'total' => $result['totalPage'],
                        'current' => max(1, get_query_var('mpaged')),
                        'prev_text'    => __('上一页'),
                        'next_text'    => __('下一页'),
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <div class="member-empty">
                    <i></i>
                    <p>没有找到相关内容~</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>