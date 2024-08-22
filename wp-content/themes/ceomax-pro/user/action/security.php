<?php
if (!function_exists("curPageURL")) {
    function curPageURL()
    {
        global $wp;
        return home_url(add_query_arg(array(), $wp->request));
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}

if ( ! function_exists("get_open_oauth_url")) {
    function get_open_oauth_url($type, $redirect)
    {
        global $current_user;
        if ($type == 'qq_login') {
            $url=home_url().'/wp-admin/admin-ajax.php?action=unbind_bind&type='.$type.'&ref='.urlencode(curPageURL());
        }elseif ($type == 'weibo_login') {
            $url=weibo_oauth_url();//todo
        }elseif ($type == 'is_oauth_mpweixin') {
            $url = home_url().'/oauth/mpweixin';
        }elseif ($type == 'weixin_login') {
            $url = home_url().'/oauth/weixin';
        }else{
            $url = '#';
        }

        return $url;
    }
}
?>
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>账号安全</h2>
    </div>
    <div class="user-box user-set">
        <div class="utitle">账号绑定<p>绑定第三方账号，您可以快速登录账号</p></div>
        <div class="user-binding">
            <form>
                <div class="box ceo-grid-ceosmls" ceo-grid>
                    <?php $sns_opt = [
                        'qq_login' => ['name'=>'QQ登录','icon'=>'ceofont ceoicon-qq-fill'],
                        'is_oauth_mpweixin' => ['name'=>'微信登录','icon'=>'ceofont ceoicon-wechat-fill'],
                        'weibo_login' => ['name'=>'微博登录','icon'=>'ceofont ceoicon-weibo-fill'],
                    ];
                    $current_url = urlencode(curPageURL());
    
                    foreach ($sns_opt as $type => $opt) : if(_ceo($type)):
                        if ($type == 'qq_login') {
                            $_openid_meta_key = 'qq_openid';
                            $openid = get_user_meta($current_user->ID, $_openid_meta_key, 1);
                            $nickname = get_user_meta($current_user->ID, 'open_qq_name', 1);
                        }elseif ($type == 'weibo_login') {
                            $_openid_meta_key = 'sina_uid';
                            $openid = get_user_meta($current_user->ID, $_openid_meta_key, 1);
                            $nickname = get_user_meta($current_user->ID, 'open_weibo_name', 1);
                        }elseif ($type == 'is_oauth_mpweixin') {
                            $_openid_meta_key = 'open_mpweixin_openid';
                            $openid = get_user_meta($current_user->ID, $_openid_meta_key, 1);
                            $nickname = get_user_meta($current_user->ID, 'open_mpweixin_name', 1);
                        }elseif ($type == 'weixin_login') {
                            $_openid_meta_key = 'open_weixin_openid';
                            $openid = get_user_meta($current_user->ID, $_openid_meta_key, 1);
                            $nickname = get_user_meta($current_user->ID, 'open_weixin_name', 1);
                        }else{
                            $openid = get_user_meta($current_user->ID, 'open_' . $type . '_openid', 1);
                            $nickname = '';
                        }
                        ?>
                        <div class="ceo-width-1-1 ceo-width-1-3@s">
                            <div class="item">
                                <i class="<?php echo $opt['icon'];?>"></i>
                                <div class="title">
                                    <div class="title"><?php echo $opt['name'];?></div>
                                    <span>
                                        <?php if (!empty($openid)) {
    
                                            if(!empty($nickname)){
                                                echo '<p>昵称</p> ：<p></p>';
                                                echo $nickname;
                                            }
                                        }else{
                                            echo '<p>未绑定</p>';
                                        }?>
                                    </span>
                                </div>
                                <div class="btns">
                                    <?php if (!empty($openid)) {
                                        echo '<a href="javascript:;" class="open" data-type="'.$type.'">解除'.$opt['name'].'</a>';
                                    }else{
                                        $to_url = get_open_oauth_url($type, $current_url);
                                        $to_title = '绑定'.$opt['name'];
                                        if ($type=='is_oauth_mpweixin' && !ceo_shop_is_wechat()) {
                                            $to_url = 'javascript:;';
                                            $to_title = '请在微信内访问绑定';
                                        }elseif ($type=='is_oauth_mpweixin') {
                                            $to_url = get_open_oauth_url($type, $current_url);
                                        }
                                        echo '<a href="'.$to_url.'" class="user-btns">'.$to_title.'</a>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    <?php endif; endforeach;?>
                </div>
            </form>
        </div>
        <div class="utitle">密码修改</div>
    	<form id="change_password">
    		<div class="oldpassword ceo-margin-bottom">
    			<label for="oldpassword" class="rl-label ceo-text-small ceo-text-muted">原密码</label>
    			<input type="password" id="oldpassword" name="oldpassword" placeholder="请输入当前密码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
    			<div class="ceo-text-small ceo-text-muted" style="display: none;"></div>
    		</div>
    		<div class="newpassword ceo-margin-bottom">
    			<label for="newpassword" class="rl-label ceo-text-small ceo-text-muted">新密码</label>
    			<input type="password" id="newpassword" name="newpassword" placeholder="请输入您的密码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
    			<div class="ceo-text-small ceo-text-muted" style="display: none;"></div>
    		</div>
    		<div class="ceo-margin-bottom newpassword2">
    			<label for="newpassword2" class="rl-label ceo-text-small ceo-text-muted">重复新密码</label>
    			<input type="password" id="newpassword2" name="newpassword2" placeholder="请再次输入您的密码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
    			<div class="ceo-text-small ceo-text-muted" style="display: none;"></div>
    		</div>
    		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'change-password' ); ?>"> 
    		<input type="hidden" name="action" value="change_password">
    		<button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small" id="change_password_button" type="button">确认修改</button>
    	</form>
    </div>
</div>
<script>
    jQuery(function() {
        'use strict';
        //解绑账号登录
        $(".open").on("click", function(event) {
            event.preventDefault();

            if (!confirm('您确定要解绑当前账号吗？')) {
                return;
            }

            var _this = $(this);
            var deft = _this.html();
            var type = _this.data("type");
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    "action": "unset_open_login",
                    "type": type,
                },
                success: function (data) {
                    if (data.success) {
                        UIkit.notification(data.data.msg, { status: 'success' })
                        if (data.data.url) {
                            window.location.href = data.data.url
                        }
                    } else {
                        UIkit.notification(data.data, { status: 'warning' })
                    }
                },
                error: function () {
                    UIkit.notification('操作出错', { status: 'warning' })
                }
            })
        });
    })
</script>