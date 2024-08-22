<?php

$userId = get_current_user_id();
$currencyName = ceo_shop_get_balance_name();

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberProperty::getBalanceList($userId, $page, $pageSize);

?>

<div class="member-property">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的资产</span>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box balance ceo-background-default">
                    <div class="title">余额</div>
                    <span><?php echo CeoShopCoreUser::getBalance($userId) ?></span><em><?php echo $currencyName ?></em>
                    <p>累计消费 <?php echo CeoShopMemberProperty::getBalancePaySum($userId) ?> <?php echo $currencyName ?></p>
                    <a href="javascript:void(0)" class="btn-ceo-recharge" data-style="slide-down">充值</a>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box integral ceo-background-default">
                    <div class="title">积分</div>
                    <span><?php echo CeoShopCoreUser::getIntegral($userId) ?></span><em>积分</em>
                    <p>累计消费 <?php echo CeoShopMemberProperty::getIntegralPaySum($userId) ?> 积分</p>
                    <a href="javascript:void(0)" class="btn-ceo-exchange" data-style="slide-down">兑换</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom ceo-background-default">
        <div class="title">
            <a href="/member/property" class="current">余额记录</a>
            <a href="/member/integral">积分记录</a>
            <!--<a href="/member/task">有奖任务</a>-->
        </div>
        <div class="record">
            <?php if (!empty($result['data'])) : ?>
                <div class="box">
                    <div class="header">
                        <div class="header-1">类型</div>
                        <div class="header-2">金额</div>
                        <div class="header-3">余额</div>
                        <div class="header-4">时间</div>
                    </div>
                    <ul class="list">
                        <?php foreach ($result['data'] as $row) : ?>
                            <li>
                                <div class="list-1"><?php echo CeoShopCoreUser::BALANCE_TYPE[$row->type] ?></div>
                                <div class="list-2">
                                    <?php if ($row->op == 1) : ?>
                                        <span class="increase">+<?php echo $row->num ?></span>
                                    <?php elseif ($row->op == 2) : ?>
                                        <span class="decrease">-<?php echo $row->num ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="list-3"><?php echo $row->after ?></div>
                                <div class="list-4"><?php echo ceo_shop_format_time($row->created_time) ?></div>
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