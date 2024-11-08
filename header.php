<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

	<?php wp_head(); ?>
</head>

<body  <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site <?php echo get_the_title(); ?>">
	<?php if (wp_is_mobile()) { ?>
		<span class="button_mobile">
			<span></span>
			<span></span>
			<span></span>
		</span>
	<?php } ?>
	<header id="masthead" class="header 
	<?php
	if (wp_is_mobile()) {
		echo ' mobile';
	};
	if (!is_front_page()) {
		echo ' sticky';
	}
	?>" role="banner">
		<?php get_template_part('template-parts/navigation/primary'); ?>
	</header><!-- #masthead -->
	<main id="main-content" role="main">
		