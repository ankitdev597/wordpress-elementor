<?php
/**
 * Fallback index — redirects blog listing visitors to the homepage
 * recreation when no posts loop is needed. Keeps theme valid.
 *
 * @package usnews
 */

get_header();

if ( is_home() && ! is_front_page() ) {
	?>
	<main id="main" class="section">
		<div class="container">
			<div class="section-head">
				<h2><?php esc_html_e( 'Latest', 'usnews' ); ?></h2>
			</div>
			<?php if ( have_posts() ) : ?>
				<ul class="story-list">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<li>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if ( has_excerpt() ) : ?>
								<p><?php echo esc_html( get_the_excerpt() ); ?></p>
							<?php endif; ?>
							<p class="byline"><?php echo esc_html( get_the_date() ); ?></p>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php else : ?>
				<p><?php esc_html_e( 'No posts yet.', 'usnews' ); ?></p>
			<?php endif; ?>
		</div>
	</main>
	<?php
} else {
	get_template_part( 'template-parts/home', 'main' );
}

get_footer();
