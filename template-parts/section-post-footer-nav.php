<section class="post-footer-nav">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="left cell small-12 medium-8 tablet-7">
				<?php
				$currentpost = "";
				$cat_ID = 0;
				$cat_name = "";
				// if(is_single()) {
				// 	$currentpost = get_the_ID();
				// 	//$terms = get_the_terms( $post->ID, 'category' );
				// 	$categories = get_the_category( );
				// 	//print_r($categories);
				// 	if ( ! empty( $categories ) ) {
				// 		$cat_ID = $categories[0]->cat_ID; 
				// 		$cat_name = $categories[0]->name . " ";
				// 	}
				// }
						
				if(is_category()) {
					$queried_object = get_queried_object();
					//print_r($queried_object);
					$cat_ID = $queried_object->cat_ID ;
					$cat_name = $queried_object->name . " ";
				}
				echo '<h3 class="h4">Recent ' . $cat_name . ' News & Articles</h3>';
				?>
				<ul class="menu vertical">
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'orderby' => 'date',
						'order'=>'DESC',
						'cat'=> $cat_ID,
					);					
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						if ($post->ID == $currentpost) {
						echo '<li><a class="currentcat" href="' . get_permalink() . '">';
					}
					else {
						echo '<li><a class="color-gold" href="' . get_permalink() . '">';
					}
						the_title();
						echo "</a></li>";
					
					}
					wp_reset_postdata();
					
					?>
			
					<li class="va-wrap"><a href="<?php echo get_post_type_archive_link( 'post' );?>"><span>View All News & Articles</span> <svg xmlns="http://www.w3.org/2000/svg" width="7.41" height="12" viewBox="0 0 7.41 12"><path id="next_hover_color" data-name="next hover color" d="M10,6,8.59,7.41,13.17,12,8.59,16.59,10,18l6-6Z" transform="translate(-8.59 -6)" fill="#c5a75f"/></svg></a></li>
				</ul>
			</div>
			<div class="cell small-12 medium-4 tablet-3">
				<h3 class="h4">News Categories</h3>
				<ul class="menu vertical">
					<?php
					$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
					) );
					//print_r($categories);
					foreach( $categories as $category ) {
						$name = $category->name;
						$catid = $category->term_id;
						$link = get_category_link( $catid );
						if ($catid == $cat_ID) {
							echo '<li><a class="color-gold currentcat" href="' . $link . '">';
						}
						else {
						echo '<li><a class"color-gold" href="' . $link . '">';
						}
						echo $name;
						echo "</a></li>";
					}
					?>	
				</ul>
			</div>
		</div>
	</div>
</section>