<?php
/* Template Name: 网址提交 */
get_header();
$bloginfo = get_bloginfo('url');
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send') {
	global $wpdb;

	$current_url = $bloginfo.'/site';   // 注意修改此处的链接地址

	$last_post = $wpdb->get_var("SELECT `post_date` FROM `$wpdb->posts` ORDER BY `post_date` DESC LIMIT 1");


	// 表单变量初始化
	$title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
	$url = isset( $_POST['tougao_url'] ) ? $_POST['tougao_url'] : '';
	$description =  isset( $_POST['tougao_description'] ) ? trim(htmlspecialchars($_POST['tougao_description'], ENT_QUOTES)) : '';
	$liebie =  isset( $_POST['tougao_leibie'] ) ? trim(htmlspecialchars($_POST['tougao_leibie'], ENT_QUOTES)) : '';
	$icon = isset( $_POST['tougao_icon'] ) ? $_POST['tougao_icon'] : '';

	?>

	<?php if ( empty($title) || mb_strlen($title) < 1 ) { ?>

	<script>alert("网站标题不能为空！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

    <?php die; } ?>

    <?php if ( empty($url) || mb_strlen($url) < 1 ) { ?>

	<script>alert("网站地址不能为空！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

    <?php die; } ?>

    <?php
    if ( empty($liebie) ) {

        ?>

	<script>alert("网站类别不能为空！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

    <?php die; } ?>

    <?php if ( empty($description) || mb_strlen($description) < 5 ) { ?>

	<script>alert("网站描述不能为空，且不得少于5个字！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

    <?php die; } ?>

    <?php if ( empty($icon) || mb_strlen($icon) < 1 ) { ?>

	<script>alert("网站icon图标不能为空！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

    <?php die; } ?>


	<?php

	$post_content = '网站标题: '.$title.'<br />网站地址: '.$url.'<br />网站类别: '.$liebie.'<br />网站描述: '.$description.'<br />网站icon图标:'.$icon;
	$tougao = array(
		'post_title' => $title,
		'post_content' => $post_content,
		'post_status' => 'pending',
		'post_type' => 'site' //tougao_type是要保存到的自定义文章类型
	);


	// 将文章插入数据库
	$status = wp_insert_post( $tougao );

	if ($status != 0) { ?>
	<script>alert("发布成功！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">
	<?php } else { ?>
	<script>alert("发布失败，请重新填写！");</script>
	<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">
	<?php } } ?>

<?php if ( _ceo('ceo_sitesubmit') == true): ?>
<section class="ceo-page-bg ceo-inline ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category">

    <img src="<?php if(_ceo('ceo_sitesubmit_sz'))echo _ceo('ceo_sitesubmit_sz')['sitesubmit_bg']; ?>">

	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php if(_ceo('ceo_sitesubmit_sz'))echo _ceo('ceo_sitesubmit_sz')['sitesubmit_title']; ?>
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

<main class="main ceo-margin-top-20">
	<section class="ceo-container ceo-margin-large-bottom">
		<div class="ceo-container ceo-margin-large-bottom">
			<div class="ceo-sitebmit" ceo-grid>
				<div class="ceo-width-1-2">
				    <h3><i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceo_sitesubmit_bt_sz'))echo _ceo('ceo_sitesubmit_bt_sz')['sitesubmit_a_title']; ?></h3>
				    <p><?php if(_ceo('ceo_sitesubmit_bt_sz'))echo _ceo('ceo_sitesubmit_bt_sz')['sitesubmit_b_title']; ?></p>
					<form class="ceo-form" method="post" id="sitesubmit-form" action="<?php echo $_SERVER["REQUEST_URI"]; $current_user = wp_get_current_user(); ?>">
						<input type="text" id="tougao_title" value="" name="tougao_title" placeholder="网站标题" class="b-r-4 ceo-text-small ceo-input ceo-form-width-medium ceo-margin-small-bottom" />
						<input type="text" id="tougao_url" value="" name="tougao_url" placeholder="网站地址" class="b-r-4 ceo-text-small ceo-input ceo-form-width-medium ceo-margin-small-bottom"/>
						<input type="text" id="tougao_leibie" value="" name="tougao_leibie" placeholder="网站类别（请填写贵站类别）" class="b-r-4 ceo-text-small ceo-input ceo-margin-small-bottom ceo-display-block"/>
						<input type="text" id="tougao_description" name="tougao_description" placeholder="网站描述" class="b-r-4 ceo-text-small ceo-input ceo-margin-small-bottom">
						<input type="text" id="tougao_icon" value="" name="tougao_icon" placeholder="网站icon图标" class="b-r-4 ceo-text-small ceo-input ceo-margin-small-bottom"/>
						<div class="ceo-margin-top  ceo-margin-bottom">
							<input type="hidden" value="send" name="tougao_form" />
							<button class="b-r-4 change-color ceo-button ceo-light ceo-margin-small-right" type="submit" id="sitesubmit-tj" value="提交" >提交申请</button>
							<button class="b-a b-r-4 button button-primary ceo-button ceo-text-muted" type="reset" value="重填" >清空</button>
						</div>
					</form>
				</div>
				<div class="single-content ceo-width-1-2">
				    <article class="ceo-sitebmit-text">

                        <p class="mt20"><?php echo _ceo('sitesubmit_c_title'); ?></p>

                        <p class="mt20"><strong><?php if(_ceo('sitesubmit_b'))echo _ceo('sitesubmit_b')['sitesubmit_b_a1']; ?></strong></p>

                        <?php if(_ceo('sitesubmit_b'))echo _ceo('sitesubmit_b')['sitesubmit_b_a2']; ?>

                        <p class="mt20"><strong><?php if(_ceo('sitesubmit_b'))echo _ceo('sitesubmit_b')['sitesubmit_b_a3']; ?></strong></p>

                        <?php if(_ceo('sitesubmit_b'))echo _ceo('sitesubmit_b')['sitesubmit_b_a4']; ?>
                    </article>
				</div>
			</div>
		</div>
	</section>
</main>
<style>
    @media screen and (max-width: 800px) {
        .ceo-width-1-2{
            width: 100%;
        }
    }
</style>
<script>
    $(function () {
        $("#sitesubmit-tj").on("click",function () {
            if(true){
                var tougao_url = $("#tougao_url").val()

                var han = /^[\u4e00-\u9fa5]+$/;
                if (tougao_url == '') {
                    alert("请输入网址");
                    return false;
                };
                if (han.test(tougao_url)) {
                    alert("网址不能包含中文")
                    return false;
                };
            }

            $("#sitesubmit-form").submit()
        })
    })
</script>
<?php get_footer(); ?>