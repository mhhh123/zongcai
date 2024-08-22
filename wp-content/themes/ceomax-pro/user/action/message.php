<?php
$subpage='messages';
$current_tab['slug']='messages';
?>
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>我的私信</h2>
    </div>
    <?php if( isset($GLOBALS['validation']) && empty( $GLOBALS['validation']['error'] ) ) { ?>
        <div class="alert alert-success" role="alert">
            <div class="close" data-dismiss="alert"><?php CEO::icon('close');?></div>
            <?php _e( 'Updated successfully.', 'ceo' ); ?>
        </div>
    <?php } ?>
    <?php do_action( 'ceo_account_tabs_' . $subpage ); ?>
</div>

<?php
add_action('get_footer', function () {
    wp_enqueue_script('js2021', get_template_directory_uri() . '/static/js/js21.js', ['jquery']);
});
?>
