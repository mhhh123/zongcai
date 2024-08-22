<section class="ceo-width-1-1 ceo-overflow-hidden ceo-position-relative ceo-position-z-index">
    <?php if(_ceo('login_bg_s') == true): ?>
	<div class="login-bg ceo-position-top">
		<img src="<?php echo _ceo('login_bg'); ?>">
	</div>
	<?php endif; ?>
	<div class="login-warp ceo-width-1-1 ceo-flex ceo-flex-middle ceo-padding-large ceo-position-relative ceo-position-z-index">
		<div class="login-main ceo-animation-slide-bottom-small">
			<div class="login-box b-r-4 ceo-position-relative">
				<div class="login-bg-01 ceo-position-absolute">
					<div class="bg-box b-r-4"></div>
				</div>
				<div class="login-bg-02 ceo-position-absolute">
					<div class="bg-box b-r-4"></div>
				</div>
				<div class="login-contnet b-r-4 ceo-overflow-hidden ceo-grid-collapse ceo-position-relative" ceo-grid>
					<div class="ceo-width-1-1@s ceo-width-2-5@m ceo-width-2-5@l ceo-width-2-5@xl">
						<div class="login-l ceo-background-default">
							<div class="ceo-padding">
								<div class="b-b">
									<div class="ceo-login-title">
                                        <h3 class="ceo-text-align">账号注册</h3>
                                        <p class="title-minor">
                                            <em></em>
                                            <span>Hi~欢迎来到<?php bloginfo('name'); ?></span>
                                            <em></em>
                                        </p>
                                    </div>
                                    <div class="ceo-login-qq">
                                        <?php if(_ceo('qq_login') == true): ?>
                            		    <a href="javascript:;" class="btn change-color social-login ceo-margin-top button mid qq half qq_login_button"><i class="ceofont ceoicon-qq-fill"></i></a>
                            		    <?php endif; ?>
                                        <?php if(_ceo('is_oauth_mpweixin')){?>
                                            <a title="公众号登录" href="<?php echo esc_url(home_url('/oauth/mpweixin')); ?>" class="btn change-color social-login ceo-margin-top button mid mpweixin half mpweixin_login_button"><i class="ceofont ceoicon-wechat-fill"></i></a>
                                        <?php }?>
                                        <?php if(_ceo('weixin_login')){?>
                                            <a href="<?php echo esc_url(home_url('/oauth/'.'weixin'.'?rurl='.home_url(add_query_arg(array())))); ?>" class="btn change-color social-login ceo-margin-top button mid weixin half weixin_login_button"><i class="ceofont ceoicon-wechat-fill"></i></a>
                                        <?php }?>
                                        <?php if(_ceo('weibo_login')){?>
                                    	    <a href="<?php echo weibo_oauth_url();?>" class="btn change-color social-login ceo-margin-top weibo_login_button" ceo-tooltip="微博登录"><i class="ceofont ceoicon-weibo-fill"></i></a>
                                    	<?php }?>
                            		</div>
									<div class="zongcai-tips"></div>
									<?php if(_ceo('ceo_login_txt') == true): ?>
									<form class="ceo-margin-medium-top ceo-margin-bottom register-form2" action="" method="POST" id="register-form">
                                        <?php if(_ceo('is_invitaion_code')):?>
                                        <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
                                            <span class="ceo-form-icon"><i class="ceofont ceoicon-coupon-line"></i></span>
                                            <input type="text" name="invitation_code" id="invitation_code" placeholder="请输入邀请码" class="b-r-4 ceo-input ceo-text-small" required="required">
                                        </div>
                                        <a href="<?php echo _ceo('is_invitaion_link'); ?>" target="_blank" rel="noreferrer nofollow" class="ceo-invitation-btn ceo-margin-bottom"><?php echo _ceo('is_invitaion_title'); ?></a>
                                        <?php endif;?>
										<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
											<span class="ceo-form-icon"><i class="ceofont ceoicon-mail-line"></i></span>
											<input type="email" id="email_address2" name="email_address2" placeholder="输入邮箱" class="b-r-4 ceo-input ceo-text-small" required="required">
										</div>
										<?php if(_ceo('email_verify_code')): ?>
                                        <div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
                                            <span class="ceo-form-icon"><i class="ceofont ceoicon-newspaper-line"></i></span>
                                            <input type="text" name="verify_code" id="verify_code" placeholder="验证码" class="b-r-4 ceo-input ceo-text-small" required="required">
                                            <button  class="send-verify-code">获取验证码</button>
                                        </div>
                                        <?php endif;?>
										<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
											<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-user-line"></i></span>
											<input type="text" id="username2" name="username2" placeholder="输入用户名" class="b-r-4 ceo-input ceo-text-small" required="required">
										</div>
										<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
											<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
											<input type="password" id="password2" name="password2" placeholder="输入您的密码" class="b-r-4 ceo-input ceo-text-small" required="required">
										</div>
										<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
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
											<button class="change-color ceo-button b-r-4 button mid dark ceo-width-1-1">立即注册</button>
										</div>
									</form>
									<?php endif; ?>
								</div>
								<?php
								$login_notice = _ceo('login_notice');
								if( !$login_notice){}else{
								?>
								<div class="ceo-alert-primary ceo-margin-remove-bottom" ceo-alert>
									<p class="ceo-text-small">
										<?php echo _ceo('login_notice'); ?>
									</p>
								</div>
								<?php } ?>
							</div>
							<div class="ceo-login-bottom">
                    		    <div class="ceo-flex">
                    		    <?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['title']; ?><a href="<?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['link']; ?>" target="_blank" class="ceo-flex-1"><?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['desc']; ?></a>已有账号？ <a href="/user/login/">立即登录</a>
                    		    </div>
                    		</div>
						</div>
					</div>
					<div class="ceo-width-1-1@s ceo-width-3-5@m ceo-width-3-5@l ceo-width-3-5@xl ceo-visible@s">
						<?php include TEMPLATEPATH.'/user/login/right.php'; ?>
					</div>
				</div>
			</div>
			<p class="ceo-light ceo-text-center ceo-margin-large-top">
			    <a href="<?php echo home_url(); ?>" class="ceo-text-small">返回首页<i class="ceofont ceoicon-share-forward-fill ceo-margin-small-left"></i></a>
		    </p>
		</div>
	</div>
</section>