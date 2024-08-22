<?php
require_once 'alipay-sdk/AopClient.php';

// 支付宝沙箱配置
$appId = '你的沙箱app_id';
$alipayPublicKey = file_get_contents('path/to/alipay_public_key.pem');

$aop = new AopClient();
$aop->alipayrsaPublicKey = $alipayPublicKey;

$arr = $_POST;
$flag = $aop->rsaCheckV1($arr, $alipayPublicKey, "RSA2");

if ($flag && $_POST['trade_status'] == 'TRADE_SUCCESS') {
    // 支付成功后的逻辑
    $device_code = $_POST['body'];
    $activation_code = $device_code + (8 * 9 / 3);

    // 你可以在这里保存激活码或其他订单信息到数据库
    // ...

    echo "success";
} else {
    echo "fail";
}
?>
