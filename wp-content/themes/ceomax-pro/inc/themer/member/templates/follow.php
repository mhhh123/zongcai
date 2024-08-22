<?php $url = get_author_posts_url( $follow->ID );?>
<li class="follow-item">
    <div class="ceo-grid-ceosmls" ceo-grid>
        <div class="ceo-width-auto">
            <div class="follow-item-avatar">
                <a href="<?php echo $url;?>" target="_blank"><?php echo get_avatar( $follow->ID, 120, '', $follow->display_name );?></a>
            </div>
        </div>
        <div class="ceo-width-expand">
            <div class="follow-item-text">
                <h2 class="follow-item-name"><a href="<?php echo $url;?>" target="_blank"><?php echo $follow->display_name;?></a></h2>
                <div class="follow-item-desc ceo-text-truncate"><?php echo $follow->description;?></div>
            </div>
        </div>
        <div class="ceo-width-1-1 ceo-width-auto@s">
            <div class="follow-item-btns">
                <div class="ceo-grid-small" ceo-grid>
                    <?php do_action('ceo_follow_item_action', $follow->ID);?>
                </div>
            </div>
        </div>
    </div>
</li>