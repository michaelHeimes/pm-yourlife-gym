<?php

/**
 * Button Group Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'button-group ' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'button-group';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$remove_top_spacing = get_field('remove_top_spacing') ?? null;
$remove_bottom_spacing = get_field('remove_bottom_spacing') ?? null;
$alignment = get_field('alignment') ?? null;
$button_links = get_field('button_links') ?? null;

?>
<section id="<?php echo esc_attr($id); ?>" class="module block 
    <?= esc_attr($className); 
        if($remove_top_spacing) { echo esc_attr( ' ntm' ); }
        if($remove_bottom_spacing) { echo esc_attr( ' nbm' ); }
    ?>
        
">
    <div class="grid-x grid-padding-x <?= esc_attr( $alignment );?>">
        <?php foreach($button_links as $button_link):
            $style = $button_link['style'] ?? null;
            $link = $button_link['link'] ?? null;
        ?>
            <?php 
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <div class="cell shrink">
                <a class="button chev-link grid-x align-center<?php if ($style == 'transparent') { echo ' no-bg'; };?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <span><?php echo esc_html( $link_title ); ?></span>
                    <?php if ($style == 'transparent'):?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12.746" height="20.641" viewBox="0 0 12.746 20.641"> <path id="ic_chevron_right_24px" d="M11.015,6,8.59,8.425l7.878,7.9-7.878,7.9,2.425,2.425L21.336,16.321Z" transform="translate(-8.59 -6)"/></svg>
                    <?php else:?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.583" height="18.758" viewBox="0 0 11.583 18.758"><path id="ic_chevron_right_24px" d="M10.794,6,8.59,8.2l7.159,7.175L8.59,22.554l2.2,2.2,9.379-9.379Z" transform="translate(-8.59 -6)"/></svg>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif; ?>
        <?php endforeach;?>
    </div>
    
</section>