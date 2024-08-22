<?php

$userId = get_current_user_id();
$vipNameArr = CeoShopCoreUser::getVipGradeList(2, false);

$type = isset($_GET['type']) ? intval($_GET['type']) : 1;
$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 9999;
$result = CeoShopMemberCard::getVipCardList($userId, $type, $page, $pageSize);

?>
<div class="member-card">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的卡券</span>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box item1 ceo-background-default">
                    <div class="title">代金券</div>
                    <span><?php echo CeoShopMemberCard::getCardCount($userId, 1) ?><em>张可用</em></span>
                    <p>已使用 <?php echo CeoShopMemberCard::getCardCount($userId, 2) ?> 张│已过期 <?php echo CeoShopMemberCard::getCardCount($userId, 3) ?> 张</p>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="box item2 ceo-background-default">
                    <div class="title">VIP优惠券</div>
                    <span><?php echo CeoShopMemberCard::getVipCardCount($userId, 1) ?><em>张可用</em></span>
                    <p>已使用 <?php echo CeoShopMemberCard::getVipCardCount($userId, 2) ?> 张│已过期 <?php echo CeoShopMemberCard::getVipCardCount($userId, 3) ?> 张</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom ceo-background-default">
        <div class="title">
            <a href="/member/card">代金券</a>
            <a href="/member/vipcard" class="current">VIP优惠券</a>
        </div>

        <div class="coupon">
            <div class="box">
                <div class="nav">
                    <a href="<?php echo home_url(add_query_arg(['type' => 1])) ?>" <?php if ($type == 1) echo 'class="current"' ?>>可使用</a>
                    <a href="<?php echo home_url(add_query_arg(['type' => 2])) ?>" <?php if ($type == 2) echo 'class="current"' ?>>已使用</a>
                    <a href="<?php echo home_url(add_query_arg(['type' => 3])) ?>" <?php if ($type == 3) echo 'class="current"' ?>>已过期</a>
                </div>
                <?php if (!empty($result['data'])) : ?>
                    <ul class="ceo-child-width-1-1 ceo-child-width-1-2@s ceo-grid-ceosmls" ceo-grid>
                        <?php foreach ($result['data'] as $row) : ?>
                            <li>
                                <div class="to">
                                    <em>
                                        <?php
                                        switch ($type) {
                                            case 1:
                                                $tag = '可使用';
                                                break;
                                            case 2:
                                                $tag = '已使用';
                                                break;
                                            case 3:
                                                $tag = '已过期';
                                                break;
                                        }
                                        echo $tag;
                                        ?>
                                    </em>
                                    <div class="ceo-grid-ceosmls" ceo-grid>
                                        <div class="value ceo-width-1-3">
                                            <p><?php echo $row->money ?></p>
                                            <a class="ceoshop-click-copy" href="javascript:void(0)" data-clipboard-text="<?php echo $row->code ?>">复制卡券</a>
                                        </div>
                                        <div class="ceo-width-2-3">
                                            <div class="desc">
                                                <p class="title"> <?php echo $row->title ?> </p>
                                                <p>有效期至：<?php echo $row->expiration_time ?></p>
                                                <p>使用范围：<?php
                                                        $allowCount = count($row->allow_vips);
                                                        if ($allowCount != 0) {
                                                            foreach ($row->allow_vips as $index => $vip) {
                                                                echo $vipNameArr[$vip];
                                                                if ($allowCount != ($index + 1)) {
                                                                    echo '，';
                                                                }
                                                            }
                                                        } else {
                                                            echo '全部可用';
                                                        }
                                                        ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="member-empty">
                            <i></i>
                            <p>没有找到相关内容~</p>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/clipboard.js/2.0.10/clipboard.min.js"></script>
<script>
    $(function() {
        var clipboard = new ClipboardJS('.ceoshop-click-copy');
        clipboard.on('success', function(e) {
            UIkit.notification('复制成功！', {
                status: 'success'
            })
            e.clearSelection();
        });
        clipboard.on('error', function(e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });

        UIkit.util.on('#ceo-download', 'hidden', function() {
            $('#ceoshop-member-box').html()
            $('#ceo-download').remove()
            clipboard.destroy()
        });
    })
</script>