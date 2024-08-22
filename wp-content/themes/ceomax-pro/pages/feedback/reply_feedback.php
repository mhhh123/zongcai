<?php
global $current_user;
$wp_create_nonce = wp_create_nonce('caoclick-' . $current_user->ID);

if (empty($_GET['post_id'])) {
    echo "<h1>出错: ID为空</h1>";
    return ;
}

$post_id = $_GET['post_id'];

$post_get = $post = get_post($post_id);
if (empty($post) || $post->post_author != get_current_user_id()) {
    echo '<h1>无法回复</h1>';

    return;
}
setup_postdata($post);
?>
<style type="text/css"></style>
<div class="feedback ceo-background-default">
    <form>
    <?php  if(true) : ?>
        <div>
            <div class="feedback-title">
                <div class="feedback-mwz">
                    <li class="feedback-cur">工单信息</li>
                </div>
            </div>
            <div class="feedback-btx">
                <div>
                    <h4 class="form-title">工单标题：</h4>
                </div>
                <div>
                    <div class="form-group">
                        <span><?php the_title(); ?></span>
                        <br>
                    </div>
                </div>
            </div>
            <div class="feedback-btx">
                <div>
                    <h4 class="form-title">工单内容：</h4>
                </div>
                <div>
                    <div id="editor22" class="form-group">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-box">

            <div id="comments" class="comments-area">
                <div>
                    <h4 class="form-title">工单回复：</h4>
                </div>
                <?php
                $comments = get_comments(array("post_id" => $post_id,'order'=>'asc'));
                if($comments){
                    foreach ($comments as $v){
                        ?>
                        <div class="row" style="height: 100px;">
                            <div style="width: 100%">
                                <div class="form-group">
                                    <div style="float: left"><span class="avatar-img"><?php echo get_avatar($v->user_id,26).'  '.$v->comment_author; ?>:</span>
                                        <br>
                                        <br>
                                        <?php echo $v->comment_content; ?>
                                    </div>
                                    <div style="float: right"><?php echo $v->comment_date; ?></div>
                                </div>
                            </div>
                        </div>
                <?php } } ?>
            </div>

            <div class="">
                <div class="">
                    <h4 class="form-title">回复*</h4>
                </div>
                <div class="">
                    <?php
                        wp_editor('','editor2',array(
                            'quicktags' => false
                        ));
                    ?>
                </div>

            </div>
        </div>
        <a href="#" class="ceo-display-inline-block profile-btn btn-reply_feedback btn btn--primary" data-nonce="<?php echo $wp_create_nonce; ?>" style="margin-top: 20px;">回复</a>
    <?php else: ?>
        <div class="form-box">
            <div class="col-12 _404">
                <div class="_404-inner">
                    <div class="entry-content">您没有发布权限，请联系管理员开通！</div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </form>
</div>

<script>
    <?php
if(false){
    echo '<script>
    (function($) {
        $.fn.pasteImageReader = function() {

        }
    }(jQuery));
</script>';

}
// General libraries.
require_once ABSPATH .  '/wp-admin/includes/plugin.php';
if(is_plugin_active('imgspider/index.php')){
    if(defined('WB_CORE_ASSETS_LOAD') && class_exists('WB_Core_Asset_Load')){
        WB_Core_Asset_Load::load('post-01');
    }else{
        wp_enqueue_style('wbp-admin-style-imgspy',IMGSPY_URI.'assets/wbp_admin_imgspy.css', array(), IMGSPY_VERSION);
    }

    wp_register_script( 'wbs-imgspy-inline-js', false, null, false );
    wp_enqueue_script( 'wbs-imgspy-inline-js' );

    $ajax_nonce = wp_create_nonce('wp_ajax_wb_imgspider');
    $imgspider_ver = get_option('wb_imgspider_ver',0);
    $config_url = admin_url('403.php');

    wp_add_inline_script('wbs-imgspy-inline-js','var imgspy_cnf='.json_encode(WB_IMGSPY_Conf::opt()).',wb_ajaxurl=\''.admin_url('admin-ajax.php').'\',imgspider_ver='.$imgspider_ver.',_wb_imgspider_ajax_nonce=\''.$ajax_nonce.'\',imgspider_pro_url=\''.$config_url.'\';','before');
}

?>
</script>

<script>
    $(function () {


//发布任务 go-task_write_post write_post

        $('.btn-reply_feedback').on('click', function(event){
            event.preventDefault()
            var _this = $(this)
            var deft = _this.html()
            var feedback_content = tinyMCE.get('editor2').getContent();

            $.post(zongcai.ajaxurl,
                {
                    post_id: <?php echo $post_id; ?>,
                    feedback_content: feedback_content,
                    nonce: "<?php echo wp_create_nonce('feedback') ?>",
                    action: 'reply_feedback'
                },
                function (data) {
                    if (data.status == 1) {
                        _this.html(deft)
                        UIkit.notification(data.msg, { status: 'success' })
                        location.reload()
                    }else{
                        _this.html(deft)
                        UIkit.notification(data.msg, { status: 'warning' });
                    }
                }
            );
        });
    })
</script>
<style>

.feedback{
    padding: 30px;
    border-radius: 4px;
    min-height: 814px;
}
.feedback-title{
    margin-bottom: 20px;
}
.feedback-mwz{
    display: block;
    width: 100%;
    border-bottom: #f8f8f8 1px solid;
    height: 45px;
    line-height: 31px;
}
.feedback-cur{
    display: inline-block;
    border-bottom: #036eff 2px solid;
    height: 43px;
    color: #036eff;
}
.feedback .mwz {
    display: block;
    width: 100%;
    background: #fff;
    border-bottom: #e5e5e5 1px solid;
    height: 45px;
    line-height: 45px;
}
.feedback .mwz li.cur {
    display: inline-block;
    color: #333;
    border-bottom: var(--primary-color) 1px solid;
    margin-bottom: -3px;
    height: 45px;
    color: var(--primary-color);
}
.avatar-img img{
    display: inline;
    border-radius: 50px;
    margin-top: -4px;
}
.form-group {
    margin-bottom: 15px;
    position: relative;
}
label {
    display: inline-block;
    margin-bottom: 5px;
    vertical-align: middle;
}
.comments-area {
    background-color: #fff;
    border-radius: 4px;
    padding: 30px 0px 30px 0px;
    margin-top: 0;
}
.form-title{
    margin-bottom: 10px;font-size: 17px;
}
.feedback-btx{
    border-bottom: 1px solid #f4f4f4;margin-bottom: 15px;
}
.form-group p{
    border-radius: 4px;
    color: #888;
    background: #f8f8f8;
    padding: 10px 10px;
    font-size: 14px;
}
.night .feedback-btx{
    border-bottom: 1px solid #191f28;
    margin-bottom: 15px;
}
.night .feedback .mwz {
    background: #151617;
    border-bottom: #111111 1px solid;
}
.night .comments-area {
    background-color: #151617;
}
.night .form-title {
    color: #999;
}
.night .feedback-mwz {
    border-bottom: #191f28 1px solid;
}
@media (max-width: 800px) {
    .feedback{
        font-size: 12px;
        padding: 0!important;
    }
    .form-title {
        font-size: 12px;
    }
    .form-group {
        font-size: 12px;
    }
}
</style>