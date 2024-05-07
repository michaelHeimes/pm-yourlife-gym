<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part('template-parts/section', 'blog-banner',
		array (
			'title' => get_the_title(),	
			'featured_image_ID' => get_post_thumbnail_id( get_the_ID() ),
		),
	);?>

	<div class="entry-content has-brick-repeating-bg position-relative">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="inner cell small-12 tablet-10 position-relative">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'trailhead' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
			
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'trailhead' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
