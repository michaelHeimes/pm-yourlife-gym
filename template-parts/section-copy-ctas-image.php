<?php
$copy_ctas_image = $args['copy_ctas_image'] ?? null;

$slug = '';
$id_for_anchor = $copy_ctas_image['id_for_anchor'] ?? null;
$headline = $copy_ctas_image['headline'] ?? null;
if( !empty($id_for_anchor) ) {
	$slug = sanitize_title($id_for_anchor);
} elseif( !empty( $headline ) ) {
	$slug = sanitize_title($headline) ?? null;
} else {
	$slug = 'page-intro';
}

$heading = $copy_ctas_image['heading'] ?? null;
$subheading = $copy_ctas_image['subheading'] ?? null;
$copy = $copy_ctas_image['copy'] ?? null;
$button_link_1 = $copy_ctas_image['button_link_1'] ?? null;
$button_link_2 = $copy_ctas_image['button_link_2'] ?? null;
$image = $copy_ctas_image['image'] ?? null;
?>
<section id="<?=esc_attr($slug);?>" class="copy-ctas-image" data-magellan-target="<?=esc_attr($slug);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center tablet-flex-dir-row-reverse">
			<?php if( !empty( $image ) ) {
				$imgID = $image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="img-wrap cell small-12 medium-8 tablet-5">';
				echo $img;
				echo '</div>';
			}?>
			<?php if( !empty($heading) || !empty($subheading) || !empty($copy) || !empty($button_link_1) || !empty($button_link_2) ):?>
				<div class="text-wrap cell small-12 tablet-7">
					<?php if( !empty($heading) || !empty($subheading) ):?>
						<div class="section-header h2">
							<?php if( !empty($heading)):?>
								<h2><?=esc_html($heading);?></h2>
							<?php endif;?>
							<?php if( !empty($subheading) ):?>
								<h3><?=esc_html($subheading);?></h3>
							<?php endif;?>
						</div>
						<?php if( !empty($copy) ):?>
							<div class="copy-wrap entry-content">
								<?=wp_kses_post( $copy );?>
							</div>
						<?php endif;?>
					<?php endif;?>
					<?php if( !empty($button_link_1) || !empty($button_link_2) ):?>
						<div class="grid-x grid-padding-x button-group align-center">
							<?php 
							$link =$button_link_1;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<div class="cell shrink">
									<a class="button chev-link no-bg grid-x align-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<span><?php echo esc_html( $link_title ); ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="12.746" height="20.641" viewBox="0 0 12.746 20.641"> <path id="ic_chevron_right_24px" d="M11.015,6,8.59,8.425l7.878,7.9-7.878,7.9,2.425,2.425L21.336,16.321Z" transform="translate(-8.59 -6)"/></svg>
									</a>
								</div>
							<?php endif; ?>
							<?php 
							$link = $button_link_2;
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
			<?php endif;?>
		</div>
	</div>
</section>