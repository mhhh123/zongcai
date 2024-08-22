<?php get_header(); ?>
<main class="ceo-margin-top-30">
<div class="ceo-container ceo-margin-large-top ceo-margin-large-bottom">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="ceo-margin-bottom" ceo-grid>
		<div class="ceo-side-lie-z ceo-width-auto">
			<div class="site-box b-r-4 b-a ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
				<header class="site-title b-b">
					<span class="ceo-display-inline-block"><?php the_title(); ?></span>
				</header>
				<div class="ceo-margin-top ceo-margin-small-bottom" ceo-grid>
					<div class="ceo-text-center ceo-width-1-1@s ceo-width-auto@m ceo-width-auto@l ceo-width-auto@xl">
						<div class="site-box-cover b-r-4 ceo-inline ceo-overflow-hidden">
						    <img src="<?php echo site_thumbnail_src(); ?>" alt="<?php the_title(); ?>" style="filter: blur(5px);" ceo-cover/>
							<div class="ceo-overlay-primary ceo-position-cover ceo-flex ceo-flex-middle ceo-flex-center ceo-overflow-hidden ">
								<div class="site-box-cover-small thumb ceo-cover-container">
								    <img src="<?php echo site_thumbnail_src(); ?>" ceo-cover/>
							    </div>
							</div>
						</div>
					</div>
					<div class="site-content b-r-4 ceo-overflow-hidden ceo-width-1-1@s ceo-width-expand@m ceo-width-expand@l ceo-width-expand@xl">
						<ul class="ceo-background-muted ceo-height-1-1 ceo-overflow-hidden">
							<li><span>名称：</span><?php the_title(); ?></li>
							<li><span>类型：</span><span><?php echo custom_taxonomies_terms_links(); ?></span></li>
							<li><span>访问：</span><a href="<?php echo get_post_meta( get_the_ID(), '_site_director', true ); ?>" target="_blank" rel="nofollow">访问网站<i class="ceofont ceoicon-share-forward-line"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="site-box b-r-4 b-a ceo-background-default ceo-margin-bottom">
			    <div class="site-title b-b">
					<span class="ceo-display-inline-block">网站简介</span>
				</div>
				<div class="single-content ceo-margin-top">
			    <?php the_content(); ?>
			    </div>
		    </div>
        	<?php if(_ceo('comments_close') == true ): ?>	
        	<?php if ( comments_open() || get_comments_number() ) : ?>
        	<?php comments_template( '', true ); ?>
        	<?php endif; ?>
        	<?php endif; ?>
		</div>
		<div class="sidebar-column ceo-side-lie-y ceo-width-expand">
		    <div class="theiaStickySidebar">
    			<div class="site-box b-r-4 b-a ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
    				<div class="site-title b-b">
    					<span class="ceo-display-inline-block">相关站点</span>
    				</div>
    				<div class="site-side ceo-grid-ceosmls ceo-margin-top ceo-margin-small-bottom" ceo-grid>
    					<?php
                        $args_relate= array(
                            'numberposts' => '18', //输出的文章数量
                            'post_type' => 'site',	//自定义文章类型名称
                        );
                        $current_cat = get_the_terms(get_the_ID(), 'sitecat');
                        if(!empty($current_cat[0])){
                            $args_relate['tax_query']=array(
                                'taxonomy' => 'sitecat', //自定义分类法名称
                                'terms'    => $current_cat[0]->term_id,
                            );
                        }
    					$posts = get_posts($args_relate);
    					?>
    					<?php if($posts): foreach($posts as $post): ?>
    					<div class="ceo-width-1-6">
    						<a href="<?php the_permalink(); ?>" target="_blank" class="thumb ceo-cover-container" ceo-tooltip="<?php the_title(); ?>">
    						    <img src="<?php echo site_thumbnail_src(); ?>" alt="<?php the_title(); ?>" ceo-cover/>
						    </a>
    					</div>
    					<?php wp_reset_postdata(); endforeach; endif;?>
    				</div>
    			</div>
    			<div class="site-box b-a b-r-4 ceo-background-default ceo-margin-bottom">
    			    <a href="/user/site" target="_blank" class="change-color site-box-tj">提交我的网站</a>
			    </div>
			</div>
		</div>	
	</div>
	<?php endwhile; ?>
</div>
</main>
<?php get_footer(); ?>