<?php
/*
Template Name: 投稿模板
*/
$post_id=$_GET['post'];
if (!empty($post_id)) {
    $post = get_post($post_id, OBJECT);
    if ($post->post_author != get_current_user_id()) {
        wp_die(
            '非法请求访问',
            '非法请求',
            array(
                'response'  => 0,
                'back_link' => true,
            )
        );
    }
}

ceo_tougao_admin();
pure_highlightjs_assets_add();
?>
<?php
wp_enqueue_style('tougaocss',get_template_directory_uri().'/static/css/tougao.css');
get_header();
wp_enqueue_script('tougaojs',get_template_directory_uri().'/static/js/tougao.js');


if (_ceo('verify_tougao_new') == true && _ceo('verify_tougao_new_type') == '1') {
    echo tencent_captcha_load();
    $js = <<<EOF
<script>
$(function() {
    $('.post-form').submit(function () {
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
if (_ceo('verify_tougao_new') == true && _ceo('verify_tougao_new_type') == '2') {
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
            $('.post-form').submit(function () {
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

<?php if ( _ceo('ceo_tougao') == true): ?>
<section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('tougao_bg'); ?>);">
	<div class="ceo-overlay-primary ceo-position-cover"></div>
	<div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
		<h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
		<?php echo _ceo('tougao_title'); ?>
	</div>
</section>
<style>
.wrap {
    margin-top: -50px;
}
@media (max-width: 1239px) {
    .wrap {
        margin-top:-30px
    }
}
</style>
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
<?php
//编辑
if ( ! empty($_GET['post']) && get_post($_GET['post'])) {
    global $post;
    $post_id=$_GET['post'];
    $post = get_post($post_id, OBJECT);
    setup_postdata($post);

    ?>
    <section class="ceo-container">

        <div id='wrap'>
            <div class="wrap container">
                <form method='post' class='post-form' id='j-form'>
                    <?php wp_nonce_field('update_post_tougao','update_post_tougao') ?>
                    <input type='hidden' name='ID' value>
                    <div class=post-form-main>
                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-title>标题</label></div>
                            <div class="pf-item-input col-sm-22"><input type='text' class=form-control maxlength=200 id=post-title name='post-title' placeholder=在此输入标题 value="<?php the_title(); ?>" autocomplete=off>
                            </div>
                        </div>
                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>摘要</label></div>
                            <div class="pf-item-input col-sm-22"><textarea id="post-excerpt" name="post-excerpt" class=form-control rows=3 placeholder=摘要可选填><?php echo get_the_excerpt();?></textarea></div>
                        </div>

                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>正文</label></div>
                            <div class="pf-item-input col-sm-22">
                                <div id=wp-post-content-wrap class="wp-core-ui wp-editor-wrap tmce-active">
                                    <?php
                                    wp_enqueue_media();
                                    wp_editor(get_the_content(),'post-content',array(
                                        'quicktags' => false
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>标签</label></div>
                            <div class="pf-item-input col-sm-22">
                                <?php
                                $tag_list = wp_get_post_tags($post_id);
                                if($tag_list){
                                    echo '<input id="postTags" type="hidden" value=\''.json_encode(array_column($tag_list,'name')).'\' />';
                                }
                                ?>
                                <ul id=tag-container></ul>
                                <p class=pf-notice>即文章关键词，使用回车换行键确定，可选填</p>
                            </div>
                        </div>

                        <div class="ceo-tougao-sx">
                            <div class="pf-item clearfix">
                                <div class="postmeta-class">
                                    <div class="inside">
                                        <div class="csf csf-metabox csf-theme-dark">
                                            <div class="csf-wrapper csf-show-all">
                                                <div class="csf-content">
                                                    <div class="csf-sections">
                                                        <div id="csf-section-ceo_post_info_1" class="csf-section csf-onload">
                                                            <div class="csf-field csf-field-text ceo-tougao-ys">
                                                                <div class="csf-title ceo-tougao-shux"><h4>演示</h4></div>
                                                                <div class="csf-fieldset ceo-tougao-yss">
                                                                    <input type="text" class="form-control" name="ceo_post_info[down_demourl]" value="<?php echo get_post_meta($post_id,'down_demourl',1); ?>" data-depend-id="down_demourl">
                                                                    <p class="csf-text-desc">填写演示地址（请以http://或https://开头）</p>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="csf-field csf-field-repeater ceo-tougao-ys">
                                                                <div class="csf-title ceo-tougao-shux"><h4>属性</h4></div>
                                                                <div class="csf-fieldset ceo-tougao-yss">
                                                                    <!--item end-->
                                                                    <div class="csf-repeater-wrapper csf-data-wrapper ui-sortable"
                                                                         data-unique-id="ceo_post_info"
                                                                         data-field-id="[down_info]" data-max="0" data-min="0">

                                                                    <?php
                                                                    $down_info = get_post_meta($post_id, 'down_info',
                                                                        1);
                                                                    foreach ($down_info as $k=>$v):
                                                                    ?>

                                                                    <div class="csf-repeater-item" style="">
                                                                        <div class="csf-repeater-content">
                                                                            <div class="csf-field csf-field-text">
                                                                                <div class="csf-title"><h4>标题</h4></div>
                                                                                <div class="csf-fieldset"><input class="input-title" type="text" name="ceo_post_info[down_info][<?php echo $k ?>][title]" value="<?php echo $v['title'] ?>" data-depend-id="title">
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                            <div class="csf-field csf-field-text">
                                                                                <div class="csf-title"><h4>描述内容</h4></div>
                                                                                <div class="csf-fieldset"><input class="input-desc" type="text" name="ceo_post_info[down_info][<?php echo $k ?>][desc]" value="<?php echo $v['desc'] ?>" data-depend-id="desc">
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="csf-repeater-helper">
                                                                            <div class="csf-repeater-helper-inner">
                                                                                <i class="csf-repeater-remove csf-confirm fa fa-times" data-confirm="确定要删除此项目吗？"></i></div>
                                                                        </div>
                                                                    </div>
                                                                    <?php endforeach;?>
                                                                    </div>


                                                                    <a href="javascript:void(0)"
                                                                       class="button button-primary csf-repeater-add"><i class="fa fa-plus-circle"></i></a>
                                                                    <p class="csf-text-desc">温馨提示：标题填写：评分，描述内容填写：1-5数字，即可显示★星星评分图标</p>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pf-item clearfix">
                                <div class="postmeta-class">
                                    <div id="csf-section-ceo_post_info_1" class="csf-section csf-onload" style="">
                                        <div class="csf-field csf-field-radio ceo-tougao-ysz">
                                            <div class="csf-title ceo-tougao-shux"><h4>标签</h4></div>
                                            <div class="csf-fieldset ceo-tougao-yss">
                                                <ul class="csf--inline-list">
                                                    <?php
                                                    $ceo_post_info = get_post_meta($post_id, 'ceo_post_info', 1);
                                                    $ceo_post_shang_tag = ! empty($ceo_post_info['ceo-shang-tag']) ? $ceo_post_info['ceo-shang-tag'] : '';
                                                    $ceo_post_info_tag = ! empty($ceo_post_info['ceo-tese-tag']) ? $ceo_post_info['ceo-tese-tag'] : '';
                                                    ?>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="buxuanze" data-depend-id="ceo-tese-tag" checked=""> 不选择</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="remen" data-depend-id="ceo-tese-tag" <?php if($ceo_post_info_tag=='remen')echo 'checked'; ?>>热门</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="dujia" data-depend-id="ceo-tese-tag" <?php if($ceo_post_info_tag=='dujia')echo 'checked'; ?>>独家</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="zuixin" data-depend-id="ceo-tese-tag" <?php if($ceo_post_info_tag=='zuixin')echo 'checked'; ?>>最新</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="tuijian" data-depend-id="ceo-tese-tag" <?php if($ceo_post_info_tag=='tuijian')echo 'checked'; ?>> 推荐</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="jingpin" data-depend-id="ceo-tese-tag" <?php if($ceo_post_info_tag=='jingpin')echo 'checked'; ?>> 精品</label></li>
                                                </ul>
                                                <p class="csf-text-desc">文章标题前显示特色标签</p></div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="csf-field csf-field-radio ceo-tougao-ysz">
                                            <div class="csf-title ceo-tougao-shux"><h4>商标</h4></div>
                                            <div class="csf-fieldset ceo-tougao-yss">
                                                <ul class="csf--inline-list">
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-shang-tag]" value="no_shang" data-depend-id="ceo-shang-tag" checked=""> 不显示</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-shang-tag]" value="yes_shang" data-depend-id="ceo-shang-tag" <?php if($ceo_post_shang_tag=='yes_shang')echo 'checked'; ?>>显示</label></li>
                                                </ul>
                                                <p class="csf-text-desc">文章标题前显示“商”图标</p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pf-item clearfix"></div>
                    </div>
                    <div class=post-form-sidebar>
                        <div class=pf-submit-wrap>
                            <input id="tCaptchaRandstr" name="randstr" type="hidden" value="">
                            <input id="tCaptchaTicket" name="ticket" type="hidden" value="">
                            <button type=submit class="tougao_btn btn-primary btn-block btn-lg pf-submit">提交发布</button>
                        </div>
                        <div class=pf-side-item>
                            <div class=pf-side-label><h3>缩略图</h3></div>
                            <div class=pf-side-input>
                                <?php if(get_post_thumbnail_id($post_id)): ?>
                                <div id="j-thumb-wrap" class="thumb-wrap"><?php echo get_the_post_thumbnail($post_id); ?><div class="thumb-remove j-thumb-remove">×</div></div>
                                <?php endif;?>
                                <div id=j-thumb-wrap class=thumb-wrap></div>
                                <a class="thumb-selector j-thumb" href=javascript:;>设置缩略图片</a>
                                <p class=pf-notice>文章缩略图会显示在文章列表，建议设置一下缩略图</p>
                            </div>
                            <input type=hidden name=_thumbnail_id id=_thumbnail_id value="<?php echo get_post_thumbnail_id($post_id);?>">
                        </div>
                        <div class=pf-side-item>
                            <div class=pf-side-label><h3>分类</h3></div>
                            <div class=pf-side-input>
                                <select multiple=multiple size=5 id=post-category name=post-category[] class=form-control>
                                    <?php ceo_tougao_cat(); ?>
                                </select>
                                <p class="pf-notice">小提示：按住键盘Ctrl键+鼠标左键可多选分类</p>
                            </div>
                        </div>
                        <?php if (_ceo('ceo_shop_submit_divide')) : ?>
                            <div class="pf-side-item ceo-tougao-pay">
                                <?php
                                $productSku = CeoShopCoreProduct::getInfo($post_id, get_current_user_id())[0];
                                $payShowFlag = isset($productSku['price']);
                                ?>
                                <div class="pf-side-label title">
                                    <h3>内容付费</h3>
                                    <?php if ($payShowFlag) : ?>
                                        <a id="ceo-tougao-switch" data-pay="0" class="btns">关闭</a>
                                    <?php else : ?>
                                        <a id="ceo-tougao-switch" data-pay="1" class="btns">开启</a>
                                    <?php endif; ?>
                                </div>
                                <div id="tougao-pay-show" style="<?php echo $payShowFlag ? '' : 'display:none' ?>" class=pf-side-input>
                                    <div id=j-thumb-wrap class=thumb-wrap></div>
                                    <div class="ceo-margin-small-bottom">
                                        <span class="pf-notice">价格</span>
                                        <input class="form-control" name="ceo-pay-price" value="<?php echo $productSku['price'] ?>" type="text" placeholder="请输入价格">
                                    </div>
                                    <div class="ceo-margin-small-bottom ceo-position-relative">
                                        <span class="pf-notice">下载地址</span>
                                        <?php if (_ceo('tougao_down_url_upload')): ?>
                                        <a id="ceo-tougao-upload" href="javascript:void(0)" class="upload">上传</a>
                                        <?php endif; ?>
                                        <input type="file" id="fileInput" style="display: none;">
                                        <input class="form-control" id="ceo-pay-url" name="ceo-pay-url" value="<?php echo $productSku['down'][0]['url'] ?>" type="text" placeholder="请输入下载地址">
                                    </div>
                                    <div class="ceo-margin-small-bottom">
                                        <span class="pf-notice">隐藏信息</span>
                                        <input class="form-control" name="ceo-pay-hide" value="<?php echo $productSku['down'][0]['hide'] ?>" type="text" placeholder="请输入隐藏信息">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <script>var postTags = [];</script>
        </div>
    </section>

<?php
    wp_reset_postdata();

    //添加
}else{
    ?>
    <section class="ceo-container">

        <div id='wrap'>
            <div class="wrap container">
                <form method='post' class='post-form' id='j-form'>
                    <?php wp_nonce_field('update_post_tougao','update_post_tougao') ?>
                    <input type='hidden' name='ID' value>
                    <div class=post-form-main>
                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-title>标题</label></div>
                            <div class="pf-item-input col-sm-22"><input type='text' class=form-control maxlength=200 id=post-title name='post-title' placeholder=在此输入标题 value="" autocomplete=off>
                            </div>
                        </div>
                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>摘要</label></div>
                            <div class="pf-item-input col-sm-22"><textarea id=post-excerpt name=post-excerpt class=form-control rows=3 placeholder=摘要可选填></textarea></div>
                        </div>

                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>正文</label></div>
                            <div class="pf-item-input col-sm-22">
                                <div id=wp-post-content-wrap class="wp-core-ui wp-editor-wrap tmce-active">
                                    <?php
                                    wp_enqueue_media();
                                    wp_editor('','post-content',array(
                                        'quicktags' => false
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="pf-item clearfix">
                            <div class="pf-item-label col-sm-2"><label for=post-content>标签</label></div>
                            <div class="pf-item-input col-sm-22">
                                <ul id=tag-container></ul>
                                <p class=pf-notice>即文章关键词，使用回车换行键确定，可选填</p>
                            </div>
                        </div>

                        <div class="ceo-tougao-sx">
                            <div class="pf-item clearfix">
                                <div class="postmeta-class">
                                    <div class="inside">
                                        <div class="csf csf-metabox csf-theme-dark">
                                            <div class="csf-wrapper csf-show-all">
                                                <div class="csf-content">
                                                    <div class="csf-sections">
                                                        <div id="csf-section-ceo_post_info_1" class="csf-section csf-onload">
                                                            <div class="csf-field csf-field-text ceo-tougao-ys">
                                                                <div class="csf-title ceo-tougao-shux"><h4>演示</h4></div>
                                                                <div class="csf-fieldset ceo-tougao-yss">
                                                                    <input type="text" class="form-control" name="ceo_post_info[down_demourl]" value="" data-depend-id="down_demourl">
                                                                    <p class="csf-text-desc">填写演示地址（请以http://或https://开头）</p>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="csf-field csf-field-repeater ceo-tougao-ys">
                                                                <div class="csf-title ceo-tougao-shux"><h4>属性</h4></div>
                                                                <div class="csf-fieldset ceo-tougao-yss">
                                                                    <!--item end-->
                                                                    <div class="csf-repeater-wrapper csf-data-wrapper ui-sortable" data-unique-id="ceo_post_info" data-field-id="[down_info]" data-max="0" data-min="0">
                                                                        <?php
                                                                        $down_info = _ceo('tougao_down_info_use');
                                                                        foreach ($down_info as $k=>$v):
                                                                            ?>

                                                                            <div class="csf-repeater-item" style="">
                                                                                <div class="csf-repeater-content">
                                                                                    <div class="csf-field csf-field-text">
                                                                                        <div class="csf-title"><h4>标题</h4></div>
                                                                                        <div class="csf-fieldset"><input class="input-title" type="text" name="ceo_post_info[down_info][<?php echo $k ?>][title]" value="<?php echo $v['title'] ?>" data-depend-id="title">
                                                                                        </div>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                    <div class="csf-field csf-field-text">
                                                                                        <div class="csf-title"><h4>描述内容</h4></div>
                                                                                        <div class="csf-fieldset"><input class="input-desc" type="text" name="ceo_post_info[down_info][<?php echo $k ?>][desc]" value="<?php echo $v['desc'] ?>" data-depend-id="desc">
                                                                                        </div>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="csf-repeater-helper">
                                                                                    <div class="csf-repeater-helper-inner">
                                                                                        <i class="csf-repeater-remove csf-confirm fa fa-times" data-confirm="确定要删除此项目吗？"></i></div>
                                                                                </div>
                                                                            </div>
                                                                        <?php endforeach;?>
                                                                    </div>
                                                                    <a href="javascript:void(0)" class="button button-primary csf-repeater-add"><i class="fa fa-plus-circle"></i></a>
                                                                    <p class="csf-text-desc">温馨提示：标题填写：评分，描述内容填写：1-5数字，即可显示★星星评分图标</p>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pf-item clearfix">
                                <div class="postmeta-class">
                                    <div id="csf-section-ceo_post_info_1" class="csf-section csf-onload" style="">
                                        <div class="csf-field csf-field-radio ceo-tougao-ysz">
                                            <div class="csf-title ceo-tougao-shux"><h4>标签</h4></div>
                                            <div class="csf-fieldset ceo-tougao-yss">
                                                <ul class="csf--inline-list">
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="buxuanze" data-depend-id="ceo-tese-tag" checked=""> 不选择</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="remen" data-depend-id="ceo-tese-tag"> 热门</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="dujia" data-depend-id="ceo-tese-tag"> 独家</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="zuixin" data-depend-id="ceo-tese-tag"> 最新</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="tuijian" data-depend-id="ceo-tese-tag"> 推荐</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-tese-tag]" value="jingpin" data-depend-id="ceo-tese-tag"> 精品</label></li>
                                                </ul>
                                                <p class="csf-text-desc">文章标题前显示特色标签</p></div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="csf-field csf-field-radio ceo-tougao-ysz">
                                            <div class="csf-title ceo-tougao-shux"><h4>商标</h4></div>
                                            <div class="csf-fieldset ceo-tougao-yss">
                                                <ul class="csf--inline-list">
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-shang-tag]" value="no_shang" data-depend-id="ceo-shang-tag" checked=""> 不显示</label></li>
                                                    <li><label><input type="radio" name="ceo_post_info[ceo-shang-tag]" value="yes_shang" data-depend-id="ceo-shang-tag"> 显示</label></li>
                                                </ul>
                                                <p class="csf-text-desc">文章标题前显示“商”图标</p></div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pf-item clearfix"></div>

                    </div>
                    <div class=post-form-sidebar>
                        <div class=pf-submit-wrap>
                            <input id="tCaptchaRandstr" name="randstr" type="hidden" value="">
                            <input id="tCaptchaTicket" name="ticket" type="hidden" value="">
                            <button type=submit class="tougao_btn btn-primary btn-block btn-lg pf-submit">提交发布</button>
                        </div>
                        <div class=pf-side-item>
                            <div class=pf-side-label><h3>缩略图</h3></div>
                            <div class=pf-side-input>
                                <div id=j-thumb-wrap class=thumb-wrap></div>
                                <a class="thumb-selector j-thumb" href=javascript:;>设置缩略图片</a>
                                <p class=pf-notice>文章缩略图会显示在文章列表，建议设置一下缩略图</p>
                            </div>
                            <input type=hidden name=_thumbnail_id id=_thumbnail_id value>
                        </div>
                        <div class=pf-side-item>
                            <div class=pf-side-label><h3>分类</h3></div>
                            <div class=pf-side-input>
                                <select multiple=multiple size=5 id=post-category name=post-category[] class=form-control>
                                    <?php ceo_tougao_cat(); ?>
                                </select>
                                <p class="pf-notice">小提示：按住键盘Ctrl键+鼠标左键可多选分类</p>
                            </div>
                        </div>
                        <?php if (_ceo('ceo_shop_submit_divide')) : ?>
                            <div class="pf-side-item ceo-tougao-pay">
                                <div class="pf-side-label title">
                                    <h3>内容付费</h3>
                                    <a id="ceo-tougao-switch" data-pay="1" class="btns">开启</a>
                                </div>
                                <div id="tougao-pay-show" style="display: none;" class="pf-side-input">
                                    <div id=j-thumb-wrap class=thumb-wrap></div>
                                    <div class="ceo-margin-small-bottom">
                                        <span class="pf-notice">价格</span>
                                        <input class="form-control" name="ceo-pay-price" type="text" placeholder="请输入价格">
                                    </div>
                                    <div class="ceo-margin-small-bottom ceo-position-relative">
                                        <span class="pf-notice">下载地址</span>
                                        <?php if (_ceo('tougao_down_url_upload')): ?>
                                        <a id="ceo-tougao-upload" href="javascript:void(0)" class="upload">上传</a>
                                        <?php endif; ?>
                                        <input type="file" id="fileInput" style="display: none;">
                                        <input class="form-control" id="ceo-pay-url" name="ceo-pay-url" type="text" placeholder="请输入下载地址">
                                    </div>
                                    <div class="ceo-margin-small-bottom">
                                        <span class="pf-notice">隐藏信息</span>
                                        <input class="form-control" name="ceo-pay-hide" type="text" placeholder="请输入隐藏信息">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <script>var postTags = [];</script>
        </div>
    </section>

<?php } ?>

<div class="clear" style="both:clear"></div>
<style>
    .csf-shortcode-button{
        display: none !important;
    }
    .csf-section{
        display: block !important;
    }
    @media (min-width: 1240px) {
        .container {
            width: auto;
        }
    }
</style>
<?php
wp_enqueue_style('csfcss', get_template_directory_uri() . '/inc/codestar-framework/assets/css/style.min.css');
?>
<script>
    $(function() {
        $('#ceo-tougao-switch').click(function() {
            if ($(this).data('pay') == 0) {
                $(this).text('开启');
                $('#tougao-pay-show').hide()
                $(this).data('pay', 1)
            } else {
                $(this).text('关闭');
                $('#tougao-pay-show').show()
                $(this).data('pay', 0)
            }
        })

        $('#ceo-tougao-upload').click(function(e) {
            e.preventDefault();
            $('#fileInput').click();
        });

        $('#fileInput').change(function() {
            var file = this.files[0];
            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: zongcai.ajaxurl + '?action=ceo_shop_upload_file',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#ceo-pay-url').val(response.link)
                        UIkit.notification('文件上传成功！', {
                            status: 'success'
                        })
                    } else {
                        UIkit.notification(response.msg, {
                            status: 'warning'
                        })
                    }
                },
                error: function() {
                    UIkit.notification('文件上传失败', {
                        status: 'warning'
                    })
                }
            });
        });
    });
</script>
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

<?php get_footer(); ?>
