<?php
if (!defined('ABSPATH')) {
    exit; // 防止直接访问
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="applicable-device"content="pc,mobile">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
if(_ceo('tpl_seo')){
    include_once("inc/functions/seo.php");
}else{
    ?>

<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php } ?>
<link rel="stylesheet" href="https://at.alicdn.com/t/c/font_4073586_5fq4g109min.css"/>
<link rel="stylesheet" href="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="<?php echo _ceo('favicon'); ?>"/>
<?php wp_head();?>

</head>
	<body id="ceotheme" class="<?php echo($_COOKIE['night'] == '1' ? 'night' : ''); ?>">
        <?php
        if (_ceo('all_night_theme') == true) {
            echo '<script>var all_night_theme=true;</script>';
        }else{
            echo '<script>var all_night_theme=false;</script>';
        }
        if (_ceo('is_switch_day_night') == true) {
            echo '<script>var is_switch_day_night=true;</script>';
        }else{
            echo '<script>var is_switch_day_night=false;</script>';
        }
        ?>

	    <style>
		<?php echo _ceo('diy_css'); ?>
	    </style>
		<div class="ceo-background-muted site ceo-zz-background" <?php if(_ceo('ceo_bg') == true): ?>style="background: #f8f8f8 url(<?php echo _ceo('ceo_bg_img'); ?>) repeat;"<?php endif; ?>>
			<?php ceo_header_top(); ?>