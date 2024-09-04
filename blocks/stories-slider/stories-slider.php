<?php
/**
 * Stories slider shortcode widget
 *
 * @return false|string
 */
$anchor = "";
if ( ! empty( $block["anchor"] ) ) :
    $anchor = 'id="' . esc_attr($block['anchor']) . '"';
endif;

$args = [
    "post_type"      => "ipa_stories",
    "post_status"    => "publish",
    "posts_per_page" => -1,
];

$loop = new WP_Query( $args );

if ($loop->have_posts()) :
    ?>
    <div class="ipa-stories-slider-widget" <?php echo $anchor; ?>>
        <div class="ipa-stories-slider-widget-inner relative">
            <!-- Swiper -->
            <div class="swiper-container stories-swiper overflow-hidden">
                <div class="swiper-wrapper">
                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="swiper-slide flex-shrink-0">
                            <div class="overflow-hidden h-full text-center flex items-center justify-center rounded-md">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="story-link">
                                        <?php the_post_thumbnail('stories-slider', ['class' => 'transition duration-300 ease-in-out hover:scale-110 w-full h-full object-cover']); ?>
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

                <div class="swiper-pagination stories-pagination md:hidden"></div>

            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.stories-swiper', {
                slidesPerView: '3',
                spaceBetween: 10,
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: '.stories-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                },
            });
        });
    </script>
<?php
endif;

wp_reset_postdata();
?>
