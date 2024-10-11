<?php
/**
 * Soccer Football functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Soccer Football
 */

if ( ! defined( 'FOOTBALL_SPORTS_CLUB_URL' ) ) {
    define( 'FOOTBALL_SPORTS_CLUB_URL', esc_url( 'https://www.themagnifico.net/products/football-wordpress-theme', 'soccer-football') );
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_TEXT' ) ) {
    define( 'FOOTBALL_SPORTS_CLUB_TEXT', __( 'Soccer Football Pro','soccer-football' ));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT' ) ) {
    define( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT', __( 'Buy Soccer Football Pro','soccer-football' ));
}

function soccer_football_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    $soccer_football_parentcss = 'football-sports-club-style';
    $soccer_football_theme = wp_get_theme(); wp_enqueue_style( $soccer_football_parentcss, get_template_directory_uri() . '/style.css', array(), $soccer_football_theme->parent()->get('Version'));
    wp_enqueue_style( 'soccer-football-style', get_stylesheet_uri(), array( $soccer_football_parentcss ), $soccer_football_theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'soccer_football_enqueue_styles' );

function soccer_football_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'soccer-football-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'soccer_football_admin_scripts' );

if ( ! function_exists( 'soccer_football_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function soccer_football_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('soccer-football-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'football_sports_club_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'soccer_football_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soccer_football_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'soccer-football' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'soccer-football' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'soccer_football_widgets_init' );

if ( ! defined( 'FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT' ) ) {
define('FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/soccer-football','soccer-football'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_REVIEW' ) ) {
define('FOOTBALL_SPORTS_CLUB_REVIEW',__('https://wordpress.org/support/theme/soccer-football/reviews/#new-post','soccer-football'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_LIVE_DEMO' ) ) {
define('FOOTBALL_SPORTS_CLUB_LIVE_DEMO',__('https://demo.themagnifico.net/soccer-football/','soccer-football'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO' ) ) {
define('FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/football-wordpress-theme','soccer-football'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_PRO_DOC' ) ) {
define('FOOTBALL_SPORTS_CLUB_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/soccer-football-pro-doc/','soccer-football'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_FREE_DOC' ) ) {
define('FOOTBALL_SPORTS_CLUB_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/soccer-football-free-doc/','soccer-football'));
}