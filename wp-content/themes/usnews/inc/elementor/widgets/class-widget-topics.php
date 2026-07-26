<?php
/**
 * More From U.S. News — topic cards.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Topics extends Widget_Base {

	public function get_name() {
		return 'usnews-topics';
	}

	public function get_title() {
		return __( 'USN · More From Topics', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	protected function register_controls() {
		$this->start_controls_section( 'header', array( 'label' => __( 'Header', 'usnews' ) ) );
		$this->add_control( 'heading', array( 'label' => __( 'Heading', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'More From U.S. News' ) );
		$this->add_control( 'show_mid_ad', array( 'label' => __( 'Show mid ad between rows', 'usnews' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'return_value' => 'yes', 'default' => 'yes' ) );
		$this->add_control( 'mid_ad_image', array( 'label' => __( 'Mid ad image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ), 'condition' => array( 'show_mid_ad' => 'yes' ) ) );
		$this->end_controls_section();

		$this->start_controls_section( 'section_topic_cards', array( 'label' => __( 'Topic cards', 'usnews' ) ) );
		$card = new \Elementor\Repeater();
		$card->add_control( 'label', array( 'label' => __( 'Label', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Travel' ) );
		$card->add_control( 'image', array( 'label' => __( 'Image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$card->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$card->add_control( 'url', array( 'label' => __( 'Title URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$card->add_control( 'link_1', array( 'label' => __( 'Link 1 text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$card->add_control( 'link_1_url', array( 'label' => __( 'Link 1 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$card->add_control( 'link_2', array( 'label' => __( 'Link 2 text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$card->add_control( 'link_2_url', array( 'label' => __( 'Link 2 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$card->add_control( 'link_3', array( 'label' => __( 'Link 3 text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$card->add_control( 'link_3_url', array( 'label' => __( 'Link 3 URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$card->add_control( 'more_text', array( 'label' => __( 'View more text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'View More →' ) );
		$card->add_control( 'more_url', array( 'label' => __( 'View more URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$card->add_control( 'new_row', array( 'label' => __( 'Start new row before this card', 'usnews' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'return_value' => 'yes' ) );

		$this->add_control(
			'cards',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $card->get_controls(),
				'title_field' => '{{{ label }}} — {{{ title }}}',
				'default'     => array(
					array( 'label' => 'Travel', 'title' => 'Most Beautiful Landscapes in the World', 'link_1' => '5 Best U.S. River Cruise Itineraries', 'link_2' => 'Top Romantic River Cruise Lines', 'link_3' => 'The Best Stonehenge Tours', 'more_text' => 'View More Travel →', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
					array( 'label' => 'Money', 'title' => 'Student Loan Program Changes to Know', 'link_1' => 'Free Credit Monitoring Tool', 'link_2' => 'Use Fixed Income to Fight Inflation', 'link_3' => '7 Best ETFs to Invest in Corporate Bonds', 'more_text' => 'View More Money →', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
					array( 'label' => 'Autos', 'title' => '2027 Kia Seltos Photo Gallery', 'link_1' => 'When Is the Best Time to Buy a Car?', 'link_2' => '2027 Kia Seltos First Drive', 'link_3' => 'All the Car Brands Available in America', 'more_text' => 'View More Autos →', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
					array( 'label' => 'Real Estate', 'title' => 'The Best Place to Live Is Carmel, IN', 'link_1' => 'Why Is Midland the Best Place to Retire?', 'link_2' => 'How To Test A Neighborhood', 'link_3' => 'Housing Market Index', 'more_text' => 'View More Real Estate →', 'new_row' => 'yes', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
					array( 'label' => 'Insurance', 'title' => 'Best Car Insurance Companies', 'link_1' => 'Cheapest Car Insurance Companies of 2026', 'link_2' => 'Best Homeowners Insurance Companies', 'link_3' => 'Best Home and Auto Insurance Bundles', 'more_text' => 'View More Insurance →', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
					array( 'label' => 'Careers', 'title' => 'Best Companies to Work For', 'link_1' => 'The Best Jobs in America', 'link_2' => 'Survey: Interns Want Growth Over Money', 'link_3' => 'Take a Career Assessment', 'more_text' => 'View More Careers →', 'image' => array( 'url' => $this->placeholder() ), 'url' => array( 'url' => '#more-from' ), 'link_1_url' => array( 'url' => '#more-from' ), 'link_2_url' => array( 'url' => '#more-from' ), 'link_3_url' => array( 'url' => '#more-from' ), 'more_url' => array( 'url' => '#more-from' ) ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s     = $this->get_settings_for_display();
		$cards = isset( $s['cards'] ) && is_array( $s['cards'] ) ? $s['cards'] : array();
		$rows  = array();
		$cur   = array();
		foreach ( $cards as $i => $card ) {
			if ( $i > 0 && ! empty( $card['new_row'] ) && 'yes' === $card['new_row'] ) {
				$rows[] = $cur;
				$cur    = array();
			}
			$cur[] = $card;
		}
		if ( $cur ) {
			$rows[] = $cur;
		}
		?>
		<section class="section" id="more-from">
			<div class="container">
				<div class="section-head"><h2><?php echo esc_html( $s['heading'] ?? '' ); ?></h2></div>
				<?php foreach ( $rows as $ri => $row ) : ?>
					<?php if ( $ri > 0 && ! empty( $s['show_mid_ad'] ) && 'yes' === $s['show_mid_ad'] ) : ?>
						<div class="ad-slot" aria-hidden="true">
							<img src="<?php echo esc_url( $this->img_url( $s, 'mid_ad_image' ) ); ?>" alt="" width="1200" height="800" loading="lazy">
						</div>
					<?php endif; ?>
					<div class="topics-grid">
						<?php foreach ( $row as $card ) : ?>
							<article class="topic-card">
								<div class="topic-head">
									<svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2v20"></path><path d="M17 6H9.5a3 3 0 0 0 0 6h5a3 3 0 0 1 0 6H6"></path></svg>
									<span class="topic-label"><?php echo esc_html( $card['label'] ?? '' ); ?></span>
								</div>
								<a class="media" href="<?php echo esc_url( $card['url']['url'] ?? '#' ); ?>">
									<img src="<?php echo esc_url( $this->img_url( $card, 'image' ) ); ?>" alt="" width="1200" height="800" loading="lazy">
								</a>
								<h3><a href="<?php echo esc_url( $card['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $card['title'] ?? '' ); ?></a></h3>
								<ul class="chevron-list">
									<?php
									foreach ( array( 1, 2, 3 ) as $n ) {
										$text = $card[ "link_{$n}" ] ?? '';
										if ( ! $text ) {
											continue;
										}
										$u = $card[ "link_{$n}_url" ]['url'] ?? '#';
										printf( '<li><a href="%s">%s<span class="chev">›</span></a></li>', esc_url( $u ), esc_html( $text ) );
									}
									?>
								</ul>
								<a class="more-link" href="<?php echo esc_url( $card['more_url']['url'] ?? '#' ); ?>"><?php echo esc_html( $card['more_text'] ?? '' ); ?></a>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
