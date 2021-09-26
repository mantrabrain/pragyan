<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="//gmpg.org/xfn/11">

	<?php

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

$header_top_show = (boolean)pragyan_get_option('header_top_show');

$sticky_header_enable = (boolean)pragyan_get_option('enable_sticky_header');

do_action('wp_body_open');


?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'pragyan'); ?></a>

	<?php

	do_action('pragyan_after_page_start');

	$site_content_class = 'site-content';
	?>
	<div id="content" class="<?php echo esc_attr($site_content_class); ?>">

<?php do_action('pragyan_after_content_start');
