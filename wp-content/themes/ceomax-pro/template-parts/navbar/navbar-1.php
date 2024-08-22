<?php if(_ceo('ceo_top') == true): ?>
<div class="ceo-topnav" style="display: block;background: <?php echo _ceo('ceo_top_bjcolor'); ?>;">
	<div class="ceo-container" style="position: relative;">
		<?php get_template_part( 'template-parts/navbar/navbar', 'top' ); ?>
	</div>
</div>
<?php endif; ?>
<header class="header ceo-background-default" <?php if(_ceo('navbar_sticky') == true): ?>ceo-sticky<?php endif; ?>>
    <div class="navbar ceo-position-relative">
    	<div class="ceo-container ceo-flex ceo-flex-middle ceo-position-relative ceo-logo-shou">
    		<a href="<?php bloginfo('url'); ?>" class="logo <?php echo _ceo('head_ceo_logo');?> ceo-display-inline-block" alt="<?php bloginfo('name'); ?>">
    		    <div class="ceo-logo-nav-night ceo-visible@m" style="background: url(<?php echo _ceo('head_logo');?>) no-repeat;background-size: 150px auto;"></div>
    		    <?php if(_ceo('app_head_logo_style')=='1'){ ?>
    		    <div class="ceo-app-logo" style="background: url(<?php echo _ceo('app_head_logo');?>) no-repeat;background-size: 38px auto;"></div>
                <?php }else { ?>
    		    <div class="ceo-app-logo2" style="background: url(<?php echo _ceo('head_logo');?>) no-repeat;background-size: 92px auto;"></div>
                <?php }?>
    		    <?php if(_ceo('ceo_shou') == true ): ?><img class="fimg" src="<?php echo _ceo('ceo_shou_img'); ?>"><?php endif; ?>
    		</a>
    		
    		<?php
    		wp_nav_menu( array(
    			'theme_location' => 'head-nav', //用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
    			'container'  => 'nav',  //容器标签
    			'container_class' => 'nav ceo-flex-1 ceo-position-relative ceo-visible@m',//ul父节点class值
    			'menu_id'   => '',  //ul节点id值
    			'menu_class' => 'nav ceo-flex-1 ceo-margin-remove', //ul节点class值
    			'echo'  => true,//是否输出菜单，默认为真
    		) );
    		?>
    
    		<div class="header-info ceo-flex ceo-flex-middle">
    		    <?php if(_ceo('head_sosuo') == true): ?>
    			<a href="#header-search" class="header-search ceo-navbar-s" ceo-toggle><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></a>
    			<?php endif; ?>
    			<?php if(_ceo('head_night') == true): ?>
    			<a href="javascript:switchNightMode()" class="header-search ceo-navbar-s" ceo-tooltip="开启/关闭夜间模式"><i class="ceofont ceoicon-moon-clear-line ceo-text-bolder to-night"></i></a>
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