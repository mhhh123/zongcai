<?php

$userId = get_current_user_id();
$currencyName = ceo_shop_get_balance_name();

$isOpen = _ceo('ceo_shop_task');

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
            <a href="/member/property">余额记录</a>
            <a href="/member/integral">积分记录</a>
            <a href="/member/task" class="current">有奖任务</a>
        </div>
        <div class="task">
            <?php if ($isOpen) : ?>
                <?php $taskArr = _ceo('ceo_shop_task_set') ?>
                <ul class="ceo-child-width-1-1 ceo-child-width-1-2@s ceo-grid-ceosmls" ceo-grid>
                    <?php if ($taskArr['task_1'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>实名认证奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_1'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($taskArr['task_2'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>绑定邮箱账号奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_2'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($taskArr['task_3'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>绑定手机登录奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_3'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($taskArr['task_4'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>绑定QQ登录奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_4'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($taskArr['task_5'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>绑定微信登录奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_5'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($taskArr['task_6'] > 0) : ?>
                        <li>
                            <div class="box ceo-flex">
                                <div class="ceo-flex-1">
                                    <i class="ceofont ceoicon-todo-line"></i>
                                    <span>绑定微博登录奖励</span>
                                </div>
                                <p>+<?php echo $taskArr['task_6'] ?>积分</p>
                                <a href="">去完成</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php else : ?>
                <div class="member-empty">
                    <i></i>
                    <p>没有找到相关内容~</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>