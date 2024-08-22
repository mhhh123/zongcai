<div class="ceo-padding-large">
	<div class="form-popup">
		<div class="form-popup-content b-a b-r-4 ceo-background-default ceo-padding">
			<h4 class="popup-title">绑定已注册的账号</h4>
			<hr class="line-separator">
			<form action="" id="login_binding" method="post">
				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-user-line"></i></span>
					<input type="text" id="username" class="b-r-4 ceo-input ceo-text-small" name="username" placeholder="请输入您的用户名或邮箱账号" required="required">
				</div>
				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
					<input type="password" id="password" name="password" class="b-r-4 ceo-input ceo-text-small" placeholder="请输入您的密码..." required="required">
				</div>
				<p class="ceo-text-small">
					没有账号？<a href="<?php echo home_url(user_trailingslashit('/user/bin-register'));?>" class="primary">点击注册！</a>
				</p>
				<input type="hidden" name="action" value="login_binding">
				<button type="submit" class="button mid dark change-color b-r-4 ceo-button">绑定账号</button>
			</form>
		</div>
	</div>
</div>