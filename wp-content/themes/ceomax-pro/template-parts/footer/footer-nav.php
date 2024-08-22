<div id="mob-nav1" ceo-offcanvas>
    <div class="ceo-offcanvas-bar ceo-background-default ceo-box-shadow-small ceo-mobnav-box">
		<div class="mob-nav">
			<div class="ceo-margin-small-bottom ceo-text-center">
				<a href="<?php bloginfo('url'); ?>" class="logo ceo-display-inline-block ceo-margin-bottom"><img src="<?php echo _ceo('head_logo');?>"></a>
			</div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'head-nav', //用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
				'container'  => 'mob-nav',  //容器标签
				'container_class' => 'nav ceo-position-relative ceo-visible@m',//ul父节点class值
				'menu_id'   => '',  //ul节点id值
				'menu_class' => 'nav', //ul节点class值
				'echo'  => true,//是否输出菜单，默认为真
			) );
			?>
		</div>
    </div>
</div>
<script>
    var showNav = false;
    function showNavClick()
    {
        if (!showNav) {
            UIkit.offcanvas('#mob-nav1').show();
            showNav = true;
        } else {
            UIkit.offcanvas('#mob-nav1').hide();
            showNav = false;
        }
    }
</script>
<div class="ceo-app-footer-fixed ceo-app-footer ceo-hidden@s">
    <a href="<?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_link1']; ?>">
        <span class="icon">
            <i class="ceofont <?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_ico1']; ?>"></i>
        </span>
        <span class="text"><?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_title1']; ?></span>
    </a>
    <a href="<?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_link2']; ?>">
        <span class="icon">
            <i class="ceofont <?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_ico2']; ?>"></i>
        </span>
        <span class="text"><?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_title2']; ?></span>
    </a>
    <a class="cat" onclick="showNavClick()">
        <span class="icon">
            <i class="ceofont ceoicon-apps-2-line"></i>
        </span>
        <span class="text">菜单</span>
    </a>
    <a href="<?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_linky1']; ?>">
        <span class="icon">
            <i class="ceofont <?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_icoy1']; ?>"></i>
        </span>
        <span class="text"><?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_titley1']; ?></span>
    </a>
    <a href="<?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_linky2']; ?>">
        <span class="icon">
            <i class="ceofont <?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_icoy2']; ?>"></i>
        </span>
        <span class="text"><?php if(_ceo('ceo_app_foo_sz'))echo _ceo('ceo_app_foo_sz')['ceo_app_foo_titley2']; ?></span>
    </a>
</div>

