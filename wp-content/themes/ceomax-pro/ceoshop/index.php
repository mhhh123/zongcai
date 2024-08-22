<?php

if (!defined('ABSPATH')) {
    die;
}

/**
 * ------------------------------------------------------------------------------
 * CEO商城系统
 * ------------------------------------------------------------------------------
 */

define('CEO_SHOP_VERSION', '1.0.0');
define('CEO_SHOP_DIR', TEMPLATEPATH . '/ceoshop');
date_default_timezone_set(get_option('timezone_string'));

// 加载核心类库
if (file_exists(CEO_SHOP_DIR . '/inc/functions.php')) {
    require_once CEO_SHOP_DIR . '/inc/functions.php';
} else {
    if (extension_loaded('swoole_loader')) {
        $php_v = substr(PHP_VERSION, 0, 3);
        require_once CEO_SHOP_DIR . '/inc/functions.' . $php_v . '.php';
    } else {
        $_theme = get_template_directory_uri();
        wp_safe_redirect($_theme . '/help/swoole-compiler-loader.php');die;
    }
}

// 加载商城配置
require CEO_SHOP_DIR . '/inc/options/ceotheme-metabox.php';
require CEO_SHOP_DIR . '/inc/options/ceotheme-shortcode.php';
require CEO_SHOP_DIR . '/inc/options/ceotheme-user.php';


//前台资源
function ceo_shop_front_assets()
{
    wp_enqueue_style('ceoshop',     get_template_directory_uri() . '/ceoshop/assets/css/ceoshop.css'); //商城样式
    wp_enqueue_style('ladda',       'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/Ladda/1.0.6/ladda-themeless.min.css'); //加载效果
    wp_enqueue_script('member',     get_template_directory_uri() . '/ceoshop/assets/js/member.js', array('jquery'), '', true); //用户中心
    wp_enqueue_script('product',    get_template_directory_uri() . '/ceoshop/assets/js/product.js', array('jquery'), '', true); //商城购买
    wp_enqueue_script('spin',       'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/Ladda/1.0.6/spin.min.js', array('jquery'), '', true); //加载效果
    wp_enqueue_script('ladda',      get_template_directory_uri() . '/ceoshop/assets/js/ladda.min.js', array('jquery'), '', true); //加载效果
    wp_enqueue_script('clipboard', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/clipboard.js/2.0.10/clipboard.min.js', array('jquery'), '', true); //复制效果
    wp_enqueue_script('decimal',   'https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/decimal.js/10.3.1/decimal.min.js', array('jquery'), '', true); //数额计算
}
add_action('wp_enqueue_scripts', 'ceo_shop_front_assets');

//后台资源
function ceo_shop_admin_assets()
{
    if (isset($_GET['page']) && str_starts_with($_GET['page'], 'ceo-shop')) {
        // wp_enqueue_style('ele', 'https://cdn.staticfile.org/element-ui/2.15.14/theme-chalk/index.min.css');
        wp_enqueue_style('ele', 'https://lib.baomitu.com/element-ui/2.15.14/theme-chalk/index.min.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/ceoshop/assets/css/main.css');
        wp_enqueue_script('vue', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/vue/2.6.14/vue.min.js');
        // wp_enqueue_script('ele', 'https://cdn.staticfile.org/element-ui/2.15.14/index.min.js');
        wp_enqueue_script('ele', 'https://lib.baomitu.com/element-ui/2.15.14/index.min.js');
        wp_enqueue_script('axios', 'https://cdn.bootcdn.net/ajax/libs/axios/1.5.0/axios.min.js');
        wp_enqueue_script('apexcharts', 'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/apexcharts/3.33.1/apexcharts.min.js');
    }
}
add_action('admin_enqueue_scripts', 'ceo_shop_admin_assets');

//获取视频播放源的链接类型
function ceo_shop_get_video_url_type($url)
{
    $thirdDomainArr = [
        'player.bilibili.com',
        'v.qq.com',
        'player.youku.com',
        'iqiyi.com',
        'www.ixigua.com',
        'liveshare.huya.com',
        'www.youtube.com',
    ];

    $urlRes = parse_url($url);
    if (!empty($urlRes['host']) && in_array($urlRes['host'], $thirdDomainArr)) {
        // 三方播放器链接
        return 2;
    }

    // 普通播放视频源
    return 1;
}