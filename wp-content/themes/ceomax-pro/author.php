<?php
get_header();

global $wpdb;
$wpdb->collection = $wpdb->prefix.'collection';
$user_id        = get_the_author_ID();
if(!empty($author)){
    $user_id=$author;
}

$args['user_id'] = $user_id;

$author_comments = get_comments($args);
?>
<section class="ceo-author-bg ceo-background-default ceo-position-relative">
	<div class="bg ceo-background-cover" style="background-image: url(<?php
                    		if(!get_user_meta( $user_id , 'userhomebg' , true )){
                    		    echo  _ceo('user_default_thum');
                    		}else {
                    		echo get_user_meta( $user_id , 'userhomebg' , true );
                    		}
                    		?>);">
	    <div class="ceo-container">
	        <div class="ceo-author-an">
                <div class="ceo-author-anbox">
                    <div class="ceo-grid-small" ceo-grid>
                        <?php do_action('ceo_profile_after_description', $author);?>
                    </div>
                </div>
            </div>
	        <div class="ceo-author-top ceo-position-relative">
            	<div class="ceo-text-center ceo-author-adminimg">
            	    <div class="ceo-author-imgs">
            		    <?php echo get_avatar( $user_id , 100 ); ?>
            			<?php if(user_can(get_the_author_meta( 'ID' ),'author') || user_can(get_the_author_meta( 'ID' ),'editor') || user_can(get_the_author_meta( 'ID' ),'administrator')){ ?>
            			<i ceo-tooltip="认证作者"></i>
                        <?php }?>
        			</div>
            	</div>
        	    <div class="ceo-text-center">
        		    <p class="ceo-author-boxadmin ceo-admin-author"><?php the_author_nickname(); ?></p>
            	    <p class="ceo-author-boxtext">
            	        <?php
                            if(!get_the_author_meta('user_description', $user_id)){
                                echo '这家伙很懒，只想把你留下。';
                            }else {
                                echo the_author_meta('user_description', $user_id);
                            }
                    	?>
            	    </p>
                </div>
                <div class="ceo-author-soc">
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo get_the_author_meta('qq',$user_id); ?>&site=qq&menu=yes" target="_blank" ceo-tooltip="QQ：<?php echo get_the_author_meta('qq',$user_id); ?>"><i class="ceofont ceoicon-qq-fill"></i></a>
                    <a href="#authorwx" ceo-tooltip="微信：<?php echo get_user_meta( $user_id , 'weixin' , true ); ?>" ceo-toggle><i class="ceofont ceoicon-wechat-fill"></i></a>
                    <a href="<?php echo the_author_meta( 'weibo', $user_id); ?>" target="_blank" ceo-tooltip="微博"><i class="ceofont ceoicon-weibo-fill"></i></a>
                    <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php echo the_author_meta( 'user_email', $user_id); ?>" target="_blank" ceo-tooltip="邮箱：<?php echo the_author_meta( 'user_email', $user_id); ?>"><i class="ceofont ceoicon-mail-line"></i></a>
                    <a href=" javacript:void(0);" ceo-tooltip="UID：<?php echo get_the_author_meta('ID',$user_id); ?>"><i class="ceofont ceoicon-account-box-line"></i></a>
            	</div>
            </div>
	    </div>
	</div>
</section>
<section class="ceo-author-countbox ceo-background-default">
    <div class="ceo-container">
        <div class="ceo-grid-collapse" ceo-grid>
            <div class="item ceo-position-relative ceo-text-center ceo-width-1-4">
    			<span>文章 <?php echo count_user_posts($user_id); ?></span>
    		</div>
    		<div class="item ceo-position-relative ceo-text-center ceo-width-1-4">
    			<span>人气 <?php echo cx_posts_views($user_id); ?></span>
    		</div>
    		<div class="item ceo-position-relative ceo-text-center ceo-width-1-4">
    			<span>收藏 <?php echo count_collection_posts($user_id) ?></span>
    		</div>
    		<div class="item ceo-position-relative ceo-text-center ceo-width-1-4">
    			<span>评论 <?php echo count($author_comments); ?></span>
    		</div>
    	</div>
	</div>
</section>
<div class="ceo-margin-medium-bottom">
	<ul class="author-menu ceo-text-center" ceo-switcher>
		<li class="ceo-display-inline-block"><a href="#" class="ceo-display-block ceo-position-relative ceo-padding-small ceo-padding-remove-horizontal">发布</a></li>
		<li class="ceo-display-inline-block"><a href="#" class="ceo-display-block ceo-position-relative ceo-padding-small ceo-padding-remove-horizontal">问题</a></li>
		<li class="ceo-display-inline-block"><a href="#" class="ceo-display-block ceo-position-relative ceo-padding-small ceo-padding-remove-horizontal">帖子</a></li>
		<li class="ceo-display-inline-block"><a href="#" class="ceo-display-block ceo-position-relative ceo-padding-small ceo-padding-remove-horizontal">收藏</a></li>
	</ul>
	<div class="ceo-switcher ceo-margin-medium-top">
		<?php get_template_part( 'template-parts/author/author', 'post' ); ?>
        <?php get_template_part( 'template-parts/author/author', 'question' ); ?>
        <?php get_template_part( 'template-parts/author/author', 'forum' ); ?>
		<?php get_template_part( 'template-parts/author/author', 'collection' ); ?>
	</div>
</div>

<!--用户微信-->
<div id="authorwx" ceo-modal>
    <div class="modal-up-vipbox ceo-modal-dialog ceo-modal-body ceo-text-center ceo-ss-navbar ceo-margin-t-b-auto ceo-background-default">
        <button class="ceo-modal-close-default ceo-modal-close" type="button" ceo-close></button>
        <div class="ceo-wecha-modal section-title b-b ceo-padding-remove-bottom ceo-margin-bottom">
            <h3 class="ceo-display-block ceo-margin-bottom-10">扫码咨询</h3>
        </div>
        <img src="<?php echo get_user_meta( $user_id , 'weixin' , true ); ?>" alt="扫码咨询">
    </div>
</div>
<?php add_action('get_footer', function () { wp_enqueue_script('js2021', get_template_directory_uri() . '/static/js/js21.js', ['jquery']); }); ?>
<?php get_footer(); ?>