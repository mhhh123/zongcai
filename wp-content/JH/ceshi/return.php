<?php
// 这里处理支付成功后的业务逻辑
// 通常你会验证支付状态并生成激活码

if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
    $device_code = $_GET['body']; // 设备码从订单信息中提取
    $activation_code = $device_code + (8 * 9 / 3); // 简单的激活码计算

    echo "支付成功！你的激活码是: " . htmlspecialchars($activation_code);
} else {
    echo "支付失败或取消，请重试。";
}
?>
