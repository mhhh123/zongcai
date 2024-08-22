<?php

if (!defined('ABSPATH')) {
    die;
}

$ceo_post_hide = 'ceo_post_hide';
CSF::createShortcoder($ceo_post_hide, array(
    'button_title'   => '添加隐藏内容',
    'select_title'   => '选择隐藏内容模式',
    'insert_title'   => '添加到文章内容中',
    'show_in_editor' => true,
));

//付费显示隐藏内容
CSF::createSection($ceo_post_hide, array(
    'title'     => '付费显示隐藏内容',
    'view'      => 'normal',
    'shortcode' => 'ceo-payment-hide',
    'fields'    => array(
        array(
            'id'          => 'sku',
            'type'        => 'number',
            'title'       => '绑定套餐',
            'desc'        => '如果是多套餐时显示隐藏内容将按照指定套餐付费或VIP特权均显示',
            'unit'        => '套餐',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '1',
        ),
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
        ),
        array(
            'type'        => 'submessage',
            'style'       => 'info',
            'content'     => '总裁主题提示您：<br/>
                1：用户付费或满足VIP特权才能查看隐藏内容，价格与VIP特权跟随商品信息；<br/>
                2：单套餐添加付费显示隐藏内容时以具体商品信息为准；<br/>
                3：多套餐添加付费显示隐藏内容时满足任意套餐付费或VIP特权均显示；<br/>
                4：此功能适用于统一信息，多套餐时若包含不同套餐不同重要隐藏信息不建议以此功能隐藏内容；<br/>
                5：格式参考：<br/>
                [ceo-payment-hide]<br/>此处为隐藏内容<br/>[/ceo-payment-hide]',
        ),

    ),
));

//登陆显示隐藏内容
CSF::createSection($ceo_post_hide, array(
    'title'     => '登陆显示隐藏内容',
    'view'      => 'normal',
    'shortcode' => 'ceo-login-hide',
    'fields'    => array(
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
        ),
        array(
            'type'        => 'submessage',
            'style'       => 'info',
            'content'     => '总裁主题提示您：<br/>
                1：添加登陆显示隐藏内容后，用户需登入后才能查看隐藏内容<br/>
                2：格式参考：<br/>
                [ceo-login-hide]<br/>此处为隐藏内容<br/>[/ceo-login-hide]',
        ),
    ),
));

//评论显示隐藏内容
CSF::createSection($ceo_post_hide, array(
    'title'     => '评论显示隐藏内容',
    'view'      => 'normal',
    'shortcode' => 'ceo-comment-hide',
    'fields'    => array(
        array(
            'id'    => 'content',
            'type'  => 'wp_editor',
            'title' => '',
        ),
        array(
            'type'        => 'submessage',
            'style'       => 'info',
            'content'     => '总裁主题提示您：<br/>
                1：添加评论显示隐藏内容后，用户需评论后才能查看隐藏内容<br/>
                2：格式参考：<br/>
                [ceo-comment-hide]<br/>此处为隐藏内容<br/>[/ceo-comment-hide]',
        ),
    ),
));

//添加付费相册
$ceo_post_album = 'ceo_post_album';
CSF::createShortcoder($ceo_post_album, array(
    'button_title'   => '添加付费相册',
    'insert_title'   => '添加到文章内容中',
    'show_in_editor' => true,
));

CSF::createSection($ceo_post_album, array(
    'title'     => '添加付费相册',
    'view'      => 'normal',
    'shortcode' => 'gallery',
    'fields'    => array(
        array(
            'id'          => "ids",
            'type'        => 'gallery',
            'title'       => '创建相册',
            'desc'        => '多选需要创建相册的图片',
            'sanitize'    => false,
        ),
        array(
            'id'          => 'sku',
            'type'        => 'number',
            'title'       => '绑定套餐',
            'desc'        => '如果是多套餐时显示隐藏内容将按照指定套餐付费或VIP特权均显示',
            'unit'        => '套餐',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '1',
        ),
        array(
            'id'          => "album_num",
            'type'        => 'number',
            'title'       => '免费查看',
            'desc'        => '填写 0 则全部收费， 填写 1 则第1张免费查看',
            'unit'        => '张',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        array(
            'id'          => 'album_hide',
            'type'        => 'button_set',
            'title'       => '隐藏样式',
            'options'     => array(
                'hide_1'  => '模糊隐藏',
                'hide_2'  => '屏蔽隐藏',
            ),
            'desc'        => '【模糊隐藏】将隐藏的图片模糊显示，【屏蔽隐藏】不显示隐藏的图片',
            'default'     => 'hide_1'
        ),
        array(
            'type'        => 'submessage',
            'style'       => 'info',
            'content'     => '总裁主题提示您：<br/>
                1：用户付费或满足VIP特权才能查看隐藏图片，价格与VIP特权跟随商品信息；<br/>
                2：单套餐添加付费相册时以具体商品信息为准；<br/>
                3：多套餐添加付费相册时满足任意套餐付费或VIP特权均显示；',
        ),
    ),
));
