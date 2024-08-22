<?php

if ( ! defined('ABSPATH')) {
    die;
}
/**
 * CeoMax-Pro主题是一款极致美观强大的WordPress付费资源下载主题。
 * 正版唯一购买地址：https://www.ceotheme.com/
 * 作者总裁QQ：110300260 （总裁）
 * Ta 为资源站、下载站、交易站、素材站、源码站、课程站、CMS等站点而生，Ta 更为追求极致的你而生。
 * 能理解使用盗版的人，但是不能接受传播盗版。
 * CeoTheme总裁主题制作的CeoMax-Pro主题正版用户可享受该主题不限制域名，不限制数量，无限授权，仅限本人享有此特权，外泄主题包将取消授权资格！
 * 开发者不易，感谢支持，全天候在线客户服务+技术支持为您服务。
 */
if (class_exists('CSF')) {
    $ceotheme = 'ceomax';
    CSF::createOptions($ceotheme, array(
        'menu_title'      => 'CeoMax-Pro主题',
        'menu_slug'       => 'my-framework',
        'menu_icon'       => 'dashicons-laptop',
        'framework_title' => '<i class="fa fa-laptop"></i> CeoMax-Pro主题  │ <small><a href="https://www.ceotheme.com" target="_blank" class="wb-btn" style="
    text-decoration:none;color:#ffffff;">Theme By 总裁主题 CeoTheme.com</a></small>',
    ));

    /*
     * ------------------------------------------------------------------------------
     * 基本设置
     * ------------------------------------------------------------------------------
     */
     CSF::createSection($ceotheme, array(
        'id'     => 'ceotheme_basic',
        'icon'   => 'fa fa-cog',
        'title'  => '基本设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_basic',
        'title'  => '网站基本设置',
        'fields' => array(
            array(
                'id'           => 'head_logo',
                'type'         => 'upload',
                'title'        => '网站LOGO图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/logo.png',
                'desc'         => 'LOGO尺寸建议：宽150px高49px',
            ),
            array(
                'id'           => 'head_logo_nav3',
                'type'         => 'upload',
                'title'        => '透明LOGO图片',
                'desc'         => 'LOGO尺寸建议：宽150px高49px，适用于暗黑模式 / 导航样式【三】LOGO图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/logo_b.png',
            ),
            array(
                'id'         => 'app_head_logo_style',
                'type'       => 'radio',
                'title'      => '手机端LOGO样式',
                'inline'     => true,
                'options'    => array(
                    '1' => '样式一【使用手机独立LOGO】',
                    '2' => '样式二【使用默认LOGO缩放】',
                ),
                'default'    => '1',
            ),
            array(
                'id'           => 'app_head_logo',
                'type'         => 'upload',
                'title'        => '手机端LOGO图标',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/app_logo.png',
                'dependency'   => array('app_head_logo_style', '==', 1),
                'desc'         => '手机端LOGO尺寸：宽38px高38px图标形式',
            ),
            array(
                'id'           => 'favicon',
                'type'         => 'upload',
                'title'        => '网站favicon.ico图标',
                'desc'         => '浏览器/收藏夹图标 <a href="https://ico.ceotheme.com/" target="_blank" style="color: #0a8eff;">点击这里立即生成</a> 网站favicon.ico图标',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （整站背景设置）',
            ),

            array(
                'id'      => 'ceo_bg',
                'type'    => 'switcher',
                'title'   => '整站背景图片',
                'desc'    => '开启或关闭整站背景图片设置（默认关闭）',
                'default' => false
            ),
            array(
                'id'      => 'ceo_bg_img',
                'dependency' => array('ceo_bg', '==', true),
                'type'    => 'upload',
                'title'   => '背景图片',
                'desc'    => '背景图片上传',
                'default' => get_template_directory_uri() . '/static/images/ceo_zz_bg.png',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （用户组名称设置）',
            ),
            array(
                'id'     => 'user_group_name',
                'type'   => 'fieldset',
                'title'  => '用户组名称',
                'fields' => array(
                    array(
                        'id'      => 'user_admin',
                        'type'    => 'text',
                        'title'   => '管理员',
                        'desc'    => '管理员 用户组名称修改',
                        'default' => '管理员',
                    ),
                    array(
                        'id'      => 'user_edit',
                        'type'    => 'text',
                        'title'   => '编辑',
                        'desc'    => '编辑 用户组名称修改',
                        'default' => '编辑',
                    ),
                    array(
                        'id'      => 'user_author',
                        'type'    => 'text',
                        'title'   => '作者',
                        'desc'    => '作者 用户组名称修改',
                        'default' => '作者',
                    ),
                    array(
                        'id'      => 'user_contributor',
                        'type'    => 'text',
                        'title'   => '贡献者',
                        'desc'    => '贡献者 用户组名称修改',
                        'default' => '贡献者',
                    ),
                    array(
                        'id'      => 'user_subscriber',
                        'type'    => 'text',
                        'title'   => '订阅者',
                        'desc'    => '订阅者 用户组名称修改',
                        'default' => '订阅者',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_basic',
        'title'  => '网站SEO设置',
        'fields' => array(
            array(
                'id'    => 'website_title',
                'type'  => 'text',
                'title' => '网站标题',
            ),
            array(
                'id'    => 'website_keywords',
                'type'  => 'textarea',
                'title' => '网站关键词',
                'desc'  => '一般不超过100个字符，使用英文【,】逗号分隔'
            ),
            array(
                'id'    => 'website_description',
                'type'  => 'textarea',
                'title' => '网站描述',
                'desc'  => '一般不超过200个字符'
            ),
            array(
                'id'       => 'category',
                'type'     => 'switcher',
                'title'    => '去掉分类目录中的category',
                'desc'     => '去掉分类目录中的category，精简URL，有利于SEO，推荐去掉',
                'default'  => true,
            ),
            array(
                'id'      => 'tpl_seo',
                'type'    => 'switcher',
                'title'   => '主题内置SEO功能',
                'desc'    => '开启或关闭主题内置SEO功能（如未使用其他SEO相关插件的情况下，请开启）',
                'default' => true
            ),
        )
    ));

    /*
     * ------------------------------------------------------------------------------
     * 顶部设置
     * ------------------------------------------------------------------------------
     */
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_top',
        'icon'  => 'fa fa-paper-plane',
        'title' => '顶部设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_top',
        'title'  => '导航样式设置',
        'fields' => array(
                array(
                    'id'      => 'navbar_sticky',
                    'type'    => 'switcher',
                    'title'   => '顶部导航跟随',
                    'desc'    => '开启或关闭顶部导航跟随（导航样式三、样式四不支持）',
                    'default' => false
                ),
                array(
                    'id'        => 'navbar_style',
                    'type'      => 'image_select',
                    'title'     => '顶部导航样式',
                    'desc'		=> '[ 样式一：导航居左 ] [ 样式二：双排全局导航 ] [ 样式三：全宽透明居中（建议搭配幻灯样式4使用） ] [ 样式四：全宽居左]',
                    'options'   => array(
                        '1' => get_template_directory_uri() . '/static/admin-img/ceo-navbar-1.jpg',
                        '2' => get_template_directory_uri() . '/static/admin-img/ceo-navbar-2.jpg',
                        '3' => get_template_directory_uri() . '/static/admin-img/ceo-navbar-3.jpg',
                        '4' => get_template_directory_uri() . '/static/admin-img/ceo-navbar-4.jpg',
                    ),
                    'default'   => '1',
                ),
                //双排全局导航
                array(
                    'id'         => 'navbar_2',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'text',
                    'title'      => 'LOGO右侧标题',
                    'desc'       => 'LOGO右侧的副标题',
                    'default'    => '专注WP开发',
                ),
                array(
                    'id'         => 'navbar_2_ss',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'switcher',
                    'title'      => '顶部中间搜索框',
                    'desc'       => '开启或关闭导航中间搜索框（开启则显示，关闭则隐藏）',
                    'default'    => true
                ),
                //搜索框按钮
                    array(
                    'id'         => 'navbar_2_ssan',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'fieldset',
                    'title'      => '搜索框右侧按钮设置',
                    'fields'     => array(
                        array(
                            'id'      => 'navbar_2_ssan_icon',
                            'type'    => 'text',
                            'title'   => '按钮图标',
                            'default' => 'ceoicon-edit-2-line',
                            'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                        ),
                        array(
                            'id'      => 'navbar_2_ssan_title',
                            'type'    => 'text',
                            'title'   => '按钮标题',
                            'desc'    => '填写按钮标题',
                            'default' => '创作中心',
                        ),
                        array(
                            'id'      => 'navbar_2_ssan_link',
                            'type'    => 'text',
                            'title'   => '按钮链接',
                            'desc'    => '填写按钮链接地址',
                            'default' => '/',
                        ),
                        array(
                            'id'           => 'navbar_2_ssan_img',
                            'type'         => 'upload',
                            'title'        => '按钮右侧小图片',
                            'placeholder'  => 'http://',
                            'button_title' => '上传',
                            'remove_title' => '删除',
                            'default'      => get_template_directory_uri() . '/static/images/icon_server.png',
                        ),
                    ),
                ),

                //自定义导航颜色
                array(
                    'id'         => 'navbar_2_color',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'switcher',
                    'title'      => '自定义导航颜色',
                    'desc'       => '开启或关闭自定义导航颜色（开启则生效，关闭则无效，默认透明）开启自定义导航颜色建议关闭左侧标题，有影响美观哟~',
                    'default'    => false
                ),
                array(
                    'id'         => 'navbar_2_color_sz',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'fieldset',
                    'title'      => '导航颜色设置',
                    'fields'     => array(
                        array(
                            'id'      => 'navbar_2_color_b',
                            'type'    => 'color',
                            'title'   => '导航条背景颜色',
                            'default' => '#026eff'
                        ),
                        array(
                            'id'      => 'navbar_2_color_z',
                            'type'    => 'color',
                            'title'   => '导航条字体颜色',
                            'default' => '#fff'
                        ),
                    ),
                ),
                //导航左侧
                array(
                    'id'         => 'navbar_2_zuo',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'switcher',
                    'title'      => '导航左侧标题',
                    'desc'       => '开启或关闭导航左侧标题（开启则显示，关闭则隐藏）',
                    'default'    => true
                ),
                array(
                    'id'         => 'navbar_2_zuo_an',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'fieldset',
                    'title'      => '导航左侧标题设置',
                    'fields'     => array(
                        array(
                            'id'      => 'navbar_2_zuo_icon',
                            'type'    => 'text',
                            'title'   => '标题图标',
                            'default' => 'ceoicon-shield-check-line',
                            'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                        ),
                        array(
                            'id'      => 'navbar_2_zuo_title',
                            'type'    => 'text',
                            'title'   => '标题文字',
                            'desc'    => '填写导航标题',
                            'default' => '专业资源平台',
                        ),
                    ),
                ),
                //导航右侧
                array(
                    'id'         => 'navbar_2_you',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'switcher',
                    'title'      => '导航右侧二维码弹窗',
                    'desc'       => '开启或关闭导航右侧二维码弹窗（开启则显示，关闭则隐藏）',
                    'default'    => true
                ),
                array(
                    'id'         => 'navbar_2_you_an',
                    'dependency' => array('navbar_style', '==', '2'),
                    'type'       => 'fieldset',
                    'title'      => '导航右侧二维码弹窗设置',
                    'fields'     => array(
                        array(
                            'id'           => 'navbar_2_you_img',
                            'type'         => 'upload',
                            'title'        => '按钮小图片',
                            'placeholder'  => 'http://',
                            'button_title' => '上传',
                            'remove_title' => '删除',
                            'default'      => get_template_directory_uri() . '/static/images/ceo-focus.png',
                        ),
                        array(
                            'id'      => 'navbar_2_you_title',
                            'type'    => 'text',
                            'title'   => '弹窗主标题',
                            'default' => '扫一扫',
                        ),
                        array(
                            'id'      => 'navbar_2_you_htitle',
                            'type'    => 'text',
                            'title'   => '弹窗副标题',
                            'default' => '秒变设计达人',
                        ),
                        array(
                            'id'           => 'navbar_2_you_erweima',
                            'type'         => 'upload',
                            'title'        => '弹窗二维码',
                            'placeholder'  => 'http://',
                            'button_title' => '上传',
                            'remove_title' => '删除',
                            'default'      => get_template_directory_uri() . '/static/images/ceo-ma.png',
                        ),
                    ),
                ),
                ),
            ));
            //导航设置
            //array(
            //    'type'    => 'notice',
            //    'style'   => 'warning',
            //    'content' => '分割线 （导航跟随设置）',
            //),
            //array(
            //    'id'         => 'fixed_header',
            //    'type'       => 'switcher',
            //    'title'      => '顶部导航菜单跟随',
            //    'desc'       => '开启或关闭顶部导航菜单跟随( 默认开启 )（开启则跟随，关闭则固定）',
            //    'default'    => false
            //),
            CSF::createSection($ceotheme, array(
            'parent'     => 'ceotheme_top',
            'title'  => '导航按钮设置',
            'fields' => array(
                array(
                    'id'      => 'head_login',
                    'type'    => 'switcher',
                    'title'   => '顶部登录/注册按钮',
                    'desc'    => '隐藏/显示顶部登录/注册按钮（开启则显示，关闭则隐藏）',
                    'default' => true
                ),
                array(
                    'id'      => 'head_sosuo',
                    'type'    => 'switcher',
                    'title'   => '弹窗搜索按钮',
                    'desc'    => '隐藏/显示顶部弹窗搜索按钮（开启则显示，关闭则隐藏）',
                    'default' => true
                ),
                array(
                    'id'      => 'head_night',
                    'type'    => 'switcher',
                    'title'   => '夜间模式按钮',
                    'desc'    => '隐藏/显示顶部夜间模式按钮（开启则显示，关闭则隐藏）',
                    'default' => true
                ),
                array(
                    'id'      => 'is_switch_day_night',
                    'type'    => 'switcher',
                    'title'   => '是否开启自动暗黑转换',
                    'desc'    => '是否开启自动暗黑转换（开启则自动根据现在的模式切换，关闭则无任何效果，一直白天）',
                    'default' => true
                ),
                array(
                    'id'      => 'all_night_theme',
                    'type'    => 'switcher',
                    'title'   => '是否默认使用暗黑风格',
                    'desc'    => '是否默认使用暗黑风格（开启则全时间段都是暗黑模式）',
                    'default' => false
                ),

                array(
                    'id'      => 'modal_show_h',
                    'type'    => 'switcher',
                    'title'   => '顶部导航弹窗按钮',
                    'desc'    => '开启或关闭顶部导航搜索按钮（开启则显示，关闭则隐藏）【关闭按钮不影响 “ 整站弹窗公告 ” 】',
                    'default' => true
                ),

                ),
            ));
            CSF::createSection($ceotheme, array(
                'parent'     => 'ceotheme_top',
                'title'  => '顶部用户弹窗',
                'fields' => array(
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '以下默认参数正常情况下无需修改！',
                    ),
                    array(
                        'id'      => 'ceo_user_t_yexf',
                        'type'    => 'switcher',
                        'title'   => '余额/消费模块',
                        'desc'    => '开启或关闭余额/消费模块（开启则显示，关闭则隐藏）',
                        'default' => true,
                    ),
                    array(
                        'id'      => 'ceo_user_t_vip',
                        'type'    => 'switcher',
                        'title'   => 'VIP级别/升级VIP',
                        'desc'    => '开启或关闭VIP级别/升级VIP模块（开启则显示，关闭则隐藏）',
                        'default' => true,
                    ),
                    array(
                        'id'         => 'ceo_user_t_vip_sz',
                        'type'       => 'fieldset',
                        'dependency' => array('ceo_user_t_vip', '==', true),
                        'title'      => 'VIP模块设置',
                        'fields'     => array(
                            array(
                                'id'      => 'ceo_user_t_vip_title',
                                'type'    => 'text',
                                'title'   => 'VIP标题',
                                'default' => '升级VIP',
                            ),
                            array(
                                'id'      => 'ceo_user_t_vip_link',
                                'type'    => 'text',
                                'title'   => '升级链接',
                                'default' => '/member/center/',
                            ),
                            array(
                                'id'      => 'ceo_user_t_vip_desc',
                                'type'    => 'text',
                                'title'   => 'VIP描述',
                                'default' => '升级VIP尊享全站海量下载！',
                            ),
                        ),
                    ),
                     array(
                        'id'         => 'ceo_user_tg_sz',
                        'type'       => 'fieldset',
                        'title'      => '投稿按钮设置',
                        'fields'     => array(
                            array(
                                'id'      => 'ceo_user_tg_title',
                                'type'    => 'text',
                                'title'   => '按钮标题',
                                'default' => '创作中心',
                            ),
                            array(
                                'id'      => 'ceo_user_tg_icon',
                                'type'    => 'text',
                                'title'   => '按钮图标',
                                'default' => 'ceoicon-edit-2-line',
                                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                            ),
                            array(
                                'id'      => 'ceo_user_tg_link',
                                'type'    => 'text',
                                'title'   => '按钮链接',
                                'default' => '/tougao',
                            ),
                        ),
                    ),
                     array(
                        'id'         => 'ceo_user_gr_sz',
                        'type'       => 'fieldset',
                        'title'      => '个人中心按钮设置',
                        'fields'     => array(
                            array(
                                'id'      => 'ceo_user_gr_title',
                                'type'    => 'text',
                                'title'   => '按钮标题',
                                'default' => '个人中心',
                            ),
                            array(
                                'id'      => 'ceo_user_gr_icon',
                                'type'    => 'text',
                                'title'   => '按钮图标',
                                'default' => 'ceoicon-user-line',
                                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                            ),
                            array(
                                'id'      => 'ceo_user_gr_link',
                                'type'    => 'text',
                                'title'   => '按钮链接',
                                'default' => '/user/settings/',
                            ),
                            array(
                                'id'=>'test',
                                'type'=>'text',
                                'title'=>'链接',
                                'default'=>'/user/settings',
                            ),
                        ),
                    ),
                     array(
                        'id'         => 'ceo_user_sc_sz',
                        'type'       => 'fieldset',
                        'title'      => '商城中心按钮设置',
                        'fields'     => array(
                            array(
                                'id'      => 'ceo_user_sc_title',
                                'type'    => 'text',
                                'title'   => '按钮标题',
                                'default' => '商城中心',
                            ),
                            array(
                                'id'      => 'ceo_user_sc_link',
                                'type'    => 'text',
                                'title'   => '按钮链接',
                                'default' => '/member/center/',
                            ),
                        ),
                    ),
                )
            ));
            CSF::createSection($ceotheme, array(
            'parent'     => 'ceotheme_top',
            'title'  => '弹窗公告设置',
            'fields' => array(
                array(
                    'id'      => 'modal_show',
                    'type'    => 'switcher',
                    'title'   => '整站弹窗公告',
                    'desc'    =>'开启或关闭整站弹窗公告（开启则每天自动显示一次，关闭则不自动弹出）【关闭后会同时关闭顶部导航弹窗公告按钮】',
                    'default' => true
                ),
                array(
                    'id'         => 'modal_show_sz',
                    'type'       => 'fieldset',
                    'title'      => '整站弹窗公告内容设置',
                    'dependency' => array('modal_show', '==', true),
                    'fields'     => array(
                        array(
                            'id'           => 'modal_bg',
                            'type'         => 'upload',
                            'title'        => '弹窗背景图片',
                            'placeholder'  => 'http://',
                            'button_title' => '上传',
                            'remove_title' => '删除',
                            'default'      => get_template_directory_uri() . '/static/images/ceo-tanchuang.png',
                        ),
                        array(
                            'id'      => 'modal_title',
                            'type'    => 'text',
                            'title'   => '弹窗标题',
                            'default' => '总裁主题'
                        ),
                        array(
                            'id'      => 'modal_content',
                            'type'    => 'textarea',
                            'title'   => '弹窗内容',
                            'default' => 'CeoTheme总裁主题是国内优秀的WordPress主题开发团队， 超过6年开发经验，专注WordPress主题开发建站， UI设计,seo等服务；并提供有保障的维护及售后！'
                        ),
                        array(
                            'id'      => 'modal_btn',
                            'type'    => 'text',
                            'title'   => '弹窗按钮标题',
                            'default' => '立即前往'
                        ),
                        array(
                            'id'      => 'modal_btn_url',
                            'type'    => 'text',
                            'title'   => '弹窗按钮链接',
                            'default' => 'https://www.ceotheme.com'
                        ),
                        array(
                            'id'      => 'modal_btn_g',
                            'type'    => 'text',
                            'title'   => '弹窗关闭按钮',
                            'default' => '我知道了'
                        ),
                    ),
                ),
                ),
            ));
            CSF::createSection($ceotheme, array(
            'parent' => 'ceotheme_top',
            'title'  => '顶部导航条设置',
            'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （TOP顶部导航条设置）',
            ),
            array(
                'id'         => 'ceo_top',
                'type'       => 'switcher',
                'title'      => '顶部导航条',
                'desc'       => '开启或关闭顶部导航条（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'ceo_top_bjcolor',
                'type'       => 'color',
                'title'      => '导航条背景颜色',
                'dependency' => array('ceo_top', '==', true),
                'default'    => '#026eff'
            ),
            //左侧
            array(
                'id'         => 'ceo_top_z_sz',
                'type'       => 'fieldset',
                'title'      => '左侧宣传语按钮设置',
                'dependency' => array('ceo_top', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'ceo_top_z_bt',
                        'type'    => 'text',
                        'title'   => '左侧宣传语',
                        'desc'    => '左侧导航条宣传语',
                        'default' => 'HI，欢迎来到总裁主题！',
                    ),
                    array(
                        'id'      => 'ceo_top_z_lj',
                        'type'    => 'text',
                        'title'   => '标题链接',
                        'desc'    => '填写链接地址',
                        'default' => '/vip',
                    ),
                    array(
                        'id'      => 'ceo_top_z_ico',
                        'type'    => 'text',
                        'title'   => '图标',
                        'default' => 'ceoicon-notification-3-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_top_ztcolor',
                        'type'    => 'color',
                        'title'   => '字体颜色',
                        'default' => '#fff'
                    ),
                ),
            ),
            //右侧
            array(
                'id'         => 'ceo_top_y_sz',
                'type'       => 'repeater',
                'title'      => '右侧按钮设置',
                'dependency' => array('ceo_top', '==', true),
                'button_title' => '添加按钮',
                'fields'     => array(
                    array(
                        'id'      => 'ceo_top_y_bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => 'VIP优惠'
                    ),
                    array(
                        'id'      => 'ceo_top_y_lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                        'default' => '/vip'
                    ),
                    array(
                        'id'      => 'ceo_top_y_tb',
                        'type'    => 'text',
                        'title'   => '图标',
                        'default' => 'ceoicon-gift-2-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_top_y_ys',
                        'type'    => 'color',
                        'title'   => '按钮颜色',
                        'default' => '#fff'
                    ),
                ),
            ),

            array(
                'id'         => 'ceo_top_x',
                'type'       => 'switcher',
                'title'      => '右侧下拉按钮',
                'desc'       => '开启或关闭右侧下拉按钮（开启则显示，关闭则隐藏）',
                'dependency' => array('ceo_top', '==', true),
                'default'    => true
            ),
            array(
                'id'      => 'ceo_top_x_bt',
                'type'    => 'text',
                'title'   => '主标题',
                'default' => '关于我们',
                'desc'    => '下拉主按钮标题',
            ),
            array(
                'id'      => 'ceo_top_x_tb',
                'type'    => 'text',
                'title'   => '主标题图标',
                'desc'    => '下拉主按钮图标',
                'default' => 'ceoicon-cup-fill',
                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'ceo_top_x_xl',
                'type'       => 'repeater',
                'title'      => '子按钮设置',
                'button_title' => '添加按钮',
                'fields'     => array(
                    array(
                        'id'      => 'ceo_top_x_xl_bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                    ),
                    array(
                        'id'      => 'ceo_top_x_xl_lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_login',
        'icon'  => 'fa fa-share-alt',
        'title' => '注册登录',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => '基础设置',
        'fields' => array(
            array(
                'id'      => 'modal_login',
                'type'    => 'button_set',
                'title'   => '登录注册模式',
                'options' => array(
                    '1' => '弹窗模式',
                    '2' => '页面模式',
                ),
                'default' => '1',
                'desc'    => '（默认弹窗模式）选择弹窗模式时可在任意界面弹出登录注册框，页面模式则跳转登录注册页面。',
            ),
            array(
                'id'      => 'ceo_login_default',
                'type'    => 'radio',
                'title'   => '默认登录首选项',
                'inline'  => true,
                'options' => array(
                    '1' => '表单登录',
                    '2' => '手机登录',
                ),
                'default' => '1',
                'desc'    => '选择默认登录首选项，如选择【手机登录】那么用户点击登录时默认显示的便是手机登录<br /><br />
                1：选择【表单登录】时，确保开启表单登录功能，手机登录功能开启或关闭都行<br /><br />
                2：选择【手机登录】时，确保开启手机登录功能并已配置，表单登录功能开启或关闭都行<br /><br />
                3：选择任意登录首选项，用户都可以自由切换登录方式<br /><br />',
            ),
            array(
                'id'      => 'ceo_guest_force_login',
                'type'    => 'switcher',
                'title'   => '游客强制登录',
                'desc'    => '开启则游客需要注册登录后才能访问内容<b style="color: #f00;">【非必要不建议开启】</b>',
                'default' => false,
            ),
            array(
                'id'         => 'ceo_login_agr',
                'type'       => 'fieldset',
                'title'      => '协议按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '协议标题',
                        'default' => '登录即同意',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '用户协议',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
            array(
                'id'           => 'login_bg_1',
                'type'         => 'upload',
                'title'        => '弹窗登录注册背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-login-bg.jpg',
                'desc'         => '弹窗模式时登录注册背景图片',
                'dependency' => array('modal_login', '==', 1),
            ),
            array(
                'id'      => 'login_bg_s',
                'type'    => 'switcher',
                'title'   => '页面虚幻背景图',
                'desc'    => '开启或关闭页面虚幻背景图（开启则显示，关闭则隐藏）',
                'default' => true,
                'dependency' => array('modal_login', '==', 2),
            ),
            array(
                'id'           => 'login_bg',
                'type'         => 'upload',
                'title'        => '页面登录注册背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/login.png',
                'desc'         => '页面模式时登录注册页面背景图片',
                'dependency' => array('modal_login', '==', 2),
            ),
            array(
                'id'      => 'login_notice',
                'type'    => 'text',
                'title'   => '登录注册页面底部文字',
                'default' => '这是一段注册欢迎语，在后台可以更换。',
                'dependency' => array('modal_login', '==', 2),
            ),
            array(
                'id'      => 'email_reg_subject',
                'type'    => 'text',
                'title'   => '注册邮箱验证码标题',
                'default' => '邮箱验证码',
            ),
            array(
                'id'      => 'email_reg_message',
                'type'    => 'textarea',
                'title'   => '注册邮箱验证码内容',
                'default' => '邮箱验证码',
                'desc' => '变量code指定验证码位置,无变量默认最后面',
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => '表单登录',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （表单登录/注册设置）',
            ),
            array(
                'id'      => 'ceo_login_txt',
                'type'    => 'switcher',
                'title'   => '表单登录/注册',
                'desc'    => '开启或关闭表单账号密码登录/注册（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_login_allow_mail_suffix',
                'type'       => 'textarea',
                'title'      => '仅允许指定邮箱后缀注册',
                'desc'       => '邮箱后缀一行一个，可填写多个，如：@qq.com；留空则不限制',
                'dependency' => array('ceo_login_txt', '==', true),
            ),
            array(
                'id'      => 'ceo_login_zcxy',
                'type'    => 'text',
                'title'   => '注册协议标题',
                'default' => '《注册协议》',
                'dependency' => array('ceo_login_txt', '==', true),
            ),
            array(
                'id'      => 'ceo_login_zcxy_link',
                'type'    => 'text',
                'title'   => '注册协议链接',
                'dependency' => array('ceo_login_txt', '==', true),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （人机验证设置）',
            ),
            array(
                'id' => 'ceo_login_verify',
                'type' => 'switcher',
                'title' => '表单登录注册人机验证',
                'default' => false,
                'desc'    => '开启或关闭表单登录注册人机验证功能（开启则需要进行人机验证才能登录注册，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id' => 'ceo_login_verify_type',
                'type' => 'radio',
                'title' => '选择人机验证方式',
                'inline' => true,
                'options' => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default' => '1',
                'dependency' => array('ceo_login_verify', '==', true)
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （邮箱验证设置）',
            ),
            array(
                'id'      => 'email_verify_code',
                'type'    => 'switcher',
                'title'   => '邮箱验证',
                'desc'    => '开启或关闭邮箱验证功能（开启则需要获取邮箱验证码才能注册，关闭则无需）注意：开启后需要先配置邮箱功能',
                'default' => false,
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （邀请码注册设置）',
            ),
            array(
                'id'      => 'is_invitaion_code',
                'type'    => 'switcher',
                'title'   => '邀请码注册',
                'desc'    => '开启或关闭邀请码注册功能（开启则需要填写正确邀请码才能注册，关闭则无需）提示：在后台菜单左侧的 <a href="/wp-admin/admin.php?page=invitation_code_add" style="color: #0a8eff;">“邀请码”</a> 中生成邀请码',
                'default' => false,
            ),
            array(
                'id'      => 'is_invitaion_title',
                'type'    => 'text',
                'title'   => '按钮标题',
                'default' => '获取邀请码',
                'dependency' => array('is_invitaion_code', '==', true),
            ),
            array(
                'id'      => 'is_invitaion_link',
                'type'    => 'text',
                'title'   => '按钮链接',
                'dependency' => array('is_invitaion_code', '==', true),
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => 'QQ 登录',
        'fields' => array(
            array(
                'id'      => 'qq_login',
                'type'    => 'switcher',
                'title'   => 'QQ登录',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => 'QQ登录申请：<a href="https://connect.qq.com" target="_blank">点击去申请</a>',
                'dependency' => array('qq_login', '==', true),
            ),
            array(
                'type'       => 'content',
                'content'    => 'QQ回调地址：' . get_template_directory_uri() . '/qq.php',
                'dependency' => array('qq_login', '==', true),
            ),
            array(
                'id'         => 'qq_app_id',
                'type'       => 'text',
                'title'      => 'QQ-APP ID',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('qq_login', '==', true),
            ),
            array(
                'id'         => 'qq_app_key',
                'type'       => 'text',
                'title'      => 'QQ-APP KEY',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('qq_login', '==', true),
            ),
            array(
                'id'         => 'qqlogn_bindemail',
                'type'       => 'select',
                'type'       => 'select',
                'title'      => '绑定邮箱弹窗',
                'desc'      => 'QQ登录后弹窗提示绑定邮箱（开启此功能请先配置邮箱）',
                'options' => ['off'=>'默认关闭','onlynew'=>'仅限新QQ登录的时候要求绑定邮箱','all'=>'新老QQ登录的都要求绑定邮箱'],
            ),
            array(
                'id'         => 'qq_reg_prefix',
                'type'       => 'text',
                'title'      => 'ID默认前缀',
                'desc'       => '留空则默认：CEO',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('qq_login', '==', true),
            ),
            array(
                'id'         => 'qq_reg_suffix',
                'type'       => 'text',
                'title'      => '邮箱默认后缀',
                'desc'       => '留空则默认：@ceo.com',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('qq_login', '==', true),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => '微信登录',
        'fields' => array(
            // 微信登录
            array(
                'id'      => 'weixin_login',
                'type'    => 'switcher',
                'title'   => '微信登录（开放平台模式）',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => '微信登录申请：<a href="https://open.weixin.qq.com/" target="_blank">点击去申请</a>',
                'dependency' => array('weixin_login', '==', true),
            ),
            array(
                'id'         => 'oauth_weixin',
                'type'       => 'fieldset',
                'title'      => '微信登录配情',
                'fields'     => array(
                    array(
                        'id'         => 'backurl',
                        'type'       => 'text',
                        'title'      => '开放平台 回调地址',
                        'attributes' => array(
                            'readonly' => 'readonly',
                        ),
                        'default' => esc_url(home_url('')).'/oauth/weixin/callback',
                        'desc'    => '更换域名时请重置当前分区即可刷新为最新回调地址，操作前注意备份appid参数<br />注意：回调地址只需填写网站域名，无需填写http://或https://<br />例：www.ceotheme.com',
                    ),
                    array(
                        'id'      => 'appid',
                        'type'    => 'text',
                        'title'   => '开放平台 Appid',
                        'default' => '',
                    ),
                    array(
                        'id'      => 'appkey',
                        'type'    => 'text',
                        'title'   => '开放平台 AppSecret',
                        'default' => '',
                        'attributes'  => array(
                            'type'      => 'password',
                            'autocomplete' => 'off',
                        ),
                    ),
                ),
                'dependency' => array('weixin_login', '==', 'true'),
            ),
            array(
                'id'         => 'weixin_reg_prefix',
                'type'       => 'text',
                'title'      => 'ID默认前缀',
                'desc'       => '留空则默认：CEO',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('weixin_login', '==', true),
            ),
            array(
                'id'         => 'weixin_reg_suffix',
                'type'       => 'text',
                'title'      => '邮箱默认后缀',
                'desc'       => '留空则默认：@ceo.com',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('weixin_login', '==', true),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （微信公众号登录设置）',
            ),
            // 微信公众号登录
            array(
                'id'      => 'is_oauth_mpweixin',
                'type'    => 'switcher',
                'title'   => '微信公众号登录（公众号模式）',
                'desc'   => '总裁主题提示您：需要认证微信服务号，配置以下信息后，用户首次使用微信注册登录需要在你的网站扫码关注公众号后自动注册并登录，第二次登录直接扫码即可登录，同时可以直接在公众号内登',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => '微信公众号登录申请：<a href="https://mp.weixin.qq.com/" target="_blank">点击去申请</a>',
                'dependency' => array('is_oauth_mpweixin', '==', true),
            ),
            array(
                'id'         => 'oauth_mpweixin',
                'type'       => 'fieldset',
                'title'      => '配置详情',
                'fields'     => array(
                    array(
                        'id'      => 'mp_appid',
                        'type'    => 'text',
                        'title'   => '公众号Appid',
                        'default' => '',
                    ),
                    array(
                        'id'      => 'mp_appsecret',
                        'type'    => 'text',
                        'title'   => '公众号appsecret',
                        'default' => '',
                        'attributes'  => array(
                            'type'      => 'password',
                            'autocomplete' => 'off',
                        ),
                    ),
                    array(
                        'id'      => 'mp_token',
                        'type'    => 'text',
                        'title'   => '公众号Token',
                        'default' => '',
                        'attributes'  => array(
                            'type'      => 'password',
                            'autocomplete' => 'off',
                        ),
                    ),

                    array(
                        'id'         => 'mp_backurl',
                        'type'       => 'text',
                        'title'      => '授权回调页面域名',
                        'attributes' => array(
                            'readonly' => 'readonly',
                        ),
                        'default'    => esc_url(home_url('/oauth/mpweixin/callback')),
                        'desc'    => '更换域名时请重置当前分区即可刷新为最新回调地址，操作前注意备份appid参数',
                    ),
                    array(
                        'id'      => 'mp_msg',
                        'type'    => 'textarea',
                        'title'   => '关注后自动回复的消息',
                        'default' => '您好，感谢关注我们！发送“签到”可获得奖励，发送关键词可搜索站内相关文章~',
                    ),

                ),
                'dependency' => array('is_oauth_mpweixin', '==', 'true'),
            ),
            array(
                'id'     => 'mpweixin_menu',
                'type'   => 'repeater',
                'title'  => '自定义公众号菜单',
                'desc'  => '总裁主题提示您：<br>
自定义公众号菜单可创建3个一级菜单，每个一级菜单可创建5个二级菜单。<br>
一级菜单不超过4个汉字，二级菜单不超过8个汉字，超过的文字会被以“...”代替。<br>',
                'dependency' => array('is_oauth_mpweixin', '==', 'true'),
                'fields' => array(
                    array(
                        'id'      => 'menu_name',
                        'type'    => 'text',
                        'title'   => '菜单名称',
                        'default' => '',
                    ),
                    array(
                        'id'      => 'menu_url',
                        'type'    => 'text',
                        'title'   => '菜单链接',
                        'default' => '',
                        'desc'    => '如果设置了二级菜单，那么一级菜单的菜单链接将会失效，这是公众号的规则。',
                    ),
                    array(
                        'id'     => 'mpweixin_menu_sub',
                        'type'   => 'repeater',
                        'title'  => '二级菜单',
                        'fields' => array(
                            array(
                                'id'      => 'menu_name',
                                'type'    => 'text',
                                'title'   => '菜单名称',
                                'default' => '',
                            ),
                            array(
                                'id'      => 'menu_url',
                                'type'    => 'text',
                                'title'   => '菜单链接',
                                'validate' => 'csf_validate_url',
                                'default' => '',
                            ),
                            array(
                                'type'    => 'notice',
                                'style'   => 'warning',
                                'content' => '分割线',
                            ),
                        ),
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            array(
                'id'    => 'mpweixin_menu_update',
                'type'  => 'subheading',
                'title' => '刷新公众号菜单',
                'dependency' => array('is_oauth_mpweixin', '==', 'true'),
                'content'       => '<a href="admin-ajax.php?action=mpweixin_menu_update" target="_blank"><input type="button" value="点击刷新公众号菜单"></a> <br /><br />一：创建好公众号菜单，二：点击右上角保存，三：在点击刷新公众号菜单按钮',
            ),
            array(
                'id'         => 'mp_reg_prefix',
                'type'       => 'text',
                'title'      => 'ID默认前缀',
                'desc'       => '留空则默认：CEO',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('is_oauth_mpweixin', '==', true),
            ),
            array(
                'id'         => 'mp_reg_suffix',
                'type'       => 'text',
                'title'      => '邮箱默认后缀',
                'desc'       => '留空则默认：@ceo.com',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('is_oauth_mpweixin', '==', true),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => '微博登录',
        'fields' => array(
            array(
                'id'    => 'weibo_login',
                'type'  => 'switcher',
                'title' => '微博登录',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => '微博登录申请：<a href="https://open.weibo.com/" target="_blank">点击去申请</a>',
                'dependency' => array('weibo_login', '==', true),
            ),
            array(
                'type'    => 'content',
                'content' => '微博回调地址：'. get_page_link( get_option('joy_framework')['login_page'] ) .'/?type=sina',
                'dependency'   => array( 'weibo_login', '==', true ),
            ),
            array(
                'id'    => 'weibo_app_key',
                'type'  => 'text',
                'title' => '微博 App Key',
                'dependency'   => array( 'weibo_login', '==', true ),
            ),
            array(
                'id'    => 'weibo_app_id',
                'type'  => 'text',
                'title' => '微博 App Secret',
                'dependency'   => array( 'weibo_login', '==', true ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_login',
        'title'  => '手机登录',
        'fields' => array(

            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '阿里云短信注册登录功能配置',
            ),
            array(
                'id'    => 'sms_login',
                'type'  => 'switcher',
                'title' => '手机短信注册登录',
                'default' => false,
            ),
            array(
                'id'    => 'sms_app_key',
                'type'  => 'text',
                'title' => 'AccessKey ID',
                'dependency'   => array( 'sms_login', '==', true ),
            ),
            array(
                'id'    => 'sms_app_secret',
                'type'  => 'text',
                'title' => 'AccessKey Secret',
                'dependency'   => array( 'sms_login', '==', true ),
            ),
            array(
                'id'    => 'sms_app_sign',
                'type'  => 'text',
                'title' => '签名',
                'dependency'   => array( 'sms_login', '==', true ),
            ),
            array(
                'id'    => 'sms_app_template',
                'type'  => 'text',
                'title' => '短信模板',
                'dependency'   => array( 'sms_login', '==', true ),
            ),
            array(
                'id'         => 'sms_reg_prefix',
                'type'       => 'text',
                'title'      => 'ID默认前缀',
                'desc'       => '留空则默认：CEO',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('sms_login', '==', true),
            ),
            array(
                'id'         => 'sms_reg_suffix',
                'type'       => 'text',
                'title'      => '邮箱默认后缀',
                'desc'       => '留空则默认：@ceo.com',
                'attributes' => array('style' => 'width: 100%;'),
                'dependency' => array('sms_login', '==', true),
            ),
            array(
                'id'      => 'sms_send_verify',
                'type'    => 'switcher',
                'title'   => '发送短信人机验证',
                'default' => false,
                'desc'    => '开启或关闭发送短信人机验证功能（开启则需要进行人机验证才能发送短信，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id' => 'sms_send_verify_type',
                'type' => 'radio',
                'title' => '选择人机验证方式',
                'inline' => true,
                'options' => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default' => '1',
                'dependency' => array('sms_send_verify', '==', true),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_user',
        'icon'  => 'fa fa-user',
        'title' => '用户中心',
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_user',
        'title'  => '用户中心',
        'fields' => array(
            array(
                'id'           => 'user_default_thum',
                'type'         => 'upload',
                'title'        => '用户个人主页背景图片',
                'desc'         => '用户个人主页默认背景图，用户也可以在个人中心独立设置用户个人主页背景图~未独立设置则自动调用该设置中默认背景图',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-community-bg.png',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （用户中心快捷按钮设置）',
            ),
            array(
                'id'      => 'ceo_author_ank',
                'type'    => 'switcher',
                'title'   => '用户快捷按钮',
                'desc'    => '开启或关闭用户快捷按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_author_ank_sz',
                'type'       => 'fieldset',
                'title'      => '用户快捷按钮设置',
                'dependency' => array('ceo_author_ank', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'author_ank_title1',
                        'type'    => 'text',
                        'title'   => '按钮1标题',
                        'default' => '创作中心',
                    ),
                    array(
                        'id'      => 'author_ank_icon1',
                        'type'    => 'text',
                        'title'   => '按钮1图标',
                        'default' => 'ceoicon-edit-2-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'author_ank_link1',
                        'type'    => 'text',
                        'title'   => '按钮1链接',
                        'default' => '/tougao',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                    array(
                        'id'      => 'author_ank_title2',
                        'type'    => 'text',
                        'title'   => '按钮2标题',
                        'default' => '商城中心',
                    ),
                    array(
                        'id'      => 'author_ank_icon2',
                        'type'    => 'text',
                        'title'   => '按钮2图标',
                        'default' => 'ceoicon-shopping-cart-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'author_ank_link2',
                        'type'    => 'text',
                        'title'   => '按钮2链接',
                        'default' => '/member/center/',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （用户中心菜单设置，以下功能开启则显示，关闭则隐藏）',
            ),
            array(
                'id'      => 'ceo_author_cd1',
                'type'    => 'switcher',
                'title'   => '我的发布',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd2',
                'type'    => 'switcher',
                'title'   => '我的收藏',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd3',
                'type'    => 'switcher',
                'title'   => '我的关注',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd4',
                'type'    => 'switcher',
                'title'   => '我的私信',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd5',
                'type'    => 'switcher',
                'title'   => '我的帖子',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd6',
                'type'    => 'switcher',
                'title'   => '我的提问',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd7',
                'type'    => 'switcher',
                'title'   => '我的评论',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_author_cd8',
                'type'    => 'switcher',
                'title'   => '网站收录',
                'default' => true,
            ),
            array(
                'id'       => 'ceo_author_cd8x',
                'type'     => 'textarea',
                'dependency' => array('ceo_author_cd8', '==', true),
                'title'    => '网站收录提示信息',
                'desc'     => '请务必按照以上格式修改或添加',
                'default'  => '<p>欢迎优质网站提交收录，本站免费收录，提交后需后台审核，请勿重复提交。</p>
<p>申请网站收录前请先加上本站链接；</p>
<p>本站不收录违法违规站点；</p>
<p>禁止一切产品营销、广告联盟类型的站点，优先通过原创、内容相近的网站；</p>',
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_user',
        'title'  => '商城中心',
        'fields' => array(
            array(
                'id'      => 'ceo_user_member_btn',
                'type'    => 'switcher',
                'title'   => '商城快捷按钮',
                'desc'    => '开启或关闭商城快捷按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_user_member_btn_set',
                'type'       => 'fieldset',
                'title'      => '商城快捷按钮设置',
                'dependency' => array('ceo_user_member_btn', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'title1',
                        'type'    => 'text',
                        'title'   => '按钮1标题',
                        'default' => '创作中心',
                    ),
                    array(
                        'id'      => 'icon1',
                        'type'    => 'text',
                        'title'   => '按钮1图标',
                        'default' => 'ceoicon-edit-box-line',
                        'desc'    => '<a href="https://www.ceotheme.com/icon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'link1',
                        'type'    => 'text',
                        'title'   => '按钮1链接',
                        'default' => '/tougao',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                    array(
                        'id'      => 'title2',
                        'type'    => 'text',
                        'title'   => '按钮2标题',
                        'default' => '个人中心',
                    ),
                    array(
                        'id'      => 'icon2',
                        'type'    => 'text',
                        'title'   => '按钮2图标',
                        'default' => 'ceoicon-user-line',
                        'desc'    => '<a href="https://www.ceotheme.com/icon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'link2',
                        'type'    => 'text',
                        'title'   => '按钮2链接',
                        'default' => '/user',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_user',
        'title'  => '创作中心',
        'fields' => array(
            array(
                'id'         => 'tougao_down_url_upload',
                'type'       => 'switcher',
                'title'      => '创作中心上传资源',
                'default'    => false,
                'desc'       => '开启或关闭创作中心上传资源（开启则允许直接上传资源，关闭则不允许）',
            ),
            array(
                'id'          => 'tougao_cat_ids',
                'type'        => 'select',
                'title'       => '创作中心允许投稿的分类',
                'placeholder' => '',
                'desc'        => '如果不选择，则默认显示允许投稿全部分类',
                'chosen'      => true,
                'multiple'    => true,
                'options'     => 'categories',
            ),
            array(
                'id'         => 'tougao_after_jump',
                'type'       => 'radio',
                'title'      => '文章投稿发布后返回页面',
                'options'    => array(
                    '1' => '投稿后停留在当前页面',
                    '2' => '投稿后跳转我的发布',
                ),
                'default'    => '1',
            ),
            array(
                'id'      => 'verify_tougao_new',
                'type'    => 'switcher',
                'title'   => '文章投稿人机验证',
                'default' => false,
                'desc'    => '开启或关闭文章投稿人机验证功能（开启则需要进行人机验证才能投稿，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id'         => 'verify_tougao_new_type',
                'type'       => 'radio',
                'title'      => '选择人机验证方式',
                'inline'     => true,
                'options'    => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default'    => '1',
                'dependency' => array('verify_tougao_new', '==', true),
            ),
            array(
                'id'         => 'tougao_down_info_use',
                'type'       => 'repeater',
                'title'      => '资源信息属性默认内容',
                'desc'       => '总裁主题温馨提示：标题填写：评分，描述内容填写：1-5数字，即可显示★星星评分图标',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '标题',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '描述内容',
                        'default' => '这里是描述内容',
                    ),
                ),
            ),
        )
    ));

    require __DIR__ .'/../../ceoshop/inc/options/ceotheme-admin.php';

    /*
     * 首页设置
     * */
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_home',
        'icon'  => 'fa fa-home',
        'title' => '首页设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '首页布局',
        'fields' => array(
            array(
                'id'      => 'layout',
                'type'    => 'sorter',
                'title'   => '首页模块布局拖拽设置',
                'default' => array(
                    'enabled'  => array(
                        'slide'      => '幻灯模块',
                        'switcher'   => '分类切换',
                        'card'       => '卡片列表',
                        'blog'       => '文章列表',
                        'rank'       => '排行榜',
                        'title_only' => '标题模块',
                        'catshow'    => '热门分类',
                        'special'    => '专题频道',
                    ),
                    'disabled' => array(
                        'ad'       => '横幅广告',
                        'ads'      => '图文广告',
                        'count'    => '网站统计',
                        'cms1'     => 'CMS模块1 [快捷导航] 图标+文字',
                        'cms2'     => 'CMS模块2 [快捷链接] 多功能模块',
                        'cms3'     => 'CMS模块3 [快捷分类] 图片+标题',
                        'cms4'     => 'CMS模块4 [分类菜单] 模块+按钮',
                        'cms5'     => 'CMS模块5 [按钮模块] 图片+文字',
                        'img1'     => '图片模块1 [六图样式]',
                        'img2'     => '图片模块2 [五图样式]',
                        'img3'     => '图片模块3 [四图样式]',
                        'yewu1'    => '业务模块1 [五列样式]',
                        'roll1'    => '滚动模块1 [文章滚动] 最新发布文章',
                    ),
                ),
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '幻灯模块',
        'fields' => array(
            array(
                'id'      => 'slide_type',
                'type'    => 'image_select',
                'title'   => '<h3>选择幻灯片样式</h3>',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-datu.png',
                    '2' => get_template_directory_uri() . '/static/admin-img/ceo-sange.png',
                    '3' => get_template_directory_uri() . '/static/admin-img/ceo-search.png',
                    '4' => get_template_directory_uri() . '/static/admin-img/ceo-sucai.png',
                    '5' => get_template_directory_uri() . '/static/admin-img/ceo-quanping.png',
                    '6' => get_template_directory_uri() . '/static/admin-img/ceo-cmsmk.png',
                ),
                'desc'    => '1：小图幻灯片样式，2：三格幻灯片样式，3：大图搜索框样式，4：素材站专属样式（建议开启导航样式三），5：全屏幻灯片样式，6：CMS幻灯样式（难驾驭）',
                'default' => '1'
            ),
            //小图幻灯片（1）
            array(
                'id'         => 'slide_height',
                'dependency' => array('slide_type', '==', '1'),
                'type'       => 'number',
                'title'      => '设置幻灯片高度',
                'unit'       => 'px',
                'default'    => 360,
            ),
            array(
                'id'         => 'slide',
                'type'       => 'repeater',
                'dependency' => array('slide_type', '==', '1'),
                'title'      => '小图幻灯片模块设置',
                'button_title' => '添加幻灯',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传幻灯片',
                        'desc'  => '宽：1440px，高：根据以上自定义',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
                'default'    => array(
                    array(
                        'img' => get_template_directory_uri() . '/static/images/ceotheme-banner.jpg',
                    )
                )
            ),
            //三格幻灯片（2）
            array(
                'id'         => 'slide2_height',
                'dependency' => array('slide_type', '==', '2'),
                'type'       => 'number',
                'title'      => '设置幻灯片高度',
                'unit'       => 'px',
                'default'    => 360,
            ),
            array(
                'id'         => 'l_slide',
                'type'       => 'repeater',
                'dependency' => array('slide_type', '==', '2'),
                'title'      => '三格幻灯片模块设置',
                'button_title' => '添加幻灯',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传幻灯片',
                        'desc'  => '宽：1050px，高：根据以上自定义',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
                'default'    => array(
                    array(
                        'img'  => get_template_directory_uri() . '/static/images/ceomax.png',
                        'link' => 'https://www.ceotheme.com/theme/ceomax-pro.html',
                    )
                )
            ),
            array(
                'id'         => 'simg_01',
                'type'       => 'fieldset',
                'dependency' => array('slide_type', '==', '2'),
                'title'      => '右侧图片（上）',
                'fields'     => array(
                    array(
                        'id'      => 'img',
                        'type'    => 'upload',
                        'title'   => '上传图片',
                        'default' => get_template_directory_uri() . '/static/images/ceoblog.jpg',
                        'desc'       => '宽：370px，高：根据以上自定义折算',
                    ),
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => 'CeoBlog主题 - 多功能自媒体资讯主题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '链接',
                        'default' => 'https://www.ceotheme.com/theme/ceoblog.html',
                    ),
                ),
            ),
            array(
                'id'         => 'simg_02',
                'type'       => 'fieldset',
                'dependency' => array('slide_type', '==', '2'),
                'title'      => '右侧图片（下）',
                'fields'     => array(
                    array(
                        'id'      => 'img',
                        'type'    => 'upload',
                        'title'   => '上传图片',
                        'default' => get_template_directory_uri() . '/static/images/ceonav.jpg',
                        'desc'       => '宽：370，高：根据以上自定义折算',
                    ),
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => 'CeoNav主题 - 极具优雅的导航主题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '链接',
                        'default' => 'https://www.ceotheme.com/theme/ceonav.html',
                    ),
                ),
            ),
            //大图搜索框样式（3）
            array(
                'id'           => 'search_slide',
                'dependency' => array('slide_type', '==', '3'),
                'type'         => 'upload',
                'title'        => '搜索模块背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'desc'         => '宽：1920px+，高：460px',
                'default'      => get_template_directory_uri() . '/static/images/ceo-banner.jpg',
            ),
            array(
                'id'      => 'search_title',
                'dependency' => array('slide_type', '==', '3'),
                'type'    => 'text',
                'title'   => '标题',
                'desc'    => '搜索框上方标题',
                'default' => '海量优质UI设计源文件，免费下载'
            ),
            array(
                'id'      => 'search_3_tag_sz',
                'dependency' => array('slide_type', '==', '3'),
                'type'    => 'switcher',
                'title'   => '开启/关闭热门搜索',
                'default' => true,
            ),
            array(
                'id'         => 'search_3_tag',
                'dependency' => array('slide_type', '==', '3'),
                'type'       => 'repeater',
                'title'      => '自定义热门搜索关键词',
                'button_title' => '添加关键词',
                'fields'     => array(
                    array(
                        'id'      => 'tag',
                        'type'    => 'text',
                        'title'   => '关键词名称',
                    ),
                ),
            ),

            //素材站专属样式（4）
            array(
                'id'         => 'sucai_beijing',
                'type'       => 'fieldset',
                'title'      => '模块背景设置',
                'dependency' => array('slide_type', '==', '4'),
                'fields'     => array(
                array(
                    'id'           => 'sucai_slide',
                    'type'         => 'upload',
                    'title'        => '模块左侧背景图片',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                    'desc'         => '上传背景图片（明人不说暗话！不建议更换，除非你是美工老司机...）',
                    'default'      => get_template_directory_uri() . '/static/images/ceo-sucai-left.png',
                ),
                array(
                    'id'           => 'sucai_slide_y',
                    'type'         => 'upload',
                    'title'        => '模块右侧背景图片',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                    'desc'         => '上传背景图片（明人不说暗话！不建议更换，除非你是美工老司机...）',
                    'default'      => get_template_directory_uri() . '/static/images/ceo-sucai-right.png',
                ),
                array(
                    'id'      => 'sucai_yanse1',
                    'type'    => 'text',
                    'title'   => '模块背景颜色【1】',
                    'default' => '#FF5B49',
                    'desc'    => '（明人不说暗话！不建议更换，除非你是美工老司机...）',
                ),
                array(
                    'id'      => 'sucai_yanse2',
                    'type'    => 'text',
                    'title'   => '模块背景颜色【2】',
                    'default' => 'RGBA(249, 1, 60, 1)',
                    'desc'    => '（明人不说暗话！不建议更换，除非你是美工老司机...）',
                ),
            ),
            ),
            //轮播标题
                array(
                    'id'      => 'sucai_title1',
                    'type'    => 'text',
                    'dependency' => array('slide_type', '==', '4'),
                    'title'   => '模块轮播标题【1】',
                    'desc'    => '搜索框上方轮播标题',
                    'default' => '总裁主题，原创主题设计'
                ),
                array(
                    'id'      => 'sucai_title2',
                    'type'    => 'text',
                    'dependency' => array('slide_type', '==', '4'),
                    'title'   => '模块轮播标题【2】',
                    'desc'    => '搜索框上方轮播标题',
                    'default' => '总裁主题，高端WordPress主题开发'
                ),
                array(
                    'id'      => 'sucai_title3',
                    'type'    => 'text',
                    'dependency' => array('slide_type', '==', '4'),
                    'title'   => '模块轮播标题【3】',
                    'desc'    => '搜索框上方轮播标题',
                    'default' => '海量优质UI设计源文件，免费下载'
                ),
            //搜索框
            array(
                'id'         => 'sucai_sosuo',
                'type'       => 'fieldset',
                'title'      => '搜索框设置',
                'dependency' => array('slide_type', '==', '4'),
                'fields'     => array(
                array(
                    'id'      => 'sucai_anniu',
                    'type'    => 'text',
                    'title'   => '搜索框右侧按钮',
                    'default' => '升级会员'
                ),
                array(
                    'id'      => 'sucai_anniu_link',
                    'type'    => 'text',
                    'title'   => '搜索框右侧按钮链接',
                    'default' => '/vip'
                ),
                ),
            ),
            array(
                'id'      => 'search_4_tag_sz',
                'dependency' => array('slide_type', '==', '4'),
                'type'    => 'switcher',
                'title'   => '开启/关闭热门搜索',
                'default' => true,
            ),
            array(
                'id'         => 'search_4_tag',
                'dependency' => array('slide_type', '==', '4'),
                'type'       => 'repeater',
                'title'      => '自定义热门搜索关键词',
                'button_title' => '添加关键词',
                'fields'     => array(
                    array(
                        'id'      => 'tag',
                        'type'    => 'text',
                        'title'   => '关键词名称',
                    ),
                ),
            ),
            //五图轮播
            array(
                'id'         => 'sucai_tupian',
                'type'       => 'switcher',
                'dependency' => array('slide_type', '==', '4'),
                'title'      => '五图轮播',
                'desc'       => '开启或关闭幻灯模块下五图轮播（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'sucia_tu',
                'type'       => 'fieldset',
                'title'      => '五图轮播设置',
                'dependency' => array('slide_type', '==', '4'),
                'fields'     => array(
                array(
                    'id'           => 'sucia_tu1',
                    'type'         => 'upload',
                    'title'        => '轮播图片【1】',
                    'desc'         => '图片尺寸：宽235px*高144px',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                ),
                array(
                    'id'    => 'sucia_tu1_link',
                    'type'  => 'text',
                    'title' => '轮播图片链接【1】',
                    'default' => '/',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'warning',
                    'content' => '分割线',
                ),
                array(
                    'id'           => 'sucia_tu2',
                    'type'         => 'upload',
                    'title'        => '轮播图片【2】',
                    'desc'         => '图片尺寸：宽235px*高144px',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                ),
                array(
                    'id'    => 'sucia_tu2_link',
                    'type'  => 'text',
                    'title' => '轮播图片链接【2】',
                    'default' => '/',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'warning',
                    'content' => '分割线',
                ),
                array(
                    'id'           => 'sucia_tu3',
                    'type'         => 'upload',
                    'title'        => '轮播图片【3】',
                    'desc'         => '图片尺寸：宽235px*高144px',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                ),
                array(
                    'id'    => 'sucia_tu3_link',
                    'type'  => 'text',
                    'title' => '轮播图片链接【3】',
                    'default' => '/',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'warning',
                    'content' => '分割线',
                ),
                array(
                    'id'           => 'sucia_tu4',
                    'type'         => 'upload',
                    'title'        => '轮播图片【4】',
                    'desc'         => '图片尺寸：宽235px*高144px',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                ),
                array(
                    'id'    => 'sucia_tu4_link',
                    'type'  => 'text',
                    'title' => '轮播图片链接【4】',
                    'default' => '/',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'warning',
                    'content' => '分割线',
                ),
                array(
                    'id'           => 'sucia_tu5',
                    'type'         => 'upload',
                    'title'        => '轮播图片【5】',
                    'desc'         => '图片尺寸：宽235px*高144px',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                ),
                array(
                    'id'    => 'sucia_tu5_link',
                    'type'  => 'text',
                    'title' => '轮播图片链接【5】',
                    'default' => '/',
                ),
            ),
            ),

            //5：大图幻灯片（5）
            array(
                'id'         => 'slide_quanping_height',
                'dependency' => array('slide_type', '==', '5'),
                'type'       => 'number',
                'title'      => '设置幻灯片高度',
                'unit'       => 'px',
                'default'    => 438,
            ),
            array(
                'id'         => 'slide_quanping',
                'type'       => 'repeater',
                'dependency' => array('slide_type', '==', '5'),
                'title'      => '大图幻灯片模块设置',
                'button_title' => '添加幻灯',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传幻灯片',
                        'desc'  => '宽：1920px，高：根据以上自定义',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
                'default'    => array(
                    array(
                        'img' => get_template_directory_uri() . '/static/images/ceotheme-banner.jpg',
                    )
                )
            ),
            //6：CMS幻灯模块6（6）

            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'dependency' => array('slide_type', '==', '6'),
                'content' => '注意哦，这个CMS幻灯模块很难驾驭，设置项比较多！',
            ),
            array(
                'id'         => 'slide_cms_height',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'number',
                'title'      => '设置幻灯片高度',
                'unit'       => 'px',
                'default'    => 500,
            ),
            array(
                'id'         => 'slide_cms',
                'type'       => 'repeater',
                'dependency' => array('slide_type', '==', '6'),
                'title'      => '大图幻灯片模块设置',
                'button_title' => '添加幻灯',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传幻灯片',
                        'desc'  => '宽：1920px，高：根据以上自定义',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （搜索框设置）',
                'dependency' => array('slide_type', '==', '6'),
            ),
            array(
                'id'         => 'slide_cms_search',
                'type'       => 'switcher',
                'dependency' => array('slide_type', '==', '6'),
                'title'      => '是否开启搜索框',
                'desc'       => '开启或关闭是否开启搜索框（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            //搜索模块
            array(
                'id'     => 'slide_cms_search_tag',
                'dependency' => array('slide_type', '==', '6'),
                'type'   => 'repeater',
                'max'    => '3',
                'title'  => '快捷搜索标签设置',
                'desc'   => '设置3个快捷搜索标签',
                'button_title' => '添加标签',
                'fields' => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标签标题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '标签链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            array(
                'id'         => 'slide_cms_search_sz',
                'type'       => 'fieldset',
                'title'      => '搜索框设置',
                'dependency' => array('slide_type', '==', '6'),
                'fields'     => array(
                    array(
                        'id'      => 'slide_cms_search_title',
                        'type'    => 'text',
                        'title'   => '搜索按钮标题',
                        'default' => '搜索',
                    ),
                    array(
                        'id'      => 'slide_cms_search_y',
                        'type'    => 'text',
                        'title'   => '右侧按钮标题',
                        'default' => '投稿',
                    ),
                    array(
                        'id'      => 'slide_cms_search_yl',
                        'type'    => 'text',
                        'title'   => '右侧按钮链接',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （快捷导航设置）',
                'dependency' => array('slide_type', '==', '6'),
            ),
            //快捷导航模块
            array(
                'id'         => 'slide_cms_nav_sz',
                'type'       => 'fieldset',
                'title'      => '快捷导航设置',
                'dependency' => array('slide_type', '==', '6'),
                'fields'     => array(
                    array(
                        'id'      => 'slide_cms_nav_title',
                        'type'    => 'text',
                        'title'   => '主按钮标题',
                        'default' => '全部资源',
                    ),
                    array(
                        'id'      => 'slide_cms_nav_icon',
                        'type'    => 'text',
                        'title'   => '主按钮图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'slide_cms_nav_link',
                        'type'    => 'text',
                        'title'   => '主按钮链接',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'id'     => 'slide_cms_nav_tag',
                'dependency' => array('slide_type', '==', '6'),
                'type'   => 'repeater',
                'title'  => '左侧快捷导航设置',
                'fields' => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'text',
                        'title' => '导航图标',
                        'desc'  => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '导航标题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '导航链接',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'id'     => 'slide_cms_nav_y',
                'dependency' => array('slide_type', '==', '6'),
                'type'   => 'repeater',
                'title'  => '右侧快捷导航设置',
                'fields' => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'text',
                        'title' => '导航图标',
                        'desc'  => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '导航标题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '导航链接',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （CMS模块设置）',
                'dependency' => array('slide_type', '==', '6'),
            ),
            //CMS模块设置
            array(
                'id'     => 'slide_cms_cms_mk',
                'dependency' => array('slide_type', '==', '6'),
                'type'   => 'group',
                'max'    => '4',
                'title'  => 'CMS模块设置',
                'desc'   => '请添加并设置4个模块内容',
                'fields' => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '模块标题',
                    ),
                    array(
                        'id'      => 'descs',
                        'type'    => 'text',
                        'title'   => '模块描述',
                    ),
                    array(
                        'id'           => 'imgs',
                        'type'         => 'upload',
                        'title'        => '模块图片',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'     => 'slide_cms_cms_mk_cd',
                        'type'   => 'repeater',
                        'max'    => '3',
                        'title'  => '模块菜单设置',
                        'desc'   => '请添加并设置3个菜单内容',
                        'fields' => array(
                            array(
                                'id'           => 'img',
                                'type'         => 'upload',
                                'title'        => '菜单图片',
                                'library'      => 'image',
                                'placeholder'  => 'http://',
                                'button_title' => '上传',
                                'remove_title' => '删除',
                            ),
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '菜单标题',
                            ),
                            array(
                                'id'      => 'link',
                                'type'    => 'text',
                                'title'   => '菜单链接',
                            ),
                        ),
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （快捷连接设置）',
                'dependency' => array('slide_type', '==', '6'),
            ),
            //快捷连接设置
            array(
                'id'         => 'slide_cms_link',
                'type'       => 'repeater',
                'dependency' => array('slide_type', '==', '6'),
                'title'      => '底部快捷链接设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '链接标题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '导航链接',
                    ),
                ),
            ),
            //--------------------分割线-----------------------
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （底部数据统计模块设置）',
                'dependency' => array('slide_type', '==', '6'),
            ),
            //数据统计模块
            array(
                'id'         => 'slide_cms_count_fwkg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '访问总数统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_fwicon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_fw',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换全站访问数量统计标题',
                'default'    => '访问总数',
            ),
            array(
                'id'         => 'slide_cms_count_hykg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '会员总数统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_hyicon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_hy',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换会员数量统计标题',
                'default'    => '会员总数',
            ),
            array(
                'id'         => 'slide_cms_count_wzkg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '文章总数统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_wzicon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_wz',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换全站文章统计标题',
                'default'    => '文章总数',
            ),
            array(
                'id'         => 'slide_cms_count_jrkg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '今日发布统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_jricon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_jr',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换今日发布统计标题',
                'default'    => '今日发布',
            ),
            array(
                'id'         => 'slide_cms_count_bzkg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '本周发布统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_bzicon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_bz',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换本周发布统计标题',
                'default'    => '本周发布',
            ),
            array(
                'id'         => 'slide_cms_count_yxkg',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'switcher',
                'title'      => '运行天数统计',
                'default'    => true
            ),
            array(
                'id'         => 'slide_cms_count_yxicon',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '图标',
                'default'    => 'ceoicon-shield-check-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'slide_cms_count_yx',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '更换运行天数统计标题',
                'default'    => '运行天数',
            ),
            array(
                'id'         => 'slide_cms_count_jz',
                'dependency' => array('slide_type', '==', '6'),
                'type'       => 'text',
                'title'      => '建站日期',
                'desc'       => '填写建站日期进行时间统计，格式：2011-11-11',
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '分类切换',
        'fields' => array(
            array(
                'id'         => 'switcher_title',
                'type'       => 'switcher',
                'title'      => '分类切换模块标题',
                'desc'       => '开启或关闭分类切换模块标题（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'    => 'switcher_bt',
                'type'  => 'text',
                'dependency' => array('switcher_title', '==', true),
                'title' => '模块标题',
                'default' => '你的前景，远超我们想象',
            ),
            array(
                'id'         => 'index_switcher_new_enable',
                'type'       => 'switcher',
                'title'      => '最新发布模块',
                'desc'       => '开启或关闭分类切换模块标题（开启则显示，关闭则隐藏）',
                'default'    => false
            ),
            array(
                'id'       => 'index_switcher_new',
                'type'     => 'text',
                'title'    => '最新发布标题',
                'default'  => '最新发布',
                'dependency' => array('index_switcher_new_enable', '==', '1'),
            ),
            array(
                'id'       => 'index_switcher_limit',
                'type'     => 'text',
                'title'    => '最新发布默认显示数量',
                'default'  => '10',
                'dependency' => array('index_switcher_new_enable', '==', '1'),
            ),
            array(
                'id'       => 'index_switcher_new_load_type',
                'type'     => 'radio',
                'title'    => '最新发布加载方式',
                'inline' => true,
                'options' => array(
                    '1' => '自定义链接',
                    '2' => '加载更多',
                    '3' => '数字翻页',
                ),
                'default'  => '1',
                'dependency' => array('index_switcher_new_enable', '==', '1'),
            ),
            array(
                'id'       => 'index_switcher_new_url',
                'type'     => 'text',
                'title'    => '查看更多链接',
                'default'  => '',
                'dependency' => [array('index_switcher_new_enable', '==', '1'), array('index_switcher_new_load_type', '==', '1')],
            ),
//            array(
//                'id'       => 'index_switcher_ajax',
//                'type'     => 'switcher',
//                'title'    => '点击加载更多',
//                'dependency' => array('index_switcher_new_enable', '==', '1'),
//            ),
            array(
                'id'          => 'index_switcher_new_cat_id',
                'type'        => 'select',
                'title'       => '最新发布文章 显示的分类内容',
                'placeholder' => '选择分类',
                'chosen'      => true,
                'multiple'    => true,
                'options'     => 'categories',
                'desc'        => '建议选择同尺寸的分类',
                'dependency' => array('index_switcher_new_enable', '==', '1'),
            ),
            array(
                'id'     => 'switcher',
                'type'   => 'repeater',
                'title'  => '分类切换模块设置',
                'button_title' => '添加模块',
                'fields' => array(
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类栏目',
                        'placeholder' => '选择分类栏目',
                        'options'     => 'categories',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '自定义标题',
                    ),
                    array(
                        'id'       => 'index_switcher_ajax',
                        'type'     => 'switcher',
                        'title'    => '点击加载更多',
                    ),
                    array(
                        'id'    => 'enable5col',
                        'type'  => 'switcher',
                        'title' => '分类五列默认显示',
                        'desc'  => '(默认四列) 开启后该分类文章显示为五列'
                    ),
                    array(
                        'id'      => 'num',
                        'type'    => 'text',
                        'title'   => '显示数量',
                        'default' => '8',
                    ),
                    array(
                        'id'    => 'url',
                        'type'  => 'text',
                        'title' => '自定义 更多链接',
                        'desc' => '不填写为当前分类链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '卡片列表',
        'fields' => array(
            array(
                'id'     => 'card',
                'type'   => 'group',
                'title'  => '卡片列表模块设置',
                'button_title' => '添加模块',
                'fields' => array(
                    array(
                        'id'          => 'title',
                        'type'        => 'text',
                        'title'       => '模块自定义标题',
                    ),
                    array(
                        'id'          => 'icon',
                        'type'        => 'text',
                        'title'       => '模块icon图标',
                        'default'     => 'ceoicon-earth-line',
                        'desc'        => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类栏目',
                        'placeholder' => '选择分类栏目',
                        'options'     => 'categories',
                    ),
                    array(
                        'id'          => 'index_card_style',
                        'type'        => 'image_select',
                        'title'       => '样式选择',
                        'options'     => array(
                            'card'      => get_template_directory_uri() . '/static/admin-img/ceo-card-card.png',
                            'software'  => get_template_directory_uri() . '/static/admin-img/ceo-card-software.png',
                            'album'     => get_template_directory_uri() . '/static/admin-img/ceo-card-album.png',
                            'music'     => get_template_directory_uri() . '/static/admin-img/ceo-card-music.png',
                            'cardvideo' => get_template_directory_uri() . '/static/admin-img/ceo-card-video.png',
                            'sucai'     => get_template_directory_uri() . '/static/admin-img/ceo-card-sucai.png',
                            'img'       => get_template_directory_uri() . '/static/admin-img/ceo-card-img.png',
                            'imgs'      => get_template_directory_uri() . '/static/admin-img/ceo-card-imgs.png',
                        ),
                        'default'     => 'card',
                        'desc'        => ' [样式1：卡片列表]  [样式2：软件列表]  [样式3：相册列表]  [样式4：音乐列表]  [样式5：视频列表] [样式6：素材列表]  [样式7：图片列表]  [样式8：模特列表]'
                    ),
                    array(
                        'id'          => 'enable5col',
                        'type'        => 'switcher',
                        'title'       => '分类五列默认显示',
                        'desc'        => '(默认四列) 开启后该分类文章显示为五列'
                    ),
                    array(
                        'id'          => 'cat_id',
                        'type'        => 'select',
                        'title'       => '右侧要展示的分类',
                        'placeholder' => '选择4个分类',
                        'chosen'      => true,
                        'multiple'    => true,
                        'options'     => 'categories',
                    ),
                    array(
                        'id'          => 'num',
                        'type'        => 'text',
                        'title'       => '显示数量',
                        'default'     => '8',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '文章列表',
        'fields' => array(
            array(
                'id'     => 'blog',
                'type'   => 'group',
                'title'  => '文章列表模块设置',
                'button_title' => '添加模块',
                'fields' => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '模块自定义标题',
                    ),
                    array(
                        'id'      => 'icon',
                        'type'    => 'text',
                        'title'   => '模块icon图标',
                        'default' => 'ceoicon-earth-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类栏目',
                        'placeholder' => '选择分类栏目',
                        'options'     => 'categories',
                    ),
                    array(
                        'id'      => 'num',
                        'type'    => 'text',
                        'title'   => '显示数量',
                        'default' => '6',
                    ),
                    array(
                        'id'          => 'itemurl',
                        'type'        => 'select',
                        'title'       => '右侧要展示的分类',
                        'placeholder' => '选择4个分类',
                        'chosen'      => true,
                        'multiple'    => true,
                        'options'     => 'categories',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '排行榜',
        'fields' => array(
            array(
                'id'      => 'rank_title',
                'type'    => 'text',
                'title'   => '排行榜标题',
                'default' => '排行榜',
            ),
            array(
                'id'      => 'rank_icon',
                'type'    => 'text',
                'title'   => '排行榜icon图标',
                'default' => 'ceoicon-bar-chart-2-line',
                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'      => 'rank_num',
                'type'    => 'text',
                'title'   => '排行文章展示数量',
                'default' => 5,
            ),
            array(
                'id'    => 'rank_link',
                'type'  => 'text',
                'title' => '查看更多链接',
            ),
            array(
                'id'      => 'show_rank_zan',
                'type'    => 'switcher',
                'title'   => '隐藏/显示点赞排行',
                'default' => true,
            ),
            array(
                'id'      => 'show_rank_collect',
                'type'    => 'switcher',
                'title'   => '隐藏/显示收藏排行',
                'default' => true,
            ),
            array(
                'id'      => 'show_rank_view',
                'type'    => 'switcher',
                'title'   => '隐藏/显示浏览排行',
                'default' => true,
            ),
            array(
                'id'      => 'show_rank_comment',
                'type'    => 'switcher',
                'title'   => '隐藏/评论浏览排行',
                'default' => true,
            ),

        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '标题模块',
        'fields' => array(
            array(
                'id'     => 'title_only',
                'type'   => 'repeater',
                'title'  => '分类标题模块设置',
                'button_title' => '添加模块',
                'fields' => array(
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类栏目',
                        'placeholder' => '选择分类栏目',
                        'options'     => 'categories',
                    ),
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '封面图片',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
                    ),
                    array(
                        'id'      => 'num',
                        'type'    => 'text',
                        'title'   => '显示数量',
                        'default' => '8',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '热门分类',
        'fields' => array(
            array(
                'id'      => 'show_cat_title',
                'type'    => 'text',
                'title'   => '模块标题',
                'default' => '热门分类',
            ),
            array(
                'id'      => 'show_cat_icon',
                'type'    => 'text',
                'title'   => '热门分类icon图标',
                'default' => 'ceoicon-apps-2-line',
                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'    => 'show_cat_link',
                'type'  => 'text',
                'title' => '查看更多链接',
            ),
            array(
                'id'      => 'show_cat_number',
                'type'    => 'switcher',
                'title'   => '是否显示分类统计',
                'default' => true,
            ),
            array(
                'id'     => 'cat_show',
                'type'   => 'group',
                'title'  => '热门分类',
                'fields' => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '分类标题',
                    ),
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '分类封面',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'desc'         => '封面图尺寸：宽200px*高260px',
                    ),
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类',
                        'placeholder' => '选择分类',
                        'options'     => 'categories',
                    ),
                    array(
                        'id'      => 'user_show',
                        'type'    => 'switcher',
                        'title'   => '是否显示作者',
                        'default' => false,
                    ),
                    array(
                        'id'          => 'user',
                        'type'        => 'select',
                        'title'       => '选择作者',
                        'placeholder' => '选择作者',
                        'options'     => 'users',
                        'dependency'  => array('user_show', '==', 'true'),
                    ),

                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '专题频道',
        'fields' => array(
            array(
                'id'      => 'special_title',
                'type'    => 'text',
                'title'   => '模块标题',
                'default' => '专题频道',
            ),
            array(
                'id'     => 'cat_special',
                'type'   => 'group',
                'title'  => '专题频道',
                'fields' => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '专题标题',
                    ),
                    array(
                        'id'    => 'describe',
                        'type'  => 'textarea',
                        'title' => '专题描述',
                    ),
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '专题封面',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'desc'         => '封面图尺寸：宽335px*高165px',
                    ),
                    array(
                        'id'          => 'id',
                        'type'        => 'select',
                        'title'       => '选择分类',
                        'placeholder' => '选择分类',
                        'options'     => 'categories',
                    ),

                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => 'CMS模块（统一设置）',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '注意：所有CMS模块都在这里设置，如非特殊情况请勿点击【重置当前分区】会重置所有CMS模块的设置',
            ),
            array(
                'id'      => 'home_cms_type',
                'type'    => 'image_select',
                'title'   => '<h3>选择设置的样式</h3>',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-home-cms1.png',
                    '2' => get_template_directory_uri() . '/static/admin-img/ceo-home-cms2.png',
                    '3' => get_template_directory_uri() . '/static/admin-img/ceo-home-cms3.png',
                    '4' => get_template_directory_uri() . '/static/admin-img/ceo-home-cms4.png',
                    '5' => get_template_directory_uri() . '/static/admin-img/ceo-home-cms5.png',
                ),
                'desc'    => ' [样式1：快捷导航模块] [样式2：快捷链接模块] [样式3：快捷分类模块] [样式4：快捷分类菜单] [样式5：按钮模块设置]',
                'default' => '1'
            ),
            //CMS模块1快捷导航模块设置
            array(
                'id'      => 'cms1',
                'type'    => 'repeater',
                'title'   => '首页快捷导航模块设置',
                'dependency' => array('home_cms_type', '==', '1'),
                'fields'  => array(
                    array(
                        'id'      => 'icon',
                        'type'    => 'text',
                        'title'   => '导航icon图标',
                        'default' => 'ceoicon-earth-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '导航标题',
                    ),
                    array(
                        'id'    => 'des',
                        'type'  => 'text',
                        'title' => '副标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接',
                    ),

                ),
                'default' => array(
                    array(
                        'icon'  => 'ceoicon-earth-line',
                        'title' => '导航标题',
                        'des'   => '导航副标题',
                    ),

                )
            ),
            //CMS模块2快捷链接模块设置
            array(
                'id'     => 'cms2',
                'type'   => 'group',
                'title'  => '首页快捷链接模块设置',
                'dependency' => array('home_cms_type', '==', '2'),
                'fields' => array(
                    array(
                        'id'    => 'h1',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                    array(
                        'id'      => 'icon',
                        'type'    => 'text',
                        'title'   => '导航icon图标',
                        'default' => 'ceoicon-earth-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),

                    array(
                        'id'    => 'des',
                        'type'  => 'text',
                        'title' => '副标题',
                    ),
                    array(
                        'id'      => 'cms2_style',
                        'type'    => 'image_select',
                        'title'   => '样式选择',
                        'options' => array(
                            'list'  => get_template_directory_uri() . '/static/admin-img/ceo-list.jpg',
                            'tags'  => get_template_directory_uri() . '/static/admin-img/ceo-tags.jpg',
                            'img'   => get_template_directory_uri() . '/static/admin-img/ceo-img.jpg',
                            'icons' => get_template_directory_uri() . '/static/admin-img/ceo-icons.jpg',
                        ),
                    ),
                    array(
                        'id'         => 'list',
                        'type'       => 'repeater',
                        'dependency' => array('cms2_style', '==', 'list'),
                        'title'      => '列表样式',
                        'fields'     => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题'
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接'
                            ),
                        ),
                    ),
                    array(
                        'id'         => 'tags',
                        'type'       => 'repeater',
                        'dependency' => array('cms2_style', '==', 'tags'),
                        'title'      => '标签样式',
                        'fields'     => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题'
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接'
                            ),
                        ),
                    ),
                    array(
                        'id'         => 'img',
                        'dependency' => array('cms2_style', '==', 'img'),
                        'type'       => 'fieldset',
                        'title'      => '图片样式',
                        'fields'     => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题'
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接'
                            ),
                            array(
                                'id'           => 'img_url',
                                'type'         => 'upload',
                                'title'        => '图片链接',
                                'library'      => 'image',
                                'placeholder'  => 'http://',
                                'button_title' => '上传',
                                'remove_title' => '删除',
                            ),

                        ),
                    ),
                    array(
                        'id'         => 'icons',
                        'type'       => 'repeater',
                        'dependency' => array('cms2_style', '==', 'icons'),
                        'title'      => '图标样式',
                        'fields'     => array(
                            array(
                                'id'      => 'icon',
                                'type'    => 'text',
                                'title'   => '图标',
                                'default' => 'ceoicon-earth-line',
                                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                            ),
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题'
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接'
                            ),
                        ),
                    ),
                ),
            ),
            //图片+标题模块
            array(
                'id'         => 'cms3',
                'type'       => 'repeater',
                'title'      => '图片+标题设置',
                'dependency' => array('home_cms_type', '==', '3'),
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '按钮标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '按钮链接',
                    ),
                ),
            ),
            //CMS模块4快捷菜单模块设置
            array(
                'id'     => 'cms4',
                'type'   => 'group',
                'title'  => '首页分类菜单模块设置',
                'dependency' => array('home_cms_type', '==', '4'),
                'fields' => array(
                    array(
                        'id'    => 'h1',
                        'type'  => 'text',
                        'title' => '模块标题',
                    ),
                    array(
                        'id'      => 'icon',
                        'type'    => 'text',
                        'title'   => '模块图标',
                        'default' => 'ceoicon-coupon-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'links',
                        'type'  => 'text',
                        'title' => '模块链接',
                    ),
                    array(
                        'id'         => 'tags',
                        'type'       => 'repeater',
                        'title'      => '按钮设置',
                        'fields'     => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题'
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接'
                            ),
                        ),
                    ),
                ),
            ),
            //CMS模块5快捷菜单模块设置
            array(
                'id'      => 'cms5_title',
                'dependency' => array('home_cms_type', '==', '5'),
                'type'    => 'text',
                'title'   => '模块标题',
            ),
            array(
                'id'      => 'cms5_title2',
                'dependency' => array('home_cms_type', '==', '5'),
                'type'    => 'text',
                'title'   => '副标题',
            ),
            array(
                'id'      => 'cms5_icon',
                'dependency' => array('home_cms_type', '==', '5'),
                'type'    => 'text',
                'title'   => '模块图标',
                'default' => 'ceoicon-thumb-up-line',
                'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'cms5_tags',
                'dependency' => array('home_cms_type', '==', '5'),
                'type'       => 'repeater',
                'title'      => '按钮设置',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题'
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接'
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '图片模块（统一设置）',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '注意：所有图片模块都在这里设置，如非特殊情况请勿点击【重置当前分区】会重置所有图片模块的设置',
            ),
            array(
                'id'      => 'home_img_type',
                'type'    => 'image_select',
                'title'   => '<h3>选择设置的样式</h3>',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-home-img1.jpg',
                    '2' => get_template_directory_uri() . '/static/admin-img/ceo-home-img2.jpg',
                    '3' => get_template_directory_uri() . '/static/admin-img/ceo-home-img3.jpg',
                ),
                'desc'    => ' [样式1：六图模块] [样式2：五图模块] [样式3：四图模块]',
                'default' => '1'
            ),
            //六图模块
            array(
                'id'         => 'home_img_1',
                'type'       => 'repeater',
                'max'        => '6',
                'title'      => '六图模块设置',
                'desc'       => '六图模块图片宽度限：224px，高度不限',
                'dependency' => array('home_img_type', '==', '1'),
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '图片链接',
                    ),
                ),
            ),
            //五图模块
            array(
                'id'         => 'home_img_2',
                'type'       => 'repeater',
                'max'        => '5',
                'title'      => '五图模块设置',
                'desc'       => '五图模块图片宽度限：272px，高度不限',
                'dependency' => array('home_img_type', '==', '2'),
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '图片链接',
                    ),
                ),
            ),
            //四图模块
            array(
                'id'         => 'home_img_3',
                'type'       => 'repeater',
                'max'        => '4',
                'title'      => '四图模块设置',
                'desc'       => '四图模块图片宽度限：345px，高度不限',
                'dependency' => array('home_img_type', '==', '3'),
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '图片链接',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '滚动模块（统一设置）',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '注意：所有滚动模块都在这里设置，如非特殊情况请勿点击【重置当前分区】会重置所有滚动模块的设置',
            ),
            array(
                'id'      => 'home_roll_type',
                'type'    => 'image_select',
                'title'   => '<h3>选择设置的样式</h3>',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-home-roll1.jpg',
                ),
                'desc'    => ' [样式1：最新发布滚动模块]',
                'default' => '1'
            ),
            //滚动模块1最新发布滚动模块
            array(
                'id'         => 'ceo_roll1_sz',
                'type'       => 'fieldset',
                'dependency' => array('home_roll_type', '==', '1'),
                'title'      => '最新发布滚动模块设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceo_roll1_img',
                        'type'    => 'upload',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'title'   => '最新发布滚动模块图片',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-home-roll.png',
                    ),
                ),
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '业务模块（统一设置）',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '注意：所有业务模块都在这里设置，如非特殊情况请勿点击【重置当前分区】会重置所有业务模块的设置',
            ),
            array(
                'id'      => 'home_yewu_type',
                'type'    => 'image_select',
                'title'   => '<h3>选择设置的样式</h3>',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-home-yewu1.jpg',
                ),
                'desc'    => '1：业务模块1',
                'default' => '1'
            ),
            //业务模块1
            array(
                'id'           => 'yewu_1_sz',
                'dependency'   => array('home_yewu_type', '==', 'true'),
                'type'         => 'fieldset',
                'title'        => '模块信息设置',
                'fields'       => array(
                    array(
                        'id'      => 'yewu_1_title',
                        'type'    => 'text',
                        'title'   => '模块标题',
                    ),
                    array(
                        'id'      => 'yewu_1_desc',
                        'type'    => 'text',
                        'title'   => '模块描述',
                    ),
                    array(
                        'id'           => 'yewu_1_img',
                        'type'         => 'upload',
                        'title'        => '模块背景图',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-yewu.jpg',
                    ),
                ),
            ),
            //业务模块1设置
            array(
                'id'     => 'yewu_1_mk',
                'type'   => 'group',
                'max'    => '5',
                'title'  => '业务内容模块设置',
                'desc'   => '请添加并设置5个模块内容',
                'dependency' => array('home_yewu_type', '==', '1'),
                'fields' => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '模块标题',
                    ),
                    array(
                        'id'      => 'icon',
                        'type'    => 'text',
                        'title'   => '模块图标',
                        'default' => 'ceoicon-thumb-up-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '模块描述',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '模块连接',
                    ),
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '模块背景图片',
                        'library'      => 'image',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'     => 'yewu_1_mk_js',
                        'type'   => 'repeater',
                        'max'    => '6',
                        'title'  => '标题介绍设置',
                        'fields' => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '按钮标题',
                            ),
                        ),
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '首页广告',
        'fields' => array(
            //首页广告
            array(
                'id'      => 'single_index_ad',
                'type'    => 'switcher',
                'title'   => '首页广告',
                'default' => false
            ),
            array(
                'id'         => 'single_index_ad_img',
                'type'       => 'textarea',
                'dependency' => array('single_index_ad', '==', 'true'),
                'title'      => '广告代码',
                'default'    => '<a href="https://www.ceotheme.com/" target="_blank"><img src="' . get_template_directory_uri() . '/static/images/ceo-bg.png"></a>',
                'desc'       => '可自定义添加广告代码，支持广告联盟等代码添加（通用广告可直接修改图片链接与超链接即可）',
                'sanitize' => false,
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_home',
        'title'  => '图文广告',
        'fields' => array(
            array(
                'id'      => 'ceo_ads_spp',
                'type'    => 'switcher',
                'title'   => '手机端是否隐藏图片广告',
                'desc'    => '注意：开启则隐藏，关闭则显示',
                'default' => true
            ),
            array(
                'id'      => 'ceo_adsw_app',
                'type'    => 'switcher',
                'title'   => '手机端是否隐藏文字广告',
                'desc'    => '注意：开启则隐藏，关闭则显示',
                'default' => true
            ),
            //多图广告
            array(
                'id'      => 'ceo_ads',
                'type'    => 'switcher',
                'title'   => '多图广告',
                'default' => false
            ),
            array(
                'id'         => 'ceo_ads_sz',
                'dependency' => array('ceo_ads', '==', true),
                'type'       => 'repeater',
                'title'      => '添加广告',
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '上传图片',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题'
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接'
                    ),
                    array(
                        'id'    => 'date',
                        'type'  => 'text',
                        'title' => '到期时间'
                    ),
                ),
                'desc'       =>'一排3个图片广告，广告尺寸480px*70px'
            ),
            //文字广告
            array(
                'id'      => 'ceo_adsw',
                'type'    => 'switcher',
                'title'   => '文字广告',
                'default' => false
            ),
            array(
                'id'         => 'ceo_adsw_sz',
                'dependency' => array('ceo_adsw', '==', true),
                'type'       => 'repeater',
                'title'      => '添加广告',
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题'
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '链接'
                    ),
                    array(
                        'id'      => 'color',
                        'type'    => 'color',
                        'title'   => '字体颜色',
                        'default' => '#026eff'
                    ),
                    array(
                        'id'    => 'date',
                        'type'  => 'text',
                        'title' => '到期时间'
                    ),
                ),
                'desc'       =>'一排6个文字广告，文字数量建议不超过16个字'
            ),
        )
    ));

    /*
     * 分类设置
     * */
     CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_cat',
        'icon'  => 'fa fa-folder-open',
        'title' => '分类设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '分类基本设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分类列表设置',
            ),
            array(
                'id'           => 'default_thum',
                'type'         => 'upload',
                'title'        => '设置文章默认缩略图',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceotheme_no.jpg',
            ),
            array(
                'id'           => 'category_default_thum',
                'type'         => 'upload',
                'title'        => '栏目默认背景图',
                'desc'         => '也可以在后台分类目录中独立设置分类列表背景图~未独立设置则自动调用该设置中默认背景图',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'      => 'ceo-cat-tj',
                'type'    => 'switcher',
                'title'   => '分类文章数量统计',
                'desc'    => '隐藏/显示分类标题旁分类栏目文章数量统计（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo-cat-mbx',
                'type'    => 'switcher',
                'title'   => '面包屑导航（当前位置）',
                'desc'    => '隐藏/显示分类面包屑导航（当前位置）（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'          => 'cat_load',
                'type'        => 'select',
                'title'       => '列表文章加载方式',
                'placeholder' => '选择列表文章加载方式',
                'options'     => array(
                    '1' => '上一页下一页数字加载',
                    '2' => 'AJAX无刷新加载',
                ),
                'default'     => '1'
            ),
            array(
                'id'      => 'target_blank',
                'type'    => 'switcher',
                'title'   => '新窗口打开文章',
                'desc'    => '点击列表文章跳转新窗口（开启则跳转新窗口，关闭则当前窗口跳转）',
                'label'   => '',
                'default' => false,
            ),
            array(
                'id'      => 'ceo-cat-nav',
                'type'    => 'switcher',
                'title'   => '是否显示一级分类导航',
                'desc'    => '隐藏/显示一级分类导航（开启则显示，关闭则隐藏）',
                'default' => true,
            ),

            array(
                'id'          => 'archive_filter_cat_1',
                'type'        => 'select',
                'title'       => '一级主分类筛选配置',
                'desc'        => '排序规则以设置的顺序为准',
                'placeholder' => '选择分类',
                'inline'      => true,
                'chosen'      => true,
                'multiple'    => true,
                'options'     => 'categories',
                'query_args'  => array(
                    'orderby' => 'count',
                    'order'   => 'DESC',
                    'parent'  => 0,
                ),
            ),
            array(
                'id'      => 'ceo_cat_nav_title1',
                'type'    => 'text',
                'title'   => '自定义一级分类标题',
                'default' => '分类导航',
            ),
            array(
                'id'      => 'ceo_cat_nav_title2',
                'type'    => 'text',
                'title'   => '自定义二级分类标题',
                'default' => '二级分类',
            ),
            array(
                'id'      => 'ceo_cat_nav_title3',
                'type'    => 'text',
                'title'   => '自定义三级分类标题',
                'default' => '三级分类',
            ),

            array(
                'id'      => 'ceo-cat-sx',
                'type'    => 'switcher',
                'title'   => '最新/最热/随机筛选按钮',
                'desc'    => '隐藏/显示分类筛选按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo-cat-vip',
                'type'    => 'switcher',
                'title'   => '分类升级会员按钮',
                'desc'    => '隐藏/显示分类升级会员按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo-cat-vip-sz',
                'type'       => 'fieldset',
                'title'      => '升级会员按钮设置',
                'dependency' => array('ceo-cat-vip', '==', true),
                'fields'     => array(
                    array(
                        'id'         => 'ceo-cat-vip-ico',
                        'type'       => 'text',
                        'title'      => '图标',
                        'default'    => 'ceoicon-vip-crown-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'         => 'ceo-cat-vip-title',
                        'type'       => 'text',
                        'title'      => '标题',
                        'default'    => '升级VIP无限免费下载',
                    ),
                    array(
                        'id'         => 'ceo-cat-vip-link',
                        'type'       => 'text',
                        'title'      => '链接',
                        'default'    => '/vip',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '列表文章设置（以下功能开启则显示，关闭则隐藏）',
            ),
            array(
                'id'      => 'ceo_cat_viptb',
                'type'    => 'switcher',
                'title'   => 'VIP资源图标',
                'desc'    => '隐藏/显示列表VIP资源图标',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_tops',
                'type'    => 'switcher',
                'title'   => '分类/演示总开关',
                'desc'    => '隐藏/显示列表标题顶部总模块（开启则独立开关设置，关闭则隐藏文章所属分类、查看演示地址）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_catfl',
                'dependency' => array('ceo_cat_tops', '==', true),
                'type'    => 'switcher',
                'title'   => '文章所属分类',
                'desc'    => '隐藏/显示列表文章所属分类',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_demo',
                'dependency' => array('ceo_cat_tops', '==', true),
                'type'    => 'switcher',
                'title'   => '查看演示地址',
                'desc'    => '隐藏/显示列表查看演示地址',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_tese',
                'type'    => 'switcher',
                'title'   => '特色标签',
                'desc'    => '隐藏/显示列表特色标签',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_title',
                'type'    => 'switcher',
                'title'   => '文章标题',
                'desc'    => '隐藏/显示列表文章标题',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_foos',
                'type'    => 'switcher',
                'title'   => '文章信息底部总开关',
                'desc'    => '隐藏/显示列表底部总模块（开启则独立开关设置，关闭则隐藏以下全部内容）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_archive',
                'dependency' => array('ceo_cat_foos', '==', true),
                'type'    => 'switcher',
                'title'   => '作者头像',
                'desc'    => '隐藏/显示列表文章作者头像',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_archive_t',
                'dependency' => array('ceo_cat_foos', '==', true),
                'type'    => 'switcher',
                'title'   => '作者名称',
                'desc'    => '隐藏/显示列表文章作者名称',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_riqi',
                'dependency' => array('ceo_cat_foos', '==', true),
                'type'    => 'switcher',
                'title'   => '发布日期',
                'desc'    => '隐藏/显示列表发布日期',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_views',
                'dependency' => array('ceo_cat_foos', '==', true),
                'type'    => 'switcher',
                'title'   => '文章浏览量',
                'desc'    => '隐藏/显示列表文章浏览量',
                'default' => true,
            ),
            array(
                'id'      => 'ceo_cat_jiage',
                'dependency' => array('ceo_cat_foos', '==', true),
                'type'    => 'switcher',
                'title'   => '资源价格',
                'desc'    => '隐藏/显示列表资源价格',
                'default' => true,
            ),
        )
    ));

    //高级自定义筛选
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_cat',
        'title'  => '高级分类筛选',
        'fields' => array(
            array(
                'id'      => 'ceo_choice',
                'type'    => 'switcher',
                'title'   => '高级自定义筛选',
                'desc'    => '高级自定义筛选功能主要为资源进行详细属性分类筛选<b><font color="red">需要注意每个筛选名称，必须有两个或两个属性选项，否则无法使用且会报错</font></b>',
                'default' => false,
            ),
            array(
                'id'         => 'ceo_choice_sz',
                'type'       => 'group',
                'title'      => '自定义筛选设置',
                'max'        => '50',
                'fields'     => array(

                    array(
                        'id'      => 'meta_name',
                        'type'    => 'text',
                        'title'   => '主筛选标题',
                        'default' => '颜色',
                        'desc'    => '例如：颜色、格式、型号等主筛选标题<b><font color="red">注意：任何筛选主标题必须唯一，不可重复，只要不一样就行！！！</font></b>'
                    ),
                    array(
                        'id'      => 'meta_ua',
                        'type'    => 'text',
                        'title'   => '标题英文标识',
                        'default' => 'ceo_meta_1',
                        'desc'    => '例如：ceo_meta_1、abc_1等英文标识<b><font color="red">注意：任何筛选英文标识必须唯一，不可重复，只要不一样就行！！！建议英文+数字序号排序</font></b>'
                    ),
                    array(
                        'id'          => 'meta_category',
                        'type'        => 'select',
                        'title'       => '只在该分类下显示高级筛选属性',
                        'placeholder' => '全部显示',
                        'chosen'      => true,
                        'multiple'    => true,
                        'options'     => 'categories',
                        'desc'        => '默认为全部显示，需要在某个分类才显示时请选择该分类'
                    ),
                    array(
                        'id'     => 'meta_opt',
                        'type'   => 'group',
                        'title'  => '属性选项',
                        'fields' => array(
                            array(
                                'id'      => 'opt_name',
                                'type'    => 'text',
                                'title'   => '属性选项名称',
                                'default' => '黄色',
                                'desc'    => '例如：黄色、PSD、型号1等属性选项名称<b><font color="red">注意：任何属性选项名称必须唯一，不可重复，只要不一样就行！！！</font></b>'
                            ),
                            array(
                                'id'      => 'opt_ua',
                                'type'    => 'text',
                                'title'   => '选项英文标识',
                                'default' => 'ceo_opt_1',
                                'desc'    => '例如：ceo_opt_1、def_1等英文标识<b><font color="red">注意：任何属性选项英文标识必须唯一，不可重复，只要不一样就行！！！建议英文+数字序号排序</font></b>'
                            ),
                        ),
                    ),

                ),
                'dependency' => array('ceo_choice', '==', 'true'),
            ),

        ),
    ));

    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式1设置【全宽菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat1-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式2设置【居中菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat2-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式3设置【居中上移】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat3-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式4设置【双栏菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat4-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo-cat-an',
                'type'    => 'switcher',
                'title'   => '菜单样式4',
                'desc'    => '隐藏/显示顶部菜单按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
                array(
                    'id'         => 'ceo-cat-an-sz',
                    'type'       => 'fieldset',
                    'title'      => '菜单样式4按钮设置',
                    'dependency' => array('ceo-cat-an', '==', true),
                    'fields'     => array(
                        array(
                            'id'         => 'ceo-cat-an-title',
                            'type'       => 'text',
                            'title'      => '标题',
                            'default'    => '我要出售',
                        ),
                        array(
                            'id'         => 'ceo-cat-an-link',
                            'type'       => 'text',
                            'title'      => '链接',
                            'default'    => '/',
                        ),
                    ),
                ),
            array(
                'id'         => 'ceo-cat-fl-sz',
                'type'       => 'fieldset',
                'title'      => '热门排行模块设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceo-cat-fl-img',
                        'type'    => 'upload',
                        'title'   => '模块图片',
                        'default' => get_template_directory_uri() . '/static/images/ceo-web-bg.png',
                    ),
                    array(
                        'id'         => 'ceo-cat-fl-title',
                        'type'       => 'text',
                        'title'      => '模块标题',
                        'default'    => '专业服务 │ 平台保障',
                    ),
                    array(
                        'id'         => 'ceo-cat-fl-an',
                        'type'       => 'text',
                        'title'      => '按钮标题',
                        'default'    => '申请求购',
                    ),
                    array(
                        'id'         => 'ceo-cat-fl-link',
                        'type'       => 'text',
                        'title'      => '按钮链接',
                        'default'    => '/',
                    ),
                    array(
                        'id'         => 'ceo-cat-fl-jy',
                        'type'       => 'text',
                        'title'      => '热门排行标题',
                        'default'    => '热门排行',
                    ),
                    array(
                        'id'         => 'ceo-cat-fl-jyf',
                        'type'       => 'text',
                        'title'      => '副标题',
                        'default'    => '真实热门排行数据',
                    ),
                ),
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式5设置【极简菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat5-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式6设置【搜索菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat6-tag',
                'type'    => 'switcher',
                'title'   => '热门标签',
                'desc'    => '隐藏/显示搜索框下热门标签（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo-cat6-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_cat',
        'title'  => '菜单样式7设置【视频菜单】',
        'fields' => array(
            array(
                'id'      => 'ceo-cat7-tag',
                'type'    => 'switcher',
                'title'   => '热门标签',
                'desc'    => '隐藏/显示搜索框下热门标签（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'ceo-cat7-jgsx',
                'type'    => 'switcher',
                'title'   => '价格/文章类型筛选总开关',
                'desc'    => '隐藏/显示价格/文章类型筛选（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_cat7_sz',
                'type'       => 'repeater',
                'max'        => '4',
                'title'      => '顶部专题设置',
                'desc'       => '请设置添加4个专题模块',
                'fields'     => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '模块图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '模块标题',
                    ),
                    array(
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => '模块副标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '模块连接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        ),
    ));
    /*
     * 内页设置
     * */
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_single',
        'icon'  => 'fa fa-window-maximize',
        'title' => '内页设置',
    ));
    //默认内页设置
    //文章内页
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_single',
        'title'  => '内页基础设置',
        'fields' => array(
            array(
                'id'      => 'single_picture',
                'type'    => 'switcher',
                'title'   => '内页背景图',
                'desc'    => '开启或关闭内容页背景图，开启则显示，关闭则默认背景颜色',
                'default' => true,
            ),
            array(
                'id'           => 'single_picture_img',
                'type'         => 'upload',
                'dependency'   => array('single_picture', '==', 'true'),
                'title'        => '设置背景图',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.jpg',
            ),
            array(
                'id'      => 'single_mbx_mianbaoxie',
                'type'    => 'switcher',
                'title'   => '隐藏/显示面包屑导航（当前位置）',
                'default' => true,
            ),
            array(
                'id'      => 'single_tg',
                'type'    => 'switcher',
                'title'   => '隐藏/显示投稿按钮',
                'default' => true,
            ),
            array(
                'id'         => 'single_tg_title',
                'dependency' => array('single_tg', '==', 'true'),
                'type'       => 'text',
                'title'      => '投稿标题',
                'default'    => '我要投稿',
            ),
            array(
                'id'         => 'single_tg_link',
                'dependency' => array('single_tg', '==', 'true'),
                'type'       => 'text',
                'title'      => '投稿链接',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'single_rq_zz',
                'type'    => 'switcher',
                'title'   => '文章顶部作者名称',
                'default' => true,
            ),
            array(
                'id'      => 'single_rq_fabu',
                'type'    => 'switcher',
                'title'   => '文章顶部发布日期',
                'default' => true,
            ),
            array(
                'id'      => 'single_cat',
                'type'    => 'switcher',
                'title'   => '文章顶部所属分类',
                'default' => true,
            ),
            array(
                'id'      => 'single_sc_num',
                'type'    => 'switcher',
                'title'   => '文章顶部收藏数量',
                'default' => true,
            ),
            array(
                'id'      => 'single_ll_liulan',
                'type'    => 'switcher',
                'title'   => '文章顶部浏览数量',
                'default' => true,
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'single_collection',
                'type'    => 'switcher',
                'title'   => '文章底部收藏按钮',
                'default' => true,
            ),
            array(
                'id'         => 'collection_show_num',
                'type'       => 'switcher',
                'title'      => '文章收藏显示数量',
                'default'    => true,
            ),
            array(
                'id'      => 'single_shang',
                'type'    => 'switcher',
                'title'   => '文章底部打赏按钮',
                'default' => true,
            ),
            array(
                'id'           => 'single_shang_sz',
                'dependency'   => array('single_shang', '==', 'true'),
                'type'         => 'fieldset',
                'title'        => '打赏弹窗内容',
                'fields'       => array(
                    array(
                        'id'           => 'single_shang_title',
                        'type'         => 'text',
                        'title'        => '顶部标题',
                        'default'      => '感谢您的支持，我会继续努力的!',
                    ),
                    array(
                        'id'           => 'single_shang_img',
                        'type'         => 'upload',
                        'title'        => '设置收款码',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'desc'         => '建议使用多合一收款码'
                    ),
                    array(
                        'id'           => 'single_shang_fotitle',
                        'type'         => 'textarea',
                        'title'        => '底部标题',
                        'default'      => '打开微信/支付宝扫一扫，即可进行扫码打赏哦，分享从这里开始，精彩与您同在',
                    ),
                ),
            ),
            array(
                'id'      => 'single_zan',
                'type'    => 'switcher',
                'title'   => '文章底部点赞按钮',
                'default' => true,
            ),
            array(
                'id'      => 'single_cop',
                'type'    => 'switcher',
                'title'   => '文章底部版权',
                'default' => true,
            ),
            array(
                'id'         => 'single_cop_text',
                'dependency' => array('single_cop', '==', 'true'),
                'type'       => 'textarea',
                'title'      => '版权文字',
            ),
            array(
                'id'         => 'single_cop_link',
                'type'       => 'switcher',
                'title'      => '版权链接',
                'default'    => true,
                'dependency' => array('single_cop', '==', 'true'),
            ),
            array(
                'id'      => 'single_tag',
                'type'    => 'switcher',
                'title'   => '文章底部标签',
                'default' => true,
            ),
            array(
                'id'          => 'turnpage',
                'type'        => 'select',
                'title'       => '选择上一篇下一篇样式',
                'placeholder' => '选择样式',
                'options'     => array(
                    '1' => '文字样式',
                    '2' => '缩略图样式',
                ),
                'default'     => '2'
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'single_author',
                'type'    => 'switcher',
                'title'   => '文章底部作者模块',
                'default' => true,
            ),
            array(
                'id'         => 'single_author_tx',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '作者头像',
                'default'    => true,
            ),
            array(
                'id'         => 'single_author_mc',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '作者名称',
                'default'    => true,
            ),
            array(
                'id'         => 'single_author_qm',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '作者签名',
                'default'    => true,
            ),
            array(
                'id'         => 'poster_share_open',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '生成海报功能',
                'default'    => true,
            ),
            array(
                'id'         => 'single_author_lj',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '复制本文链接',
                'default'    => true,
            ),
            array(
                'id'         => 'single_author_fx',
                'type'       => 'switcher',
                'dependency' => array('single_author', '==', 'true'),
                'title'      => '文章分享按钮',
                'default'    => true,
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_single',
        'title'  => '内页模块设置',
        'fields' => array(
            /*相关文章模块*/
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （文章底部相关文章模块）',
            ),
            array(
                'id'      => 'single_article',
                'type'    => 'switcher',
                'title'   => '相关文章模块',
                'desc'    => '开启或关闭内容页相关文章（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'single_article_shop',
                'type'    => 'switcher',
                'title'   => '是否在商城内页显示',
                'default' => true,
                'dependency' => array('single_article', '==', 'true'),
            ),
            array(
                'id'      => 'single_article_article',
                'type'    => 'switcher',
                'title'   => '是否在文章内页显示',
                'default' => true,
                'dependency' => array('single_article', '==', 'true'),
            ),
            array(
                'id'         => 'single_article_title',
                'dependency' => array('single_article', '==', 'true'),
                'type'       => 'text',
                'title'      => '相关文章标题',
                'default'    => '相关文章',
            ),
            array(
                'id'         => 'single_article_num',
                'dependency' => array('single_article', '==', 'true'),
                'type'       => 'text',
                'title'      => '相关文章数量',
                'default'    => 4,
            ),

            /*猜你喜欢模块*/
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （文章底部猜你喜欢模块）',
            ),
            array(
                'id'      => 'single_article_c',
                'type'    => 'switcher',
                'title'   => '猜你喜欢模块',
                'desc'    => '开启或关闭内容页猜你喜欢（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'single_article_c_shop',
                'type'    => 'switcher',
                'title'   => '是否在商城内页显示',
                'default' => true,
                'dependency' => array('single_article_c', '==', 'true'),
            ),
            array(
                'id'      => 'single_article_c_article',
                'type'    => 'switcher',
                'title'   => '是否在文章内页显示',
                'default' => true,
                'dependency' => array('single_article_c', '==', 'true'),
            ),
            array(
                'id'         => 'single_article_c_title',
                'dependency' => array('single_article_c', '==', 'true'),
                'type'       => 'text',
                'title'      => '猜你喜欢标题',
                'default'    => '猜你喜欢',
            ),
            array(
                'id'         => 'single_article_c_num',
                'dependency' => array('single_article_c', '==', 'true'),
                'type'       => 'text',
                'title'      => '猜你喜欢数量',
                'default'    => 10,
            ),

            /*常见问题模块*/
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （文章底部常见问题模块）',
            ),
            array(
                'id'         => 'single_qa',
                'type'       => 'switcher',
                'title'      => '常见问题模块',
                'desc'       => '开启或关闭内容页常见问题（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'      => 'single_qa_shop',
                'type'    => 'switcher',
                'title'   => '是否在商城内页显示',
                'default' => true,
                'dependency' => array('single_qa', '==', true),
            ),
            array(
                'id'      => 'single_qa_article',
                'type'    => 'switcher',
                'title'   => '是否在文章内页显示',
                'default' => true,
                'dependency' => array('single_qa', '==', true),
            ),
            array(
                'id'      => 'single_qa_title',
                'type'    => 'text',
                'title'   => '常见问题标题',
                'default' => '常见问题',
                'dependency' => array('single_qa', '==', true),
            ),
            array(
                'id'         => 'single_qa_sz',
                'type'       => 'repeater',
                'title'      => '常见问题设置',
                'dependency' => array('single_qa', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'single_qa_bt',
                        'type'    => 'text',
                        'title'   => '标题',
                    ),
                    array(
                        'id'      => 'single_qa_nr',
                        'type'    => 'textarea',
                        'title'   => '内容',
                    ),
                    array(
                        'id'      => 'single_qa_lj',
                        'type'    => 'text',
                        'title'   => '链接',
                    ),
                ),
            ),

            /*联系官方模块*/
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （内页联系官方模块）',
            ),
            array(
                'id'      => 'single_article_contact',
                'type'    => 'switcher',
                'title'   => '联系官方模块',
                'desc'    => '开启或关闭内容页联系官方模块，包括但不限于。（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'single_article_contact_shop',
                'type'    => 'switcher',
                'title'   => '是否在商城内页显示',
                'default' => true,
                'dependency' => array('single_article_contact', '==', 'true'),
            ),
            array(
                'id'      => 'single_article_contact_article',
                'type'    => 'switcher',
                'title'   => '是否在文章内页显示',
                'default' => true,
                'dependency' => array('single_article_contact', '==', 'true'),
            ),
            array(
                'id'         => 'single_article_contact_sz',
                'type'       => 'fieldset',
                'title'      => '联系官方模块设置',
                'dependency' => array('single_article_contact', '==', 'true'),
                'fields'     => array(
                    array(
                        'id'           => 'single_article_contact_sz_img',
                        'type'         => 'upload',
                        'title'        => '模块背景图',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-img-contact.png',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_title',
                        'type'    => 'text',
                        'title'   => '主标题',
                        'default' => '官方客服团队',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_desc',
                        'type'    => 'text',
                        'title'   => '副标题',
                        'default' => '为您解决烦忧 - 24小时在线 专业服务',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                    array(
                        'id'         => 'single_article_contact_sz_an1b',
                        'type'       => 'text',
                        'title'      => '按钮图标1',
                        'default'    => 'ceoicon-customer-service-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_an1t',
                        'type'    => 'text',
                        'title'   => '按钮标题1',
                        'default' => '联系官方团队',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_an1q',
                        'type'    => 'text',
                        'title'   => '按钮链接1',
                        'default' => 'https://wpa.qq.com/msgrd?v=3&uin=88888888&site=qq&menu=yes',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                    array(
                        'id'         => 'single_article_contact_sz_an2b',
                        'type'       => 'text',
                        'title'      => '按钮图标2',
                        'default'    => 'ceoicon-customer-service-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_an2t',
                        'type'    => 'text',
                        'title'   => '按钮标题2',
                        'default' => '在线提交工单',
                    ),
                    array(
                        'id'      => 'single_article_contact_sz_an2q',
                        'type'    => 'text',
                        'title'   => '按钮链接2',
                        'default' => '/member/feedback/',
                    ),
                ),
            ),

            /*推荐专题模块*/
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线  （内页底部推荐专题模块）',
            ),
            array(
                'id'      => 'single_article_relevant',
                'type'    => 'switcher',
                'title'   => '推荐专题模块',
                'desc'    => '开启或关闭内容页推荐专题（开启则显示，关闭则隐藏）',
                'default' => false,
            ),
            array(
                'id'      => 'single_article_relevant_shop',
                'type'    => 'switcher',
                'title'   => '是否在商城内页显示',
                'default' => false,
                'dependency' => array('single_article_relevant', '==', 'true'),
            ),
            array(
                'id'      => 'single_article_relevant_article',
                'type'    => 'switcher',
                'title'   => '是否在文章内页显示',
                'default' => false,
                'dependency' => array('single_article_relevant', '==', 'true'),
            ),
            array(
                'id'         => 'single_article_relevant_sz',
                'type'       => 'repeater',
                'title'      => '专题模块设置',
                'dependency' => array('single_article_relevant', '==', 'true'),
                'fields'     => array(
                    array(
                        'id'    => 'tag',
                        'type'  => 'text',
                        'title' => '模块标签',
                    ),
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '模块图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '模块标题',
                    ),
                    array(
                        'id'    => 'ico',
                        'type'  => 'text',
                        'title' => '模块标题图标',
                        'default'    => 'ceoicon-calendar-todo-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'describe',
                        'type'  => 'text',
                        'title' => '模块描述',
                    ),
                    array(
                        'id'    => 'antitle',
                        'type'  => 'text',
                        'title' => '按钮标题',
                    ),
                    array(
                        'id'    => 'anlink',
                        'type'  => 'text',
                        'title' => '按钮链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_single',
        'title'  => '内页优化设置',
        'fields' => array(
            array(
                'id'      => 'image_fancybox',
                'type'    => 'switcher',
                'title'   => '图片灯箱功能 ',
                'desc'   => '图片灯箱开关，开启则点击图片能弹出，关闭不弹出灯箱',
                'default' => true,
            ),
            array(
                'id'      => 'auto_add_tags',
                'type'    => 'switcher',
                'title'   => '自动添加已有标签 ',
                'desc'   => '如果文章内容出现了已使用过的标签，自动添加这些标签 ',
                'default' => true,
            ),
            array(
                'id'      => 'single_tag_link',
                'type'    => 'switcher',
                'title'   => 'Tag标签自动内链 ',
                'default' => true,
            ),
            array(
                'id'       => 'single_nofollow',
                'type'     => 'switcher',
                'title'    => '文章外链自动添加nofollow',
                'default'  => true,
                'subtitle' => '防止导出权重',
            ),
            array(
                'id'      => 'single_img_alt',
                'type'    => 'switcher',
                'title'   => '图片自动添加alt',
                'default' => true,
            ),
            array(
                'id'      => 'single_upload_filter',
                'type'    => 'switcher',
                'title'   => '上传文件重命名',
                'default' => true,
            ),
            array(
                'id'      => 'single_delete_post_and_img',
                'type'    => 'switcher',
                'title'   => '删除文章时删除图片附件',
                'default' => true,
            ),

        )
    ));

    /*
     * 商城内页
     * */
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_mall',
        'icon'  => 'fa fa-shopping-cart',
        'title' => '商城内页',
    ));
    //默认商城内页设置
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城基础设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块 - 商城默认按钮设置',
            ),
            array(
                'id'         => 'ceoshop_single_an',
                'type'       => 'fieldset',
                'title'      => '商城默认按钮',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_single_an_xz',
                        'type'    => 'text',
                        'title'   => '下载按钮标题',
                        'default' => '立即下载',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_cxz',
                        'type'    => 'text',
                        'title'   => '已购买按钮标题',
                        'default' => '立即下载',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_ys',
                        'type'    => 'text',
                        'title'   => '查看演示标题',
                        'default' => '查看演示',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_hy',
                        'type'    => 'text',
                        'title'   => '升级会员标题',
                        'default' => '升级会员',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_hyl',
                        'type'    => 'text',
                        'title'   => '升级会员链接',
                        'default' => '/vip',
                    ),
                    array(
                        'id'         => 'ceo_shop_download_hide_text_1',
                        'type'       => 'text',
                        'title'      => '隐藏信息自定义1',
                        'default'    => '隐藏信息',
                    ),
                    array(
                        'id'         => 'ceo_shop_download_hide_text_2',
                        'type'       => 'text',
                        'title'      => '隐藏信息自定义2',
                        'default'    => '隐藏信息',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块 - 商城视频模块设置',
            ),
            array(
                'id'      => 'ceoshop_video_logo',
                'type'    => 'switcher',
                'title'   => '视频模块LOGO',
                'desc'    => '隐藏/显示视频模块LOGO图片',
                'default' => true,
            ),
            array(
                'id'           => 'ceoshop_video_logo_img',
                'type'         => 'upload',
                'title'        => '视频模块LOGO图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/logo.png',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 - 基础设置  （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_single_rq_zz',
                'type'    => 'switcher',
                'title'   => '文章作者名称',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_single_rq_fabu',
                'type'    => 'switcher',
                'title'   => '文章发布日期',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_single_cat',
                'type'    => 'switcher',
                'title'   => '文章所属分类',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_single_sc_num',
                'type'    => 'switcher',
                'title'   => '文章收藏数量',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_single_ll_liulan',
                'type'    => 'switcher',
                'title'   => '文章浏览数量',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_single_bj_bianji',
                'type'    => 'switcher',
                'title'   => '文章编辑按钮',
                'default' => true,
            ),
        )
    ));
    //商城内页
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城侧边栏设置',
        'fields' => array(

            //作者框设置--------------------------------------------------------------------------------------->
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块 - 侧边栏商家信息模块设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            //商家微信
            array(
                'id'      => 'ceoshop_shangjia_switch',
                'type'    => 'switcher',
                'title'   => '商家右上角微信二维码总开关',
                'desc'    => '开启或关闭商家右上角微信二维码总开关（作者如果没有设置微信二维码也不会显示）',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_shangjia_qqwxsz',
                'dependency' => array('ceoshop_shangjia_switch', '==', true),
                'type'       => 'fieldset',
                'title'      => '微信按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shangjia_wx',
                        'type'    => 'text',
                        'title'   => '微信按钮标题',
                        'default' => '微信扫码咨询',
                    ),
                    array(
                        'id'      => 'ceoshop_shangjia_wxtb',
                        'type'    => 'text',
                        'title'   => '微信按钮图标',
                        'default' => 'ceoicon-wechat-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                ),
            ),
            //商家电话
            array(
                'id'      => 'ceoshop_shangjia_dianhua',
                'type'    => 'switcher',
                'title'   => '商家电话总开关',
                'desc'    => '开启或关闭商家电话总开关（作者如果没有设置电话号码也不会显示）',
                'default' => true,
            ),
            //关注私信联系
            array(
                'id'      => 'ceoshop_shangjia_gzsx',
                'type'    => 'switcher',
                'title'   => '商家关注/私信联系',
                'desc'    => '隐藏/显示关注/私信/联系按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            //商铺
            array(
                'id'         => 'ceoshop_shangjia_ansz',
                'type'       => 'fieldset',
                'title'      => '商家店铺按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shangjia_anbt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '进入TA的商铺',
                    ),
                    array(
                        'id'      => 'ceoshop_shangjia_antb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                ),
            ),
            //客服
            array(
                'id'         => 'ceoshop_shangjia_kf',
                'type'       => 'fieldset',
                'title'      => '官方客服按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_single_kf_title',
                        'type'    => 'text',
                        'title'   => '客服按钮标题',
                        'default' => '联系官方客服',
                    ),
                    array(
                        'id'      => 'ceoshop_single_kf_ico',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-user-star-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'         => 'ceoshop_single_kf_qq',
                        'type'       => 'text',
                        'title'      => '官方客服QQ',
                        'default'    => '88888888',
                    ),
                ),
            ),
            //商业授权模块设置--------------------------------------------------------------------------------->
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块 - 侧边栏商业授权模块设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_shouquan_mk',
                'type'    => 'switcher',
                'title'   => '商业授权模块',
                'desc'    => '授权模块总开关，关闭后以下内容全部隐藏！！！',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_shouquan_ansz',
                'type'       => 'fieldset',
                'title'      => '授权按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shouquan_anbt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '获得企业商用授权',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_antb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-vip-crown-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_anlj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
            //版权所有
            array(
                'id'      => 'ceoshop_shouquan_sy',
                'type'    => 'switcher',
                'title'   => '开启/关闭版权所有',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_shouquan_sysz',
                'type'       => 'fieldset',
                'dependency' => array('ceoshop_shouquan_sy', '==', true),
                'title'      => '版权所有按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shouquan_sybt',
                        'type'    => 'text',
                        'title'   => '版权所有标题',
                        'default' => '版权所有',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_synr',
                        'type'    => 'text',
                        'title'   => '版权所有内容',
                        'default' => '© 总裁主题',
                    ),
                ),
            ),
            //版权说明
            array(
                'id'      => 'ceoshop_shouquan_sm',
                'type'    => 'switcher',
                'title'   => '开启/关闭版权说明',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_shouquan_smsz',
                'type'       => 'fieldset',
                'title'      => '版权说明设置',
                'dependency' => array('ceoshop_shouquan_sm', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shouquan_smbt',
                        'type'    => 'text',
                        'title'   => '版权说明标题',
                        'default' => '版权说明',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_smnr',
                        'type'    => 'text',
                        'title'   => '版权所有内容',
                        'default' => '相关字体/摄影图/音频仅供参考',
                    ),

                    array(
                        'id'      => 'ceoshop_shouquan_smsm',
                        'type'    => 'text',
                        'title'   => '版权所有弹窗标题',
                        'default' => '版权声明',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_smtc',
                        'type'    => 'textarea',
                        'title'   => '版权所有弹窗内容',
                        'default' => '此作品是由本站签约设计师设计上传，本站拥有版权；未经本站书面授权，请勿作他用。人物肖像，字体及音频如需商用需第三方额外授权；本站尊重知识产权，如知识产权权利人认为平台内容涉嫌侵权，可通过邮件：88888888@qq.com提出书面通知，我们将及时处理。本站提供的党政主题相关内容（国旗、国徽、党徽...），目的在于配合国家政策宣传，仅限个人学习分享使用，禁止用于任何广告和商用目的。',
                    ),
                ),
            ),
            //自定义按钮
            array(
                'id'      => 'ceoshop_shouquan_zdy',
                'type'    => 'switcher',
                'title'   => '开启/关闭自定义按钮',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_shouquan_zdy_sz',
                'dependency' => array('ceoshop_shouquan_zdy', '==', true),
                'type'       => 'repeater',
                'title'      => '自定义按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shouquan_zdy_bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '授权方式'
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_zdy_lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_zdy_tb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-coupon-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_zdy_nr',
                        'type'    => 'text',
                        'title'   => '按钮内容',
                        'default' => '企业授权'
                    ),
                ),
            ),
            //广告按钮
            array(
                'id'      => 'ceoshop_shouquan_gg',
                'type'    => 'switcher',
                'title'   => '开启/关闭广告按钮',
                'default' => true,
            ),
                array(
                    'id'         => 'ceoshop_shouquan_ggsz',
                    'type'       => 'fieldset',
                    'title'      => '广告按钮设置',
                    'dependency' => array('ceoshop_shouquan_gg', '==', true),
                    'fields'     => array(
                    array(
                        'id'      => 'ceoshop_shouquan_zdy_nr',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '懒得动手，帮我代做图片'
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_gg_lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                    array(
                        'id'      => 'ceoshop_shouquan_gg_tb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-image-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                ),
            ),
            //广告图片
            array(
                'id'      => 'ceoshop_shouquan_ggtp',
                'type'    => 'switcher',
                'title'   => '开启/关闭广告图片',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_shouquan_ggtp_lj',
                'dependency'   => array('ceoshop_shouquan_ggtp', '==', 'true'),
                'type'    => 'text',
                'title'   => '按钮链接',
            ),
            array(
                'id'           => 'ceoshop_shouquan_ggtp_k',
                'type'         => 'upload',
                'title'        => '广告图片',
                'dependency'   => array('ceoshop_shouquan_ggtp', '==', 'true'),
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-xxgg.png',
            ),
        )
    ));
    //商城样式1
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式1设置【传统样式】',
        'fields' => array(
            //左侧设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块1设置 - 左侧设置',
            ),
            array(
                'id'         => 'ceoshop_1_img',
                'type'       => 'text',
                'title'      => '自定义缩略图高度',
                'default'    => '233',
            ),
            array(
                'id'         => 'ceoshop_single_gx',
                'type'       => 'text',
                'title'      => '最近更新标题',
                'default'    => '最近更新',
            ),
            array(
                'id'         => 'ceoshop_single_bh',
                'type'       => 'text',
                'title'      => '文章编号标题',
                'default'    => '资源编号',
            ),
            array(
                'id'         => 'ceoshop_single_ts',
                'type'       => 'text',
                'title'      => '资源信息提示',
                'default'    => '当前信息若含有黄赌毒等违法违规不良内容，请点此举报！',
            ),
            //中部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块1设置 - 中部设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_single_jianjie',
                'type'    => 'switcher',
                'title'   => '简介宣传模块',
                'default' => true,
            ),
            array(
                'id'           => 'ceoshop_single_jianjie_img',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'         => 'upload',
                'title'        => '宣传模块背景图设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-back.png',
            ),
            array(
                'id'         => 'ceoshop_single_jianjie_title',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'       => 'text',
                'title'      => '宣传标题',
                'default'    => '郑重承诺',
            ),
            array(
                'id'         => 'ceoshop_single_jianjie_title2',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'       => 'text',
                'title'      => '宣传副标题',
                'default'    => '总裁主题提供安全交易、信息保真!',
            ),
            array(
                'id'         => 'ceoshop_single_jianjie_title_y',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'       => 'text',
                'title'      => '右侧按钮标题',
                'default'    => '升级会员',
            ),
            array(
                'id'         => 'ceoshop_single_jianjie_title_i',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'       => 'text',
                'title'      => '右侧按钮图标',
                'default'    => 'ceoicon-vip-crown-2-line',
                'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
            ),
            array(
                'id'         => 'ceoshop_single_jianjie_title_l',
                'dependency' => array('ceoshop_single_jianjie', '==', true),
                'type'       => 'text',
                'title'      => '右侧按钮链接',
                'default'    => '/vip',
            ),
            //增值服务设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块1设置 - 增值服务设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            //增值服务
            array(
                'id'      => 'ceoshop_1_zz',
                'type'    => 'switcher',
                'title'   => '增值服务',
                'desc'    => '开启或关闭底部增值服务',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_1_zz_title',
                'dependency' => array('ceoshop_1_zz', '==', true),
                'type'    => 'text',
                'title'   => '增值服务标题',
                'default' => '增值服务',
            ),
            array(
                'id'         => 'ceoshop_1_zz_sz',
                'type'       => 'repeater',
                'dependency' => array('ceoshop_1_zz', '==', true),
                'title'      => '自定义按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '服务标题',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块1设置 - 按钮设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'         => 'ceoshop_single_an_bt',
                'type'       => 'text',
                'title'      => '价格右侧说明标题',
                'default'    => '开通VIP尊享优惠特权',
            ),
            array(
                'id'         => 'ceoshop_single_an_zdy',
                'type'       => 'repeater',
                'max'        => '3',
                'title'      => '自定义按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_single_an_zdy_tb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default'    => 'ceoicon-vip-crown-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_zdy_bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                    ),
                    array(
                        'id'      => 'ceoshop_single_an_zdy_lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
            //商城样式1内容模块
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块1设置 - 内容模块设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_1_content_top',
                'type'    => 'switcher',
                'title'   => '内容顶部快捷导航',
                'desc'    => '开启或关闭内容顶部快捷导航（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_1_content_xq',
                'type'    => 'switcher',
                'title'   => '内容详情介绍标题',
                'desc'    => '开启或关闭内容详情介绍标题（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
        )
    ));
    //商城样式2
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式2设置【侧栏样式】',
        'fields' => array(
            //商家模块
            array(
                'id'      => 'ceoshop_2_shangjia',
                'type'    => 'switcher',
                'title'   => '商家作者模块',
                'desc'    => '商家模块总开关（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
            //下载框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块2设置 - 下载框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_2_xiazai_jg',
                'type'    => 'switcher',
                'title'   => '价格 / 下载权限',
                'desc'    => '是否显示价格 / 下载权限文字',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_2_xiazai_dzsc',
                'type'    => 'switcher',
                'title'   => '点赞 / 收藏',
                'desc'    => '是否显示点赞 / 收藏按钮',
                'default' => true,
            ),

            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块2设置 - 信息属性框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_2_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_2_shuxing_bhbt',
                'dependency' => array('ceoshop_2_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_2_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_2_shuxing_gxbt',
                'dependency' => array('ceoshop_2_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
            array(
                'id'      => 'ceoshop_2_shuxing_lx',
                'type'    => 'switcher',
                'title'   => '底部信息',
                'desc'    => '开启或关闭底部信息',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_2_shuxing_lx_sz',
                'dependency' => array('ceoshop_2_shuxing_lx', '==', true),
                'type'       => 'fieldset',
                'title'      => '底部信息设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_zbt',
                        'type'    => 'text',
                        'title'   => '左侧标题',
                        'default' => '下载不了？',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_anbt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '点击提交错误',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_antb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_anlj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_xzxz',
                        'type'    => 'text',
                        'title'   => '下载须知标题',
                        'default' => '下载须知',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_xztb',
                        'type'    => 'text',
                        'title'   => '下载须知图标',
                        'default' => 'ceoicon-information-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_2_shuxing_lx_xznr',
                        'type'    => 'text',
                        'title'   => '下载须知内容',
                        'default' => '任何单位或个人认为本网页内容可能涉嫌侵犯其合法权益，请及时和客服联系。本站将会第一时间移除相关涉嫌侵权的内容。本站关于用户或其发布的相关内容均由用户自行提供，用户依法应对其提供的任何信息承担全部责任，本站不对此承担任何法律责任。',
                    ),
                ),
            ),
        )
    ));
    //商城样式3
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式3设置【左栏样式】',
        'fields' => array(
            array(
                'id'      => 'ceoshop_3_bg',
                'type'    => 'switcher',
                'title'   => '模块背景图',
                'desc'    => '是否显示模块背景图',
                'default' => true,
            ),
            array(
                'id'           => 'ceoshop_3_bg_img',
                'dependency' => array('ceoshop_3_bg', '==', true),
                'type'         => 'upload',
                'title'        => '模块背景图设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-shop3-bg.png',
            ),
            //商家模块
            array(
                'id'      => 'ceoshop_3_shangjia',
                'type'    => 'switcher',
                'title'   => '商家作者模块',
                'desc'    => '商家模块总开关（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
            //下载框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块3设置 - 按钮设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_3_anniu_dzsc',
                'type'    => 'switcher',
                'title'   => '点赞 / 收藏',
                'desc'    => '是否显示点赞 / 收藏按钮',
                'default' => true,
            ),

            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块3设置 - 信息属性框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_3_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_3_shuxing_bhbt',
                'dependency' => array('ceoshop_3_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_3_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_3_shuxing_gxbt',
                'dependency' => array('ceoshop_3_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
            //右侧提示语
            array(
                'id'      => 'ceoshop_3_y',
                'type'    => 'switcher',
                'title'   => '右侧提示语',
                'desc'    => '开启或关闭右侧提示语',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_3_ys',
                'dependency' => array('ceoshop_3_y', '==', true),
                'type'    => 'text',
                'title'   => '提示语内容',
                'default' => '下载不了？请联系网站客服提交链接错误！',
            ),
            //底部增值服务设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块3设置 - 底部增值服务设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            //增值服务
            array(
                'id'      => 'ceoshop_3_zz',
                'type'    => 'switcher',
                'title'   => '增值服务',
                'desc'    => '开启或关闭底部增值服务',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_3_zz_title',
                'dependency' => array('ceoshop_3_zz', '==', true),
                'type'    => 'text',
                'title'   => '增值服务标题',
                'default' => '增值服务',
            ),
            array(
                'id'         => 'ceoshop_3_zz_sz',
                'type'       => 'repeater',
                'dependency' => array('ceoshop_3_zz', '==', true),
                'title'      => '自定义按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '服务标题',
                    ),
                ),
            ),

            //商城样式3内容模块
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块3设置 - 内容模块设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_3_content_top',
                'type'    => 'switcher',
                'title'   => '内容顶部快捷导航',
                'desc'    => '开启或关闭内容顶部快捷导航（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
        )
    ));
    //商城样式4
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式4设置【全宽样式】',
        'fields' => array(

            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块4设置 - 基本设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_4_bg',
                'type'    => 'switcher',
                'title'   => '模块背景图',
                'desc'    => '是否显示模块背景图',
                'default' => true,
            ),
            array(
                'id'           => 'ceoshop_4_bg_img',
                'dependency' => array('ceoshop_4_bg', '==', true),
                'type'         => 'upload',
                'title'        => '模块背景图设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-shop4-bg.jpg',
            ),
            array(
                'id'      => 'ceoshop_4_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_4_shuxing_bhbt',
                'dependency' => array('ceoshop_4_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_4_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_4_shuxing_gxbt',
                'dependency' => array('ceoshop_4_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
            //底部增值服务设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块4设置 - 底部增值服务设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            //增值服务
            array(
                'id'      => 'ceoshop_4_zz',
                'type'    => 'switcher',
                'title'   => '增值服务',
                'desc'    => '开启或关闭底部增值服务/右侧提示语（建议开启）',
                'default' => true,
            ),
            //右侧提示语
            array(
                'id'      => 'ceoshop_4_ys',
                'dependency' => array('ceoshop_4_zz', '==', true),
                'type'    => 'text',
                'title'   => '右侧提示语',
                'default' => '下载不了？请联系网站客服提交链接错误！',
            ),
            array(
                'id'      => 'ceoshop_4_zz_title',
                'dependency' => array('ceoshop_4_zz', '==', true),
                'type'    => 'text',
                'title'   => '增值服务标题',
                'default' => '增值服务',
            ),
            array(
                'id'         => 'ceoshop_4_zz_sz',
                'type'       => 'repeater',
                'dependency' => array('ceoshop_4_zz', '==', true),
                'title'      => '自定义按钮设置',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '服务标题',
                    ),
                ),
            ),

            //商城样式4内容模块
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块4设置 - 内容模块设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_4_content_top',
                'type'    => 'switcher',
                'title'   => '内容顶部快捷导航',
                'desc'    => '开启或关闭内容顶部快捷导航（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_4_content_xq',
                'type'    => 'switcher',
                'title'   => '内容页详情介绍标题',
                'desc'    => '开启或关闭内容页详情介绍标题（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
        )
    ));
    //商城样式5
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式5设置【视频样式】',
        'fields' => array(
            //视频列表模块
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块 - 视频列表模块设置',
            ),
            //广告图片
            array(
                'id'      => 'ceoshop_5_ggtp',
                'type'    => 'switcher',
                'title'   => '开启/关闭广告图片',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_5_ggtp_lj',
                'dependency'   => array('ceoshop_5_ggtp', '==', 'true'),
                'type'    => 'text',
                'title'   => '按钮链接',
            ),
            array(
                'id'           => 'ceoshop_5_ggtp_k',
                'type'         => 'upload',
                'title'        => '广告图片',
                'dependency'   => array('ceoshop_5_ggtp', '==', 'true'),
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-xxgg.png',
            ),
            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块5设置 - 信息属性框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_5_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_5_shuxing_bhbt',
                'dependency' => array('ceoshop_5_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_5_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_5_shuxing_gxbt',
                'dependency' => array('ceoshop_5_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
        )
    ));
    //商城样式6
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式6设置【相册样式】',
        'fields' => array(
            //商家模块
            array(
                'id'      => 'ceoshop_6_shangjia',
                'type'    => 'switcher',
                'title'   => '商家作者模块',
                'desc'    => '商家模块总开关（开启则显示，关闭则隐藏模块）',
                'default' => false,
            ),
            //下载框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块6设置 - 下载框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_6_xiazai_jg',
                'type'    => 'switcher',
                'title'   => '价格 / 下载权限',
                'desc'    => '是否显示价格 / 下载权限文字',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_6_xiazai_dzsc',
                'type'    => 'switcher',
                'title'   => '点赞 / 收藏',
                'desc'    => '是否显示点赞 / 收藏按钮',
                'default' => true,
            ),

            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块6设置 - 信息属性框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_bhbt',
                'dependency' => array('ceoshop_6_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_fbl',
                'type'    => 'switcher',
                'title'   => '电脑分辨率',
                'desc'    => '是否显示电脑分辨率（自动判断用户电脑分辨率）',
                'default' => false,
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_fblbt',
                'dependency' => array('ceoshop_6_shuxing_fbl', '==', true),
                'type'    => 'text',
                'title'   => '电脑分辨率标题',
                'default' => '您的电脑分辨率',
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_gxbt',
                'dependency' => array('ceoshop_6_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
            //广告设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块6设置 - 广告设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_6_shuxing_ads',
                'type'    => 'switcher',
                'title'   => '模块底部广告',
                'default' => false,
            ),
            array(
                'id'         => 'ceoshop_6_shuxing_ads_link',
                'type'       => 'text',
                'dependency' => array('ceoshop_6_shuxing_ads', '==', true),
                'title'      => '广告链接',
            ),
            array(
                'id'           => 'ceoshop_6_shuxing_ads_img',
                'type'         => 'upload',
                'dependency'   => array('ceoshop_6_shuxing_ads', '==', true),
                'title'        => '广告图片',
                'desc'         => '广告尺寸：宽307px * 高50px',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
            ),
        )
    ));
    //商城样式7
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_mall',
        'title'  => '商城样式7设置【阅读样式】',
        'fields' => array(
            //商家模块
            array(
                'id'      => 'ceoshop_7_shangjia',
                'type'    => 'switcher',
                'title'   => '商家作者模块',
                'desc'    => '商家模块总开关（开启则显示，关闭则隐藏模块）',
                'default' => true,
            ),
            //信息属性框设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '商城模块7设置 - 信息属性框设置 （以下开关开启则显示功能，关闭则隐藏功能）',
            ),
            array(
                'id'      => 'ceoshop_7_shuxing_bh',
                'type'    => 'switcher',
                'title'   => '资源编号',
                'desc'    => '是否显示资源编号（默认编号是文章的ID）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_7_shuxing_bhbt',
                'dependency' => array('ceoshop_7_shuxing_bh', '==', true),
                'type'    => 'text',
                'title'   => '资源编号标题',
                'default' => '资源编号',
            ),
            array(
                'id'      => 'ceoshop_7_shuxing_gx',
                'type'    => 'switcher',
                'title'   => '最近更新',
                'desc'    => '是否显示最近更新时间（最近更新时间是最后编辑的时间）',
                'default' => true,
            ),
            array(
                'id'      => 'ceoshop_7_shuxing_gxbt',
                'dependency' => array('ceoshop_7_shuxing_gx', '==', true),
                'type'    => 'text',
                'title'   => '最近更新标题',
                'default' => '最近更新',
            ),
            array(
                'id'      => 'ceoshop_7_shuxing_lx',
                'type'    => 'switcher',
                'title'   => '底部信息',
                'desc'    => '开启或关闭底部信息',
                'default' => true,
            ),
            array(
                'id'         => 'ceoshop_7_shuxing_lx_sz',
                'dependency' => array('ceoshop_7_shuxing_lx', '==', true),
                'type'       => 'fieldset',
                'title'      => '底部信息设置',
                'fields'     => array(
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_zbt',
                        'type'    => 'text',
                        'title'   => '左侧标题',
                        'default' => '下载不了？',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_anbt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '点击提交错误',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_antb',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_anlj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_xzxz',
                        'type'    => 'text',
                        'title'   => '下载须知标题',
                        'default' => '下载须知',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_xztb',
                        'type'    => 'text',
                        'title'   => '下载须知图标',
                        'default' => 'ceoicon-information-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceoshop_7_shuxing_lx_xznr',
                        'type'    => 'text',
                        'title'   => '下载须知内容',
                        'default' => '任何单位或个人认为本网页内容可能涉嫌侵犯其合法权益，请及时和客服联系。本站将会第一时间移除相关涉嫌侵权的内容。本站关于用户或其发布的相关内容均由用户自行提供，用户依法应对其提供的任何信息承担全部责任，本站不对此承担任何法律责任。',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_side',
        'icon'  => 'fa fa-th-list',
        'title' => '右侧边栏',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '模块布局',
        'fields' => array(
            array(
                'id'      => 'side_title_style',
                'type'    => 'switcher',
                'title'   => '开启/关闭侧边栏模块标题样式',
                'default' => true,
            ),
            array(
                'id'      => 'sidebar_layout',
                'type'    => 'sorter',
                'title'   => '侧边栏模块布局拖拽设置',
                'default' => array(
                    'enabled'  => array(
                        'author'  => '作者模块',
                        'helper'  => '加群模块',
                        'article' => '热门文章',
                        'comment' => '最新评论',
                    ),
                    'disabled' => array(
                        'tags' => '热门标签',
                        'ad'  => '广告模块',
                        'slide'  => '轮播模块',
                        'double'  => '双栏模块',
                    ),
                ),
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '作者模块',
        'fields' => array(
            array(
                'id'      => 'side_author_lx',
                'type'    => 'switcher',
                'title'   => '作者联系方式',
                'desc'    => '隐藏/显示作者联系方式（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'side_author_lxsz',
                'dependency' => array('side_author_lx', '==', true),
                'type'       => 'fieldset',
                'title'      => '作者联系方式设置',
                'fields'     => array(
                    array(
                        'id'      => 'author_lx_qq',
                        'type'    => 'text',
                        'title'   => 'QQ按钮标题',
                        'default' => 'QQ',
                    ),
                    array(
                        'id'      => 'author_lx_qqtb',
                        'type'    => 'text',
                        'title'   => 'QQ按钮图标',
                        'default' => 'ceoicon-qq-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'author_lx_wx',
                        'type'    => 'text',
                        'title'   => '微信按钮标题',
                        'default' => '微信',
                    ),
                    array(
                        'id'      => 'author_lx_wxtb',
                        'type'    => 'text',
                        'title'   => '微信按钮图标',
                        'default' => 'ceoicon-wechat-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'author_lx_wb',
                        'type'    => 'text',
                        'title'   => '微博按钮标题',
                        'default' => '微博',
                    ),
                    array(
                        'id'      => 'author_lx_wbtb',
                        'type'    => 'text',
                        'title'   => '微博按钮图标',
                        'default' => 'ceoicon-weibo-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                ),
            ),
            array(
                'id'      => 'side_author_gzsx',
                'type'    => 'switcher',
                'title'   => '关注/私信功能',
                'desc'    => '隐藏/显示关注/私信按钮（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'side_author_statistics',
                'type'    => 'switcher',
                'title'   => '作者数据统计',
                'desc'    => '隐藏/显示作者数据统计（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'side_author_latest',
                'type'    => 'switcher',
                'title'   => '作者文章动态',
                'desc'    => '隐藏/显示作者文章动态（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'side_author_latest_title',
                'type'       => 'text',
                'dependency' => array('side_author_latest', '==', 'true'),
                'title'      => '修改标题',
                'default'    => 'TA的动态'
            ),
            array(
                'id'         => 'side_author_latest_num',
                'type'       => 'text',
                'dependency' => array('side_author_latest', '==', 'true'),
                'title'      => '文章数量',
                'default'    => 5
            ),
            array(
                'id'      => 'side_author_date',
                'type'    => 'switcher',
                'title'   => '动态文章发布日期',
                'dependency' => array('side_author_latest', '==', 'true'),
                'default' => true,
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '加群模块',
        'fields' => array(
            array(
                'id'      => 'side_helper_title',
                'type'    => 'text',
                'title'   => '标题',
                'default' => '总裁主题'
            ),
            array(
                'id'      => 'side_helper_content',
                'type'    => 'textarea',
                'title'   => '内容',
                'default' => '分享最新WordPress教程共同学习，共同进步，共同成长！'
            ),
            array(
                'id'      => 'side_helper_btn',
                'type'    => 'text',
                'title'   => '按钮文字',
                'default' => 'QQ交流群'
            ),
            array(
                'id'           => 'side_helper_bg',
                'type'         => 'upload',
                'title'        => '背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-qun.png',
                'desc'         => '不建议更改此图'
            ),

            array(
                'id'     => 'side_helper_modal',
                'type'   => 'fieldset',
                'title'  => '加群弹窗内容设置',
                'fields' => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '弹窗标题',
                        'default' => 'QQ交流群'
                    ),
                    array(
                        'id'      => 'content',
                        'type'    => 'textarea',
                        'title'   => '弹窗内容',
                        'default' => '您的支持，是我们最大的动力！',
                        'desc'    => '前往<a href="https://qun.qq.com/join.html" target="_blank">QQ群官网</a>获取加群组件代码，并将完整组件代码粘贴在此'
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '热门文章',
        'fields' => array(
            array(
                'id'      => 'side_art_title',
                'type'    => 'text',
                'title'   => '修改标题',
                'default' => '热门文章'
            ),
            array(
                'id'      => 'side_art_num',
                'type'    => 'text',
                'title'   => '文章数量',
                'default' => 5
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '热门评论',
        'fields' => array(
            array(
                'id'      => 'side_comment_title',
                'type'    => 'text',
                'title'   => '修改标题',
                'default' => '热门评论'
            ),
            array(
                'id'      => 'side_comment_num',
                'type'    => 'text',
                'title'   => '文章数量',
                'default' => 5
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '热门标签',
        'fields' => array(
            array(
                'id'      => 'side_tag_title',
                'type'    => 'text',
                'title'   => '修改标题',
                'default' => '热门标签'
            ),
            array(
                'id'      => 'side_tag_num',
                'type'    => 'text',
                'title'   => '标签数量',
                'default' => 20
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '双栏模块',
        'fields' => array(
            array(
                'id'      => 'side_double_title',
                'type'    => 'text',
                'title'   => '修改标题',
                'default' => '随机推荐'
            ),
            array(
                'id'      => 'side_double_num',
                'type'    => 'text',
                'title'   => '文章数量',
                'default' => 6
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '广告模块',
        'fields' => array(
            array(
                'id'     => 'side_ad',
                'type'   => 'repeater',
                'title'  => '侧边栏广告',
                'fields' => array(
                    array(
                        'id'      => 'img',
                        'type'    => 'upload',
                        'title'   => '广告图片',
                        'default' => get_template_directory_uri() . '/static/images/ceomax.png',
                    ),
                    array(
                        'id'    => 'url',
                        'type'  => 'text',
                        'title' => '图片链接',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '广告标题',
                    ),
                    array(
                        'id'    => 'date',
                        'type'  => 'date',
                        'title' => '到期时间',
                        'settings' => array(
                        'dateFormat' => 'yy/mm/dd'
                      ),
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_side',
        'title'  => '轮播模块',
        'fields' => array(
            array(
            'id' => 'side_slide',
            'type' => 'repeater',
            'title' => '轮播图广告设置',
            'fields'    => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '图片',
                        'desc'		 => '上传图片',
                        'library'      => 'image',
                        'placeholder'  => 'https://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default' => get_template_directory_uri() . '/static/images/ceomax.png',
                    ),
                    array(
                        'id' => 'link',
                        'type' => 'text',
                        'title' => '链接',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '广告标题',
                    ),
                    array(
                        'id'    => 'date',
                        'type'  => 'date',
                        'title' => '到期时间',
                        'settings' => array(
                        'dateFormat' => 'yy/mm/dd'
                      ),
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_page',
        'icon'  => 'fa fa-window-restore',
        'title' => '单页设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '单页基本设置',
        'fields' => array(
            //默认页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '默认页面设置',
            ),
            array(
                'id'      => 'ceo_moren',
                'type'    => 'switcher',
                'title'   => '默认页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示默认页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'moren_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_moren', '==', 'true'),
                'title'        => '默认页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'moren_title',
                'type'       => 'text',
                'dependency' => array('ceo_moren', '==', 'true'),
                'title'      => '默认页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '默认所有页面标题下的副标题（为空则不显示）',
            ),
            //投稿页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '投稿页面设置',
            ),
            array(
                'id'      => 'ceo_tougao',
                'type'    => 'switcher',
                'title'   => '投稿页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示投稿页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'tougao_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_tougao', '==', 'true'),
                'title'        => '投稿页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'tougao_title',
                'type'       => 'text',
                'dependency' => array('ceo_tougao', '==', 'true'),
                'title'      => '投稿页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '投稿所有页面标题下的副标题（为空则不显示）',
            ),
            //存档页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '存档页面设置',
            ),
            array(
                'id'      => 'ceo_archives',
                'type'    => 'switcher',
                'title'   => '存档页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示存档页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'archives_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_archives', '==', 'true'),
                'title'        => '存档页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'archives_title',
                'type'       => 'text',
                'dependency' => array('ceo_archives', '==', 'true'),
                'title'      => '存档页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '存档页面标题下的副标题（为空则不显示）',
            ),
            array(
                'id'      => 'archives_postnum',
                'type'    => 'text',
                'title'   => '存档页面显示数量',
                'dsec'    => '存档页面显示的文章数量',
                'default' => '99',
            ),
            //全站资源页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '全站资源页面设置',
            ),
            array(
                'id'      => 'ceo_ziyuan',
                'type'    => 'switcher',
                'title'   => '全站资源页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示申请全站资源页面模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'ziyuan_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_ziyuan', '==', 'true'),
                'title'        => '全站资源页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'ziyuan_title',
                'type'       => 'text',
                'dependency' => array('ceo_ziyuan', '==', 'true'),
                'title'      => '全站资源页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '全站资源页面标题下的副标题（为空则不显示）',
            ),
            //申请页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '申请页面设置',
            ),
            array(
                'id'      => 'ceo_apply',
                'type'    => 'switcher',
                'title'   => '申请页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示申请页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'apply_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_apply', '==', 'true'),
                'title'        => '申请页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'apply_title',
                'type'       => 'text',
                'dependency' => array('ceo_apply', '==', 'true'),
                'title'      => '申请页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '申请页面标题下的副标题（为空则不显示）',
            ),
            //公告页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '公告页面设置',
            ),
            array(
                'id'      => 'ceo_gonggao',
                'type'    => 'switcher',
                'title'   => '公告页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示公告页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'gonggao_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_gonggao', '==', 'true'),
                'title'        => '公告页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'gonggao_title',
                'type'       => 'text',
                'dependency' => array('ceo_gonggao', '==', 'true'),
                'title'      => '公告页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '公告页面标题下的副标题（为空则不显示）',
            ),
            //标签页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '标签页面设置',
            ),
            array(
                'id'      => 'ceo_tags',
                'type'    => 'switcher',
                'title'   => '标签页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示标签页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'tags_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_tags', '==', 'true'),
                'title'        => '标签页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'tags_title',
                'type'       => 'text',
                'dependency' => array('ceo_tags', '==', 'true'),
                'title'      => '标签页面副标题',
                'default'    => '汇集用户喜欢的热门标签大全',
                'desc'       => '标签页面标题下的副标题（为空则不显示）',
            ),
            //找回密码页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '找回密码页面设置',
            ),
            array(
                'id'      => 'ceo_retrieve_password',
                'type'    => 'switcher',
                'title'   => '找回密码页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示找回密码页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'password_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_retrieve_password', '==', 'true'),
                'title'        => '找回密码页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'password_title',
                'type'       => 'text',
                'dependency' => array('ceo_retrieve_password', '==', 'true'),
                'title'      => '找回密码页面副标题',
                'default'    => '快速找回密码',
                'desc'       => '找回密码页面标题下的副标题（为空则不显示）',
            ),
            //单页合集页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '单页合集页面设置',
            ),
            array(
                'id'      => 'ceo_heji',
                'type'    => 'switcher',
                'title'   => '单页合集页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示单页合集页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'heji_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_heji', '==', 'true'),
                'title'        => '单页合集页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'heji_title',
                'type'       => 'text',
                'dependency' => array('ceo_heji', '==', 'true'),
                'title'      => '单页合集页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '单页合集所有页面标题下的副标题（为空则不显示）',
            ),
            //友情链接页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '友情链接页面设置',
            ),
            array(
                'id'      => 'ceo_link',
                'type'    => 'switcher',
                'title'   => '友情链接页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示友情链接页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'ceo_link_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_link', '==', 'true'),
                'title'        => '友情链接页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'ceo_link_title',
                'type'       => 'text',
                'dependency' => array('ceo_link', '==', 'true'),
                'title'      => '友情链接页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '友情链接页面标题下的副标题（为空则不显示）',
            ),

            //网址导航
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '网址导航设置',
            ),
            array(
                'id'           => 'sitenav_bg',
                'type'         => 'upload',
                'title'        => '网址导航头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-site.jpg',
            ),
            array(
                'id'      => 'ceo_sitenav_hot_switch',
                'type'    => 'switcher',
                'title'   => '最新网站模块',
                'default' => true,
                'desc'    => '隐藏/显示最新网站模块（开启则显示，关闭则隐藏）',
            ),
            //网址提交
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '网址提交设置',
            ),
            array(
                'id'      => 'ceo_sitesubmit',
                'type'    => 'switcher',
                'title'   => '网址提交头部设置',
                'default' => true,
                'desc'    => '隐藏/显示网址提交头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'ceo_sitesubmit_sz',
                'type'       => 'fieldset',
                'title'      => '网址提交头部设置',
                'dependency' => array('ceo_sitesubmit', '==', true),
                'fields'     => array(
                    array(
                        'id'           => 'sitesubmit_bg',
                        'type'         => 'upload',
                        'title'        => '网址提交头部背景图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
                    ),
                    array(
                        'id'      => 'sitesubmit_title',
                        'type'    => 'text',
                        'title'   => '网址提交副标题',
                        'default' => '站长界优秀网站导航，免费网站提交',
                        'desc'    => '网址提交标题下的副标题（为空则不显示）',
                    ),
                ),
            ),
            //提交框设置
            array(
                'id'     => 'ceo_sitesubmit_bt_sz',
                'type'   => 'fieldset',
                'title'  => '提交框设置',
                'fields' => array(
                    array(
                        'id'      => 'sitesubmit_a_title',
                        'type'    => 'text',
                        'title'   => '提交框标题',
                        'default' => '网址提交',
                    ),
                    array(
                        'id'      => 'sitesubmit_b_title',
                        'type'    => 'text',
                        'title'   => '提交框副标题',
                        'default' => '认真填写内容我们会为您加快审核~',
                        'desc'    => '提交框标题下的副标题',
                    ),
                ),
            ),
            //收录说明设置
            array(
                'id'      => 'sitesubmit_c_title',
                'type'    => 'text',
                'title'   => '收录说明',
                'default' => '欢迎优质网站提交收录，本站免费收录，提交后需后台审核，请勿重复提交。',
            ),
            array(
                'id'     => 'sitesubmit_b',
                'type'   => 'fieldset',
                'title'  => '收录说明内容',
                'fields' => array(
                    array(
                        'id'      => 'sitesubmit_b_a1',
                        'type'    => 'text',
                        'title'   => '①说明标题',
                        'default' => '申请网站收录须知'
                    ),
                    array(
                        'id'      => 'sitesubmit_b_a2',
                        'type'    => 'textarea',
                        'title'   => '①说明内容',
                        'default' => '<p>① 申请前请先加上本站链接；</p><p>② 本导航站不收录违法违规站点；</p><p>③ 稳定更新，每月至少发布1篇文章，最好是建站半年以上；</p><p>④禁止一切产品营销、广告联盟类型的网站，优先通过同类原创、内容相近的网站；</p>'
                    ),
                    array(
                        'id'      => 'sitesubmit_b_a3',
                        'type'    => 'text',
                        'title'   => '②说明标题',
                        'default' => '本站链接信息'
                    ),
                    array(
                        'id'      => 'sitesubmit_b_a4',
                        'type'    => 'textarea',
                        'title'   => '②说明内容',
                        'default' => '<p>名称：总裁主题</p><p>网址：https://www.ceotheme.com/</p><p>描述：CeoTheme总裁主题是国内优秀的WordPress主题开发团队， 超过6年开发经验，专注WordPress主题开发建站， UI设计,seo等服务；并提供有保障的维护及售后</p>'
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '会员页面设置',
        'fields' => array(
            array(
                'id'           => 'vip_top_img',
                'type'         => 'upload',
                'title'        => '背景图片设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/vip-banner.png',
            ),
            //VIP超级特权
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VIP超级特权模块设置',
            ),
            array(
                'id'      => 'ceo_pages_vip_cj',
                'type'    => 'switcher',
                'title'   => 'VIP超级特权模块',
                'default' => true,
                'desc'    => '隐藏/显示VIP超级特权模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'vip_cjtq',
                'type'       => 'text',
                'title'      => '模块标题',
                'default'    => 'VIP超级特权',
                'dependency' => array('ceo_pages_vip_cj', '==', true),
            ),
            array(
                'id'         => 'vip_cjtq_sz',
                'type'       => 'fieldset',
                'title'      => 'VIP超级特权模块设置',
                'dependency' => array('ceo_pages_vip_cj', '==', true),
                'fields'     => array(
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块1设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_1',
                        'type'    => 'upload',
                        'title'   => '图片1',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-01.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_1',
                        'type'    => 'text',
                        'title'   => '标题1',
                        'default' => '全站优选',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_1',
                        'type'    => 'text',
                        'title'   => '内容1',
                        'default' => '五层审核，层层把关作品质量',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块2设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_2',
                        'type'    => 'upload',
                        'title'   => '图片2',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-02.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_2',
                        'type'    => 'text',
                        'title'   => '标题2',
                        'default' => '极速下载',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_2',
                        'type'    => 'text',
                        'title'   => '内容2',
                        'default' => 'VIP专享极速通道，下载提高100倍',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块3设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_3',
                        'type'    => 'upload',
                        'title'   => '图片3',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-03.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_3',
                        'type'    => 'text',
                        'title'   => '标题3',
                        'default' => '畅享无限',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_3',
                        'type'    => 'text',
                        'title'   => '内容3',
                        'default' => '更多内容，随时随地无限任意下载',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块4设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_4',
                        'type'    => 'upload',
                        'title'   => '图片4',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-04.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_4',
                        'type'    => 'text',
                        'title'   => '标题4',
                        'default' => '优享新品',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_4',
                        'type'    => 'text',
                        'title'   => '内容4',
                        'default' => '优先下载最新作品，比别人先一步',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块5设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_5',
                        'type'    => 'upload',
                        'title'   => '图片5',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-05.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_5',
                        'type'    => 'text',
                        'title'   => '标题5',
                        'default' => '海量内容',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_5',
                        'type'    => 'text',
                        'title'   => '内容5',
                        'default' => '112万精选作品，满足任何使用场景',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块6设置',
                    ),
                    array(
                        'id'      => 'vip_cjtq_img_6',
                        'type'    => 'upload',
                        'title'   => '图片6',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-06.png',
                    ),
                    array(
                        'id'      => 'vip_cjtq_bt_6',
                        'type'    => 'text',
                        'title'   => '标题6',
                        'default' => '专属客服',
                    ),
                    array(
                        'id'      => 'vip_cjtq_txt_6',
                        'type'    => 'text',
                        'title'   => '内容6',
                        'default' => '属于你的1对1客服，即时响应',
                    ),
                ),
            ),
            //VIP超级特权
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VIP套餐模块设置',
            ),
            array(
                'id'      => 'ceo_pages_vip_tc',
                'type'    => 'switcher',
                'title'   => 'VIP套餐模块',
                'default' => true,
                'desc'    => '隐藏/显示VIP套餐模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'vip_tc',
                'type'       => 'text',
                'title'      => '模块标题',
                'default'    => 'VIP套餐',
                'dependency' => array('ceo_pages_vip_tc', '==', true),
            ),
            //VIP会员特权服务
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VIP会员特权服务模块设置',
            ),
            array(
                'id'      => 'ceo_pages_vip_tq',
                'type'    => 'switcher',
                'title'   => 'VIP会员特权服务模块',
                'default' => true,
                'desc'    => '隐藏/显示VIP会员特权服务模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'vip_tq',
                'type'       => 'text',
                'title'      => '模块标题',
                'default'    => 'VIP会员特权服务',
                'dependency' => array('ceo_pages_vip_tq', '==', true),
            ),
            array(
                'id'         => 'vip_tq_sz',
                'type'       => 'fieldset',
                'title'      => 'VIP会员特权服务模块设置',
                'dependency' => array('ceo_pages_vip_tq', '==', true),
                'fields'     => array(
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块1设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_1',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve1.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_1',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '全站免费 任意下载',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_1',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '全站照片、视频、合成、模板、动图、元素、办公文档、插画等均可任意下载',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块2设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_2',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve2.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_2',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '专属客服快速响应',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_2',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '企业VIP专属客服通道，随时随地为您解决遇到的各项问题',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块3设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_3',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve3.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_3',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '多人协作 云端共享',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_3',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '最高可15人同时团队协作云端共享，满足企业团队工作需求',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块4设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_4',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve4.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_4',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '企业发票 报销无忧',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_4',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '摄图网为企业VIP提供增值税发票，在线申请，为企业报销提供便捷服务',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块5设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_5',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve5.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_5',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '版权保障 商用无忧',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_5',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '摄图网对全站所有素材均拥有版权，模特均已获得肖像权授权',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块6设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_6',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve6.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_6',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '授权证书 在线获取',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_6',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '在线生成授权证书，并下载本地保存，不受时间、次数限制',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块7设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_7',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve7.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_7',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => 'VRF授权 企业商用',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_7',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => 'VRF授权模板，用户下载后使用不会引起版权纠纷',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '模块8设置',
                    ),
                    array(
                        'id'      => 'vip_tq_img_8',
                        'type'    => 'upload',
                        'title'   => '图片',
                        'default' => get_template_directory_uri() . '/static/images/yuvip_serve8.jpg',
                    ),
                    array(
                        'id'      => 'vip_tq_bt_8',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '企业用户专属认证',
                    ),
                    array(
                        'id'      => 'vip_tq_txt_8',
                        'type'    => 'text',
                        'title'   => '内容',
                        'default' => '企业用户认证备案授权，如因版权问题对贵公司造成损失，最高全额赔付',
                    ),
                ),
            ),
            //VIP会员点评
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VIP会员点评模块设置',
            ),
            array(
                'id'      => 'ceo_pages_vip_dp',
                'type'    => 'switcher',
                'title'   => '会员点评模块',
                'default' => true,
                'desc'    => '隐藏/显示会员点评模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'vip_dp',
                'type'       => 'text',
                'title'      => '模块标题',
                'default'    => '会员点评',
                'dependency' => array('ceo_pages_vip_dp', '==', true),
            ),
            array(
                'id'         => 'vip_dp_sz',
                'type'       => 'repeater',
                'title'      => '会员点评设置',
                'dependency' => array('ceo_pages_vip_dp', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'img',
                        'type'    => 'upload',
                        'title'   => '头像',
                        'default' => get_template_directory_uri() . '/static/images/vipuser.jpg',
                    ),
                    array(
                        'id'      => 'bt',
                        'type'    => 'text',
                        'title'   => '昵称',
                        'default' => '总裁'
                    ),
                    array(
                        'id'      => 'pj',
                        'type'    => 'text',
                        'title'   => '评价',
                        'default' => '加入总裁主题两年多，从小白到熟练使用Linux，Vim和Git，还用Python实现了很多有趣的项目。会员算是监督，在更好的课程中收获更多。'
                    ),
                ),
            ),
            //VIP底部模块
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VIP底部模块设置',
            ),
            array(
                'id'      => 'ceo_pages_vip_db',
                'type'    => 'switcher',
                'title'   => 'VIP底部模块',
                'default' => true,
                'desc'    => '隐藏/显示VIP底部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'         => 'vip_db_sz',
                'type'       => 'fieldset',
                'title'      => 'VIP底部模块设置',
                'dependency' => array('ceo_pages_vip_db', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'vip_db_img',
                        'type'    => 'upload',
                        'title'   => '背景图',
                        'default' => get_template_directory_uri() . '/static/images/bg.jpg',
                    ),
                    array(
                        'id'      => 'vip_db_bt',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '加入VIP，精品学习课程随心学！'
                    ),
                    array(
                        'id'      => 'vip_db_txt',
                        'type'    => 'text',
                        'title'   => '描述',
                        'default' => '数以万计的平面设计 / 后台程序 / UI kits / 视频 /运维大数据，让您在各个学科领域身手敏捷，出奇制胜！'
                    ),

                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '会员页面【2】设置',
        'fields' => array(
            array(
                'id'           => 'vip2_top_img',
                'type'         => 'upload',
                'title'        => '背景图片设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/vip2_bg.png',
            ),
            //页面顶部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '页面顶部设置',
            ),
            array(
                'id'           => 'vip2_top_logo',
                'type'         => 'upload',
                'title'        => '顶部图标设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo_vip_v.png',
            ),
            array(
                'id'         => 'vip2_top_title',
                'type'       => 'text',
                'title'      => '页面顶部标题',
                'default'    => '欢迎加入总裁VIP，开通会员尊享特权',
            ),
            array(
                'id'         => 'vip2_top_sz',
                'type'       => 'repeater',
                'title'      => '页面顶部特权标签',
                'fields'     => array(
                    array(
                        'id'    => 'ico',
                        'type'  => 'text',
                        'title' => '特权图标',
                        'default'    => 'ceoicon-star-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '特权内容',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),

            //会员特权设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '会员特权设置',
            ),
            array(
                'id'      => 'vip2_privilege_title',
                'type'    => 'text',
                'title'   => '会员特权模块标题',
                'default' => 'VIP会员尊享特权',
            ),
            array(
                'id'         => 'vip2_privilege_sz',
                'type'       => 'repeater',
                'title'      => '会员特权内容设置',
                'fields'     => array(
                    array(
                        'id'    => 'ico',
                        'type'  => 'text',
                        'title' => '特权图标',
                        'default'    => 'ceoicon-calendar-todo-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '特权标题',
                    ),
                    array(
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => '特权副标题',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            array(
                'id'      => 'vip2_privilege_an',
                'type'    => 'text',
                'title'   => '模块按钮标题',
                'default' => '联系客服',
            ),
            array(
                'id'      => 'vip2_privilege_link',
                'type'    => 'text',
                'title'   => '模块按钮链接',
            ),

            //常见问题设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '常见问题设置',
            ),
            array(
                'id'      => 'vip2_qa_title',
                'type'    => 'text',
                'title'   => '常见问题模块标题',
                'default' => '常见问题',
            ),
            array(
                'id'      => 'vip2_qa_subtitle',
                'type'    => 'text',
                'title'   => '副标题',
                'default' => 'FAQ',
            ),
            array(
                'id'         => 'vip2_qa_sz',
                'type'       => 'repeater',
                'title'      => '常见问题内容设置',
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                    array(
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => '内容',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),

            //页面底部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '页面底部设置',
            ),
            array(
                'id'           => 'vip2_footer_img',
                'type'         => 'upload',
                'title'        => '底部模块图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo_vip2_footer_bg.png',
            ),
            array(
                'id'           => 'vip2_footer_title',
                'type'         => 'text',
                'title'        => '底部模块标题',
                'default'      => '加入VIP，海量资源免费下载',
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => 'QQ群联盟设置',
        'fields' => array(
            //QQ群联盟页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'QQ群联盟页面头部设置',
            ),
            array(
                'id'      => 'ceo_qqqun',
                'type'    => 'switcher',
                'title'   => 'QQ群联盟页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示QQ群联盟页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'ceo_qqqun_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_qqqun', '==', 'true'),
                'title'        => 'QQ群联盟页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'ceo_qqqun_title',
                'type'       => 'text',
                'dependency' => array('ceo_qqqun', '==', 'true'),
                'title'      => 'QQ群联盟页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => 'QQ群联盟页面标题下的副标题（为空则不显示）',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'QQ群联盟页面内容设置',
            ),
            array(
                'id'         => 'ceo_qqqun_sz',
                'type'       => 'repeater',
                'title'      => 'QQ群联盟页面内容设置',
                'fields'     => array(
                    array(
                        'id'    => 'qqqun_img',
                        'type'  => 'upload',
                        'title' => 'QQ群图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'qqqun_title',
                        'type'  => 'text',
                        'title' => 'QQ群标题',
                    ),
                    array(
                        'id'    => 'qqqun_haoma',
                        'type'  => 'text',
                        'title' => 'QQ群号码',
                    ),
                    array(
                        'id'    => 'qqqun_renshu',
                        'type'  => 'text',
                        'title' => 'QQ群人数',
                    ),
                    array(
                        'id'    => 'qqqun_link',
                        'type'  => 'text',
                        'title' => 'QQ群链接',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '案例页面设置',
        'fields' => array(
            //案例页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '案例展示页面头部设置',
            ),
            array(
                'id'      => 'ceo_case',
                'type'    => 'switcher',
                'title'   => '案例展示页面头部设置',
                'default' => true,
                'desc'    => '隐藏/显示案例展示页面头部模块（开启则显示，关闭则隐藏）',
            ),
            array(
                'id'           => 'ceo_case_bg',
                'type'         => 'upload',
                'dependency'   => array('ceo_case', '==', 'true'),
                'title'        => '案例展示页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
            ),
            array(
                'id'         => 'ceo_case_title',
                'type'       => 'text',
                'dependency' => array('ceo_case', '==', 'true'),
                'title'      => '案例展示页面副标题',
                'default'    => '生活不止眼前的苟且，还有诗和远方',
                'desc'       => '案例展示页面标题下的副标题（为空则不显示）',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '案例展示页面描述设置',
            ),
            array(
                'id'      => 'ceo_case_desc_kg',
                'type'    => 'switcher',
                'title'   => '页面描述',
                'desc'    => '开启或关闭页面描述（开启则显示，关闭则隐藏）',
                'default' => true
            ),
            array(
                'id'         => 'ceo_case_desc',
                'type'       => 'textarea',
                'title'      => '页面描述设置',
                'default'    => 'CeoTheme总裁主题是国内优秀的WordPress主题开发团队， 超过6年开发经验，专注WordPress主题开发建站， UI设计,seo等服务；并提供有保障的维护及售后！',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '案例展示页面内容设置',
            ),
            array(
                'id'         => 'ceo_case_sz',
                'type'       => 'repeater',
                'title'      => '案例展示页面内容设置',
                'fields'     => array(
                    array(
                        'id'    => 'cp_title',
                        'type'  => 'text',
                        'title' => '产品标题',
                    ),
                    array(
                        'id'    => 'cp_link',
                        'type'  => 'text',
                        'title' => '产品链接',
                    ),
                    array(
                        'id'    => 'al_img',
                        'type'  => 'upload',
                        'title' => '案例图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'al_title',
                        'type'  => 'text',
                        'title' => '案例标题',
                    ),
                    array(
                        'id'    => 'al_desc',
                        'type'  => 'text',
                        'title' => '案例描述',
                    ),
                    array(
                        'id'    => 'al_link',
                        'type'  => 'text',
                        'title' => '案例链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '客服验证设置',
        'fields' => array(
            //客服页面
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '客服验证页面头部设置',
            ),
            array(
                'id'           => 'ceo_qq_kefu_bg',
                'type'         => 'upload',
                'title'        => '客服验证页面头部背景图片',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-checkqq.jpg',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '官方客服QQ号码设置',
            ),
            array(
                'id'         => 'qq_kefu',
                'type'       => 'repeater',
                'title'      => '客服账号设置',
                'desc'       => '客服账号列表，请在这里添加客服账号，添加后前台即可验证官方客服',
                'fields'     => array(
                    array(
                        'id'      => 'qq',
                        'type'    => 'text',
                        'title'   => '客服账号',
                        'default' => '',
                    ),
                ),
            ),
            array(
                'id'    => 'ceo_qq_kefu_title',
                'type'  => 'textarea',
                'title' => '提示语',
                'default' => '提示：查询结果为官方对应号码数据，但不排除非法人员通过技术手段伪造号码进行诈骗，如有疑问请联系我们官方QQ：888888',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '官方客服列表设置',
            ),
            array(
                'id'      => 'ceo_qq_kefu',
                'type'    => 'switcher',
                'title'   => '官方客服列表',
                'desc'    => '开启或关闭SMTP邮箱功能（注意：开启时请关闭相关功能插件）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_qq_kefu_sz',
                'type'       => 'repeater',
                'title'      => '官方客服列表设置',
                'dependency' => array('ceo_qq_kefu', '==', 'true'),
                'fields'     => array(
                    array(
                        'id'    => 'img',
                        'type'  => 'upload',
                        'title' => '客服头像',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '客服名称',
                    ),
                    array(
                        'id'         => 'ico',
                        'type'       => 'text',
                        'title'      => '岗位图标',
                        'default'    => 'ceoicon-shield-check-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'p',
                        'type'  => 'text',
                        'title' => '客服岗位',
                    ),
                    array(
                        'id'    => 'position',
                        'type'  => 'text',
                        'title' => '客服职位',
                    ),
                    array(
                        'id'    => 'explain',
                        'type'  => 'text',
                        'title' => '客服说明',
                    ),
                    array(
                        'id'    => 'link_title',
                        'type'  => 'text',
                        'title' => '按钮标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '按钮链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '帮助中心设置',
        'fields' => array(
            array(
                'id'           => 'help_top_img',
                'type'         => 'upload',
                'title'        => '背景图片设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-help-bg.jpg',
            ),
            //页面顶部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '页面顶部设置',
            ),
            array(
                'id'         => 'help_top_title',
                'type'       => 'text',
                'title'      => '页面顶部标题',
                'default'    => '用心服务，只为您的满意',
            ),
            array(
                'id'         => 'help_top_subtitle',
                'type'       => 'text',
                'title'      => '副标题',
                'default'    => '帮助您解决问题',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '快捷帮助设置',
            ),
            array(
                'id'         => 'help_top_sz',
                'type'       => 'repeater',
                'title'      => '快捷帮助设置',
                'fields'     => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '模块图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '模块标题',
                    ),
                    array(
                        'id'    => 'subtitle',
                        'type'  => 'text',
                        'title' => '模块副标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '模块链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            //常见问题设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '常见问题设置',
            ),
            array(
                'id'      => 'help_qa_title',
                'type'    => 'text',
                'title'   => '常见问题模块标题',
                'default' => '常见问题',
            ),
            array(
                'id'      => 'help_qa_subtitle',
                'type'    => 'text',
                'title'   => '副标题',
                'default' => 'FAQ',
            ),
            array(
                'id'         => 'help_qa_sz',
                'type'       => 'repeater',
                'title'      => '常见问题内容设置',
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                    array(
                        'id'    => 'content',
                        'type'  => 'textarea',
                        'title' => '内容',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            //页面底部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '页面底部设置',
            ),
            array(
                'id'         => 'help_privilege_sz',
                'type'       => 'repeater',
                'title'      => '页面底部设置',
                'fields'     => array(
                    array(
                        'id'    => 'ico',
                        'type'  => 'text',
                        'title' => '图标',
                        'default'    => 'ceoicon-customer-service-2-line',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                    array(
                        'id'    => 'subtitle1',
                        'type'  => 'text',
                        'title' => '副标题1',
                    ),
                    array(
                        'id'    => 'subtitle2',
                        'type'  => 'text',
                        'title' => '副标题2',
                    ),
                    array(
                        'id'    => 'antitle',
                        'type'  => 'text',
                        'title' => '按钮标题',
                    ),
                    array(
                        'id'    => 'anlink',
                        'type'  => 'text',
                        'title' => '按钮链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_page',
        'title'  => '建站页面设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '总裁主题提示您：本来这个页面是计划用纯静态代码的，但考虑到有些用户可能并不了解代码式修改，故将设置项做到后台设置，便于修改和设置。',
            ),
            array(
                'id'           => 'web_top_img',
                'type'         => 'upload',
                'title'        => '背景图片设置',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => get_template_directory_uri() . '/static/images/ceo-web-bgs.png',
            ),
            //页面顶部设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '页面顶部设置',
            ),
            array(
                'id'     => 'web_top_max',
                'type'   => 'fieldset',
                'title'  => '页面顶部设置',
                'fields' => array(
                    array(
                        'id'      => 'web_top_max_title',
                        'type'    => 'text',
                        'title'   => '主标题',
                        'default' => '高端网站建设',
                    ),
                    array(
                        'id'      => 'web_top_max_subtitle',
                        'type'    => 'text',
                        'title'   => '副标题',
                        'default' => '我们用最精诚的设计为您提升企业和品牌价值',
                    ),
                    array(
                        'id'      => 'web_top_max_an_title',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '点击咨询',
                    ),
                    array(
                        'id'      => 'web_top_max_an_link',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
            //服务套餐设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '服务套餐设置',
            ),
            array(
                'id'      => 'web_gz_title',
                'type'    => 'text',
                'title'   => '模块主标题',
                'default' => '服务套餐',
            ),
            array(
                'id'      => 'web_gz_subtitle',
                'type'    => 'text',
                'title'   => '模块副标题',
                'default' => 'Set meal',
            ),
            array(
                'id'         => 'web_gz_sz',
                'type'       => 'repeater',
                'title'      => '服务套餐设置',
                'fields'     => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '背景图',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/web-gz-mk.png',
                    ),
                    array(
                        'id'           => 'imgs',
                        'type'         => 'upload',
                        'title'        => '模块小图标',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/web-gz-mk-t.png',
                    ),
                    array(
                        'id'    => 'price',
                        'type'  => 'text',
                        'title' => '套餐价格',
                        'default' => '999起',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '套餐名称',
                        'default' => '网站建设',
                    ),
                    array(
                        'id'      => 'privilege',
                        'type'    => 'textarea',
                        'title'   => '套餐特权介绍',
                        'default' => '<li>千种精品网站模板</li><li>海量精美模板，让您与众不同</li>',
                        'desc'    => '支持填写html轻量标签，请根据以上示例添加'
                    ),
                    array(
                        'id'    => 'antitle',
                        'type'  => 'text',
                        'title' => '按钮标题',
                        'default' => '点击咨询',
                    ),
                    array(
                        'id'    => 'anlink',
                        'type'  => 'text',
                        'title' => '按钮链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
            //中部背景模块设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '中部背景模块设置',
            ),
            array(
                'id'     => 'web_tem_max',
                'type'   => 'fieldset',
                'title'  => '中部背景模块设置',
                'fields' => array(
                    array(
                        'id'           => 'web_tem_max_img',
                        'type'         => 'upload',
                        'title'        => '模块背景图',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/web-tem-max.jpg',
                    ),
                    array(
                        'id'      => 'web_tem_max_title',
                        'type'    => 'text',
                        'title'   => '模块主标题',
                        'default' => '高端网站建设',
                    ),
                    array(
                        'id'      => 'web_tem_max_subtitle',
                        'type'    => 'text',
                        'title'   => '模块副标题',
                        'default' => '我们用最精诚的设计为您提升企业和品牌价值',
                    ),
                    array(
                        'id'      => 'web_tem_max_antitle',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '点击咨询',
                    ),
                    array(
                        'id'      => 'web_tem_max_anlink',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
            //建站服务设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '建站服务设置',
            ),
            array(
                'id'      => 'web_yw_title',
                'type'    => 'text',
                'title'   => '模块主标题',
                'default' => '建站服务',
            ),
            array(
                'id'      => 'web_yw_subtitle',
                'type'    => 'text',
                'title'   => '模块副标题',
                'default' => 'Service',
            ),
            array(
                'id'         => 'web_yw_sz',
                'type'       => 'repeater',
                'title'      => '建站服务设置',
                'fields'     => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '模块背景图',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/web-yw-img1.png',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '服务标题',
                        'default' => '主题开发',
                    ),
                    array(
                        'id'    => 'describe',
                        'type'  => 'text',
                        'title' => '服务描述',
                        'default' => '总裁主题是国内最懂你的WordPress主题开发商',
                    ),
                ),
            ),
            //常见问题设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '常见问题设置',
            ),
            array(
                'id'      => 'web_qa_title',
                'type'    => 'text',
                'title'   => '模块主标题',
                'default' => '常见问题',
            ),
            array(
                'id'      => 'web_qa_subtitle',
                'type'    => 'text',
                'title'   => '模块副标题',
                'default' => 'Problem',
            ),
            array(
                'id'         => 'web_qa_sz',
                'type'       => 'repeater',
                'title'      => '常见问题设置',
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '问题标题',
                    ),
                    array(
                        'id'    => 'answer',
                        'type'  => 'text',
                        'title' => '问题解答',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '更多链接',
                    ),
                ),
            ),
            //底部模块设置
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '底部模块设置',
            ),
            array(
                'id'     => 'web_bottom_max',
                'type'   => 'fieldset',
                'title'  => '底部模块设置',
                'fields' => array(
                    array(
                        'id'           => 'web_bottom_max_img',
                        'type'         => 'upload',
                        'title'        => '模块背景图',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-bg.png',
                    ),
                    array(
                        'id'      => 'web_bottom_max_title',
                        'type'    => 'text',
                        'title'   => '模块主标题',
                        'default' => '全面赋能企业数字化经营',
                    ),
                    array(
                        'id'      => 'web_bottom_max_antitle',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '点击咨询',
                    ),
                    array(
                        'id'      => 'web_bottom_max_anlink',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                    ),
                ),
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_community',
        'icon'  => 'fa fa-comments',
        'title' => '社区设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_community',
        'title'  => '社区SEO设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答首页SEO设置',
            ),
            array(
                'id'    => 'seo-question-title',
                'type'  => 'text',
                'title' => '问答首页SEO标题',
            ),
            array(
                'id'    => 'seo-question-keywords',
                'type'  => 'text',
                'title' => '问答首页SEO关键词',
            ),
            array(
                'id'    => 'seo-question-description',
                'type'  => 'textarea',
                'title' => '问答首页SEO描述',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛首页SEO设置',
            ),
            array(
                'id'    => 'seo-forum-title',
                'type'  => 'text',
                'title' => '论坛首页SEO标题',
            ),
            array(
                'id'    => 'seo-forum-keywords',
                'type'  => 'text',
                'title' => '论坛首页SEO关键词',
            ),
            array(
                'id'    => 'seo-forum-description',
                'type'  => 'textarea',
                'title' => '论坛首页SEO描述',
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_community',
        'title'  => '问答功能设置',
        'fields' => array(
            //问答页面设置
            array(
                'id'      => 'is_enable_question',
                'type'    => 'switcher',
                'title'   => '开启问答功能',
                'default' => true,
                'desc'   => '此按钮关闭后将关闭问答全部功能',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答社区顶部设置',
            ),
            array(
                'id'      => 'question-bg',
                'type'    => 'upload',
                'title'   => '顶部背景',
                'default' => get_template_directory_uri() . '/static/images/ceo-community-bg.jpg',
            ),
            array(
                'id'      => 'question-title',
                'type'    => 'text',
                'title'   => '问答社区标题',
                'default' => '问答社区',
            ),
            array(
                'id'      => 'question-subtitle',
                'type'    => 'text',
                'title'   => '副标题',
                'default' => '有问必答',
            ),
            array(
                'id'         => 'question_desc_sz',
                'type'       => 'repeater',
                'title'      => '顶部介绍设置',
                'fields'     => array(
                    array(
                        'id'         => 'icon',
                        'type'       => 'text',
                        'title'      => '图标',
                        'default'    => 'ceoicon-checkbox-circle-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答审核设置',
            ),
            array(
                'id'      => 'question_check',
                'type'    => 'switcher',
                'title'   => '提问审核',
                'desc'    => '开启按钮则无需审核直接显示，关闭按钮则需要审核后显示',
                'default' => true
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答人机验证设置',
            ),
            array(
                'id'      => 'verify_question_new',
                'type'    => 'switcher',
                'title'   => '问答发布问题人机验证',
                'default' => false,
                'desc'    => '开启或关闭问答发布问题人机验证功能（开启则需要进行人机验证才能发布问题，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id'         => 'verify_question_new_type',
                'type'       => 'radio',
                'title'      => '选择人机验证方式',
                'inline'     => true,
                'options'    => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default'    => '1',
                'dependency' => array('verify_question_new', '==', true),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '悬赏问答设置',
            ),
            array(
                'id'      => 'answer_question_money',
                'type'    => 'switcher',
                'title'   => '问答悬赏功能',
                'desc'    => '开启或关闭问答悬赏功能',
                'default' => false,
                'desc' => '开启后将允许用户在问答中心发布悬赏问答',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '友情提示设置',
            ),
            array(
                'id'      => 'question_ts_title',
                'type'    => 'text',
                'title'   => '友情提示标题',
                'default' => '友情提示：',
            ),
            array(
                'id'      => 'question_ts_text',
                'type'    => 'textarea',
                'title'   => '友情提示内容',
                'default' => '<li>①：请勿重复提交内容</li><li>②：请勿提交违法违规内容</li><li>③：提交违法违规内容者将给予永久封号</li>',
                'desc'    => '请根据以上示例添加',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答内页设置',
            ),
            array(
                'id'      => 'question_single_bq',
                'type'    => 'textarea',
                'title'   => '版权声明',
                'default' => '版权：言论仅代表个人观点，不代表官方立场。',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '问答侧边栏设置',
            ),
            array(
                'id'      => 'question_sidebar_ad',
                'type'    => 'upload',
                'title'   => '广告图片',
                'default' => get_template_directory_uri() . '/static/images/ceo-ceotheme-ads.png',
            ),
            array(
                'id'      => 'question_sidebar_ad_title',
                'type'    => 'text',
                'title'   => '广告标题',
                'default' => '总裁主题',
            ),
            array(
                'id'      => 'question_sidebar_ad_link',
                'type'    => 'text',
                'title'   => '广告链接',
                'default' => 'https://www.ceotheme.com',
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_community',
        'title'  => '论坛功能设置',
        'fields' => array(
            //论坛页面设置
            array(
                'id'      => 'is_enable_forum',
                'type'    => 'switcher',
                'title'   => '是否开启论坛',
                'default' => true,
                'desc'   => '此按钮关闭后将关闭论坛全部功能',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛顶部设置',
            ),
            array(
                'id'      => 'forum-bg',
                'type'    => 'upload',
                'title'   => '顶部背景',
                'default' => get_template_directory_uri() . '/static/images/ceo-community-bg.jpg',
            ),
            array(
                'id'      => 'forum-title',
                'type'    => 'text',
                'title'   => '论坛标题',
                'default' => '论坛大厅',
            ),
            array(
                'id'      => 'forum-subtitle',
                'type'    => 'text',
                'title'   => '副标题',
                'default' => '交流社区',
            ),
            array(
                'id'         => 'forum_desc_sz',
                'type'       => 'repeater',
                'title'      => '顶部介绍设置',
                'fields'     => array(
                    array(
                        'id'         => 'icon',
                        'type'       => 'text',
                        'title'      => '图标',
                        'default'    => 'ceoicon-checkbox-circle-fill',
                        'desc'       => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '标题',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛审核设置',
            ),
            array(
                'id'      => 'forum_check',
                'type'    => 'switcher',
                'title'   => '发帖审核',
                'desc'    => '开启按钮则无需审核直接显示，关闭按钮则需要审核后显示',
                'default' => true
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛人机验证设置',
            ),
            array(
                'id'      => 'verify_forum_new',
                'type'    => 'switcher',
                'title'   => '论坛发帖人机验证',
                'default' => false,
                'desc'    => '开启或关闭论坛发帖人机验证功能（开启则需要进行人机验证才能发布帖子，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id'         => 'verify_forum_new_type',
                'type'       => 'radio',
                'title'      => '选择人机验证方式',
                'inline'     => true,
                'options'    => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default'    => '1',
                'dependency' => array('verify_forum_new', '==', true),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '友情提示设置',
            ),
            array(
                'id'      => 'forum_ts_title',
                'type'    => 'text',
                'title'   => '友情提示标题',
                'default' => '友情提示：',
            ),
            array(
                'id'      => 'forum_ts_text',
                'type'    => 'textarea',
                'title'   => '友情提示内容',
                'default' => '<li>①：请勿重复提交内容</li><li>②：请勿提交违法违规内容</li><li>③：提交违法违规内容者将给予永久封号</li>',
                'desc'    => '请根据以上示例添加',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛内页设置',
            ),
            array(
                'id'      => 'forum_single_bq',
                'type'    => 'textarea',
                'title'   => '版权声明',
                'default' => '版权：言论仅代表个人观点，不代表官方立场。',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '论坛侧边栏设置',
            ),
            array(
                'id'      => 'forum_sidebar_ad',
                'type'    => 'upload',
                'title'   => '广告图片',
                'default' => get_template_directory_uri() . '/static/images/ceo-ceotheme-ads.png',
            ),
            array(
                'id'      => 'forum_sidebar_ad_title',
                'type'    => 'text',
                'title'   => '广告标题',
                'default' => '总裁主题',
            ),
            array(
                'id'      => 'forum_sidebar_ad_link',
                'type'    => 'text',
                'title'   => '广告链接',
                'default' => 'https://www.ceotheme.com',
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'id'     => 'ceotheme_ad',
        'icon'   => 'fa fa-bell',
        'title'  => '广告设置',
        'fields' => array(
            array(
                'id'      => 'ceo-gg',
                'type'    => 'switcher',
                'title'   => '广告右上角按钮',
                'desc'    => '开启或关闭广告右上角按钮（开启则显示，关闭则隐藏）开启后所有广告都会显示右上角按钮',
                'default' => true
            ),
            array(
                'id'         => 'ceo-gg-sz',
                'type'       => 'fieldset',
                'title'      => '广告右上角按钮设置',
                'dependency' => array('ceo-gg', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'ceo-gg-bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'desc'    => '填写广告右上角按钮标题',
                        'default' => '也想出现在这里？点击联系我~',
                    ),
                    array(
                        'id'      => 'ceo-gg-lj',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                        'desc'    => '填写广告右上角按钮链接地址',
                        'default' => 'https://wpa.qq.com/msgrd?v=3&uin=88888888&site=qq&menu=yes',
                    ),
                    array(
                        'id'      => 'ceo-gg-img',
                        'type'    => 'upload',
                        'title'   => '按钮图片',
                        'desc'    => '广告右上角按钮图片上传',
                        'default' => get_template_directory_uri() . '/static/images/ceo-ad.png',
                    ),
                ),
            ),
            //分类广告
            array(
                'id'    => 'cat_ad_show',
                'type'  => 'switcher',
                'title' => '分类广告',
            ),
            array(
                'id'         => 'cat_ad_img',
                'type'       => 'code_editor',
                'dependency' => array('cat_ad_show', '==', 'true'),
                'title'      => '广告代码',
                'default'    => '<a href="https://www.ceotheme.com/" target="_blank"><img src="' . get_template_directory_uri() . '/static/images/ceo-bg.png" style=" width: 100%; text-align: center; "></a>',
                'desc'       => '可自定义添加广告代码，支持广告联盟等代码添加（通用广告可直接修改图片链接与超链接即可）'
            ),
            //内页顶部广告
            array(
                'id'      => 'single_ad_show',
                'type'    => 'switcher',
                'title'   => '内页顶部广告',
                'default' => false
            ),
            array(
                'id'         => 'single_ad_img',
                'type'       => 'code_editor',
                'dependency' => array('single_ad_show', '==', 'true'),
                'title'      => '广告代码',
                'default'    => '<a href="https://www.ceotheme.com/" target="_blank"><img src="' . get_template_directory_uri() . '/static/images/ceo-bg.png" style=" width: 100%; margin: 20px 0; text-align: center; "></a>',
                'desc'       => '可自定义添加广告代码，支持广告联盟等代码添加（通用广告可直接修改图片链接与超链接即可）'
            ),
            //内页底部广告
            array(
                'id'      => 'single_ad_foo',
                'type'    => 'switcher',
                'title'   => '内页底部广告',
                'default' => false
            ),
            array(
                'id'         => 'single_ad_foo_img',
                'type'       => 'code_editor',
                'dependency' => array('single_ad_foo', '==', 'true'),
                'title'      => '广告代码',
                'default'    => '<a href="https://www.ceotheme.com/" target="_blank"><img src="' . get_template_directory_uri() . '/static/images/ceo-bg.png"></a>',
                'desc'       => '可自定义添加广告代码，支持广告联盟等代码添加（通用广告可直接修改图片链接与超链接即可）'
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'id'     => 'ceotheme_boo',
        'icon'   => 'fa fa-gears',
        'title'  => '底部设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_boo',
        'title'  => '底部Banner设置',
        'fields' => array(
            array(
                'id'      => 'ceo_footer',
                'type'    => 'switcher',
                'title'   => '底部Banner模块',
                'desc'    => '隐藏/显示底部Banner模块（开启则显示，关闭则隐藏）',
                'default' => true
            ),
            array(
                'id'          => 'ceo_footer_display',
                'type'        => 'select',
                'title'       => '底部Banner模块显示设置',
                'dependency' => array('ceo_footer', '==', true),
                'desc'    => '首页显示/全站显示（默认首页显示）',
                'options'     => array(
                    'index' => '首页显示',
                    'all' => '全站显示',
                ),
                'default'     => '1'
            ),
            array(
                'id'         => 'ceo_footer_sz',
                'type'       => 'fieldset',
                'title'      => '底部Banner模块设置',
                'dependency' => array('ceo_footer', '==', true),
                'fields'     => array(
                array(
                    'id'           => 'ceo_footer_img',
                    'type'         => 'upload',
                    'title'        => 'Banner模块背景图片',
                    'placeholder'  => 'http://',
                    'button_title' => '上传',
                    'remove_title' => '删除',
                    'default'      => get_template_directory_uri() . '/static/images/ceo-footer-back.jpg',
                ),
                array(
                    'id'         => 'ceo_footer_title',
                    'type'       => 'textarea',
                    'title'      => '模块标题',
                    'default'    => '你的前景，远超我们想象',
                ),
                array(
                    'id'      => 'ceo_footer_an',
                    'type'    => 'text',
                    'title'   => '按钮标题',
                    'default' => '免费注册'
                ),
                array(
                    'id'      => 'ceo_footer_link',
                    'type'    => 'text',
                    'title'   => '按钮链接',
                    'default' => '/'
                ),
            ),
            ),
            array(
                'id'         => 'ceo_footer_count_sz',
                'type'       => 'fieldset',
                'title'      => '底部Banner统计模块设置',
                'dependency' => array('ceo_footer', '==', true),
                'fields'     => array(
                array(
                    'id'         => 'all_site_count_title',
                    'type'       => 'text',
                    'title'      => '更换全站文章统计标题',
                    'default'    => '文章总数',
                ),
                array(
                    'id'         => 'all_huiyuan_count_title',
                    'type'       => 'text',
                    'title'      => '更换会员数量统计标题',
                    'default'    => '会员总数',
                ),
                array(
                    'id'         => 'all_view_count_title',
                    'type'       => 'text',
                    'title'      => '更换全站访问数量统计标题',
                    'default'    => '访问总数',
                ),
                array(
                    'id'         => 'all_jinri_count_title',
                    'type'       => 'text',
                    'title'      => '更换今日发布统计标题',
                    'default'    => '今日发布',
                ),
                array(
                    'id'         => 'all_benzhou_count_title',
                    'type'       => 'text',
                    'title'      => '更换本周发布统计标题',
                    'default'    => '本周发布',
                ),
                array(
                    'id'         => 'all_yunxing_count_title',
                    'type'       => 'text',
                    'title'      => '更换运行天数统计标题',
                    'default'    => '运行天数',
                ),
            ),
            ),
            array(
                'id'    => 'all_yunxing_count',
                'type'  => 'text',
                'dependency' => array('ceo_footer', '==', true),
                'title' => '建站日期',
                'desc' => '填写建站日期进行时间统计，格式：2011-11-11',
            ),
        )
    ));

    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_boo',
        'title'  => '底部基础设置',
        'fields' => array(
            array(
                'id'      => 'foot_kg',
                'type'    => 'switcher',
                'title'   => '底部快捷模块',
                'desc'    => '隐藏/显示底部快捷模块（开启则显示，关闭则隐藏）',
                'default' => true
            ),
            array(
                'id'           => 'foot_logo',
                'type'         => 'upload',
                'title'        => '底部LOGO',
                'placeholder'  => 'http://',
                'button_title' => '上传',
                'remove_title' => '删除',
                'dependency'   => array('foot_kg', '==', true),
            ),
            array(
                'id'        => 'foot_site_des',
                'type'      => 'textarea',
                'title'     => '底部网站描述',
                'default'   => 'CeoTheme总裁主题是国内优秀的WordPress主题开发团队， 超过6年开发经验，专注WordPress主题开发建站， UI设计,seo等服务；并提供有保障的维护及售后',
                'dependency'=> array('foot_kg', '==', true),
            ),
            array(
                'id'        => 'foot_menu',
                'type'      => 'group',
                'max'       => '3',
                'title'     => '底部快捷导航',
                'dependency'=> array('foot_kg', '==', true),
                'fields'    => array(
                    array(
                        'id'    => 'h4',
                        'type'  => 'text',
                        'title' => '菜单标题',
                    ),
                    array(
                        'id'      => 'ico',
                        'type'    => 'text',
                        'title'   => '菜单图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'     => 'foot_menu_item',
                        'type'   => 'repeater',
                        'title'  => '添加项目',
                        'fields' => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => '标题',
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => '链接',
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'id'      => 'link_show',
                'type'    => 'switcher',
                'title'   => '友情链接',
                'desc'    => '隐藏/显示底部友情链接（开启则显示，关闭则隐藏）提示：在后台菜单左侧的 <a href="/wp-admin/link-manager.php" style="color: #0a8eff;">【链接】</a> 中添加友情链接',
                'default' => true
            ),
            array(
                'id'         => 'servceomall_qq',
                'type'       => 'text',
                'title'      => '申请友链客服QQ',
                'default'    => '88888888',
                'desc'       => '申请友链客服QQ号码',
                'dependency' => array('link_show', '==', 'true'),
            ),
            array(
                'id'      => 'foot_gongan',
                'type'    => 'switcher',
                'title'   => '是否显示公安备案',
                'desc'   => '隐藏/显示底部公安备案号（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'      => 'foot_gongan_beianhao',
                'dependency' => array('foot_gongan', '==', 'true'),
                'type'    => 'text',
                'title'   => '公安备案号',
                'default' => '闽公安网备888888888号'
            ),
            array(
                'id'      => 'foot_beian',
                'type'    => 'text',
                'title'   => '网站备案号',
                'default' => '闽ICP备888888888号'
            ),
            array(
                'id'      => 'foot_xml-y',
                'type'    => 'switcher',
                'title'   => '网站地图',
                'label'   => '隐藏/显示底部网站地图（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'foot_xml',
                'type'       => 'text',
                'title'      => '地图地址',
                'desc'       => '<p>网站地图链接地址<h5 class="csf-text-desc" style="color: #0a8eff;">（推荐使用：Google XML Sitemaps 插件）</h5>后台-插件-搜索Google XML Sitemaps-安装谷歌 XML 站点地图-启用',
                'default'    => '/sitemap.xml',
                'dependency' => array('foot_xml-y', '==', 'true'),
            ),
            array(
                'id'      => 'foot_text',
                'type'    => 'textarea',
                'title'   => '网站底部版权文字',
                'desc'    => '可以使用html编辑',
                'default' => '© 2022 总裁主题 - CEOTHEME.COM & WordPress Theme. All rights reserved'
            ),
            array(
                'id'      => 'theme_cop',
                'type'    => 'switcher',
                'title'   => '隐藏/显示主题版权',
                'desc'    => '隐藏版权希望可以在底部友情链接中添加作者网站链接（版权展示已经添加了nofollow标签，搜索引擎不会对作者网站进行追踪，所以如果可以请显示，感谢支持！）',
                'default' => true
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_app',
        'icon'  => 'fa fa-window-restore',
        'title' => '手机设置',
    ));
     CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_app',
        'title'  => '手机首页菜单',
        'fields' => array(
            array(
                'id'      => 'ceo_app_cd',
                'type'    => 'switcher',
                'title'   => '手机端首页中部菜单',
                'desc'    => '隐藏/显示手机端首页幻灯下菜单，需要开启幻灯片（开启则显示，关闭则隐藏）',
                'default' => false
            ),
            array(
                'id'      => 'ceo_app_cd_an',
                'type'    => 'repeater',
                'dependency' => array('ceo_app_cd', '==', true),
                'title'   => '手机端菜单模块设置',
                'fields'  => array(
                    array(
                        'id'           => 'img',
                        'type'         => 'upload',
                        'title'        => '菜单图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-appnav.png',
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => '菜单标题',
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => '菜单链接',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线',
                    ),
                ),
            ),
        )
    ));
     CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_app',
        'title'  => '手机底部菜单',
        'fields' => array(
            array(
                'id'      => 'ceo_app_foo',
                'type'    => 'switcher',
                'title'   => '手机端底部菜单',
                'desc'    => '开启或关闭手机底部菜单（开启则显示，关闭则隐藏）',
                'default' => true,
            ),
            array(
                'id'         => 'ceo_app_foo_sz',
                'type'       => 'fieldset',
                'title'      => '手机底部菜单设置',
                'dependency' => array('ceo_app_foo', '==', true),
                'fields'     => array(
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线 （手机底部左侧菜单设置）',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_ico1',
                        'type'    => 'text',
                        'title'   => '左侧菜单1图标',
                        'default' => 'ceoicon-home-3-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_title1',
                        'type'    => 'text',
                        'title'   => '左侧菜单1标题',
                        'default' => '首页',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_link1',
                        'type'    => 'text',
                        'title'   => '左侧菜单1链接',
                        'default' => '/',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_ico2',
                        'type'    => 'text',
                        'title'   => '左侧菜单2图标',
                        'default' => 'ceoicon-home-3-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_title2',
                        'type'    => 'text',
                        'title'   => '左侧菜单2标题',
                        'default' => '首页',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_link2',
                        'type'    => 'text',
                        'title'   => '左侧菜单2链接',
                        'default' => '/',
                    ),
                    array(
                        'type'    => 'notice',
                        'style'   => 'warning',
                        'content' => '分割线 （手机底部右侧菜单设置）',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_icoy1',
                        'type'    => 'text',
                        'title'   => '右侧菜单1图标',
                        'default' => 'ceoicon-home-3-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_titley1',
                        'type'    => 'text',
                        'title'   => '右侧菜单1标题',
                        'default' => '首页',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_linky1',
                        'type'    => 'text',
                        'title'   => '右侧菜单1链接',
                        'default' => '/',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_icoy2',
                        'type'    => 'text',
                        'title'   => '右侧菜单2图标',
                        'default' => 'ceoicon-home-3-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_titley2',
                        'type'    => 'text',
                        'title'   => '右侧菜单2标题',
                        'default' => '首页',
                    ),
                    array(
                        'id'      => 'ceo_app_foo_linky2',
                        'type'    => 'text',
                        'title'   => '右侧菜单2链接',
                        'default' => '/',
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_app',
        'title'  => '手机商城设置',
        'fields' => array(
            array(
                'id'      => 'ceo_app_shop_img',
                'type'    => 'switcher',
                'title'   => '手机商城内页特色图',
                'desc'    => '隐藏/显示手机商城内页特色图（开启则显示，关闭则隐藏）',
                'default' => false
            ),
            array(
                'id'      => 'ceoshop_app_box',
                'type'    => 'switcher',
                'title'   => '手机商城内页顶部付费模块',
                'desc'    => '隐藏/显示手机商城内页顶部付费模块（开启则显示，关闭则隐藏）',
                'default' => true
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '预留占位',
            ),
        )
    ));

    //扩展功能设置
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_function',
        'icon'  => 'fa fa-laptop',
        'title' => '扩展功能',
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_function',
        'title'  => '扩展功能设置',
        'fields' => array(
            array(
                'id' => 'yinyue_unlogin_allow_play',
                'type' => 'switcher',
                'title' => '音乐列表与音乐详情页是否登录播放',
                'default' => true,
                'desc'    => '开启则允无需登录也可播放，按钮关闭则需要登录后才能播放',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （找回密码设置）',
            ),
            array(
                'id'         => 'ceo_retrieve_password',
                'type'       => 'radio',
                'title'      => '找回密码设置',
                'inline'     => true,
                'options'    => array(
                    '1' => '方式一【使用主题自带页面找回密码】',
                    '2' => '方式二【使用WP系统页面找回密码】',
                ),
                'default' => '2',
                'desc' => '选择方式一【使用主题自带页面找回密码】需要先到页面-创建页面-选择【找回密码】模板-链接填写reset-password',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （交易弹幕设置）',
            ),
            array(
                'id'      => 'danmu',
                'type'    => 'switcher',
                'title'   => '交易弹幕',
                'desc'    => '实时交易动态展示，包含用户消费及用户升级VIP数据轮播，网页右下角轮播弹幕展示',
                'default' => true
            ),
            array(
                'id'      => 'danmu_money',
                'type'    => 'switcher',
                'title'   => '弹幕中是否显示金额',
                'desc'    => '',
                'default' => true,
                'dependency' => array('danmu', '==', true),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （文章随机阅读量）',
            ),
            array(
                'id'      => 'is_rand_views',
                'type'    => 'switcher',
                'title'   => '文章随机阅读量',
                'desc'    => '开启或关闭自动文章阅读量功能（开启则发布文章自动生成，关闭则无）',
                'default' => true,
            ),
            array(
              'id'      => 'is_rand_views_sz_q',
              'dependency' => array('is_rand_views', '==', true),
              'type'    => 'number',
              'title'   => '自定义随机阅读量（起）',
              'default' => 100,
            ),
            array(
              'id'      => 'is_rand_views_sz_z',
              'dependency' => array('is_rand_views', '==', true),
              'type'    => 'number',
              'title'   => '自定义随机阅读量（止）',
              'default' => 1000,
            ),
            array(
              'type'    => 'submessage',
              'style'   => 'info',
              'content' => '自定义随机阅读量（起）与自定义随机阅读量（止）表示如：从100起1000止，100-1000内数值随机，可以自定义自由设置随机值',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （整站评论功能）',
            ),
            array(
                'id'      => 'comments_close',
                'type'    => 'switcher',
                'title'   => '整站评论功能',
                'desc'    => '开启或关闭整站评论功能，不需要评论可以关闭（开启则显示，关闭则隐藏）',
                'default' => true
            ),
            array(
                'id'      => 'verify_comment_new',
                'type'    => 'switcher',
                'title'   => '评论人机验证',
                'default' => false,
                'desc'    => '开启或关闭评论人机验证功能（开启则需要进行人机验证才能评论，关闭则无需）注意：开启后需要先配置人机验证功能',
            ),
            array(
                'id'         => 'verify_comment_new_type',
                'type'       => 'radio',
                'title'      => '选择人机验证方式',
                'inline'     => true,
                'options'    => array(
                    '1' => '腾讯云验证码',
                    '2' => 'vaptcha验证',
                ),
                'default'    => '1',
                'dependency' => array('verify_comment_new', '==', true),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_function',
        'title'  => '图片裁剪设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '默认缩略图裁剪设置',
            ),
            array(
                'id'      => 'thumbnail_handle',
                'type'    => 'radio',
                'title'   => '缩略图裁剪模式',
                'options' => array(
                    'timthumb_php' => 'timthumb.php裁剪（推荐，支持从上往下裁剪！可保留高清晰度，图片规范）',
                    'timthumb_mi'  => '不裁剪（原图压缩，可能会影响速度）',
                    'other'  => '自定义参数（例如OSS云储存裁剪模式）',
                ),
                'default' => 'timthumb_php',
            ),
            array(
                'id'         => 'thumbnail_other',
                'type'       => 'text',
                'title'      => '自定义图片后缀裁剪参数',
                'dependency' => array('thumbnail_handle', '==', 'other'),
                'default'    => '?x-oss-process=image/resize,m_fill,h_200,w_300',
                'desc'       => "如阿里云OSS在图片地址后加（?x-oss-process=image/resize,m_fill,h_180,w_300）,h_高度，w_宽度 ,<br>原理说明，例如本身图片地址是：https://本站域名.com/wp-content/uploads/2019/08/a.jpg，使用云储存插件接入oss后是https://oss云储存域名.com/wp-content/uploads/2021/01/01.png，加入自定义参数后是，https://oss域名.com/wp-content/uploads/2021/01/01.png?x-oss-process=image/resize,m_fill,h_200,w_300，即可实现oss裁剪",
            ),
            array(
                'id'      => 'thumbnail-px',
                'type'    => 'dimensions',
                'title'   => '自定义缩略图宽高',
                'desc'    => '这里是全局缩略图宽高尺寸，也可以在后台分类目录中独立设置分类缩略图尺寸~未独立设置则自动调用该设置中默认尺寸',
                'default' => array(
                    'width'  => '300',
                    'height' => '200',
                    'unit'   => 'px',
                ),
            ),

            /*array(
                'id'         => 'thumbnail_link',
                'type'       => 'repeater',
                'title'      => '图片外链域名',
                'desc'       => '如果使用云储存或采集等请在这里添加外链域名（无需输入http://与https://）',
                'fields'     => array(
                    array(
                        'id'      => 'yun',
                        'type'    => 'text',
                        'title'   => '外链域名',
                        'default' => '',
                    ),
                ),
            ),*/

            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '美化特色图裁剪设置',
            ),
            array(
                'id'      => 'cut_type',
                'type'    => 'radio',
                'title'   => '美化特色图片裁剪',
                'options' => array(
                    '2' => '居上裁剪',
                    '0' => '居中裁剪',
                    '1' => '强制缩放',
                ),
                'default' => '2',
            ),
            array(
                'id'      => 'cut_type_dx',
                'type'    => 'dimensions',
                'title'   => '自定义美化缩略图大小（框内图大小）',
                'default' => array(
                    'width'  => '281',
                    'height' => '165',
                    'unit'   => 'px',
                ),
                'desc'    =>'自定义缩略图背景框时进行修改调整，默认无需修改'
            ),
            array(
                'id'      => 'cut_type_kg',
                'type'    => 'dimensions',
                'title'   => '自定义美化缩略图宽高（框内图距离）',
                'default' => array(
                    'width'  => '60',
                    'height' => '56',
                    'unit'   => 'px',
                ),
                'desc'    =>'自定义缩略图背景框时进行修改调整，默认无需修改'
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_function',
        'title'  => '邮箱系统设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '总裁主题推荐使用163邮箱发信，更稳定、更高效~',
            ),
            array(
                'id'      => 'mail_smtps',
                'type'    => 'switcher',
                'title'   => 'SMTP邮箱功能',
                'desc'    => '开启或关闭SMTP邮箱功能（注意：开启时请关闭相关功能插件）',
                'default' => false,
            ),
            array(
                'id'       => 'mail_name',
                'type'     => 'text',
                'title'    => '发信邮箱',
                'desc'     => '请填写发信人邮箱帐号',
                'default'  => '88888888@163.com',
                'validate' => 'csf_validate_email',
            ),
            array(
                'id'       => 'mail_nicname',
                'type'     => 'text',
                'title'    => '发信人昵称',
                'desc'     => '请填写发信人昵称',
                'default'  => 'CeoMax-Pro主题',
            ),
            array(
                'id'       => 'mail_host',
                'type'     => 'text',
                'title'    => '邮箱服务器',
                'desc'     => '请填写SMTP邮箱服务器地址',
                'default'  => 'smtp.163.com',
            ),
            array(
                'id'       => 'mail_port',
                'type'     => 'text',
                'title'    => '服务器端口',
                'desc'     => '请填写SMTP邮箱服务器端口',
                'default'  => '465',
            ),
            array(
                'id'         => 'mail_passwd',
                'type'       => 'text',
                'title'      => '邮箱独立密码',
                'desc'       => '请填写SMTP服务器邮箱独立密码（注意：非账号密码）',
                'default'    => '88888888',
                'attributes' => array(
                    'type'         => 'password',
                    'autocomplete' => 'off',
                ),
            ),
            array(
                'id'      => 'mail_smtpauth',
                'type'    => 'switcher',
                'title'   => '启用SMTPAuth服务',
                'desc'    => '是否启用SMTPAuth服务',
                'default' => true,
            ),
            array(
                'id'       => 'mail_smtpsecure',
                'type'     => 'text',
                'title'    => 'SMTPSecure设置',
                'desc'     => '若启用SMTPAuth服务则填写ssl，若不启用则留空',
                'default'  => 'ssl',
            ),

        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'  => 'ceotheme_function',
        'title'   => '通知系统设置',
        'fields'  => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '总裁主题提示您：开启以下任何通知功能需先配置邮箱系统！',
            ),
            // 邮件发送场景id与发生处理逻辑对应
            array(
                'id'      => 'mail_switch_case_8',
                'type'    => 'switcher',
                'title'   => '用户投稿后邮件通知站长',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_3',
                'type'    => 'switcher',
                'title'   => '用户发布论坛新帖后邮件通知站长',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_4',
                'type'    => 'switcher',
                'title'   => '有人回复了论坛帖子后邮件通知发帖人',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_5',
                'type'    => 'switcher',
                'title'   => '用户发布问答新问题后邮件通知站长',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_6',
                'type'    => 'switcher',
                'title'   => '有人回复了问答的问题后邮件通知发题人',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_7',
                'type'    => 'switcher',
                'title'   => '用户提交了服务申请后邮件通知站长',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_1',
                'type'    => 'switcher',
                'title'   => '用户提交新工单后邮件通知站长',
                'default' => false,
            ),
            array(
                'id'      => 'mail_switch_case_2',
                'type'    => 'switcher',
                'title'   => '平台回复了工单后邮件通知提交人',
                'default' => false,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent'  => 'ceotheme_function',
        'title'   => '验证系统设置',
        'fields'  => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => 'VAPTCHA验证设置',
            ),
            array(
                'id'      => 'vaptcha_enable',
                'type'    => 'switcher',
                'title'   => 'VAPTCHA验证',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => 'vaptcha验证码申请：<a href="https://www.vaptcha.com/" target="_blank">点击去申请</a>',
                'dependency' => array('vaptcha_enable', '==', true),
            ),
            array(
                'id'         => 'vaptcha_vid',
                'type'       => 'text',
                'title'      => 'vaptcha vid',
                'dependency' => array( 'vaptcha_enable', '==', true ),
            ),
            array(
                'id'         => 'vaptcha_key',
                'type'       => 'text',
                'title'      => 'vaptcha key',
                'dependency' => array( 'vaptcha_enable', '==', true ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '腾讯云验证码设置',
            ),
            array(
                'id'      => 'tcaptcha_enable',
                'type'    => 'switcher',
                'title'   => '腾讯云 T-Sec 天御验证码',
                'default' => false,
            ),
            array(
                'type'       => 'content',
                'content'    => '腾讯云 T-Sec 天御验证码申请：<a href="https://cloud.tencent.com/product/captcha" target="_blank">点击去申请</a>',
                'dependency' => array('tcaptcha_enable', '==', true),
            ),
            array(
                'id'         => 'tcaptcha_app_secret_id',
                'type'       => 'text',
                'title'      => '腾讯云 SecretId',
                'dependency' => array( 'tcaptcha_enable', '==', true ),
            ),
            array(
                'id'         => 'tcaptcha_app_secret_key',
                'type'       => 'text',
                'title'      => '腾讯云 SecretKey',
                'dependency' => array( 'tcaptcha_enable', '==', true ),
            ),
            array(
                'id'         => 'tcaptcha_captcha_app_id',
                'type'       => 'text',
                'title'      => '验证码 CaptchaAppId',
                'dependency' => array( 'tcaptcha_enable', '==', true ),
            ),
            array(
                'id'         => 'tcaptcha_captcha_app_secret_key',
                'type'       => 'text',
                'title'      => '验证码 AppSecretKey',
                'dependency' => array( 'tcaptcha_enable', '==', true ),
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'id'     => 'ceotheme_qita',
        'icon'   => 'fa fa-plus-square',
        'title'  => '美化设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_qita',
        'title'  => '右侧跟随设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线 （右下角跟随设置）',
            ),
            array(
                'id'      => 'goTop',
                'type'    => 'switcher',
                'title'   => '网站右下角跟随总开关',
                'desc'    => '关闭后以下全部关闭',
                'default' => true
            ),
            array(
                'id'      => 'goTop_gd',
                'dependency' => array('goTop', '==', true),
                'type'    => 'text',
                'title'   => '跟随按钮显示高度',
                'desc'    => '如果填写错误可填写默认45',
                'default' => '45',
            ),
            array(
                'id'         => 'goTop_hd',
                'type'       => 'switcher',
                'title'      => '活动按钮',
                'desc'       => '开启或关闭跟随活动按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'goTop_hd_sz',
                'type'       => 'fieldset',
                'title'      => '活动按钮设置',
                'dependency' => array('goTop_hd', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'goTop_hd_bt',
                        'type'    => 'text',
                        'title'   => '活动标题',
                        'desc'    => '填写活动标题',
                        'default' => '终身VIP会员限时钜惠',
                    ),
                    array(
                        'id'      => 'goTop_hd_lj',
                        'type'    => 'text',
                        'title'   => '活动链接',
                        'desc'    => '填写活动链接地址',
                        'default' => '/vip',
                    ),
                    array(
                        'id'      => 'goTop_hd_img',
                        'type'    => 'upload',
                        'title'   => '活动图片',
                        'desc'    => '活动图片上传',
                        'default' => get_template_directory_uri() . '/static/images/ceo-vip-hd.png',
                    ),
                ),
            ),
            array(
                'id'         => 'goTop_qiandao',
                'type'       => 'switcher',
                'title'      => '签到按钮',
                'desc'       => '开启或关闭签到按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'goTop_lottery',
                'type'       => 'switcher',
                'title'      => '抽奖按钮',
                'desc'       => '开启或关闭抽奖按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'goTop_qq',
                'type'       => 'switcher',
                'title'      => 'QQ按钮',
                'desc'       => '开启或关闭QQ按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
                array(
                    'id'         => 'goTop_qq_sz',
                    'type'       => 'repeater',
                    'title'      => 'QQ按钮客服设置',
                    'dependency' => array('goTop_qq', '==', true),
                    'fields'     => array(
                        array(
                            'id'      => 'goTop_qq_bt',
                            'type'    => 'text',
                            'title'   => '联系客服标题',
                            'default' => '咨询在线客服'
                        ),
                        array(
                            'id'      => 'goTop_qq_qq',
                            'type'    => 'text',
                            'title'   => '客服QQ',
                            'default' => '88888888'
                        ),
                    ),
                ),
            array(
                'id'         => 'goTop_qq_sz_top',
                'type'       => 'fieldset',
                'title'      => 'QQ按钮弹窗设置',
                'dependency' => array('goTop_qq', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'goTop_qq_ico',
                        'type'    => 'text',
                        'title'   => 'QQ按钮图标',
                        'default' => 'ceoicon-customer-service-2-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'goTop_qq_dinbu',
                        'type'    => 'text',
                        'title'   => 'QQ按钮顶部标题',
                        'default' => '如遇问题，请联系客服'
                    ),
                    array(
                        'id'      => 'goTop_qq_shuoming',
                        'type'    => 'text',
                        'title'   => 'QQ按钮说明',
                        'default' => '联系客服请注明来意'
                    ),
                    array(
                        'id'      => 'goTop_qq_dibu',
                        'type'    => 'text',
                        'title'   => 'QQ按钮底部按钮标题',
                        'default' => '高端主题开发'
                    ),
                    array(
                        'id'      => 'goTop_qq_dibu_ico',
                        'type'    => 'text',
                        'title'   => 'QQ按钮底部按钮图标',
                        'default' => 'ceoicon-shield-check-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'goTop_qq_dibu_link',
                        'type'    => 'text',
                        'title'   => 'QQ按钮底部按钮链接',
                        'default' => 'https://www.ceotheme.com'
                    ),
                ),
            ),
            //微信按钮
            array(
                'id'         => 'goTop_weixin',
                'type'       => 'switcher',
                'title'      => '微信按钮',
                'desc'       => '开启或关闭微信按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'goTop_weixin_sz_top',
                'type'       => 'fieldset',
                'title'      => '微信按钮弹窗设置',
                'dependency' => array('goTop_weixin', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'goTop_weixin_ico',
                        'type'    => 'text',
                        'title'   => '微信按钮图标',
                        'default' => 'ceoicon-wechat-fill',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'           => 'goTop_weixin_bg',
                        'type'         => 'upload',
                        'title'        => '图片',
                        'placeholder'  => 'http://',
                        'button_title' => '上传',
                        'remove_title' => '删除',
                        'default'      => get_template_directory_uri() . '/static/images/ceo-ma119.png',
                        'desc'         =>'二维码图片尺寸119x119'
                    ),
                    array(
                        'id' => 'goTop_weixin_title',
                        'type' => 'text',
                        'title' => '标题',
                        'default' => '微信公众号'
                    ),
                    array(
                        'id' => 'goTop_weixin_content',
                        'type' => 'text',
                        'title' => '描述',
                        'default' => '总裁主题·高端主题'
                    ),
                ),
            ),
            //自定义按钮
            array(
                'id'         => 'goTop_zidingyi',
                'type'       => 'switcher',
                'title'      => '自定义按钮',
                'desc'       => '开启或关闭自定义按钮（开启则显示，关闭则隐藏）',
                'default'    => true
            ),
            array(
                'id'         => 'goTop_zidingyi_sz',
                'type'       => 'repeater',
                'max'        => '5',
                'title'      => '自定义按钮设置',
                'dependency' => array('goTop_zidingyi', '==', true),
                'fields'     => array(
                    array(
                        'id'      => 'goTop_zidingyi_ico',
                        'type'    => 'text',
                        'title'   => '按钮图标',
                        'default' => 'ceoicon-vip-crown-2-line',
                        'desc'    => '<a href="https://www.ceotheme.com/ceoicon/" target="_blank">更换图标代码请点我</a>',
                    ),
                    array(
                        'id'      => 'goTop_zidingyi_bt',
                        'type'    => 'text',
                        'title'   => '按钮标题',
                        'default' => '总裁主题'
                    ),
                    array(
                        'id'      => 'goTop_zidingyi_link',
                        'type'    => 'text',
                        'title'   => '按钮链接',
                        'default' => 'https://www.ceotheme.com'
                    ),
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_qita',
        'title'  => '主题美化设置',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '总裁主题提示您：好看到布灵布灵~但是开启美化效果可能会影响网页速度~请酌情选择，高配服务器使劲造！',
            ),
            array(
                'id'      => 'head_ceo_logo',
                'type'    => 'radio',
                'title'   => 'LOGO闪光效果',
                'desc'    => '隐藏/显示顶部导航LOGO闪光效果（开启则生效，关闭则无效）',
                'inline'  => true,
                'options' => array(
                    'ceo-logo'    => '开启',
                    'ceo-logo-no' => '关闭',
                ),
                'default' => 'ceo-logo'
            ),
            array(
                'id'      => 'ceo_shou',
                'type'    => 'switcher',
                'title'   => '收藏网站提示',
                'desc'    => '开启或关闭弹出收藏网站提示图片（默认关闭）',
                'default' => false
            ),
            array(
                'id'      => 'ceo_shou_img',
                'dependency' => array('ceo_shou', '==', true),
                'type'    => 'upload',
                'title'   => '收藏提示图',
                'default' => get_template_directory_uri() . '/static/images/ceo-shou.png',
            ),
            array(
                'id'      => 'aixintexiao',
                'type'    => 'switcher',
                'title'   => '爱心特效',
                'desc'    => '鼠标点击页面会出现五颜六色爱心特效（开启则生效，关闭则无效）',
                'default' => false
            ),
            array(
                'id'      => 'ceo_bolang',
                'type'    => 'switcher',
                'title'   => '波浪特效',
                'desc'    => '栏目分类与单页面的顶部背景波浪效果（开启则生效，关闭则无效）',
                'default' => false
            ),
            array(
                'id'      => 'ceo_foo_h',
                'type'    => 'switcher',
                'title'   => '左下角活动图片',
                'desc'    => '可以上传动图等活动图片',
                'default' => false
            ),
            array(
                'id'      => 'ceo_foo_h_l',
                'dependency' => array('ceo_foo_h', '==', true),
                'type'    => 'text',
                'title'   => '活动链接',
            ),
            array(
                'id'      => 'ceo_foo_h_img',
                'dependency' => array('ceo_foo_h', '==', true),
                'type'    => 'upload',
                'title'   => '上传主图',
                'default' => get_template_directory_uri() . '/static/images/ceo-foo-y.gif',
            ),
            array(
                'id'       => 'head_js',
                'type'     => 'textarea',
                'title'    => '网站底部自定义JS代码',
                'desc'     => '可用于添加第三方网站流量数据统计代码，如：百度统计或美化效果',
                'sanitize' => false,
                'default'  => '',
            ),
            array(
                'id'       => 'diy_css',
                'type'     => 'code_editor',
                'title'    => '自定义css样式',
                'desc'     => '少量css可以直接写在这里,注意：不需要添加《style》《/style》',
                'settings' => array(
                    'theme' => 'mbo',
                    'mode'  => 'css',
                ),
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent'     => 'ceotheme_qita',
        'title'  => '底部跟随设置',
        'fields' => array(
            array(
                'id'      => 'ceo_kefu',
                'type'    => 'switcher',
                'title'   => '底部跟随效果',
                'desc'    => '开启或关闭底部跟随美化效果',
                'default' => false
            ),
            array(
                'id'         => 'ceo_kefu_sz',
                'type'       => 'fieldset',
                'title'      => '底部跟随模块设置',
                'dependency' => array('ceo_kefu', '==', true),
                'fields'     => array(
                array(
                    'id'      => 'ceo_kefu_img',
                    'type'    => 'upload',
                    'title'   => '右侧跟随图片',
                    'default' => get_template_directory_uri() . '/static/images/ceo-kefu-img.png',
                ),
                array(
                    'id'      => 'ceo_foo_kefu_img',
                    'type'    => 'upload',
                    'title'   => '底部左侧图片',
                    'default' => get_template_directory_uri() . '/static/images/ceo-kefu-img-foo.png',
                ),
                array(
                    'id'      => 'ceo_foo_kefu_title',
                    'type'    => 'text',
                    'title'   => '主标题',
                    'default' => '便捷搜索，快速找到心仪的内容~',
                ),
                array(
                    'id'      => 'ceo_foo_kefu_desc',
                    'type'    => 'text',
                    'title'   => '副标题',
                    'default' => '如有问题，请联系官方客服',
                ),
                ),
            ),
        )
    ));


    /*
     * 优化设置
     * */
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_optimization',
        'icon'  => 'fa fa-rocket',
        'title' => '优化设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_optimization',
        'title'  => '优化加速',
        'fields' => array(
            array(
                'id'       => 'gtb_editor',
                'type'     => 'switcher',
                'title'    => '禁用古腾堡编辑器',
                'default'  => true,
                'subtitle' => '古腾堡用不习惯吗？那就关闭吧！(默认关闭)',
            ),
            array(
                'id'       => 'xmlrpc',
                'type'     => 'switcher',
                'title'    => '禁用xmlrpc',
                'default'  => true,
                'subtitle' => '',
            ),
            array(
                'id'       => 'googleapis',
                'type'     => 'switcher',
                'title'    => '后台禁止加载谷歌字体',
                'default'  => true,
                'subtitle' => '后台禁止加载谷歌字体，加快后台访问速度',
            ),
            array(
                'id'       => 'emoji',
                'type'     => 'switcher',
                'title'    => '禁用emoji表情',
                'default'  => false,
                'subtitle' => '禁用WordPress的Emoji功能和禁止head区域Emoji css加载',
            ),
            array(
                'id'       => 'article_revision',
                'type'     => 'switcher',
                'title'    => '屏蔽文章修订功能',
                'default'  => false,
                'subtitle' => '文章多，修订次数的用户建议关闭此功能',
            ),
            array(
                'id'       => 'ceocache',
                'type'     => 'switcher',
                'title'    => '是否开启缓存加速',
                'default'  => false,
                'subtitle' => '模块缓存',
            ),
            array(
                'id'      => 'ceocache_time',
                'dependency' => array('ceocache', '==', true),
                'type'    => 'text',
                'title'   => '缓存超时时间',
                'desc'    => '缓存超时时间（单位：秒，86400为24小时，建议不修改）功能说明：开启缓存加速后全站数据加速，接近静态化加载页面，在数据无更新时保持缓存状态，在数据更新时自动刷新缓存，数据展示无缝衔接，极大减少服务器耗能、减少SQL数据库查询！',
                'default' => '86400',
            ),
        )
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_optimization',
        'title'  => '精简头部',
        'fields' => array(
            array(
                'id'       => 'toolbar',
                'type'     => 'switcher',
                'title'    => '移除顶部工具条',
                'default'  => true,
                'subtitle' => '这个大家应该都懂',
            ),
            array(
                'id'       => 'rest_api',
                'type'     => 'switcher',
                'title'    => '禁用REST API',
                'default'  => true,
                'subtitle' => '不准备打通WordPress小程序的用户建议关闭',
            ),
            array(
                'id'       => 'wpjson',
                'type'     => 'switcher',
                'title'    => '移除wp-json链接代码',
                'default'  => true,
                'subtitle' => '移除头部区域wp-json链接代码，精简头部区域代码',
            ),
            array(
                'id'       => 'emoji_script',
                'type'     => 'switcher',
                'title'    => '移除头部多余Emoji JavaScript代码',
                'default'  => true,
                'subtitle' => '移除头部多余Emoji JavaScript代码，精简头部区域代码',
            ),
            array(
                'id'       => 'wp_generator',
                'type'     => 'switcher',
                'title'    => '移除头部WordPress版本',
                'default'  => true,
                'subtitle' => '移除头部WordPress版本，精简头部区域代码',
            ),
            array(
                'id'       => 'wp_headcssjs',
                'type'     => 'switcher',
                'title'    => '移除头部JS和CSS链接中的Wordpress版本号',
                'default'  => true,
                'subtitle' => '移除头部JS和CSS链接中的Wordpress版本号，精简头部区域代码',
            ),
            array(
                'id'       => 'rsd_link',
                'type'     => 'switcher',
                'title'    => '移除离线编辑器开放接口',
                'default'  => true,
                'subtitle' => '移除WordPress自动添加两行离线编辑器的开放接口，精简头部区域代码',
            ),
            array(
                'id'       => 'index_rel_link',
                'type'     => 'switcher',
                'title'    => '清除前后文、第一篇文章、主页meta信息',
                'default'  => true,
                'subtitle' => 'WordPress把前后文、第一篇文章和主页链接全放在meta中。我认为于SEO帮助不大，反使得头部信息巨大，建议移出。',
            ),
            array(
                'id'       => 'feed',
                'type'     => 'switcher',
                'title'    => '移除文章、分类和评论feed',
                'default'  => true,
                'subtitle' => '移除文章、分类和评论feed，精简头部区域代码。',
            ),
            array(
                'id'       => 'dns_prefetch',
                'type'     => 'switcher',
                'title'    => '移除头部加载DNS预获取',
                'default'  => true,
                'subtitle' => '移出head区域dns-prefetch代码，精简头部区域代码。',
            ),

        )
    ));
    CSF::createSection($ceotheme, array(
        'id'    => 'ceotheme_admin',
        'icon'  => 'fa fa-desktop',
        'title' => '后台设置',
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_admin',
        'title'  => '文章发布默认选项',
        'fields' => array(
            array(
              'type'    => 'submessage',
              'style'   => 'danger',
              'content' => '以下功能对应发布文章时的默认选项或默认内容，主要用途为提高创作效率【非必填，按需设置】<br /><br />
              例如：当你在这里选择【文章特色标签默认选项】为【推荐】那么每次发布新文章默认就会选择【推荐】',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（缩略图美化样式默认选项）',
            ),
            array(
                'id'      => 'cut_thumb_style_use',
                'type'    => 'radio',
                'inline'  => true,
                'title'   => '缩略图美化样式默认选项',
                'options' => array(
                    '0' => '不启用',
                    '1' => '样式1',
                    '2' => '样式2',
                ),
                'default' => '0',
                'desc'    =>'样式1：主题目录下static/ceo-img-1文件夹里面的随机图片边框<br> 样式2：主题目录下static/ceo-img-2文件夹里面的随机图片边框'
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（资源信息属性默认内容）',
            ),
            array(
                'id'         => 'down_info_use',
                'type'       => 'repeater',
                'title'      => '资源信息属性默认内容',
                'desc'       => '总裁主题温馨提示：标题填写：评分，描述内容填写：1-5数字，即可显示★星星评分图标',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '标题',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '描述内容',
                        'default' => '这里是描述内容',
                    ),
                ),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（文章特色标签默认选项）',
            ),
            array(
                'id'      => 'test_tag_default_use',
                'type'    => 'radio',
                'inline'  => true,
                'title'   => '文章特色标签默认选项',
                'options' => array(
                    'buxuanze' => '不选择',
                    'remen'    => '热门',
                    'dujia'    => '独家',
                    'zuixin'   => '最新',
                    'tuijian'  => '推荐',
                    'jingpin'  => '精品',
                ),
                'default' => 'buxuanze',
                'desc'    => '文章标题前显示特色标签（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（文章自定义标签默认内容）',
            ),
            array(
                'id'      => 'ceo_tese_tag_custom_use',
                'type'    => 'text',
                'title'   => '文章自定义标签默认内容',
                'default' => '',
                'label'   => '为空则不显示',
                'desc'    => '文章标题前显示特色标签（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（【商】图标默认选项）',
            ),
            array(
                'id'      => 'ceo_shang_tag_use',
                'type'    => 'radio',
                'title'   => '【商】图标',
                'inline'  => true,
                'options' => array(
                    'no_shang'  => '不显示',
                    'yes_shang' => '显示',
                ),
                'default' => 'no_shang',
                'desc'    => '文章标题前显示“商”图标（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（【VIP】图标默认选项）',
            ),
            array(
                'id'      => 'ceo_vip_tag_use',
                'type'    => 'radio',
                'title'   => '【VIP】图标',
                'inline'  => true,
                'options' => array(
                    'no_vip'  => '不显示',
                    'yes_vip' => '显示',
                ),
                'default' => 'no_vip',
                'desc'    => '文章标题前显示“VIP”图标（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'parent' => 'ceotheme_admin',
        'title'  => '创建分类默认选项',
        'fields' => array(
            array(
              'type'    => 'submessage',
              'style'   => 'danger',
              'content' => '以下功能对应创建分类时的默认选项或默认内容，主要用途为提高工作效率【非必填，按需设置】<br /><br />
              例如：当你在这里选择【分类列表样式默认选项】为【样式1：双栏列表】那么每次创建新分类默认就会选择【样式1：双栏列表】',
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（分类列表样式默认选项）',
            ),
            array(
                'id'      => 'cat_theme_use',
                'type'    => 'image_select',
                'title'   => '<h3>分类列表样式默认选项</h3>',
                'help'    => '[样式1：双栏列表]  [样式2：卡片列表]  [样式3：博客列表]  [样式4：文本列表]  [样式5：相册列表]  [样式6：软件列表]  [样式7：网站列表]  [样式8：域名列表]  [样式9：视频列表]  [样式10：音乐列表] [样式11：素材列表] [样式12：课程列表] [样式13：图片列表] [样式14：图集列表]',
                'options' => array(
                    '1'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-suanglan.jpg',
                    '2'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-kapian.jpg',
                    '3'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-bianlan.jpg',
                    '4'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-article.jpg',
                    '5'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-xiangce.jpg',
                    '6'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-ruanjian.jpg',
                    '7'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-web.jpg',
                    '8'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-yuming.jpg',
                    '9'  => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-shipin.jpg',
                    '10' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-yinyue.jpg',
                    '11' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-sucai.jpg',
                    '12' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-kecheng.jpg',
                    '13' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-img.jpg',
                    '14' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-imgs.jpg',
                ),
                'default' => '2'
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（分类菜单样式默认选项）',
            ),
            array(
                'id'      => 'cat_catnav_use',
                'type'    => 'image_select',
                'title'   => '<h3>分类菜单样式默认选项</h3>',
                'help'    => '[样式1：全宽菜单]  [样式2：居中菜单]  [样式3：居中上移]  [样式4：双栏菜单]  [样式5：极简菜单]  [样式6：搜索菜单]  [样式7：视频菜单]',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-1.png',
                    '2' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-2.png',
                    '3' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-3.png',
                    '4' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-4.png',
                    '5' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-5.png',
                    '6' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-6.png',
                    '7' => get_template_directory_uri() . '/static/admin-img/ceo-catnav-7.png',
                ),
                'default' => '1'
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（分类商城内页样式默认选项）',
            ),
            array(
                'id'      => 'cat_shop_use',
                'type'    => 'image_select',
                'title'   => '<h3>分类商城内页样式默认选项</h3>',
                'help'    => '[样式1：传统样式]  [样式2：侧栏样式]  [样式3：左栏样式]  [样式4：全宽样式]  [样式5：视频样式]  [样式6：相册样式]  [样式7：阅读样式]',
                'options' => array(
                    '1' => get_template_directory_uri() . '/static/admin-img/ceo-shop1.jpg',
                    '2' => get_template_directory_uri() . '/static/admin-img/ceo-shop2.jpg',
                    '3' => get_template_directory_uri() . '/static/admin-img/ceo-shop3.jpg',
                    '4' => get_template_directory_uri() . '/static/admin-img/ceo-shop4.jpg',
                    '5' => get_template_directory_uri() . '/static/admin-img/ceo-shop5.jpg',
                    '6' => get_template_directory_uri() . '/static/admin-img/ceo-shop6.jpg',
                    '7' => get_template_directory_uri() . '/static/admin-img/ceo-shop7.jpg',
                ),
                'default' => '1'
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（分类五列模式显示默认选项）',
            ),
            array(
                'id'      => 'is_enable_5_col_use',
                'type'    => 'switcher',
                'title'   => '<h3>分类五列模式显示默认选项</h3>',
                'label'   => '',
                'desc'    => '（默认四列）开启后分类文章显示为五列（仅对相册列表、卡片列表、软件列表有效）',
                'default' => false,
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（二级导航分类统计默认开关）',
            ),
            array(
                'id'      => 'is_show_count_use',
                'type'    => 'switcher',
                'title'   => '<h3>二级导航分类统计默认开关</h3>',
                'label'   => '',
                'desc'    => '二级分类有效（一级分类不用开启）',
                'default' => false,
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（分类密码访问默认开关）',
            ),
            array(
                'id'      => 'is_password_access_use',
                'type'    => 'switcher',
                'title'   => '<h3>分类密码访问默认开关</h3>',
                'label'   => '',
                'desc'    => '开启后访问分类需要输入正确密码才能访问（没有特殊需求不用开启该功能）',
                'default' => false,
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '分割线（是否显示在全站资源页面默认开关）',
            ),
            array(
                'id'      => 'cate_forum_enable_use',
                'type'    => 'switcher',
                'title'   => '<h3>是否显示在全站资源页面默认开关</h3>',
                'label'   => '',
                'desc'   => '（为一级分类时有效，且底下有二级分类与内容）',
                'default' => false,
            ),
        ),
    ));
    CSF::createSection($ceotheme, array(
        'title'  => '主题设置备份恢复',
        'parent' => 'ceotheme_admin',
        'fields' => array(
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => '您可以在这里备份或恢复以及导出导入您的主题设置，方便快速迁移复刻网站 （总裁主题提示您：该功能非特殊情况下谨慎使用，以免操作错误~）',
            ),
            array(
                'type' => 'backup',
            ),
        ),
    ));
   
}
