<?php
/**
 * Template part for displaying posts in an archive grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card cell'); ?>>
	<a class="color-black" href="<?=esc_url( get_permalink() );?>" rel="bookmark">
		<div class="thumb-wrap">
			<?php the_post_thumbnail('post-card'); ?>
		</div>
		
		<div>
			<header class="entry-header">
				<?php
					the_title( '<h2 class="entry-title color-black">', '</h2>' );
				?>
			</header><!-- .entry-header -->
		</div>
	
		<footer class="entry-footer">
			<div class="button chev-link grid-x align-center">
				<span>Read More</span>
				<svg xmlns="http://www.w3.org/2000/svg" width="10.239" height="16.582" viewBox="0 0 10.239 16.582"><path id="ic_chevron_right_24px" d="M10.538,6,8.59,7.948l6.329,6.343L8.59,20.634l1.948,1.948,8.291-8.291Z" transform="translate(-8.59 -6)"/></svg>
			</div>
		</footer><!-- .entry-footer -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
