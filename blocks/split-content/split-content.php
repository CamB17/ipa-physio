<?php
/**
 * Split content block template
 *
 * @param array $block The block settings and attributes.
 */

$anchor = "";
if ( ! empty( $block["anchor"] ) ) :
	$anchor = 'id="' . $block['anchor'] . '"';
endif;

$title   = get_field( "title" );
$content = get_field( "content" );
$image   = get_field( "image" );
$link    = get_field( "link" );
?>
<div class="ipa-split-content-block" <?php echo $anchor; ?>>
    <div class="ipa-split-content-block-inner md:flex">
        <div class="md:w-1/2 relative overflow-hidden">
            <?= wp_get_attachment_image( $image, "full", false, [ "class" => "object-cover h-60 md:h-full w-full md:absolute slide-in-left opacity-0" ] ); ?>
        </div>
        <div class="md:w-1/2 text-white bg-primary py-20 px-10 md:py-44 md:px-24 flex flex-col items-center">
            <div class="max-w-md slide-in-right opacity-0">
                <h3 class="text-4xl mb-8">
                    <?= $title; ?>
                </h3>
                <div class="mb-8 block">
                    <?= wpautop( $content ); ?>
                </div>

                <?php if ( $link ) : ?>
                    <a href="<?= $link["url"]; ?>" target="<?= $link["target"] ?? "_self"; ?>"
                       class="button button-white">
                        <?= $link["title"]; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

