<?php
/**
 * App promo widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_App extends Widget_Base {

	public function get_name() {
		return 'usnews-app';
	}

	public function get_title() {
		return __( 'USN · App Promo', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-device-mobile';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => __( 'App promo', 'usnews' ) ) );
		$this->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Unlock More, On-the-Go!' ) );
		$this->add_control( 'text', array( 'label' => __( 'Text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Experience the full power of U.S. News wherever you are. Download our app today for exclusive features, seamless access, and a personalized experience.' ) );
		$this->add_control( 'apple_url', array( 'label' => __( 'App Store URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#app' ) ) );
		$this->add_control( 'google_url', array( 'label' => __( 'Google Play URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#app' ) ) );
		$this->add_control( 'phone_back', array( 'label' => __( 'Phone (back) image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$this->add_control( 'phone_front', array( 'label' => __( 'Phone (front) image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="app-band" id="app">
			<div class="container app-promo">
				<div class="app-promo__copy">
					<h2><?php echo esc_html( $s['title'] ); ?></h2>
					<p><?php echo esc_html( $s['text'] ); ?></p>
					<div class="store-row">
						<a class="store-badge store-badge--apple" href="<?php echo esc_url( $s['apple_url']['url'] ?? '#' ); ?>" aria-label="<?php esc_attr_e( 'Download on the App Store', 'usnews' ); ?>">
							<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16.4 12.7c0-2.1 1.7-3.1 1.8-3.2-1-1.4-2.5-1.6-3-1.6-1.3-.1-2.5.8-3.1.8-.7 0-1.7-.7-2.8-.7-1.4 0-2.8.9-3.5 2.2-1.5 2.6-.4 6.5 1.1 8.6.7 1 1.6 2.2 2.7 2.1 1.1 0 1.5-.7 2.8-.7s1.7.7 2.8.7c1.2 0 1.9-1 2.6-2 .8-1.2 1.1-2.3 1.1-2.4-.1 0-2.1-.8-2.1-3.2zM14.5 6.4c.6-.7 1-1.7.9-2.7-.9 0-1.9.6-2.5 1.3-.6.6-1.1 1.6-1 2.6 1 .1 1.9-.5 2.6-1.2z"></path></svg>
							<span><small>Download on the</small><strong>App Store</strong></span>
						</a>
						<a class="store-badge store-badge--google" href="<?php echo esc_url( $s['google_url']['url'] ?? '#' ); ?>" aria-label="<?php esc_attr_e( 'Get it on Google Play', 'usnews' ); ?>">
							<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.6 2.2l10.2 9.7L3.6 21.6c-.4-.3-.6-.8-.6-1.3V3.5c0-.5.2-1 .6-1.3zm11.3 10.8l2.4 2.3-9.7 5.6 7.3-7.9zm3.4-1.6l2.5 1.4c.7.4.7 1.4 0 1.8l-2.5 1.4-2.7-2.6 2.7-2zM7.6 2.4l9.7 5.6-2.4 2.3-7.3-7.9z"></path></svg>
							<span><small>GET IT ON</small><strong>Google Play</strong></span>
						</a>
					</div>
				</div>
				<div class="app-phones" aria-hidden="true">
					<div class="phone phone--back"><div class="phone__screen"><img src="<?php echo esc_url( $this->img_url( $s, 'phone_back' ) ); ?>" alt="" width="1200" height="800" loading="lazy"></div></div>
					<div class="phone phone--front"><div class="phone__screen"><img src="<?php echo esc_url( $this->img_url( $s, 'phone_front' ) ); ?>" alt="" width="1200" height="800" loading="lazy"></div></div>
				</div>
			</div>
		</section>
		<?php
	}
}
