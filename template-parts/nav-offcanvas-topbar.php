<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar-wrap grid-container fluid">

	<div class="top-bar position-relative grid-x grid-padding-x align-middle" id="top-bar-menu">
	
		<div class="cell shrink">
			
			<div class="site-branding show-for-sr">
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
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="293" height="84.624" viewBox="0 0 293 84.624">
					  <defs>
						<filter id="Logo_Union" x="0" y="0" width="293" height="84.624" filterUnits="userSpaceOnUse">
						  <feOffset dx="3" dy="3" input="SourceAlpha"/>
						  <feGaussianBlur result="blur"/>
						  <feFlood/>
						  <feComposite operator="in" in2="blur"/>
						  <feComposite in="SourceGraphic"/>
						</filter>
					  </defs>
					  <g id="logo" transform="translate(-2 -2)">
						<g transform="matrix(1, 0, 0, 1, 2, 2)" filter="url(#Logo_Union)">
						  <path id="Logo_Union-2" data-name="Logo Union" d="M36.9,81.624V37.734l3.451,2.242L0,0H20.146L43.539,23.213,66.933,0H87.078L46.722,39.976l3.451-2.242v43.89ZM178.16,70.46V56.034l-7.65,9.894h-3.153L159.6,56.034V70.46h-5.637V46.783h5.8l8.671,11.086L166.809,61.3l11.25-14.519h5.7V70.46Zm-43.044,0v-8l-11-15.67h7.28l6.542,9.515,6.542-9.515h7.146L138.1,66.329l2.682-2.449v6.579Zm-30.133,0c-3.892,0-6.308-2.378-6.308-6.344V53.24c0-4.078,2.349-6.457,6.241-6.457H122.1V52.6H106.56c-1.51,0-2.181.642-2.181,2.152v7.742a2.536,2.536,0,0,0,.289,1.267L101,64.606h15.924v-7.4h5.838l-.033,13.254ZM54.808,52.379,74.838,32.4l-8.291,5.41V27.308l11.01-10.9.026,29.844L54.809,68.913ZM9.5,46.252l.026-29.844,11.009,10.9V37.813l-8.29-5.41,20.03,19.975V68.912ZM267.187,34.839V11.165H290V16.98H272.958v2.132l-3.526.812h18.59v5.852H272.958v2.4l-3.526.812H290v5.852Zm-25.73,0V11.165H264.17V16.98H247.227v2.171l-3.526.812h18.724v5.89h-15.2v8.986Zm-9.593,0V11.165H237.6V34.839Zm-25.932,0V11.165H211.7V28.173l-3.526.812h20.5v5.852Zm-9.894,0-4.729-8.194h-7.617v8.194h-5.769V11.164h18.316a5.585,5.585,0,0,1,5.939,5.967v3.208c0,3.248-1.542,5.55-4.228,6.155l4.564,8.345ZM183.692,19.976l-3.535.814,14.941,0h0a1.31,1.31,0,0,0,1.108-.454c.021-.029.043-.059.062-.089a1.608,1.608,0,0,0,.206-.854V18.375a1.5,1.5,0,0,0-.215-.806,1.246,1.246,0,0,0-.159-.2,1.352,1.352,0,0,0-1-.387H183.692ZM156.419,34.839c-3.892,0-6.374-2.378-6.374-6.419V11.165h5.7V26.721a2.775,2.775,0,0,0,.315,1.4l-3.775.869h14.3c1.476,0,2.047-.679,2.047-2.266L168.6,11.165h5.636V28.382c0,4.116-2.382,6.456-6.341,6.456Zm-27.641,0c-3.892,0-6.274-2.417-6.274-6.343V17.622c0-4.077,2.315-6.456,6.274-6.456h11.708c3.892,0,6.206,2.379,6.206,6.456V28.5c0,3.926-2.348,6.343-6.24,6.343Zm-.57-15.782v7.891a2.5,2.5,0,0,0,.254,1.183l-3.719.856h14.435c1.308,0,1.812-.567,1.812-2.039V19.056c0-1.472-.57-2.077-1.98-2.077H130.22C128.844,16.98,128.207,17.622,128.207,19.056ZM105.329,34.839v-8l-11-15.67h7.28l6.541,9.515,6.542-9.515h7.146L108.316,30.708,111,28.26v6.579Z" fill="#fff"/>
						</g>
					  </g>
					</svg>
				</a></li>
			</ul>
						
		</div>
		<div class="show-for-large cell auto">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<nav>
						<?php trailhead_top_nav();?>
					</nav>
				</div>
			</div>
		</div>
		<div class="menu-toggle-wrap top-bar-right float-right hide-for-large cell auto grid-x align-right">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li>
					<button class="menu-toggle no-style" type="button" data-toggle="off-canvas">
						<svg xmlns="http://www.w3.org/2000/svg" width="28.51" height="28.883"><defs><filter id="a" x="0" y="0" width="28.51" height="28.883" filterUnits="userSpaceOnUse"><feOffset dx="1" dy="1"/><feGaussianBlur result="blur"/><feFlood/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g filter="url(#a)"><path data-name="ic_menu_24px" d="M0 27.883h27.51v-4.647H0Zm0-11.618h27.51v-4.647H0ZM0 0v4.647h27.51V0Z" fill="#c4a75f"/></g></svg>
					</button>
					
				</li>
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
				<li class="grid-x align-middle phone">
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