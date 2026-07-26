<?php
/**
 * Header: top leaderboard ad, sticky chrome, logo, primary nav, mobile drawer.
 *
 * @package usnews
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="https://placehold.co/1200x800">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

	<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to main content', 'usnews' ); ?></a>

	<div class="top-ad" aria-hidden="true">
		<div class="top-ad__inner">
			<img src="https://placehold.co/1200x800" alt="" width="1200" height="800">
		</div>
	</div>

	<div class="site-chrome" id="site-chrome">
		<header class="site-header">
			<div class="container nav-bar">
				<button class="icon-btn" type="button" id="menu-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="<?php esc_attr_e( 'Open menu', 'usnews' ); ?>">
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
				</button>
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'U.S. News home', 'usnews' ); ?>">
					<span class="logo-top">U.S.<strong>NEWS</strong></span>
					<span class="logo-bottom">&amp; WORLD REPORT</span>
				</a>
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					echo '<nav class="nav-links" aria-label="' . esc_attr__( 'Primary', 'usnews' ) . '">';
					wp_nav_menu( usnews_nav_args( 'primary' ) );
					echo '</nav>';
				} else {
					usnews_primary_fallback();
				}
				?>
				<div class="nav-actions">
					<a class="btn btn--sign" href="#footer">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0 2c-4 0-8 2-8 5v1h16v-1c0-3-4-5-8-5z"></path></svg>
						<?php esc_html_e( 'Sign In', 'usnews' ); ?>
					</a>
				</div>
			</div>
			<div class="drawer" id="mobile-nav" data-open="false" hidden>
				<div class="container">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( usnews_nav_args( 'primary' ) );
						echo '<a href="#footer">' . esc_html__( 'Sign In', 'usnews' ) . '</a>';
					} else {
						usnews_drawer_fallback();
					}
					?>
				</div>
			</div>
		</header>
	</div>
