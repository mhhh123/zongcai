<?php
//目录密码访问 用到session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
get_header();

$term               = get_category(get_query_var('cat'));

$category_can_access = category_can_access($term);
//目标密码访问功能 end;

?>
<?php
if ( $category_can_access) {
    ceo_category_cat_nav();
}

?>
<section class="ceo-container">
    <?php
    if($category_can_access){
        ceo_category_tpl_part();
    }else{
        get_template_part( 'template-parts/category/category', 'password' );
    }

    ?>
</section>

<?php if ( _ceo('cat_ad_show') == true): ?>
<section class="ceo-margin-medium-bottom">
	<?php get_template_part( 'template-parts/ad/category', 'footer_ad' ); ?>
</section>
<?php endif;  ?>

<!--分类搜索框-->
<?php if(is_category()){?>
<script>
    $(function () {
        $(".list_search").on("click",function () {
            location.href='/?cat=<?php echo get_queried_object_id(); ?>&s='+$('.list_keywords').val()
        })
        $(".list_keywords").on("keydown",function (e) {
            if(e.keyCode==13){
                $(".list_search").trigger("click");
            }
        })
    })
</script>
<?php }?>
<!--分类搜索框-->
<?php get_footer(); ?>