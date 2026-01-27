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

  <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lfq53cqAAAAAAxaMZA1_2vSeORyAczZQeDTY9LZ"></script>

	<?php wp_head(); ?>

<!-- Balises Open Graph générales -->
<meta property="og:title" content="Kyodai - Atelier d'impression" />
<meta property="og:description" content="Impression de qualité à Caen" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Kyodai" />
<meta property="og:author" content="Kyodai" />


<?php
// Définir l'image par défaut pour Open Graph
$image_url = get_template_directory_uri() . '/image.png';

if (file_exists(get_template_directory() . '/image.png')) {
    echo '<meta property="og:image" content="' . esc_url($image_url) . '" />';
}

// URL principale du site
echo '<meta property="og:url" content="' . esc_url(home_url()) . '" />';
?>
	
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
		