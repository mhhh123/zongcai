<?php if ( ! defined( 'ABSPATH' )  ) { die; }

//资源信息模块
if( class_exists( 'CSF' ) ) {
	$prefix_info = 'ceo_post_info';
	CSF::createMetabox($prefix_info, array(
        'title'     => '<span class="ceotheme_com"><i class="fa fa-laptop"></i> CeoMax-Pro主题 - 资源信息配置</span>',
        'nav'       => 'inline',
		'post_type' => 'post',
		'data_type' => 'unserialize',
		'context'   => 'normal',
    ));

    CSF::createSection($prefix_info, array(
	    'title'  => '资源信息',
        'fields' => array(
            //缩略图背景样式
            array(
                'id'      => 'cut_thumb_style',
                'type'    => 'radio',
                'inline'  => true,
                'title'   => '缩略图背景样式',
                'options' => array(
                    '0' => '不启用',
                    '1' => '样式1',
                    '2' => '样式2',
                ),
                'default' => _ceo('cut_thumb_style_use'),
                'desc'    =>'样式1：主题目录下static/ceo-img-1文件夹里面的随机图片边框<br> 样式2：主题目录下static/ceo-img-2文件夹里面的随机图片边框'
            ),
            //演示地址
            array(
                'id'      => 'down_demourl',
                'type'    => 'text',
                'title'   => '演示地址',
                'label'   => '为空则不显示',
                'desc'    => '填写地址后内页会显示演示地址按钮，为空则不显示按钮（请以http://或https://开头）',
            ),
            //信息属性
            array(
                'id'      => 'down_info',
                'type'    => 'repeater',
                'title'   => '信息属性',
                'desc'    => '总裁主题温馨提示：标题填写：评分，描述内容填写：1-5数字，即可显示★星星评分图标',
                'fields'  => array(
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
                'default' => _ceo('down_info_use'),
            ),
        ),
    ));
    
    CSF::createSection($prefix_info, array(
    'title'  => '资源标签',
    'fields' => array(
            //特色标签
            array(
                'id'      => 'ceo-tese-tag',
                'type'    => 'radio',
                'title'   => '文章特色标签',
                'inline'  => true,
                'options' => array(
                    'buxuanze' => '不选择',
                    'default'  => '默认',
                    'remen'    => '热门',
                    'dujia'    => '独家',
					'zuixin'   => '最新',
					'tuijian'  => '推荐',
					'jingpin'  => '精品',
                ),
                'default' => _ceo('test_tag_default_use'),
                'desc'    => '文章标题前显示特色标签（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
            //自定义标签
            array(
                'id'      => 'ceo-tese-tag-custom',
                'type'    => 'text',
                'title'   => '文章自定义标签',
                'label'   => '为空则不显示',
                'desc'    => '文章标题前显示特色标签（选择对应标签后会显示在文章列表和文章内页标题前）',
                'default' => _ceo('ceo_tese_tag_custom_use'),
            ),
            //商图标
            array(
                'id'      => 'ceo-shang-tag',
                'type'    => 'radio',
                'title'   => '【商】图标',
                'inline'  => true,
                'options' => array(
                    'no_shang'   => '不显示',
                    'yes_shang'  => '显示',
                ),
                'default' => _ceo('ceo_shang_tag_use'),
                'desc'    => '文章标题前显示“商”图标（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
            //VIP图标
            array(
                'id'      => 'ceo-vip-tag',
                'type'    => 'radio',
                'title'   => '【VIP】图标',
                'inline'  => true,
                'options' => array(
                    'no_vip'   => '不显示',
                    'yes_vip'  => '显示',
                ),
                'default' => _ceo('ceo_vip_tag_use'),
                'desc'    => '文章标题前显示“VIP”图标（选择对应标签后会显示在文章列表和文章内页标题前）',
            ),
        )
	) );
	CSF::createSection($prefix_info, array(
	    'title'  => '扩展模块',
        'fields' => array(
            array(
                'id'    => 'image_pagination',
                'type'  => 'switcher',
                'title' => '图片分页',
                'desc'  => '该模块功能仅适用于商城内页样式6'
            ),
            array(
                'id'      => 'image_pagination_num',
                'type'    => 'select',
                'inline'  => true,
                'title'   => '文章图片自动分页设置',
                'label'   => '每页图片数',
                'options' => array(
                    '0'  => '不分页',
                    '1'  => '每页1张图片',
                    '2'  => '每页2张图片',
                    '4'  => '每页4张图片',
                    '6'  => '每页6张图片',
                    '8'  => '每页8张图片',
                    '10' => '每页10张图片'
                ),
                'default' => '0',
                'dependency' => array('image_pagination', '==', 'true'),
            ),
            array(
                'id'    => 'enable_audio',
                'type'  => 'switcher',
                'title' => '音频模块',
            ),
            array(
                'id'    => 'audio_url',
                'type'  => 'text',
                'dependency' => array('enable_audio', '==', 'true'),
                'title' => '音频播放地址',
                'desc'  => '音频播放地址 列表默认调用第1条',
            ),
            array(
                'id'         => 'list_audio',
                'type'       => 'repeater',
                'dependency' => array('enable_audio', '==', 'true'),
                'title'      => '更多音频列表',
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '标题',
                    ),
                    array(
                        'id'      => 'link',
                        'type'    => 'text',
                        'title'   => '播放地址',
                        'default' => '',
                    ),
                ),
            ),
            array(
                'id'    => 'post_video_url',
                'type'  => 'upload',
                'title' => '视频模块',
                'desc'  => '可直接上传MP4视频，同时也可以填写MP4视频地址，或者使用第三方视频分享代码，如B站、腾讯视频、优酷等。',
            ),
            array(
    			'id'    => 'down_show',
    			'type'  => 'switcher',
    			'title' => '免费下载',
                'desc'  => '这是独立的下载模块，在文章底部展示下载按钮',
    		),
    		array(
    			'id'          => 'down_login',
    			'type'        => 'select',
    			'dependency'  => array('down_show', '==', true),
    			'title'       => '选择登录状态',
    			'placeholder' => '选择登录状态',
    			'options'     => array(
    				'1'  => '免登录下载',
    				'2'  => '登录后下载',
    			),
    			'default'     => '1'
    		),
    		array(
    			'id'         => 'down_title',
    			'type'       => 'text',
    			'dependency' => array('down_show', '==', true),
    			'title'      => '资源标题',
    			'desc'       => '选填'
    		),
    		array(
    			'id'         => 'down_des',
    			'type'       => 'text',
    			'dependency' => array('down_show', '==', true),
    			'title'      => '资源简介',
    			'desc'       => '选填'
    		),
    		array(
    			'id'         => 'down_code',
    			'type'       => 'text',
    			'dependency' => array('down_show', '==', true),
    			'title'      => '解压码/提取码/其他信息',
    		),
    		array(
    			'id'         => 'down_url',
    			'type'       => 'text',
    			'dependency' => array('down_show', '==', true),
    			'title'      => '下载链接',
    		),
        ),
    ) );
    
    CSF::createSection($prefix_info, array(
	    'title'  => '自定义SEO',
        'fields' => array(
            array(
                'id'      => 'ceo-seo-title',
                'type'    => 'text',
                'title'   => '自定义SEO标题',
                'desc'    => '填写自定义SEO标题，未填写则调用默认文章标题',
            ),
            array(
                'id'      => 'ceo-seo-keywords',
                'type'    => 'text',
                'title'   => '自定义SEO关键词',
                'desc'    => '填写自定义SEO关键词，未填写则调用默认文章标签',
            ),
            array(
                'id'      => 'ceo-seo-description',
                'type'    => 'textarea',
                'title'   => '自定义SEO描述',
                'desc'    => '填写自定义SEO描述，未填写则调用默认文章内容前段',
            ),
        )
	) );
}

if( class_exists( 'CSF' ) ) {
    $prefix = 'my_post_custom_url_image';
    CSF::createMetabox($prefix, array(
        'title'     => '自定义外链特色图片',
        'post_type' => 'post',
        'context'   => 'side',
        'priority'  => 'low',
        'data_type' => 'unserialize',
        'class'     => 'my_post_custom_url_image',
    ));
    CSF::createSection($prefix, [
        'fields' => array(
            [
                'id'          => 'custom_url_image',
                'type'        => 'text',
                'title'       => '',
                'placeholder' => '自定义外链',
                'desc'        => '自定义外链填写了就优先调用',
            ]

        )
    ]);
}

//页面自定义SEO模块
if( class_exists( 'CSF' ) ) {
$ceo_page_customseo = 'ceo_page_customseo';
    CSF::createMetabox( $ceo_page_customseo, array(
        'title'     => '<span class="ceotheme_com"><i class="fa fa-laptop"></i> CeoMax-Pro主题 - 页面自定义SEO</span>',
        'post_type' => 'page',
        'data_type' => 'unserialize',
        'show_restore' => true,

    ) );
    CSF::createSection($ceo_page_customseo, array(
        'fields' => array(
            array(
                'id'      => 'ceo-seo-title',
                'type'    => 'text',
                'title'   => '自定义SEO标题',
                'desc'    => '填写自定义SEO标题，未填写则调用默认文章标题',
            ),
            array(
                'id'      => 'ceo-seo-keywords',
                'type'    => 'text',
                'title'   => '自定义SEO关键词',
                'desc'    => '填写自定义SEO关键词，未填写则调用网站关键词',
            ),
            array(
                'id'      => 'ceo-seo-description',
                'type'    => 'textarea',
                'title'   => '自定义SEO描述',
                'desc'    => '填写自定义SEO关键词，未填写则默认无',
            ),

        )

    ) );
}