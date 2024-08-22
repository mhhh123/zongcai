<?php
session_start();

// 检查是否已经生成过激活码
if (isset($_SESSION['activation_generated']) && $_SESSION['activation_generated']) {
    echo "激活码已生成，无法重复获取。";
    exit();
}

$activation_code = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['device_code'])) {
    $device_code = $_POST['device_code'];

    // 计算激活码
    $activation_code = $device_code + (8 * 9 / 3);

    // 标记激活码已生成
    $_SESSION['activation_generated'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>激活码生成器</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label for="device_code">设备码:</label>
            <input type="text" id="device_code" name="device_code" required>
        </div>
        <div>
            <button type="submit" <?php echo isset($_SESSION['activation_generated']) && $_SESSION['activation_generated'] ? 'disabled' : ''; ?>>
                获取激活码
            </button>
        </div>
        <div>
            <p>你的激活码是: 
            <?php
                if ($activation_code) {
                    echo htmlspecialchars($activation_code);
                } else {
                    echo "请先输入设备码";
                }
            ?>
            </p>
        </div>
    </form>
</body>
</html>
                