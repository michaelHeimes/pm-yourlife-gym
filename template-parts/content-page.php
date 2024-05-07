<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$page_banner = get_field('page_banner') ?? null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( !empty( $page_banner  ) ) {
                get_template_part('template-parts/section', 'page-banner');
        }?>
	<div class="entry-content has-brick-repeating-bg position-relative">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="inner cell small-12 tablet-10 position-relative">
		            <?php the_content();?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
