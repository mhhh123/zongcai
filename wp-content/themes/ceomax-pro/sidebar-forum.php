<?php
    global $wpdb;
?>
<div class="sidebar ceo-width-1-1 ceo-width-expand@s">
	<div class="theiaStickySidebar">

	    <!--广告模块-->
	    <div class="ceo-sidebar-forum-ad ceo-background-default ceo-margin-bottom b-a b-r-4">
	        <a href="<?php echo _ceo('forum_sidebar_ad_link'); ?>" target="_blank">
	            <img src="<?php echo _ceo('forum_sidebar_ad'); ?>" alt="<?php echo _ceo('forum_sidebar_ad_title'); ?>">
            </a>
	    </div>

        <!--搜索模块-->
        <div class="ceo-sidebar-forum-search ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-forum-title">搜索帖子</div>
        	<form method="get" class="ceo-form" action="<?php echo esc_url( get_post_type_archive_link( 'forum' ) ); ?>">
                <input type="hidden" name="post_type" value="forum" />
        		<input type="text" class="b-r-4 ceo-input user-text-small" placeholder="请输入关键词搜索" autocomplete="off" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : '';?>" name="search" required="required">
        	</form>
        	<div class="ceo-sidebar-forum-tag">
        	    <div class="ceo-grid-small" ceo-grid>
                	<?php ceo_sidebar_forum_tag(); ?>
            	</div>
        	</div>
        </div>

        <!--达人模块-->
        <div class="ceo-sidebar-forum-knowledge ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-forum-title">明星会员</div>
        	<div class="ceo-sidebar-forum-knowledge-mk">
            	<?php ceo_sidebar_forum_dr(); ?>
        	</div>
    	</div>

        <!--热门模块-->
        <div class="ceo-sidebar-forum-new ceo-background-default ceo-margin-bottom b-a b-r-4">
            <div class="ceo-sidebar-forum-title">热门帖子</div>
        	<ul class="forum-new-box">
        	<?php
        	$_args = array(
        	    'post_type' => 'forum',
        	    'meta_key'  => 'views',
        	    'orderby'   => 'meta_value_num',
        	    'posts_per_page' => 5,
        	);
        	?>

        	<?php $PostData = new WP_Query( $_args );
        	if ( $PostData->have_posts() ) { ?>
        		<?php while ( $PostData->have_posts() ) : $PostData->the_post(); ?>
    			<article class="forum-new-box-item">
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