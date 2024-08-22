<?php

$userId = get_current_user_id();

$currencyName = ceo_shop_get_balance_name();

$isOpen = _ceo('ceo_shop_withdraw');
if ($isOpen) {
    $withdrawConfigArr = _ceo('ceo_shop_withdraw_set');
}

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberPromotion::getTradingIncomeList($userId, $page, $pageSize);

?>
<div class="member-income">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的收益</span>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box item1">
                    <div class="title">产品销售收益</div>
                    <span><?php echo CeoShopMemberPromotion::getHistoryCommissionSum($userId, 1) ?></span>
                    <p>现金收益 <?php echo CeoShopMemberPromotion::getHistoryCommissionSum($userId, 3) ?> 元</p>
                    <p><?php echo $currencyName ?>收益 <?php echo CeoShopMemberPromotion::getHistoryCommissionSum($userId, 4) ?> <?php echo $currencyName ?></p>
                    <?php if (_ceo('ceo_shop_withdraw')) : ?>
                        <a id="btn-ceo-extract" href="javascript:void(0)" data-style="slide-down">提现</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box item2">
                    <div class="title">推广佣金收益</div>
                    <span><?php echo CeoShopMemberPromotion::getHistoryCommissionSum($userId, 2) ?></span>
                </div>
            </div>
        </div>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="record1">
                    <div class="title">可提现金额</div>
                    <span><?php echo CeoShopMemberPromotion::getWithdrawSum($userId, 1) ?></span>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="record2">
                    <div class="title">提现中金额</div>
                    <span><?php echo CeoShopMemberPromotion::getWithdrawSum($userId, 2) ?></span>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="record3">
                    <div class="title">已提现金额</div>
                    <span><?php echo CeoShopMemberPromotion::getWithdrawSum($userId, 3) ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom ceo-background-default ceo-margin-bottom">
        <div class="title">
            <a href="/member/income" class="current">收益记录</a>
            <a href="/member/commission">佣金记录</a>
            <a href="/member/withdrawal">提现记录</a>
        </div>
        <?php if (!empty($result['data'])) : ?>
            <div class="income">
                <div class="header">
                    <div class="header-1">名称</div>
                    <div class="header-2">套餐</div>
                    <div class="header-3">用户</div>
                    <div class="header-4">金额</div>
                    <div class="header-5">时间</div>
                </div>
                <ul class="list">
                    <?php foreach ($result['data'] as $row) : ?>
                        <li>
                            <div class="list-1"><a href="<?php echo get_permalink($row->product_id) ?>"><?php echo $row->post_title ?></a></div>
                            <div class="list-2">套餐<?php echo $row->sku ?></div>
                            <div class="list-3"><?php echo $row->display_name ?></div>
                            <div class="list-4"><?php echo $row->commission ?></div>
                            <div class="list-5"><?php echo $row->created_time ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
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
            </div>
        <?php else : ?>
            <div class="member-empty">
                <i></i>
                <p>没有找到相关内容~</p>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($isOpen) : ?>
        <div class="desc ceo-background-default b-r-4">
            <div class="title">
                <span>提现说明</span>
            </div>
            <div class="content">
                <?php echo $withdrawConfigArr['withdraw_desc'] ?>
            </div>
        </div>
    <?php endif; ?>
</div>