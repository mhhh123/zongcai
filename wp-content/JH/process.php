<?php
// 定义字母映射表
$letter_mapping = [
    'A' => 1, 'B' => 76, 'C' => 62, 'D' => 56, 'E' => 52, 'F' => 45, 
    'G' => 25, 'H' => 32, 'I' => 88, 'J' => 9, 'K' => 8, 'L' => 21, 
    'M' => 49, 'N' => 24, 'O' => 87, 'P' => 65, 'Q' => 64, 'R' => 13, 
    'S' => 20, 'T' => 33, 'U' => 86, 'V' => 72, 'W' => 74, 'X' => 52, 
    'Y' => 51, 'Z' => 2
];

// 定义数字映射表
$digit_mapping = [
    '0' => 0, '1' => 1, '2' => 3, '3' => 5, '4' => 7, '5' => 9, 
    '6' => 2, '7' => 4, '8' => 6, '9' => 8
];

$activation_code = "0000";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $captcha = strtoupper($_POST['captcha']);
    $total_sum = 0;

    foreach (str_split($captcha) as $char) {
        if (ctype_digit($char)) {
            $total_sum += $digit_mapping[$char];
        } elseif (ctype_alpha($char)) {
            $total_sum += $letter_mapping[$char];
        }
    }

    $operator1 = '+';
    $number1 = 99;
    $operator2 = '*';
    $number2 = 88;

    $activation_code = eval("return ($total_sum $operator1 $number1) $operator2 $number2;");

    $rounding_method = '取整数前位数';
    $padding_method = '不足末位补0';

    $activation_code = strval($activation_code);

    if ($rounding_method === '取整数前位数') {
        $activation_code = substr($activation_code, 0, 4);
    } elseif ($rounding_method === '取整数后位数') {
        $activation_code = substr($activation_code, -4);
    }

    if ($padding_method === '不足末位补0') {
        $activation_code = str_pad($activation_code, 4, '0', STR_PAD_RIGHT);
    } elseif ($padding_method === '不足前位补0') {
        $activation_code = str_pad($activation_code, 4, '0', STR_PAD_LEFT);
    }
}

// 将激活码传递到HTML页面
header('Content-Type: text/html');
include 'template_html.php';
?>
