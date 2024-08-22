<div class="ceo-padding-large">
	<div class="form-popup">
		<div class="form-popup-content b-a b-r-4 ceo-background-default ceo-padding">
			<h4 class="popup-title">绑定新账号</h4>
			<hr class="line-separator">
			<form action="" id="reg_binding" method="post">
				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
					<span class="ceo-form-icon"><i class="ceofont ceoicon-mail-line"></i></span>
					<input type="email" id="email_address2" name="email_address2" class="b-r-4 ceo-input ceo-text-small" placeholder="请输入您的真实邮箱..." required="required">
				</div>
				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
					<input type="password" id="password2" name="password2" class="b-r-4 ceo-input ceo-text-small" placeholder="请输入您的密码..." required="required">
				</div>
				<div class="ceo-inline ceo-width-1-1 ceo-margin-bottom">
					<span class="ceo-form-icon"><i class="ceofont ceoicon-shield-keyhole-line"></i></span>
					<input type="password" id="repeat_password2" name="repeat_password2" class="b-r-4 ceo-input ceo-text-small" placeholder="请再次输入密码..." required="required">
				</div>
				<p>
					已有账号？<a href="<?php echo home_url(user_trailingslashit('/user/binding'));?>" class="primary">点击绑定！</a>
				</p>
				<input type="hidden" name="action" value="reg_binding">
				<button type="submit" class="button mid dark change-color b-r-4 ceo-button">注册并绑定</button>
			</form>
		</div>
	</div>
</div>