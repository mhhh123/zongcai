<div class="ceo-home-statistics">
    <div class="ceo-container">
        <div class="ceo-grid-medium" ceo-grid>
            <div class="ceo-width-1-1 ceo-width-2-3@s">
                <div class="zbox">
                    <div class="ceo-grid-ceossss" ceo-grid>
                        <div class="ceo-width-auto">
                            <div class="titles"><i class="ceofont ceoicon-volume-up-line"></i><span>最新发布</span></div>
                        </div>
                        <div class="ceo-width-expand" id="scrollDiv">
                            <ul>
                                <?php
                            	$post_num = 5; // 显示数量
                            	$args=array(
                            	'post_status' => 'publish',
                            	'paged' => $paged,
                            	'caller_get_posts' => 1,
                            	'posts_per_page' => $post_num
                            	);
                            	query_posts($args);
                            	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <li class="ceo-flex">
                                    <a href="<?php the_permalink(); ?>" target="_blank" class="ceo-flex-1"><?php the_title(); ?></a>
                                    <span class="ceo-visible@s"><i class="ceofont ceoicon-calendar-todo-line"></i><?php echo get_the_date("Y-m-d"); ?></span>
                                    <span><i class="ceofont ceoicon-eye-line"></i><?php echo get_post_meta(get_the_ID(),'views',1); ?></span>
                                </li>
                                <?php endwhile; else: endif; wp_reset_query();?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ceo-width-1-1 ceo-width-1-3@s">
                <div class="ybox">
                    <ul class="ceo-grid-small" ceo-grid>
                        <li class="ceo-width-1-2 ceo-width-1-4@s">
                            <div class="ceo-grid-collapse" ceo-grid>
                                <div class="ceo-width-auto">
                                    <img src="<?php echo get_template_directory_uri().'/static/images/count-icon1.png'; ?>">
                                </div>
                                <div class="ceo-width-expand">
                                    <span><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_huiyuan_count_title']; ?></span>
                                    <p><?php echo all_users_count(); ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="ceo-width-1-2 ceo-width-1-4@s">
                            <div class="ceo-grid-collapse" ceo-grid>
                                <div class="ceo-width-auto">
                                    <img src="<?php echo get_template_directory_uri().'/static/images/count-icon2.png'; ?>">
                                </div>
                                <div class="ceo-width-expand">
                                    <span><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_jinri_count_title']; ?></span>
                                    <p><?php echo DayUpdate()?></p>
                                </div>
                            </div>
                        </li>
                        <li class="ceo-width-1-2 ceo-width-1-4@s">
                            <div class="ceo-grid-collapse" ceo-grid>
                                <div class="ceo-width-auto">
                                    <img src="<?php echo get_template_directory_uri().'/static/images/count-icon3.png'; ?>">
                                </div>
                                <div class="ceo-width-expand">
                                    <span><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_benzhou_count_title']; ?></span>
                                    <p><?php echo get_week_post_count(); ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="ceo-width-1-2 ceo-width-1-4@s">
                            <div class="ceo-grid-collapse" ceo-grid>
                                <div class="ceo-width-auto">
                                    <img src="<?php echo get_template_directory_uri().'/static/images/count-icon4.png'; ?>">
                                </div>
                                <div class="ceo-width-expand">
                                    <span><?php if(_ceo('ceo_footer_count_sz'))echo _ceo('ceo_footer_count_sz')['all_site_count_title']; ?></span>
                                    <p><?php echo all_posts_count();?></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>