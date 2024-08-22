<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>个人资料</h2>
    </div>
    <div class="user-set user-box">
    	<div class="user-set-head b-b">
    		<div class="ceo-grid-small" ceo-grid>
    			<div class="ceo-width-auto">
    				<div class="settings-avatar avatar ceo-text-center">
    					<?php echo get_avatar( $user_id ,60 );?>
    				</div>
    			</div>
    			<div class="ceo-width-expand">
    				<span class="ceo-display-block ceo-margin-small-bottom ceo-text-bolder"><?php echo $current_user->display_name; ?></span>
    				<span class=" ceo-text-small ceo-text-muted ceo-visible@m">建议尺寸: 100×100px，支持: .jpg、.gif、.png格式的图片，图片大小请不要超过1M</span>
    			</div>
    			<div class="ceo-width-auto">
    				<form action="<?php echo get_bloginfo('template_url');?>/user/action/avatar.php" method="post" role="form" name="AvatarForm" id="AvatarForm"  enctype="multipart/form-data">
    				<a class="btn change-color ceo-display-block ceo-position-relative" href="javascript:void(0)" ng-if="!progress">上传头像
    					<input type="file" name="addPic" id="addPic" ng-multiple="false" accept=".jpg, .gif, .png" resetonclick="true" class="upload-avatar ceo-position-top-left">
    				</a>
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="ceo-margin-top">
    		<form action="" id="updata_accounts" method="post" class="ceo-form">
    		    <div class="ceo-user-id">
        		    <div class="ceo-user-is ceo-margin-bottom">
        				<label class="rl-label ceo-text-small ceo-text-muted">会员ID</label>
        				<input type="text" value="<?php echo esc_attr( $current_user->user_login ); ?>" disabled="disabled" class="form-control b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
        			</div>
        		    <div class="ceo-user-is ceo-margin-bottom">
        				<label class="rl-label ceo-text-small ceo-text-muted">注册时间</label>
        				<input type="text" value="<?php echo get_date_from_gmt( $current_user->user_registered ) ?>" disabled="disabled" class="form-control b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
        			</div>
    			</div>
    			<div class="ceo-user-id">
        			<div class="ceo-user-is ceo-margin-bottom">
        				<label for="nickname" class="rl-label ceo-text-small ceo-text-muted">昵称</label>
        				<input type="text" id="nickname" name="nickname" value="<?php echo $current_user->display_name; ?>" placeholder="请输入您的昵称..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
        			</div>
        			<div class="ceo-user-is ceo-margin-bottom">
        				<label for="description" class="rl-label ceo-text-small ceo-text-muted">个性签名</label>
        				<input type="text" id="description" name="description" value="<?php echo get_the_author_meta('description',$user_id); ?>" placeholder="请输入您的个性签名..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
        			</div>
    			</div>
    			<div class="ceo-user-id">
        			<div class="ceo-user-is ceo-margin-bottom">
        				<label for="qq" class="rl-label ceo-text-small ceo-text-muted">QQ号码</label>
        				<input type="text" id="qq" name="qq" value="<?php echo get_the_author_meta('qq',$user_id); ?>" placeholder="请输入您的QQ号码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
        			</div>
        			<div class="ceo-user-is ceo-margin-bottom">
                        <label for="weixinhaoma" class="rl-label ceo-text-small ceo-text-muted">微信号码</label>
                        <input type="text" id="weixinhaoma" name="weixinhaoma" value="<?php echo get_user_meta( $user_id , 'weixinhaoma' , true ); ?>" placeholder="请输入您的微信号码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
                    </div>
                </div>
    			<div class="ceo-margin-bottom">
    				<label for="weixin" class="rl-label ceo-text-small ceo-text-muted">微信二维码</label>
                    <br>
                    <input style="width: 90%" type="text" id="weixin" name="weixin" value="<?php echo get_user_meta( $user_id , 'weixin' , true ); ?>" placeholder="上传微信二维码" class="b-r-3 ceo-input ceo-margin-small-top ceo-text-small">
                    <button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small upload-weixin-button" type="button">上传图片</button>
                    <input type="file" name="upload-weixin" accept="image/gif,image/jpg,image/jpeg,image/png" id="upload-weixin" class="dn" style="display: none">
    			</div>
    			<div class="ceo-user-id">
                    <div class="ceo-margin-bottom ceo-user-is">
                        <label for="email" class="rl-label ceo-text-small ceo-text-muted">邮箱账号</label>
                        <input type="email" id="email" name="email" value="<?php echo get_userdata(get_current_user_id())->user_email; ?>" placeholder="请输入您的email地址..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
                    </div>
                    <div class="ceo-margin-bottom ceo-user-is">
                        <label for="shouji" class="rl-label ceo-text-small ceo-text-muted">手机号码</label>
                        <input type="text" id="shouji" name="shouji" value="<?php echo get_user_meta( $user_id , 'shouji' , true ); ?>" placeholder="请输入您的手机号码..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
                    </div>
                </div>
    
                <div class="ceo-margin-bottom ceo-user-is">
                    <label for="weibo" class="rl-label ceo-text-small ceo-text-muted">微博地址</label>
                    <input type="text" id="weibo" name="weibo" value="<?php echo get_user_meta( $user_id , 'weibo' , true ); ?>" placeholder="请输入您的微博地址..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
                </div>
                
                <div class="ceo-user-id">
        			<div class="ceo-user-is ceo-margin-bottom">
        				<label for="userbg" class="rl-label ceo-text-small ceo-text-muted">用户模块背景图</label>
                        <br>
                        <div class="ceo-grid-small" ceo-grid>
                            <div class="ceo-width-expand">
            				    <input type="text" id="userbg" name="userbg" value="<?php echo get_user_meta( $user_id , 'userbg' , true ); ?>" placeholder="请上传您的用户模块背景图片" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
            				</div>
                            <div class="ceo-width-auto">
                                <button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small upload-userbg-button" type="button" style="margin-top: 5px;">上传图片</button>
                            </div>
                        </div>
                        <input type="file" name="upload-userbg" accept="image/gif,image/jpg,image/jpeg,image/png" id="upload-userbg" class="dn" style="display: none">
                    </div>
                    <div class="ceo-user-is ceo-margin-bottom">
        				<label for="userhomebg" class="rl-label ceo-text-small ceo-text-muted">个人主页背景图</label>
                        <br>
                        <div class="ceo-grid-small" ceo-grid>
                            <div class="ceo-width-expand">
            				    <input type="text" id="userhomebg" name="userhomebg" value="<?php echo get_user_meta( $user_id , 'userhomebg' , true ); ?>" placeholder="请上传您的个人主页背景图片" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
            				</div>
                            <div class="ceo-width-auto">
                                <button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small upload-userhomebg-button" type="button" style="margin-top: 5px;">上传图片</button>
                            </div>
                        </div>
                        <input type="file" name="upload-userhomebg" accept="image/gif,image/jpg,image/jpeg,image/png" id="upload-userhomebg" class="dn" style="display: none">
                    </div>
                </div>
                <div class="ceo-user-id">
					<div class="ceo-user-is ceo-margin-bottom">
						<label for="buyer_name" class="ceo-text-small ceo-text-muted">收货人姓名</label>
						<input type="text" id="buyer_name" name="buyer_name" value="<?php echo get_the_author_meta('buyer_name', $user_id); ?>" placeholder="请输入您的收货人姓名..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
					</div>
					<div class="ceo-user-is ceo-margin-bottom">
						<label for="buyer_mobile" class="ceo-text-small ceo-text-muted">收货人电话</label>
						<input type="text" id="buyer_mobile" name="buyer_mobile" value="<?php echo get_user_meta($user_id, 'buyer_mobile', true); ?>" placeholder="请输入您的收货人电话..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
					</div>
					<div class="ceo-user-is ceo-margin-bottom" style="flex: auto; max-width: 100%">
						<label for="buyer_address" class="ceo-text-small ceo-text-muted">收货地址</label>
						<input type="text" id="buyer_address" name="buyer_address" value="<?php echo get_user_meta($user_id, 'buyer_address', true); ?>" placeholder="请输入您的收货人地址..." class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small">
					</div>
				</div>
                
    			<input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'upload_data' ); ?>">
    			<input type="hidden" name="action" value="updata_accounts">
    			<button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small" type="submit">保存设置</button>
    		</form>
    		<?php get_template_part( 'user/user', 'js' ); ?>
    	</div>
    </div>
</div>