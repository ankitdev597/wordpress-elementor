<?php
/**
 * Newsletter band widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Newsletter extends Widget_Base {

	public function get_name() {
		return 'usnews-newsletter';
	}

	public function get_title() {
		return __( 'USN · Newsletters', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-email-field';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => __( 'Newsletters', 'usnews' ) ) );
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Newsletters',
			)
		);
		$this->add_control(
			'button_text',
			array(
				'label'   => __( 'Button text', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Sign Up',
			)
		);
		$this->add_control(
			'email_placeholder',
			array(
				'label'   => __( 'Email placeholder', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Your Email',
			)
		);
		$this->add_control(
			'legal',
			array(
				'label'   => __( 'Legal text', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'By clicking “sign up”, you will receive the latest updates from U.S. News and you agree to our Terms and Conditions and Privacy Policy.',
			)
		);
		$this->add_control(
			'success',
			array(
				'label'   => __( 'Success message', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => "Thanks — you're on the list.",
			)
		);

		$chip = new \Elementor\Repeater();
		$chip->add_control( 'label', array( 'label' => __( 'Chip label', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$chip->add_control( 'is_all', array( 'label' => __( '“See All” style', 'usnews' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'return_value' => 'yes' ) );
		$this->add_control(
			'chips',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $chip->get_controls(),
				'title_field' => '{{{ label }}}',
				'default'     => array(
					array( 'label' => 'Getting In +' ),
					array( 'label' => 'Best Ahead +' ),
					array( 'label' => 'Decision Points +' ),
					array( 'label' => 'Invested +' ),
					array( 'label' => 'See All', 'is_all' => 'yes' ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="newsletter-band" id="newsletters" aria-label="<?php esc_attr_e( 'Newsletters', 'usnews' ); ?>">
			<div class="container">
				<div class="newsletter-row">
					<div class="newsletter-brand">
						<svg class="newsletter-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M2 7l10 7 10-7"></path></svg>
						<h2><?php echo esc_html( $s['title'] ); ?></h2>
					</div>
					<div class="chips" data-chips>
						<?php foreach ( $s['chips'] as $i => $chip ) : ?>
							<button type="button" class="chip<?php echo 0 === $i ? ' is-active' : ''; ?><?php echo ( ! empty( $chip['is_all'] ) && 'yes' === $chip['is_all'] ) ? ' chip--all' : ''; ?>">
								<?php echo esc_html( $chip['label'] ); ?>
							</button>
						<?php endforeach; ?>
					</div>
					<form id="newsletter-form" class="newsletter-form">
						<label class="visually-hidden" for="email"><?php esc_html_e( 'Your Email', 'usnews' ); ?></label>
						<input id="email" name="email" type="email" placeholder="<?php echo esc_attr( $s['email_placeholder'] ); ?>" required>
						<button class="btn btn--navy" type="submit"><?php echo esc_html( $s['button_text'] ); ?></button>
					</form>
				</div>
				<p class="newsletter-legal"><?php echo esc_html( $s['legal'] ); ?></p>
				<p class="newsletter-note" data-success hidden><?php echo esc_html( $s['success'] ); ?></p>
			</div>
		</section>
		<?php
	}
}
