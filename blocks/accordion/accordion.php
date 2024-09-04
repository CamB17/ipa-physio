<?php
/**
 * Accordion Block Template.
 *
 * @param array $block The block settings and attributes.
 */

// Create an anchor attribute if it is set
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '"';
}

if( have_rows('accordion_items') ): ?>
    <div class="accordion" <?php echo $anchor; ?>>
        <?php while( have_rows('accordion_items') ): the_row(); ?>
            <div class="accordion-item">
                <div class="accordion-title items-center cursor-pointer">
                    <h3 class="purple"><?php the_sub_field('title'); ?></h3>
                </div>
                <div class="accordion-content purple hidden">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
