<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();

$posts_page_id = get_option('page_for_posts'); // Retrieve the ID of the posts page

$has_prefooter_cta = false;
$prefooter_cta = get_field('pre-footer_cta', 'option') ?? null;
if( !empty( $prefooter_cta ) || !empty( get_field('sticky_get_started_cta', 'option') ) || !empty( get_field('street_address', 'option') ) || !empty( get_field('phone_number', 'option') ) ) {
	$has_prefooter_cta = true;
}

?>

	<main id="primary" class="site-main">
		<header>
			<?php get_template_part('template-parts/section', 'blog-banner',
				array (
					'title' => get_the_title(),	
					'featured_image_ID' => get_post_thumbnail_id( $posts_page_id ),
				),
			);?>
		</header>
		<div class="blog-primary position-relative has-brick-repeating-bg">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell small-12 tablet-10">
						<?php if( is_home() && !empty(get_post_field( 'post_content', $posts_page_id )) ):?>
							<div class="grid-intro entry-content">
								<?=get_post_field( 'post_content', $posts_page_id );?>
							</div>
						<?php endif;?>
						<?php
						if ( have_posts() ) :?>
							
							<?php
							echo '<div class="posts-grid grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">';
	
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
					
									/*
				 					* Include the Post-Type-specific template for the content.
				 					* If you want to override this in a child theme, then include a file
				 					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 					*/
										get_template_part( 'template-parts/loop', get_post_type() );
								endwhile;
							
							echo '</div>';
							
							echo '<div class="grid-x grid-padding-x align-center">';
								echo '<div class="inner cell small-12 medium-10 tablet-4 position-relative font-header uppercase">';
									trailhead_page_navi();
								echo '</div>';
							echo '</div>';
				
						else :
				
							get_template_part( 'template-parts/content', 'none' );
				
						endif;
						?>
						
						<?php get_template_part('template-parts/section', 'post-footer-nav');?>
						
					</div>
				</div>
			</div>
		</div>
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
