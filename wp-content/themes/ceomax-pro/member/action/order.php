<?php

$userId = get_current_user_id();

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberOrder::getOrderList($userId, $page, $pageSize);

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
            <a href="/member/order" class="current">购买订单</a>
            <a href="/member/viporder">会员订单</a>
        </div>

        <div class="commodity">
            <?php if (!empty($result['data'])) : ?>
                <div class="box">
                    <div class="header">
                        <div class="header-1">名称</div>
                        <div class="header-2">套餐</div>
                        <div class="header-3">支付</div>
                        <div class="header-4">时间</div>
                        <div class="header-5">详情</div>
                    </div>
                    <ul class="list">
                        <?php foreach ($result['data'] as $row) : ?>
                            <li>
                                <div class="list-1"><a href="<?php echo get_permalink($row->product_id) ?>"><?php echo $row->post_title ?></a></div>
                                <div class="list-2"><?php echo $row->sku ?></div>
                                <div class="list-3"><?php echo $row->actual_money ?></div>
                                <div class="list-4"><?php echo $row->pay_time ?></div>
                                <div class="list-5"><button class="ceo-button submit-ceo-order-detail" data-order-id="<?php echo $row->id ?>" data-style="slide-down">查看详情</button></div>
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

<script>
    $(function() {
        $('.submit-ceo-order-detail').click(function() {
            let btnLoading = Ladda.create(this);
            btnLoading.start()
            let id = $(this).data('order-id')
            $.ajax({
                url: zongcai.ajaxurl + '?action=ceo_shop_member_order_detail&order_id=' + id,
                method: 'GET',
                success: function(res) {
                    btnLoading.stop()
                    btnLoading.remove()
                    $('#ceoshop-member-box').html(res)
                    UIkit.modal('#ceo-order-details').show()
                    UIkit.util.on('#ceo-order-details', 'hidden', function() {
                        $('#ceoshop-member-box').html()
                        $('#ceo-order-details').remove()
                    });

                    // 物流信息查看
                    $('#show-ceo-order-logistics').click(function() {
                        $.ajax({
                            url: zongcai.ajaxurl + '?action=ceo_shop_member_order_logistics&order_id=' + id,
                            method: 'GET',
                            success: function(res) {
                                $('#ceoshop-member-box').html(res)
                                UIkit.modal('#ceo-order-logistics').show()
                                UIkit.util.on('#ceo-order-logistics', 'hidden', function() {
                                    $('#ceoshop-member-box').html()
                                    $('#ceo-order-logistics').remove()
                                });
                            }
                        })
                    })
                }
            })
        })
    })
</script>