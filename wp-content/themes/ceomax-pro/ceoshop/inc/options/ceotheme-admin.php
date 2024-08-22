<?php

if (!defined('ABSPATH')) {
    die;
}

$ceoThemeId = CEO_THEME_ID;
CSF::createOptions($ceoThemeId, array(
    'menu_title'      => CEO_THEME_TITLE . '-Pro主题设置',
    'menu_slug'       => 'my-framework',
    'menu_icon'       => 'dashicons-laptop',
    'framework_title' => '<i class="fa fa-laptop"></i> ' . CEO_THEME_TITLE . '-Pro主题  │ <small><a href="https://www.ceotheme.com" target="_blank" style="
    text-decoration:none;color:#fff;">Theme By 总裁主题 CeoTheme.com</a></small>',
));

// 自定义会员等级配置
$vipInfo = _ceo('ceo_shop_vip_info');
$vipInfoOptions = [];
foreach ($vipInfo as $vip) {
    $vipInfoOptions[$vip['id']] = $vip['name'];
}

$vipDiscountFields = [];
foreach ($vipInfoOptions as $k => $v) {
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

/**
 * ------------------------------------------------------------------------------
 * 商城设置
 * ------------------------------------------------------------------------------
 */
CSF::createSection($ceoThemeId, array(
    'id'     => 'ceotheme_shop',
    'icon'   => 'fa fa-shopping-cart',
    'title'  => '商城设置',
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '商城基础设置',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_whole',
            'type'       => 'switcher',
            'title'      => '商城系统功能',
            'desc'       => '开启或关闭全部商城相关功能，关闭后不显示所有商城相关信息',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_tourist',
            'type'       => 'switcher',
            'title'      => '游客开放预览',
            'desc'       => '开启则支持游客（未登录用户）预览商品信息，关闭后仅限登录用户可见付费商品信息',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_tourist_buy',
            'type'       => 'switcher',
            'dependency' => array('ceo_shop_tourist', '==', 'true', '', 'visible'),
            'title'      => '游客购买权限',
            'desc'       => '开启则支持游客免登录（无需登录）即可购买站内商品，不包含实物商品（需开启游客开放预览）',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_tourist_buy_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_tourist_buy', '==', true),
            'title'      => '游客购买配置',
            'fields'     => array(
                array(
                    'id'         => 'buy_key',
                    'type'       => 'text',
                    'title'      => '游客购买密钥',
                    'desc'       => '设置10-18位安全密钥，防止恶意请求安全验证和检测',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                    'default'    => substr(md5(uniqid()), 10, 18),
                ),
                array(
                    'id'         => 'buy_free',
                    'type'       => 'switcher',
                    'title'      => '购买完全免费商品',
                    'desc'       => '开启则支持游客购买价格为0的商品，关闭则必须登录才可购买',
                    'default'    => true,
                ),
                array(
                    'id'          => 'buy_validity',
                    'type'        => 'number',
                    'title'       => '游客购买有效期',
                    'desc'        => '通过游客浏览器缓存记录订单信息，示例：数字 7 则7天后失效，需重新购买',
                    'unit'        => '天',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '7',
                ),
                array(
                    'id'         => 'buy_desc',
                    'type'       => 'text',
                    'title'      => '游客购买提示',
                    'attributes' => array(
                        'style' => 'width: 100%;',
                    ),
                    'default'    => '温馨提示：建议登录后购买！登录后可保存订单信息，参与推广活动可记录佣金',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_vip_balance_pay',
            'type'       => 'switcher',
            'title'      => '货币开通会员',
            'desc'       => '开启则支持用户通过站内货币余额开通VIP会员，关闭则不支持站内货币余额开通，仅限在线支付开通',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_vipcoupon',
            'type'       => 'switcher',
            'title'      => '会员优惠券功能',
            'desc'       => '开启则支持用户开通VIP会员时可使用VIP优惠券优惠，开启则同时支持VIP优惠券生成功能，关闭则不支持使用VIP优惠券，包含以往已赠送的VIP优惠券',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_coupon',
            'type'       => 'switcher',
            'title'      => '代金券优惠功能',
            'desc'       => '开启则支持用户购买商品时可使用代金券优惠，开启则同时支持代金券生成功能，关闭则不支持使用代金券，包含以往已赠送的代金券',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_name_switch',
            'type'       => 'switcher',
            'title'      => '统一订单名称',
            'desc'       => '开启则根据自定义订单名称，关闭则默认根据商品名称',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_name_text',
            'type'       => 'text',
            'dependency' => array('ceo_shop_name_switch', '==', true),
            'title'      => '自定义订单名称',
            'desc'       => '用户购买时在支付平台显示的订单商品名称，避免敏感词风控导致无法支付；示例：XX网自助购买订单、商城自助购买订单',
            'default'    => '自助购买订单',
        ),
        array(
            'id'         => 'ceo_shop_marketing_type',
            'type'       => 'button_set',
            'title'      => '营销策略有效方式',
            'desc'       => '当商品开启营销策略时允许那种支付方式有效，如选择在线支付时，用户使用站内货币余额购买则不会赠送，仅在线支付时赠送',
            'options'    => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'    => 'arbitrarily'
        ),
        array(
            'id'         => 'ceo_shop_vip_jump_link',
            'type'       => 'text',
            'title'      => '通用升级VIP链接',
            'desc'       => '商品设置了VIP专属，普通用户无权购买时候，跳转到升级VIP地址',
            'default'    => '/vip',
        ),
        array(
            'id'         => 'ceo_shop_download_tip_text',
            'type'       => 'text',
            'title'      => '下载框提示词',
            'desc'       => '在下载弹窗下方展示的提示词，留空则不显示',
            'default'    => '',
        ),
        array(
            'id'          => 'ceo_shop_entity_time',
            'type'        => 'number',
            'title'       => '自动收货时间',
            'desc'        => '购买实物商品多少天后自动确认收货',
            'unit'        => '天',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '14',
        ),
        array(
            'id'          => 'ceo_shop_entity_delivery',
            'type'        => 'text',
            'title'       => '快递接口AppCode',
            'desc'        => '实物商品快递物流查询信息接口  阿里云云市场【万维易源】<a href="https://market.aliyun.com/products/57126001/cmapi025388.html?spm=5176.10695662.1996646101.searchclickresult.936a284anemB9f&aly_as=txv2-Uu5#sku=yuncode19388000017" target="_blank">申请地址</a>',
        ),
        array(
            'id'         => 'ceo_shop_free_name',
            'type'       => 'select',
            'title'      => '免费价格显示',
            'desc'       => '当商品价格为 0 且完全免费时显示的内容',
            'options'    => array(
                'number'    => '显示数字【 0 XX货币】',
                'free'      => '显示文字【免费】',
            ),
            'default'    => 'number',
        ),
        array(
            'id'         => 'ceo_shop_post_append_pay',
            'type'       => 'switcher',
            'title'      => '内容底部购买框',
            'desc'       => '开启则在虚拟资源内容页面底部展示购买框，关闭则不显示（仅限商品类型为【虚拟资源】时有效）',
            'default'    => false,
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '财务资金配置',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_currency_name',
            'type'       => 'text',
            'title'      => '站内货币名称',
            'desc'       => '站内货币余额统一名称，示例：C币、XX币、金币、素材币等',
            'attributes' => array(
                'style' => 'width: 100px;',
            ),
            'default'    => 'C币',
        ),
        array(
            'id'         => 'ceo_shop_currency_proportion',
            'type'       => 'text',
            'title'      => '货币充值比例',
            'desc'       => '1：示例：数字 1 则用户充值 1 元到账 1 站内货币余额，建议比例1:1，便于财务管理<br/>
                2：建议设置后不再更改，该货币比例应用于全站货币功能，如商品价格、充值卡、代金券、VIP开通、充值比例等',
            'attributes' => array(
                'style' => 'width: 100px;',
            ),
            'default'    => '1',
        ),
        array(
            'id'         => 'ceo_shop_integral',
            'type'       => 'switcher',
            'title'      => '积分兑换货币',
            'desc'       => '1：开启则支持用户通过奖励获取的积分兑换站内货币余额<br/>
                2：积分的消费途径为兑换站内货币余额+参与营销活动，关闭后则仅可用于参与营销活动',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_integral_proportion',
            'type'       => 'text',
            'dependency' => array('ceo_shop_integral', '==', true),
            'title'      => '积分兑换比例',
            'desc'       => '1：填写消耗多少积分可以兑换 1 站内货币余额，示例：填写 100 则用户需消耗100积分即可兑换 1 站内货币余额<br/>
                2：为避免用户故意刷积分的行为，建议合理配置积分兑换比例以及相关赠送积分功能的数量',
            'attributes' => array(
                'style' => 'width: 100px;',
            ),
            'default'    => '100',
        ),
        array(
            'id'         => 'ceo_shop_card',
            'type'       => 'switcher',
            'title'      => '卡密充值货币',
            'desc'       => '开启则支持用户通过卡密充值站内货币余额，开启则同时支持卡密生成功能',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_card_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_card', '==', true),
            'title'      => '卡密充值配置',
            'fields'     => array(
                array(
                    'id'         => 'card_name',
                    'type'       => 'text',
                    'title'      => '卡密购买按钮名称',
                    'default'    => '卡密购买',
                ),
                array(
                    'id'         => 'card_link',
                    'type'       => 'text',
                    'placeholder' => 'http://',
                    'title'      => '卡密购买链接地址',
                    'desc'       => '请输入卡密购买地址，留空则隐藏卡密购买按钮',
                ),
                array(
                    'id'         => 'card_desc',
                    'type'       => 'text',
                    'title'      => '卡密购买弹窗说明',
                    'default'    => '温馨提示：购买卡密后回到此处进行充值',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_online',
            'type'       => 'switcher',
            'title'      => '在线充值货币',
            'desc'       => '开启则支持用户通过第三方接口在线充值站内货币余额（至少配置一个第三方支付接口）',
            'default'    => true,
        ),
        array(
            'id'         => 'ceo_shop_online_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_online', '==', true),
            'title'      => '货币充值配置',
            'fields'     => array(
                array(
                    'id'         => 'currency_least',
                    'type'       => 'text',
                    'title'      => '最少充值金额',
                    'desc'       => '用户在线充值最少充值金额',
                    'attributes' => array(
                        'style' => 'width: 100px;',
                    ),
                    'default'    => '1',
                ),
                array(
                    'id'         => 'currency_most',
                    'type'       => 'text',
                    'title'      => '最多充值金额',
                    'desc'       => '用户在线充值最多充值金额（当收款账户限额时可提示用户）',
                    'attributes' => array(
                        'style' => 'width: 100px;',
                    ),
                    'default'    => '9999',
                ),
                array(
                    'id'         => 'currency_combo',
                    'type'       => 'group',
                    'title'      => '充值套餐配置',
                    'desc'       => '1：【充值金额】表示用户一次性充值多少，【充值赠送】表示一次性充值多少后赠送多少<br/>
                    2：示例：充值金额填写100，充值赠送填写10，那么用户充值100后实际到账110<br/>
                    3：充值赠送可留空，留空后用户可选便捷充值金额进行充值',
                    'fields'     => array(
                        array(
                            'id'    => 'amount',
                            'type'  => 'text',
                            'title' => '充值货币'
                        ),
                        array(
                            'id'    => 'award',
                            'type'  => 'text',
                            'title' => '赠送货币'
                        ),
                    ),
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_submit_divide',
            'type'       => 'switcher',
            'title'      => '卖家售出分成',
            'desc'       => '开启则支持设置用户通过投稿商品售出分成比例，同时支持作者发布付费商品，关闭则不支持发布付费商品',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_submit_divide_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_submit_divide', '==', true),
            'title'      => '卖家售出分成配置',
            'fields'     => array(
                array(
                    'id'          => 'submit_divide_proportion',
                    'type'        => 'number',
                    'title'       => '售出分成比例',
                    'unit'        => '%',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '100',
                ),
                array(
                    'id'         => 'submit_divide_type',
                    'type'       => 'button_set',
                    'title'      => '分成结算模式',
                    'options'    => array(
                        'price_divide'    => '按商品售价结算',
                        'reality_divide'  => '按实际付费结算',
                    ),
                    'default'    => 'reality_divide'
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => '1：【按商品售价结算】：售出分成比例90%，商品售价100元，用户使用了20元代金券，用户实际付费80元，售出后作者到账 <b style="color: #ff0003;">90元</b>，其中10%即10元为平台服务费<br/>
                        2：【按实际付费结算】：售出分成比例90%，商品售价100元，用户使用了20元代金券，用户实际付费80元，售出后作者到账 <b style="color: #ff0003;">72元</b>，其中10%即8元为平台服务费<br/>
                        3：【按商品售价结算】用户若使用代金券后由平台承当差价【按实际付费结算】用户若使用代金券后由作者承当差价',
                ),

            ),
        ),
        array(
            'id'         => 'ceo_shop_withdraw',
            'type'       => 'switcher',
            'title'      => '收益佣金提现',
            'desc'       => '开启则支持设置用户通过推广和投稿获取的收益进行提现，关闭则不支持提现，并将所有收益自动进入站内账户货币余额',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_withdraw_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_withdraw', '==', true),
            'title'      => '收益提现配置',
            'fields'     => array(
                array(
                    'id'          => 'withdraw_type',
                    'type'        => 'button_set',
                    'title'       => '收益提现方式',
                    'desc'        => '选择任意提现方式时用户可自行选择提现方式，选择所选提现方式时则仅显示所选提现方式',
                    'options'     => array(
                        'all'        => '任意提现方式',
                        'cash'       => '提现到收款现金账户',
                        'currency'   => '提现到站内货币余额',
                    ),
                    'default'     => 'all',
                ),
                array(
                    'id'          => 'withdraw_amount',
                    'type'        => 'number',
                    'title'       => '最低提现金额',
                    'desc'        => '示例：填写数字 100，则满100才能发起提现',
                    'unit'        => '元',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '100',
                ),
                array(
                    'id'          => 'withdraw_handling_fee',
                    'type'        => 'number',
                    'title'       => '提现手续费用',
                    'desc'        => '示例：填写数字 10，则总提现金额中扣除10%',
                    'unit'        => '%',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '10',
                ),
                array(
                    'id'          => 'withdraw_desc',
                    'type'        => 'textarea',
                    'title'       => '申请提现说明',
                    'default'     => '①：收益累计100元即可申请提现，注意配置个人收款信息<br/>
②：申请提现后需人工处理，约2个工作日内完成提现',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => '注意事项说明：<br/>
                        1：当开启【收益佣金提现】时，建议将【货币充值比例】设置为1，便于财务管理<br/>
                        2：当关闭【收益佣金提现】时，用户不支持提现操作，并将所有收益自动进入站内账户货币余额<br/>
                        3：当收益提现方式选择仅【提现到站内货币余额】时，用户需手动申请，便于人工审核收益是否正常，同时也可以考虑关闭提现功能，关闭后用户无需申请，所有收益自动进入站内账户货币余额',
                ),
            ),
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '会员权限设置',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_not_vip',
            'type'       => 'fieldset',
            'title'      => '普通用户配置',
            'fields'     => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => '普通用户统一名称',
                    'desc'        => '示例：普通用户、青铜用户等',
                    'default'     => '普通用户',
                ),
                array(
                    'id'          => 'number',
                    'type'        => 'number',
                    'title'       => '普通用户免费次数',
                    'desc'        => '普通用户【每日】可免费下载/查看次数，仅完全免费资源时有效',
                    'unit'        => '次',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
            ),
        ),
        array(
            'id'                     => 'ceo_shop_vip_info',
            'type'                   => 'group',
            'title'                  => 'VIP等级套餐',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'fields'                 => array(
                array(
                    'id'          => 'name',
                    'type'        => 'text',
                    'title'       => 'VIP等级名称',
                    'desc'        => '示例：月卡会员、白金会员等',
                ),
                array(
                    'id'          => 'id',
                    'type'        => 'number',
                    'default'     => '0',
                    'class'       => 'hidden',
                ),
                array(
                    'id'          => 'tags',
                    'type'        => 'text',
                    'title'       => 'VIP套餐标签',
                    'desc'        => '示例：推荐、80%用户选择、优惠等',
                ),
                array(
                    'id'          => 'price',
                    'type'        => 'number',
                    'title'       => 'VIP开通价格',
                    'desc'        => 'VIP会员开通价格，价格比例与【货币充值比例】一致',
                    'unit'        => '货币',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'validity',
                    'type'        => 'number',
                    'title'       => 'VIP有效期限',
                    'desc'        => 'VIP会员有效期限，如填写数字 30 则有效期 30 天，到期后失效，永久会员填数字 99999',
                    'unit'        => '天',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'number',
                    'type'        => 'number',
                    'title'       => 'VIP免费次数',
                    'desc'        => '满足VIP权限【每日】可免费下载/查看次数，仅VIP免费资源时有效',
                    'unit'        => '次',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                ),
                array(
                    'id'          => 'desc',
                    'type'        => 'textarea',
                    'title'       => 'VIP套餐介绍',
                    'desc'        => 'VIP会员套餐介绍，使用<code>br/</code>标签换行',
                    'default'     => '尊享VIP会员特权<br/>海量资源免费下载<br/>享受VIP资源免费下载',
                ),
            ),
            'default' => array(
                array(
                    'name'      => '体验VIP会员',
                    'validity'  => '1',
                ),
                array(
                    'name'      => '月卡VIP会员',
                    'validity'  => '31',
                ),
                array(
                    'name'      => '年卡VIP会员',
                    'validity'  => '365',
                ),
                array(
                    'name'      => '永久VIP会员',
                    'validity'  => '99999',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_vip_upgrade',
            'type'       => 'fieldset',
            'title'      => 'VIP续费配置',
            'fields'     => array(
                array(
                    'id'         => 'allow_up_force',
                    'type'       => 'switcher',
                    'title'      => '是否允许越级续费',
                    'desc'       => '开启则允许用户从当前等级续费到更高等级，等级转变为更高等级，会员期限顺延，关闭则不允许用户越级续费',
                    'default'    => true,
                ),
                array(
                    'id'          => 'allow_down_force',
                    'type'        => 'switcher',
                    'title'       => '是否允许降级续费',
                    'desc'        => '开启则允许用户从当前等级续费到更低等级，等级转变为更低等级，会员期限顺延，关闭则不允许用户降级续费',
                    'default'     => false,
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_vip_module',
            'type'       => 'fieldset',
            'title'      => 'VIP模块相关提示语',
            'fields'     => array(
                array(
                    'id'          => 'title1',
                    'type'        => 'text',
                    'title'       => '无会员提示语',
                    'default'     => '快去升级超级会员吧~',
                ),
                array(
                    'id'          => 'title2',
                    'type'        => 'text',
                    'title'       => '模块提示语',
                    'default'     => '开通超级会员，尊享平台特权',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_vip_title',
            'type'       => 'fieldset',
            'title'      => 'VIP弹窗标题',
            'fields'     => array(
                array(
                    'id'          => 'title',
                    'type'        => 'text',
                    'title'       => '主标题',
                    'default'     => '开通超级会员·尊享平台特权',
                ),
                array(
                    'id'          => 'subtitle',
                    'type'        => 'text',
                    'title'       => '副标题',
                    'default'     => '会员尊享海量资源免费下载 - 精品VIP资源会员专享 - 专属客服快速响应',
                ),
            ),
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '营销推广设置',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_sign_in',
            'type'       => 'switcher',
            'title'      => '用户签到奖励',
            'desc'       => '开启则支持设置用户通过签到获取奖励，开启则同时开启签到功能',
            'default'    => false,
        ),
        array(
            'id'         => 'sign_in_date',
            'type'       => 'tabbed',
            'dependency' => array('ceo_shop_sign_in', '==', true),
            'title'      => '用户签到奖励配置',
            'desc'       => '每7天为一个周期，连续签到超过7天后重新循环，不满一个周期断签则重新开始【填写数字 0 为不赠送】',
            'tabs'       => array(
                array(
                    'title'     => '第1天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_1_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_1_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第2天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_2_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_2_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第3天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_3_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_3_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第4天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_4_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_4_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第5天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_5_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_5_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第6天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_6_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_6_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
                array(
                    'title'     => '第7天',
                    'fields'    => array(
                        array(
                            'id'          => 'sign_in_7_integral',
                            'type'        => 'number',
                            'title'       => '赠送积分',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                        array(
                            'id'          => 'sign_in_7_balance',
                            'type'        => 'number',
                            'title'       => '赠送货币',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                            'default'     => '0',
                        ),
                    )
                ),
            )
        ),
        array(
            'id'         => 'ceo_shop_give',
            'type'       => 'switcher',
            'title'      => '用户注册奖励',
            'desc'       => '开启则支持设置新注册用户赠送奖励',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_give_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_give', '==', true),
            'title'      => '用户注册奖励配置',
            'desc'       => '选填，可同时赠送多项或赠送单项',
            'fields'     => array(
                array(
                    'id'          => 'give_integral',
                    'type'        => 'number',
                    'title'       => '赠送积分',
                    'desc'        => '新用户赠送积分，0 为不赠送',
                    'unit'        => '积分',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'give_currency',
                    'type'        => 'number',
                    'title'       => '赠送货币',
                    'desc'        => '新用户赠送站内货币余额，0 为不赠送',
                    'unit'        => '货币',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'         => 'give_coupon',
                    'type'       => 'text',
                    'title'      => '赠送代金券',
                    'desc'       => '输入代金券代码，留空不赠送',
                ),
                array(
                    'id'         => 'give_vip',
                    'type'       => 'text',
                    'title'      => '赠送VIP优惠券',
                    'desc'       => '输入VIP优惠券代码，留空不赠送',
                ),
            ),
        ),
        // array(
        //     'id'         => 'ceo_shop_task',
        //     'type'       => 'switcher',
        //     'title'      => '完成任务奖励',
        //     'desc'       => '开启则支持设置用户完成相关任务赠送奖励',
        //     'default'    => false,
        // ),
        // array(
        //     'id'         => 'ceo_shop_task_set',
        //     'type'       => 'fieldset',
        //     'dependency' => array('ceo_shop_task', '==', true),
        //     'title'      => '任务奖励配置',
        //     'fields'     => array(
        //         array(
        //             'id'          => 'task_1',
        //             'type'        => 'number',
        //             'title'       => '实名认证奖励',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'id'          => 'task_2',
        //             'type'        => 'number',
        //             'title'       => '绑定邮箱账号奖励',
        //             'desc'        => '仅使用第三方注册时有效，新用户使用表单注册时无效',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'id'          => 'task_3',
        //             'type'        => 'number',
        //             'title'       => '绑定手机登录奖励',
        //             'desc'        => '仅使用表单注册时或其他第三方注册时有效，新用户使用手机注册时无效',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'id'          => 'task_4',
        //             'type'        => 'number',
        //             'title'       => '绑定QQ登录奖励',
        //             'desc'        => '仅使用表单注册时或其他第三方注册时有效，新用户使用QQ注册时无效',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'id'          => 'task_5',
        //             'type'        => 'number',
        //             'title'       => '绑定微信登录奖励',
        //             'desc'        => '仅使用表单注册时或其他第三方注册时有效，新用户使用微信注册时无效',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'id'          => 'task_6',
        //             'type'        => 'number',
        //             'title'       => '绑定微博登录奖励',
        //             'desc'        => '仅使用表单注册时或其他第三方注册时有效，新用户使用微博注册时无效',
        //             'unit'        => '积分',
        //             'output'      => '.heading',
        //             'output_mode' => 'width',
        //             'default'     => '0',
        //         ),
        //         array(
        //             'type'    => 'submessage',
        //             'style'   => 'info',
        //             'content' => '任务奖励说明<br/>
        //                 1：为避免用户故意刷积分，任务仅首次操作时奖励，后续换绑时无效<br/>
        //                 2：填写 0 则不启用，填写 1 至以上数字时启用',
        //         ),
        //     ),
        // ),
        array(
            'id'         => 'ceo_shop_submit_award',
            'type'       => 'switcher',
            'title'      => '作者投稿奖励',
            'desc'       => '开启则支持设置用户通过投稿获取奖励',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_submit_award_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_submit_award', '==', true),
            'title'      => '作者投稿奖励配置',
            'desc'       => '【审核通过后赠送】合理利用此功能用于激励用户投稿或售卖商品，促进网站发展',
            'fields'     => array(
                array(
                    'id'          => 'submit_award_integral',
                    'type'        => 'number',
                    'title'       => '赠送积分',
                    'desc'        => '投稿后赠送积分，0 为不赠送',
                    'unit'        => '积分',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'submit_award_currency',
                    'type'        => 'number',
                    'title'       => '赠送货币',
                    'desc'        => '投稿后赠送站内货币余额，0 为不赠送',
                    'unit'        => '货币',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'submit_award_coupon',
                    'type'        => 'text',
                    'title'       => '赠送代金券',
                    'desc'        => '输入代金券代码，留空不赠送',
                ),
                array(
                    'id'          => 'submit_award_vip',
                    'type'        => 'text',
                    'title'       => '赠送VIP优惠券',
                    'desc'        => '输入VIP优惠券代码，留空不赠送',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_recommend_register',
            'type'       => 'switcher',
            'title'      => '推广注册奖励',
            'desc'       => '开启则支持设置用户通过邀请好友获取奖励',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_recommend_register_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_recommend_register', '==', true),
            'title'      => '推广注册奖励配置',
            'fields'     => array(
                array(
                    'id'         => 'recommend_ip',
                    'type'       => 'switcher',
                    'title'      => '新用户IP判断',
                    'desc'       => '开启则自动判断被邀请注册新用户IP，同一IP重复注册时不赠送任何奖励，关闭则不限制',
                    'default'    => true,
                ),
                array(
                    'id'          => 'recommend_integral',
                    'type'        => 'number',
                    'title'       => '赠送积分',
                    'desc'        => '邀请好友注册赠送积分，0 为不赠送',
                    'unit'        => '积分',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'recommend_currency',
                    'type'        => 'number',
                    'title'       => '赠送货币',
                    'desc'        => '邀请好友注册赠送站内货币余额，0 为不赠送',
                    'unit'        => '货币',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'recommend_coupon',
                    'type'        => 'text',
                    'title'       => '赠送代金券',
                    'desc'        => '输入代金券代码，留空不赠送',
                ),
                array(
                    'id'          => 'recommend_vip',
                    'type'        => 'text',
                    'title'       => '赠送VIP优惠券',
                    'desc'        => '输入VIP优惠券代码，留空不赠送',
                ),
                array(
                    'id'          => 'recommend_vipday',
                    'type'        => 'fieldset',
                    'title'       => '赠送VIP会员',
                    'fields'      => array(
                        array(
                            'id'          => 'people',
                            'type'        => 'number',
                            'title'       => '邀请多少人注册',
                            'unit'        => '人',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                        ),
                        array(
                            'id'         => 'vip_grade',
                            'type'       => 'select',
                            'title'      => '赠送会员等级',
                            'options'    => $vipInfoOptions,
                        ),
                        array(
                            'id'      => 'accumulating',
                            'type'    => 'switcher',
                            'title'   => '累加赠送',
                            'desc'    => '开启则每满多少人都赠送，关闭则满足条件只赠送一次奖励',
                            'default' => false,
                        ),
                    ),
                ),
                array(
                    'id'          => 'recommend_desc',
                    'type'        => 'textarea',
                    'title'       => '推广注册说明',
                    'desc'        => '以上为示例内容，请根据实际配置修改信息',
                    'default'     => '①：通过您的推广链接注册后，平台赠送的奖励立即到账<br/>
②：通过您的推广链接注册后，永久成为您的二级用户<br/>
③：通过您的推广链接注册并消费的所有订单均可获得佣金奖励<br/>
④：佣金累计100元即可申请提现，注意配置个人收款信息<br/>
⑤：申请提现后需人工处理，约2个工作日内完成提现<br/>
⑥：切勿违规操作，任何一例作弊行为将取消全部奖励<br/>',
                ),
            ),
        ),
        array(
            'id'         => 'ceo_shop_recommend_buy',
            'type'       => 'switcher',
            'title'      => '推广消费佣金',
            'desc'       => '开启则支持设置用户通过邀请好友消费后获取奖励，关闭则邀请的好友消费后无佣金奖励',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_recommend_buy_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_recommend_buy', '==', true),
            'title'      => '推广消费佣金配置',
            'fields'     => array(
                array(
                    'id'         => 'recommend_type',
                    'type'       => 'button_set',
                    'title'      => '佣金结算模式',
                    'desc'       => '【按收益结算】支持提现，【按货币结算】不支持提现，自动进入货币余额',
                    'options'    => array(
                        'income'   => '按收益结算',
                        'balance'  => '按货币结算',
                    ),
                    'default'    => 'balance'
                ),
                array(
                    'id'          => 'recommend_proportion_1',
                    'type'        => 'number',
                    'title'       => '一级佣金比例',
                    'desc'        => '流程：A邀请B，B消费后赠送A佣金，填写 0 为无佣金<br/>
                        示例：填写数字 5 则A可获得B实际消费的5%',
                    'unit'        => '%',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'recommend_proportion_2',
                    'type'        => 'number',
                    'title'       => '二级佣金比例',
                    'desc'        => '流程：A邀请B，B邀请C，C消费后赠送A佣金，填写 0 为无二级佣金，非必填<br/>
                        示例：填写数字 3 则A可获得C实际消费的3%',
                    'unit'        => '%',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'id'          => 'recommend_proportion_3',
                    'type'        => 'number',
                    'title'       => '三级佣金比例',
                    'desc'        => '流程：A邀请B，B邀请C，C邀请D，D消费后赠送A佣金，填写 0 为无三级佣金，非必填<br/>
                        示例：填写数字 1 则A可获得D实际消费的1%',
                    'unit'        => '%',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '0',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => '1：用户邀请的好友注册并消费后赠送百分比消费佣金，填写 0 为无佣金<br/>
                        2：多层级的关系加以宣传能激励用户参与推广，同时增加平台依赖性，但也会增加成本，因此建议合理配置佣金比例以及慎重考虑是否开启【二级】【三级】佣金关系<br/>
                        3：每个用户都是独立的一级推广员，即使B是被推广人，但B也是C1、C2、C3的一级推广员，每个用户都可以拥有最多三级的关联性<br/>
                        4：佣金以实际消费金额计算，即减去代金券后的实际消费金额，如：订单总额100元，使用20元代金券，实际消费80元，则以80元的百分比计算',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'danger',
                    'content' => '示例<br/><br/>
                        1：只开启一级佣金示例：一级佣金比例10%，订单总额100元，A邀请B，B实际消费100元，则奖励A【10】元佣金，即实际消费的10%【平台总支出佣金10元】<br/><br/>

                        2：同时开启一级二级佣金示例：一级佣金比例10%，二级佣金比例5%，订单总额100元，A邀请B，B邀请C，C实际消费100元，则奖励A【5】元佣金，C和A之间就是二级佣金关系，同时奖励B【10元】佣金，因为B和C之间是一级佣金关系，即实际消费的一级佣金10%+二级佣金5%【平台总支出佣金15元】<br/><br/>

                        3：同时开启一级二级三级佣金示例：一级佣金比例10%，二级佣金比例5%，三级佣金比例2%，订单总额100元，A邀请B，B邀请C，C邀请D，D实际消费100元，则奖励A【2】元佣金，D和A之间就是三级佣金关系，同时奖励B【5元】佣金，因为D和B之间是二级佣金关系，同时奖励C【10元】佣金，因为D和C之间是一级佣金关系，即实际消费的一级佣金10%+二级佣金5%+三级佣金2%【平台总支出佣金17元】',
                ),
            ),
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '营销活动设置',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_lottery',
            'type'       => 'switcher',
            'title'      => '抽奖活动',
            'desc'       => '开启则支持设置抽奖活动；注意需创建【抽奖活动页面】',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_lottery_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_lottery', '==', true),
            'title'      => '抽奖活动配置',
            'fields'     => array(
                array(
                    'id'          => 'user',
                    'type'        => 'button_set',
                    'title'       => '活动参与用户',
                    'desc'        => '活动参与用户',
                    'options'     => array(
                        'all'      => '全部用户',
                        'vip'      => 'VIP用户',
                    ),
                    'default'     => 'all'
                ),
                array(
                    'id'          => 'date',
                    'type'        => 'date',
                    'title'       => '活动有效期至',
                    'desc'        => '选择活动有效期，超出有效期后将不允许参与',
                    'settings'    => array(
                        'dateFormat'   => 'yy-mm-dd',
                        'changeMonth'  => true,
                        'changeYear'   => true,
                    )
                ),
                array(
                    'id'          => 'quantity',
                    'type'        => 'number',
                    'title'       => '活动参与次数',
                    'desc'        => '每人每天参与次数，00:00点后刷新',
                    'unit'        => '次',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '1',
                ),
                array(
                    'id'          => 'integral',
                    'type'        => 'number',
                    'title'       => '抽奖消耗积分',
                    'desc'        => '每次参与抽奖活动消耗多少积分',
                    'unit'        => '积分',
                    'output'      => '.heading',
                    'output_mode' => 'width',
                    'default'     => '10',
                ),
                array(
                    'id'          => 'prize',
                    'type'        => 'group',
                    'accordion_title_number' => true,
                    'title'       => '奖品配置',
                    'button_title' => '添加奖品',
                    'desc'        => '请确保信息完善，否则无效',
                    'fields'      => array(
                        array(
                            'id'          => 'title',
                            'type'        => 'text',
                            'title'       => '奖品标题',
                            'desc'        => '示例：奖品1、一等奖',
                            'default'     => '奖品1',
                        ),
                        array(
                            'id'           => 'img',
                            'type'         => 'upload',
                            'title'        => '奖品图片',
                            'desc'         => '建议尺寸50x50',
                            'placeholder'  => 'http://',
                            'button_title' => '上传',
                            'remove_title' => '删除',
                        ),
                        array(
                            'id'         => 'type',
                            'type'       => 'button_set',
                            'title'      => '奖品类型',
                            'options'    => array(
                                'no'          => '无奖',
                                'integral'    => '积分',
                                'currency'    => '货币',
                                'coupon'      => '代金券',
                                'vip'         => 'VIP优惠券',
                            ),
                            'default'    => 'no'
                        ),
                        array(
                            'id'          => 'no',
                            'type'        => 'text',
                            'dependency'  => array('type', '==', 'no'),
                            'title'       => '无奖提示',
                            'desc'        => '无奖提示，如谢谢参与',
                            'default'     => '好可惜啊，差一点就中了！',
                        ),
                        array(
                            'id'          => 'integral',
                            'type'        => 'number',
                            'dependency'  => array('type', '==', 'integral'),
                            'title'       => '赠送积分',
                            'desc'        => '输入积分数量',
                            'unit'        => '积分',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                        ),
                        array(
                            'id'          => 'currency',
                            'type'        => 'number',
                            'dependency'  => array('type', '==', 'currency'),
                            'title'       => '赠送货币',
                            'desc'        => '输入货币金额',
                            'unit'        => '货币',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                        ),
                        array(
                            'id'         => 'coupon',
                            'type'       => 'text',
                            'dependency'  => array('type', '==', 'coupon'),
                            'title'      => '赠送代金券',
                            'desc'       => '输入代金券代码',
                        ),
                        array(
                            'id'         => 'vip',
                            'type'       => 'text',
                            'dependency'  => array('type', '==', 'vip'),
                            'title'      => '赠送VIP优惠券',
                            'desc'       => '输入VIP优惠券代码',
                        ),
                        array(
                            'id'          => 'probability',
                            'type'        => 'number',
                            'title'       => '中奖概率',
                            'desc'        => '<p style="color: #f00;">合计100%为满额，将100%数值分配到所有奖品中；注意合计超出100%或低于100%均无效</p>',
                            'unit'        => '%',
                            'output'      => '.heading',
                            'output_mode' => 'width',
                        ),
                    )
                ),
            ),
        ),
        array(
            'type'    => 'notice',
            'style'   => 'warning',
            'content' => '预留占位分割线，欢迎提供更多优秀的营销活动方案',
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '支付接口设置',
    'fields' => array(
        //支付宝-电脑网站支付
        array(
            'id'         => 'ceo_shop_pay_alipay',
            'type'       => 'switcher',
            'title'      => '支付宝官方-电脑网站支付',
            'desc'       => '新应用模式 <a href="https://www.alipay.com" target="_blank">申请地址</a> │ <a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'alipay',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_alipay', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'appid',
                    'type'       => 'text',
                    'title'      => '应用APPID',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'privateKey',
                    'type'       => 'textarea',
                    'title'      => '应用私钥',
                ),
                array(
                    'id'         => 'publicKey',
                    'type'       => 'textarea',
                    'title'      => '支付宝公钥',
                ),
                array(
                    'id'         => 'mobile_pay',
                    'type'       => 'switcher',
                    'title'      => '手机端H5支付',
                    'desc'       => '需开通【手机网站支付】权限，开启后支持手机浏览器内唤醒支付宝APP支付',
                    'default'    => false,
                ),
            ),
        ),
        //支付宝配置-当面付
        array(
            'id'         => 'ceo_shop_pay_alipay_dmf',
            'type'       => 'switcher',
            'title'      => '支付宝官方-当面付',
            'desc'       => '新应用模式 <a href="https://www.alipay.com" target="_blank">申请地址</a> │ <a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'alipay_dmf',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_alipay_dmf', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'appid',
                    'type'       => 'text',
                    'title'      => '应用APPID',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'privateKey',
                    'type'       => 'textarea',
                    'title'      => '应用私钥',
                ),
                array(
                    'id'         => 'publicKey',
                    'type'       => 'textarea',
                    'title'      => '支付宝公钥',
                ),
                array(
                    'id'         => 'mobile_pay',
                    'type'       => 'switcher',
                    'title'      => '手机端H5支付',
                    'desc'       => '需开通【手机网站支付】权限，开启后支持手机浏览器内唤醒支付宝APP支付',
                    'default'    => false,
                ),
            ),
        ),
        //微信支付配置
        array(
            'id'         => 'ceo_shop_pay_weixinpay',
            'type'       => 'switcher',
            'title'      => '微信支付官方',
            'desc'       => '需企业资质、需认证服务号 <a href="https://pay.weixin.qq.com" target="_blank">申请地址</a> │ <a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'weixinpay',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_weixinpay', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'merchant_id',
                    'type'       => 'text',
                    'title'      => '微信支付商户号',
                    'desc'       => '帐户中心-商户信息-微信支付商户号',
                ),
                array(
                    'id'         => 'appid',
                    'type'       => 'text',
                    'title'      => '服务号APPID',
                    'desc'       => '产品中心-AppID账号管理',
                ),
                array(
                    'id'         => 'apikey',
                    'type'       => 'text',
                    'title'      => '微信支付API密钥',
                    'desc'       => '帐户中心-API安全-设置APIv2密钥',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'jsapi_pay',
                    'type'       => 'switcher',
                    'title'      => '微信内支付',
                    'desc'       => '需开通【JSAPI支付】权限，开启后支持微信内打开网站支持唤醒微信支付',
                    'default'    => false,
                ),
                array(
                    'id'         => 'mobile_pay',
                    'type'       => 'switcher',
                    'title'      => '手机端H5支付',
                    'desc'       => '需开通【H5支付】权限，开启后支持手机浏览器内跳转到微信支付',
                    'default'    => false,
                ),
                array(
                    'id'         => 'mobile_pay_guide',
                    'type'       => 'switcher',
                    'title'      => '手机端H5支付引导',
                    'desc'       => '无需【H5支付】权限，开启后支付页面会引导用户手动从手机浏览器内跳转到微信支付',
                    'dependency' => array('mobile_pay', '==', false),
                    'default'    => true,
                ),
                array(
                    'id'         => 'mobile_pay_guide_text',
                    'type'       => 'text',
                    'title'      => '手机端H5支付引导提示',
                    'desc'       => '支付时候的引导提示',
                    'dependency' => array('mobile_pay_guide', '==', true),
                    'default'    => '点击复制链接 → 点击打开微信 → 搜索自己微信名 → 打开聊天对话框 → 粘贴链接 → 发送 → 点击发送出来的蓝色链接 → 进入付款页面 → 完成付款',
                ),
            ),
        ),
        //虎皮椒-微信
        array(
            'id'         => 'ceo_shop_pay_hupijiao_weixin',
            'type'       => 'switcher',
            'title'      => '虎皮椒-微信',
            'desc'       => '支持个人申请 <a href="https://admin.xunhupay.com/sign-up.html" target="_blank">申请地址</a> │ <a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'hupijiao_weixin',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_hupijiao_weixin', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'appid',
                    'type'       => 'text',
                    'title'      => 'APPID',
                ),
                array(
                    'id'         => 'appsecret',
                    'type'       => 'text',
                    'title'      => 'APPSECRET',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'url_do',
                    'type'       => 'text',
                    'title'      => '支付网关',
                    'desc'       => '非虎皮椒官方变更则无需更改',
                    'default'    => 'https://api.xunhupay.com/payment/do.html',
                ),
            ),
        ),
        //虎皮椒-支付宝
        array(
            'id'         => 'ceo_shop_pay_hupijiao_alipay',
            'type'       => 'switcher',
            'title'      => '虎皮椒-支付宝',
            'desc'       => '支持个人申请 <a href="https://admin.xunhupay.com/sign-up.html" target="_blank">申请地址</a> │ <a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'hupijiao_alipay',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_hupijiao_alipay', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'appid',
                    'type'       => 'text',
                    'title'      => 'APPID',
                ),
                array(
                    'id'         => 'appsecret',
                    'type'       => 'text',
                    'title'      => 'APPSECRET',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'url_do',
                    'type'       => 'text',
                    'title'      => '支付网关',
                    'desc'       => '非虎皮椒官方变更则无需更改',
                    'default'    => 'https://api.xunhupay.com/payment/do.html',
                ),
            ),
        ),
        //易支付-微信
        array(
            'id'         => 'ceo_shop_pay_epay_weixin',
            'type'       => 'switcher',
            'title'      => '易支付-微信',
            'desc'       => '<a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'epay_weixin',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_epay_weixin', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'mchid',
                    'type'       => 'text',
                    'title'      => '商户ID',
                ),
                array(
                    'id'         => 'mchsecret',
                    'type'       => 'text',
                    'title'      => '商户KEY',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'url_do',
                    'type'       => 'text',
                    'title'      => '支付网关',
                    'desc'       => '易支付接口地址，请填写完整接口地址，同时支持submit提交和API扫码方式，如http://pay.ceotheme.com/submit.php',
                    'default'    => '',
                ),
            ),
        ),
        //易支付-支付宝
        array(
            'id'         => 'ceo_shop_pay_epay_alipay',
            'type'       => 'switcher',
            'title'      => '易支付-支付宝',
            'desc'       => '<a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'epay_alipay',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_epay_alipay', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'mchid',
                    'type'       => 'text',
                    'title'      => '商户ID',
                ),
                array(
                    'id'         => 'mchsecret',
                    'type'       => 'text',
                    'title'      => '商户KEY',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'url_do',
                    'type'       => 'text',
                    'title'      => '支付网关',
                    'desc'       => '易支付接口地址，请填写完整接口地址，同时支持submit提交和API扫码方式，如http://pay.ceotheme.com/submit.php',
                    'default'    => '',
                ),
            ),
        ),
        //V免签-微信
        array(
            'id'         => 'ceo_shop_pay_vmq',
            'type'       => 'switcher',
            'title'      => 'V免签',
            'desc'       => '<a href="https://www.ceotheme.com" target="_blank">配置教程</a>',
            'default'    => false,
        ),
        array(
            'id'         => 'vmq_config',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_pay_vmq', '==', true),
            'title'      => '接口配置',
            'fields'     => array(
                array(
                    'id'         => 'key',
                    'type'       => 'text',
                    'title'      => '通讯秘钥',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                ),
                array(
                    'id'         => 'url_do',
                    'type'       => 'text',
                    'title'      => '支付网关',
                    'desc'       => 'V免签接口地址，请填写完整协议，注意http协议与结尾/斜杆，如http://pay.ceotheme.com/',
                    'default'    => '',
                ),
                array(
                    'id'         => 'text',
                    'type'       => 'text',
                    'title'      => '提示语',
                    'desc'       => '金额使用<code>{xxx}</code>调用',
                    'default'    => '为确保支付正常请务必扫码后输入 {xxx} 元进行支付',
                ),
                array(
                    'id'         => 'vmq_weixin_switch',
                    'type'       => 'switcher',
                    'title'      => '微信支付',
                    'default'    => true,
                ),
                array(
                    'id'         => 'vmq_alipay_switch',
                    'type'       => 'switcher',
                    'title'      => '支付宝支付',
                    'default'    => true,
                ),
            ),
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '商城系统扩展',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_download_driver_123',
            'type'       => 'switcher',
            'title'      => '123云盘直链鉴权',
            'desc'       => '开启则支持使用123云盘的直链下载URL鉴权功能，设置过期时间，保护下载资源安全。',
            'default'    => false,
        ),
        array(
            'id'         => 'ceo_shop_download_driver_123_set',
            'type'       => 'fieldset',
            'dependency' => array('ceo_shop_download_driver_123', '==', true),
            'title'      => '123云盘配置',
            'fields'     => array(
                array(
                    'id'         => 'uid',
                    'type'       => 'text',
                    'title'      => '账号ID',
                    'desc'       => '个人中心 - 基本设置 - 账户ID',
                ),
                array(
                    'id'         => 'auth_key',
                    'type'       => 'text',
                    'title'      => '鉴权密钥',
                    'desc'       => '直链管理 - URL鉴权 - 鉴权密钥',
                ),
                array(
                    'id'         => 'expire_second',
                    'type'       => 'number',
                    'title'      => '过期时间',
                    'desc'       => '用户点击生成的链接多长时间过期，默认60秒',
                    'unit'       => '秒',
                    'default'    => '60',
                ),
            ),
        ),
    )
));
CSF::createSection($ceoThemeId, array(
    'parent' => 'ceotheme_shop',
    'title'  => '发布默认参数',
    'fields' => array(
        array(
            'id'         => 'ceo_shop_type_default',
            'type'       => 'button_set',
            'title'      => '商品类型',
            'options'    => array(
                'close'    => '文章内容',
                'virtual'  => '虚拟资源',
                'entity'   => '实物商品',
                'video'    => '视频课程',
                'card'     => '卡密发放',
            ),
            'default'    => 'virtual'
        ),
        /******************************************虚拟资源-开始******************************************/
        array(
            'id'                     => 'ceo_shop_virtual_info_default',
            'type'                   => 'group',
            'class'                  => 'group_first_expand',
            'title'                  => '资源信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type_default', '==', 'virtual'),
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
            'default' => array(
                array(
                    'name'  => '',
                ),
            ),
        ),
        /*虚拟资源-营销策略*/
        array(
            'id'           => 'ceo_shop_virtual_marketing_default',
            'dependency'   => array('ceo_shop_type_default', '==', 'virtual'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'      => false,
        ),
        array(
            'id'           => 'ceo_shop_virtual_marketing_set_default',
            'type'         => 'fieldset',
            'dependency'   => [array('ceo_shop_type_default', '==', 'virtual'), array('ceo_shop_virtual_marketing_default', '==', true)],
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
        ),
        /*虚拟资源-有效期限*/
        array(
            'id'          => 'ceo_shop_virtual_validity_default',
            'type'        => 'number',
            'title'       => '有效期限',
            'desc'        => '0 等于无限期，例：填写数字7则7天后自动到期，已购用户需重新付费购买',
            'dependency'  => array('ceo_shop_type_default', '==', 'virtual'),
            'unit'        => '天',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        /*虚拟资源-累计销量*/
        array(
            'id'          => 'ceo_shop_virtual_sales_default',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type_default', '==', 'virtual'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        /*虚拟资源-支付方式*/
        array(
            'id'           => 'ceo_shop_virtual_pay_default',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type_default', '==', 'virtual'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'      => 'arbitrarily'
        ),
        /******************************************虚拟资源-结束******************************************/

        /******************************************实物商品-开始******************************************/
        /*实物商品-多品类*/
        array(
            'id'                     => 'ceo_shop_entity_info_default',
            'type'                   => 'group',
            'title'                  => '商品信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type_default', '==', 'entity'),
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
            'default' => array(
                array(
                    'name'  => '',
                ),
            ),
        ),
        /*实物商品-营销策略*/
        array(
            'id'           => 'ceo_shop_entity_marketing_default',
            'dependency'   => array('ceo_shop_type_default', '==', 'entity'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'      => false,
        ),
        array(
            'id'         => 'ceo_shop_entity_marketing_set_default',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type_default', '==', 'entity'), array('ceo_shop_entity_marketing_default', '==', true)],
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
        ),
        /*实物商品-支付方式*/
        array(
            'id'           => 'ceo_shop_entity_pay_default',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type_default', '==', 'entity'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'      => 'online'
        ),
        /******************************************实物商品-结束******************************************/

        /******************************************视频课程-开始******************************************/
        array(
            'id'           => 'ceo_shop_video_pay_type_default',
            'dependency'   => array('ceo_shop_type_default', '==', 'video'),
            'type'         => 'switcher',
            'title'        => '合集付费',
            'default'      => false,
        ),
        array(
            'id'         => 'ceo_shop_video_pay_type_set_default',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type_default', '==', 'video'), array('ceo_shop_video_pay_type_default', '==', true)],
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
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'title'       => 'VIP折扣',
                    'class'       => 'vip-discount',
                    'fields'      => $vipDiscountFields,
                ),
            ),
        ),
        array(
            'id'                     => 'ceo_shop_video_info_default',
            'type'                   => 'group',
            'title'                  => '课程信息',
            'button_title'           => '添加课程',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type_default', '==', 'video'),
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
                    'dependency' => array('ceo_shop_video_pay_type_default', '==', 'false', 'all'),
                    'title'       => 'VIP专属',
                    'desc'        => '开启则仅限VIP用户购买，普通用户无购买权限，关闭则允许所有用户购买',
                    'default'     => false,
                ),
                array(
                    'id'          => 'discount',
                    'type'        => 'fieldset',
                    'dependency' => array('ceo_shop_video_pay_type_default', '==', 'false', 'all'),
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
            'default' => array(
                array(
                    'name'  => '',
                ),
            ),
        ),
        /*视频课程-附件下载*/
        array(
            'id'                     => 'ceo_shop_video_down_default',
            'type'                   => 'group',
            'accordion_title_number' => true,
            'title'                  => '附件下载',
            'button_title'           => '添加附件',
            'help'                   => '链接名称：可自定义填写某某网盘、本地下载、高速下载等，留空则按顺序显示【下载地址1】【下载地址2】以此类推
                <br/><br/>下载链接：可自定义填写网盘链接、本地上传、可访问或可下载的链接等<br/><br/>隐藏信息：可自定义填写网盘提取码、解压密码、激活码、联系方式等，留空则不显示',
            'dependency'             => array('ceo_shop_type_default', '==', 'video'),
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
                    'title'    => '隐藏信息',
                    'attributes' => array(
                        'style' => 'width: 100%;',
                    ),
                ),
            ),
        ),
        /*视频课程-营销策略*/
        array(
            'id'           => 'ceo_shop_video_marketing_default',
            'dependency'   => array('ceo_shop_type_default', '==', 'video'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'      => false,
        ),
        array(
            'id'         => 'ceo_shop_video_marketing_set_default',
            'type'       => 'fieldset',
            'dependency' => [array('ceo_shop_type_default', '==', 'video'), array('ceo_shop_video_marketing_default', '==', true)],
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
        ),
        /*视频课程-有效期限*/
        array(
            'id'          => 'ceo_shop_video_validity_default',
            'type'        => 'number',
            'title'       => '有效期限',
            'desc'        => '0 等于无限期，例：填写数字7则7天后自动到期，已购用户需重新付费购买',
            'dependency'  => array('ceo_shop_type_default', '==', 'video'),
            'unit'        => '天',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        /*视频课程-累计销量*/
        array(
            'id'          => 'ceo_shop_video_sales_default',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type_default', '==', 'video'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        /*视频课程-支付方式*/
        array(
            'id'           => 'ceo_shop_video_pay_default',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方在线支付',
            'dependency'   => array('ceo_shop_type_default', '==', 'video'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'      => 'arbitrarily'
        ),
        /******************************************视频课程-结束******************************************/

        /******************************************卡密发放-开始******************************************/
        /*卡密发放-卡密配置*/
        array(
            'id'                     => 'ceo_shop_card_info_default',
            'type'                   => 'group',
            'title'                  => '卡密信息',
            'button_title'           => '添加套餐',
            'accordion_title_number' => true,
            'dependency'             => array('ceo_shop_type_default', '==', 'card'),
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
            'default' => array(
                array(
                    'name'  => '',
                ),
            ),
        ),
        /*卡密发放-营销策略*/
        array(
            'id'           => 'ceo_shop_card_marketing_default',
            'dependency'   => array('ceo_shop_type_default', '==', 'card'),
            'type'         => 'switcher',
            'title'        => '营销策略',
            'default'      => false,
        ),
        array(
            'id'           => 'ceo_shop_card_marketing_set_default',
            'type'         => 'fieldset',
            'dependency'   => [array('ceo_shop_type_default', '==', 'card'), array('ceo_shop_card_marketing_default', '==', true)],
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
        ),
        /*卡密发放-累计销量*/
        array(
            'id'          => 'ceo_shop_card_sales_default',
            'type'        => 'number',
            'title'       => '累计销量',
            'desc'        => '支持自定义修改数字，售出自动累加数量',
            'dependency'  => array('ceo_shop_type_default', '==', 'card'),
            'unit'        => '次',
            'output'      => '.heading',
            'output_mode' => 'width',
            'default'     => '0',
        ),
        /*卡密发放-支付方式*/
        array(
            'id'           => 'ceo_shop_card_pay_default',
            'type'         => 'button_set',
            'title'        => '支付方式',
            'desc'         => '【任意支付】支持余额/在线；【余额支付】仅限账户余额；【在线支付】仅限第三方接口在线支付',
            'dependency'   => array('ceo_shop_type_default', '==', 'card'),
            'options'      => array(
                'arbitrarily'   => '任意支付',
                'balance'       => '余额支付',
                'online'        => '在线支付',
            ),
            'default'      => 'arbitrarily'
        ),
        /******************************************卡密发放-结束******************************************/
    )
));
