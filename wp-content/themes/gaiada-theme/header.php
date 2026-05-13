<?php
/**
 * Header template
 *
 * @package YourThemeName
 */

$accomodation_link = is_front_page() ? '#accomodation-listing' : home_url( '/#accomodation-listing' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="site-header">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center gap-3">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
					class="d-flex align-items-center text-white text-decoration-none site-logo">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.webp"
						alt="logo">
				</a>

				<div class="d-flex align-items-center gap-3">
					<a href="<?php echo esc_url( $accomodation_link ); ?>"
						class="btn btn-secondary desktop-reservation-link">
						<div class="btn-wrapper">
							<div class="btn-text">Rooms</div>
						</div>
					</a>

					<button type="button" class="hamburger-menu" id="hamburger-toggle" aria-label="Open menu"
						aria-controls="mobile-menu-modal" aria-expanded="false">
						<i class="fa-solid fa-bars"></i>
					</button>
				</div>
			</div>
		</div>
	</header>

	<!-- Mobile Menu Modal -->
	<div id="mobile-menu-modal" class="mobile-menu-modal" aria-hidden="true">
		<div class="mobile-menu-overlay"></div>
		<div class="mobile-menu-content text-bg-dark">
			<div
				class="mobile-menu-header p-3 d-flex justify-content-between align-items-center border-bottom border-secondary">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white text-decoration-none">
					<span class="mobile-menu-title">Last Minute Bali</span>
				</a>
				<button class="close-menu btn text-white d-flex align-items-center ms-auto" id="close-mobile-menu"
					aria-label="Close Menu">
					<i class="fa-solid fa-xmark fa-xl"></i>
				</button>
			</div>
			<div class="mobile-menu-body">
				<div class="mobile-menu-intro mb-4">
					<p class="mobile-menu-kicker text-uppercase mb-2">Menu</p>
				</div>

				<nav class="mobile-menu-nav mb-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-menu-link">
						<span>Home</span>
						<i class="fa-solid fa-arrow-right"></i>
					</a>
					<a href="<?php echo esc_url( $accomodation_link ); ?>" class="mobile-menu-link">
						<span>Accommodation</span>
						<i class="fa-solid fa-arrow-right"></i>
					</a>
				</nav>

				<div class="mobile-menu-actions d-grid gap-2">
					<a href="<?php echo esc_url( $accomodation_link ); ?>" class="btn btn-primary">
						<div class="btn-wrapper">
							<div class="btn-text">Explore rooms</div>
						</div>
					</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-secondary">
						<div class="btn-wrapper">
							<div class="btn-text">Back to home</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Site Content -->
	<main id="site-content">
