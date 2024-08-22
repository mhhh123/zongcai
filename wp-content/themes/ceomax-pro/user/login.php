<?php ob_start(); ?>

<?php get_header();?>

<?php include get_template_directory().'/user/login/'.$action.'.php'; ?>

<?php get_footer(); ?>