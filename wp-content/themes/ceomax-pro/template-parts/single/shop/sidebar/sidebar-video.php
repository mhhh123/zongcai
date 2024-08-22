<?php

$down_info_arr = get_post_meta(get_the_ID(), 'down_info', true);
$author_id = get_post(get_the_ID())->post_author;
$author = get_userdata($author_id);

$post_id =  get_the_ID();
$userId = get_current_user_id();
$productInfo = CeoShopCoreProduct::getInfo($post_id, $userId);
$downloadInfo = get_post_meta($post_id, 'ceo_shop_video_down', true);

?>
<section class="ceo-video-list">
    <div class="ceo-video-list-author">
        <div class="ceo-grid-small" ceo-grid>
            <div class="ceo-width-auto">
                <div class="adminimg">
                    <?php echo get_avatar($author_id, '46'); ?>
                    <?php if (user_can($author_id, 'author') || user_can($author_id, 'editor') || user_can($author_id, 'administrator')) { ?>
                        <i ceo-tooltip="认证作者"></i>
                    <?php } ?>
                </div>
            </div>
            <div class="ceo-width-expand">
                <div class="text">
                    <div class="ceo-flex">
                        <a href="/author/<?php echo the_author_meta('user_login', $author->ID); ?>" target="_blank" class="ceo-text-truncate ceo-flex-1 ceo-text-normal ceo-admin-author"><?php echo $author->display_name; ?></a>
                    </div>
                    <p class="codes ceo-text-truncate">
                        <?php
                        if (empty(get_user_meta($author_id, 'description', 1))) {
                            echo '这家伙很懒，只想把你留下。';
                        } else {
                            echo get_user_meta($author_id, 'description', 1);
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="ceo-video-list-liebiao">
        <ul class="ceo-video-list-liebiao-title ceo-subnav-pill" ceo-switcher>
            <li><a href="#">目录</a></li>
            <li><a href="#">信息</a></li>
            <li><a href="#">讨论</a></li>
        </ul>

        <ul class="ceo-video-list-liebiao-box ceo-switcher ceo-margin">
            <!--目录-->
            <li>
                <?php
                if (!empty($productInfo)) {
                    foreach ($productInfo as $k => $v) {
                        $number = $k + 1;
                        $tempName = !empty($v['name']) ? $v['name'] : '课程' . $number;

                        if ($k == 0) {
                            echo '<div>
                            <a data-product-id="' . get_the_ID() . '" data-sku="' . $number . '" href="#' . $number . '" title="' . $tempName . '" class="btn-ceo-purchase-change-video ceo-video-list-liebiao-d"><i class="icon-video"></i>' . $tempName . '</a>
                            <a data-product-id="' . get_the_ID() . '" data-sku="' . $number . '" class="video_link_play btn-ceo-purchase-change-video ceo-video-list-liebiao-d" href="#' . $number . '">播放</a>
                            </div>';
                        } else {
                            echo '<div>
                            <a data-product-id="' . get_the_ID() . '" data-sku="' . $number . '" href="#' . $number . '" title="' . $tempName . '" class="btn-ceo-purchase-change-video"><i class="ceofont"></i>' . $tempName . '</a>
                            <a data-product-id="' . get_the_ID() . '" data-sku="' . $number . '" class="video_link_play btn-ceo-purchase-change-video" href="#' . $number . '">播放</a>
                            </div>';
                        }
                    }
                } ?>
            </li>
            <!--信息-->
            <li>
                <div class="ceo-video-list-xinxi">
                    <div class="ceo-video-list-xinxi-down">
                        <a class="z1 btn-ceo-purchase-product" data-product-id="<?php echo $post_id ?>" data-type="download" data-sku="1" data-style="slide-down">
                            <span id="shop_single_an_id">配套资料 立即下载</span>
                        </a>
                    </div>
                    <div class="ceo-video-list-xinxi-title">信息属性</div>
                    <?php if (_ceo('ceoshop_5_shuxing_bh') == true) : ?>
                        <div class="ceo-video-list-xinxi-tim">
                            <span><?php echo _ceo('ceoshop_5_shuxing_bhbt'); ?>：<p><?php echo get_the_ID(); ?></p></span>
                        </div>
                    <?php endif ?>
                    <?php if(!empty($down_info_arr)){?>
                        <?php
                        if(!empty($down_info_arr)){
                            foreach ($down_info_arr as $k=>$v){
                                $number=$k+1;
                                echo '<div class="ceo-video-list-xinxi-tim"><span>'.$v['title'].'：'.'<p>'.$v['desc'].'</p></span>';
                                if($number%3==0){
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                    <?php } ?>
                    <?php if (_ceo('ceoshop_5_shuxing_gx') == true) : ?>
                        <div class="ceo-video-list-xinxi-tim">
                            <span><?php echo _ceo('ceoshop_5_shuxing_gxbt'); ?>：<p><?php echo date("Y-m-d", strtotime($post->post_modified)); ?></p></span>
                        </div>
                    <?php endif ?>
                </div>
            </li>
            <!--信息-->
            <li>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="ceo-video-list-form ceo-form ceo-width-1-1">
                    <?php if (is_user_logged_in()) { ?>
                        <textarea name="comment" id="comment" rows="3" class="b-r-4 ceo-textarea ceo-width-1-1 ceo-comments-text ceo-comments-textarea" placeholder="Hi，<?php echo $current_user->display_name; ?>，请输入您的评论内容..."></textarea>
                        <div class="comt-tips"><?php comment_id_fields();
                                                do_action('comment_form', $post->ID); ?></div>
                        <button class="btns ceo-button change-color b-r-4 ceo-width-1-1">发表评论</button>
                    <?php } else { ?>
                        <textarea name="comment" id="comment" rows="3" class="b-r-4 ceo-textarea ceo-width-1-1 ceo-comments-text ceo-margin-bottom" readonly="readonly" placeholder="请登录后发表评论..." disabled></textarea>
                        <a href="#modal-login" class="btns ceo-button change-color b-r-4 ceo-width-1-1" ceo-toggle>登录后评论</a>
                    <?php } ?>
                </form>
            </li>
        </ul>
        <?php if (_ceo('ceoshop_5_ggtp') == true) : ?>
        <div class="ceo-video-list-liebiao-ad">
            <a href="<?php echo _ceo('ceoshop_5_ggtp_lj'); ?>" target="_blank" rel="nofollow">
                <img src="<?php echo _ceo('ceoshop_5_ggtp_k'); ?>">
            </a>
        </div>
        <?php endif ?>
    </div>
</section>
<style>.sidebar .user-info{display: none}</style>