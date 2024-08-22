<?php
/**
 * Plugin Name: Custom Activation Code Plugin
 * Description: A plugin to generate and manage activation codes.
 * Version: 1.0
 * Author: Your Name
 */

// 激活码生成和显示的短代码
function generate_activation_code($atts) {
    // 激活码的映射表
    $letter_mapping = [
        'A' => 1, 'B' => 76, 'C' => 62, 'D' => 56, 'E' => 52, 'F' => 45, 'G' => 25, 'H' => 32,
        'I' => 88, 'J' => 9, 'K' => 8, 'L' => 21, 'M' => 49, 'N' => 24, 'O' => 87, 'P' => 65,
        'Q' => 64, 'R' => 13, 'S' => 20, 'T' => 33, 'U' => 86, 'V' => 72, 'W' => 74, 'X' => 52,
        'Y' => 51, 'Z' => 2
    ];

    $digit_mapping = [
        '0' => 0, '1' => 1, '2' => 3, '3' => 5, '4' => 7, '5' => 9, '6' => 2, '7' => 4, '8' => 6, '9' => 8
    ];

    // 初始化激活码和当前激活使用数
    $activation_code = "0000";
    $current_activation_count = get_option('current_activation_count', 1235);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['captcha'])) {
        $captcha = strtoupper(trim($_POST['captcha']));
        $total_sum = 0;

        // 计算总和
        foreach (str_split($captcha) as $char) {
            if (ctype_digit($char)) {
                $total_sum += $digit_mapping[$char];
            } elseif (ctype_alpha($char)) {
                $total_sum += $letter_mapping[$char];
            }
        }

        // 计算激活码
        $operator1 = '+';
        $number1 = 99;
        $operator2 = '*';
        $number2 = 88;
        $activation_code = eval("return ($total_sum $operator1 $number1) $operator2 $number2;");

        // 取前4位数并补足0
        $activation_code = str_pad(substr($activation_code, 0, 4), 4, '0', STR_PAD_RIGHT);

        // 累加当前激活使用数
        $current_activation_count++;
        update_option('current_activation_count', $current_activation_count);
    }

    ob_start(); ?>

    <div class="activation-container">
        <h1>稳妥激光打标机 校准1.0激活</h1>
        <form method="post">
            <input type="text" id="captcha" name="captcha" placeholder="请输入验证码" maxlength="4" pattern="[A-Z0-9]{1,4}" title="请输入4位数字或字母" required>
            <br>
            <button type="submit">免费获取激活码</button>
        </form>
        <p class="activation-message">您的激活码为：<span class="activation-code"><?php echo htmlspecialchars($activation_code); ?></span></p>
        <p>此激活码仅限于当前设备，长期有效</p>
        <p>当前激活使用数：<span class="activation-count"><?php echo htmlspecialchars($current_activation_count); ?></span></p>
    </div>

    <?php return ob_get_clean();
}

add_shortcode('activation_code', 'generate_activation_code');

// 添加样式
function custom_activation_code_styles() {
    echo '
    <style>
        .activation-container {
            background-color: #ffffff;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="text"],
        button {
            padding: 12px;
            font-size: 16px;
            margin-bottom: 10px;
            text-transform: uppercase;
            width: 300px; /* 控制输入框和按钮的宽度 */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .activation-code {
            font-weight: bold;
            color: #ff0000;
            font-size: 20px;
        }
        .activation-count {
            font-weight: bold;
            color: #000;
        }
    </style>';
}

add_action('wp_head', 'custom_activation_code_styles');
