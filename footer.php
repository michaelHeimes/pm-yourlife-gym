<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
$footer_logo = get_field('footer_logo', 'option') ?? null;
$social_menu_items = wp_get_nav_menu_items('social-links');
$phone_number = get_field('phone_number', 'option') ?? null;
$street_address = get_field('street_address', 'option') ?? null;
$city_state_zip_code = get_field('city_state_zip_code', 'option') ?? null;
$directions_url = get_field('directions_url', 'option') ?? null;
$hours = get_field('hours', 'option') ?? null;
$subfooter_links = get_field('subfooter_links', 'option') ?? null;
?>
				<footer id="colophon" class="site-footer position-relative">
					<div class="accent-wrap"></div>
					<div class="grid-container position-relative">
						<div class="top grid-x grid-padding-x">
							<div class="logo-wrap cell small-12 medium-6">
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
							</div>
							<?php 
								if( $social_menu_items) {
									echo '<div class="social-wrap cell small-12 medium-6">';
										trailhead_social_links();
									echo '</div>';
								}
							?>
						</div>
						<div class="contact-menu-wrap grid-x grid-padding-x">
							<?php if( !empty($phone_number) || !empty($street_address) || !empty($city_state_zip_code) || !empty($directions_url) || !empty($hours) ):?>
								<div class="footer-col contact-info cell small-12 tablet-shrink">
									<?php if( !empty($phone_number) ):?>
										<div>
											<h3>Contact Us</h3>
											Call/Text: <a href="tel:<?=esc_html( $phone_number );?>"><?=esc_html( $phone_number );?></a>
										</div>
									<?php endif;?>
									<?php if( !empty($street_address) || !empty($city_state_zip_code) || !empty($directions_url) ):?>
										<div>
											<h3>Visit Us</h3>
											<?php if( !empty($street_address) ):?>
												<div><?=esc_html( $street_address );?></div>
											<?php endif;?>
											<?php if( !empty($city_state_zip_code) || !empty($directions_url) ):?>
												<div><?=esc_html( $city_state_zip_code );?> - 
													<?php if( !empty($directions_url) ):?>
														<a href="<?=$directions_url;?>" target="_blank" aria-label="Opens directions in a new tab">directions</a>	
													<?php endif;?>
												</div>
											<?php endif;?>
										</div>
									<?php endif;?>
									<?php if( !empty($hours) ):?>
										<div>
											<h3>Hours</h3>
											<div>
												<?=wp_kses_post( $hours );?>
											</div>
										</div>
									<?php endif;?>
								</div>
							<?php endif;?>
							<div class="footer-col nav-menu cell small-12 tablet-auto">
								<?php trailhead_footer_menu();?>
							</div>
						</div>
					</div>
					<div class="site-info">
						<div class="grid-container fluid">
							<div class="grid-x grid-padding-x">
								<div class="cell small-12 tablet-auto">
									<p>
										&copy;<?= date("Y");?>
										<?php if( !empty(get_field('copyright_text', 'option') ) ){
											echo get_field('copyright_text', 'option');	
										};?>
										<?php if( !empty($subfooter_links) ):
											foreach($subfooter_links as $subfooter_link):	
											$link = $subfooter_link['link'] ?? null;
												if( $link ): 
										?>
											<span>
												<span>|</span>
												<?php 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											</span>
										<?php endif; endforeach; endif;?>
									</p>
								</div>
								<div class="cell small-12 tablet-shrink">
									<p>
										Website by:
										<a class="uppercase" href="https://gopipedream.com/" target="_blank">
											Pipedream
										</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

<?php if( !empty( get_field('before_closing_body_tag', 'option') ) ) {
	echo get_field('before_closing_body_tag', 'option');
}?>
<!-- chat feature -->

<script type="text/javascript">
  (function(d, t) {
      var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
      v.onload = function() {
        window.voiceflow.chat.load({
          verify: { projectID: '66e7798d53d61279f3ce5dac' },
          url: 'https://general-runtime.voiceflow.com',
          versionID: 'production'
        });
      }
      v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
  })(document, 'script');
</script>
</body>
</html>
