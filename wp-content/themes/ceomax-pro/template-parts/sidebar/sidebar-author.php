<?php
	$user_id  = get_the_author_ID();
	$args = array(
	'post_author' => $user_id
	);
	$author_comments = get_comments($args);
?>
<?php if(is_single()) : ?>
<section class="side-author b-a b-r-4 ceo-background-default ceo-overflow-hidden ceo-margin-bottom">
	<div class="user-info ceo-padding-small ceo-position-relative">
		<div class="ceo-position-relative ceo-position-z-index">
			<div class="avatar ceo-text-center">
				<?php echo get_avatar( get_the_author_meta( 'ID' ),'100' ); ?>
			</div>
			<div class="ceo-text-center">
				<p class="ceo-text-bolder ceo-margin-small-top ceo-margin-small-bottom ceo-h4"><?php the_author_posts_link(); ?></p>
				<p class="ceo-text-small ceo-text-muted ceo-margin-small-top ceo-margin-bottom-10">
					<?php echo the_author_meta('description');?>
				</p>
			</div>
		</div>
		<?php if(_ceo('side_author_lx') == true): ?>
		<div class="ceo-text-center ceo-author-a-admin">
            <a class="qq" href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_the_author_meta('qq',$user_id); ?>&amp;site=qq&amp;menu=yes" ceo-tooltip="<?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_qq']; ?>" target="_blank" rel="nofollow"><i class="ceofont <?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_qqtb']; ?>"> <?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_qq']; ?></i>
            </a>
            <a class="wx" ceo-toggle="target: #weixin" ceo-tooltip="<?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wx']; ?>" rel="nofollow"><i class="ceofont <?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wxtb']; ?>"> <?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wx']; ?></i>
            </a>
            <div id="weixin" ceo-modal>
                <div class="ceo-modal-dialog ceo-modal-body ceo-text-center">
                    <div class="section-title b-b ceo-padding-bottom-10 ceo-margin-bottom">
                        <h3 class="ceo-display-block"><?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wx']; ?></h3>
                    </div>
                    <img src="<?php echo get_user_meta( $user_id , 'weixin' , true ); ?>">
                </div>
            </div>
			<a class="wb" href="<?php echo the_author_meta( 'weibo', $user_id); ?>" ceo-tooltip="<?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wb']; ?>" target="_blank" rel="nofollow"><i class="ceofont <?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wbtb']; ?>"><?php if(_ceo('side_author_lxsz'))echo _ceo('side_author_lxsz')['author_lx_wb']; ?></i></a>
        </div>
        <?php endif; ?>
        <?php if( _ceo('side_author_statistics') == true ): ?>
		<div class="side-author-count ceo-margin-top ceo-position-relative ceo-position-z-index">
			<ul class="ceo-grid-collapse" ceo-grid>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php echo count_user_posts($user_id); ?></p>
						<span>文章</span>
					</div>
				</li>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php echo cx_posts_views($user_id); ?></p>
						<span>浏览</span>
					</div>
				</li>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php echo count_collection_posts($user_id) ?></p>
						<span>收藏</span>
					</div>
				</li>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php echo count($author_comments); ?></p>
						<span>评论</span>
					</div>
				</li>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php echo $count_tags = wp_count_terms('post_tag'); ?></p>
						<span>标签</span>
					</div>
				</li>
				<li class="ceo-width-1-3 ceo-display-inline-block ceo-text-center">
					<div class="item ceo-background-default ">
						<p class="ceo-h4 ceo-margin-remove"><?php $count_pages = wp_count_posts('page'); echo $page_posts = $count_pages->publish; ?></p>
						<span>分类</span>
					</div>
				</li>

			</ul>
		</div>
		<?php endif; ?>
		<?php if ( _ceo('side_author_gzsx') == true): ?>
        <div class="ceo-gzsxbtn-box">
            <div class="ceo-grid-small btn-follow-div" ceo-grid>
                <?php do_action('ceo_profile_after_description', $author);?>
                <div class="ceo-width-1-3">
                    <a href="<?php echo get_author_posts_url( $user_id, get_userdata($user_id)->user_nicename ); ?>" target="_blank" class="ceo-zybtn" rel="noreferrer nofollow"><i class="ceofont ceoicon-user-add-line"></i>进主页</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
	</div>
	
	<?php if( _ceo('side_author_latest') == true ): ?>
	<div class="side-author-latest ceo-background-default ceo-padding-small">
		<div class="b-b ceo-padding-top-small ceo-padding-remove-horizontal ceo-clearfix  ceo-flex ceo-flex-middle">
			<span class="side-title <?php if(_ceo('side_title_style') == true): ?>side-title-style<?php endif; ?> ceo-h5 ceo-float-left ceo-margin-remove ceo-position-relative"><?php echo _ceo('side_author_latest_title');  ?></span>
			<span class="home-time ceo-float-right ceo-display-inline-block ceo-text-muted ceo-text-small ceo-flex-1 ceo-text-right"></span>
		</div>

		<?php
		$side_author_latest_num = _ceo('side_author_latest_num');
		$query = new WP_Query(
			array(
				'author' => $post->post_author,
				'posts_per_page' => $side_author_latest_num,
				'post__not_in' => array($post->ID),
			)
		);
		$posts = $query->posts;
		?>
		<ul class="ceo-padding-remove ceo-margin-remove-bottom">
			<?php foreach($posts as $k => $p): ?>
			<li class="ceo-margin-small-bottom ceo-position-relative">
				<span><?php if( _ceo('side_author_date') == true ): ?><?php echo get_the_time('Y-m-d',$p) ?><?php endif; ?></span>
				<a href="<?php echo get_permalink($p->ID); ?>" target="_blank" class="ceo-display-block"><?php echo $p->post_title ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

</section>
<?php endif ?>