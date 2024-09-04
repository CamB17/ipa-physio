
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer slide-in-bottom bg-dark py-12" role="contentinfo">
    <?php do_action( 'tailpress_footer' ); ?>

    <div class="container md:flex px-4 mx-auto text-white">
        <!-- Logo Column -->
        <div class="w-full mb-6 md:mb-0 md:w-1/2 logo-column">
            <img src="<?= get_template_directory_uri(); ?>/img/ipa-physio-logo-white.svg" alt="IPA Physio logo" class="mb-4">

            <p>
                Made with
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                </svg>
                by <a href='https://areli.com' class='underline' target="_blank">Areli</a> -
                &copy; <?php echo date_i18n( 'Y' ); ?> - <?php echo get_bloginfo( 'name' ); ?>
            </p>
        </div>

        <!-- Content Columns -->
        <div class="w-full md:flex md:flex-row md:space-x-6">
            <div class="flex md:contents">
            <div class="w-1/2 md:w-1/3 mb-6 md:mb-0">
                <?php if ( is_active_sidebar( 'footer_navigation' ) ) : ?>
                    <div id="footer-navigation-sidebar" class="footer-navigation-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_navigation' ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="w-1/2 md:w-1/3 mb-6 md:mb-0">
                <?php if ( is_active_sidebar( 'footer_locations' ) ) : ?>
                    <div id="footer-locations-sidebar" class="footer-locations-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_locations' ); ?>
                    </div>
                <?php endif; ?>
            </div>
</div>
            <div class="w-full md:w-1/3">
                <?php if ( is_active_sidebar( 'footer_contact' ) ) : ?>
                    <div id="footer-contact-sidebar" class="footer-contact-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_contact' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
