<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();

$has_prefooter_cta = false;
$prefooter_cta = get_field('pre-footer_cta', 'option') ?? null;
if( !empty( $prefooter_cta ) || !empty( get_field('sticky_get_started_cta', 'option') ) || !empty( get_field('street_address', 'option') ) || !empty( get_field('phone_number', 'option') ) ) {
    $has_prefooter_cta = true;
}

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

if( $has_prefooter_cta == true ) {
    get_template_part('template-parts/section', 'pre-footer-cta',
        array(
            'pre-footer-cta' => $prefooter_cta,
        ),
    );
}

get_footer();
