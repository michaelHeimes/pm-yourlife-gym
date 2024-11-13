<?php 
$page_banner = get_field('page_banner') ?? null;

// Sliders
$slider_transition_delay = $page_banner['slider_transition_delay'] ?? null;
$slides = $page_banner['slides'] ?? null;
?>
<?php if( !empty( $page_banner['centered_heading'] ) || !empty( $page_banner['slides'] ) ):?>
<header class="entry-header page-banner has-bg grid-x align-middle style-banner-slider">
	<?php if( !empty( $slides ) ):?>
		<div class="bg bg-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
			<div class="swiper-wrapper">
				<?php $i = 1; foreach($slides as $slide):
					$type = $slide['media_type'];
					$text_banner = $slide['text_banner'] ?? null;	
					$video_modal_url = $slide['video_modal_url'] ?? null;
					if( $video_modal_url ) {
						$video_title = '';
						
						if (preg_match('/title="([^"]+)"/', $video_modal_url, $matches)) {
							$video_title = $matches[1] ?? null;
						}
					}
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

						<div class="grid-container content grid-x align-center">
							<div class="small-12 grid-x grid-padding-x align-center align-middle flex-dir-column medium-flex-dir-row-reverse">
								<?php if( !empty($text_banner) ):?>
									<div class="cell small-12 <?php if( !empty( $video_modal_url ) ) { echo ' medium-6 large-5';} else { echo ' medium-10 large-8 align-center text-center'; }?> position-relative grid-x align-middle">
										<h2 class="h3 color-white uppercase"><?=esc_html($text_banner);?></h2>
									</div>
								<?php endif;?>
								<?php if( !empty( $video_modal_url ) ):?>
									<div class="btn-wrap cell small-12 medium-6 large-5 position-relative grid-x align-middle">
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
					</div>
				<?php $i++; endforeach;?>
			</div>
			<?php if( !empty( $slides ) && count($slides) > 1 ):?>
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
</header>
<?php endif;?>
