<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>验证码输入</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }

        .main-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        .images img {
            width: 250px;
            height: auto;
            display: block;
        }

        .container {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 20px;
            box-sizing: border-box;
        }

        input[type="text"], button {
            padding: 12px;
            font-size: 16px;
            margin-bottom: 10px;
            width: 60%;
            max-width: 250px;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"] {
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .activation-code {
            font-weight: bold;
            color: #ff0000;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="images">
            <a href="https://www.baidu.com" target="_blank">
                <img src="static/images/left_image.png" alt="Baidu">
            </a>
        </div>
        <div class="container">
            <p class="info">稳妥激光打标机 校准1.0激活</p>
            <form method="post" action="process.php">
                <input type="text" id="captcha" name="captcha" placeholder="请输入验证码" maxlength="4" pattern="[A-Z0-9]{4}" title="请输入4位数字或字母" required>
                <br>
                <button type="submit">免费获取激活码</button>
            </form>
            <p class="activation-message">您的激活码为：<span class="activation-code"><?php echo htmlspecialchars($activation_code); ?></span></p>
            <p class="info">此激活码仅限于当前设备，长期有效</p>
            <p class="info">当前激活使用数：<span class="bold-black">1235</span></p>
        </div>
        <div class="images">
            <a href="https://www.taobao.com" target="_blank">
                <img src="static/images/right_image.png" alt="Taobao">
            </a>
        </div>
    </div>
    <script>
        document.getElementById('captcha').addEventListener('input', function() {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '').substring(0, 4);
        });
    </script>
</body>
</html>
