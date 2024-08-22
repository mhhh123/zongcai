<?php
/* Template Name: 我的发布  */

global $wpdb;
$user_id        = get_current_user_id();
$paged = ! empty($_GET["pg"]) ? (int)$_GET["pg"] : 1;

$postStatus = 'publish';
$postType = 'pass';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'pass') {
        $postStatus = 'publish';
        $postType = 'pass';
    } elseif ($_GET['status'] == 'review') {
        $postStatus = 'draft';
        $postType = 'review';
    } elseif ($_GET['status'] == 'reject') {
        $postStatus = 'pending';
        $postType = 'reject';
    }
}

$args = array(
    'post_type'           => 'post',
    'author'             => $user_id,
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => 10,
    'paged'                => $paged,
    'post_status' => $postStatus
);

$keyword = !empty($_GET['keyword']) ? $_GET['keyword'] : '';
if (!empty($keyword)) {
    $args['s'] = $keyword;
}


global $wp_query;
$wp_query = new WP_Query($args);
?>
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <div class="ceo-flex">
            <div class="ceo-flex-1">
                <h2>我的发布</h2>
            </div>
            <style>
                .second-type {
                    font-size: 14px !important;
                    margin: 0 10px;
                }
                .second-active {
                    color: #0a8eff;
                }
            </style>
            <div>
                <a href="?status=pass" class="second-type <?php echo ($postStatus == 'publish') ? 'second-active' : '' ?>">审核通过</a>
                <a href="?status=review" class="second-type <?php echo ($postStatus == 'draft') ? 'second-active' : '' ?>">审核中</a>
                <a href="?status=reject" class="second-type <?php echo ($postStatus == 'pending') ? 'second-active' : '' ?>">审核失败</a>
            </div>
        </div>
    </div>
    <section class="user-box user-side">
        <div class="ceo-margin-bottom">
            <div class="search">
    			<form method="get" class="b-r-4 b-a ceo-form ceo-flex ceo-overflow-hidden search-form">
    			    <input type="hidden" name="status" value="<?php echo $postType ?>">
    				<input type="text" placeholder="输入关键字搜索" autocomplete="off" value="" name="keyword" required="required" class="ceo-input ceo-flex-1 ceo-text-small">
    				<button type="submit"><i class="ceofont ceoicon-search-2-line ceo-text-bolder"></i></button>
    			</form>
    		</div>
        </div>
    	<div class="ceo-container">
    		<div>
    			<?php
    			if( $wp_query && $wp_query->have_posts() ){
    				while( $wp_query->have_posts() ) : $wp_query->the_post();
    			?>
    
    			<div class="ajax-item ceo-width-1-1">
    			<?php get_template_part( 'template-parts/loop/loop', 'user-mypost' ); ?>
    		    </div>
    
    			<?php endwhile; ?>
    
    			<?php }else{ ?>
    
    			<p>抱歉，目前没有发现任何内容～</p>
    			<?php } ?>
    		</div>
            <div class="fenye ceo-text-center ceo-text-small ceo-margin-top ceo-margin-bottom">
                <?php
                $args = array(
                    'prev_next'          => 0,
                    'format'       => '?pg=%#%',
                    'before_page_number' => '',
                    'mid_size'           => 2,
                    'current' => max( 1, $paged ),
                    'prev_next'    => True,
                    'prev_text'    => __('上一页'),
                    'next_text'    => __('下一页'),
                );
                $page_arr=paginate_links($args);
                if ($page_arr) {
                    echo $page_arr;
                }else{
    
                } ?>
            </div>
    	</div>
	</section>
</div>