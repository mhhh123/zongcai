<?php
$website_title = _ceo('website_title');
$website_keywords = _ceo('website_keywords');
$website_description = _ceo('website_description');
?>
<title><?php
	if ( is_home() ) {
		if ($website_title == null) {
			echo '请在后台主题设置SEO设置中填写网站名称 - 总裁主题';
		}else {
			echo $website_title;
		}
	}elseif ( is_category() ) {
        $cat_ID  = get_query_var('cat');
        $seo_str = get_term_meta($cat_ID, 'seo-title', true);
        if($seo_str){
            echo $seo_str;
        }else{
            _e(trim(wp_title('', 0)));
        }
        _e(' - ');
        $paged = get_query_var('paged');
        if ($paged > 1) {
            printf('第%s页 - ', $paged);
        }
        bloginfo('name');
	}elseif ( get_post_type() == 'site'  ) {
		_e(trim(wp_title('',0)));_e(' - ');bloginfo('name');
	}elseif ( is_single() ){
        $seo_title = get_post_meta(get_the_ID(), 'ceo-seo-title', 1);
        if($seo_title){
            echo $seo_title.(' - ').get_bloginfo('name');
        }else{
            _e(trim(wp_title('',0)));_e(' - ');bloginfo('name');
        }
	}elseif ( is_search() ) {
		_e('搜索 '); $key = wp_specialchars($s, 1); _e($key.' '); _e('的相关内容 - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
	}elseif ( is_404() ) {
		_e('抱歉，您访问的页面走丢了 - '); bloginfo('name');
	}elseif ( is_author() ) {
		_e('「');_e(trim(wp_title('',0)));_e('」的个人主页 - ');bloginfo('name');
	}elseif(is_page()){
        $seo_title = get_post_meta(get_the_ID(), 'ceo-seo-title', 1);
        if($seo_title){
            echo $seo_title.(' - ').get_bloginfo('name');
        }else{
            _e(trim(wp_title('',0)));_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
        }
	}elseif ( is_month() ) {
		the_time('Y年n月');_e('的文章归档');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
	}elseif ( is_day() ) {
		the_time('Y年n月j日');_e('的文章归档');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
	}elseif (function_exists('is_tag') && is_tag()){
		if ( is_tag() ) {
			_e('');single_tag_title("", true);_e(' 相关文章列表');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
		}
	}else{
        if(is_archive() && (is_tax('question_cat') || is_tax('forum_cat'))){
            $seo_title = get_term_meta(get_queried_object_id(), 'seo-title', true);
            if ( ! $seo_title) {
                $term_current=get_term(get_queried_object_id());
                echo $term_current->name;_e(' - ');bloginfo('name');
            } else {
                echo $seo_title;_e(' - ');bloginfo('name');
            }
        }else if(!empty(get_queried_object_id())){
            $term_current=get_term(get_queried_object_id());
            echo $term_current->name;
        }else if(is_archive() && $_SERVER['REQUEST_URI'] == '/question'){
            echo _ceo('seo-question-title');_e(' - ');bloginfo('name');
        }else if(is_archive() && $_SERVER['REQUEST_URI'] == '/forum'){
            echo _ceo('seo-forum-title');_e(' - ');bloginfo('name');
        }else{
            echo get_the_title();
        }
    }
	?>
</title>
<?php
$keywords = $website_keywords;
$description = $website_description;
if (is_home()){
	$keywords = $keywords;
	$description = $description;
} elseif ( is_category() ) {
		$description = category_description();
		$keywords = $keywords;
		
    if ($cate_keywords_custom = get_term_meta($cat, 'cate_keywords_custom', 1)) {
        $keywords = trim($cate_keywords_custom);
    }

    //关键词与描述seo
    $cat_ID              = get_query_var('cat');
    $seo_str_keywords    = get_term_meta($cat_ID, 'seo-keywords', true);
    $seo_str_description = get_term_meta($cat_ID, 'seo-description', true);
    if ($seo_str_keywords) {
        $keywords = $seo_str_keywords;
    }
    if ($seo_str_description) {
        $description = $seo_str_description;
    }
}elseif(is_archive() && is_tax('question_cat')){
    $seo_keywords = get_term_meta(get_queried_object_id(), 'seo-keywords', true);
    if ($seo_keywords) {
        $keywords = $seo_keywords;
    }
    $seo_description = get_term_meta(get_queried_object_id(), 'seo-description', true);
    if ($seo_description) {
        $description = $seo_description;
    }

}elseif (is_archive() && is_tax('forum_cat')) {
    $seo_keywords = get_term_meta(get_queried_object_id(), 'seo-keywords', true);
    if ($seo_keywords) {
        $keywords = $seo_keywords;
    }
    $seo_description = get_term_meta(get_queried_object_id(), 'seo-description', true);
    if ($seo_description) {
        $description = $seo_description;
    }
} elseif (is_tax('sitecat')) {
    $description = trim(strip_tags(get_term_field('description', get_queried_object()->term_id)));
    $keywords    = $keywords;
    if ($cate_keywords_custom = get_term_meta(get_queried_object()->term_id, 'cate_keywords_custom', 1)) {
        $keywords = trim($cate_keywords_custom);
    }
} elseif (is_single()) {
    $keywords      = '';
    $single_cat    = get_the_category();
    $single_cat_id = $single_cat[0]->cat_ID;
    if (wp_get_post_tags($post->ID)) {
        $tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag) {
            $keywords = $tag->name . "," . $keywords;
        }
    } else {
//		$keywords = $website_keywords;
    }
    if ($post->post_excerpt) {
        $description = $post->post_excerpt;
    } else {
        global $more;
        $more        = 1; //1=全文 0=摘要
        $postID      = get_the_ID();
        $my_content  = get_post($article_id)->post_content;
        $my_content  = wp_trim_words($my_content, 160, '...');
        $description = $my_content;
    }
    if ($keywords) {
        $keywords = trim($keywords, ',');
    }

    if ( ! empty(get_post_meta(get_the_ID(), 'ceo-seo-keywords', 1))) {
        $keywords = get_post_meta(get_the_ID(), 'ceo-seo-keywords', 1);
    }
    if ( ! empty(get_post_meta(get_the_ID(), 'ceo-seo-description', 1))) {
        $description = trim(get_post_meta(get_the_ID(), 'ceo-seo-description', 1));
    }

} elseif (is_page()) {
    if ( ! empty(get_post_meta(get_the_ID(), 'ceo-seo-keywords', 1))) {
        $keywords = get_post_meta(get_the_ID(), 'ceo-seo-keywords', 1);
    }
    if ( ! empty(get_post_meta(get_the_ID(), 'ceo-seo-description', 1))) {
        $description = trim(get_post_meta(get_the_ID(), 'ceo-seo-description', 1));
    }
} elseif (function_exists('is_tag')) {
    if (is_tag()) {
        $keyword     = '';
        $keywords    = trim(wp_title('', 0));
        $description = '标签为 ' . trim(wp_title('', 0)) . ' 的相关文章 - ' . $blog_title = get_bloginfo('name');
    }
}if ( is_search() ) {
	$keywords = $index_keywords;
	$description = $key;
}

//问答与论坛 SEO单独设置 关键词与描述
if(is_archive() && $_SERVER['REQUEST_URI'] == '/question'){
    $keywords = _ceo('seo-question-keywords');
    $description = _ceo('seo-question-description');
}else if(is_archive() && $_SERVER['REQUEST_URI'] == '/forum'){
    $keywords = _ceo('seo-forum-keywords');
    $description = _ceo('seo-forum-description');
}

?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
