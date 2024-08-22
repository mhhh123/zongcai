<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_code = $_POST['device_code'];

    // 简单的计算公式，用户输入的值进行运算 + 8*9/3
    $activation_code = $device_code + (8 * 9 / 3);

    // 返回激活码
    echo htmlspecialchars($activation_code);
}
?>
