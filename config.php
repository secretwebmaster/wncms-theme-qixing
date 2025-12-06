<?php

if (!defined('WNCMS_THEME_START')) {
    http_response_code(403);
    exit('403 Forbidden');
}

return [

    /**
     * Theme info
     */
    'info' => [
        'id' => 'qixing',
        'type' => 'directory',
        'name' => [
            'zh_TW' => '七星主题',
            'zh_CN' => '七星主题',
            'en' => 'Seven stars Theme',
        ],
        'description' => [
            'zh_TW' => '好看的导航主题',
            'zh_CN' => '好看的导航主题',
            'en' => '好看的导航主题',
        ],
        'author' => '文尼先生',
        'version' => '2.0.0',
        'created_at' => '2025-01-04',
        'updated_at' => '2025-12-06',
        'demo_url' => 'https://qixing200.wntheme.com',
    ],

    /**
     * Theme option tabs
     */
    'option_tabs' => [

        /**
         * 一般
         */
        'general' => [
            [
                'label' => '一般',
                'type' => 'heading',
            ],
            [
                'label' => 'APP下载文字',
                'name' => 'item_app_button_text',
                'type' => 'text',
            ],
            [
                'label' => '懒加载',
                'name' => 'thumbnail_placeholder',
                'type' => 'image',
                'width' => 100,
                'height' => 100,
            ],
        ],

        /**
         * 页首
         */
        'header' => [
            [
                'label' => '页首',
                'type' => 'heading',
            ],
            [
                'label' => '显示收藏按钮',
                'name' => 'show_favorite_button',
                'type' => 'boolean',
            ],
            [
                'label' => '顶部跑马灯文字',
                'name' => 'header_marquee_text',
                'type' => 'text',
            ],
            [
                'label' => '页首分类',
                'name' => 'header_link_category',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
            ],
        ],

        /**
         * 链接
         */
        'link' => [
            [
                'label' => '首页',
                'type' => 'heading',
            ],
            [
                'label' => '首页图标分类',
                'name' => 'home_link_category',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
            ],
            [
                'label' => '分页链接风格',
                'type' => 'heading',
                'description' => '只有在分页时才会生效，没有设定风格的分类，默认以APP图标显示',
            ],
            [
                'label' => '格网卡片',
                'name' => 'link_style_item_card_grid',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '格网商品',
                'name' => 'link_style_item_product_grid',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '女生列表',
                'name' => 'link_style_item_girl_list',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
        ],

        /**
         * 页脚
         */
        'footer' => [
            [
                'label' => '页脚',
                'type' => 'heading',
                'description' => '包含以下分类的链接，均会显示在每个分页底部',
            ],
            [
                'label' => '小卡片分类',
                'name' => 'link_style_item_card_small',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '文字链接分类',
                'name' => 'link_style_item_text',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '大卡片分类',
                'name' => 'link_style_item_card_large',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '轮播卡片分类',
                'name' => 'link_style_item_card_carousel',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
            [
                'label' => '轮播商品分类',
                'name' => 'link_style_item_product_carousel',
                'type' => 'tagify',
                'options' => 'tags',
                'tag_type' => 'link_category',
                'limit' => 1,
            ],
        ],

        /**
         * 自订程式码
         */
        'custom_code' => [
            [
                'label' => '自订代码',
                'type' => 'heading',
            ],
            [
                'label' => '自订头部css',
                'name' => 'head_css',
                'type' => 'textarea',
                'description' => '不需加上<style>标签，会出现在head标签内',
            ],
            [
                'label' => '自订css',
                'name' => 'custom_css',
                'type' => 'textarea',
                'description' => '不需加上<style>标签，出现在页面最下方',
            ],
        ],

    ],

    /**
     * Theme default values
     */
    'default' => [
        'header_marquee_text' => '检测到当前浏览器已拦截本站部分色情APP，如APP图标无法点击，请复制网址尝试不同浏览器',
    ],

    /**
     * Static pages
     */
    'pages' => [],

    /**
     * Dynamic page templates
     */
    'templates' => [],

    /**
     * Widgets
     */
    'widgets' => [],

];
