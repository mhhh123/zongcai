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
                                        <h3 class="ceo-text-align">账号登录</h3>
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
									<form action="" method="POST" id="login-form" class="login-form2 ceo-margin-medium-top ceo-margin-bottom">
										<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
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
                                            <a href="/user/registersms/" class="ceo-text-small registersms">手机登录/注册</a>
                                            <?php endif;?>
                                		</div>
        								
										<div class="ceo-flex ceo-flex-middle ceo-margin-top">
											<input type="hidden" name="action" value="zongcai_login">
											<?php
                                                setcookie('loginReferer', $_SERVER['HTTP_REFERER'], time() + 60 * 60 * 2, '/');
                                            ?>
											<button class="change-color ceo-button b-r-4 button mid dark ceo-width-1-1"  class="">立即登录</button>
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
                    		    <?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['title']; ?><a href="<?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['link']; ?>" target="_blank" class="ceo-flex-1"><?php if(_ceo('ceo_login_agr'))echo _ceo('ceo_login_agr')['desc']; ?></a>没有账号？ <a href="/user/register/">立即注册</a>
                    		    </div>
                    		</div>
						</div>
					</div>
					<div class="ceo-width-1-1@s ceo-width-3-5@m ceo-width-3-5@l ceo-width-3-5@xl ceo-visible@s">
						<?php include TEMPLATEPATH.'/user/login/right.php'; ?>
					</div>
				</div>
			</div>
			<p class="ceo-light ceo-text-center ceo-margin-large-top"><a href="<?php echo home_url(); ?>" class="ceo-text-small">返回首页<i class="ceofont ceoicon-share-forward-fill ceo-margin-small-left"></i></a></p>
		</div>
	</div>
</section>
<?php get_footer(); ?>
