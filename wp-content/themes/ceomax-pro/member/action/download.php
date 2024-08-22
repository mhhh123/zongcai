<?php

$userId = get_current_user_id();

$allowCount = CeoShopCoreUser::getVipDownloadCount($userId);

$page = isset($_GET['mpaged']) ? intval($_GET['mpaged']) : 1;
$pageSize = 10;
$result = CeoShopMemberDownload::getDownloadList($userId, $page, $pageSize);

?>

<div class="member-download">
    <div class="top ceo-background-default ceo-margin-bottom">
        <span class="title">我的下载</span>
        <div class="ceo-grid-ceosmls" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="box">
                    <div class="title">今日免费次数</div>
                    <span><?php echo $allowCount['max'] ?></span><em>次</em>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="box">
                    <div class="title">今日使用次数</div>
                    <span><?php echo $allowCount['use'] ?></span><em>次</em>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="box">
                    <div class="title">剩余可用次数</div>
                    <span><?php echo $allowCount['max'] - $allowCount['use'] ?></span><em>次</em>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom ceo-background-default">
        <div class="title">
            <span class="current">下载记录</span>
        </div>
        <?php if (!empty($result['data'])) : ?>
            <div class="box">
                <div class="header">
                    <div class="header-1">名称</div>
                    <div class="header-2">套餐</div>
                    <div class="header-3">类型</div>
                    <div class="header-4">时间</div>
                </div>
                <ul class="list">
                    <?php foreach ($result['data'] as $row) : ?>
                        <li>
                            <div class="list-1"><a href="<?php echo get_permalink($row->product_id) ?>"><?php echo $row->post_title ?></a></div>
                            <div class="list-2">套餐<?php echo $row->sku ?></div>
                            <div class="list-3">虚拟资源</div>
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
</div>