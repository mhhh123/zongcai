<?php

if (!defined('ABSPATH')) {
    die;
}

$ceo_user_info = 'ceo_user_info';
CSF::createProfileOptions($ceo_user_info, array(
    'data_type' => 'unserialize',
));

// 自定义会员等级配置
$notVip = _ceo('ceo_shop_not_vip');
$vipInfo = _ceo('ceo_shop_vip_info');
$vipInfoOptions = ['vip_no' => $notVip['name'] ?? '普通用户'];
foreach ($vipInfo as $vip) {
    $vipInfoOptions[$vip['id']] = $vip['name'];
}

CSF::createSection($ceo_user_info, array(
    'title'  => '<span class="ceotheme_com"><i class="fa fa-laptop"></i> ' . CEO_THEME_TITLE . '-Pro主题 - 会员信息</span>',
    'fields' => array(
        array(
            'id'         => 'ceo_user_balance',
            'type'       => 'text',
            'title'      => '账户余额',
            'desc'       => '支持自定义修改数量',
            'default'    => '0.00',
        ),
        array(
            'id'         => 'ceo_user_integral',
            'type'       => 'text',
            'title'      => '账户积分',
            'desc'       => '支持自定义修改数量',
            'default'    => '0',
        ),
        array(
            'id'         => 'ceo_user_vip_grade',
            'type'       => 'select',
            'title'      => '会员等级',
            'desc'       => '支持自定义修改会员类型',
            'options'    => $vipInfoOptions,
            'default'    => 'vip_no',
        ),
        array(
            'id'         => 'ceo_user_vip_term',
            'type'       => 'date',
            'title'      => '到期时间',
            'desc'       => '支持自定义修改会员到期时间',
            'settings'   => array(
                'dateFormat' => 'yy-mm-dd',
            ),
            'dependency' => array('ceo_user_vip_grade', '!=', 'vip_no'),
        ),
        array(
            'id'         => 'ceo_user_type',
            'type'       => 'text',
            'title'      => '账户类型',
            'desc'       => '【普通用户】无消费记录，【付费用户】有消费记录',
            'attributes' => array(
                'readonly' => 'readonly',
            ),
            'default'    => '普通用户',
        ),
        array(
            'id'         => 'ceo_user_recommend',
            'type'       => 'text',
            'title'      => '推荐账户',
            'desc'       => '通过谁推荐注册账户',
            'attributes' => array(
                'readonly' => 'readonly',
            ),
            'default'    => '无',
        ),
        array(
            'id'         => 'ceo_user_banned',
            'type'       => 'switcher',
            'title'      => '封禁用户',
        ),
        array(
            'id'         => 'ceo_user_banned_reason',
            'type'       => 'textarea',
            'title'      => '封禁原因',
            'default'    => '您的账户涉嫌违规使用，已被管理员冻结，如有疑问请联系管理员。',
            'dependency' => array('ceo_user_banned', '==', 'true'),
        ),

    ),

));
