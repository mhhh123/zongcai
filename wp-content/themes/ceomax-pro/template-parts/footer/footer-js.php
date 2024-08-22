<?php if(_ceo('aixintexiao') == true): ?>
<canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:999;pointer-events:none;"></canvas>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/aixintexiao.js"></script>
<?php endif; ?>

<?php if(_ceo('ceo_foo_h') == true ): ?>
<div class="ceo-footer-h" style="width: 191px;height: 204px;left: 0px;bottom: 0px;">
    <a href="<?php echo _ceo('ceo_foo_h_l'); ?>" target="_blank"><img src="<?php echo _ceo('ceo_foo_h_img'); ?>"></a>
</div>
<?php endif; ?>

<script>
    console.log("\n %c \u603b\u88c1\u4e3b\u9898 V7.6 %c \u0068\u0074\u0074\u0070\u0073\u003a\u002f\u002f\u0077\u0077\u0077\u002e\u0063\u0065\u006f\u0074\u0068\u0065\u006d\u0065\u002e\u0063\u006f\u006d \n\n", "color: #fff; background: #3371f5; padding:5px 0;", "background: #3371f5; padding:5px 0;");
</script>

<style>
	.night .ceo-logo-nav-night{
        background: url(<?php echo _ceo('head_logo_nav3');?>) no-repeat!important;
        background-size: 150px auto;
    }
    .night .ceo-app-logo2{
        background: url(<?php echo _ceo('head_logo_nav3');?>) no-repeat!important;
        background-size: 92px auto!important;
    }
    #canvas {
        position: absolute;
        left: 0;
        top: 0;
    }
</style>

<?php if(_ceo('ceo_kefu') == true ): ?>
<div class="ceo-kefu-img" style="display: block;">
    <img src="<?php if(_ceo('ceo_kefu_sz'))echo _ceo('ceo_kefu_sz')['ceo_kefu_img']; ?>">
</div>
<div class="ceo-kefu-bot" id="ceo-footer-vip" style="display: none;">
    <div class="ceo-kefu-con">
        <img src="<?php if(_ceo('ceo_kefu_sz'))echo _ceo('ceo_kefu_sz')['ceo_foo_kefu_img']; ?>">
        <div class="ceo-kefu-form">
            <div class="ceo-kefu-form-ss ceo-kefu-clearfix">
                <div class="ceo-kefu-form-ss-title"><?php if(_ceo('ceo_kefu_sz'))echo _ceo('ceo_kefu_sz')['ceo_foo_kefu_title']; ?></div>
                <div class="ceo-kefu-form-ss-y">
                    <span><i class="ceofont ceoicon-volume-up-line"></i> <?php if(_ceo('ceo_kefu_sz'))echo _ceo('ceo_kefu_sz')['ceo_foo_kefu_desc']; ?></span>
                </div>
            </div>
            <form method="get" class="ceo-kefu-clearfix b-r-4 ceo-form ceo-flex ceo-overflow-hidden search-form" action="<?php echo home_url();?>">
                <div class="ceo-kefu-box ceo-kefu-clearfix">
        			<input type="search" placeholder="输入关键字搜索..." autocomplete="off" value="" name="s" required="required" class="ceo-suspension-input ceo-input ceo-flex-1 ceo-text-small">
                </div>
                <button class="ceo-kefu-ss-an change-color btn-search-all"><i class="ceofont ceoicon-search-2-line"></i> 搜索全站</button>
                <?php if(is_category()){?>
                <button class="ceo-kefu-ss-an change-color btn-search-category"><i class="ceofont ceoicon-search-2-line"></i> 搜索当前分类</button>
                <?php }?>
                <a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo _ceo('servceomall_qq'); ?>&amp;site=qq&amp;menu=yes" class="ceo-kefu-zc-kf" target="_blank"  rel="noreferrer nofollow">
                    <span><i class="ceofont ceoicon-user-follow-line"></i>在线客服</span>
                </a>
                <?php
                if ( is_user_logged_in() ) {
                    echo '<a href="/vip"class="ceo-kefu-zc-an">
                    <span><i class="ceofont ceoicon-vip-crown-2-line"></i>升级VIP</span>
                </a>';
                } else {
                    echo '<a href="#modal-login"class="ceo-kefu-zc-an" ceo-toggle>
                    <span><i class="ceofont ceoicon-shield-check-line"></i>立即登录</span>
                </a>';
                }
                ?>
            </form>
        </div>
        <div class="ceo-kefu-cols" id="footer-vip-close">
            <i class="ceofont ceoicon-close-line"></i>
        </div>
    </div>
</div>
<script>
	$('#footer-vip-close').click(function(){
		UIkit.modal('#ceo-footer-vip').hide();
        var now = new Date();
        var time = now.getTime();
        time += 3600 * 1000*24;
        now.setTime(time);
        document.cookie =
            'footertips_close=' + '1' +
            '; expires=' + now.toUTCString() +
            '; path=/';
	});
    $(function (){
        if(document.cookie.indexOf('footertips_close=1')!='-1'){
            UIkit.modal('#ceo-footer-vip').hide()
        }
    })

</script>
<script>
    $(".btn-search-all").on("click",function () {
        $(".ceo-kefu-form .search-form button").trigger('click')
    })
    $(".btn-search-category").on("click",function (event) {
        event.preventDefault()
        let search_s=$(".ceo-kefu-form input[name=s]").val();
        if(!search_s){
            return false;
        }
        let category_search_url='/?s='+search_s+"&cat=<?php echo get_queried_object_id(); ?>"
        console.log(category_search_url)
        location.href=category_search_url
    })
</script>
<?php endif; ?>

<?php if(_ceo('danmu')==1){ ?>
<div class="danmu-bottom"></div>
<script type='text/javascript' src='/wp-content/themes/ceomax-pro/static/js/danmu.js' id='danmu-js'></script>
<?php } ?>