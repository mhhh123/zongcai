<?php

global $wp_query;

try {
    $pay = new CeoShopCorePay($wp_query->query_vars['ceo-shop-pay-notify-payment'], $wp_query->query_vars['ceo-shop-pay-notify-type']);
    file_put_contents(CEO_SHOP_DIR . '/logs/pay-notify-result.log', date('[Y-m-d H:i:s]') . ' params ' . json_encode([
        'payment' => $wp_query->query_vars['ceo-shop-pay-notify-payment'],
        'type' => $wp_query->query_vars['ceo-shop-pay-notify-type']
    ]) . PHP_EOL, FILE_APPEND);

    file_put_contents(CEO_SHOP_DIR . '/logs/pay-notify-result.log', date('[Y-m-d H:i:s]') . ' post ' . json_encode($_POST) . ' get ' . json_encode($_GET) . PHP_EOL, FILE_APPEND);
    $result = $pay->verify();
    file_put_contents(CEO_SHOP_DIR . '/logs/pay-notify-result.log', date('[Y-m-d H:i:s]') . ' result ' . json_encode($result) . PHP_EOL, FILE_APPEND);

    $pay->callback($result);

    $pay->success();
} catch (Exception $e) {
    file_put_contents(CEO_SHOP_DIR . '/logs/pay-error.log', date('[Y-m-d H:i:s] ') . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "fail";
}
