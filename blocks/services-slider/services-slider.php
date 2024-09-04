<?php
/**
 * Services slider block template
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
    "posts_per_page" => -1,
];

$loop = new WP_Query($args);

if ($loop->have_posts()) :
    ?>
    <div class="ipa-services-slider-widget" <?php echo $anchor; ?>>
        <div class="ipa-services-slider-widget-inner relative overflow-hidden">

            <div class="swiper-container services-swiper pb-8">
                <div class="swiper-wrapper">
                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="swiper-slide flex-shrink-0">
                            <div class="overflow-hidden h-full text-center flex items-center justify-center">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="story-link overflow-hidden rounded-md">
                                        <?php the_post_thumbnail('services-grid-thumb', ['class' => 'transition duration-300 ease-in-out hover:scale-110 w-full h-full object-cover rounded-md']); ?>
                                        <h5>Title Here</h5>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="story-link">
                                        <div class="block bg-primary w-full h-full mb-4 rounded-md"></div>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="swiper-button-next services-next"></div>
                <div class="swiper-button-prev services-prev"></div>
            </div>

            <div class="swiper-pagination services-pagination"></div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the services swiper
            var servicesSwiper = new Swiper('.services-swiper', {
                slidesPerView: 4,
                spaceBetween: 32,
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: '.services-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '"></span>';
                    },
                    dynamicBullets: true,
                    dynamicMainBullets: 1,
                },
                navigation: {
                    nextEl: '.services-next',
                    prevEl: '.services-prev',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3.5,
                        spaceBetween: 30,
                    },
                },
            });
        });
    </script>
<?php
endif;

wp_reset_postdata();
?>
