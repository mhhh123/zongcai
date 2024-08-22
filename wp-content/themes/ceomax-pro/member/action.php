<?php
$member_btn = _ceo('ceo_user_member_btn_set');
$action = get_query_var('action') ?: 'center';

get_header();

$action_file = get_template_directory() . '/member/action/' . $action . '.php';

$args = array(
	'post_author' => $user_id
);
$author_comments = get_comments($args);

$userId = get_current_user_id();
$isVip = CeoShopCoreUser::getVipGradeId($userId) != -1;

?>
<section class="ceo-container">
	<div class="member-main">
		<div class="ceo-grid-ceosmls" ceo-grid>
			<div class="ceo-width-1-1 ceo-width-1-4@s sidebar">
				<div class="theiaStickySidebar">
					<div class="member-module b-b ceo-background-default">
						<?php if (_ceo('ceo_shop_sign_in')) : ?>
							<a href="javascript:void(0)" class="btn-ceo-sign ceo-sign member-sign" data-style="slide-down">签到</a>
						<?php endif; ?>
						<div class="ceo-text-center member-img">
							<div class="img">
								<?php echo get_avatar($user_id, 100); ?>
								<?php if (user_can($user_id, 'author') || user_can($user_id, 'editor') || user_can($user_id, 'administrator')) { ?>
									<i ceo-tooltip="认证作者"></i>
								<?php } ?>
							</div>
						</div>
						<div class="member-text ceo-text-center">
							<p class="member-name"><a href="<?php echo get_author_posts_url($user_id, get_userdata($user_id)->user_nicename); ?>"><?php echo $current_user->display_name; ?></a></p>
							<?php if (!$isVip) : ?>
								<p class="member-desc-n"><i class="ceofont ceoicon-vip-crown-2-line"></i>您还不是VIP会员<a href="javascript:void(0)" class="btn-ceo-svip">升级</a></p>
							<?php else : ?>
								<p class="member-desc-v" ceo-tooltip="有效期至：<?php echo substr(CeoShopCoreUser::getVipTerm($userId), 0, 10) ?>"><i class="ceofont ceoicon-vip-crown-2-line"></i>您目前是<?php echo CeoShopCoreUser::getVipGrade($userId) ?></p>
							<?php endif; ?>
							<?php if (_ceo('ceo_user_member_btn') == true) : ?>
								<div class="ceo-grid-small" ceo-grid>
									<div class="ceo-width-1-2">
										<a href="<?php echo $member_btn['link1'] ?>" class="member-btn1">
											<i class="ceofont <?php echo $member_btn['icon1'] ?>"></i> <?php echo $member_btn['title1'] ?>
										</a>
									</div>
									<div class="ceo-width-1-2">
									    <a href="<?php echo $member_btn['link2'] ?>" class="member-btn2">
											<i class="ceofont <?php echo $member_btn['icon2'] ?>"></i> <?php echo $member_btn['title2'] ?>
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="member-data ceo-background-default">
						<ul class="member-nav">
							<li class="<?php if ($action == 'center') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/center')); ?>">
									商城中心
								</a>
							</li>
							<li class="<?php if ($action == 'property' || $action == 'integral' || $action == 'task') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/property')); ?>">
									我的资产
								</a>
							</li>
							<li class="<?php if ($action == 'order' || $action == 'viporder') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/order')); ?>">
									我的订单
								</a>
							</li>
							<li class="<?php if ($action == 'download') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/download')); ?>">
									我的下载
								</a>
							</li>
							<li class="<?php if ($action == 'card' || $action == 'vipcard') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/card')); ?>">
									我的卡券
								</a>
							</li>
							<li class="<?php if ($action == 'reward' || $action == 'promotion' || $action == 'commission') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/reward')); ?>">
									我的推广
								</a>
							</li>
							<li class="<?php if ($action == 'income' || $action == 'withdrawal') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/income')); ?>">
									我的收益
								</a>
							</li>
							<li class="<?php if ($action == 'feedback' || $action == 'add_feedback' || $action == 'reply_feedback') echo 'active'; ?>">
								<a href="<?php echo home_url(user_trailingslashit('/member/feedback')); ?>">
									我的工单
								</a>
							</li>
							<!--<li class="<?php //if ($action == 'authentication') echo 'active'; ?>">-->
							<!--	<a href="<?php //echo home_url(user_trailingslashit('/member/authentication')); ?>">-->
							<!--		我的认证-->
							<!--	</a>-->
							<!--</li>-->
							<li>
								<a href="<?php echo wp_logout_url(home_url()); ?>">退出登录</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="ceo-width-1-1 ceo-width-3-4@s">
				<div class="member-content">
					<?php
					if ($action == 'feedback' || $action == 'add_feedback' || $action == 'reply_feedback') {
					    get_template_part('pages/feedback/' . $action);
					} else {
				    	if (!is_file($action_file)) {
    						include(get_template_directory() . '/member/action/center.php'); //用户中心默认页面
    					} else {
    						include($action_file);
    					}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>