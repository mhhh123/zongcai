<?php if(_ceo('single_author') == true): ?>
<div class="ceo-background-default b-b ceo-margin-bottom b-r-4">
	<div class="ceo-text-small ceo-panding-s">
		<div class="single-head">
			<div class="ceo-text-small ceo-text-muted ceo-flex ceo-text-truncate ceo-overflow-auto">
				<div class="avatar ceo-flex-1 ceo-flex ceo-flex-middle ceo-avatar-t">
				    <?php if(_ceo('single_author_tx') == true): ?>
					<?php echo get_avatar(get_the_author_meta( 'ID' ), 20); ?>
					<?php endif; ?>
					<?php if(_ceo('single_author_mc') == true): ?>
					<span class="ceo-text-small ceo-display-block ceo-margin-small-left"><?php the_author_posts_link(); ?></span>
					<?php endif; ?>
					<?php if(_ceo('single_author_qm') == true): ?>
					<p><?php echo the_author_meta('description');?></p>
					<?php endif; ?>

					<?php if(_ceo('poster_share_open') == true): ?>
                    <div class="poster-share-ico">
                        <a class="btn-bigger-cover j-mobile-share" data-nonce="<?php echo wp_create_nonce('mi-create-bigger-image-'.$post->ID );?>" data-qrcode="<?php echo get_the_permalink(); ?>" data-id="<?php echo $post->ID; ?>" data-action="create-bigger-image" id="bigger-cover" href="javascript:;">
                            <i class="ceofont ceoicon-image-line"></i> <span>生成海报</span></a>
                    </div>
                    <?php  endif; ?>

                    <?php if(_ceo('single_author_lj') == true): ?>
					<button id="TKLS" class="ceo-text-fz itemCopy red_tkl button_tkl" type="button" data-clipboard-text="<?php the_title(); ?>：<?php the_permalink() ?>"><i class="ceofont ceoicon-attachment-2"></i>复制本文链接</button>
					<?php endif; ?>
					<?php if(_ceo('single_author_fx') == true): ?>
            		<div class="share">
                        <?php
							$qrcode = ''.get_bloginfo('template_directory').'/inc/qrcode?data='.get_the_permalink().'';
							$post_url = esc_url(get_permalink());
							$post_title = esc_attr(get_the_title());
							$post_desc = wp_trim_words( get_the_content(), 30 );
						?>
						<a class="weixin-share ceo-display-inline-block ceo-fx-weixin" href="<?php echo $qrcode; ?>" ceo-tooltip="分享到微信" data-image="<?php echo esc_attr($post_image); ?>" target="_blank"><i class="ceofont ceoicon-wechat-fill"></i></a>
						<a class="ceo-display-inline-block ceo-fx-qq" href="http://connect.qq.com/widget/shareqq/index.html?url=<?php echo $post_url; ?>&sharesource=qzone&title=<?php echo $post_title; ?>&pics=<?php echo post_thumbnail_src(); ?>&summary=<?php echo $post_desc; ?>"  ceo-tooltip="分享到QQ好友/QQ空间" target="_blank"><i class="ceofont ceoicon-qq-fill"></i></a>
						<a class="ceo-display-inline-block ceo-fx-weibo" href="http://service.weibo.com/share/mobile.php?url=<?php echo $post_url; ?>&title=<?php echo $post_title ?> - <?php bloginfo('name'); ?>&appkey=3313789115" ceo-tooltip="分享到微博" target="_blank"><i class="ceofont ceoicon-weibo-fill"></i></a>
            		</div>
            		<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</div>

<script src="<?php bloginfo('template_url'); ?>/static/js/clipboard.min.js" type="text/javascript"></script>
<script>
var clipboard = new Clipboard('.itemCopy');
clipboard.on('success',
function(e) {
    if (e.trigger.disabled == false || e.trigger.disabled == undefined) {
        e.trigger.innerHTML = "<i class='ceofont ceoicon-attachment-2'></i>链接复制成功";
        e.trigger.disabled = true;
        setTimeout(function() {
            e.trigger.innerHTML = "<i class='ceofont ceoicon-attachment-2'></i>复制本文链接";
            e.trigger.disabled = false;
        },
        2000);
    }
});
clipboard.on('error',
function(e) {
    e.trigger.innerHTML = "链接复制失败";
});
</script>
<?php endif; ?>