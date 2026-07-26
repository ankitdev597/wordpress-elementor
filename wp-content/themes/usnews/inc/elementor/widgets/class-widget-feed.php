<?php
/**
 * Feed trio: stories + data/quote + more stories.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Feed extends Widget_Base {

	public function get_name() {
		return 'usnews-feed';
	}

	public function get_title() {
		return __( 'USN · Feed Trio', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-posts-group';
	}

	protected function register_controls() {
		$this->start_controls_section( 'feed', array( 'label' => __( 'Feed stories', 'usnews' ) ) );
		$item = new \Elementor\Repeater();
		$item->add_control( 'image', array( 'label' => __( 'Thumb', 'usnews' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => $this->placeholder() ) ) );
		$item->add_control( 'kicker', array( 'label' => __( 'Kicker', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$item->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$item->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$item->add_control( 'excerpt', array( 'label' => __( 'Excerpt', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$item->add_control( 'byline', array( 'label' => __( 'Byline', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$this->add_control(
			'items',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $item->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'kicker' => 'Investing', 'title' => '7 Best ETFs to Invest in Corporate Bonds', 'url' => array( 'url' => '#more-from' ), 'excerpt' => 'Corporate bond ETFs can deliver attractive yields while helping diversify a portfolio beyond stocks.', 'byline' => 'By Tony Dong and Jeff Reeves', 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'kicker' => 'U.S. News Decision Points', 'title' => 'A Strange and Scary Week in AI', 'url' => array( 'url' => '#news' ), 'excerpt' => 'From model launches to safety debates, the week raised new questions about AI’s pace and power.', 'byline' => 'By Susan Milligan', 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'kicker' => 'Investing', 'title' => '7 Best-Performing ETFs of 2026', 'url' => array( 'url' => '#more-from' ), 'excerpt' => 'Top-performing funds so far this year and what is driving their gains.', 'byline' => 'By Jeff Reeves', 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'kicker' => 'Investing', 'title' => 'Best Blue-Chip Stocks for Dividends', 'url' => array( 'url' => '#more-from' ), 'excerpt' => 'Stable companies with reliable payouts for income-focused investors.', 'byline' => 'By Tony Dong', 'image' => array( 'url' => $this->placeholder() ) ),
					array( 'kicker' => 'National News', 'title' => 'Tropical Storm Bertha: What to Know', 'url' => array( 'url' => '#news' ), 'excerpt' => 'Inland near the Texas-Louisiana border with sustained winds of 45 mph.', 'byline' => 'By U.S. News Staff', 'image' => array( 'url' => $this->placeholder() ) ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'data', array( 'label' => __( 'Data of the Day', 'usnews' ) ) );
		$this->add_control( 'data_title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Data of the Day' ) );
		$this->add_control( 'data_value', array( 'label' => __( 'Value', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$1.2B' ) );
		$this->add_control( 'data_text', array( 'label' => __( 'Text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'TikTok-driven health product sales highlight how social platforms shape consumer spending this year.' ) );
		$this->add_control( 'data_link_text', array( 'label' => __( 'Link text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Learn More →' ) );
		$this->add_control( 'data_link', array( 'label' => __( 'Link URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$this->end_controls_section();

		$this->start_controls_section( 'quote', array( 'label' => __( 'Quote card', 'usnews' ) ) );
		$this->add_control( 'quote_text', array( 'label' => __( 'Quote', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "This is a good moment to separate ‘I want this’ from ‘I need this,’ and that distinction saves real money." ) );
		$this->add_control( 'quote_name', array( 'label' => __( 'Name', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Jeff Judge' ) );
		$this->add_control( 'quote_role', array( 'label' => __( 'Role', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Certified Financial Planner and founder of a wealth advisory firm' ) );
		$this->add_control( 'quote_link_text', array( 'label' => __( 'Link text', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Learn more →' ) );
		$this->add_control( 'quote_link', array( 'label' => __( 'Link URL', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#more-from' ) ) );
		$this->end_controls_section();

		$this->start_controls_section( 'more', array( 'label' => __( 'More Stories', 'usnews' ) ) );
		$this->add_control( 'more_title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'More Stories' ) );
		$more = new \Elementor\Repeater();
		$more->add_control( 'title', array( 'label' => __( 'Title', 'usnews' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$more->add_control( 'url', array( 'label' => __( 'Link', 'usnews' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#' ) ) );
		$this->add_control(
			'more_items',
			array(
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $more->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array( 'title' => 'Best Car Lease Deals', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'Cars That Are Almost Self-Driving', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'D.C.’s Record-Breaking Fourth of July', 'url' => array( 'url' => '#photos' ) ),
					array( 'title' => 'Worst Countries for Racial Equity', 'url' => array( 'url' => '#news' ) ),
					array( 'title' => 'Best Cell Phone Plans', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'Best Travel Insurance Companies', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => "Photos: Trump's State Fair", 'url' => array( 'url' => '#photos' ) ),
					array( 'title' => 'Best Places to Retire', 'url' => array( 'url' => '#more-from' ) ),
					array( 'title' => 'How We Rank Colleges', 'url' => array( 'url' => '#education' ) ),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<section class="section section--feed" aria-label="<?php esc_attr_e( 'Stories and insights', 'usnews' ); ?>">
			<div class="container feed-trio">
				<div class="feed-list">
					<?php foreach ( $s['items'] as $item ) : ?>
						<article class="feed-item">
							<a class="media media--thumb" href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>">
								<img src="<?php echo esc_url( $this->img_url( $item, 'image' ) ); ?>" alt="" width="1200" height="800" loading="lazy">
							</a>
							<div>
								<span class="kicker"><?php echo esc_html( $item['kicker'] ); ?></span>
								<h3><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h3>
								<p><?php echo esc_html( $item['excerpt'] ); ?></p>
								<p class="byline"><?php echo esc_html( $item['byline'] ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="feed-widgets">
					<div class="data-block">
						<p class="mini-title"><?php echo esc_html( $s['data_title'] ); ?></p>
						<aside class="data-card">
							<div class="data-card__top">
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16M7 16V9m5 7V5m5 11v-6"></path></svg>
								<p class="value"><?php echo esc_html( $s['data_value'] ); ?></p>
							</div>
							<p><?php echo esc_html( $s['data_text'] ); ?></p>
							<a class="more-link" href="<?php echo esc_url( $s['data_link']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['data_link_text'] ); ?></a>
						</aside>
					</div>
					<aside class="quote-card">
						<span class="quote-mark quote-mark--open" aria-hidden="true">“</span>
						<blockquote><?php echo esc_html( $s['quote_text'] ); ?></blockquote>
						<span class="quote-mark quote-mark--close" aria-hidden="true">”</span>
						<p class="quote-attr"><strong><?php echo esc_html( $s['quote_name'] ); ?></strong><br><?php echo esc_html( $s['quote_role'] ); ?></p>
						<a class="more-link" href="<?php echo esc_url( $s['quote_link']['url'] ?? '#' ); ?>"><?php echo esc_html( $s['quote_link_text'] ); ?></a>
					</aside>
				</div>

				<aside class="more-rail">
					<p class="mini-title"><?php echo esc_html( $s['more_title'] ); ?></p>
					<ul class="more-list">
						<?php foreach ( $s['more_items'] as $item ) : ?>
							<li><a href="<?php echo esc_url( $item['url']['url'] ?? '#' ); ?>"><?php echo esc_html( $item['title'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</aside>
			</div>
		</section>
		<?php
	}
}
