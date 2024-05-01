<?php
$pre_footer_cta = $args['pre-footer-cta'] ?? null;
$background_image = $pre_footer_cta['background_image'] ?? null;
$headline = $pre_footer_cta['headline'] ?? null;

$slug = '';
if( !empty( $headline ) ) {
	$slug = sanitize_title($headline) ?? null;
} else {
	$slug = 'get-started';
}

$street_address = get_field('street_address', 'option') ?? null;
$directions_url = get_field('directions_url', 'option') ?? null;
$phone_number = get_field('phone_number', 'option') ?? null;
$get_started = get_field('sticky_get_started_cta', 'option');
?>
<div class="prefooter-divider position-relative"></div>
<section id="<?=esc_attr($slug);?>" class="prefooter-cta bg-black has-object-fit position-relative" data-magellan-target="<?=esc_attr($slug);?>">
	<?php if( !empty( $background_image ) ) {
		$imgID = $background_image['ID'];
		$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
		$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit-img", "alt"=>$img_alt] );
		echo $img;
	}?>
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x align-center text-center">
			<?php if( !empty($headline ) ):?>
				<div class="cell small-12 text-center">
					<h2><?=esc_html( $headline );?></h2>
				</div>
			<?php endif;?>
			<?php if( !empty($street_address) || !empty($phone_number) || !empty($get_started) ):?>
				<?php if( !empty($street_address) ):?>					
						
					<?php if( !empty( $directions_url ) ):?>
						<div class="link-wrap cell small-12 medium-shrink">
							<a class="grid-x align-middle font-header weight-semibold height-100  color-white" href="<?=esc_url($directions_url);?>" target="_blank" aria-label="opens direction in new tab">
							<?php endif;?>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20"> <path id="ic_place_24px" d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2Zm0,9.5A2.5,2.5,0,1,1,14.5,9,2.5,2.5,0,0,1,12,11.5Z" transform="translate(-5 -2)" fill="#ffffff"/></svg>
							<span><?=get_field('street_address', 'option');?></span>
							<?php if( !empty( $directions_url) ):?>
								</a>	
							<?php endif;?>
						</div>
					<?php endif;?>
					
					<?php if( !empty( $phone_number ) ):?>
						<div class="link-wrap cell small-12 medium-shrink">
							<a class="grid-x align-middle font-header weight-semibold height-100 color-white" href="tel:<?=esc_html( $phone_number );?>" target="_blank">	
								<svg xmlns="http://www.w3.org/2000/svg" width="13.132" height="22.223" viewBox="0 0 13.132 22.223"><path id="ic_phone_iphone_24px" d="M15.606,1H7.525A2.526,2.526,0,0,0,5,3.525V20.7a2.526,2.526,0,0,0,2.525,2.525h8.081A2.526,2.526,0,0,0,18.132,20.7V3.525A2.526,2.526,0,0,0,15.606,1ZM11.566,22.213A1.515,1.515,0,1,1,13.081,20.7,1.513,1.513,0,0,1,11.566,22.213Zm4.546-4.041H7.02V4.03h9.091Z" transform="translate(-5 -1)" fill="#ffffff"/></svg>
								<span><?=esc_html( $phone_number );?></span>
							</a>	
						</div>
					<?php endif;?>
					
					<?php 
					$link = $get_started;
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="link-wrap cell small-12 medium-shrink">
							<a class="grid-x align-middle bg-gold button font-header weight-semibold height-100 color-alt-black uppercase get-started" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<span><b><?php echo esc_html( $link_title ); ?></b></span>
								<svg xmlns="http://www.w3.org/2000/svg" width="10.498" height="17" viewBox="0 0 10.498 17"><path id="ic_chevron_right_24px" d="M10.588,6l-2,2,6.488,6.5L8.59,21l2,2,8.5-8.5Z" transform="translate(-8.59 -6)"/></svg>
							</a>
						</div>
					<?php endif; ?>

			<?php endif;?>
		</div>
	</div>
</section>