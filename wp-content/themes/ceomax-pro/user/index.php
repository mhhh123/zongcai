<?php
$action = get_query_var('action') ?: 'collection';
if(!is_user_logged_in()){
    if(in_array($action, ['login', 'register','registersms', 'lostpassword'])){
        include get_template_directory().'/user/login.php';
    }elseif( in_array($action, ['binding', 'bin-register']) ){
        include get_template_directory().'/user/binding.php';
    }else{
        wp_redirect(home_url(user_trailingslashit('/user/login')));
    }
}else{
    $current_user   = wp_get_current_user();
    $user_id        = get_current_user_id();
    include get_template_directory().'/user/action.php';
}
