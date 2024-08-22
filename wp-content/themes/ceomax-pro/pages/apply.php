<?php
/*
Template Name: 提交申请
*/
get_header(); 
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/static';?>/css/login.css">

<?php if ( _ceo('ceo_apply') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('apply_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('apply_title'); ?>
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

<div class="c-login">
    <form class="loginForm" id="custom_loginForm">
        <textarea class="ceo-width" type="text" name="username" class="userLogo" placeholder="申请内容" lay-verify="required|userName" /></textarea>

        <div class="ceo_apple_is">
            <i class="ceofont ceoicon-image-line"></i><input type="text" name="yfz1" id="yfz1" class="inputfile codeText " placeholder="请上传图片"/>
        <input type="button" class="codeBtn filebtn" data-id="fileyfz1" value="上传" />
        </div>
        <img style="display: none;width: 50%;max-height: 50%;margin-bottom: 29px;border-radius: 4px;" src="" class="previewyfz1">

        <input type="file" class="fileyfz" data-id="yfz1" id="fileyfz1" name="fileyfz1" placeholder="图片" />
        
        <input type="text" name="bankno" placeholder="请填写申请类型"  lay-verify="required"/>
        <input type="text" name="phone" class="userLogo" placeholder="请填写手机号码" lay-verify="phone" />
        <input type="text" name="hyid" placeholder="请填写会员ID" value="<?php echo esc_attr( $current_user->user_login ); ?>" disabled="" lay-verify="required"/>
        <input type="text" name="username" placeholder="请填写会员昵称" value="<?php echo $current_user->display_name; ?>" disabled=""  lay-verify="required"/>
        <input type="text" name="yzmcode" placeholder="请填写备注信息" />
        <div class="">
        <input type="button" value="提交申请" id="regBtn" />
        </div>
    </form>
</div>

g

<?php get_footer(); ?>