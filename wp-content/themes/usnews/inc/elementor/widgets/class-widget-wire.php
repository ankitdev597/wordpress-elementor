<?php
/**
 * News wire columns widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Wire extends Widget_Base {

	public function get_name() {
		return 'usnews-wire';
	}

	public function get_title() {
		return __( 'USN · News Wire', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => __( 'Wire columns', 'usnews' ) ) );
		$this->add_control( 'label', array( 'label' => __( 'Aria label', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'News wire' ) );

		$col = new \Elementor\Repeater();
		$col->add_control( 'category', array( 'label' => __( 'Category', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Politics' ) );
		$col->add_control( 'item_1', array( 'label' => __( 'Story 1', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$col->add_control( 'item_1_url', array( 'label' => __( 'Story 1 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#news' ) ) );
		$col->add_control( 'item_2', array( 'label' => __( 'Story 2', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$col->add_control( 'item_2_url', array( 'label' => __( 'Story 2 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#news' ) ) );
		$col->add_control( 'item_3', array( 'label' => __( 'Story 3', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$col->add_control( 'item_3_url', array( 'label' => __( 'Story 3 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#news' ) ) );

		$this->add_control(
			'columns',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $col->get_controls(),
				'title_field' => '{{{ category }}}',
				'default'     => array(
					array(
						'category'   => 'Politics',
						'item_1'     => 'Democrats to Finalize Their 2028 Presidential Field Rules',
						'item_2'     => 'From Prison Fears to Fireworks: How Trump Changed July 4',
						'item_3'     => 'Federal Judges Allow New Tennessee Voting Map to Stand',
						'item_1_url' => array( 'url' => '#news' ),
						'item_2_url' => array( 'url' => '#news' ),
						'item_3_url' => array( 'url' => '#news' ),
					),
					array(
						'category'   => 'Sports',
						'item_1'     => 'British Open Winner Ryan Fox Arrives as a Contender',
						'item_2'     => 'Rams Unveil Alternate Uniforms for the Season',
						'item_3'     => 'Kohles Shoots 62 to Take the 1st-Round Lead',
						'item_1_url' => array( 'url' => '#news' ),
						'item_2_url' => array( 'url' => '#news' ),
						'item_3_url' => array( 'url' => '#news' ),
					),
					array(
						'category'   => 'Business',
						'item_1'     => 'Shares Skid in Asia in Sell-Off Over Rate Worries',
						'item_2'     => 'Prime Minister Carney Says Canada Will Stay Competitive',
						'item_3'     => 'Next Stop, Trump Station? Transit Renaming Debates',
						'item_1_url' => array( 'url' => '#more-from' ),
						'item_2_url' => array( 'url' => '#more-from' ),
						'item_3_url' => array( 'url' => '#more-from' ),
					),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="section wire-section" aria-label="<?php echo esc_attr( $s['label'] ); ?>">
			<div class="container">
				<div class="wire-grid">
					<?php foreach ( $s['columns'] as $col ) : ?>
						<div class="wire-card">
							<p class="wire-cat"><?php echo esc_html( $col['category'] ); ?></p>
							<ul class="wire-list">
								<?php
								foreach ( array( 1, 2, 3 ) as $n ) {
									$text = $col[ "item_{$n}" ] ?? '';
									if ( ! $text ) {
										continue;
									}
									$u = $col[ "item_{$n}_url" ]['url'] ?? '#';
									printf( '<li><a href="%s">%s</a></li>', esc_url( $u ), esc_html( $text ) );
								}
								?>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
