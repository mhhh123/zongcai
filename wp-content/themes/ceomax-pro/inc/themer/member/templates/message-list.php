<ul class="ceo-messages-box">
    <?php if( is_array($list) && $list) {
    foreach ($list as $item) {
    $msger = get_user_by('ID', $item->group_user);
    $item->content = strip_tags(preg_replace('/<img [^>]+>/i', '[图片]', $item->content));
    ?>
    <li class="messages-box-item j-message" data-user="<?php echo $item->group_user;?>">
        <div class="messages-box-item-avatar">
            <?php echo get_avatar($msger->ID);?>
        </div>
        <div class="messages-item-content">
            <div class="messages-item-title">
                <h4><?php echo $msger->display_name;?><span><?php echo get_date_from_gmt($item->time, 'Y-m-d H:i');?></span></h4>
            </div>
            <div class="messages-item-text">
                <div class="text"><?php echo $item->content; ?></div>
                <?php if($item->unread) echo '<span class="messages-item-unread">'.$item->unread.'</span>'; ?>
            </div>
            <div class="messages-item-btn">回复</div>
        </div>
    </li>
    <?php } }else{ ?>
    <li class="user-pa">您目前暂未发送或收到私信~</li>
    <?php } ?>
</ul>
<?php if ($pages > 1) {
//    ceo_pagination(5,
//        array('numpages' => $pages, 'paged' => $paged, 'url' => ceo_subpage_url('messages'), 'paged_arg' => 'pageid'));
} ?>
