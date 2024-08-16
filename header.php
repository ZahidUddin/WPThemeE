<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPThemeE
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<link href="https://db.onlinewebfonts.com/c/0fb11be8781037453723dda767b71596?family=Geogrotesque+Regular" rel="stylesheet">

<script src="https://assets.flex.twilio.com/releases/flex-webchat-ui/2.9.4/twilio-flex-webchat.min.js" integrity="sha512-dTCuWmpLM5hU93AkDjgZjRGT0dKNwJZgriDAVq6ToVtdr3SBFByDMqlRxg7BuXAuv2sgNcWZdUGt5mWjHK3x1A==" crossorigin="anonymous" type="text/javascript"></script>


<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>




<!-- Cloudflare:Zaraz handles Google tag (gtag.js) -->
<!-- Cloudflare:Zaraz handles Hubspot -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'WPThemeE'); ?></a>

		<header class="header">
			<nav class="header__navbar container">
				<div class="header__navbar--logo">
					<?php the_custom_logo(); ?>
				</div>
				
				<div class="header__navbar--menu-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#274359" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
				</div>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-1',
					'container'      => false,
					'menu_class'     => 'header__navbar--nav',
					'walker'         => new Custom_Walker_Nav_Menu(),
				));
				?>
			</nav>
		</header>
		<script>
			jQuery(document).ready(function($) {
				// Add 'active' class to menu item based on URL
				var url = window.location.href;
				$('.header__navbar--nav a').each(function() {
					// Compare the exact URL to the href attribute
					if (url === $(this).prop('href')) {
						$(this).addClass('active');
					}
				});
			});
		</script>