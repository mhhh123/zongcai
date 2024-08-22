<?php
	get_header();
	$single_gg = _ceo('single_ad');
	$post_id =  get_the_ID();
	$meta = get_post_meta( get_the_ID(), 'my_post_options', true );
    $down_info_arr=get_post_meta( get_the_ID(), 'down_info', true );
?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="beijing ceo-background-contain ceo-background-top-center ceo-background-norepeat" <?php if(_ceo('single_picture') == true): ?> style="background-image: url(<?php echo _ceo('single_picture_img'); ?>);"<?php endif; ?>>

		<div class="ceo-container ceo-margin-medium-bottom">
    	    <?php get_template_part( 'template-parts/single/single', 'breadcrumbs' ); ?>
    	    <?php if ( wp_is_mobile() ){ ?>
    	    <div class="ceo-margin-top-20">
			<?php get_template_part( 'template-parts/single/shop/ceo', 'app-shop' ); ?>
			</div>
			<?php } ?>
		    <?php get_template_part( 'template-parts/single/shop/ceo', 'shop1' ); ?>
			<div class="ceo-side-lie ceo-margin-top-20" ceo-grid>
				<div class="ceo-side-lie-z single ceo-width-auto">
					<div class="b-a b-r-4">
					    <!--快捷导航-->
					    <?php if(_ceo('ceoshop_1_content_top') == true): ?>
						<?php if (CeoShopCoreProduct::isProduct($post_id)) { ?>
                        <div class="single-navs single-nav ceo-flex ceo-background-default" ceo-sticky="end: !.ceo-height-large; offset: 0">
						    <ul class="consultingshop ceo-flex-1">
                                <li class="ceo-display-inline-block ceo-margin-medium-right">
                                    <span class="current"><a href="#xiangqing" ceo-scroll>详情介绍</a></span>
                                </li>
                                <li class="ceo-display-inline-block ceo-margin-medium-right">
                                    <span class=""><a href="#ceoqa" ceo-scroll>常见问题</span></a>
                                </li>
                                <?php if(_ceo('single_article') == true): ?>
                                <li class="ceo-display-inline-block ceo-margin-medium-right">
                                    <span class=""><a href="#ceoxiangguan" ceo-scroll><?php echo _ceo('single_article_title'); ?></span></a>
                                </li>
                                <?php endif; ?>
								<?php if ( comments_open() || get_comments_number() ) : ?>
                                <li class="ceo-display-inline-block ceo-margin-medium-right">
                                    <span class=""><a href="#comments" ceo-scroll>发表评论</a></span>
                                </li>
                                <?php endif;?>
							</ul>
							<li class="ceo-display-inline-block consulting">
							    <a href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_the_author_meta('qq',$user_id); ?>&amp;site=qq&amp;menu=yes" target="_blank">立即咨询</a>
						    </li>
					    </div>
						<?php } ?>
						<?php endif; ?>
						
						<!--内容主模块-->
						<div class="single-warp ceo-overflow-hidden ceo-background-default ceo-margin-bottom ceo-padding-remove-bottom">
                            <?php if(!empty($down_info_arr)){?>
                            <div class="turning_turn_trademark">
                                <div class="ceo-shop-commont" id="shuxing">
                                    <span class="turn1">信息属性<a name="attribute"></a></span>
                                </div>
                                <div class="turning_turn_trademark_show clearfix">
                                    <div class="turning_turn_trademark_show_row1">
                                        <?php
                                        $number = 0;
                                        if(!empty($down_info_arr)){
                                            foreach ($down_info_arr as $k=>$v){
                                                $number= $number+1;
                                                echo '<ul><li>'.$v['title'].'</li><span>'.$v['desc'].'</span></ul>';
                                                if($number%3==0){
                                                    echo '</div> <div class="turning_turn_trademark_show_row1">';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div style="clear: both"></div>
                            <?php } ?>

                            <?php if(_ceo('ceoshop_1_content_xq') == true): ?>
							<?php if (CeoShopCoreProduct::isProduct($post_id)) {
                                echo '<div class="ceo-shop-commont" id="xiangqing">
                                <span class="turn1">详情介绍<a name="attribute"></a></span>
                                </div>';
                            } ?>
                            <?php endif; ?>

							<!--文章内容模块-->
							<article class="single-content" id="contentstart">
							    <?php get_template_part( 'template-parts/ad/single', 'top_ad' ); ?>
                                <?php get_template_part( 'template-parts/single/single', 'video' ); ?>
                                <?php the_content(); ?>
							</article>
							<!--文章内容模块-->

							<?php get_template_part( 'template-parts/single/single', 'foot' ); ?>

						</div>
						<?php get_template_part( 'template-parts/single/single', 'author' ); ?>

						<?php get_template_part( 'template-parts/single/single', 'page' ); ?>

						<?php get_template_part( 'template-parts/ad/single', 'footer_ad' ); ?>

						<!--常见问题-->
						<?php if(_ceo('single_qa') == true): ?>
						<?php if(_ceo('single_qa_shop') == true): ?>
						<?php get_template_part( 'template-parts/single/single', 'qa' ); ?>
						<?php endif; ?>
						<?php endif; ?>

						<!--相关文章-->
						<?php if(_ceo('single_article') == true): ?>
						<?php if(_ceo('single_article_shop') == true): ?>
						<?php get_template_part( 'template-parts/single/single', 'relevant' ); ?>
						<?php endif; ?>
						<?php endif; ?>

						<!--猜你喜欢-->
						<?php if(_ceo('single_article_c') == true): ?>
						<?php if(_ceo('single_article_c_shop') == true): ?>
						<?php get_template_part( 'template-parts/single/single', 'like' ); ?>
						<?php endif; ?>
						<?php endif; ?>

						<!--评论模块-->
						<?php if(_ceo('comments_close') == true ): ?>
						<?php if ( comments_open() || get_comments_number() ) : ?>
						<?php comments_template( '', true ); ?>
						<?php endif; ?>
						<?php endif; ?>

						<!--联系官方-->
						<?php if(_ceo('single_article_contact') == true): ?>
						<?php if(_ceo('single_article_contact_shop') == true): ?>
						<?php get_template_part( 'template-parts/single/single', 'contact' ); ?>
						<?php endif; ?>
						<?php endif; ?>

					</div>
				</div>
				<?php endwhile; ?>
                <div class="ceo-side-lie-y ceo-width-expand sidebar-column">
                    <?php get_template_part( 'template-parts/single/shop/sidebar/sidebar', 'shouquan' ); ?>
                    <style>.sidebar .user-info{display: none}</style>
                	<?php get_sidebar(); ?>
                </div>
			</div>

		</div>
		<!--内页专题-->
		<?php if(_ceo('single_article_relevant') == true): ?>
		<?php if(_ceo('single_article_relevant_shop') == true): ?>
		<?php get_template_part( 'template-parts/single/single', 'foorelevant' ); ?>
		<?php endif; ?>
		<?php endif; ?>
	</section>
</main>
<?php
wp_enqueue_script('ceoshop',get_template_directory_uri().'/static/js/ceoshop.js');
?>
<?php get_footer(); ?>
