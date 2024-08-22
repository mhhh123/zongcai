<?php

/**
 * CeoMax-Pro主题是一款极致美观强大的WordPress付费资源下载主题。
 * 正版唯一购买地址：https://www.ceotheme.com/
 * 作者总裁QQ：110300260 （总裁）
 * Ta 为资源站、下载站、交易站、素材站、源码站、课程站、CMS等各类资源站点而生，Ta 更为追求极致的你而生。
 * 能理解使用盗版的人，但是不能接受传播盗版。
 * CeoTheme总裁主题制作的CeoMax-Pro主题正版用户可享受该主题不限制域名，不限制数量，无限授权，仅限本人享有此特权，外泄主题包将取消授权资格！
 * 开发者不易，感谢支持，全天候在线客户服务+技术支持为您服务。
 */


/*PHP多版本兼容*/
error_reporting(0);

if (file_exists(TEMPLATEPATH.'/inc/functions/functions.php')) {
    require_once TEMPLATEPATH.'/inc/functions/functions.php';
}else{
    if (extension_loaded('swoole_loader') && function_exists('swoole_loader_version') && w_parse_version_float(swoole_loader_version())>=3.1) {
        $php_v = substr(PHP_VERSION,0,3);
        require_once TEMPLATEPATH.'/inc/functions/functions.'.$php_v.'.php';
    }else{
        $_theme = get_template_directory_uri();
        wp_safe_redirect($_theme.'/help/swoole-compiler-loader.php');die;
    }
}

function w_parse_version_float($version) {
    $versionList = [];
    if (is_string($version)) {
        $rawVersionList = explode('.', $version);
        if (isset($rawVersionList[0])) {
            $versionList[] = $rawVersionList[0];
        }
        if (isset($rawVersionList[1])) {
            $versionList[] = $rawVersionList[1];
        }
    }
    return (float) implode('.',$versionList);
}

/*
==================（重要）请勿修改上方代码==================
************************************************************
==================二次开发功能请添加在下面==================
*/
