<?php
/**
 * Template Name: 激活码
 */

get_header();
?>
<?php
$show_price=_ceo('coding_price');
$user_price=CeoShopCoreUser::getBalance(get_current_user_id());
$user_id=get_current_user_id();
$vip_level=CeoShopCoreUser::getVipGrade($user_id);
if ($vip_level=='体验VIP会员'){
    $product_price=_ceo("coding_price")*_ceo("comment_vip")*0.1;
}elseif ($vip_level=="月卡VIP会员"){
    $product_price=_ceo("coding_price")*_ceo("month_vip")*0.1;
}elseif ($vip_level=='年卡VIP会员'){
    $product_price=_ceo("coding_price")*_ceo("year_vip")*0.1;
}elseif ($vip_level=='永久VIP会员'){
    $product_price=_ceo("coding_price")*_ceo("forever_vip")*0.1;
}else{
    $product_price=_ceo("coding_price")*_ceo("forever_vip")*0.1;
}
?>
<?php if ( _ceo('ceo_apply') == true): ?>
    <section class="ceo-page-bg ceo-background-cover ceo-overflow-hidden ceo-flex ceo-flex-middle ceo-flex-center ceo-cat-category" style="background-image: url(<?php echo _ceo('apply_bg'); ?>);">
        <div class="ceo-overlay-primary ceo-position-cover"></div>
        <div class="ceo-overlay ceo-position-center ceo-text-center ceo-light">
            <h3 class="ceo-position-relative ceo-light ceo-margin-remove"><?php the_title(); ?></h3>
            <?php echo _ceo('apply_title'); ?>
        </div>
    </section>
<?php endif; ?>
<?php if(_ceo('ceo_bolang') == true ): ?>
    <div class="ceo-meihua-boo">
        <svg class="ceo-meihua-boo-waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="ceo-meihua-boo-parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
<?php endif; ?>
    
<div class="black_overlay">
    <?php echo $product_price;?>
    <h2>激活码</h2>
    <input id="name" maxlength="4" placeholder="请输入4位验证码" style="margin-top:10px;">
    
    <?php if( is_user_logged_in()){ ?>
        <?php if (inputCode.trim() === ""){?>
    <button onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block;'"
            style="border: 1px solid #006fff; border-radius: 10px; background-color: #006fff; border-width: medium; margin-top:10px;">
        点击出现验证码
    </button>
        <?php } else { ?>
                <button onclick="showCode();"
            style="border: 1px solid #006fff; border-radius: 10px; background-color: #006fff; border-width: medium; margin-top:10px;">
        点击出现验证码
    </button>
        <?php } ?>
    <?php } else { ?>
    <button type="button" ceo-toggle data-toggle="modal" data-target="#modal-login"
            style="border: 1px solid #006fff; border-radius: 10px; background-color: #006fff; border-width: medium; margin-top:10px;">
        点击出现验证码
    </button>
    <?php } ?>
    
    <div class="container">
    <p>稳妥激光打标机校准1.0激活</p>
    <div class="form-group">
        <input type="text" id="device-input" placeholder="请输入设备" maxlength="4" oninput="validateInput(this)">
    </div>
    <button onclick="getActivationCode()">获取激活码</button>
    <div class="activation-code-container">
        您的激活码是: <span class="activation-code" id="activation-code">0000</span>
    </div>
    <p>此激活码仅限于当前设备，长期有效</p>
</div>
    
    
    <div id="light" class="white_content">
        <form action="" method="post" id="form_submit">
            <div class="div_local">
                <div class="div_margin">普通用户<br><?php echo _ceo("coding_price");?></div>
                <div class="div_margin">体验VIP<br><?php echo _ceo("coding_price")*_ceo("comment_vip")*0.1; ?></div>
                <div class="div_margin">月卡VIP<br><?php echo _ceo("coding_price")*_ceo("month_vip")*0.1; ?></div>
                <div class="div_margin">年卡VIP<br><?php echo _ceo("coding_price")*_ceo("year_vip")*0.1; ?></div>
                <div class="div_margin">终身VIP<br><?php echo _ceo("coding_price")*_ceo("forever_vip")*0.1; ?></div>
            </div>
            <div class="div_local">
                <div>
                    温馨提示丨加入微图库VIP会员，享受全站优惠福利
                </div>
                <?php if( is_user_logged_in() ){ ?>
                <a href="javascript:void(0)" class="btn-ceo-svip" data-vip-id="<?php echo $vip[$key]['id'] ?>" data-style="slide-down">立即开通</a>
                <?php } else { ?>
                <a href="#modal-login" ceo-toggle>立即开通</a>
                <?php } ?>
            </div>
            <div class="money-left">余额: <?php echo CeoShopCoreUser::getBalance(get_current_user_id()) ?>
                <?php echo _ceo('ceo_shop_currency_name'); ?>
            </div>
            <?php if ($product_price > $user_price){ ?>
            <button
            <a href="javascript:void(0)" class="btn-ceo-recharge" data-style="slide-down">支付</a>
            <?php } else { ?>
            <button id="onclick"class="btn-ceo-purchase-product">支付</button>
            <?php } ?>    
</div>
            
        </form>
    </div>
</div>

<div id="message" class="message" style="display:none;"></div>

</div>
<?php get_footer(); ?>
    <script>
    function showCode() {
    // 获取输入框的值
    var inputCode = document.getElementById('name').value;

    // 检查输入框是否为空
    if (inputCode.trim() === "") {
        alert("请输入设备码");
        return; // 终止后续操作
    }

    // 显示验证码的逻辑
    document.getElementById('light').style.display = 'block'; // 显示模态框等
    document.getElementById('fade').style.display = 'block'; // 根据需要添加的淡入效果
}

        var conversionMap = {
        "1": "1",
        "2": "2",
        "3": "4",
        "4": "6",
        "5": "8",
        "6":"3",
        "7":"5",
        "8":"7",
        "9":"9",
        "0":"0",
        "A":'1',
        "B":'2',
        "C":"3",
        "D":"4",
        "E":"5",
        "F":"6",
        "G":"7",
        "H":"8",
        "I":"9",
        "J":"10",
        "K":"11",
        "L":"12",
        "M":"13",
        "N":"14",
        "O":"15",
        "P":"16",
        "Q":"17",
        "R":"18",
        "S":"19",
        "T":"20",
        "U":"21",
        "V":"22",
        "W":"23",
        "X":"24",
        "Y":"25",
        "Z":"26"
    };
    document.getElementById('onclick').onclick = function () {
        var nameValue = document.getElementById('name').value;
        var inputValues = nameValue.split('');
        var upperCaseArray = inputValues.map(function(char) {
            return char.toUpperCase();
        });
        var resultArray = [];

        // 逐个对比并拼接结果
        upperCaseArray.forEach(function(item) {
            // 尝试从映射中找到对应的值
            var convertedValue = conversionMap[item] || "未找到对应的值";
            resultArray.push(convertedValue);
        });

        // 拼接最终的结果
        var finalResult = resultArray.join('');

        // 显示消息并更新内容
        var messageDiv = document.getElementById('message');
        messageDiv.style.display = 'block';
        messageDiv.innerHTML = "验证码: " + finalResult;
    };
    
    
    
    </script>
     <style type="text/css">
     
        .message{
            text-align: center;
        }
        .black_overlay {
            display: grid;
            justify-content:center;
            margin-top:20px;
            text-align: center;
        }

        .white_content {
            display: none;
            position: absolute;
            top: 10%;
            border: 1px solid #bbbbbb;
            border-radius: 20px;
            background-color: white;
            z-index: 1002;
            /*层级要比.black_overlay高，这样才能显示在它前面*/
            overflow: auto;
        }

        #light {
            position: absolute;
            left: 50%;
            /* top: 50%; */
            width: 500px;
            height: 500px;
            margin-left: -250px;
            
        }

        #form_submit {
            text-align: center;
            margin-left: 10px;
            margin-top: 10px;
        }

        #font_login {
            font-weight: 400;
            font-size: 24px;
            color: #BBBBBB;
            text-align: center;
            margin-top: 20px;
        }
        .div_local{
            display: flex;
            justify-content: space-evenly;
        }

        .div_margin{
            margin: 10px;
        }
        .div_mid{
            dis
        }
        .button_beautiful {
            width: 60px;
            height: 34px;
            /* 高度 */
            border-width: 0px;
            border-radius: 6px;
            background: #4ECDC4;
            cursor: pointer;
            outline: none;
            color: white;
            font-size: 16px;
            margin-top: 20px;
        }
        
    </style>
