<?php

require( dirname(__FILE__) . '/../../../../wp-load.php' );

define('WX_APPID',joy('weixin_app_key'));
define('WX_APPSECRET',joy('weixin_app_id'));
define('WX_KEY','weixin_uid');


function wechat_oauth_redirect(){
    $url = home_url(user_trailingslashit('/user'));
    wp_redirect( $url );
    exit;
}

function get_wechat_access_token($code){
    $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . WX_APPID . '&secret=' . WX_APPSECRET . '&code=' . $code . '&grant_type=authorization_code';

    return json_decode(file_get_contents($url),true);
}

function wechat_oauth(){

    if(!isset($_GET['code'])) wp_die('code empty.');

    $code = $_GET['code'];

    $json_token = get_wechat_access_token($code);

    $info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $json_token['access_token'] . '&openid=' . $json_token['openid'];

    $user_info = json_decode(file_get_contents($info_url),true);

    $weixin_id = $user_info['openid'];

    if(!$weixin_id) wp_die('授权时发生错误');

    if(is_user_logged_in()){
        $this_user = wp_get_current_user();
        update_user_meta($this_user->ID ,WX_KEY,$weixin_id);
        update_user_meta($this_user->ID ,'avatarurl',$user_info['headimgurl']);
        wechat_oauth_redirect();
    }else{
        $oauth_user = get_users(array('meta_key'=>WX_KEY,'meta_value'=>$weixin_id));
        if(is_wp_error($oauth_user) || !count($oauth_user)){
            $username = $user_info['nickname'];
            // $login_name = 'wx' . wp_create_nonce($weixin_id);
            // $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            // $userdata=array(
            //     'user_login' => $login_name,
            //     'display_name' => $username,
            //     'user_pass' => $random_password,
            //     'nick_name' => $username
            // );
            // $user_id = wp_insert_user( $userdata );
            // wp_signon(array('user_login'=>$login_name,'user_password'=>$random_password),false);
            // update_user_meta($user_id ,WX_KEY,$weixin_id);
            // update_user_meta($user_id ,'custom_avatar',$user_info['headimgurl']);

            $_SESSION['weixin_uid'] = $weixin_id;
            $_SESSION['custom_avatar'] = $user_info['headimgurl'];
            $_SESSION['display_name'] = $username;
            $_SESSION['sf'] = 'wx';


            wp_redirect( home_url(user_trailingslashit('/user/binding')) );
            exit;

        }else{
            wp_set_auth_cookie($oauth_user[0]->ID);
            wechat_oauth_redirect();
        }
    }
}


if (isset($_GET['code'])){
    wechat_oauth();
}


function wechat_oauth_url(){
    $_SESSION ['state'] = md5 ( uniqid ( rand (), true ) );
    $appkey = '';
    $url = 'https://open.weixin.qq.com/connect/qrconnect?appid='. WX_APPID .'&redirect_uri='. urlencode ( get_template_directory_uri() .'/wechat.php').'&response_type=code&scope=snsapi_login&state=' . $_SESSION ['state'] . '#wechat_redirect';
    return $url;
}

wp_redirect( wechat_oauth_url() );
