<?php
global $current_user;
$wp_create_nonce = wp_create_nonce('caoclick-' . $current_user->ID);
pure_highlightjs_assets_add();
?>
<style type="text/css"></style>
<div class="feedback ceo-background-default">
    <form>
    <?php  if(true) : ?>
        <div class="form-box">
            <div>
                <div class="feedback-title">
                    <div class="feedback-mwz">
                    <li class="feedback-cur">创建工单</li>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <label class="form-title">工单标题：</label>
                        <input type="text" class="form-control" name="post_title" placeholder="请输入标题" value="" aria-required='true' required>
                    </div>
                </div>
                <?php $categories = get_categories( array('hide_empty' => 0,'taxonomy'=>'feedback-cat') );?>
                <div>
                    <div class="form-group">
                        <label class="form-title">工单分类：</label>
                        <div class="select--box">
                            <select class="fdropdown" name="post_cat">
                                <?php foreach($categories as $category){ ?>
                                <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div>
                <div>
                    <h4 class="form-title">工单内容：</h4>
                </div>
                <div>
                    <?php
                        wp_editor('','editor2',array(
                            'quicktags' => false
                        ));
                    ?>
                </div>

            </div>
        </div>
        <a href="#" class="profile-btn btn-add_feedback btn btn--primary" data-status="pending" data-nonce="<?php echo $wp_create_nonce; ?>">提交工单</a>
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

        $('.btn-add_feedback').on('click', function(event){
            event.preventDefault()
            var _this = $(this)
            var deft = _this.html()

            var feedback_title = $("input[name='post_title']").val();
            var feedback_cat = $("select[name='post_cat']").val();
            var feedback_content = tinyMCE.get('editor2').getContent();

            if (feedback_title.length < 6) {
                _this.html(deft)
                UIkit.notification('工单标题最低6个字符', { status: 'warning' });
                return false;
            }

            $.post(zongcai.ajaxurl,
                {
                    feedback_title: feedback_title,
                    feedback_cat: feedback_cat,
                    feedback_content: feedback_content,
                    nonce: "<?php echo wp_create_nonce('feedback') ?>",
                    action: 'add_feedback'
                },
                function (data) {
                    if (data.status == 1) {
                        _this.html(deft)
                        UIkit.notification(data.msg, { status: 'success' })
                        window.location.href = '/member/feedback'
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
.form-group label{
    font-weight: 400;
    font-size: 15px;
    color: #666;
    margin-bottom: 12px;
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
input[type="text"]{
    border: 0;
    border-radius: 0;
    font-family: Lato,sans-serif;
    line-height: 36px;
    margin-top: 12px;
    margin-bottom: 20px;
    padding: 0;
    transition: border-color cubic-bezier(0.77,0,0.175,1);
    width: 100%;
    border: 1px solid #f1f1f1;
}
select{
    font-family: 'Poppins',sans-serif;
    background-color: #f8f8f8;
    border: 1px solid #eeeeee;
    font-size: 14px;
    color: #aaaaaa;
    line-height: 42px;
    margin-bottom: 0;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    padding: 0 18px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.fdropdown {
    position: relative;
    width: 100%;
    border: 1px solid #ccc;
    cursor: pointer;
    background: #fff;
    margin-top: 12px;
    border-radius: 3px;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    margin-bottom: 20px;
    font-size: 14px;
    color: #aaaaaa;
    height: 36px;
    line-height: 36px;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    padding: 0 18px;
}
.form-title{
    font-weight: 400;
    font-size: 16px;
    color: #666;
    margin-bottom: 12px;
}
.night .feedback .mwz {
    background: #151617;
    border-bottom: #111111 1px solid;
}
.night .fdropdown {
    border: 1px solid #111;
    background: #111;
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
}
</style>