<?php
/**
 * Photos section widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Photos extends Widget_Base {

	public function get_name() {
		return 'usnews-photos';
	}

	public function get_title() {
		return __( 'USN · Photos', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-gallery-group';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => __( 'Photos', 'usnews' ) ) );
		$this->add_control( 'heading', array( 'label' => __( 'Heading', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Photos' ) );
		$this->add_control( 'more_text', array( 'label' => __( 'More link text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'See More Photo Galleries →' ) );
		$this->add_control( 'more_url', array( 'label' => __( 'More link URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#photos' ) ) );

		$this->add_control( 'hero_image', array( 'label' => __( 'Hero image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$this->add_control( 'hero_kicker', array( 'label' => __( 'Hero kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Civic' ) );
		$this->add_control( 'hero_title', array( 'label' => __( 'Hero title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Photos You Should See: July 2026' ) );
		$this->add_control( 'hero_meta', array( 'label' => __( 'Hero meta', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'By Michael A. Brooks · July 21, 2026, at 2:45 p.m.' ) );
		$this->add_control( 'hero_url', array( 'label' => __( 'Hero URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#photos' ) ) );

		$thumb = new \Elementor\Repeater();
		$thumb->add_control( 'image', array( 'label' => __( 'Image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$thumb->add_control( 'kicker', array( 'label' => __( 'Kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Civic' ) );
		$thumb->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$thumb->add_control( 'meta', array( 'label' => __( 'Meta', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$thumb->add_control( 'url', array( 'label' => __( 'URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#photos' ) ) );
		$this->add_control(
			'thumbs',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $thumb->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'title' => 'Photos: Best Countries Around the World', 'meta' => 'May 13, 2026, at 3:01 p.m.', 'kicker' => 'Civic', 'url' => array( 'url' => '#photos' ), 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'title' => 'Photos: Trump Behind the Scenes', 'meta' => 'June 26, 2026, at 5:54 p.m.', 'kicker' => 'Civic', 'url' => array( 'url' => '#photos' ), 'image' => array( 'url' => $this->placeholder() ) ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="section" id="photos">
			<div class="container">
				<div class="section-head"><h2><?php echo esc_html( $s['heading'] ); ?></h2></div>
				<div class="photos-grid">
					<a class="photo-hero" href="<?php echo esc_url( $s['hero_url']['url'] ?? '#' ); ?>">
						<div class="media media--wide"><img src="<?php echo esc_url( $this->img_url( $s, 'hero_image' ) ); ?>" alt="<?php echo esc_attr( $s['hero_title'] ); ?>" width="1200" height="800" loading="lazy"></div>
						<div class="overlay">
							<span class="kicker"><?php echo esc_html( $s['hero_kicker'] ); ?></span>
							<h3><?php echo esc_html( $s['hero_title'] ); ?></h3>
							<p class="meta"><?php echo esc_html( $s['hero_meta'] ); ?></p>
						</div>
					</a>
					<div class="photo-stack">
						<?php foreach ( $s['thumbs'] as $thumb ) : ?>
							<a class="photo-thumb" href="<?php echo esc_url( $thumb['url']['url'] ?? '#' ); ?>">
								<div class="media media--thumb"><img src="<?php echo esc_url( $this->img_url( $thumb, 'image' ) ); ?>" alt="" width="1200" height="800" loading="lazy"></div>
								<div class="overlay">
									<span class="kicker"><?php echo esc_html( $thumb['kicker'] ); ?></span>
									<h3><?php echo esc_html( $thumb['title'] ); ?></h3>
									<p class="meta"><?php echo esc_html( $thumb['meta'] ); ?></p>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
				<a class="more-link" href="<?php echo esc_url( $s['more_url']['url'] ?? '#' ); ?>" style="margin-top: var(--space-5); display: inline-flex;"><?php echo esc_html( $s['more_text'] ); ?></a>
			</div>
		</section>
		<?php
	}
}
