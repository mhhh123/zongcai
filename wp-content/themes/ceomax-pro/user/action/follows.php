<?php
$subpage='follows';
$current_tab['slug']='follows';

?>
<div class="b-r-4 ceo-background-default">
    <div class="b-b user-title-top">
        <h2>我的关注</h2>
    </div>
    <div class="ceo-profile">
        <?php if($tabs){ ?>
        <ul class="ceo-profile-nav">
            <?php $default = current($tabs); foreach ( $tabs as $tab ) {
                $tab_url = ceo_profile_url( $profile, $tab['slug']==$default['slug']?'':$tab['slug'] );
                $tab_html = '<a href="' . $tab_url . '">'.$tab['title'].'</a>'; ?>
                <li<?php echo $tab['slug']==$subpage?' class="active"':'';?>>
                    <?php echo apply_filters( 'ceo_profile_tab_url', $tab_html, $tab, $tab_url );?>
                </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <div class="ceo-profile-main profile-<?php echo $subpage;?>">
            <?php do_action( 'ceo_profile_tabs_' . $subpage );?>
        </div>
    </div>
</div>

<?php
add_action('get_footer', function () {
    wp_enqueue_script('js2021', get_template_directory_uri() . '/static/js/js21.js', ['jquery']);
});
?>
