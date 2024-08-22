<?php
require_once "../../../wp-load.php";
?>
<em class="ceo-display-inline-block"></em>
<?php if ( is_user_logged_in() ) { ?>
    <?php
    global $current_user;
    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    $authorID = $current_user->ID;
    ?>
    <div class="head-avatar">
        <a href="#" class="avatar ceo-display-inline-block"><?php echo get_avatar($authorID, 36); ?></a>
        <div class="user-down ceo-position-top-right ceo-margin-medium-right ceo-animation-slide-top-small">
            <div class="user-down-main b-r-4 ceo-overflow-hidden ceo-background-default">
                <div class="user-info ceo-position-relative">
                    
                    <div class="user-down-info ceo-grid-small ceo-position-relative ceo-position-z-index" ceo-grid>
                        <div class="ceo-width-auto">
                            <div class="avatar">
                                <?php $get_avatar_html=get_avatar($authorID, 50);
                                if($get_avatar_html){
                                    $get_avatar_html=str_replace(array('http://','https://'),'//',$get_avatar_html);
                                }
                                echo $get_avatar_html;
                                ?>
                            </div>
                        </div>
                        <div class="ceo-width-expand ceo-padding-top-4">
                            <ul>
                                <h4 class="ceo-text-bolder"><?php echo $current_user->display_name; ?></h4><i><?php echo CeoShopCoreUser::getVipGrade($user_id) ?></i>
                            </ul>
                            <p class="ceo-text-small ceo-text-muted ceo-margin-remove ceo-text-truncate"style="font-size: 0.675rem;"><?php the_author_meta( 'description', $authorID ); ?></p>
                        </div>
                    </div>
                    <div>
                        <li class="first">
                            <?php if(_ceo('ceo_user_t_yexf') == true ): ?>
                                <div class="user-money clearfix">
                                    <div class="money-left">余额：<?php echo CeoShopCoreUser::getBalance($user_id) ?><span>积分：<?php echo CeoShopCoreUser::getIntegral($user_id) ?></span></div>
                                </div>
                            <?php endif; ?>

                            <?php if(_ceo('ceo_user_t_vip') == true ): ?>
                                <div class="user-vip clearfix">
                                    <div class="vip-left">
                                        <span><?php echo CeoShopCoreUser::getVipGrade($user_id) ?></span>
                                        <v onclick="javascript:location.href='<?php if(_ceo('ceo_user_t_vip_sz'))echo _ceo('ceo_user_t_vip_sz')['ceo_user_t_vip_link']; ?>';"><?php if(_ceo('ceo_user_t_vip_sz'))echo _ceo('ceo_user_t_vip_sz')['ceo_user_t_vip_title']; ?></v>
                                        <div class="down-left"><?php if(_ceo('ceo_user_t_vip_sz'))echo _ceo('ceo_user_t_vip_sz')['ceo_user_t_vip_desc']; ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    </div>
                    <div class="ceo-usertc">
                        <ul class="ceo-czgr">
                            <li class="ceo-users-z">
                                <a class="ceo-cz" href="<?php if(_ceo('ceo_user_tg_sz'))echo _ceo('ceo_user_tg_sz')['ceo_user_tg_link']; ?>">
                                    <i class="ceofont <?php if(_ceo('ceo_user_tg_sz'))echo _ceo('ceo_user_tg_sz')['ceo_user_tg_icon']; ?>"></i> <?php if(_ceo('ceo_user_tg_sz'))echo _ceo('ceo_user_tg_sz')['ceo_user_tg_title']; ?></a>
                            </li>
                            <li class="ceo-users-z">
                                <a class="ceo-gr" href="<?php if(_ceo('ceo_user_gr_sz'))echo _ceo('ceo_user_gr_sz')['ceo_user_gr_link']; ?>">
                                    <i class="ceofont <?php if(_ceo('ceo_user_gr_sz'))echo _ceo('ceo_user_gr_sz')['ceo_user_gr_icon']; ?>"></i> <?php if(_ceo('ceo_user_gr_sz'))echo _ceo('ceo_user_gr_sz')['ceo_user_gr_title']; ?>
                                </a>
                            </li>
                        </ul>
                        <span class="ceo-users-s">
                        <a href="<?php if(_ceo('ceo_user_sc_sz'))echo _ceo('ceo_user_sc_sz')['ceo_user_sc_link']; ?>"> <?php if(_ceo('ceo_user_sc_sz'))echo _ceo('ceo_user_sc_sz')['ceo_user_sc_title']; ?></a>
                    </span>
                    </div>
                    <div class="ceo-user-t user-info-menu ceo-padding-small ceo-background-default ceo-margin-top ceo-position-relative ceo-position-z-index">
                        <div class="ceo-grid-small" ceo-grid>
                            <div class="ceo-width-1-4 ceo-text-center">
                                <a href="<?php echo get_author_posts_url($authorID); ?>"  class="ceo-display-block ceo-text-small ceo-text-muted">主页</a>
                            </div>
                            <div class="ceo-width-1-4 ceo-text-center">
                                <a href="<?php echo home_url(user_trailingslashit('/user/settings')); ?>"  class="ceo-display-block ceo-text-small ceo-text-muted">资料</a>
                            </div>
                            <?php if(current_user_can('level_4')){ ?>

                                <div class="ceo-width-1-4 ceo-text-center">
                                    <a href="<?php echo admin_url(); ?>" target="_blank" class="ceo-display-block ceo-text-small ceo-text-muted"></a>
                                </div>

                            <?php } ?>
                            <div class="ceo-width-1-4 ceo-text-center">
                                <a href="<?php echo wp_logout_url( home_url() ); ?>"  class="ceo-display-block ceo-text-small ceo-text-muted">退出</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }else{?>
    <?php if(_ceo('head_login') == true ): ?>
        <?php if(_ceo('modal_login') == 1 ){ ?>
            <?php if(_ceo('ceo_login_default')=='1'){ ?>
                <a href="#modal-login"class="head-login b-r-4 change-color ceo-display-inline-block ceo-text-small" ceo-toggle>登录</a>
            <?php }else { ?>
            <a href="#modal-registersms"class="head-login b-r-4 change-color ceo-display-inline-block ceo-text-small" ceo-toggle>登录</a>
            <?php }?>
        <?php }else { ?>
            <?php if(_ceo('ceo_login_default')=='1'){ ?>
            <a href="<?php echo home_url(user_trailingslashit('/user/login')); ?>" class="head-login b-r-4 change-color ceo-display-inline-block ceo-text-small">登录</a>
            <?php }else { ?>
            <a href="<?php echo home_url(user_trailingslashit('/user/registersms')); ?>" class="head-login b-r-4 change-color ceo-display-inline-block ceo-text-small">登录</a>
            <?php }?>
        <?php } ?>
    <?php endif; ?>
<?php }?>
