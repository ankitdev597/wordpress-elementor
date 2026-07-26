<?php
/**
 * Top News: News You Can Use + carousel + Most Popular.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Top_News extends Widget_Base {

	public function get_name() {
		return 'usnews-top-news';
	}

	public function get_title() {
		return __( 'USN · Top News', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	protected function register_controls() {
		// Left column.
		$this->start_controls_section( 'left', array( 'label' => __( 'News You Can Use', 'usnews' ) ) );
		$this->add_control(
			'left_title',
			array(
				'label'   => __( 'Column title', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'News You Can Use',
			)
		);

		$story = new \Elementor\Repeater();
		$story->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Story title' ) );
		$story->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$story->add_control( 'excerpt', array( 'label' => __( 'Excerpt', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$story->add_control( 'byline', array( 'label' => __( 'Byline', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );

		$this->add_control(
			'stories',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $story->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array(
						'title'   => 'The FHA Could Drop 90-Day Rule',
						'url'     => array( 'url' => '#more-from' ),
						'excerpt' => 'The Federal Housing Administration may scrap a rule that requires borrowers to wait three months after a short sale.',
						'byline'  => 'By Jessica Merritt, Tracy Stewart and Whitney Blair Wyckoff',
					),
					array(
						'title'   => 'What Congress Aims to Pass Before Recess',
						'url'     => array( 'url' => '#news' ),
						'excerpt' => 'Lawmakers are racing to advance must-pass spending bills before the August break.',
						'byline'  => 'By Stella Garner',
					),
				),
			)
		);
		$this->end_controls_section();

		// Carousel.
		$this->start_controls_section( 'carousel', array( 'label' => __( 'Feature carousel', 'usnews' ) ) );
		$slide = new \Elementor\Repeater();
		$slide->add_control( 'image', array( 'label' => __( 'Image', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$slide->add_control( 'badge', array( 'label' => __( 'Badge (optional)', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$slide->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Featured story' ) );
		$slide->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$slide->add_control( 'excerpt', array( 'label' => __( 'Excerpt', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$slide->add_control( 'credit', array( 'label' => __( 'Credit', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '(Placeholder image)' ) );

		$this->add_control(
			'slides',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $slide->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array(
						'title'   => 'Top Hotel and Airline Rewards Programs',
						'url'     => array( 'url' => '#more-from' ),
						'badge'   => 'Best Travel Rewards',
						'excerpt' => 'U.S. News announces the 2026-2027 Best Hotel Rewards Programs.',
						'credit'  => 'Getty Images',
						'image'   => array( 'url' => $this->placeholder() ),
					),
					array(
						'title'   => 'Trump Economy Faces Affordability Woes',
						'url'     => array( 'url' => '#news' ),
						'excerpt' => 'President Donald Trump and Republicans are facing an uphill battle to convince Americans they are tackling high prices.',
						'image'   => array( 'url' => $this->placeholder() ),
					),
					array(
						'title'   => 'Tropical Storm Bertha: What to Know',
						'url'     => array( 'url' => '#news' ),
						'excerpt' => 'Inland near the Texas-Louisiana border with sustained winds of 45 mph.',
						'image'   => array( 'url' => $this->placeholder() ),
					),
					array(
						'title'   => 'How Trump Is Upending Green Cards',
						'url'     => array( 'url' => '#news' ),
						'excerpt' => 'Policy reforms are making green cards harder to get.',
						'image'   => array( 'url' => $this->placeholder() ),
					),
					array(
						'title'   => 'Best 0% APR Financing Car Deals',
						'url'     => array( 'url' => '#more-from' ),
						'excerpt' => 'Where shoppers can still find zero-interest auto financing offers.',
						'image'   => array( 'url' => $this->placeholder() ),
					),
				),
			)
		);
		$this->end_controls_section();

		// Popular.
		$this->start_controls_section( 'popular', array( 'label' => __( 'Most Popular', 'usnews' ) ) );
		$this->add_control(
			'popular_title',
			array(
				'label'   => __( 'Column title', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Most Popular',
			)
		);
		$pop = new \Elementor\Repeater();
		$pop->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$pop->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$this->add_control(
			'popular_items',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $pop->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'title' => 'The Most Popular Dog Names in Each State', 'url' => array( 'url' => '#news' ) ),
					array( 'title' => 'Best 0% APR Financing Car Deals', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'What to Know About Daylight Saving Time', 'url' => array( 'url' => '#news' ) ),
					array( 'title' => 'Most Beautiful River Cruise Itineraries', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'The 10 Worst Presidents', 'url' => array( 'url' => '#news' ) ),
					array( 'title' => 'Severe Stomach Illness Spreading in U.S.', 'url' => array( 'url' => '#health' ) ),
					array( 'title' => 'Doctor Finder Data and Methodologies', 'url' => array( 'url' => '#health' ) ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s       = $this->get_settings_for_display();
		$slides  = isset( $s['slides'] ) && is_array( $s['slides'] ) ? $s['slides'] : array();
		$stories = isset( $s['stories'] ) && is_array( $s['stories'] ) ? $s['stories'] : array();
		$popular = isset( $s['popular_items'] ) && is_array( $s['popular_items'] ) ? $s['popular_items'] : array();
		$count   = max( 1, count( $slides ) );
		?>
		<section class="top-news" id="news" aria-label="<?php esc_attr_e( 'Top news', 'usnews' ); ?>">
			<div class="container top-grid">
				<aside class="news-use">
					<p class="news-use__title"><?php echo esc_html( $s['left_title'] ?? '' ); ?></p>
					<ul class="story-list">
						<?php foreach ( $stories as $item ) : ?>
							<li>
								<h3><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ?? '' ); ?></a></h3>
								<p><?php echo esc_html( $item['excerpt'] ?? '' ); ?></p>
								<p class="byline"><?php echo esc_html( $item['byline'] ?? '' ); ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				</aside>

				<div class="feature-stage" data-carousel>
					<div class="feature-viewport">
						<div class="feature-track">
							<?php foreach ( $slides as $i => $slide ) : ?>
								<article class="feature-slide<?php echo 0 === $i ? ' is-active' : ''; ?>">
									<div class="media"><img src="<?php echo esc_url( $this->img_url( $slide, 'image' ) ); ?>" alt="<?php echo esc_attr( $slide['title'] ?? '' ); ?>" width="1200" height="800"></div>
									<?php if ( ! empty( $slide['badge'] ) ) : ?>
										<span class="slide-badge"><?php echo esc_html( $slide['badge'] ); ?></span>
									<?php endif; ?>
									<div class="caption">
										<h2><a href="<?php echo esc_url( $slide['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $slide['title'] ?? '' ); ?></a></h2>
										<p><?php echo esc_html( $slide['excerpt'] ?? '' ); ?></p>
										<span class="credit"><?php echo esc_html( $slide['credit'] ?? '' ); ?></span>
									</div>
								</article>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="feature-controls">
						<button class="feature-nav feature-nav--prev" type="button" aria-label="<?php esc_attr_e( 'Previous slide', 'usnews' ); ?>">‹</button>
						<div class="feature-dots" role="tablist" aria-label="<?php esc_attr_e( 'Featured stories', 'usnews' ); ?>">
							<?php for ( $i = 0; $i < $count; $i++ ) : ?>
								<button type="button" class="<?php echo 0 === $i ? 'is-active' : ''; ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Slide %d', 'usnews' ), $i + 1 ) ); ?>"></button>
							<?php endfor; ?>
						</div>
						<button class="feature-nav feature-nav--next" type="button" aria-label="<?php esc_attr_e( 'Next slide', 'usnews' ); ?>">›</button>
					</div>
				</div>

				<aside class="most-popular">
					<p class="col-title"><?php echo esc_html( $s['popular_title'] ?? '' ); ?></p>
					<ul class="popular-list">
						<?php foreach ( $popular as $item ) : ?>
							<li><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ?? '' ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</aside>
			</div>
		</section>
		<?php
	}
}
