<?php
/* Template Name: 找回密码 */

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'lostpassword';

if ( isset($_REQUEST['key']) )
	$action = 'resetpass';

if ( !in_array( $action, array( 'lostpassword', 'resetpass', 'success' ), true ) )
	$action = 'lostpassword';


$classactive1 = '';
$classactive2 = '';
$classactive3 = '';


switch ($action) {
case 'lostpassword' :
	$errors = new WP_Error();

	if ( $http_post ) {
		$errors = retrieve_password2();
	}

	if ( isset( $_REQUEST['error'] ) ) {
		if ( 'invalidkey' == $_REQUEST['error'] )
			$errors->add( 'invalidkey', __( '抱歉，该密码似乎无效。' ) );
		elseif ( 'expiredkey' == $_REQUEST['error'] )
			$errors->add( 'expiredkey', __( '抱歉，密码过期了，请再试一次。' ) );
	}

	$classactive1 = ' class="xz"';

	break;

case 'resetpass' :
	$user = check_password_reset_key($_REQUEST['key'], $_REQUEST['login']);

	if ( is_wp_error($user) ) {
		if ( $user->get_error_code() === 'expired_key' ){
			wp_redirect( get_user_rp_by_path() . '?action=lostpassword&error=expiredkey' );
		}
		else{
			wp_redirect( get_user_rp_by_path() . '?action=lostpassword&error=invalidkey' );
		}
		exit;
	}

	$errors = new WP_Error();

	if ( isset($_POST['pass1']) && $_POST['pass1'] != $_POST['pass2'] )
		$errors->add( 'password_reset_mismatch', __( 'The passwords do not match.' ) );

	if( strlen($_POST['pass1'])<6 ) {
		$errors->add( 'password_reset_mismatch2', '密码至少6位。' );
    }

	/**
	 * 在验证密码重置过程之前触发。
	 **/
	do_action( 'validate_password_reset', $errors, $user );

	if ( ( ! $errors->get_error_code() ) && isset( $_POST['pass1'] ) && !empty( $_POST['pass1'] ) ) {
		reset_password($user, $_POST['pass1']);
		wp_redirect( get_user_rp_by_path() . '?action=success' );
		exit;
	}
	$classactive2 = ' class="xz"';
	break;
case 'success' :
	$classactive3 = ' class="xz"';
	break;
}

get_header();
?>
<?php if ( _ceo('ceo_retrieve_password') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('password_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('password_title'); ?>
	</div>
</section>
<?php endif; ?>
<?php if(_ceo('ceo_bolang') == true ): ?>
<div class="ceo-meihua-boo">
	<svg class="ceo-meihua-boo-waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
		<defs>
			<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
		</defs>
		<g class="ceo-meihua-boo-parallax">
			<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
			<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
			<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
			<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
		</g>
	</svg>
</div>
<?php endif; ?>

<section class="ceo-container">
	<div class="ceo-resetpass ceo-background-default">
		<ul class="ceo-resetpasssteps">
			<li<?php echo $classactive1 ?>>获取找回邮件</li>
			<li<?php echo $classactive2 ?>>设置新的密码</li>
			<li<?php echo $classactive3 ?>>成功修改密码</li>
		</ul>

		<?php
		if( $classactive1 ){
			if( $errors !== true ){
		?>
		<form action="<?php echo esc_url( get_user_rp_by_path() . '?action=lostpassword' ); ?>" method="post" class="ceo-form">
			<?php errormsg($errors); ?>
			<h3>填写用户名或邮箱：</h3>
			<p><input type="text" name="user_login" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" placeholder="用户名或邮箱" autofocus></p>
			<p><input type="submit" value="获取密码重置邮件" class="btns ceo-input b-r-4"></p>
		</form>
		
		<?php
			}else{
			    echo '<div class="text">';
			    echo '<i class="ceofont ceoicon-checkbox-circle-fill"></i>';
				echo '<span>已向注册邮箱发送邮件！</span>';
				echo '<p>前往邮箱查收邮件并点击重置密码链接</p>';
				echo '</div>';
			}
		} ?>

		<?php if( $classactive2 ){ ?>
		<form action="" method="post" class="ceo-form">
			<?php errormsg($errors); ?>
			<h3>设置新密码：</h3>
			<p><input type="password" name="pass1" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" placeholder="输入新密码" autofocus></p>
			<h5>重复新密码：</h5>
			<p><input type="password" name="pass2" class="b-r-4 ceo-input ceo-margin-small-top ceo-text-small" placeholder="重复新密码"></p>
			<p><input type="submit" value="确认提交" class="btns ceo-input b-r-4"></p>
		</form>
		<?php } ?>

		<?php if( $classactive3 ){ ?>
	    <div class="netext text">
			<i class="ceofont ceoicon-checkbox-circle-fill"></i>
			<span>恭喜，您的密码已重置！</span>
		</div>
		<?php } ?>
	</div>
</section>
<?php
function errormsg($wp_error='') {
	if ( empty($wp_error) )
		$wp_error = new WP_Error();

	if ( $wp_error->get_error_code() ) {
		$errors = '';
		$messages = '';
		foreach ( $wp_error->get_error_codes() as $code ) {
			$severity = $wp_error->get_error_data($code);
			foreach ( $wp_error->get_error_messages($code) as $error ) {
				if ( 'message' == $severity )
					$messages .= '	' . $error . "<br />\n";
				else
					$errors .= '	' . $error . "<br />\n";
			}
		}
		if ( ! empty( $errors ) ) {
			//过滤登录表单上方显示的错误消息。
			echo '<p class="errtip">' . apply_filters( 'login_errors', $errors ) . "</p>\n";
		}
		if ( ! empty( $messages ) ) {
			//过滤登录表单上方显示的说明消息
			echo '<p class="errtip">' . apply_filters( 'login_messages', $messages ) . "</p>\n";
		}
	}
}
?>

<?php get_footer(); ?>