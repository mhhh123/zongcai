<?php get_header();?>
<style>
.main-menu-wrap,footer{display:none}
.form-popup {margin:100px auto}
.form-popup .popup-title{font-size:1.2em;display:inline-block}
.form-popup .popup-title a{color:#2e3b3e}
.form-popup span{padding:0 5px}
</style>
<?php include get_template_directory().'/user/binding/'.$action.'.php'; ?>
<?php get_footer(); ?>