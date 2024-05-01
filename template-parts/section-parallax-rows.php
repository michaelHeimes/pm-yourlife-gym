<?php
$parallax_rows = $args['parallax_rows'] ?? null;
$rows = $parallax_rows['parallax_rows']['rows'] ?? null;
?>
<section class="parallax-rows">
	<?php if($rows): $i = 1; foreach($rows as $row):
		
		$slug = '';
		$id_for_anchor = $row['id_for_anchor'] ?? null;
		$headline = $row['headline'] ?? null;
		if( !empty($id_for_anchor) ) {
			$slug = sanitize_title($id_for_anchor);
		} elseif( !empty( $headline ) ) {
			$slug = sanitize_title($headline) ?? null;
		} else {
			$slug = 'row-' . $i;
		}
		
		$background_type = $row['background_type'] ?? null;
		$headline = $row['headline'] ?? null;
		$background_image = $row['background_image'] ?? null;
		$background_video_file = $row['background_video_file'] ?? null;
		$cta_card = $row['cta_card'] ?? null;
		$cta_card_heading = $cta_card['heading'] ?? null;
		$cta_card_text = $cta_card['text'] ?? null;
		$button_1 = $cta_card['button_1'] ?? null;
		$button_2 = $cta_card['button_2'] ?? null;
		$cta_card_offset_image = $cta_card['offset_image'] ?? null;
	?>
	<div id="<?=esc_attr($slug);?>" class="single-row" data-magellan-target="<?=esc_attr($slug);?>">
		<div class="background grid-x align-center align-middle has-bg">
			<?php if( $background_type == 'image' && !empty( $background_image ) ) {
				$imgID = $background_image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="bg img-wrap">';
				echo $img;
				echo '</div>';
			}?>
			<?php if( $background_type == 'video' && !empty( $background_video_file ) ):?>
				<div class="bg video-wrap">
					<video class="looping-video" width="1600" preload="none" height="900" playsinline loop muted>
					  <source src="<?= esc_url( $background_video_file['url'] );?>" type="video/mp4" />
					</video>
				</div>
			<?php endif;?>
			<?php if( !empty($headline ) ):?>
				<h2 class="text-center color-white position-relative"><?=$headline;?></h2>
			<?php endif;?>
		</div>
		<?php if($cta_card):?>
			<div class="offset-cta position-relative">
				<div class="grid-x grid-padding-x position-relative align-bottom<?php if ($i % 2 !== 0) { echo ' flex-dir-row';} else { echo ' flex-dir-row-reverse'; };?>">
					<?php if( !empty( $cta_card_offset_image ) ) {
						$imgID = $cta_card_offset_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="img-wrap cell small-12 tablet-6">';
						echo '<div class="inner">';
						echo $img;
						echo '</div>';
						echo '</div>';
					}?>
					<div class="cta-card-wrap cell small-12 tablet-6<?php if ($i % 2 == 1) { echo ' tablet-offset-5';};?>">
						<div class="cta-card bg-black color-white">
							<?php if( !empty($cta_card_heading) ):?>
								<h3><?=$cta_card_heading;?></h3>
							<?php endif;?>
							<?php if( !empty($cta_card_text) ):?>
								<p class="color-light-gray"><?=$cta_card_text;?></p>
							<?php endif;?>
							<?php if( !empty($button_1) || !empty($button_2) ):?>
								<div class="grid-x grid-padding-x button-group">
									<?php 
									$link =$button_1;
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<div class="cell shrink">
											<a class="button chev-link no-bg color-white grid-x align-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<span><?php echo esc_html( $link_title ); ?></span>
												<svg xmlns="http://www.w3.org/2000/svg" width="12.746" height="20.641" viewBox="0 0 12.746 20.641"> <path id="ic_chevron_right_24px" d="M11.015,6,8.59,8.425l7.878,7.9-7.878,7.9,2.425,2.425L21.336,16.321Z" transform="translate(-8.59 -6)" fill="#ffffff"/></svg>
											</a>
										</div>
									<?php endif; ?>
									<?php 
									$link =$button_2;
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<div class="cell shrink">
											<a class="button chev-link grid-x align-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<span><?php echo esc_html( $link_title ); ?></span>
												<svg xmlns="http://www.w3.org/2000/svg" width="10.239" height="16.582" viewBox="0 0 10.239 16.582"><path id="ic_chevron_right_24px" d="M10.538,6,8.59,7.948l6.329,6.343L8.59,20.634l1.948,1.948,8.291-8.291Z" transform="translate(-8.59 -6)"/></svg>
											</a>
										</div>
									<?php endif; ?>
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
	</div>
	<?php $i++; endforeach; endif;?>
</section>