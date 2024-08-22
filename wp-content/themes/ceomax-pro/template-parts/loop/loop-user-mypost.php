<?php
$post_id = get_the_ID();
?>
<div class="blog-item side-item b-a ceo-background-default ceo-overflow-hidden ceo-padding-small b-r-4">
	<div class="ceo-grid-collapse" ceo-grid>
	    <div class="ceo-width-1-1@s ceo-width-auto@m ceo-width-auto@l ceo-width-auto@xl ceo-vip-icons">
	        <?php if (_ceo('ceo_cat_viptb') == true && _ceo('ceo_shop_whole') && CeoShopCoreProduct::hasVipFree($post_id)) : ?>
            <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
            <span class="meta-vip-tag"></span>
            <?php endif; ?>
            <?php endif; ?>
			<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="cover b-r-4 ceo-display-block ceo-overflow-hidden ceo-cover-container">
				<img src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" ceo-cover>
			</a>
		</div>
		<div class="ceo-width-1-1@s ceo-width-expand">
			<div class="ceo-cat-side blog-item-content">
			    <div class="ceo-blog-items">
					<h3 class="ceo-text-truncate"><a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> class="title ceo-h4">
					    <?php if(_ceo('ceo_cat_tese') == true ): ?>
	    			    <?php
                        $tese_arr = get_post_meta( get_the_ID(), 'ceo-tese-tag', true );
                        if(!empty($tese_arr)){
                            $ymetaValue = $tese_arr;
                        }else{
                            $ymetaValue='';
                        }
                        
                        if ($ymetaValue == 'default') {
                            $ymetaValue = _ceo('test_tag_default_use');
                        }
        
                        if (($ymetaValue=="remen")) {
                            echo '<div class="ceo-tese-remen"><span class="i">#</span>热门</div>';
                        }
        
                        elseif (($ymetaValue=="dujia")) {
                            echo '<div class="ceo-tese-dujia"><span class="i">#</span>独家</div>';
                        }
        
                        elseif (($ymetaValue=="zuixin")) {
                            echo '<div class="ceo-tese-zuixin"><span class="i">#</span>最新</div>';
                        }
        
                        elseif (($ymetaValue=="tuijian")) {
                            echo '<div class="ceo-tese-tuijian"><span class="i">#</span>推荐</div>';
                        }
        
                        elseif (($ymetaValue=="jingpin")) {
                            echo '<div class="ceo-tese-jingpin"><span class="i">#</span>精品</div>';
                        }
        
                    		elseif (($ymetaValue=="buxuanze")) {
                       	 echo '';
                       	 }
        
                        ?>
                        <?php endif; ?>
					    <?php if (is_sticky()): ?><i class="ceo-tops ceofont ceoicon-medal-line" style="font-size: 22px;"></i><?php endif; ?>
					    <?php get_template_part( 'template-parts/tese/custom', 'tese' ); ?>
					    <?php the_title(); ?>
    				</a></h3>
					<p class="ceo-text-small">
						<?php
                        $get_the_content= preg_replace ( '/\[gallery (.*?)\]/s' , '' , get_the_content() );
                        echo wp_trim_words( $get_the_content, 90 );
                        ?>
					</p>
				</div>
				<div class="item-foot">
				    <?php if(_ceo('ceo_cat_catfl') == true ): ?>
					<div class="cat ceo-margin-bottom ceo-text-truncate">
					    <?php
						$category = get_the_category();
						if($category[0]){
							echo '<a href="'.get_category_link($category[0]->term_id ).'"><i class="ceofont ceoicon-folder-open-line ceo-right-3"></i>'.$category[0]->cat_name.'</a>';
						}
						?>
						<?php echo get_the_tag_list('','');?>
					</div>
					<?php endif; ?>
					<div class="ceo-flex ceo-flex-middle">
						<div class="avatar ceo-flex-1 ceo-flex ceo-flex-middle">
					    <?php if(_ceo('ceo_cat_archive') == true ): ?>
							<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
						<?php endif; ?>
					    <?php if(_ceo('ceo_cat_archive_t') == true ): ?>
							<span class="ceo-text-small ceo-display-block ceo-margin-small-left"><?php the_author_posts_link(); ?></span>
						<?php endif; ?>
						</div>
						
						<div class="ceo-text-small ceo-text-right">
						    <?php if(_ceo('ceo_cat_demo') == true ): ?>
						    <span class="ceo-cat-demo ceo-display-inline-block ceo-flex ceo-flex-middle ceo-margin-right">
						    <?php if(get_post_meta( get_the_ID(), 'down_demourl', true )){?>
                                <a href="<?php echo get_post_meta( get_the_ID(), 'down_demourl', true );?>" target="_blank" rel="noreferrer nofollow">
                                <i class="ceofont ceoicon-computer-line"></i> <?php if(_ceo('ceoshop_single_an'))echo _ceo('ceoshop_single_an')['ceoshop_single_an_ys']; ?>
                                </a>
                            <?php }?>
                            </span>
                            <?php endif; ?>
                            
                            <?php if(_ceo('ceo_cat_archive') == true ): ?>
                                <?php if(true ): ?>
                                    <span class="ceo-display-inline-block ceo-flex ceo-flex-middle ceo-margin-right"><a class="post-edit-link" href="/tougao?post=<?php echo get_the_ID();?>&amp;action=edit"><i class="ceofont ceoicon-edit-2-line"></i> 编辑</a></span>
                                <?php endif; ?>
                			<?php endif; ?>
                			
                            <?php if(_ceo('ceo_cat_riqi') == true ): ?>
							<span class="ceo-display-inline-block ceo-flex ceo-flex-middle ceo-margin-right"><i class="ceofont ceoicon-calendar-todo-line"></i> <?php the_time('Y-m-d') ?>
							</span>
							<?php endif; ?>
							
							<?php if(_ceo('ceo_cat_views') == true ): ?>
							<span class="ceo-display-inline-block ceo-flex ceo-flex-middle"><i class="ceofont ceoicon-eye-line"></i> <?php post_views('', ''); ?>
							</span>
							<?php endif; ?>
							
							<?php if (_ceo('ceo_cat_jiage') == true && _ceo('ceo_shop_whole')) : ?>
                            <?php if (get_current_user_id() > 0 || _ceo('ceo_shop_tourist')) : ?>
                            <?php echo CeoShopCoreProduct::getPriceFormat($post_id, true, true, 1) ?>
                            <?php endif; ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>