<?php
	$slide_cms            = _ceo('slide_cms');
	$slide_cms_search_tag = _ceo('slide_cms_search_tag');
	$slide_cms_nav_tag    = _ceo('slide_cms_nav_tag');
	$slide_cms_nav_y      = _ceo('slide_cms_nav_y');
	$slide_cms_cms_mk     = _ceo('slide_cms_cms_mk');
	$slide_cms_link     = _ceo('slide_cms_link');
	if(!$slide_cms){
?>
<div class="ceo-container" >
	<div class="ceo-alert-primary" ceo-alert>
		<a class="ceo-alert-close" ceo-close></a>
		<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>首页设置<i class="ceofont ceoicon-arrow-right-s-line"></i>幻灯模块，设置该模块内容！</p>
	</div>
</div>

<?php }else{ ?>
<section class="slide_05">
	<div class="ceo-visible-toggle ceo-light ceo-position-relative" tabindex="-1" ceo-slideshow autoplay="true" autoplay-interval="5000">
		<ul class="slide-ul ceo-slideshow-items" style="height:<?php echo _ceo('slide_cms_height'); ?>px">
			<?php
			if ($slide_cms) {
				foreach ( $slide_cms as $key => $value) {
			?>

			<li>
				<a href="<?php echo $slide_cms[$key]['link']; ?>" target="_blank" class="slide-item ceo-display-block ceo-width-1-1 ceo-height-1-1 ceo-position-relative" style="height:<?php echo _ceo('slide_cms_height'); ?>px">
					<img src="<?php echo $slide_cms[$key]['img']; ?>" ceo-cover>
				</a>
			</li>
			<?php } } ?>

		</ul>
		<a class="ceo-position-center-left ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-previous ceo-slideshow-item="previous"></a>
		<a class="ceo-position-center-right ceo-position-small ceo-hidden-hover" href="#" ceo-slidenav-next ceo-slideshow-item="next"></a>
		<ul class="ceo-slideshow-nav ceo-dotnav ceo-position-bottom-center ceo-margin-small-bottom"></ul>
	</div>

	<!--搜索框-->
	<?php if(_ceo('slide_cms_search') == true ): ?>
	<div class="slide_6_search">
        <div class="searchbox">
            <div class="search_input">
                <input class="list_keywords text" type="text" value="" placeholder="请输入关键词..." style="border-color: rgb(232, 232, 232);">
                <div class="tag">
                    <?php
    				if ($slide_cms_search_tag) {
    					foreach ( $slide_cms_search_tag as $k => $v) {
    				?>
                    <a href="<?php echo $slide_cms_search_tag[$k]['link']; ?>" target="_blank"><?php echo $slide_cms_search_tag[$k]['title']; ?></a>
                    <?php } } ?>
                </div>
                <span class="submit start_search list_search"><?php if(_ceo('slide_cms_search_sz'))echo _ceo('slide_cms_search_sz')['slide_cms_search_title']; ?></span>
                <a href="<?php if(_ceo('slide_cms_search_sz'))echo _ceo('slide_cms_search_sz')['slide_cms_search_yl']; ?>" target="_blank">
                    <span class="submit_s"><?php if(_ceo('slide_cms_search_sz'))echo _ceo('slide_cms_search_sz')['slide_cms_search_y']; ?></span>
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!--CMS主模块-->
	<div class="slide_6_mk ceo-container">
	    <div class="slide_6_jb ceo-background-default">
	        <!--快捷导航-->
	        <div class="slide_6_n">
                <div class="slide_6_s">
                    <ul>
                        <li><a href="<?php if(_ceo('slide_cms_nav_sz'))echo _ceo('slide_cms_nav_sz')['slide_cms_nav_link']; ?>" class="first"><i class="ceofont <?php if(_ceo('slide_cms_nav_sz'))echo _ceo('slide_cms_nav_sz')['slide_cms_nav_icon']; ?>"></i><?php if(_ceo('slide_cms_nav_sz'))echo _ceo('slide_cms_nav_sz')['slide_cms_nav_title']; ?></a>
                        </li>

                        <?php
        				if ($slide_cms_nav_tag) {
        					foreach ( $slide_cms_nav_tag as $k => $v) {
        				?>
                        <li><a href="<?php echo $slide_cms_nav_tag[$k]['link']; ?>" target="_blank"><i class="ceofont <?php echo $slide_cms_nav_tag[$k]['icon']; ?>"></i><?php echo $slide_cms_nav_tag[$k]['title']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </div>

                <div class="slide_6_y">
                    <?php
    				if ($slide_cms_nav_y) {
    					foreach ( $slide_cms_nav_y as $k => $v) {
    				?>
                    <a href="<?php echo $slide_cms_nav_y[$k]['link']; ?>" target="_blank"><i class="ceofont <?php echo $slide_cms_nav_y[$k]['icon']; ?>"></i><?php echo $slide_cms_nav_y[$k]['title']; ?></a>
                    <?php } } ?>
                </div>
            </div>

            <!--快捷导航-->
	        <div class="slide_6_ss">
	            <?php
    			if ($slide_cms_cms_mk) {
    				foreach ( $slide_cms_cms_mk as $k => $value) {
    			?>
	            <div class="slide_6_d">
                    <div class="mini-stats">
                        <div class="mini-stats-content" style="background: url(<?php echo $value['imgs']; ?>);background-size: 100% 100%;">
                            <div class="slide_6_d_mb4">
                                <div class="slide_6_d_right">
                                    <span> <?php echo $value['title']; ?> </span>
                                    <p><?php echo $value['descs']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="slide_6_d_m">
                            <div class="mini-stats-desc">
                                <?php
        							 if ( $value['slide_cms_cms_mk_cd'] ) {
        								foreach ( $value['slide_cms_cms_mk_cd'] as $k => $v) {
        						?>
                                <li>
                                    <a href="<?php echo $v['link']; ?>" target="_blank" class="ceo-dt">
                                        <img src="<?php echo $v['img']; ?>">
                                        <p><?php echo $v['title']; ?></p>
                                    </a>
                                </li>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>

	        </div>

	        <div class="slide_6_link">
	            <ul class="ceo-container">
	                <?php
    				if ($slide_cms_link) {
    					foreach ( $slide_cms_link as $k => $v) {
    				?>
                    <li><a href="<?php echo $slide_cms_link[$k]['link']; ?>" target="_blank"><?php echo $slide_cms_link[$k]['title']; ?></a></li>
                    <?php } } ?>
                </ul>
	        </div>

	        <div class="slide_6_tjmk">
	            <div class="slide_6_tj">
                    <!--访问总数-->
                    <?php if(_ceo('slide_cms_count_fwkg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_fwicon'); ?>"></i><?php echo _ceo('slide_cms_count_fw'); ?>：<?php echo all_view(); ?></li>
                    <?php endif; ?>
                    <!--会员总数-->
                    <?php if(_ceo('slide_cms_count_hykg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_hyicon'); ?>"></i><?php echo _ceo('slide_cms_count_hy'); ?>：<?php

                        echo all_users_count();

                        ?></li>
                    <?php endif; ?>
	                <!--文章总数-->
	                <?php if(_ceo('slide_cms_count_wzkg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_wzicon'); ?>"></i><?php echo _ceo('slide_cms_count_wz'); ?>：<?php echo wp_count_posts()->publish;?></li>
                    <?php endif; ?>
                    <!--今日发布-->
                    <?php if(_ceo('slide_cms_count_jrkg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_jricon'); ?>"></i><?php echo _ceo('slide_cms_count_jr'); ?>：<?php echo DayUpdate()?></li>
                    <?php endif; ?>
                    <!--本周发布-->
                    <?php if(_ceo('slide_cms_count_bzkg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_bzicon'); ?>"></i><?php echo _ceo('slide_cms_count_bz'); ?>：<?php echo get_week_post_count(); ?></li>
                    <?php endif; ?>
                    <!--运行天数-->
                    <?php if(_ceo('slide_cms_count_yxkg') == true ): ?>
                    <li><i class="ceofont <?php echo _ceo('slide_cms_count_yxicon'); ?>"></i><?php echo _ceo('slide_cms_count_yx'); ?>：<?php echo floor((time()-strtotime(_ceo('slide_cms_count_jz',"2011-11-11")))/86400); ?></li>
                    <?php endif; ?>
                </div>
	        </div>
        </div>
    </div>
</section>
<style>.fastlink {padding-bottom: 30px;margin-top: 20px!important;}</style>
<?php } ?>
<!--搜索框-->
<?php if(is_home()){?>
<script>
    $(function () {
        $(".list_search").on("click",function () {
            location.href='/?cat=<?php echo get_queried_object_id(); ?>&s='+$('.list_keywords').val()
        })
        $(".list_keywords").on("keydown",function (e) {
            if(e.keyCode==13){
                $(".list_search").trigger("click");
            }
        })
    })
</script>
<?php }?>
<!--搜索框-->