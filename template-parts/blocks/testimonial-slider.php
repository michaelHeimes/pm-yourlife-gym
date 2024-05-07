<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-slider' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$background_image = get_field('background_image') ?? null;
$slider_transition_delay = get_field('slider_transition_delay') ?? null;
$testimonials = get_field('testimonials') ?? null;
?>
<section id="<?php echo esc_attr($id); ?>" class="module block bg-black has-bg has-object-fit <?= esc_attr($className); ?>" data-delay="<?= esc_attr( $slider_transition_delay );?>">
    <?php if( !empty( $background_image ) ) {
        $imgID = $background_image['ID'];
        $img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
        $img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit-img", "alt"=>$img_alt] );
        echo $img;
    }?>
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x align-center">
            <div class="cell small-12 medium-10 large-8">
            <?php if($testimonials):?>
                <div class="t-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
                    <div class="swiper-wrapper">
                        <?php foreach($testimonials as $testimonial):
                            $heading = $testimonial['heading'] ?? null;    
                            $quote_text = $testimonial['quote_text'] ?? null;    
                            $citation = $testimonial['citation'] ?? null;
                        ?>
                            <div class="swiper-slide color-white">
                                <?php if( !empty($heading) ):?>
                                    <h2><?=$heading;?></h2>
                                <?php endif;?>
                                <?php if( !empty($quote_text) ):?>
                                    <div class="text-wrap">
                                        <?=$quote_text;?>
                                    </div>
                                <?php endif;?>
                                <?php if( !empty($citation) ):?>
                                    <p class="color-white cite">
                                        - <?=$citation;?>
                                    </p>
                                <?php endif;?>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="grid-container position-relative">
                        <div class="grid-x grid-padding-x">
                            <div class="cell small-12">
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            </div>
        </div>
    </div>
    
</section>