<?php
/**
 * Rankings section (Health / Education pattern).
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Rankings extends Widget_Base {

	public function get_name() {
		return 'usnews-rankings';
	}

	public function get_title() {
		return __( 'USN · Rankings Section', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-sitemap';
	}

	protected function register_controls() {
		$this->start_controls_section( 'header', array( 'label' => __( 'Section header', 'usnews' ) ) );
		$this->add_control( 'section_id', array( 'label' => __( 'Section ID', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'health' ) );
		$this->add_control( 'heading', array( 'label' => __( 'Heading', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Health' ) );
		$this->add_control( 'view_all_text', array( 'label' => __( 'View all text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'View All Health →' ) );
		$this->add_control( 'view_all_url', array( 'label' => __( 'View all URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#health' ) ) );
		$this->end_controls_section();

		$this->start_controls_section( 'section_rankings_card', array( 'label' => __( 'Rankings card', 'usnews' ) ) );
		$this->add_control( 'rankings_title', array( 'label' => __( 'Card title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Health Rankings' ) );
		$this->add_control( 'rankings_more_text', array( 'label' => __( 'More link text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'More Rankings →' ) );
		$this->add_control( 'rankings_more_url', array( 'label' => __( 'More link URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#health' ) ) );

		$rank = new \Elementor\Repeater();
		$rank->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$rank->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$rank->add_control( 'text', array( 'label' => __( 'Description', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$this->add_control(
			'rankings',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $rank->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'title' => 'Best Hospitals', 'url' => array( 'url' => '#health' ), 'text' => 'Helping patients find the best healthcare for 30+ years.' ),
					array( 'title' => "Best Children's Hospitals", 'url' => array( 'url' => '#health' ), 'text' => 'Care for the sickest children.' ),
					array( 'title' => 'Doctors', 'url' => array( 'url' => '#health' ), 'text' => 'Find the right doctor for you.' ),
					array( 'title' => 'Best Senior Living', 'url' => array( 'url' => '#health' ), 'text' => 'Guidance when living at home is no longer ideal.' ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'feature', array( 'label' => __( 'Feature panel', 'usnews' ) ) );
		$this->add_control( 'feature_image', array( 'label' => __( 'Image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$this->add_control( 'feature_kicker', array( 'label' => __( 'Kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Senior Living' ) );
		$this->add_control( 'feature_title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Senior Living Sizes' ) );
		$this->add_control( 'feature_url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#health' ) ) );
		$this->add_control( 'feature_text', array( 'label' => __( 'Text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'How to choose the right community size for care needs, social life and budget.' ) );
		$this->end_controls_section();

		$this->start_controls_section( 'rows', array( 'label' => __( 'Story rows', 'usnews' ) ) );
		$row = new \Elementor\Repeater();
		$row->add_control( 'image', array( 'label' => __( 'Thumb', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$row->add_control( 'kicker', array( 'label' => __( 'Kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$row->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$row->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$row->add_control( 'excerpt', array( 'label' => __( 'Excerpt', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$row->add_control( 'byline', array( 'label' => __( 'Byline', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$this->add_control(
			'story_rows',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $row->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'kicker' => 'Medicare', 'title' => 'Cost of Medicare Part D', 'url' => array( 'url' => '#health' ), 'excerpt' => 'New premium caps and coverage gaps are changing how much retirees pay for prescriptions.', 'byline' => 'By Elaine K. Howley and Christine Comizio', 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'kicker' => 'Wellness', 'title' => 'GLP-1s and Hair Loss: What to Know', 'url' => array( 'url' => '#health' ), 'excerpt' => 'Patients report thinning hair while on popular weight-loss medications.', 'byline' => 'By Elaine K. Howley', 'image' => array( 'url' => $this->placeholder() ) ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'latest', array( 'label' => __( 'Latest Stories', 'usnews' ) ) );
		$this->add_control( 'latest_title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Latest Stories' ) );
		$this->add_control( 'latest_more_text', array( 'label' => __( 'More link text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'See All Stories →' ) );
		$this->add_control( 'latest_more_url', array( 'label' => __( 'More link URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#health' ) ) );
		$lat = new \Elementor\Repeater();
		$lat->add_control( 'kicker', array( 'label' => __( 'Kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$lat->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$lat->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$lat->add_control( 'excerpt', array( 'label' => __( 'Excerpt', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$this->add_control(
			'latest_items',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $lat->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'kicker' => 'Medicare', 'title' => 'Medigap Plans F vs. G vs. N', 'url' => array( 'url' => '#health' ), 'excerpt' => 'How popular supplemental plans compare on premiums, coverage and enrollment rules.' ),
					array( 'kicker' => 'Wellness', 'title' => 'Questions to Avoid Hospital Readmission', 'url' => array( 'url' => '#health' ), 'excerpt' => 'What to ask before discharge to reduce the chance of returning to the hospital.' ),
					array( 'kicker' => 'Senior Living', 'title' => 'Best Senior Living Options Near You', 'url' => array( 'url' => '#health' ), 'excerpt' => 'How to compare independent living, assisted living and memory care.' ),
					array( 'kicker' => 'Doctors', 'title' => 'Doctor Finder Data and Methodologies', 'url' => array( 'url' => '#health' ), 'excerpt' => 'How U.S. News evaluates and ranks physicians nationwide.' ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s         = $this->get_settings_for_display();
		$id        = sanitize_html_class( ! empty( $s['section_id'] ) ? $s['section_id'] : 'section' );
		$rankings  = isset( $s['rankings'] ) && is_array( $s['rankings'] ) ? $s['rankings'] : array();
		$story_rows = isset( $s['story_rows'] ) && is_array( $s['story_rows'] ) ? $s['story_rows'] : array();
		$latest    = isset( $s['latest_items'] ) && is_array( $s['latest_items'] ) ? $s['latest_items'] : array();
		?>
		<section class="section section--tinted" id="<?php echo esc_attr( $id ); ?>">
			<div class="container">
				<div class="section-head">
					<h2><?php echo esc_html( $s['heading'] ?? '' ); ?></h2>
					<a class="view-all" href="<?php echo esc_url( $s['view_all_url']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['view_all_text'] ?? '' ); ?></a>
				</div>
				<div class="health-grid">
					<div class="rankings-card">
						<p class="rankings-card__title"><?php echo esc_html( $s['rankings_title'] ?? '' ); ?></p>
						<ul class="rankings-list">
							<?php foreach ( $rankings as $item ) : ?>
								<li>
									<span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
									<div>
										<h4><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h4>
										<p><?php echo esc_html( $item['text'] ); ?></p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
						<a class="more-link" href="<?php echo esc_url( $s['rankings_more_url']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['rankings_more_text'] ); ?></a>
					</div>

					<div class="feature-col">
						<article class="feature-panel">
							<div class="media"><img src="<?php echo esc_url( $this->img_url( $s, 'feature_image' ) ); ?>" alt="" width="1200" height="800" loading="lazy"></div>
							<div class="overlay">
								<span class="kicker kicker--gold"><?php echo esc_html( $s['feature_kicker'] ); ?></span>
								<h3><a href="<?php echo esc_url( $s['feature_url']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['feature_title'] ); ?></a></h3>
								<p><?php echo esc_html( $s['feature_text'] ); ?></p>
							</div>
						</article>
						<?php foreach ( $story_rows as $row ) : ?>
							<article class="story-row">
								<a class="media media--thumb" href="<?php echo esc_url( $row['url']['url'] ?? '#' ); ?>">
									<img src="<?php echo esc_url( $this->img_url( $row, 'image' ) ); ?>" alt="" width="1200" height="800" loading="lazy">
								</a>
								<div>
									<span class="kicker"><?php echo esc_html( $row['kicker'] ); ?></span>
									<h4><a href="<?php echo esc_url( $row['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $row['title'] ); ?></a></h4>
									<p><?php echo esc_html( $row['excerpt'] ); ?></p>
									<p class="byline"><?php echo esc_html( $row['byline'] ); ?></p>
								</div>
							</article>
						<?php endforeach; ?>
					</div>

					<aside class="latest-rail">
						<p class="mini-title"><?php echo esc_html( $s['latest_title'] ); ?></p>
						<ul class="latest-list">
							<?php foreach ( $latest as $item ) : ?>
								<li>
									<span class="kicker"><?php echo esc_html( $item['kicker'] ); ?></span>
									<h4><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h4>
									<p><?php echo esc_html( $item['excerpt'] ); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
						<a class="more-link" href="<?php echo esc_url( $s['latest_more_url']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['latest_more_text'] ); ?></a>
					</aside>
				</div>
			</div>
		</section>
		<?php
	}
}
