<?php
$bloginfo = get_bloginfo('url');
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send') {
global $wpdb;

$current_url = $bloginfo.'/site';

$last_post = $wpdb->get_var("SELECT `post_date` FROM `$wpdb->posts` ORDER BY `post_date` DESC LIMIT 1");
$title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
$url = isset( $_POST['tougao_url'] ) ? $_POST['tougao_url'] : '';
$description =  isset( $_POST['tougao_description'] ) ? trim(htmlspecialchars($_POST['tougao_description'], ENT_QUOTES)) : '';
$liebie =  isset( $_POST['tougao_leibie'] ) ? trim(htmlspecialchars($_POST['tougao_leibie'], ENT_QUOTES)) : '';
$icon = isset( $_POST['tougao_icon'] ) ? $_POST['tougao_icon'] : '';

?>

<?php if ( empty($title) || mb_strlen($title) < 1 ) { ?>

<script>alert("网站名称不能为空！");</script>
<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

<?php die; } ?>

<?php if ( empty($url) || mb_strlen($url) < 1 ) { ?>

<script>alert("网址不能为空！");</script>
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

<script>alert("网站LOGO不能为空！");</script>
<meta http-equiv="refresh" content="0;url=<?php $bloginfo ?>">

<?php die; } ?>


<?php

$post_content = '网站名称: '.$title.'<br />网站地址: '.$url.'<br />网站类别: '.$liebie.'<br />网站描述: '.$description.'<br />网站图标:'.$icon;
$tougao = array(
	'post_title' => $title,
	'post_content' => $post_content,
	'post_status' => 'pending',
	'post_type' => 'site'
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

<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>网站收录</h2>
    </div>
    <div class="user-set user-box">
		<form class="ceo-form" method="post" id="sitesubmit-form" action="<?php echo $_SERVER["REQUEST_URI"]; $current_user = wp_get_current_user(); ?>">
		    <div class="ceo-user-id">
		        <div class="ceo-user-is ceo-margin-bottom">
		            <label for="nickname" class="rl-label user-text-small ceo-text-muted">网站名称</label>
        			<input type="text" id="tougao_title" value="" name="tougao_title" placeholder="网站名称" class="b-r-4 ceo-input ceo-text-small ceo-margin-small-top user-text-small"/>
    			</div>
    			<div class="ceo-user-is ceo-margin-bottom">
    			    <label for="nickname" class="rl-label user-text-small ceo-text-muted">网站地址</label>
        			<input type="text" id="tougao_url" value="" name="tougao_url" placeholder="网站地址" class="b-r-4 ceo-input ceo-text-small ceo-margin-small-top user-text-small"/>
    			</div>
			</div>
			<div class="ceo-margin-bottom">
    			<label for="nickname" class="rl-label user-text-small ceo-text-muted">网站类别</label>
    			<input type="text" id="tougao_leibie" value="" name="tougao_leibie" placeholder="网站类别（请填写贵网站类别）" class="b-r-4 ceo-input ceo-text-small ceo-margin-small-top user-text-small"/>
			</div>
			<div class="ceo-margin-bottom">
    			<label for="nickname" class="rl-label user-text-small ceo-text-muted">网站描述</label>
    			<input type="text" id="tougao_description" name="tougao_description" placeholder="网站描述" class="b-r-4 ceo-input ceo-text-small ceo-margin-small-top user-text-small">
			</div>
			<div class="ceo-margin-bottom">
    			<label for="nickname" class="rl-label user-text-small ceo-text-muted">网站LOGO</label>
    			<input type="text" id="tougao_icon" value="" name="tougao_icon" placeholder="网站LOGO" class="b-r-4 ceo-input ceo-text-small ceo-margin-small-top user-text-small"/>
			</div>
			<div class="ceo-margin-top ceo-margin-bottom sitesubmit-p">
				<input type="hidden" value="send" name="tougao_form" />
				<button class="user-user-submit change-color b-r-4 ceo-button ceo-button-small ceo-user-btn" type="submit" id="sitesubmit-tj" value="提交" style="transform: translateY(0%);">提交网站</button>
				<button class="b-a b-r-4 button button-primary ceo-button" type="reset" value="重填" style="margin-left: 10px;font-size: 14px;">清空</button>
				<p><i class="ceofont ceoicon-information-line"></i>认真填写内容我们会为您加快审核~</p>
			</div>
		</form>
		<div class="sitesubmit-dosc">
		    <?php echo _ceo('ceo_author_cd8x'); ?>
	    </div>
	</div>
</div>
<script>
    $(function () {
        $("#sitesubmit-tj").on("click",function () {
            if(true){
                var tougao_url = $("#tougao_url").val()

                var han = /^[\u4e00-\u9fa5]+$/;
                if (tougao_url == '') {
                    alert("请输入网站地址");
                    return false;
                };
                if (han.test(tougao_url)) {
                    alert("网站地址不能包含中文")
                    return false;
                };
            }

            $("#sitesubmit-form").submit()
        })
    })
</script>