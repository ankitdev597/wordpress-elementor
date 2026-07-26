<?php
/**
 * Footer: link columns, legal box, app badges, utility nav + social.
 *
 * @package usnews
 */

?>
	<footer class="site-footer" id="footer">
		<div class="container">
			<div class="footer-grid">
				<div class="footer-col">
					<div class="footer-block">
						<h3>News</h3>
						<a href="#news">Best Countries</a>
						<a href="#news">Best States</a>
						<a href="#news">U.S. News Decision Points</a>
						<a href="#news">Ideas &amp; Opinions</a>
						<a href="#photos">Photos</a>
						<a href="#news">News</a>
					</div>
					<div class="footer-block">
						<h3>Events</h3>
					</div>
					<div class="footer-block">
						<h3>Rankings</h3>
						<a href="#education">All Rankings</a>
					</div>
				</div>

				<div class="footer-col">
					<div class="footer-block">
						<h3>Education</h3>
						<a href="#education">Colleges</a>
						<a href="#education">Graduate Schools</a>
						<a href="#education">Online Colleges</a>
						<a href="#education">Global Universities</a>
						<a href="#education">K-12 Schools</a>
						<a href="#education">Community Colleges</a>
						<a href="#education">Continuing Education</a>
						<a href="#education">Education Rankings</a>
						<a href="#education">College Advisor</a>
						<a href="#education">TeenLife</a>
					</div>
					<div class="footer-block">
						<h3>Law Firms</h3>
						<a href="#more-from">Practice Areas</a>
						<a href="#more-from">Lawyer Directory</a>
					</div>
				</div>

				<div class="footer-col">
					<div class="footer-block">
						<h3>Health</h3>
						<a href="#health">Hospitals</a>
						<a href="#health">Doctors</a>
						<a href="#health">Senior Living</a>
						<a href="#health">Wellness</a>
						<a href="#health">Diets</a>
						<a href="#health">Health Insurance</a>
						<a href="#health">Conditions</a>
						<a href="#health">Patient Advice</a>
						<a href="#health">Healthcare of Tomorrow</a>
					</div>
				</div>

				<div class="footer-col">
					<div class="footer-block">
						<h3>Money</h3>
						<a href="#more-from">Investing</a>
						<a href="#more-from">Retirement</a>
						<a href="#more-from">Credit Cards</a>
						<a href="#more-from">Loans</a>
						<a href="#more-from">Banking</a>
						<a href="#more-from">Personal Finance</a>
						<a href="#more-from">Careers</a>
					</div>
					<div class="footer-block">
						<h3>Real Estate &amp; Home</h3>
						<a href="#more-from">Best Places</a>
						<a href="#more-from">Home Services</a>
						<a href="#more-from">Find an Agent</a>
					</div>
				</div>

				<div class="footer-col">
					<div class="footer-block">
						<h3>Insurance</h3>
						<a href="#more-from">Car Insurance</a>
						<a href="#more-from">Home Insurance</a>
						<a href="#more-from">Life Insurance</a>
						<a href="#more-from">Renters Insurance</a>
						<a href="#more-from">Pet Insurance</a>
					</div>
					<div class="footer-block">
						<h3>Travel</h3>
						<a href="#more-from">Vacations</a>
						<a href="#more-from">Travel Guides</a>
						<a href="#more-from">Hotels</a>
						<a href="#more-from">Cruises</a>
						<a href="#more-from">Rewards</a>
					</div>
				</div>

				<div class="footer-col">
					<div class="footer-block">
						<h3>Business Services</h3>
						<a href="#more-from">Credit Card Processors</a>
						<a href="#more-from">Business Phones Systems</a>
						<a href="#more-from">LLC Services</a>
						<a href="#more-from">Payroll Software</a>
					</div>
					<div class="footer-block">
						<h3>Autos</h3>
						<a href="#more-from">New Cars</a>
						<a href="#more-from">Used Cars</a>
						<a href="#more-from">Car Rankings</a>
						<a href="#more-from">Best Car Deals</a>
						<a href="#more-from">Cars for Sale</a>
						<a href="#more-from">Car Buying Advice</a>
					</div>
				</div>
			</div>

			<div class="footer-mid">
				<div class="footer-legal-box">
					<a class="logo footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'U.S. News home', 'usnews' ); ?>">
						<span class="logo-top">U.S.<strong>NEWS</strong></span>
						<span class="logo-bottom">&amp; WORLD REPORT</span>
					</a>
					<div class="footer-legal-box__text">
						<p class="footer-copy">Copyright <?php echo esc_html( gmdate( 'Y' ) ); ?> &copy; U.S. News &amp; World Report L.P.</p>
						<nav class="footer-legal-inline" aria-label="<?php esc_attr_e( 'Legal', 'usnews' ); ?>">
							<a href="#footer">Terms &amp; Conditions</a>
							<span>/</span>
							<a href="#footer">Privacy Policy</a>
							<span>/</span>
							<a href="#footer">U.S. State Privacy Notice</a>
							<span>/</span>
							<a href="#footer">Your Privacy Choices</a>
							<span class="privacy-icon" aria-hidden="true" title="Privacy choices"></span>
						</nav>
					</div>
				</div>

				<div class="footer-apps">
					<a class="store-badge store-badge--apple" href="#app" aria-label="<?php esc_attr_e( 'Download on the App Store', 'usnews' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16.4 12.7c0-2.1 1.7-3.1 1.8-3.2-1-1.4-2.5-1.6-3-1.6-1.3-.1-2.5.8-3.1.8-.7 0-1.7-.7-2.8-.7-1.4 0-2.8.9-3.5 2.2-1.5 2.6-.4 6.5 1.1 8.6.7 1 1.6 2.2 2.7 2.1 1.1 0 1.5-.7 2.8-.7s1.7.7 2.8.7c1.2 0 1.9-1 2.6-2 .8-1.2 1.1-2.3 1.1-2.4-.1 0-2.1-.8-2.1-3.2zM14.5 6.4c.6-.7 1-1.7.9-2.7-.9 0-1.9.6-2.5 1.3-.6.6-1.1 1.6-1 2.6 1 .1 1.9-.5 2.6-1.2z"></path></svg>
						<span><small>Download on the</small><strong>App Store</strong></span>
					</a>
					<a class="store-badge store-badge--google" href="#app" aria-label="<?php esc_attr_e( 'Get it on Google Play', 'usnews' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.6 2.2l10.2 9.7L3.6 21.6c-.4-.3-.6-.8-.6-1.3V3.5c0-.5.2-1 .6-1.3zm11.3 10.8l2.4 2.3-9.7 5.6 7.3-7.9zm3.4-1.6l2.5 1.4c.7.4.7 1.4 0 1.8l-2.5 1.4-2.7-2.6 2.7-2zM7.6 2.4l9.7 5.6-2.4 2.3-7.3-7.9z"></path></svg>
						<span><small>GET IT ON</small><strong>Google Play</strong></span>
					</a>
				</div>
				<p class="footer-mission">Download our app today for exclusive features, seamless access, and a personalized experience.</p>
			</div>

			<div class="footer-bottom">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container'       => 'nav',
							'container_class' => 'footer-utility',
							'container_aria_label' => __( 'Company', 'usnews' ),
							'items_wrap'      => '%3$s',
							'depth'           => 1,
						)
					);
				} else {
					?>
					<nav class="footer-utility" aria-label="<?php esc_attr_e( 'Company', 'usnews' ); ?>">
						<a href="#footer">About U.S. News</a>
						<a href="#footer">Editorial Guidelines</a>
						<a href="#footer">Contact</a>
						<a href="#footer">Press</a>
						<a href="#footer">Advertise</a>
						<a href="#footer">Newsletters</a>
						<a href="#footer">Jobs</a>
						<a href="#footer">Site Map</a>
						<a href="#footer">Store</a>
					</nav>
					<?php
				}
				?>
				<div class="social" aria-label="<?php esc_attr_e( 'Social media', 'usnews' ); ?>">
					<a href="#footer" aria-label="Facebook" title="Facebook">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H8v3h3v7h3v-7h3l1-3h-4V9c0-.6.4-1 1-1z"></path></svg>
					</a>
					<a href="#footer" aria-label="X" title="X">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4l7.2 9.3L4.7 20H7l5-5.9L16.8 20H20l-7.4-9.6L19.2 4H16.8l-4.5 5.3L8 4H4z"></path></svg>
					</a>
					<a href="#footer" aria-label="Instagram" title="Instagram">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4zm0 2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H7zm5 2.8A4.2 4.2 0 1 1 7.8 12 4.2 4.2 0 0 1 12 7.8zm0 2A2.2 2.2 0 1 0 14.2 12 2.2 2.2 0 0 0 12 9.8zM17.4 6.4a.9.9 0 1 1-.9.9.9.9 0 0 1 .9-.9z"></path></svg>
					</a>
					<a href="#footer" aria-label="LinkedIn" title="LinkedIn">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 9H3.8v11h2.7V9zM5.1 3.5A1.6 1.6 0 1 0 5.1 6.7 1.6 1.6 0 0 0 5.1 3.5zM20.2 9.1c-1.4 0-2.4.7-2.9 1.5V9H14.7v11h2.7v-6.1c0-1.6.3-3.2 2.3-3.2s2.1 1.8 2.1 3.3V20H22.5v-6.6c0-3.2-1.7-4.3-2.3-4.3z"></path></svg>
					</a>
					<a href="#footer" aria-label="TikTok" title="TikTok">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.5 3h2.1c.2 1.5 1.1 2.9 2.4 3.7V9a6.7 6.7 0 0 1-2.5-.6v6.1A5.5 5.5 0 1 1 11 9.1v2.2a3.3 3.3 0 1 0 2.3 3.1V3z"></path></svg>
					</a>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
