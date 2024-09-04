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

$align = "text-left";
if ( ! empty( $block["align"] ) ) :
	$align = match ( $block["align"] ) {
		"center" => "text-center",
		"right" => "text-right",
		default => "text-left",
	};
endif;

$link = get_field( "link" );
?>
<p class="ipa-button-block <?= $align; ?>">
    <a href="<?= $link["url"]; ?>" target="<?= $link["target"] ?? "_self"; ?>" class="button">
		<?= $link["title"]; ?>
    </a>
</p>
