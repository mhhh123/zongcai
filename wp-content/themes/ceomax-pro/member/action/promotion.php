<?php

$userId = get_current_user_id();

$isOpen = _ceo('ceo_shop_recommend_register');
if ($isOpen) {
    $registerConfigArr = _ceo('ceo_shop_recommend_register_set');
}

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberPromotion::getRelationUserList($userId, $page, $pageSize);

?>
<div class="member-promotion">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的推广</span>
        <div class="link">
            <div class="module">
                <div class="title">推广链接</div>
                <div class="input">
                    <input id="promotion-link" value="<?php echo bloginfo('siteurl') . '?ref=' . $userId ?>" type="text">
                </div>
                <button class="button1" onclick="copyText()">复制链接</button>
                <button id="shareAff" class="button2" data-style="slide-down">分享海报</button>
            </div>
        </div>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="box item1">
                    <div class="title">推广佣金收益</div>
                    <span><?php echo CeoShopMemberPromotion::getHistoryCommissionSum($userId, 2) ?></span>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="box item2">
                    <div class="title">推广用户人数</div>
                    <span><?php echo CeoShopMemberPromotion::getRelationUserSum($userId, 1) ?><em>人 （一级）</em></span>
                    <p>二级推广：<?php echo CeoShopMemberPromotion::getRelationUserSum($userId, 2) ?>人</p>
                    <p>三级推广：<?php echo CeoShopMemberPromotion::getRelationUserSum($userId, 3) ?>人</p>
                </div>
            </div>
            <?php if (_ceo('ceo_shop_recommend_buy')) : ?>
                <?php $recommendConfigArr = _ceo('ceo_shop_recommend_buy_set'); ?>
                <div class="ceo-width-1-1 ceo-width-1-3@s">
                    <div class="box item3">
                        <div class="title">推广佣金比例</div>
                        <span><?php echo $recommendConfigArr['recommend_proportion_1'] ?><em>% （一级）</em></span>
                        <p>二级佣金：<?php echo $recommendConfigArr['recommend_proportion_2'] ?>%</p>
                        <p>三级佣金：<?php echo $recommendConfigArr['recommend_proportion_3'] ?>%</p>
                    </div>
                </div>
            <?php else : ?>
                <div class="ceo-width-1-1 ceo-width-1-3@s">
                    <div class="box item3">
                        <div class="title">推广佣金比例</div>
                        <span>0<em>% （一级）</em></span>
                        <p>二级佣金：0%</p>
                        <p>三级佣金：0%</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="bottom ceo-background-default ceo-margin-bottom">
        <div class="title">
            <a href="/member/reward">推广奖励</a>
            <a href="/member/promotion" class="current">推广用户</a>
            <a href="/member/commission">推广佣金</a>
        </div>
        <?php if (!empty($result['data'])) : ?>
            <div class="promotion">
                <div class="header">
                    <div class="header-1">注册用户</div>
                    <div class="header-2">推广关系</div>
                    <div class="header-3">累计消费</div>
                    <div class="header-4">注册时间</div>
                </div>
                <ul class="list">
                    <?php foreach ($result['data'] as $row) : ?>
                        <li>
                            <div class="list-1"><?php echo $row->display_name ?></div>
                            <div class="list-2"><?php if ($row->pid_1 == $userId) {
                                                    echo '一级推广';
                                                } elseif ($row->pid_2 == $userId) {
                                                    echo '二级推广';
                                                } elseif ($row->pid_3 == $userId) {
                                                    echo '三级推广';
                                                } ?></div>
                            <div class="list-3"><?php echo CeoShopMemberProperty::getBalancePaySum($row->user_id) ?></div>
                            <div class="list-4"><?php echo $row->created_time ?></div>
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
                <span>推广说明</span>
            </div>
            <div class="content">
                <?php echo $registerConfigArr['recommend_desc'] ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    $(function() {
        $('#shareAff').click(function() {
            let btnLoading = Ladda.create(this);
            btnLoading.start()
            $.ajax({
                url: zongcai.ajaxurl + '?action=ceo_shop_member_share_aff_image',
                method: 'GET',
                success: function(res) {
                    btnLoading.stop()
                    btnLoading.remove()
                    $('body').append('<div class="mobile-share-bg"> \
                    <div class="top_tips" style="display: block;">长按保存图片，将内容分享给好友</div></div> \
                    <div class="mobile-share-wrap"> \
                    <img style="width:400px" src="' + res + '"> \
                    <div class="mobile-share-close">×</div> \
                    </div>')

                    $('.mobile-share-close').off('click').click(function() {
                        $(".mobile-share-bg,.mobile-share-wrap").remove()
                    })
                }
            })
        })
    })
</script>