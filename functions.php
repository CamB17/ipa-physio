<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function tailpress_register_acf_blocks(): void {
	/**
	 * We register our block's with WordPress's handy register_block_type();
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	register_block_type( __DIR__ . '/blocks/button' );
	register_block_type( __DIR__ . '/blocks/hero' );
	register_block_type( __DIR__ . '/blocks/split-content' );
    register_block_type(__DIR__ . '/blocks/services-slider');
    register_block_type(__DIR__ . '/blocks/stories-slider');
    register_block_type(__DIR__ . '/blocks/services-grid');
    register_block_type(__DIR__ . '/blocks/services-cta');
    register_block_type(__DIR__ . '/blocks/accordion');
    register_block_type(__DIR__ . '/blocks/cta-banner');
}

add_action( 'init', 'tailpress_register_acf_blocks' );

/**
 * Theme setup.
 */
function tailpress_setup(): void {
    add_theme_support( 'title-tag' );

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'tailpress' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );

    add_theme_support( 'editor-styles' );
    add_editor_style( 'css/editor-style.css' );

    add_image_size( 'services-grid-thumb', 300, 200, true );
    add_image_size( 'stories-slider', 711, 400, true );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts(): void {
    $theme = wp_get_theme();
    wp_enqueue_style( "slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" );
    wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css' );
    wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css', [], null );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( "slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array( "jquery" ), "", true );
    wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js', [ 'jquery' ], null, true );
    wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( string $path ): string {
    if ( wp_get_environment_type() === 'production' ) {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg( 'time', time(), get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ): array|string {
    if ( isset( $args->li_class ) ) {
        $classes[] = $args->li_class;
    }

    if ( isset( $args->{"li_class_$depth"} ) ) {
        $classes[] = $args->{"li_class_$depth"};
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param WP_Term $args Holds the nav menu arguments.
 * @param $depth
 *
 * @return array|string
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ): array|string {
    if ( isset( $args->submenu_class ) ) {
        $classes[] = $args->submenu_class;
    }

    if ( isset( $args->{"submenu_class_$depth"} ) ) {
        $classes[] = $args->{"submenu_class_$depth"};
    }

    return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

/**
 * Register our sidebars and widgetized areas.
 *
 * @return void
 */
function tailpress_widgets_init(): void {

    register_sidebar( array(
        'name'          => 'Footer navigation sidebar',
        'id'            => 'footer_navigation',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="text-xl uppercase font-semibold mb-4">',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer locations sidebar',
        'id'            => 'footer_locations',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="text-xl uppercase font-semibold mb-4">',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer contact sidebar',
        'id'            => 'footer_contact',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="text-xl uppercase font-semibold mb-4">',
        'after_title'   => '</p>',
    ) );
}

add_action( 'widgets_init', 'tailpress_widgets_init' );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function ( $data, $file, $filename, $mimes ) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

/**
 * Allow SVG uploads.
 *
 * @param $mimes
 *
 * @return mixed
 */
function cc_mime_types( $mimes ): mixed {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Fix SVG styles.
 *
 * @return void
 */
function fix_svg(): void {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action( 'admin_head', 'fix_svg' );