<?php
$sticky_parallax_rows = $args['sticky_parallax_rows'] ?? null;
$rows = $sticky_parallax_rows['rows'] ?? null;
?>
<section class="sticky-parallax-rows">
	<?php foreach($rows as $row):
		$background_type = $row['background_type'] ?? null;
		$headline = $row['headline'] ?? null;
		$background_image = $row['background_image'] ?? null;
		$background_video_file = $row['background_video_file'] ?? null;
		$cta_card = $row['cta_card'] ?? null;
	?>
	
	<?php endforeach;?>
</section>