<?php

//session_start();

define('WB_APPID',_ceo('weibo_app_key'));//appkey
define('WB_APPSECRET',_ceo('weibo_app_id'));//appsecret

function wb_ouath_redirect(){
    $url = home_url(user_trailingslashit('/user'));
    wp_redirect( $url );
    exit;
}

function wb_get_access_token($code){
    $url = "https://api.weibo.com/oauth2/access_token";
	$login = get_page_link( _ceo('login_page') );
    $data = array('client_id' => WB_APPID,
        'client_secret' => WB_APPSECRET,
        'grant_type' => 'authorization_code',
        'redirect_uri' => $login.'/?type=sina',
        'code' => $code);

    $response = wp_remote_post( $url, array(
            'method' => 'POST',
            'body' => $data,
        )
    );

    $output = json_decode($response['body'],true);
    return $output;
}

function weibo_oauth(){

    if(!isset($_GET['code'])) wp_die('code empty.');
    $code = $_GET['code'];

    $output = wb_get_access_token($code);

    $sina_access_token = $output['access_token'];
    $sina_uid = $output['uid'];

    if(empty($sina_uid)){
        wp_die('抱歉，服务器响应错误，请重试。');
    }
    global $wpdb;
    $get_user_info_url = "https://api.weibo.com/2/users/show.json?uid=".$sina_uid."&access_token=".$sina_access_token;
    $usersina = wp_remote_get( $get_user_info_url );
    $userinfo  = json_decode($usersina['body'] , true);
    $username = $userinfo['screen_name'];
    $avatar = $userinfo['profile_image_url'];
    if(is_user_logged_in()){

        //之前已有其他账号绑定，不是当前用户的话绑定失败
        $_openid_meta_key='sina_uid';
        $user_exist = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $wpdb->usermeta WHERE meta_key=%s AND meta_value=%s", $_openid_meta_key, $sina_uid));
        if (isset($user_exist) && get_current_user_id() != $user_exist) {
            wp_die('绑定失败，可能之前已有其他账号绑定，请先登录其他账户解绑。','绑定失败，可能之前已有其他账号绑定，请先登录其他账户解绑。');
        }

        $this_user = wp_get_current_user();
        update_user_meta($this_user->ID ,"sina_uid",$sina_uid);
        update_user_meta($this_user->ID ,"sina_access_token",$sina_access_token);
        update_user_meta($this_user->ID ,"avatarurl",$avatar);
        update_user_meta($this_user->ID ,"open_weibo_name",$username);//保存昵称
        wb_ouath_redirect();
    }else{
        $user_weibo = get_users(array("meta_key "=>"sina_uid","meta_value"=>$sina_uid));
        if(is_wp_error($user_weibo) || !count($user_weibo)){
/*
            $login_name = wp_create_nonce($sina_uid);
            $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            $userdata=array(
                'user_login' => $login_name,
                'display_name' => $username,
                'user_pass' => $random_password,
                'nickname' => $username
            );
            $user_id = wp_insert_user( $userdata );
            wp_signon(array("user_login"=>$login_name,"user_password"=>$random_password),false);
            update_user_meta($user_id ,"sina_uid",$sina_uid);
            update_user_meta($user_id ,"sina_access_token",$sina_access_token);
            update_user_meta($user_id ,"avatarurl",$avatar);
            $_SESSION['sf'] = 'wb';
*/
            $_SESSION['sina_uid'] = $sina_uid;
            $_SESSION['sina_access_token'] = $sina_access_token;
            $_SESSION['avatarurl'] = $avatar;
            $_SESSION['display_name'] = $username;
            $_SESSION['sf'] = 'wb';

		    $url = home_url(user_trailingslashit('/user/binding'));
		    wp_redirect( $url );
		    exit;

        }else{
            $last_key=count($user_weibo)-1;
            update_user_meta($user_weibo[$last_key]->ID ,"sina_access_token",$sina_access_token);
            update_user_meta($user_weibo[$last_key]->ID ,"avatarurl",$userinfo['profile_image_url']);
            update_user_meta($user_weibo[$last_key]->ID ,"open_weibo_name",$username);//保存昵称
            wp_set_auth_cookie($user_weibo[$last_key]->ID);
            wb_ouath_redirect();
        }
    }
}

function social_oauth_weibo(){
    if (isset($_GET['code']) && isset($_GET['type']) && $_GET['type'] == 'sina'){
        weibo_oauth();
    }
}
add_action('init','social_oauth_weibo');


function weibo_oauth_url(){
	$login = get_page_link( _ceo('login_page') );
    $url = 'https://api.weibo.com/oauth2/authorize?client_id=' . WB_APPID . '&response_type=code&redirect_uri=' . urlencode ($login .'/?type=sina');
    return $url;
}
