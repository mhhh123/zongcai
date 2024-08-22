<?php if (! defined('ABSPATH')) {
    die;
}
if (class_exists('CSF')) {
    $prefix = 'my_taxonomy_options';
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'category',
        'data_type' => 'unserialize ',
    ));

    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'           => 'cate_background_img',
                'type'         => 'media',
                'title'        => '<h3>分类列表背景图片</h3>',
                'desc'         => '自定义分类列表背景图~未独立设置则自动调用主题设置-分类设置中默认背景图',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => '',
            ),
            array(
                'id'      => 'cat_theme',
                'type'    => 'image_select',
                'title'   => '<h3>选择分类列表样式</h3>',
                'help'    => '[样式1：双栏列表]  [样式2：卡片列表]  [样式3：博客列表]  [样式4：文本列表]  [样式5：相册列表]  [样式6：软件列表]  [样式7：网站列表]  [样式8：域名列表]  [样式9：视频列表]  [样式10：音乐列表] [样式11：素材列表] [样式12：课程列表] [样式13：图片列表] [样式14：图集列表] [样式15：瀑布流列表]',
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
                    '15' => get_template_directory_uri() . '/static/admin-img/ceo-fenlei-pubuliu.jpg',
                ),
                'default' => _ceo('cat_theme_use'),
            ),
            array(
                'id'      => 'cat_catnav',
                'type'    => 'image_select',
                'title'   => '<h3>选择分类菜单样式</h3>',
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
                'default' => _ceo('cat_catnav_use'),
            ),
            array(
                'id'           => 'cate_background_video',
                'type'         => 'media',
                'title'        => '<h3>上传背景视频</h3>',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => '',
                'dependency'   => array('cat_catnav', '==', 7),
            ),
            array(
                'id'      => 'cat_shop',
                'type'    => 'image_select',
                'title'   => '<h3>选择分类商城内页样式</h3>',
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
                'default' => _ceo('cat_shop_use'),
            ),
        )
    ));

    //自定义SEO标题
    if (true) {
        $fields_arr = [
            array(
                'id'    => 'seo-title',
                'type'  => 'text',
                'title' => '自定义SEO标题',
                'help'  => '不设置则遵循WP标题规则',
            ),
            array(
                'id'    => 'seo-keywords',
                'type'  => 'textarea',
                'title' => '自定义SEO关键词',
                'help'  => '自定义SEO关键词,用英文逗号隔开',
            ),
            array(
                'id'    => 'seo-description',
                'type'  => 'textarea',
                'title' => '自定义SEO描述',
                'help'  => '自定义SEO描述',
            )
        ];
    }
    CSF::createSection($prefix, array(
        'fields' => $fields_arr
    ));
    //自定义SEO标题

    $prefix_sitecat='my_taxonomy_options_sitecat';
    CSF::createTaxonomyOptions($prefix_sitecat, array(
        'taxonomy'  => 'sitecat',
        'data_type' => 'unserialize ',
    ));

    CSF::createSection($prefix_sitecat, array(
        'fields' => array(
            array(
                'id'      => 'cate_keywords_custom',
                'type'    => 'textarea',
                'title'   => '自定义关键词',
                'default' => '',
            ),
        )
    ));

    CSF::createSection('my_taxonomy_options', array(
    'fields' => array(
        array(
            'id'      => 'thumbnail_px_custom',
            'type'    => 'dimensions',
            'title'   => '<h3>分类缩略图尺寸</h3>',
            'desc'    => '自定义分类列表的文章缩略图宽高，0为使用全局默认',
            'default' => array(
                'width'  => '0',
                'height' => '0',
                'unit'   => 'px',
            ),
        ),
        array(
            'id'      => 'is_enable_5_col',
            'type'    => 'switcher',
            'title'   => '<h3>分类五列模式显示</h3>',
            'label'   => '',
            'desc'    => '（默认四列）开启后该分类文章显示为五列（仅对相册列表、卡片列表、软件列表有效）',
            'default' => _ceo('is_enable_5_col_use'),
        ),
        array(
            'id'      => 'is_show_count',
            'type'    => 'switcher',
            'title'   => '<h3>是否显示二级导航分类统计</h3>',
            'label'   => '',
            'desc'    => '二级分类有效（一级分类不用开启）',
            'default' => _ceo('is_show_count_use'),
        ),
        array(
            'id'      => 'is_password_access',
            'type'    => 'switcher',
            'title'   => '<h3>是否开启密码访问</h3>',
            'label'   => '',
            'desc'    => '开启后访问这个分类需要输入正确密码才能访问（没有特殊需求不用开启该功能）',
            'default' => _ceo('is_password_access_use'),
        ),
        array(
            'id'      => 'category_password_access',
            'type'    => 'text',
            'title'   => '访问密码',
            'desc'    => '请输入访问这个分类的密码',
            'default' => '',
            'dependency' => array('is_password_access', '==', true)
        ),
        array(
            'id'      => 'cate_forum_enable',
            'type'    => 'switcher',
            'title'   => '<h3>是否显示在全站资源页面</h3>',
            'label'   => '',
            'desc'   => '（为一级分类时有效，且底下有二级分类与内容）',
            'default' => _ceo('cate_forum_enable_use'),
        ),
        array(
            'id'      => 'cate_forum_sort',
            'type'    => 'text',
            'title'   => '全站资源页面排序',
            'desc'    => '请输入排序数字',
            'default' => '',
            'dependency' => array('cate_forum_enable', '==', true)
        ),
    )
));
}

//论坛
if (class_exists('CSF')) {
    $prefix = 'forum_options';
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy' => 'forum_cat',
        'data_type' => 'unserialize ',
    ));

    //自定义SEO标题
    if (true) {
        $fields_arr = [
            array(
                'id'    => 'seo-title',
                'type'  => 'text',
                'title' => '自定义SEO标题',
                'help'  => '不设置则遵循WP标题规则',
            ),
            array(
                'id'    => 'seo-keywords',
                'type'  => 'textarea',
                'title' => '自定义SEO关键词',
                'help'  => '自定义SEO关键词,用英文逗号隔开',
            ),
            array(
                'id'    => 'seo-description',
                'type'  => 'textarea',
                'title' => '自定义SEO描述',
                'help'  => '自定义SEO描述',
            )
        ];
    }
    CSF::createSection($prefix, array(
        'fields' => $fields_arr
    ));
    //自定义SEO标题

    CSF::createSection($prefix, array(
        'fields' => array(
            array(
                'id'           => 'cate_forum_img',
                'type'         => 'media',
                'title'        => '论坛分类图标',
                'button_title' => '上传',
                'remove_title' => '删除',
                'default'      => '',
            ),
        )
    ));
}


//问答
if (class_exists('CSF')) {
    $prefix = 'question_options';
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy' => 'question_cat',
        'data_type' => 'unserialize ',
    ));

    //自定义SEO标题
    if (true) {
        $fields_arr = [
            array(
                'id'    => 'seo-title',
                'type'  => 'text',
                'title' => '自定义SEO标题',
                'help'  => '不设置则遵循WP标题规则',
            ),
            array(
                'id'    => 'seo-keywords',
                'type'  => 'textarea',
                'title' => '自定义SEO关键词',
                'help'  => '自定义SEO关键词,用英文逗号隔开',
            ),
            array(
                'id'    => 'seo-description',
                'type'  => 'textarea',
                'title' => '自定义SEO描述',
                'help'  => '自定义SEO描述',
            )
        ];
    }
    CSF::createSection($prefix, array(
        'fields' => $fields_arr
    ));
    //自定义SEO标题

    CSF::createSection($prefix, array(
        'fields' => array(

        )
    ));
}
