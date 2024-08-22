<?php
if (!defined('ABSPATH')) {die;} // Cannot access directly.
//启用 session
session_start();

//获取后台配置
$wxConfig = _ceo('oauth_mpweixin');
$CeoMpWeixin = new CeoMpWeixin($wxConfig);

$url = $CeoMpWeixin->getWxLoginUrl();
$rurl = (empty($_REQUEST["rurl"])) ? home_url('/user') : $_REQUEST["rurl"] ;
$_SESSION['oauth_rurl']  = $rurl;
header('location:' . $url);


