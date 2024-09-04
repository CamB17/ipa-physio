<?php
/**
 * CTA Banner block template
 *
 * @param array $block The block settings and attributes.
 */

$anchor = "";
if ( ! empty( $block["anchor"] ) ) :
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '"';
endif;

$title   = get_field( "title" );
$content = get_field( "content" );
$link        = get_field( "link" );
$image_url = get_template_directory_uri() . './img/ipa-bg-icon.png'
?>
<div class="cta-banner-block overflow-hidden" <?php echo $anchor; ?>>
    <div class="absolute inset-0 bg-contain bg-no-repeat hidden  md:flex " style="background-image: url('<?php echo esc_url($image_url); ?>'); background-position: 32% center;"></div>
    <div class="cta-banner-block-inner p-8 text-center relative z-10">
        <h3 class="cta-banner-title mb-4">
            <?= esc_html( $title ); ?>
        </h3>
        <div class="cta-banner-content mb-4">
            <?= wpautop( $content ); ?>
        </div>
        <?php if ( $link ) : ?>
            <a href="<?= $link["url"]; ?>" target="<?= $link["target"] ?? "_self"; ?>" class="button button-white">
                <?= $link["title"]; ?>
            </a>
        <?php endif; ?>
    </div>
</div>