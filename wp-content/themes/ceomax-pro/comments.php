<?php if(post_password_required()) return;?>

<?php
if (_ceo('verify_comment_new') == true && _ceo('verify_comment_new_type') == '1') {
    echo tencent_captcha_load();
    $js = <<<EOF
<script>
$(function() {
    $('.post-comment').submit(function (e) {
        e.preventDefault()
        let self = this
        TcaptchaHandler(function (TcaptchaRes) {
            $('#tCaptchaRandstr').val(TcaptchaRes.randstr);
            $('#tCaptchaTicket').val(TcaptchaRes.ticket);
            if (TcaptchaRes.ret == 0) {
                self.submit()
            }
        });
        return false
    })
});
</script>
EOF;
    echo $js;
}
if (_ceo('verify_comment_new') == true && _ceo('verify_comment_new_type') == '2') {
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
    <script>
        $(function() {
            $('.post-comment').submit(function (e) {
                e.preventDefault()
                let self = this
                window.vaptcha_obj.then(function (VAPTCHAObj) {
                    // 将VAPTCHA验证实例保存到局部变量中
                    obj = VAPTCHAObj;

                    // 渲染验证组件
                    VAPTCHAObj.render();

                    // 验证成功进行后续操作
                    VAPTCHAObj.listen('pass', function () {
                        serverToken = VAPTCHAObj.getServerToken();
                        var data = {
                            server: serverToken.server,
                            token: serverToken.token,
                        }
                        window.vaptcha_pass=true
                        console.log(data)
                        // 账号或密码错误等原因导致登录失败，重置人机验证
                        // VAPTCHAObj.reset()

                        self.submit()
                    })
                })
                obj.validate();
                return false
            })
        });
    </script>
    <?php
}

?>

<div id="comments" class="comments b-a b-r-6 ceo-background-default ceo-margin-bottom">
	<div class="comments-title module-title b-b ceo-flex ceo-flex-middle">
		<span class="ceo-flex-1 ceo-position-relative"><i class="ceofont ceoicon-discuss-line"></i> 发表评论</span>
		<div class="">
			<?php comments_number('<small class="ceo-text-small ceo-text-muted">暂无评论</small>', '<small class="ceo-text-small ceo-text-muted"><strong class="ceo-text-warning">1</strong> 条评论</small>', '<small class="ceo-text-small ceo-text-muted"><strong class="ceo-text-warning">%</strong> 条评论</small>' );?>
		</div>
	</div>
	<div class="comment-list">
		<div id="respond" class="ceo-flex comment-from">
			<div class="avatar ceo-margin-right">
				<?php
				if( is_user_logged_in() ){
					$user_id = get_current_user_id();
					$current_user = wp_get_current_user();
				?>
				<?php echo get_avatar( $user_id,46 );?>
				<?php }else{?>
				<?php echo get_avatar( $comment,46 );?>
				<?php }?>
			</div>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="ceo-form ceo-width-1-1 post-comment">
				<?php if( is_user_logged_in() ){?>
				<input id="tCaptchaRandstr" name="randstr" type="hidden" value="">
                <input id="tCaptchaTicket" name="ticket" type="hidden" value="">
				<textarea name="comment" id="comment" rows="3" class="b-r-4 ceo-textarea ceo-width-1-1 ceo-text-small ceo-margin-bottom" placeholder="Hi，<?php echo $current_user->display_name; ?>，请输入您的评论内容..."></textarea>
				<div class="comt-tips"><?php comment_id_fields(); do_action('comment_form', $post->ID); ?></div>
				<button class="ceo-button change-color btn b-r-4">发表评论</button>
				<?php }else{?>
				<textarea name="comment" id="comment" rows="3" class="b-r-4 ceo-textarea ceo-width-1-1 ceo-text-small ceo-margin-bottom" readonly="readonly" placeholder="请登录后发布评论..." disabled></textarea>
				<a href="#modal-login" class="ceo-button change-color btn b-r-4" ceo-toggle>登录后评论</a>
				<?php }?>
			</form>
		</div>

		<?php if(have_comments()){ ?>
		<?php wp_list_comments('type=comment&callback=xintheme_theme_list_comments'); ?>

		<?php if( get_comment_pages_count() > 1 ){?>
		<!-- 评论翻页 -->
		<div class="pager primary">
			<?php the_comments_pagination(['prev_text'=>'<i class="ceofont ceoicon-arrow-left-s-line"></i>', 'next_text'=>'<i class="ceofont ceoicon-arrow-right-s-line"></i>']); ?>
		</div>
		<?php } ?>
		<?php } ?>
		<!-- 评论已关闭 -->
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' ); ?></p>
		<?php } ?>
	</div>
</div>