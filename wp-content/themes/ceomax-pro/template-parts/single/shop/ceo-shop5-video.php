<?php

$productId =  get_the_ID();
$userId = get_current_user_id();
$currentVipId = CeoShopCoreUser::getVipGradeId($userId);

$productInfo = CeoShopCoreProduct::getInfo($productId, $userId);
$productSku = $productInfo[0];

?>
<?php if (!empty($productSku['video_url']) && _ceo('ceoshop_video_logo') == true) : ?>
	<div class="ceo-video-logobox">
		<div class="ceo-video-logo">
			<img src="<?php echo _ceo('ceoshop_video_logo_img'); ?>">
		</div>
	</div>
<?php endif; ?>

<div class="ceo-video-s" id="ceo-video-s">
	<?php echo ceo_shop_pay_change_video_html($productId, 1, $userId) ?>
</div>