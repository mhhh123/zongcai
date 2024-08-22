<?php

//手机验证码
add_action('wp_ajax_captcha_mobile', 'captcha_mobile');
add_action('wp_ajax_nopriv_captcha_mobile', 'captcha_mobile');

function captcha_mobile()
{
    global $wpdb;

    if(!_ceo('sms_login')){
        wp_send_json_error(['msg'=>'没开启功能']);
    }
    if ( ! wp_verify_nonce(@$_POST['nonce'], 'captcha_mobile')) {
        wp_send_json_error(['msg' => 'nonce error']);
    }
    
    try {
        if (_ceo('sms_send_verify') == true && _ceo('sms_send_verify_type') == '1' && !tencent_captcha_verify($_POST['randstr'], $_POST['ticket'])) {
            wp_send_json_error('提交环境验证失败');
        } 
    } catch (Exception $e) {
        wp_send_json_error(array('status' => '0', 'msg' => '腾讯云验证码:' . $e->getMessage()));
    }


    if ( ! check_is_mobile($_POST['user_mobile']) && date("Ymd") > 20191205) {
        wp_send_json_error(array('status' => '0', 'msg' => '手机号不正确'));
    }
    $user_mobile = $_POST['user_mobile'];
    $verify_code = rand(1000, 9999);
    set_transient($user_mobile . '_verify_code', $verify_code, 1800);//get_transient($user_mobile.'_verify_code')

    $template_code = _ceo('sms_app_template');
    if (empty($template_code)) {
        wp_send_json_error(['msg'=>'请配置短信模板']);
    }

    if (date("Ymd") < 20221010) {
//    if (false) {
        wp_send_json_success(array('status' => '1', 'msg' => '发送成功','btn_msg'=>'已发送', 'code' => $verify_code));
    }
    
    try {
        if (smsdl_send_sms($user_mobile, $verify_code, $template_code)) {//发送短信 todo
            wp_send_json_success(array('status' => '1', 'msg' => '发送成功','btn_msg'=>'已发送'));
        } else {
            wp_send_json_error(array('status' => '0', 'msg' => '发送失败'));
        }
    } catch (Exception $e) {
         wp_send_json_error(array('status' => '0', 'msg' => '发送失败:' . $e->getMessage()));
    }
   
    exit();
}

//验证码登录
add_action('wp_ajax_zongcai_login_sms', 'zongcai_login_sms');
add_action('wp_ajax_nopriv_zongcai_login_sms', 'zongcai_login_sms');
function zongcai_login_sms()
{
    session_start();

    $user_mobile = ! empty($_POST['user_mobile']) ? esc_sql($_POST['user_mobile']) : null;
    $captcha     = ! empty($_POST['captcha']) ? esc_sql($_POST['captcha']) : null;
    $url = !empty($_POST['currentUrl']) ? $_POST['currentUrl'] : '/user/';


    if(!_ceo('sms_login')){
        wp_send_json_error(['msg'=>'没开启功能']);
    }

    if (username_exists($user_mobile)) {
        //判断验证码是否正确
        if (!empty(get_transient($user_mobile . '_verify_code')) && !empty($captcha) && get_transient($user_mobile . '_verify_code') == $captcha) {
            //登录账号
            if (username_login_custom($user_mobile)) {
                delete_transient($user_mobile . '_verify_code');
                wp_send_json_success(array('status' => '1', 'msg' => '登录成功','url' => $url));
            } else {
                wp_send_json_error(array('status' => '0', 'msg' => '登录失败'));
            }


        } else {
            wp_send_json_error(array('status' => '0', 'msg' => '验证码不正确'));
        }
    } else {
        //账号不存在就注册
        if ( ! check_is_mobile($_POST['user_mobile']) && date("Ymd") > 20191205) {
            wp_send_json_error(array('status' => '0', 'msg' => '手机号不正确'));
        }
        if ((empty(get_transient($user_mobile . '_verify_code')) || empty($captcha)) || get_transient($user_mobile . '_verify_code') != $captcha) {
            wp_send_json_error(array('status' => '0', 'msg' => '验证码不正确'));
        }

        // 验证通过
        $user_nicename = $user_name = _ceo('sms_reg_prefix', 'CEO') . uniqid();
        $nweUserData   = array(
            'ID'            => '',
            'user_login'    => $user_mobile,
            'user_pass'     => uniqid(),
            'user_nicename' => $user_nicename,
            'display_name'  => $user_nicename,
            'user_email'    => $user_nicename._ceo('sms_reg_suffix', '@ceo.com'),
            'role'          => get_option('default_role'),
        );
        $user_id       = wp_insert_user($nweUserData);
//        update_user_meta($user_id, 'nickname', $user_nicename);

        if (is_wp_error($user_id)) {
            wp_send_json_error(array('status' => '0', 'msg' => '注册失败，请重试'));
        } else {
            //保存user_meta shouji
            update_user_meta($user_id, 'shouji', $user_mobile);
            wp_set_auth_cookie($user_id, true, false);
            wp_set_current_user($user_id);
            //发送邮件
            $message = __('注册成功！') . "\r\n\r\n";
            $message .= sprintf(__('用户名: %s'), $user_name) . "\r\n\r\n";
            //$message .= sprintf(__('密码: %s'), $user_pass) . "\r\n\r\n";
            wp_send_json_success(array('status' => '1', 'msg' => '注册成功','url'=>$url));
        }



    }
    wp_send_json_error(array('status' => '0', 'msg' => 'error'));
}

//手机注册
add_action('wp_ajax_user_register_mobile', 'user_register_mobile');
add_action('wp_ajax_nopriv_user_register_mobile', 'user_register_mobile');
function user_register_mobile()
{
    session_start();
    header('Content-type:application/json; Charset=utf-8');

    if ( ! check_is_mobile($_POST['user_mobile']) && date("Ymd") > 20191205) {
        exit(json_encode(array('status' => '0', 'msg' => '手机号不正确')));
    }

    $user_name = ! empty($_POST['user_mobile']) ? $_POST['user_mobile'] : null;
    $user_pass = ! empty($_POST['user_pass']) ? esc_sql($_POST['user_pass']) : null;
    $captcha   = ! empty($_POST['captcha']) ? esc_sql($_POST['captcha']) : null;
    if ( ! $user_name || ! $user_pass) {
        echo json_encode(array('status' => '0', 'msg' => '注册信息错误'));
        exit;
    }
    if (username_exists($user_name)) {
        echo json_encode(array('status' => '0', 'msg' => '该用户名已被注册'));
        exit;
    }
    if (strlen($user_pass) < 6) {
        echo json_encode(array('status' => '0', 'msg' => '密码长度不得小于6位'));
        exit;
    }
    //验证码
    if (get_transient($user_name . '_verify_code') != $captcha) {
        exit(json_encode(array('status' => '0', 'msg' => '验证码不正确')));
    } else {
        delete_transient($user_name . '_verify_code');
    }


    // 验证通过
    $user_nicename = _ceo('sms_reg_prefix', 'CEO') . time();
    $nweUserData   = array(
        'ID'            => '',
        'user_login'    => $user_name,
        'user_pass'     => $user_pass,
        'user_nicename' => $user_nicename,
        'display_name'  => $user_nicename,
        'user_email'  => $user_nicename._ceo('sms_reg_suffix', '@ceo.com'),
//            'user_email' => $user_email,
        'role'          => get_option('default_role'),
    );
    $user_id       = wp_insert_user($nweUserData);
    update_user_meta($user_id, 'nickname', $user_nicename);

    if (is_wp_error($user_id)) {
        echo json_encode(array('status' => '0', 'msg' => '注册失败，请重试'));
        exit;
    } else {
        wp_set_auth_cookie($user_id, true, false);
        wp_set_current_user($user_id);
        //发送邮件
        $message = __('注册成功！') . "\r\n\r\n";
        $message .= sprintf(__('用户名: %s'), $user_name) . "\r\n\r\n";
        //$message .= sprintf(__('密码: %s'), $user_pass) . "\r\n\r\n";
        echo json_encode(array('status' => '1', 'msg' => '注册成功', 'url' => '/user/'));
        exit;
    }
    exit();
}

//找回密码处理
//手机注册
add_action('wp_ajax_user_forgetpwd_mobile', 'user_forgetpwd_mobile');
add_action('wp_ajax_nopriv_user_forgetpwd_mobile', 'user_forgetpwd_mobile');
function user_forgetpwd_mobile()
{
    session_start();
    header('Content-type:application/json; Charset=utf-8');

    if ( ! check_is_mobile($_POST['user_mobile']) && date("Ymd") > 20191205) {
        exit(json_encode(array('status' => '0', 'msg' => '手机号不正确')));
    }

    $user_name  = ! empty($_POST['user_mobile']) ? $_POST['user_mobile'] : null;
    $user_pass  = ! empty($_POST['user_pass']) ? esc_sql($_POST['user_pass']) : null;
    $user_pass2 = ! empty($_POST['user_pass2']) ? esc_sql($_POST['user_pass2']) : null;
    $captcha    = ! empty($_POST['captcha']) ? esc_sql($_POST['captcha']) : null;

    //验证码
    if (get_transient($user_name . '_verify_code') != $captcha && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
        exit(json_encode(array('status' => '0', 'msg' => '验证码不正确')));
    } else {
        delete_transient($user_name . '_verify_code');
    }

    if ( ! $user_name || ! $user_pass) {
        echo json_encode(array('status' => '0', 'msg' => '注册信息错误'));
        exit;
    }
    if ( ! $uid = username_exists($user_name)) {
        echo json_encode(array('status' => '0', 'msg' => '手机号没注册'));
        exit;
    }
    if (strlen($user_pass) < 6) {
        echo json_encode(array('status' => '0', 'msg' => '密码长度不得小于6位'));
        exit;
    }
    if ($user_pass != $user_pass2) {
        echo json_encode(array('status' => '0', 'msg' => '重置密码不相同'));
        exit;
    }
    wp_set_password($user_pass, $uid);
    echo json_encode(array('status' => '1', 'msg' => '操作成功'));
    exit;
}

function smsdl_send_sms($user_mobile, $verify_code,$template_code='SMS_179080222')
{

//    exit('test');
    require_once get_template_directory() . "/inc/sms/vendor/autoload.php";
    if(!_ceo('sms_login')){
        wp_send_json_error(['msg'=>'没开启功能']);
    }

// 阿里云Access Key ID和Access Key Secret 从 https://ak-console.aliyun.com 获取
    $appKey = _ceo('sms_app_key');
    $appSecret = _ceo('sms_app_secret');

// 短信签名 详见：https://dysms.console.aliyun.com/dysms.htm?spm=5176.2020520001.1001.3.psXEEJ#/sign
    $signName  = _ceo("sms_app_sign");

// 短信模板Code https://dysms.console.aliyun.com/dysms.htm?spm=5176.2020520001.1001.3.psXEEJ#/template
    $template_code = $template_code;

// 短信中的替换变量json字符串
    $json_string_param = "{'code':'$verify_code'}";

// 接收短信的手机号码
    $phone = $user_mobile;
// 初始化阿里云config
    \Aliyun\Core\Config::load();
// 初始化用户Profile实例
    $profile = \Aliyun\Core\Profile\DefaultProfile::getProfile("cn-hangzhou", $appKey, $appSecret);
    \Aliyun\Core\Profile\DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", "Dysmsapi", "dysmsapi.aliyuncs.com");
    $acsClient = new \Aliyun\Core\DefaultAcsClient($profile);
// 初始化SendSmsRequest实例用于设置发送短信的参数
    $request = new \Aliyun\Api\Sms\Request\V20170525\SendSmsRequest();
// 必填，设置短信接收号码
    $request->setPhoneNumbers($phone);
// 必填，设置签名名称
    $request->setSignName($signName);
// 必填，设置模板CODE
    $request->setTemplateCode($template_code);

// 可选，设置模板参数
    if(!empty($json_string_param)) {
        $request->setTemplateParam($json_string_param);
    }

// 可选，设置流水号
// if($outId) {
//     $request->setOutId($outId);
// }

// 发起请求
    try {
        $acsResponse =  $acsClient->getAcsResponse($request);
// 默认返回stdClass，通过返回值的Code属性来判断发送成功与否
        if($acsResponse && strtolower($acsResponse->Code) == 'ok')
        {
            return true;
        }
    } catch (Exception $e) {
    }

    return false;
}


//检测是否为手机号
if ( ! function_exists("check_is_mobile")) {
    function check_is_mobile($tel)
    {
//    $pattern = '#^1(3|4|5|7|8)[0-9]\d{8}$#';
        $pattern = '#^\d{11}$#';
        $pattern = '#^\d{9,11}$#';

        return preg_match($pattern, $tel);
    }
}
if ( ! function_exists("username_login_custom")) {
    function username_login_custom($user_login)
    {
// Automatic login //
        $username = $user_login;
        $user     = get_user_by('login', $username);

        // Redirect URL //
        if ( ! is_wp_error($user)) {
            wp_clear_auth_cookie();
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);

            $redirect_to = user_admin_url();

            return true;
        } else {
            return false;
        }
    }
}
