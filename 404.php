<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trailhead
 */

get_header();
?>
	<div class="content">
	<main id="primary" class="site-main">

		<article class="content-not-found">
			<?php get_template_part('template-parts/section', 'blog-banner',
				array(
					'title' => '',
					'featured_image_ID' => get_field('404_error_feature_image', 'option')['ID'],
				),
			);?>
			<div class="position-relative has-brick-repeating-bg">
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-center">
						<div class="inner cell small-12 tablet-10 position-relative">
	
							<section class="entry-content">
								<?=wp_kses_post( get_field('404_error_text', 'option') );?>
							</section> <!-- end article section -->
							
						</div>
					</div>
				</div>
			</div>
		</article> <!-- end article -->

	</main><!-- #main -->
</div>

<?php
get_footer();
