<?php
/**
 * IPA Services Grid Block Template.
 *
 * @param array $block The block settings and attributes.
 */

$anchor = "";
if ( ! empty( $block["anchor"] ) ) :
    $anchor = 'id="' . esc_attr($block['anchor']) . '"';
endif;

$args = [
    "post_type"      => "ipa_services",
    "post_status"    => "publish",
    "posts_per_page" => 9,
];

$loop = new WP_Query( $args );
?>
<div class="services-grid-block py-10" <?php echo $anchor; ?>>
    <!-- FancyApps Carousel for smaller screens -->
    <div class="lg:hidden">
        <?php if ( $loop->have_posts() ) : ?>
            <div class="carousel" data-carousel>
                <div class="carousel__track">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="carousel__slide w-2/3 mx-auto">
                            <div class="service-item bg-white rounded-lg text-center">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="service-thumbnail mb-4 rounded">
                                        <?php the_post_thumbnail('services-grid-thumb', ['class' => 'w-full h-auto rounded']); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="service-title text-xl font-semibold mb-2"><?php the_title(); ?></p>
                                <div class="service-excerpt text-gray-700">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Custom Pagination Dots -->
            <div id="ipa-services-slider-dots" class="flex flex-row list-none gap-x-2 justify-center my-6"></div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No services found.', 'text-domain' ); ?></p>
        <?php endif; ?>
    </div>

    <!-- Grid layout for larger screens -->
    <div class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if ( $loop->have_posts() ) : ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="">
                    <div class="service-item bg-white rounded-lg text-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="service-thumbnail mb-4 rounded">
                                <?php the_post_thumbnail('services-grid-thumb', ['class' => 'w-full h-auto rounded']); ?>
                            </div>
                        <?php endif; ?>
                        <p class="service-title text-xl font-semibold mb-2"><?php the_title(); ?></p>
                        <div class="service-excerpt text-gray-700">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No services found.', 'text-domain' ); ?></p>
        <?php endif; ?>
    </div>
</div>

<!-- Initialize FancyApps Carousel with Custom Pagination -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = new Carousel(document.querySelector('[data-carousel]'), {
            center: true,
            slidesPerPage: 1,
            infinite: true, // Optional: Loop through slides
            Dots: "#ipa-services-slider-dots",
        });

        // Apply custom styling to dots after carousel initialization
        const dotsContainer = document.querySelector("#ipa-services-slider-dots");
        dotsContainer.classList.add('flex', 'flex-row', 'list-none', 'gap-x-2', 'justify-center', 'my-6');

        dotsContainer.querySelectorAll('button').forEach((button) => {
            button.classList.add('w-4', 'h-4', 'bg-white', 'rounded-full', 'border', 'border-primary');
            button.style.textIndent = '-9999px';
            button.style.overflow = 'hidden';
        });

        // Update active dot styling on slide change
        carousel.on('change', (carousel) => {
            dotsContainer.querySelectorAll('button').forEach((button) => {
                button.classList.remove('bg-primary');
            });
            const activeButton = dotsContainer.querySelector('.carousel__slide--active button');
            if (activeButton) {
                activeButton.classList.add('bg-primary');
            }
        });
    });
</script>

