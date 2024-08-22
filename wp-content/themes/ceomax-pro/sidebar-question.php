<?php
    global $wpdb;
?>
<div class="sidebar-column ceo-width-1-1 ceo-width-expand@s">
	<div class="theiaStickySidebar">

	    <!--广告模块-->
	    <div class="ceo-sidebar-question-ad ceo-background-default ceo-margin-bottom b-a b-r-4">
	        <a href="<?php echo _ceo('question_sidebar_ad_link'); ?>" target="_blank">
	            <img src="<?php echo _ceo('question_sidebar_ad'); ?>" alt="<?php echo _ceo('question_sidebar_ad_title'); ?>">
            </a>
	    </div>

	    <!--统计模块-->
        <div class="ceo-sidebar-question-statistics ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-question-title">数据统计</div>
            <div class="question-statistics-box">
                <div class="ceo-grid-small" ceo-grid>
                    <div class="ceo-width-1-2">
                        <div class="statistics-box-c">
                            <span class="wdtj"><?php ceo_sidebar_question_count(); ?></span>
                            <p>个问题</p>
                        </div>
                    </div>
                    <div class="ceo-width-1-2">
                        <div class="statistics-box-c">
                            <span><?php echo get_all_comments_of_post_type("question"); ?></span>
                            <p>条回答</p>
                        </div>
                    </div>
                </div>
                <div class="statistics-box-d">
                    <div class="ceo-grid-small" ceo-grid>
                        <?php if( is_user_logged_in() ){ ?>
                        <div class="ceo-width-1-2 ceo-width-1-3@s">
                            <div class="statistics-box-1">
                                <a href="/question?type=ask">我要提问</a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="ceo-width-1-2 ceo-width-1-3@s">
                            <div class="statistics-box-1">
                                <a href="#modal-login" ceo-toggle>我要提问</a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="ceo-width-1-2 ceo-width-1-3@s">
                            <div class="statistics-box-2">
                                <a href="/question?type=uncomment">我要回答</a>
                            </div>
                        </div>
                        <div class="ceo-width-1-1 ceo-width-1-3@s">
                            <div class="statistics-box-3">
                                <a href="/user/question">我的提问</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--搜索模块-->
        <div class="ceo-sidebar-question-search ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-question-title">搜索问题</div>
        	<form method="get" class="ceo-form" action="<?php echo esc_url( get_post_type_archive_link( 'question' ) ); ?>">
                <input type="hidden" name="post_type" value="question" />
        		<input type="text" class="b-r-4 ceo-input user-text-small" placeholder="请输入关键词搜索" autocomplete="off" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : '';?>" name="search" required="required">
        	</form>
        	<div class="ceo-sidebar-question-tag">
        	    <div class="ceo-grid-small" ceo-grid>
                	<?php ceo_sidebar_question_tag(); ?>
            	</div>
        	</div>
        </div>

        <!--达人模块-->
        <div class="ceo-sidebar-question-knowledge ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-question-title">知识达人</div>
        	<div class="ceo-sidebar-question-knowledge-mk">
        	    <?php ceo_sidebar_question_dr(); ?>
        	</div>
    	</div>

        <!--热门模块-->
        <div class="ceo-sidebar-question-new ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-question-title">热门问题</div>
        	<ul class="question-new-box">
        	<?php
        	$_args = array(
        	    'post_type' => 'question',
        	    'meta_key'  => 'views',
        	    'orderby'   => 'meta_value_num',
        	    'posts_per_page' => 5,
        	); ?>

        	<?php $PostData = new WP_Query( $_args );
        	if ( $PostData->have_posts() ) { ?>
        		<?php while ( $PostData->have_posts() ) : $PostData->the_post(); ?>
    			<article class="question-new-box-item">
                	<a href="<?php the_permalink(); ?>" <?php echo _target_blank();?> title="<?php the_title(); ?>" class="ceo-display-block ceo-text-truncate"><i></i><?php the_title(); ?></a>
                  	<div class="item">
                  	    <div class="info ceo-flex ceo-text-small ceo-text-truncate">
                        	<span class="ceo-flex-1"><i class="ceofont ceoicon-calendar-todo-line"></i><?php the_time('Y-m-d') ?></span>
                        	<span><i class="ceofont ceoicon-eye-line"></i><?php post_views('', ''); ?></span>
                		</div>
                	</div>
                </article>
        		<?php endwhile; ?>
        	<?php } ?>
        	</ul>
        </div>
	</div>
</div>