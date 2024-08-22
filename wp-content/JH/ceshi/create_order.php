<?php
require_once 'alipay-sdk/AopClient.php';
require_once 'alipay-sdk/request/AlipayTradePagePayRequest.php';

// 支付宝沙箱配置
$appId = '9021000139689839';
$privateKey = file_get_contents('wp-content/JH/ceshi/private_key.pem');
$alipayPublicKey = file_get_contents('wp-content/JH/ceshi/alipay_public_key.pem');
$gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
$returnUrl = 'http://www.ivipic.com/return.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_code = $_POST['device_code'];

    // 初始化支付宝支付客户端
    $aop = new AopClient();
    $aop->gatewayUrl = $gatewayUrl;
    $aop->appId = $appId;
    $aop->rsaPrivateKey = $privateKey;
    $aop->alipayrsaPublicKey = $alipayPublicKey;
    $aop->format = 'json';
    $aop->charset = 'UTF-8';
    $aop->signType = 'RSA2';

    // 创建订单请求
    $request = new AlipayTradePagePayRequest();
    $request->setReturnUrl($returnUrl);
    $request->setNotifyUrl('http://www.ivipic.com/notify.php');

    $order = [
        'out_trade_no' => time() . rand(1000, 9999), // 唯一订单号
        'product_code' => 'FAST_INSTANT_TRADE_PAY',
        'total_amount' => '0.01', // 支付金额
        'subject' => '设备激活码支付',
        'body' => '设备码: ' . $device_code
    ];

    $request->setBizContent(json_encode($order));

    // 执行请求
    $response = $aop->pageExecute($request);

    // 返回支付页面URL
    echo json_encode(['success' => true, 'payment_url' => $response]);
}
?>