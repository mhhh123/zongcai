<?php if(_ceo('ceo_top') == true): ?>
<div class="ceo-topnav" style="display: block;background: <?php echo _ceo('ceo_top_bjcolor'); ?>;">
	<div class="ceo_header_nav" style="position: relative;">
		<?php get_template_part( 'template-parts/navbar/navbar', 'top' ); ?>
	</div>
</div>
<?php endif; ?>
<header class="header_3_nav navBar_03 header ceo-position-relative">
    <div class="navbar">
    	<div class="ceo_header_nav ceo-flex ceo-flex-middle ceo-position-relative ceo-logo-shou">
    	    
    	    <?php if ($_SERVER['REQUEST_URI'] == '/') {?>
		
        	<a href="<?php bloginfo('url'); ?>" class="logo ceo-display-inline-block" alt="<?php bloginfo('name'); ?>">
        	    <img src="<?php echo _ceo('head_logo_nav3');?>">
        	    <?php if(_ceo('ceo_shou') == true ): ?><img class="fimg" src="<?php echo _ceo('ceo_shou_img'); ?>"><?php endif; ?>
    	    </a>
        	
        	<?php }else { ?>
        	
        	<a href="<?php bloginfo('url'); ?>" class="logo <?php echo _ceo('head_ceo_logo');?> ceo-display-inline-block" alt="<?php bloginfo('name'); ?>"><img src="<?php echo _ceo('head_logo');?>"><?php if(_ceo('ceo_shou') == true ): ?><img class="fimg" src="<?php echo _ceo('ceo_shou_img'); ?>"><?php endif; ?></a>
        		
        	<?php } ?>
        	
    		<?php
    		wp_nav_menu( array(
    			'theme_location' => 'head-nav', //用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
    			'container'  => 'nav',  //容器标签
    			'container_class' => 'nav ceo-flex-1 ceo-position-relative ceo-visible@m',//ul父节点class值
    			'menu_id'   => '',  //ul节点id值
    			'menu_class' => 'nav  ceo-flex-1 ceo-margin-remove', //ul节点class值
    			'echo'  => true,//是否输出菜单，默认为真
    		) );
    		?>
    
    		<div class="header-info ceo-flex ceo-flex-middle">
    		    <?php if(_ceo('head_sosuo') == true): ?>
    			<a href="#header-search" class="navbar_03_an header-search ceo-margin-right" ceo-toggle><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></a>
    			<?php endif; ?>
    			<?php if(_ceo('head_night') == true): ?>
    			<a href="javascript:switchNightMode()" class="navbar_03_an header-search ceo-margin-right" ceo-tooltip="开启/关闭夜间模式"><i class="ceofont ceoicon-moon-clear-line ceo-text-bolder to-night"></i></a>
    			<?php endif; ?>
    			<?php if(_ceo('modal_show') == true): ?>
    			<?php if(_ceo('modal_show_h') == true): ?>
    			<a class="ceo-navbar-s"><i ceo-toggle="target: #home-modal" class="ceofont ceoicon-notification-3-line ceo-text-bold"></i></a>
    			<?php endif; ?>
    			<?php endif; ?>
        		<?php get_template_part( 'template-parts/navbar/navbar', 'search' ); ?>
        		
        		<?php get_template_part( 'template-parts/navbar/navbar', 'user' ); ?>
    		</div>
    	</div>
    </div>
</header>

<?php if ($_SERVER['REQUEST_URI'] == '/') {?>
<style>
.navBar_03 {
    background: transparent;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0)!important;
    margin-bottom: -86px;
}
.ceo-top-nav>li {
    line-height: 32px;
    padding: 0px 10px;
}
.navBar_03 .nav>ul>li>a,.navBar_03 .header-info .navbar_03_an
{
    color: #fff;
}

.header-info em {
    background: #fff;
}
.header_3_nav {
    display: inherit!important;
}
.header_3_nav .ceo-logo-shou .fimg{
    bottom:-28px;
}
.header_3_nav .ceo-navbar-s {
	color:#fff
}
@media screen and (max-width:800px) {
    .header_3_nav .navbar_03_an,.header_3_nav .ceo-navbar-s {
		color:#262626!important;
    }
}
.night .header_3_nav .navbar_03_an,.night .header_3_nav .ceo-navbar-s {
    color: #fff!important;
}
</style>
<?php } ?>