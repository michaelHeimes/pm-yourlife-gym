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
$home_hero = $fields['home_hero'] ?? null;
$copy_ctas_image = $fields['copy_ctas_image'] ?? null;
$parallax_rows = $fields['parallax_rows'] ?? null;
$has_prefooter_cta = false;
$prefooter_cta = get_field('pre-footer_cta', 'option') ?? null;
if( !empty( $prefooter_cta ) || !empty( get_field('sticky_get_started_cta', 'option') ) || !empty( get_field('street_address', 'option') ) || !empty( get_field('phone_number', 'option') ) ) {
	$has_prefooter_cta = true;
}
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if( !empty( $home_hero ) ) {
						get_template_part('template-parts/section', 'home-hero');
					}?>
				
					<section itemprop="text">
						
						<?php if( !empty( $fields['copy_ctas_image'] ) ) {
							get_template_part('template-parts/section', 'copy-ctas-image',
								array(
									'copy_ctas_image' => $fields['copy_ctas_image'],
								),
							);
						}?>
						
						<?php if( !empty( $fields['parallax_rows'] ) ) {
							get_template_part('template-parts/section', 'parallax-rows',
								array(
									'parallax_rows' => $parallax_rows ?? null,
								),
							);
						}?>
						
						<?php the_content(); ?>
					</section> <!-- end article section -->
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
		
		<?php 
		if( $has_prefooter_cta == true ) {
			get_template_part('template-parts/section', 'pre-footer-cta',
				array(
					'pre-footer-cta' => $prefooter_cta,
				),
			);
		}
		?>
		
		<div id="anchor-nav" class="anchor-nav bg-gold grid-x flex-dir-column align-middle show-for-tablet" data-magellan data-animation-easing="swing" data-offset="105" data-threshold="1">
			<div class="inner bg-black grid-x flex-dir-column align-middle">
				<a id="anchor-prev" href="#null">
					<span class="show-for-sr">Prev</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="22.731" height="14.037" viewBox="0 0 22.731 14.037">
					  <path id="ic_expand_less_24px" d="M17.366,8,6,19.366l2.671,2.671,8.695-8.676,8.695,8.676,2.671-2.671Z" transform="translate(-6 -8)" fill="#c5a75f"/></svg>
				</a>
				<ul class="menu vertical">
					<?php if( !empty($home_hero) ):
						$slug = '';
						$title = '';
						$id_for_anchor = $home_hero['id_for_anchor'] ?? null;
						$headline = $home_hero['headline_hero'] ?? null;
						if( !empty($id_for_anchor) ) {
							$slug = sanitize_title($id_for_anchor);
							$title = $id_for_anchor;
						} elseif( !empty( $headline ) ) {
							$slug = sanitize_title($headline) ?? null;
							$title = $headline;
						} else {
							$slug = 'home-hero';
						}	
					?>
						<li>
							<a href="#<?=$slug;?>">
								<span class="show-for-sr"><?=$title;?></span>
								<span></span>
							</a>
						</li>
					<?php endif;?>
					<?php if( !empty($copy_ctas_image) ):
						$slug = '';
						$title = '';
						$id_for_anchor = $copy_ctas_image['id_for_anchor'] ?? null;
						$headline = $copy_ctas_image['headline'] ?? null;
						if( !empty($id_for_anchor) ) {
							$slug = sanitize_title($id_for_anchor);
							$title = $id_for_anchor;
						} elseif( !empty( $headline ) ) {
							$slug = sanitize_title($headline) ?? null;
							$title = $headline;
						} else {
							$slug = 'page-intro';
						}	
					?>
						<li>
							<a href="#<?=$slug;?>">
								<span class="show-for-sr"><?=$title;?></span>
								<span></span>
							</a>
						</li>
					<?php endif;?>
					<?php if($parallax_rows):
						$rows = $parallax_rows['parallax_rows']['rows'] ?? null;
						$i = 1; 
						foreach( $rows as $row ):
							$slug = '';
							$title = '';
							$id_for_anchor = $row['id_for_anchor'] ?? null;
							$headline = $row['headline'] ?? null;
							if( !empty($id_for_anchor) ) {
								$slug = sanitize_title($id_for_anchor);
								$title = $id_for_anchor;
							} elseif( !empty( $headline ) ) {
								$slug = sanitize_title($headline) ?? null;
								$title = $headline;
							} else {
								$slug = 'row-' . $i;
							}
						?>
						<li>
							<a href="#<?=$slug;?>">
								<span class="show-for-sr"><?=$title;?></span>
								<span></span>
							</a>
						</li>
						<?php $i++; 
						endforeach; 
					endif;?>
					<?php if( $has_prefooter_cta == true ) :
						$slug = '';
						$title = '';
						$headline = $prefooter_cta['headline'] ?? null;
						if( !empty( $headline ) ) {
							$slug = sanitize_title($headline) ?? null;
							$title = $headline;
						} else {
							$slug = 'get-started';
							$title = 'Get Started';
						}	
					?>
						<li>
							<a href="#<?=$slug;?>">
								<span class="show-for-sr"><?=$title;?></span>
								<span></span>
							</a>
						</li>
					<?php endif;?>
				</ul>
				<a id="anchor-next" href="#null">
					<span class="show-for-sr">Next</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="22.731" height="14.037" viewBox="0 0 22.731 14.037"><path id="ic_expand_less_24px" d="M17.366,22.037,28.731,10.671,26.061,8l-8.695,8.676L8.671,8,6,10.671Z" transform="translate(-6 -8)" fill="#c5a75f"/></svg>
				</a>
			</div>
		</div>
		
	</div>
	
<?php
get_footer();