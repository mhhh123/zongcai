<?php
session_start();
require __DIR__ . '/../../../wp-load.php';
header('Content-Type: text/html; charset=utf-8');


function qqLoginFailLog($log)
{
    file_put_contents('qqLoginFailLog.log', date('Y-m-d H:i:s ') . $log . "\n", FILE_APPEND);
}

// 回调参数验证
if (isset($_GET['code']) && isset($_GET['state']) && $_GET['state'] == 'ceotheme') {

    // 获取 accessToken
    $code = $_GET['code'];
    $api = 'https://graph.qq.com/oauth2.0/token';
    $params = array(
        'grant_type' => 'authorization_code',
        'client_id' => _ceo('qq_app_id'),
        'client_secret' => _ceo('qq_app_key'),
        'code' => $_GET['code'],
        'redirect_uri' => get_template_directory_uri() . '/qq-v2.php',
        'fmt' => 'json',
    );
    $accessTokenRes = json_decode(wp_remote_get($api . '?' . http_build_query($params))['body'], true);
    if (empty($accessTokenRes['access_token'])) {
        qqLoginFailLog('获取accessToken失败 ' . json_encode($params) . ' ' . json_encode($accessTokenRes));
        wp_die('呃……好像哪里不对，请返回刷新之后重试一次，依旧不行请联系站长，谢谢~');
    }

    // 获取用户OpenId
    $api = 'https://graph.qq.com/oauth2.0/me';
    $params = array(
        'access_token' => $accessTokenRes['access_token'],
        'fmt' => 'json',
    );
    $openIdRes = json_decode(wp_remote_get($api . '?' . http_build_query($params))['body'], true);
    if (empty($openIdRes['openid'])) {
        qqLoginFailLog('获取openId失败 ' . json_encode($params) . ' ' . json_encode($openIdRes));
        wp_die('呃……好像哪里不对，请返回刷新之后重试一次，依旧不行请联系站长，谢谢~');
    }

    // 获取用户信息
    $api = 'https://graph.qq.com/user/get_user_info';
    $params = array(
        'access_token' => $accessTokenRes['access_token'],
        'oauth_consumer_key' => _ceo('qq_app_id'),
        'openid' => $openIdRes['openid'],
    );
    $userInfoRes = json_decode(wp_remote_get($api . '?' . http_build_query($params))['body'], true);
    if (empty($userInfoRes['nickname'])) {
        qqLoginFailLog('获取用户信息失败 ' . json_encode($params) . ' ' . json_encode($userInfoRes));
        wp_die('呃……好像哪里不对，请返回刷新之后重试一次，依旧不行请联系站长，谢谢~');
    }

    // 复用之前逻辑代码
    if (is_user_logged_in()) {
        // 之前已有其他账号绑定，不是当前用户的话绑定失败
        $_openid_meta_key = 'qq_openid';
        $user_exist = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $wpdb->usermeta WHERE meta_key=%s AND meta_value=%s", $_openid_meta_key, $openIdRes['openid']));
        if (isset($user_exist) && get_current_user_id() != $user_exist) {
            wp_die('绑定失败，可能之前已有其他账号绑定，请先登录其他账户解绑。', '绑定失败，可能之前已有其他账号绑定，请先登录其他账户解绑。');
        }

        $this_user = wp_get_current_user();
        update_user_meta($this_user->ID, "qq_openid", $openIdRes['openid']);
        update_user_meta($this_user->ID, "qq_access_token", $accessTokenRes['access_token']);
        update_user_meta($this_user->ID, "avatarurl", $userInfoRes['figureurl_qq_2']);
        update_user_meta($this_user->ID, "open_qq_name", $userInfoRes['nickname']);//保存昵称
        //wp_redirect(get_field("tizipu_menber_link","option"));//已登录授权
        if (!empty($_SESSION ['ref'])) {
            wp_redirect($_SESSION ['ref']);
        } else {
            wp_redirect(home_url(user_trailingslashit('/user')));
        }

    } else {
        // $user_fb = get_users(array("meta_key " => "qq_openid", "meta_value" => $openIdRes['openid']));
        
        // 
        $_openid_meta_key = 'qq_openid';
        $user_fb = $wpdb->get_results($wpdb->prepare("SELECT user_id FROM $wpdb->usermeta WHERE meta_key=%s AND meta_value=%s", $_openid_meta_key, $openIdRes['openid']));
        
        if (is_wp_error($user_fb) || !count($user_fb)) {
            $username = $userInfoRes['nickname'];
            $custom_avatar = $userInfoRes['figureurl_qq_2'];
            //                $login_name = wp_create_nonce($qq_openid);
            //                $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            //                $userdata=array(
            //                    'user_login' => $login_name,
            //                    'display_name' => $username,
            //                    'user_pass' => $random_password,
            //                    'nickname' => $username
            //                );
            //                $user_id = wp_insert_user( $userdata );
            //                wp_signon(array("user_login"=>$login_name,"user_password"=>$random_password),false);
            //                update_user_meta($user_id ,"qq_openid",$qq_openid);
            //                update_user_meta($user_id ,"qq_access_token",$qq_access_token);
            // update_user_meta($user_id ,"custom_avatar",$custom_avatar);

            $_SESSION['qq_openid'] = $openIdRes['openid'];
            $_SESSION['qq_access_token'] = $accessTokenRes['access_token'];
            $_SESSION['avatarurl'] = $userInfoRes['figureurl_qq_2'];
            $_SESSION['display_name'] = $userInfoRes['nickname'];
            $_SESSION['sf'] = 'qq';

            //直接注册账号
            global $wpdb;
            $max_id = $wpdb->get_var("SELECT ID FROM $wpdb->users ORDER BY ID DESC LIMIT 0,1");
            $user_login = _ceo('qq_reg_prefix', 'CEO') . $max_id . date('His', time()) . ($max_id + 1);
            $user_id = wp_create_user($user_login, md5(time()), $user_login . _ceo('qq_reg_suffix', '@ceo.com'));

            if ($user_id) {

                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
                //add_user_meta( $user_id , 'verifymail' , 1 );


//                        if( $sf == 'qq' ){
                if (true) {

                    $qq_openid = $openIdRes['openid'];
                    $qq_access_token = $accessTokenRes['access_token'];
                    $custom_avatar = $userInfoRes['figureurl_qq_2'];
                    $display_name = $userInfoRes['nickname'];

                    update_user_meta($user_id, "qq_openid", $openIdRes['openid']);
                    update_user_meta($user_id, "qq_access_token", $accessTokenRes['access_token']);
                    update_user_meta($user_id, "avatarurl", $userInfoRes['figureurl_qq_2']);
                    update_user_meta($user_id, "open_qq_name", $userInfoRes['nickname']);//保存昵称
                    $ret = wp_update_user(array('ID' => $user_id, 'display_name' => $display_name));
                    if ($ret) {
                        $redirect_url = home_url(user_trailingslashit('/user'));
                    } else {
                        $redirect_url = user_trailingslashit('/user/binding');
                    }
                }

                $redirect_url = home_url(user_trailingslashit('/user'));
            }
//                    var_dump($user_login, md5(time()), $user_login . '@ceotheme.com');
//                    exit($redirect_url);
//                    wp_redirect( $redirect_url );
            if (!empty($_SESSION ['ref'])) {
                wp_redirect($_SESSION ['ref']);
            } else {
                wp_redirect(home_url(user_trailingslashit('/user')));
            }

        } else {

//                    wp_set_auth_cookie($user_fb[0]->ID);
            $last_key = count($user_fb) - 1;
            wp_set_auth_cookie($user_fb[$last_key]->user_id);//登录最后绑定的账号 TODO
            //wp_redirect(home_url('/?2'));//已授权用户登录跳转
//					wp_redirect( home_url(user_trailingslashit('/user')) );
            if (!empty($_SESSION ['ref'])) {
                wp_redirect($_SESSION ['ref']);
            } else {
                wp_redirect(home_url(user_trailingslashit('/user')));
            }
        }
    }


} else {
    qqLoginFailLog('获取code失败 ' . json_encode($_GET));
    wp_die('呃……好像哪里不对，请返回刷新之后重试一次，依旧不行请联系站长，谢谢~');
}