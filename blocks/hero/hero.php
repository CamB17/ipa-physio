<?php
/**
 * Hero block template
 *
 * @param array $block The block settings and attributes.
 */

$anchor = "";
if ( ! empty( $block["anchor"] ) ) :
    $anchor = 'id="' . $block['anchor'] . '"';
endif;

$title       = get_field( "title" );
$description = get_field( "description" );
$image       = get_field( "image" );
$link        = get_field( "link" );
$variation   = get_field( "variation" );
$layout      = get_field( "layout" );

// Content and image based on layout choice
$image_first = $layout === 'content-right';

// Animation classes based on image and content position
$image_class = $variation === 'half-image' ? ($image_first ? 'slide-in-left' : 'slide-in-right') : '';
$content_class = $variation === 'half-image' ? ($image_first ? 'slide-in-right' : 'slide-in-left') : '';

// Add slide-in-left class to ipa-hero-block-inner if full-image variation is selected
if ( $variation === 'full-image' ) {
    $content_class .= ' slide-in-left';
}

?>
<div <?= $anchor; ?> class="ipa-hero-block relative flex <?= $variation === 'half-image' ? 'md:flex-row' : 'flex-col' ?> justify-center">
    <?php if ( $image && $image_first ) : ?>
        <div class="<?= $variation === 'half-image' ? 'md:w-2/5 h-full' : 'w-full absolute h-full top-0' ?> <?= $image_class ?>">
            <?= wp_get_attachment_image( $image, "full", false, [
                "class" => $variation === 'half-image' ? "object-cover w-full h-full" : "object-cover w-full h-full"
            ] ); ?>
        </div>
    <?php endif; ?>

    <div class="ipa-hero-block-inner relative z-10 <?= $variation === 'half-image' ? 'md:w-3/5 flex' : 'md:w-5/12' ?> <?= $content_class ?>">
        <div class="text-white bg-primary/80 px-20 py-20 <?= $variation === 'half-image' ? 'flex items-center' : 'md:py-56 md:px-24' ?>">
            <div>
                <h1 class="<?= $variation === 'half-image' ? 'md:text-4xl' : 'md:text-[65px] md:leading-tight' ?> mb-8">
                    <?= $title; ?>
                </h1>
                <div class="text-lg <?= $variation === 'half-image' ? 'md:text-2xl' : 'md:text-3xl max-w-sm' ?>">
                    <?= wpautop( $description ); ?>
                </div>

                <?php if ( $link ) : ?>
                    <a href="<?= $link["url"]; ?>" target="<?= $link["target"] ?? "_self"; ?>" class="button button-white">
                        <?= $link["title"]; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( $image && !$image_first ) : ?>
        <div class="<?= $variation === 'half-image' ? 'md:w-2/5 h-full' : 'w-full absolute h-full top-0' ?> <?= $image_class ?>">
            <?= wp_get_attachment_image( $image, "full", false, [
                "class" => $variation === 'half-image' ? "object-cover w-full h-full" : "object-cover w-full h-full"
            ] ); ?>
        </div>
    <?php endif; ?>
</div>
