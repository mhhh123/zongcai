<?php if(_ceo('ceo_top') == true): ?>
<div class="ceo-topnav" style="display: block;background: <?php echo _ceo('ceo_top_bjcolor'); ?>;">
	<div class="ceo-container" style="position: relative;">
		<?php get_template_part( 'template-parts/navbar/navbar', 'top' ); ?>
	</div>
</div>
<?php endif; ?>
<header class="header ceo-background-default navBar_02" <?php if(_ceo('navbar_sticky') == true): ?>ceo-sticky<?php endif; ?>>
    <div class="navbar ceo-position-relative">
    	<div class="ceo-container ceo-flex-middle ceo-position-relative ceo-flex ceo-navbar-2">
    	    <div class="ceo-navlogo ceo-flex-1 ceo_nav2_ss ceo-logo-shou">
        		<a href="<?php bloginfo('url'); ?>" class="logo <?php echo _ceo('head_ceo_logo');?> ceo-display-inline-block" alt="<?php bloginfo('name'); ?>">
        		    <div class="ceo-logo-nav-night ceo-visible@m" style="background: url(<?php echo _ceo('head_logo');?>) no-repeat;background-size: 150px auto;"></div>
        		    <?php if(_ceo('app_head_logo_style')=='1'){ ?>
        		    <div class="ceo-app-logo" style="background: url(<?php echo _ceo('app_head_logo');?>) no-repeat;background-size: 38px auto;"></div>
                    <?php }else { ?>
        		    <div class="ceo-app-logo2" style="background: url(<?php echo _ceo('head_logo');?>) no-repeat;background-size: 92px auto;"></div>
                    <?php }?>
        		    <?php if(_ceo('ceo_shou') == true ): ?><img class="fimg" src="<?php echo _ceo('ceo_shou_img'); ?>"><?php endif; ?>
        		</a>
        		<em class="ceo-nav2-em b-r-4 ceo-display-inline-block"><?php echo _ceo('navbar_2');?></em>
        		
        		<?php if(_ceo('navbar_2_ss') == true ): ?>
        		<div class="search ceo_nav2_ssk">
        			<form method="get" class="b-r-4 b-a ceo-form ceo-flex ceo-overflow-hidden search-form" action="<?php echo home_url();?>">
        				<input type="search" placeholder="输入关键字搜索..." autocomplete="off" value="" name="s" required="required" class="ceo-input ceo-flex-1 ceo-text-small">
        				<button type="submit"><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></button>
        			</form>
            		<div class="ceo_nav2_an">
    					<a href="<?php if(_ceo('navbar_2_ssan'))echo _ceo('navbar_2_ssan')['navbar_2_ssan_link']; ?>" class="wdsq"><i class="ceofont <?php if(_ceo('navbar_2_ssan'))echo _ceo('navbar_2_ssan')['navbar_2_ssan_icon']; ?>"></i>  <?php if(_ceo('navbar_2_ssan'))echo _ceo('navbar_2_ssan')['navbar_2_ssan_title']; ?></a>
    					<img src="<?php if(_ceo('navbar_2_ssan'))echo _ceo('navbar_2_ssan')['navbar_2_ssan_img']; ?>">
    				</div>
        		</div>
        		<?php endif; ?>
    		
    		</div>
    		<div class="header-info ceo-flex-middle ceo-nav2-bp">
    		    <?php if(_ceo('head_sosuo') == true): ?>
    			<a href="#header-search" class="header-search ceo-margin-right" ceo-toggle><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></a>
    			<?php endif; ?>
    			<?php if(_ceo('head_night') == true): ?>
    			<a href="javascript:switchNightMode()" class="header-search ceo-margin-right" ceo-tooltip="开启/关闭夜间模式"><i class="ceofont ceoicon-moon-clear-line ceo-text-bolder to-night"></i></a>
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
    	
    		<div class="nav_2 ceo-margin-0" <?php if(_ceo('navbar_2_color') == true ): ?>style="display: block;background: <?php if(_ceo('navbar_2_color_sz'))echo _ceo('navbar_2_color_sz')['navbar_2_color_b']; ?>;"<?php endif; ?>>
        	    <div class="ceo-container ceo-padding-remove ceo-text-left ceo-navbtn ceo-flex">
        	        <?php if(_ceo('navbar_2_zuo') == true ): ?>
        	        <div class="ceo-navs"><i class="ceofont <?php if(_ceo('navbar_2_zuo_an'))echo _ceo('navbar_2_zuo_an')['navbar_2_zuo_icon']; ?>"></i>  <?php if(_ceo('navbar_2_zuo_an'))echo _ceo('navbar_2_zuo_an')['navbar_2_zuo_title']; ?></div>
        	        <?php endif; ?>
            		<?php
            		wp_nav_menu( array(
            			'theme_location' => 'head-nav', //用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
            			'container'  => 'nav',  //容器标签
            			'container_class' => 'nav ceo-flex-1 ceo-padding-left-0 ceo-position-relative ceo-visible@m',//ul父节点class值
            			'menu_id'   => '',  //ul节点id值
            			'menu_class' => 'nav nav ceo-flex-1 ceo-margin-remove', //ul节点class值
            			'echo'  => true,//是否输出菜单，默认为真
            		) );
            		?>
            		<?php if(_ceo('navbar_2_you') == true ): ?>
            		<div class="ceo_nav_focus">
            		    <div class="flex-footera" >
            		        <p><?php if(_ceo('navbar_2_you_an'))echo _ceo('navbar_2_you_an')['navbar_2_you_title']; ?></p>
            		        <p><?php if(_ceo('navbar_2_you_an'))echo _ceo('navbar_2_you_an')['navbar_2_you_htitle']; ?></p>
                            <img src="<?php if(_ceo('navbar_2_you_an'))echo _ceo('navbar_2_you_an')['navbar_2_you_erweima']; ?>">
                        </div>
            		    <span style="background: url(<?php if(_ceo('navbar_2_you_an'))echo _ceo('navbar_2_you_an')['navbar_2_you_img']; ?>) no-repeat;"></span>
            		</div>
            		<?php endif; ?>
        	    </div>
        	</div>
    </div>
</header>

<?php if(_ceo('navbar_2_color') == true ): ?>
<style>
.nav>ul>li>a{
    color: <?php if(_ceo('navbar_2_color_sz'))echo _ceo('navbar_2_color_sz')['navbar_2_color_z']; ?> !important;
}
</style>
<?php endif; ?>