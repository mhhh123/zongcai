<?php

if (!defined('ABSPATH')) {
    die;
}



if (!_ceo('ceo_shop_whole')) {
    return;
}

$vipDiscountFields = [];
foreach (CeoShopCoreUser::getVipGradeList(2, false) as $k => $v) {
    $vipDiscountFields[] = [
        'id'          => $k,
        'type'        => 'number',
        'title'       => $v . '折扣',
        'unit'        => '折',
        'output'      => '.heading',
        'output_mode' => 'width',
        'default'     => '0',
    ];
}
$vipDiscountFields[] = [
    'type'    => 'submessage',
    'style'   => 'info',
    'content' => '自定义VIP折扣，普通用户原价；填写 5 等于VIP5折，填写 10 等于VIP原价，填写 0 等于VIP免费，请填写数字0-10之间',
];

$currencyName = _ceo('ceo_shop_currency_name');

$ceo_post_shop = 'ceo_post_shop';
CSF::createMetabox($ceo_post_shop, array(
    'title'     => '<span class="ceotheme_com"><i class="fa fa-laptop"></i> ' . CEO_THEME_TITLE . '-Pro主题 - 商品信息</span>',
    'post_type' => 'post',
    'data_type' => 'unserialize',
    'show_restore' => true,
    'priority' => 'high',
    'context' => 'normal',
));
CSF::createSection($ceo_post_shop, array(
    'fields' => array(
        array(
            'id'         => 'ceo_shop_type',
            'type'       => 'button_set',
            'title'      => '商品类型',
            'options'    => array(
                'close'    => '文章内容',
                'virtual'  => '虚拟资源',
                'entity'   => '实物商品',
                'video'    => '视频课程',
                'card'     => '卡密发放',
            ),
            'default'    => _ceo('ceo_shop_type_default'),
        ),
        /******************************************虚拟资源-开始******************************************/
        array(
            'id'                     => 'ceo_shop_virtual_info',
            'type'                   => 'group',
            'class'                  => 'group_first_expand',
            'title'                  => '资源信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type', '==', 'virtual'),
            'fields'                 => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => '套餐名称',
                    'desc'        => '注：一组时无需填写，多组时未填写套餐名称则按顺序【套餐1】【套餐2】以此类推',
                ),
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'title'       => '价格',
                    'desc'        => '填写 0 等于免费',
                    'unit'        => $currencyName,
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'           => 'exclusive',
                    'type'         => 'switcher',
                    'title'        => 'VIP专属',
                    'desc'         => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'      => false,
                ),
                array(
                    'id'          => 'discount-slider',
                    'type'        => 'slider',
                    'title'       => '统一折扣设置',
                    'default'     => 0,
                    'min'         => '0',
                    'max'         => '10',
                    'unit'        => '折',
                    'class'       => 'vip-discount-slider'
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
                array(
                    'id'                     => 'down',
                    'type'                   => 'group',
                    'accordion_title_number' => true,
                    'title'                  => '下载地址',
                    'button_title'           => '添加链接',
                    'help'                   => '链接名称：可自定义填写某某网盘、本地下载、高速下载等，留空则按顺序显示【下载地址1】【下载地址2】以此类推
                        <br/><br/>下载链接：可自定义填写网盘链接、本地上传、可访问或可下载的链接等<br/><br/>隐藏信息：可自定义填写网盘提取码、解压密码、激活码、联系方式等，留空则不显示',
                    'fields'                 => array(
                        array(
                            'id'           => 'name',
                            'type'         => 'text',
                            'title'        => '链接名称',
                        ),
                        array(
                            'id'           => 'url',
                            'type'         => 'upload',
                            'title'        => '下载链接',
                            'sanitize'     => false,
                        ),
                        array(
                            'id'           => 'hide',
                            'type'         => 'text',
                            'title'        => (_ceo('ceoshop_single_an')['ceo_shop_download_hide_text_1'] ?? '隐藏信息1'),
                            'attributes' => array(
                                'style' => 'width: 100%;',
                            ),
                        ),
                        array(
                            'id'           => 'hide2',
                            'type'         => 'text',
                            'title'        => (_ceo('ceoshop_single_an')['ceo_shop_download_hide_text_2'] ?? '隐藏信息2'),
                            'attributes' => array(
                                'style' => 'width: 100%;',
                            ),
                        ),
                    ),
                ),
            ),
            'default'    => _ceo('ceo_shop_virtual_info_default'),
        ),
        /*虚拟资源-营销策略*/
        array(
            'id'           => 'ceo_shop_virtual_marketing',
            'dependency'   => array('ceo_shop_type', '==', 'virtual'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'    => _ceo('ceo_shop_virtual_marketing_default'),
        ),
        array(
            'id'           => 'ceo_shop_virtual_marketing_set',
            'type'         => 'fieldset',
            'dependency'   => [array('ceo_shop_type', '==', 'virtual'), array('ceo_shop_virtual_marketing', '==', true)],
            'title'        => '营销设置',
            'desc'         => '【赠送积分】填写0则不赠送，【赠送消费券】留空则不赠送，【赠送VIP优惠券】留空则不赠送；支持赠送单项，支持多项',
            'fields'       => array(
                array(
                    'id'           => 'marketing_integral',
                    'type'         => 'number',
                    'title'        => '赠送积分',
                    'unit'         => '分',
                    'output'       => '.heading',
                    'output_mode'  => 'width',
                    'default'      => '0',
                ),
                array(
                    'id'           => 'marketing_coupon_discount',
                    'type'         => 'text',
                    'title'        => '赠送代金券',
                    'placeholder'  => '请输入消费券代码',
                ),
                array(
                    'id'           => 'marketing_coupon_vip',
                    'type'         => 'text',
                    'title'        => '赠送VIP优惠券',
                    'placeholder'  => '请输入VIP优惠券代码',
                ),
            ),
            'default'    => _ceo('ceo_shop_virtual_marketing_set_default'),
        ),
        /*虚拟资源-有效期限*/
        array(
            'id'          => 'ceo_shop_virtual_validity',
            'type'        => 'number',
            'title'       => '有效期限',
            'desc'        => '0 等于无限期，例：填写数字7则7天后自动到期，已购用户需重新付费购买',
            'dependency'  => array('ceo_shop_type', '==', 'virtual'),
            'unit'        => '天',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'    => _ceo('ceo_shop_virtual_validity_default'),
        ),
        /*虚拟资源-累计销量*/
        array(
            'id'          => 'ceo_shop_virtual_sales',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type', '==', 'virtual'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'    => _ceo('ceo_shop_virtual_sales_default'),
        ),
        /*虚拟资源-支付方式*/
        array(
            'id'           => 'ceo_shop_virtual_pay',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type', '==', 'virtual'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'    => _ceo('ceo_shop_virtual_pay_default'),
        ),
        /******************************************虚拟资源-结束******************************************/

        /******************************************实物商品-开始******************************************/
        /*实物商品-多品类*/
        array(
            'id'                     => 'ceo_shop_entity_info',
            'type'                   => 'group',
            'title'                  => '商品信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type', '==', 'entity'),
            'fields'                 => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => '套餐名称',
                    'desc'        => '注：一组时无需填写，多组时未填写套餐名称则按顺序【套餐1】【套餐2】以此类推',
                ),
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'title'       => '价格',
                    'desc'        => '填写 0 等于免费',
                    'unit'        => $currencyName,
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'exclusive',
                    'type'        => 'switcher',
                    'title'       => 'VIP专属',
                    'desc'        => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'     => false,
                ),
                array(
                    'id'          => 'discount-slider',
                    'type'        => 'slider',
                    'title'       => '统一折扣设置',
                    'default'     => 0,
                    'min'         => '0',
                    'max'         => '10',
                    'unit'        => '折',
                    'class'       => 'vip-discount-slider'
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
                array(
                    'id'          => 'freight',
                    'type'        => 'number',
                    'title'       => '运费',
                    'desc'        => '填写0等于免运费，0以上则运费加入到订单总额',
                    'unit'        => '元',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'sales',
                    'type'        => 'number',
                    'title'       => '已售数量',
                    'desc'        => '支持自定义修改数字，售出自动累加数量',
                    'unit'        => '个',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'inventory',
                    'type'        => 'number',
                    'title'       => '库存数量',
                    'desc'        => '支持自定义修改数字，售出自动减少数量',
                    'unit'        => '个',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '9999',
                ),
            ),
            'default'    => _ceo('ceo_shop_entity_info_default'),
        ),
        /*实物商品-营销策略*/
        array(
            'id'           => 'ceo_shop_entity_marketing',
            'dependency'   => array('ceo_shop_type', '==', 'entity'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'    => _ceo('ceo_shop_entity_marketing_default'),
        ),
        array(
            'id'         => 'ceo_shop_entity_marketing_set',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type', '==', 'entity'), array('ceo_shop_entity_marketing', '==', true)],
            'title'      => '营销设置',
            'desc'       => '【赠送积分】填写0则不赠送，【赠送消费券】留空则不赠送，【赠送VIP优惠券】留空则不赠送；支持赠送单项，支持多项',
            'fields'     => array(
                array(
                    'id'           => 'marketing_integral',
                    'type'         => 'number',
                    'title'        => '赠送积分',
                    'unit'         => '分',
                    'output'       => '.heading',
                    'output_mode'  => 'width',
                    'default'      => '0',
                ),
                array(
                    'id'           => 'marketing_coupon_discount',
                    'type'         => 'text',
                    'title'        => '赠送代金券',
                    'placeholder'  => '请输入消费券代码',
                ),
                array(
                    'id'           => 'marketing_coupon_vip',
                    'type'         => 'text',
                    'title'        => '赠送VIP优惠券',
                    'placeholder'  => '请输入VIP优惠券代码',
                ),
            ),
            'default'    => _ceo('ceo_shop_entity_marketing_set_default'),
        ),
        /*实物商品-支付方式*/
        array(
            'id'           => 'ceo_shop_entity_pay',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type', '==', 'entity'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'    => _ceo('ceo_shop_entity_pay_default'),
        ),
        /******************************************实物商品-结束******************************************/

        /******************************************视频课程-开始******************************************/
        array(
            'id'           => 'ceo_shop_video_pay_type',
            'dependency'   => array('ceo_shop_type', '==', 'video'),
            'type'         => 'switcher',
            'title'        => '合集付费',
            'default'    => _ceo('ceo_shop_video_pay_type_default'),
        ),
        array(
            'id'         => 'ceo_shop_video_pay_type_set',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type', '==', 'video'), array('ceo_shop_video_pay_type', '==', true)],
            'title'      => '合集付费设置',
            'desc'       => '',
            'fields'     => array(
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'title'       => '价格',
                    'desc'        => '填写 0 等于免费',
                    'unit'        => $currencyName,
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'exclusive',
                    'type'        => 'switcher',
                    'title'       => 'VIP专属',
                    'desc'        => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'     => false,
                ),
                array(
                    'id'          => 'discount-slider',
                    'type'        => 'slider',
                    'title'       => '统一折扣设置',
                    'default'     => 0,
                    'min'         => '0',
                    'max'         => '10',
                    'unit'        => '折',
                    'class'       => 'vip-discount-slider'
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
            ),
            'default'    => _ceo('ceo_shop_video_pay_type_set_default'),
        ),
        array(
            'id'                     => 'ceo_shop_video_info',
            'type'                   => 'group',
            'title'                  => '课程信息',
            'button_title'           => '添加课程',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type', '==', 'video'),
            'fields'                 => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => '课程名称',
                    'desc'        => '注：一组时可留空，默认按文章标题显示，多组时未填写名称则按顺序【课程1】【课程2】以此类推',
                ),
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'dependency' => array('ceo_shop_video_pay_type', '==', 'false', 'all'),
                    'title'       => '价格',
                    'desc'        => '填写 0 等于免费',
                    'unit'        => $currencyName,
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'exclusive',
                    'type'        => 'switcher',
                    'dependency' => array('ceo_shop_video_pay_type', '==', 'false', 'all'),
                    'title'       => 'VIP专属',
                    'desc'        => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'     => false,
                ),
                array(
                    'id'         => 'discount-slider',
                    'type'       => 'slider',
                    'dependency' => array('ceo_shop_video_pay_type', '==', 'false', 'all'),
                    'title'      => '统一折扣设置',
                    'default'    => 0,
                    'min'        => '0',
                    'max'        => '10',
                    'unit'       => '折',
                    'class'      => 'vip-discount-slider'
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'dependency' => array('ceo_shop_video_pay_type', '==', 'false', 'all'),
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
                array(
                    'id'          => 'player',
                    'type'        => 'select',
                    'title'       => '播放器',
                    'options'     => ['ckplayer' => 'ckplayer播放器', 'dplayer' => 'DPlayer播放器'],
                    'desc'        => '默认ckplayer播放器，不同播放器支持的视频格式不同，如果第一个播放器不支持播放就换第二个',
                ),
                array(
                    'id'          => 'video_img',
                    'type'        => 'upload',
                    'title'       => '视频封面',
                    'desc'        => '留空则显示文章缩略图',
                ),
                array(
                    'id'          => 'video_url',
                    'type'        => 'upload',
                    'title'       => '视频地址',
                    'desc'        => '可直接上传MP4视频或填写MP4/M3U8等格式视频地址，同时使用第三方视频地址，如B站、腾讯视频、优酷等。',
                ),
            ),
            'default'    => _ceo('ceo_shop_video_info_default'),
        ),
        /*视频课程-附件下载*/
        array(
            'id'                     => 'ceo_shop_video_down',
            'type'                   => 'group',
            'accordion_title_number' => true,
            'title'                  => '附件下载',
            'button_title'           => '添加附件',
            'help'                   => '链接名称：可自定义填写某某网盘、本地下载、高速下载等，留空则按顺序显示【下载地址1】【下载地址2】以此类推
                <br/><br/>下载链接：可自定义填写网盘链接、本地上传、可访问或可下载的链接等<br/><br/>隐藏信息：可自定义填写网盘提取码、解压密码、激活码、联系方式等，留空则不显示',
            'dependency'             => array('ceo_shop_type', '==', 'video'),
            'fields'                 => array(
                array(
                    'id'       => 'name',
                    'type'     => 'text',
                    'title'    => '链接名称',

                ),
                array(
                    'id'       => 'url',
                    'type'     => 'upload',
                    'title'    => '下载链接',
                    'sanitize' => false,
                ),
                array(
                    'id'       => 'hide',
                    'type'     => 'text',
                    'title'    => '隐藏信息1',
                    'attributes' => array(
                        'style' => 'width: 100%;',
                    ),
                ),
                array(
                    'id'       => 'hide2',
                    'type'     => 'text',
                    'title'    => '隐藏信息2',
                    'attributes' => array(
                        'style' => 'width: 100%;',
                    ),
                ),
            ),
            'default'    => _ceo('ceo_shop_video_down_default'),
        ),
        /*视频课程-营销策略*/
        array(
            'id'           => 'ceo_shop_video_marketing',
            'dependency'   => array('ceo_shop_type', '==', 'video'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'    => _ceo('ceo_shop_video_marketing_default'),
        ),
        array(
            'id'         => 'ceo_shop_video_marketing_set',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type', '==', 'video'), array('ceo_shop_video_marketing', '==', true)],
            'title'      => '营销设置',
            'desc'       => '【赠送积分】填写0则不赠送，【赠送消费券】留空则不赠送，【赠送VIP优惠券】留空则不赠送；支持赠送单项，支持多项',
            'fields'     => array(
                array(
                    'id'           => 'marketing_integral',
                    'type'         => 'number',
                    'title'        => '赠送积分',
                    'unit'         => '分',
                    'output'       => '.heading',
                    'output_mode'  => 'width',
                    'default'      => '0',
                ),
                array(
                    'id'           => 'marketing_coupon_discount',
                    'type'         => 'text',
                    'title'        => '赠送代金券',
                    'placeholder'  => '请输入消费券代码',
                ),
                array(
                    'id'           => 'marketing_coupon_vip',
                    'type'         => 'text',
                    'title'        => '赠送VIP优惠券',
                    'placeholder'  => '请输入VIP优惠券代码',
                ),
            ),
            'default'    => _ceo('ceo_shop_video_marketing_set_default'),
        ),
        /*视频课程-有效期限*/
        array(
            'id'          => 'ceo_shop_video_validity',
            'type'        => 'number',
            'title'       => '有效期限',
            'desc'        => '0 等于无限期，例：填写数字7则7天后自动到期，已购用户需重新付费购买',
            'dependency'  => array('ceo_shop_type', '==', 'video'),
            'unit'        => '天',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'    => _ceo('ceo_shop_video_validity_default'),
        ),
        /*视频课程-累计销量*/
        array(
            'id'          => 'ceo_shop_video_sales',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type', '==', 'video'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'    => _ceo('ceo_shop_video_sales_default'),
        ),
        /*视频课程-支付方式*/
        array(
            'id'           => 'ceo_shop_video_pay',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方在线支付',
            'dependency'   => array('ceo_shop_type', '==', 'video'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'    => _ceo('ceo_shop_video_pay_default'),
        ),
        /******************************************视频课程-结束******************************************/

        /******************************************卡密发放-开始******************************************/
        /*卡密发放-卡密配置*/
        array(
            'id'                     => 'ceo_shop_card_info',
            'type'                   => 'group',
            'title'                  => '卡密信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type', '==', 'card'),
            'fields'                 => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => '套餐名称',
                    'desc'        => '注：一组时无需填写，多组时未填写套餐名称则按顺序【套餐1】【套餐2】以此类推',
                ),
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'title'       => '价格',
                    'desc'        => '填写 0 等于免费',
                    'unit'        => $currencyName,
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'exclusive',
                    'type'        => 'switcher',
                    'title'       => 'VIP专属',
                    'desc'        => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'     => false,
                ),
                array(
                    'id'          => 'discount-slider',
                    'type'        => 'slider',
                    'title'       => '统一折扣设置',
                    'default'     => 0,
                    'min'         => '0',
                    'max'         => '10',
                    'unit'        => '折',
                    'class'       => 'vip-discount-slider'
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
                array(
                    'id'        => 'card',
                    'type'      => 'textarea',
                    'title'     => '卡密配置',
                    'desc'      => '支持填写多条卡密信息；每一行为一条卡密信息；用户购买后按从上到下顺序发放<br/>
                        格式参考：（一行中支持任意格式）<br/>
                        卡号：123456789 密码：987654321<br/>
                        卡密：123456789<br/>
                        已售卡密：（已经出售的卡密会在对应卡密后显示购买用户的ID）<br/>
                        卡号：123456789 密码：987654321<code style="color: #ff0000;">|CEO123456789</code>',
                ),
            ),
            'default'    => _ceo('ceo_shop_card_info_default'),
        ),
        /*卡密发放-营销策略*/
        array(
            'id'           => 'ceo_shop_card_marketing',
            'dependency'   => array('ceo_shop_type', '==', 'card'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'    => _ceo('ceo_shop_card_marketing_default'),
        ),
        array(
            'id'           => 'ceo_shop_card_marketing_set',
            'type'         => 'fieldset',
            'dependency'   => [array('ceo_shop_type', '==', 'card'), array('ceo_shop_card_marketing', '==', true)],
            'title'        => '营销设置',
            'desc'         => '【赠送积分】填写0则不赠送，【赠送消费券】留空则不赠送，【赠送VIP优惠券】留空则不赠送；支持赠送单项，支持多项',
            'fields'       => array(
                array(
                    'id'           => 'marketing_integral',
                    'type'         => 'number',
                    'title'        => '赠送积分',
                    'unit'         => '分',
                    'output'       => '.heading',
                    'output_mode'  => 'width',
                    'default'      => '0',
                ),
                array(
                    'id'           => 'marketing_coupon_discount',
                    'type'         => 'text',
                    'title'        => '赠送代金券',
                    'placeholder'  => '请输入消费券代码',
                ),
                array(
                    'id'           => 'marketing_coupon_vip',
                    'type'         => 'text',
                    'title'        => '赠送VIP优惠券',
                    'placeholder'  => '请输入VIP优惠券代码',
                ),
            ),
            'default'    => _ceo('ceo_shop_card_marketing_set_default'),
        ),
        /*卡密发放-累计销量*/
        array(
            'id'          => 'ceo_shop_card_sales',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type', '==', 'card'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'    => _ceo('ceo_shop_card_sales_default'),
        ),
        /*卡密发放-支付方式*/
        array(
            'id'           => 'ceo_shop_card_pay',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type', '==', 'card'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'    => _ceo('ceo_shop_card_pay_default'),
        ),
        /******************************************卡密发放-结束******************************************/
    )
));
