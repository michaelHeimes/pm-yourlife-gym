<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar-wrap grid-container fluid">

	<div class="top-bar position-relative" id="top-bar-menu">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php if( !empty( get_field('header_logo') ) ) {
					$imgID = get_field('header_logo')['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
					echo '<div class="logo-wrap">';
					echo $img;
					echo '</div>';
				}?>
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="top-bar-right show-for-tablet">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<nav>
						<?php trailhead_top_nav();?>
					</nav>
				</div>
			</div>
		</div>
		<div class="menu-toggle-wrap top-bar-right float-right hide-for-tablet">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a id="menu-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
			</ul>
		</div>
	</div>
	
</div>
<?php if( !empty( get_field('street_address', 'option') ) || !empty( get_field('directions_url', 'option') ) || !empty( get_field('phone_number', 'option') ) || !empty( get_field('sticky_get_started_cta', 'option') ) ):?>
	<nav class="utility-nav bg">
		<ul class="grid-x">
			<?php if( !empty( get_field('street_address', 'option') ) ):?>
				<li class="grid-x align-middle">
					<?php if( !empty( get_field('directions_url', 'option') ) ):?>
						<a class="grid-x align-middle bg-gold font-header weight-semibold height-100" href="<?=esc_url(get_field('directions_url', 'option'));?>" target="_blank" aria-label="opens direction in new tab">	
					<?php endif;?>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20"> <path id="ic_place_24px" d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2Zm0,9.5A2.5,2.5,0,1,1,14.5,9,2.5,2.5,0,0,1,12,11.5Z" transform="translate(-5 -2)" fill="#210202"/></svg>
					<span class="show-for-medium"><?=get_field('street_address', 'option');?></span>
					<?php if( !empty( get_field('directions_url', 'option') ) ):?>
						</a>	
					<?php endif;?>
				</li>
			<?php endif;?>
			<?php if( !empty( get_field('phone_number', 'option') ) ):?>
				<li class="grid-x align-middle">
					<a class="grid-x align-middle bg-gold font-header weight-semibold height-100" href="tel:<?=esc_html(get_field('phone_number', 'option'));?>" target="_blank">	
						<svg xmlns="http://www.w3.org/2000/svg" width="13.132" height="22.223" viewBox="0 0 13.132 22.223"><path id="ic_phone_iphone_24px" d="M15.606,1H7.525A2.526,2.526,0,0,0,5,3.525V20.7a2.526,2.526,0,0,0,2.525,2.525h8.081A2.526,2.526,0,0,0,18.132,20.7V3.525A2.526,2.526,0,0,0,15.606,1ZM11.566,22.213A1.515,1.515,0,1,1,13.081,20.7,1.513,1.513,0,0,1,11.566,22.213Zm4.546-4.041H7.02V4.03h9.091Z" transform="translate(-5 -1)" fill="#210202"/></svg>
						<span class="show-for-medium"><?=esc_html(get_field('phone_number', 'option'));?></span>
					</a>	
				</li>
			<?php endif;?>
			<?php 
			$link = get_field('sticky_get_started_cta', 'option');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<li class="grid-x align-middle get-started">
					<a class="grid-x align-middle bg-white font-header weight-semibold height-100 color-alt-black uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<span><b><?php echo esc_html( $link_title ); ?></b></span>
						<svg xmlns="http://www.w3.org/2000/svg" width="10.498" height="17" viewBox="0 0 10.498 17"><path id="ic_chevron_right_24px" d="M10.588,6l-2,2,6.488,6.5L8.59,21l2,2,8.5-8.5Z" transform="translate(-8.59 -6)"/></svg>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</nav>
<?php endif;?>