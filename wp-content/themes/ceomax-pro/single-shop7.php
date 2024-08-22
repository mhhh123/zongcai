<?php
	get_header();
	$single_gg = _ceo('single_ad');
	$post_id =  get_the_ID();
	$meta = get_post_meta( get_the_ID(), 'my_post_options', true );
?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="beijing ceo-background-contain ceo-background-top-center ceo-background-norepeat" <?php if(_ceo('single_picture') == true): ?> style="background-image: url(<?php echo _ceo('single_picture_img'); ?>);"<?php endif; ?>>

		<div class="ceo-container ceo-margin-medium-bottom">
            <?php get_template_part( 'template-parts/single/single', 'breadcrumbs' ); ?>
			<div class="ceo-side-lie ceo-margin-top-20" ceo-grid>
				<div class="ceo-side-lie-z single ceo-width-auto">
					<div class="">
						<div class="b-a b-r-4 single-warp ceo-overflow-hidden ceo-background-default ceo-margin-bottom ceo-padding-remove-bottom">

                    		<!--文章标题模块-->
                    		<div class="ceo-background-default b-b ceo-margin-bottom-30">
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
                    						<span class="ceo-display-inline-block ceo-single-left ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?></span>
                    						<?php endif; ?>

                    						<?php if(_ceo('ceoshop_single_sc_num') == true): ?>
                    						<span class="ceo-display-inline-block ceo-single-left ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-star-line"></i> <?php echo count_collection_current_post( $post_id ) ?></span>
                    						<?php endif; ?>

                    						<?php if(_ceo('ceoshop_single_ll_liulan') == true): ?>
                    						<span class="ceo-display-inline-block ceo-single-left ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?></span>
                    						<?php endif; ?>

                    					</div>
                    				</header>
                    			</div>
                    		</div>
            				<!--文章标题模块-->

							<!--文章内容模块-->
							<article class="single-content" id="contentstart">
							    <?php get_template_part( 'template-parts/ad/single', 'top_ad' ); ?>
                                <?php get_template_part( 'template-parts/single/single', 'video' ); ?>
                                <?php
                                if(get_post_meta(get_the_ID(),"enable_audio",1)){
                                    get_template_part( 'template-parts/single/single', 'music' );
                                }
                                ?>
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
                    <?php get_template_part( 'template-parts/single/shop/ceo', 'shop7' ); ?>
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