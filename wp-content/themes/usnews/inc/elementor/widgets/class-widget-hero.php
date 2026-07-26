<?php
/**
 * Decision Hero widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Hero extends Widget_Base {

	public function get_name() {
		return 'usnews-hero';
	}

	public function get_title() {
		return __( 'USN · Decision Hero', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content',
			array( 'label' => __( 'Hero', 'usnews' ) )
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Headline', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We Help You Make the Best Decisions.',
			)
		);

		$this->add_control(
			'search_placeholder',
			array(
				'label'   => __( 'Search placeholder', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Find the best online learning',
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'text',
			array(
				'label'   => __( 'Link text', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Best Colleges',
			)
		);
		$repeater->add_control(
			'url',
			array(
				'label'   => __( 'URL', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => array( 'url' => '#education' ),
			)
		);
		$repeater->add_control(
			'is_more',
			array(
				'label'        => __( '“More” style link', 'usnews' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'quick_links',
			array(
				'label'       => __( 'Quick ranking links', 'usnews' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ text }}}',
				'default'     => array(
					array( 'text' => 'Best Colleges', 'url' => array( 'url' => '#education' ) ),
					array( 'text' => 'Best Hospitals', 'url' => array( 'url' => '#health' ) ),
					array( 'text' => 'Best Graduate Schools', 'url' => array( 'url' => '#education' ) ),
					array(
						'text'    => '+ More Rankings',
						'url'     => array( 'url' => '#more-from' ),
						'is_more' => 'yes',
					),
				),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="decision-hero" aria-label="<?php esc_attr_e( 'Search rankings', 'usnews' ); ?>">
			<div class="container">
				<h1><?php echo esc_html( $s['title'] ); ?></h1>
				<form class="hero-search" role="search" action="#" method="get">
					<label class="visually-hidden" for="q"><?php esc_html_e( 'Search', 'usnews' ); ?></label>
					<input id="q" name="q" type="search" placeholder="<?php echo esc_attr( $s['search_placeholder'] ); ?>" required>
					<button type="submit" aria-label="<?php esc_attr_e( 'Search', 'usnews' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3.5-3.5"></path></svg>
					</button>
				</form>
				<div class="hero-quick" aria-label="<?php esc_attr_e( 'Popular rankings', 'usnews' ); ?>">
					<span class="rankings-shield" aria-hidden="true" title="Best U.S. News Rankings">
						<span class="rankings-shield__best">BEST</span>
						<span class="rankings-shield__brand">U.S. NEWS</span>
						<span class="rankings-shield__rank">RANKINGS</span>
					</span>
					<nav class="hero-quick__links">
						<?php
						foreach ( $s['quick_links'] as $link ) {
							$url   = ! empty( $link['url']['url'] ) ? $link['url']['url'] : '#';
							$class = ( ! empty( $link['is_more'] ) && 'yes' === $link['is_more'] ) ? ' class="hero-quick__more"' : '';
							printf( '<a href="%s"%s>%s</a>', esc_url( $url ), $class, esc_html( $link['text'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</nav>
				</div>
			</div>
		</section>
		<?php
	}
}
