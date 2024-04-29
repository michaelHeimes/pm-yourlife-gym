<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if( !empty( $fields['page_banner'] ) ) {
						get_template_part('template-parts/section', 'page-banner',
							array(
								'page_banner' => $fields['page_banner'],
							),
						);
					}?>
				
					<div  itemprop="text">
						
						<?php if( !empty( $fields['copy_ctas_image'] ) ) {
							get_template_part('template-parts/section', 'copy-ctas-image',
								array(
									'copy_ctas_image' => $fields['copy_ctas_image'],
								),
							);
						}?>
						
						<?php if( !empty( $fields['copy_ctas_image'] ) ) {
							get_template_part('template-parts/section', 'parallax-rows',
								array(
									'parallax_rows' => $fields['parallax_rows'] ?? null,
								),
							);
						}?>
						
						<?php the_content(); ?>
					</div> <!-- end article section -->
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();