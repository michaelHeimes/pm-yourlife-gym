<?php 
$home_hero = get_field('home_hero') ?? null;
$id_for_anchor = $home_hero['id_for_anchor'] ?? null;

//Hero Fields
$headline_hero =  $home_hero['headline_hero'] ?? null;
$button_link_hero = $home_hero['button_link_hero'] ?? null;

// Sliders
$slider_transition_delay = $home_hero['slider_transition_delay'] ?? null;
$slides = $home_hero['slides'] ?? null;

?>
<header id="<?=sanitize_title($id_for_anchor);?>" class="entry-header page-banner has-bg grid-x align-middle style-hero-slider"<?php if( !empty($id_for_anchor) ) { echo ' data-magellan-target="' . sanitize_title($id_for_anchor) . '"'; }?>>
	<div class="bg">
		<div class="accent-wrap"></div>
		<?php if( !empty( $slides ) ):?>
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
	</div>
	<div class="content position-relative">
		<div class="grid-container">				
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
		</div>
	</div>
</header>
