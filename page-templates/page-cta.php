<?php
/**
 * Template name:CTA Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();
$cta_page_banner = $fields['cta_page_banner'];
$steps_accordion = $fields['steps_accordion'] ?? null;
$form_id = get_field('gravity_form') ?? null;
$contact_background_image = $fields['contact_background_image'] ?? null;
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if( !empty( $cta_page_banner ) ) {
						get_template_part('template-parts/section', 'cta-page-banner');
					}?>
				
					<section class="accordion-blocks-wrap has-brick-repeating-bg position-relative" itemprop="text">
						<div class="grid-container position-relative">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-12 tablet-10 xlarge-8">
									<?php if( !empty($steps_accordion) ):
										$accordions = $steps_accordion["steps_accordion"]['accordions'] ?? null;	
										if($accordions):
									?>
										<ul class="accordion steps-accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true" data-update-history="true" data-deep-link-smudge="true" data-deep-link-smudge-delay="500" data-deep-link-smudge-offset="150">
											<?php $i = 1; foreach($accordions as $accordion):
												// Add leading zero if $i is a single digit
												$formatted_i = sprintf("%02d", $i);
												$title = $accordion['title'];
												$slug = sanitize_title($title);
												$text_content = $accordion['text_content'];
												$button_link = $accordion['button_link'];
											?>
							    				<li class="accordion-item<?php if( $i == 1 ){ echo ' is-active init';}?>" data-accordion-item>
													<a href="#<?=esc_attr($slug);?>" class="accordion-title color-black grid-x align-middle">
														<div class="grid-x grid-padding-x">
															<div class="number color-gold font-header cell shrink medium-2 grid-x flex-dir-column align-middle text-center position-relative">
																<b><?=esc_attr( $formatted_i );?></b>
																<svg xmlns="http://www.w3.org/2000/svg" width="41.151" height="25.411" viewBox="0 0 41.151 25.411"><path id="ic_expand_more_24px" d="M42.316,8.59,26.576,24.3,10.835,8.59,6,13.425,26.576,34,47.151,13.425Z" transform="translate(-6 -8.59)" fill="#c5a75f"/></svg>
															</div>
															<div class="cell auto medium-10  grid-x align-middle">
																<h2><?=esc_html($title);?></h2>
															</div>
														</div>
													</a>
													<div class="accordion-content" data-tab-content>
														<div class="grid-x grid-padding-x">
															<div class="cell auto medium-10 medium-offset-2">
																<div class="grid-x grid-padding-x">
																	<?php if( !empty($text_content) ):?>
																		<div class="cell small-12 medium-auto">
																			<?=$text_content;?>
																		</div>
																	<?php endif;?>
																	<?php if( !empty($button_link) ):?>
																		<div class="cell small-12 medium-shrink">
																			<?php 
																			$link = $button_link;
																			if( $link ): 
																				$link_url = $link['url'];
																				$link_title = $link['title'];
																				$link_target = $link['target'] ? $link['target'] : '_self';
																				?>
																				<div>
																					<a class="button chev-link grid-x align-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
																						<span><?php echo esc_html( $link_title ); ?></span>
																						<svg xmlns="http://www.w3.org/2000/svg" width="11.583" height="18.758" viewBox="0 0 11.583 18.758"><path id="ic_chevron_right_24px" d="M10.794,6,8.59,8.2l7.159,7.175L8.59,22.554l2.2,2.2,9.379-9.379Z" transform="translate(-8.59 -6)"/></svg>
																					</a>
																				</div>
																			<?php endif; ?>
																		</div>
																	<?php endif;?>
																</div>
															</div>
														</div>
													</div>
													<div class="grid-x grid-padding-x">
														<div class="cell auto medium-10 medium-offset-2">
															<hr>
														</div>
													</div>
												</li>
											<?php $i++; endforeach;?>
										</ul>
									<?php endif; endif;?>
									<div class="entry-content has-blocks">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</section> <!-- end article section -->
							
					<?php

					if ($form_id && $form_id !== 'none') :
						$escaped_form_id = acf_esc_html($form_id);?>
						<section class="contact-form bg-black has-object-fit position-relative">
							<?php if( !empty( $contact_background_image ) ) {
								$imgID = $contact_background_image['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit-img", "alt"=>$img_alt] );
								echo $img;
							}?>
							<svg class="position-relative arrow-down" xmlns="http://www.w3.org/2000/svg" width="81" height="81" viewBox="0 0 81 81"> <circle id="Ellipse_19" data-name="Ellipse 19" cx="40.5" cy="40.5" r="40.5" fill="#c5a75f"/><path id="ic_expand_more_24px" d="M42.316,8.59,26.576,24.3,10.835,8.59,6,13.425,26.576,34,47.151,13.425Z" transform="translate(13.849 20.41)"/></svg>
							<div class="grid-container position-relative">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-12 tablet-10 xlarge-8">
										<?php gravity_form( $escaped_form_id, false, false, false, '', true, '' );?> 
									</div>
								</div>
							</div>
						</section>
					<?php endif;?>
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
		
	</div>
	
<?php
get_footer();