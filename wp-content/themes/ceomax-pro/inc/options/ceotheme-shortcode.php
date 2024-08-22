<?php if (! defined('ABSPATH')) {
    die;
}

if (class_exists('CSF')) {
    $prefix = 'my_shortcodes';

    CSF::createShortcoder($prefix, array(
        'button_title' => '引用站内文章',
        'select_title' => '选择站内文章',
        'insert_title' => '插入站内文章',
    ));

    CSF::createSection($prefix, array(
        'title'     => '引用站内文章',
        'view'      => 'normal',
        'shortcode' => 'xx_insert_post',
        'fields'    => array(
            array(
                'id'       => 'station_article',
                'type'     => 'select',
                'title'    => '选择站内文章',
                'desc'     => '文章内引用站内其他文章对SEO优化有很大帮助！',
                'options'  => 'posts',
                'chosen'   => true,
                'ajax'     => true,
                'multiple' => true,
                'sortable' => true,
            ),
        )
    ));

  
}