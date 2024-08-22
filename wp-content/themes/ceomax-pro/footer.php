<?php
if(is_single()){
    wp_enqueue_script('js2021', get_template_directory_uri() . '/static/js/js21.js', ['jquery']);
}
?>
			<!--跟随-->
			<?php get_template_part( 'template-parts/footer/footer', 'sidebar' ); ?>
			<!--Banner-->
			<?php get_template_part( 'template-parts/footer/footer', 'banner' ); ?>
			<!--基础-->
			<footer class="footer ceo-background-secondary">
			    <?php if(_ceo('foot_kg') == true ): ?>
				<div class="foot ceo-container ceo-padding">
					<div class="ceo-grid" ceo-grid>
						<div class="ceo-width-1-1@s ceo-width-1-3@xl">
							<div class="foot-item foot-item-first ceo-position-relative">
								<a href="" target="_blank" class="foot-logo ceo-display-block"><img src="<?php echo _ceo('foot_logo'); ?>"></a>
								<p class="ceo-text-small"><?php echo _ceo('foot_site_des'); ?></p>
							</div>
						</div>
						<div class="ceo-width-2-3 ceo-visible@s">
							<div class="ceo-grid" ceo-grid>
								<?php
								$foot_menu = _ceo('foot_menu');
								if(!$foot_menu){
									echo '<p class="ceo-text-small"><i class="ceofont ceoicon-alert-fill ceo-margin-small-right"></i>请前往后台<i class="ceofont ceoicon-arrow-right-s-line"></i>主题设置<i class="ceofont ceoicon-arrow-right-s-line"></i>底部设置<i class="ceofont ceoicon-arrow-right-s-line"></i>底部基础设置<i class="ceofont ceoicon-arrow-right-s-line"></i>底部快捷导航，设置该模块内容！</p>';
								}else {
									if ($foot_menu) {
										foreach ( $foot_menu as $key => $value) {
								?>
								<div class="ceo-width-1-3">
									<div class="foot-item">
										<div class="foot-item-title"><i class="ceofont <?php echo $value['ico'] ?>"></i><?php echo $value['h4'] ?></div>
										<ul class="ceo-padding-remove">
											<?php
											$foot_menu_item = $value['foot_menu_item'];

											?>
											<?php
											if ( $foot_menu_item ) {
												foreach ( $foot_menu_item as $k => $v) {
											?>
											<li><a href="<?php echo $v['link'] ?>" target="_blank"><?php echo $v['title'] ?></a></li>

											<?php } } ?>
										</ul>
									</div>
								</div>
								<?php } } } ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( is_home() ) { ?>
				<?php if(_ceo('link_show') == true ): ?>
				<div class="foot-link">
					<div class="link ceo-margin-top ceo-container">
						<ul class="ceo-margin-remove ceo-text-small">
							<li style="margin-right: 15px;"><i class="ceofont ceoicon-user-star-line"></i>友情链接：</li><?php $wp_list_bookmarks=wp_list_bookmarks('title_li=&echo=0');
                            echo preg_replace('#<img src="(.*?)"  alt="(.*?)".*?/>#', "$2", $wp_list_bookmarks);
							?><li><a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo _ceo('servceomall_qq'); ?>&amp;site=qq&amp;menu=yes" target="_blank"  rel="noreferrer nofollow" class="ceofont ceoicon-qq-fill"style="font-size: 0.875rem;">友链申请+</a></li>
						</ul>
					</div>
				</div>
				<?php endif; ?>
				<?php } ?>
				<div class="foot-cop">
					<div class="ceo-container ceo-padding-small ceo-clearfix">
						<div class="ceo-float-left">
							<span><?php echo _ceo('foot_text'); ?></span>
							<?php if(_ceo('foot_xml-y') == true): ?>
			        		<a class="ceo-margin-small-right" href="<?php echo _ceo('foot_xml'); ?>" target="_blank"><i class="ceofont ceoicon-map-pin-fill" aria-hidden="true"></i> 网站地图</a>
			        		<?php endif; ?>

			        		<?php if(_ceo('foot_gongan') == true): ?>
							<span class="ceo-margin-small-right ceo-gongan"><a href="http://www.beian.gov.cn/" target="_blank" rel="noreferrer nofollow"><img src="<?php bloginfo('template_url'); ?>/static/images/ceo-110.png" height="6"><?php echo _ceo('foot_gongan_beianhao'); ?></a></span>
							<?php endif; ?>

							<span class="ceo-margin-small-right"><a href="https://beian.miit.gov.cn/" target="_blank" rel="noreferrer nofollow"><?php echo _ceo('foot_beian'); ?></a></span>
						</div>
						<div class="ceo-float-right ceo-visible@s">
							<?php if(_ceo('theme_cop') == true): ?>
							<span>Theme By <a href="https://www.ceotheme.com/" target="_blank" rel="noreferrer nofollow">CeoTheme</a></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if ( is_user_logged_in() == false ) { ?>
				<!--登录注册弹窗-->
				<?php get_template_part( 'template-parts/navbar/navbar', 'login' ); ?>
				<?php }?>
				<!--基础功能弹窗-->
        		<?php get_template_part( 'template-parts/navbar/navbar', 'mob' ); ?>
			</footer>

            <?php if(_ceo('ceo_app_foo') == true ): ?>
			<!--手机端菜单-->
    		<?php get_template_part( 'template-parts/footer/footer', 'nav' ); ?>
    		<?php endif; ?>

		</div>
	    <?php wp_footer(); ?>
    	<!-- CeoMax-Pro主题 -->
    	<div id="ceoshop-member-box"></div>
        <?php
        $head_js = _ceo('head_js');
        if (strpos($head_js, '</script>')) {
            echo $head_js;
        } else {
            echo '<script>' . $head_js . '</script>';
        }
        ?>

    	<?php get_template_part( 'template-parts/footer/footer', 'js' ); ?>
    </body>
</html>