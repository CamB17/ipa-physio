<?php
/**
 * IPA Services CTA Block Template.
 *
 * @param array $block The block settings and attributes.
 */

//$anchor = "";
//if ( ! empty( $block["anchor"] ) ) :
//    $anchor = 'id="' . esc_attr($block['anchor']) . '"';
//endif;
//
//$title       = get_field( "title" );
//$description = get_field( "description" );
//$image       = get_field( "image" );
//$link        = get_field( "link" );
//$variation   = get_field( "variation" );
//?>
<!---->
<!--$loop = new WP_Query( $args );-->
<!--?>-->
<!--<div class="services-grid-block py-10" --><?php //echo $anchor; ?><!-->-->
<!--    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">-->
<!--        --><?php //if ( $loop->have_posts() ) : ?>
<!--            --><?php //while ( $loop->have_posts() ) : $loop->the_post(); ?>
<!--        <a href="--><?php //the_permalink(); ?><!--" class="">-->
<!--                <div class="service-item bg-white rounded-lg text-center">-->
<!--                    --><?php //if ( has_post_thumbnail() ) : ?>
<!--                        <div class="service-thumbnail mb-4">-->
<!--                            --><?php //the_post_thumbnail('services-grid-thumb', ['class' => 'w-full h-auto rounded']); ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>
<!--                    <h3 class="service-title text-xl font-semibold mb-2">--><?php //the_title(); ?><!--</h3>-->
<!--                    <div class="service-excerpt text-gray-700">-->
<!--                        --><?php //the_excerpt(); ?>
<!--                    </div>-->
<!--                </div>-->
<!--        </a>-->
<!--            --><?php //endwhile; ?>
<!--            --><?php //wp_reset_postdata(); ?>
<!--        --><?php //else : ?>
<!--            <p>--><?php //esc_html_e( 'No services found.', 'text-domain' ); ?><!--</p>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!--</div>-->
