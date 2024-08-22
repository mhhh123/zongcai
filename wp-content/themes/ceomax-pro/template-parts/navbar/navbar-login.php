<div id="modal-login" ceo-modal>
    <div class="ceo-navbar-login ceo-modal-dialog">
        <div class="ceo-grid-collapse" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s ceo-visible@s">
                <div class="zcontent" style="background-image: url(<?php echo _ceo('login_bg_1'); ?>)">
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="ceo-position-relative">
                    <div class="ycontent ceo-background-default ceo-panel">
                        <button class="ceo-modal-close-default ceo-modal-close" type="button" ceo-close></button>
                        <div class="ceo-login-title">
                            <span>账号登录</span>
                        </div>
                
                		<?php if(_ceo('ceo_login_txt') == true): ?>
                		<div class="box">
                			<div class="zongcai-tips"></div>
                			<form action="" method="POST" id="login-form" class="login-weixin login-form2">
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-small-bottom">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-user-line"></i></span>
                					<input type="text" name="username" id="username" class="b-r-4 ceo-input ceo-text-small" placeholder="输入用户名/邮箱" required="required">
                				</div>
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-small-bottom">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
                					<input type="password" name="password" id="password" placeholder="请输入密码" class="b-r-4 ceo-input ceo-text-small" value="">
                				</div>
                				
                        		<div class="ceo-flex">
                                    <?php if(_ceo('ceo_retrieve_password')=='1'){ ?>
                        		    <a href="<?php echo get_user_rp_by_path(); ?>" class="ceo-text-muted ceo-text-small ceo-flex-1">忘记密码？</a>
                                    <?php }else { ?>
                                    <a href="/wp-login.php?action=lostpassword" class="ceo-text-muted ceo-text-small ceo-flex-1">忘记密码？</a>
                        		    <?php }?>
                        		    <?php if(_ceo('sms_login')):?>
                                    <a href="#modal-registersms" class="ceo-text-small registersms" ceo-toggle>手机登录/注册</a>
                                    <?php endif;?>
                        		</div>
                        		
                				<div class="ceo-flex-middle ceo-margin-top-20">
                					<input type="hidden" name="action" value="zongcai_login">
                					<button class="ceo-login-btn change-color b-r-4 button mid dark ceo-button ceo-width-1-1">立即登录</button>
                				</div>
                			</form>
                	    </div>
                	    <?php endif; ?>
                	    
                	    <?php if(_ceo('qq_login') || _ceo('weixin_login') || _ceo('is_oauth_mpweixin') || _ceo('weibo_login')){?>
                	    <div class="ceo-login-qq">
                            <div class="ceo-login-other">第三方账号登录</div>
                            <?php if(_ceo('qq_login') == true): ?>
                		    <a href="javascript:;" class="btn change-color social-login ceo-margin-top button mid qq half qq_login_button" ceo-tooltip="QQ登录"><i class="ceofont ceoicon-qq-fill"></i></a>
                		    <?php endif; ?>
                            <?php if(_ceo('is_oauth_mpweixin')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/mpweixin')); ?>" class="btn change-color social-login ceo-margin-top button mid mpweixin half mpweixin_login_button" ceo-tooltip="公众号登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weixin_login')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/'.'weixin'.'?rurl='.home_url(add_query_arg(array())))); ?>" class="btn change-color social-login ceo-margin-top button mid weixin half weixin_login_button" ceo-tooltip="微信登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weibo_login')){?>
                        	    <a href="<?php echo weibo_oauth_url();?>" class="btn social-login ceo-margin-top weibo_login_button" ceo-tooltip="微博登录"><i class="ceofont ceoicon-weibo-fill"></i></a>
                        	<?php }?>
                		</div>
                		<?php }?>
                    </div>
                    
            		<div class="ceo-login-bottom">
            		    <div class="ceo-flex">
            		    <?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['title']; ?><a href="<?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['link']; ?>" target="_blank" class="ceo-flex-1"><?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['desc']; ?></a>没有账号？ <a href="#modal-register" ceo-toggle>立即注册</a>
            		    </div>
            		</div>
        		</div>
            </div>
        </div>
    </div>
</div>
<div id="modal-register" ceo-modal>
    <div class="ceo-navbar-login ceo-modal-dialog">
        <div class="ceo-grid-collapse" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s ceo-visible@s">
                <div class="zcontent" style="background-image: url(<?php echo _ceo('login_bg_1'); ?>)">
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="ceo-position-relative">
                    <div class="ycontent ceo-background-default ceo-panel">
                        <button class="ceo-modal-close-default ceo-modal-close" type="button" ceo-close></button>
                        <div class="ceo-login-title">
                            <span>账号注册</span>
                        </div>
                
                		<?php if(_ceo('ceo_login_txt') == true): ?>
                		<div class="box">
                			<div class="zongcai-tips"></div>
                			<form class="login-weixin ceo-margin-top-20 register-form2" action="" method="POST" id="register-form">
                                <?php if(_ceo('is_invitaion_code')):?>
                                <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                                    <span class="ceo-form-icon"><i class="ceofont ceoicon-coupon-line"></i></span>
                                    <input type="text" name="invitation_code" id="invitation_code" placeholder="请输入邀请码" class="b-r-4 ceo-input ceo-text-small" required="required">
                                </div>
                                <a href="<?php echo _ceo('is_invitaion_link'); ?>" target="_blank" rel="noreferrer nofollow" class="ceo-invitation-btn ceo-margin-bottom-10"><?php echo _ceo('is_invitaion_title'); ?></a>
                                <?php endif;?>
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-mail-line"></i></span>
                					<input type="email" name="email_address2" id="email_address2" placeholder="输入邮箱" class="b-r-4 ceo-input ceo-text-small" required="required">
                				</div>
                                <?php if(_ceo('email_verify_code')): ?>
                                <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                                    <span class="ceo-form-icon"><i class="ceofont ceoicon-newspaper-line"></i></span>
                                    <input type="text" name="verify_code" id="verify_code" placeholder="验证码" class="b-r-4 ceo-input ceo-text-small" required="required">
                                    <button  class="send-verify-code">获取验证码</button>
                                </div>
                                <?php endif;?>
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-user-line"></i></span>
                					<input type="text" name="username2" id="username2" placeholder="输入用户名" class="b-r-4 ceo-input ceo-text-small" required="required">
                				</div>
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
                					<input type="password" name="password2" id="password2" placeholder="输入6位数以上密码" class="b-r-4 ceo-input ceo-text-small" required="required">
                				</div>
                				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom-10">
                					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
                					<input type="password" name="repeat_password2" id="repeat_password2" placeholder="请再次输入密码" class="b-r-4 ceo-input ceo-text-small" required="required">
                				</div>
                                <div class="agreen">
                                    <input id="agreement" name="agreen" type="checkbox" class="agreen_btn" required>
                                    <label for="agreen"></label>
                                    我已阅读并同意<a href="<?php echo _ceo('ceo_login_zcxy_link'); ?>" target="_blank"><?php echo _ceo('ceo_login_zcxy'); ?></a>
                                </div>
                				<div class="ceo-flex ceo-flex-middle">
                					<input type="hidden" name="action" value="zongcai_register">
    					            <input type="hidden" name="ref" value="<?php echo $_GET['ref'] ?>">
                					<button class="ceo-login-btn submit change-color b-r-4 button mid dark ceo-button ceo-width-1-1">立即注册</button>
                				</div>
                			</form>
                	    </div>
                	    <?php endif; ?>
                	    
                	    <?php if(_ceo('qq_login') || _ceo('weixin_login') || _ceo('is_oauth_mpweixin') || _ceo('weibo_login')){?>
                	    <div class="ceo-login-qq">
                            <div class="ceo-login-other">第三方账号登录</div>
                            <?php if(_ceo('qq_login') == true): ?>
                		    <a href="javascript:;" class="btn change-color social-login ceo-margin-top button mid qq half qq_login_button" ceo-tooltip="QQ登录"><i class="ceofont ceoicon-qq-fill"></i></a>
                		    <?php endif; ?>
                            <?php if(_ceo('is_oauth_mpweixin')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/mpweixin')); ?>" class="btn change-color social-login ceo-margin-top button mid mpweixin half mpweixin_login_button" ceo-tooltip="公众号登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weixin_login')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/'.'weixin'.'?rurl='.home_url(add_query_arg(array())))); ?>" class="btn change-color social-login ceo-margin-top button mid weixin half weixin_login_button" ceo-tooltip="微信登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weibo_login')){?>
                        	    <a href="<?php echo weibo_oauth_url();?>" class="btn social-login ceo-margin-top weibo_login_button" ceo-tooltip="微博登录"><i class="ceofont ceoicon-weibo-fill"></i></a>
                        	<?php }?>
                		</div>
                		<?php }?>
                    </div>
                    
            		<div class="ceo-login-bottom">
            		    <div class="ceo-flex">
            		    <?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['title']; ?><a href="<?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['link']; ?>" target="_blank" class="ceo-flex-1"><?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['desc']; ?></a>已有账号？ <a href="#modal-login" ceo-toggle>立即登录</a>
            		    </div>
            		</div>
        		</div>
            </div>
        </div>
    </div>
</div>
<div id="modal-registersms" ceo-modal>
    <div class="ceo-navbar-login ceo-modal-dialog">
        <div class="ceo-grid-collapse" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-1-2@s ceo-visible@s">
                <div class="zcontent" style="background-image: url(<?php echo _ceo('login_bg_1'); ?>)">
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-2@s">
                <div class="ceo-position-relative">
                    <div class="ycontent ceo-background-default ceo-panel">
                        <button class="ceo-modal-close-default ceo-modal-close" type="button" ceo-close></button>
                        <div class="ceo-login-title">
                            <span>手机登录/注册</span>
                        </div>
                
                		<div class="box">
                			<div class="zongcai-tips"></div>
                            <form action="" method="POST" id="login-form" class="login-weixin login-form2 ceo-margin-top-20">
                                <div class="ceo-inline ceo-width-1-1 ceo-margin-small-bottom">
                                    <span class="ceo-form-icon"><i class="ceofont ceoicon-smartphone-line"></i></span>
                                    <input type="number" name="user_mobile" id="user_mobile" class="b-r-4 ceo-input ceo-text-small" placeholder="请输入手机号" required="required">
                                </div>
                                <div class="ceo-inline ceo-width-1-1 ceo-margin-small-bottom">
                                    <div class="ceo-grid-small" ceo-grid>
                                        <div class="ceo-width-3-5">
                                            <span class="ceo-form-icon"><i class="ceofont ceoicon-newspaper-line"></i></span>
                                            <input type="text" name="captcha" id="captcha" placeholder="请输入验证码" class="b-r-4 ceo-input ceo-text-small" value="">
                                        </div>
                                        <div class="ceo-width-2-5">
                                            <span class="input-group-btn">
                                                <script>var is_sms_login=true</script>
                                                <button class="go-captcha_mobile b-r-4 button mid dark ceo-button ceo-button-default ceo-width-1-1" type="button"
                                                                data-smstype="login" data-nonce="<?php echo wp_create_nonce('captcha_mobile'); ?>">发送验证码</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php if(_ceo('ceo_login_txt') == true): ?>
                                <div class="ceo-flex">
                                    <a href="#modal-register" class="ceo-text-muted ceo-text-small ceo-flex-1" ceo-toggle>账号注册</a>
                                    <a href="#modal-login" class="ceo-text-small registersms" ceo-toggle>账号密码登录</a>
                        		</div>
                        		<?php endif; ?>
                                <div class="ceo-flex-middle ceo-margin-top">
                                    <input type="hidden" name="action" value="zongcai_login_sms">
                                    <button class="ceo-login-btn change-color b-r-4 button mid dark ceo-button ceo-width-1-1">登录/注册</button>
                                </div>
                            </form>
                	    </div>
                	    
                	    <?php if(_ceo('qq_login') || _ceo('weixin_login') || _ceo('is_oauth_mpweixin') || _ceo('weibo_login')){?>
                	    <div class="ceo-login-qq">
                            <div class="ceo-login-other">第三方账号登录</div>
                            <?php if(_ceo('qq_login') == true): ?>
                		    <a href="javascript:;" class="btn change-color social-login ceo-margin-top button mid qq half qq_login_button" ceo-tooltip="QQ登录"><i class="ceofont ceoicon-qq-fill"></i></a>
                		    <?php endif; ?>
                            <?php if(_ceo('is_oauth_mpweixin')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/mpweixin')); ?>" class="btn change-color social-login ceo-margin-top button mid mpweixin half mpweixin_login_button" ceo-tooltip="公众号登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weixin_login')){?>
                                <a href="<?php echo esc_url(home_url('/oauth/'.'weixin'.'?rurl='.home_url(add_query_arg(array())))); ?>" class="btn change-color social-login ceo-margin-top button mid weixin half weixin_login_button" ceo-tooltip="微信登录"><i class="ceofont ceoicon-wechat-fill"></i></a>
                            <?php }?>
                            <?php if(_ceo('weibo_login')){?>
                        	    <a href="<?php echo weibo_oauth_url();?>" class="btn social-login ceo-margin-top weibo_login_button" ceo-tooltip="微博登录"><i class="ceofont ceoicon-weibo-fill"></i></a>
                        	<?php }?>
                		</div>
                		<?php }?>
                    </div>
                    
            		<div class="ceo-login-bottom">
            		    <div class="ceo-flex">
            		    <?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['title']; ?><a href="<?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['link']; ?>" target="_blank" class="ceo-flex-1"><?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['desc']; ?></a>没有账号？ <?php if(_ceo('ceo_login_txt')== true ){ ?><a href="#modal-register" ceo-toggle>立即注册</a><?php }else { ?><a href="javascript:void(0);">立即注册</a><?php }?>
            		    </div>
            		</div>
        		</div>
            </div>
        </div>
    </div>
</div>

<script>
    function is_in_weixin() {
        return "micromessenger" == navigator.userAgent.toLowerCase().match(/MicroMessenger/i)
    }
    $(".login-main .mpweixin_login_button,.login-main .mpweixin_login_button").on("click", function(e) {
        setTimeout(function (){
            UIkit.modal('#modal-login').show();
        },500)
    });
    $(document).on("click", ".mpweixin_login_button", function(e) {
        e.preventDefault();
        var t = $(this)
            , a = t.html();
        if (is_in_weixin())
            return window.location.href = t.attr("href"),
                !0;
        $.post(zongcai.ajaxurl, {
            action: "get_mpweixin_qr"
        }, function(e) {
            if (1 == e.status) {
                $("#modal-register").find('form').html('<img class="login-weixin-img" src="' + e.ticket_img + '"><p class="login-weixin-p">请使用微信扫码关注登录</p>');
                $("#modal-login").find('form').html('<img class="login-weixin-img" src="' + e.ticket_img + '"><p class="login-weixin-p">请使用微信扫码关注登录</p>');
                $("#modal-registersms").find('form').html('<img class="login-weixin-img" src="' + e.ticket_img + '"><p class="login-weixin-p">请使用微信扫码关注登录</p>');
                var n = setInterval(function() {
                    $.post(zongcai.ajaxurl, {
                        action: "check_mpweixin_qr",
                        scene_id: e.scene_id
                    }, function(e) {
                        1 == e.status && (clearInterval(n),
                            UIkit.notification('扫码成功，即将登录', { status: 'success' }),
                            window.location.reload())
                    })
                }, 5e3)
            } else
                alert(e.ticket_img);
            t.html(a)
        })
    });
</script>

<?php
if (_ceo('sms_send_verify') == true) {
    if (_ceo('sms_send_verify_type') == '1') {
        echo tencent_captcha_load();
        echo '<script>var verify_sms_send = 1</script>';
    }
    if (_ceo('sms_send_verify_type') == '2') {
        ?>
        <script src="https://v-cn.vaptcha.com/v3.js"></script>
        <script>
            window.vaptcha_obj = vaptcha({
                vid: '<?php echo _ceo('vaptcha_vid');?>',
                mode: 'invisible',
                scene: 0,
                area: 'auto',
            })
        </script>
        <?php
        echo '<script>var verify_sms_send = 2</script>';
    }
} else {
    echo '<script>var verify_sms_send = 0</script>';
}
?>

<?php
if (_ceo('ceo_login_verify') == true) {
    if (_ceo('ceo_login_verify_type') == '1') {
        echo tencent_captcha_load();
        echo '<script>var verify_ceo_login = 1</script>';
    }
    if (_ceo('ceo_login_verify_type') == '2') {
        ?>
        <script src="https://v-cn.vaptcha.com/v3.js"></script>
        <script>
            window.vaptcha_obj = vaptcha({
                vid: '<?php echo _ceo('vaptcha_vid');?>',
                mode: 'invisible',
                scene: 0,
                area: 'auto',
            })
        </script>
        <?php
        echo '<script>var verify_ceo_login = 2</script>';
    }
} else {
    echo '<script>var verify_ceo_login = 0</script>';
}
?>
