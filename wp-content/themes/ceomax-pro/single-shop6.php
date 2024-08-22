<?php
	get_header();
	$post_id =  get_the_ID();
	$single_gg = _ceo('single_ad');
	$meta = get_post_meta( get_the_ID(), 'my_post_options', true );

	function singleShop6ImgExtra($content) {
		// 提取所有的图片链接
		preg_match_all('#<img (.*?)/>#', $content, $matchesImg);

		// 提取所有的包裹标签
		$pattern = '/(\[ceo-(payment|login|comment)-hide.*?\]).*?(\[\/ceo-\2-hide\])/s';
		preg_match_all($pattern, $content, $matchesHide);

		// 计算包裹标签的范围
		$hideParts = $matchesHide[0];
		$hidePositions = [];
		foreach ($hideParts as $index => $part) {
			$startPos = strpos($content, $part);
			$endPos = $startPos + strlen($part) - 1;
			$hidePositions[] = [
				'start' => $startPos,
				'end' => $endPos,
				'wrapStart' => $matchesHide[1][$index],
				'wrapEnd' => $matchesHide[3][$index],
			];
		}

		// 计算图片链接位置
		$imgTags = $matchesImg[0];
		$imgPositions = [];
		$prevEndPos = 0;
		foreach ($imgTags as $tag) {
			// 使用上次匹配末尾的位置，避免图片链接相同引起的多次匹配
			$startPos = strpos($content, $tag, $prevEndPos);
			$endPos = $startPos + strlen($tag) - 1;
			$isWrapped = false;
			$isWrapRes = [];

			// 判断是否存在于任一包裹标签内
			foreach ($hidePositions as $position) {
				if ($startPos >= $position['start'] && $endPos <= $position['end']) {
					$isWrapped = true;
					$isWrapRes = $position;
					break;
				}
			}

			if ($isWrapped) {
				$imgPositions[] = $isWrapRes['wrapStart'] . $tag . $isWrapRes['wrapEnd'];
			} else {
				$imgPositions[] = $tag;
			}

			$prevEndPos = $endPos + 1;
		}

		return $imgPositions;
	}

?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="beijing ceo-background-contain ceo-background-top-center ceo-background-norepeat" <?php if(_ceo('single_picture') == true): ?> style="background-image: url(<?php echo _ceo('single_picture_img'); ?>);"<?php endif; ?>>

		<div class="ceo-container ceo-margin-medium-bottom">
            <?php get_template_part( 'template-parts/single/single', 'breadcrumbs' ); ?>
			<div class="ceo-side-lie ceo-margin-top-20" ceo-grid>
				<div class="ceo-side-lie-z single ceo-width-auto">
				    <?php if ( wp_is_mobile() ){ ?>
				    <?php get_template_part( 'template-parts/single/shop/ceo', 'app-shop' ); ?>
				    <?php } ?>
					<div class="">
						<div class=" b-a b-r-4 single-warp ceo-overflow-hidden ceo-background-default ceo-margin-bottom ceo-padding-remove-bottom">

                    		<!--文章标题模块-->
                    		<div class="ceo-app-shop2-bt ceo-background-default b-b ceo-margin-bottom-30">
                    			<div class=" ceo-container ceo-text-small ceo-single-padding">
                    				<header class="single-head">
                    					<h1 class="ceo-h15 ceo-margin-bottom-20" title="<?php the_title(); ?>">
                    					<?php get_template_part( 'template-parts/single/single', 'biaoqian' ); ?>
                            			<?php the_title(); ?>
                            			</h1>
                    					<div class="ceo-text-small ceo-text-muted ceo-flex ceo-text-truncate ceo-overflow-auto">
                    					    <div class="avatar ceo-flex ceo-flex-1 ceo-flex-middle ceo-single-right">
                        					    <?php if(_ceo('ceoshop_single_rq_zz') == true): ?>
                        					    <span class="ceo-text-small ceo-display-block ceo-single-right"><i class="ceofont ceoicon-shield-user-line"></i> <?php the_author_posts_link(); ?></span>
                        					    <?php endif; ?>

                        						<?php if(_ceo('ceoshop_single_cat') == true): ?>
                        						<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-list-check"></i> <?php
                        						$category = get_the_category();
                        						if($category[0]){
                        							echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                        						}
                        						?></span>
                        						<?php endif; ?>
                        						<?php if(_ceo('ceoshop_single_bj_bianji') == true): ?>
                        						<span class="ceo-display-inline-block ceo-flex ceo-flex-middle"><?php edit_post_link('<i class="ceofont ceoicon-edit-2-line"></i> 编辑'); ?></span>
                        						<?php endif; ?>
                    					    </div>


                    					    <?php if(_ceo('ceoshop_single_rq_fabu') == true): ?>
                    						<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
                    						<?php endif; ?>

                    						<?php if(_ceo('ceoshop_single_sc_num') == true): ?>
                    						<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-star-line"></i> <?php echo count_collection_current_post( $post_id ) ?></span>
                    						<?php endif; ?>

                    						<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
                    						<span class="ceo-display-inline-block ceo-single-right ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
                    						<?php endif; ?>

                    					</div>
                    				</header>
                    			</div>
                    		</div>
            				<!--文章标题模块-->

							<!--文章内容模块-->
							<article class="single-content shop6-content" id="contentstart">
							    <?php get_template_part( 'template-parts/ad/single', 'top_ad' ); ?>
                                <?php
                                //判断是否开启的图片主题功能
                                if(get_post_meta(get_the_ID(),'image_pagination',1)){
                                    $imagepage_per = get_post_meta(get_the_ID(), 'image_pagination_num', 1);
                                    $content=get_the_content();
                                    
                                    if ($imagepage_per >= 1) {
                                        preg_match_all('#<img (.*?)/>#', $content, $img_arrs);
                                        $page_current = ! empty($_GET['n']) ? $_GET['n'] : 1;
                                        if (is_array($img_arrs[0])) {
                                            $img_arrs_list = $img_arrs[0];
                                            $url = get_permalink();
                                            $echo_img_arr  = array_slice($img_arrs_list, ($page_current-1)*$imagepage_per, $imagepage_per);
                                            if ($echo_img_arr) {

												// 隐藏内容重新计算
												$echo_img_arr = singleShop6ImgExtra($content);
												$echo_img_arr = array_slice($echo_img_arr, ($page_current-1)*$imagepage_per, $imagepage_per);

                                                $content = implode('', $echo_img_arr);
                                                $content = '<a class="ceo_shop6_images" href="' . get_imagepage_nexturl($url, $page_current,$imagepage_per, $img_arrs_list) . '" title="点击图片查看下一页">' . $content . '</a>';
                                            }
                                        }
                                    }
                                }else{
                                    $content=get_the_content();
                                }
                                ?>
                                <div class="ceo_shop6_img_box">
                                    <a href="<?php echo get_imagepage_preurl($url, $page_current,$imagepage_per, $img_arrs_list); ?>" title="上一页" class="pre-cat"><i class="ceofont ceoicon-arrow-left-s-line"></i></a>
                                    <a href="<?php echo get_imagepage_nexturl($url, $page_current,$imagepage_per, $img_arrs_list); ?>" title="下一页" class="next-cat"><i class="ceofont ceoicon-arrow-right-s-line"></i></a>
                                    <div class="ceo_shop6_imgmk">
                                        <p>
                                            <?php
                                            echo apply_filters( 'the_content', $content );
                                            ?>
                                        </p>
                                        <div class="nav-links ceo_shop6_page_imges">
                                            <?php echo get_imagepage_list($url, $page_current,$imagepage_per, $img_arrs_list); ?>
                                        </div>
                                    </div>
                                    <div class="image_div image_postall" id="image_div_all"></div>
                                </div>
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
                    <?php get_template_part( 'template-parts/single/shop/ceo', 'shop6' ); ?>
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
<?php get_footer(); ?>