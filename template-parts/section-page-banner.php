<?php 
$page_banner = $args['page_banner'] ?? null;
$id_for_anchor = $page_banner['id_for_anchor'] ?? null;
$style = $page_banner['style'] ?? null; 


//Hero Fields
$headline_hero =  $page_banner['headline_hero'] ?? null;
$button_link_hero = $page_banner['button_link_hero'] ?? null;

//Centered Fields
$centered_heading = $page_banner['centered_heading'] ?? null;
$centered_text = $page_banner['centered_text'] ?? null;
$background_image = $page_banner['background_image'] ?? null;

// Sliders
$slider_transition_delay = $page_banner['slider_transition_delay'] ?? null;
$slides = $page_banner['slides'] ?? null;

?>
<header class="entry-header page-banner has-bg grid-x align-middle style-<?= esc_attr( $style );?>"<?php if( !empty($id_for_anchor) ) { echo ' data-magellan-target="' . sanitize_title($id_for_anchor) . '"'; }?>>
	<?php if( $style == 'hero-slider' ) { echo '<div class="bg">';}?>
		<?php if( $style == 'hero-slider' ):?>
			<div class="accent-wrap">
			</div>
		<?php endif;?>
		<?php if( !empty( $slides ) && $style == 'hero-slider' || !empty( $slides ) && $style == 'banner-slider' ):?>
			<div class="bg-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
				<div class="swiper-wrapper">
					<?php $i = 1; foreach($slides as $slide):
						$type = $slide['media_type'];
					?>
						<div class="swiper-slide">
							<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
								$imgID = $slide['image']['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="img-wrap">';
								echo $img;
								echo '</div>';
							}?>
							<?php if( $type == 'video' && !empty( $slide['video_file'] ) ):?>
								<div class="video-wrap">
									<video width="1600" preload="none" height="900" playsinline loop muted>
									  <source src="<?= esc_url( $slide['video_file']['url'] );?>" type="video/mp4" />
									</video>
								</div>
							<?php endif;?>
							<?php if( $style == 'banner-slider' ):
								$text_banner = $slide['text_banner'] ?? null;	
								$video_modal_url = $slide['video_modal_url'] ?? null;
								if( $video_modal_url ) {
									$video_title = '';
									
									if (preg_match('/title="([^"]+)"/', $video_modal_url, $matches)) {
										$video_title = $matches[1] ?? null;
									}
								}
							?>
								<div class="grid-container content">
									<div class="grid-x grid-padding-x align-justify flex-dir-column tablet-flex-dir-row-reverse">
										<?php if( !empty($text_banner) ):?>
											<div class="cell small-12 medium-6 position-relative">
												<h2 class="h3 color-white uppercase"><?=esc_html($text_banner);?></h2>
											</div>
										<?php endif;?>
										<?php if( !empty( $video_modal_url ) ):?>
											<div class="cell small-12 medium-6 position-relative">
												<button class="button no-style position-relative" data-open="<?=sanitize_title($video_title) . '-video-modal-' . $i;?>">
													<svg id="play" xmlns="http://www.w3.org/2000/svg" width="262.929" height="262.929" viewBox="0 0 262.929 262.929"><path id="Path_48" data-name="Path 48" d="M131.464,0A131.464,131.464,0,1,1,0,131.464,131.464,131.464,0,0,1,131.464,0Z" opacity="0.619"/><path id="Polygon_2" data-name="Polygon 2" d="M48.746,6.413a4,4,0,0,1,7.018,0L101.271,89.58a4,4,0,0,1-3.509,5.92H6.748a4,4,0,0,1-3.509-5.92Z" transform="matrix(0.875, -0.485, 0.485, 0.875, 50.736, 100.004)" fill="#c5a75f"/></svg>
												</button>
												<div class="reveal large video-modal" id="<?=sanitize_title($video_title) . '-video-modal-' . $i;?>" data-reveal data-animation-in="fade-in fast" data-animation-out="fade-out fast" data-reset-on-close="true" data-deep-link="true">
													<div class="text-right">
														<button class="close-button no-style" data-close aria-label="Close modal" type="button">
															<span aria-hidden="true">&times;</span>
													 	</button>
													</div>	
													<?php
														// Load value.
														$iframe = $video_modal_url;
														
														// Use preg_match to find iframe src.
														preg_match('/src="(.+?)"/', $iframe, $matches);
														$src = $matches[1];
														
														// Add extra parameters to src and replace HTML.
														$params = array(
															'controls'  => 1,
															'hd'        => 1,
															'autohide'  => 1,
															'rel'       => 0,
														);
														$new_src = add_query_arg($params, $src);
														//$iframe = str_replace($src, '', $iframe);
														$iframe = str_replace($src, '', $iframe);
														
														// Add extra attributes to iframe HTML.
														$attributes = 'frameborder="0"';
														$iframe = str_replace('></iframe>', '' . $attributes . '></iframe>', $iframe);
														
														// Display customized HTML.
														echo '<div class="responsive-embed widescreen" data-src-defer="' . $new_src . '">';
														echo $iframe;
														echo '</div>';
													?>
													
												</div>
											</div>
										<?php endif;?>
									</div>
								</div>
							<?php endif;?>	
						</div>
					<?php $i++; endforeach;?>
				</div>
				<?php if( !empty( $slides ) && count($slides) > 1 && $style == 'banner-slider' ):?>
					<div class="grid-container pagination-container">
						<div class="grid-x grid-padding-x align-center">
							<div class="cell small-12">
								<div class="position-relative">
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</div>
					</div>
				<?php endif;?>
			</div>
		<?php endif;?>
	<?php if( $style == 'hero-slider' ) { echo '</div>';}?>
	<?php if( $style == 'hero-slider' ):?>
		<div class="content position-relative">
			<div class="grid-container">
					
				<?php if($style == 'hero-slider'):?>
					<div class="grid-x grid-padding-x align-center">
						<div class="cell small-12 tablet-10">
							<?php if( !empty($headline_hero) ):?>
								<h1 class="uppercase color-white"><b><?=$headline_hero;?></b></h1>
							<?php endif;?>
							<?php 
							$link = $button_link_hero;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
							<div>
								<a class="button large uppercase grid-x align-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<span><?php echo esc_html( $link_title ); ?></span>
									<svg xmlns="http://www.w3.org/2000/svg" width="11.583" height="18.758" viewBox="0 0 11.583 18.758"><path id="ic_chevron_right_24px" d="M10.794,6,8.59,8.2l7.159,7.175L8.59,22.554l2.2,2.2,9.379-9.379Z" transform="translate(-8.59 -6)"/></svg>
								</a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif;?>
			</div>
		<?php endif;?>
	</div>
</header>
