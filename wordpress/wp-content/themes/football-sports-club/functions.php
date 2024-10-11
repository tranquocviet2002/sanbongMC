<?php
/**
 * Football Sports Club functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Football Sports Club
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Football_Sports_Club_Loader.php' );

$Football_Sports_Club_Loader = new \WPTRT\Autoload\Football_Sports_Club_Loader();

$Football_Sports_Club_Loader->football_sports_club_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Football_Sports_Club_Loader->football_sports_club_register();

if ( ! function_exists( 'football_sports_club_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function football_sports_club_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

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

        add_image_size('football-sports-club-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','football-sports-club' ),
	        'footer'=> esc_html__( 'Footer Menu','football-sports-club' ),
        ) );

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
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
		add_action('wp_ajax_football_sports_club_dismissable_notice', 'football_sports_club_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'football_sports_club_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function football_sports_club_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'football_sports_club_content_width', 1170 );
}
add_action( 'after_setup_theme', 'football_sports_club_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function football_sports_club_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'football-sports-club' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'football-sports-club' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'football-sports-club' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'football-sports-club' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'football-sports-club' ),
		'id'            => 'football-sports-club-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'football-sports-club' ),
		'id'            => 'football-sports-club-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'football-sports-club' ),
		'id'            => 'football-sports-club-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'football_sports_club_widgets_init' );

/**
 * Enqueue S Header.
 */
function football_sports_club_sticky_header() {

	$football_sports_club_sticky_header = get_theme_mod('football_sports_club_sticky_header');

	$football_sports_club_custom_style= "";

	if($football_sports_club_sticky_header != true){

		$football_sports_club_custom_style .='.stick_header{';

			$football_sports_club_custom_style .='position: static;';

		$football_sports_club_custom_style .='}';
	}

	wp_add_inline_style( 'football-sports-club-style',$football_sports_club_custom_style );

}
add_action( 'wp_enqueue_scripts', 'football_sports_club_sticky_header' );

/**
 * Enqueue scripts and styles.
 */
function football_sports_club_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'football-sports-club-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css',get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'football-sports-club-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'football-sports-club-style',$football_sports_club_theme_css );

	wp_style_add_data('football-sports-club-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('football-sports-club-theme-js',get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'football_sports_club_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*dropdown page sanitization*/
function football_sports_club_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function football_sports_club_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function football_sports_club_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function football_sports_club_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*radio button sanitization*/
function football_sports_club_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//Float
function football_sports_club_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function football_sports_club_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function football_sports_club_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Get CSS
 */

function football_sports_club_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','football_sports_club',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('football_sports_club_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'football_sports_club_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_football-sports-club-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'football-sports-club-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'football_sports_club_getpage_css' );

if ( ! defined( 'FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT' ) ) {
define('FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/football-sports-club/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_REVIEW' ) ) {
define('FOOTBALL_SPORTS_CLUB_REVIEW',__('https://wordpress.org/support/theme/football-sports-club/reviews/#new-post','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_LIVE_DEMO' ) ) {
define('FOOTBALL_SPORTS_CLUB_LIVE_DEMO',__('https://demo.themagnifico.net/football-sports-club/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO' ) ) {
define('FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/wordpress-sports-club-theme','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_PRO_DOC' ) ) {
define('FOOTBALL_SPORTS_CLUB_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/football-sports-club-pro-doc/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_FREE_DOC' ) ) {
define('FOOTBALL_SPORTS_CLUB_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/football-sports-club-free-doc/','football-sports-club'));
}

add_action('admin_menu', 'football_sports_club_themepage');
function football_sports_club_themepage(){

	$football_sports_club_theme_test = wp_get_theme();
	
	$theme_info = add_theme_page( __('Theme Options','football-sports-club'), __('Theme Options','football-sports-club'), 'manage_options', 'football-sports-club-info.php', 'football_sports_club_info_page' );
}

function football_sports_club_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap football-sports-club-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','football-sports-club'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Football Sports Club , feel free to contact us for any support regarding our theme.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("If You love Football Sports Club theme then we would appreciate your review about our theme.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","football-sports-club"); ?></h2>
		<div class="football-sports-club-button-container">
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "football-sports-club"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "football-sports-club"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "football-sports-club"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "football-sports-club"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "football-sports-club"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="football-sports-club-button-container">
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "football-sports-club"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function football_sports_club_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function football_sports_club_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'football_sports_club_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'football-sports-club'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'football-sports-club'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=football-sports-club-info.php' )); ?>"><?php esc_html_e( 'Get started', 'football-sports-club' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'football-sports-club' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'football-sports-club' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'football_sports_club_deprecated_hook_admin_notice' );

function football_sports_club_switch_theme() {
    delete_user_meta(get_current_user_id(), 'football_sports_club_dismissable_notice');
}
add_action('after_switch_theme', 'football_sports_club_switch_theme');
function football_sports_club_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'football_sports_club_dismissable_notice', true);
    die();
}

/**
 * Enqueue theme color style.
 */
function football_sports_club_theme_color() {

    $theme_color_css = '';
    $football_sports_club_preloader_bg_color = get_theme_mod('football_sports_club_preloader_bg_color');
    $football_sports_club_preloader_dot_1_color = get_theme_mod('football_sports_club_preloader_dot_1_color');
    $football_sports_club_preloader_dot_2_color = get_theme_mod('football_sports_club_preloader_dot_2_color');
    $football_sports_club_logo_max_height = get_theme_mod('football_sports_club_logo_max_height');

	if(get_theme_mod('football_sports_club_logo_max_height') == '') {
		$football_sports_club_logo_max_height = '24';
	}

    if(get_theme_mod('football_sports_club_preloader_bg_color') == '') {
			$football_sports_club_preloader_bg_color = '#000';
		}
		if(get_theme_mod('football_sports_club_preloader_dot_1_color') == '') {
			$football_sports_club_preloader_dot_1_color = '#fff';
		}
		if(get_theme_mod('football_sports_club_preloader_dot_2_color') == '') {
			$football_sports_club_preloader_dot_2_color = '#d50029';
		}

	$theme_color_css = '
	.custom-logo-link img{
			max-height: '.esc_attr($football_sports_club_logo_max_height).'px;
		 }
		.loading{
			background-color: '.esc_attr($football_sports_club_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($football_sports_club_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($football_sports_club_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'football-sports-club-style',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'football_sports_club_theme_color' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'football_sports_club_loop_columns');
if (!function_exists('football_sports_club_loop_columns')) {
	function football_sports_club_loop_columns() {
		$columns = get_theme_mod( 'football_sports_club_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'football_sports_club_shop_per_page', 9 );
function football_sports_club_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'football_sports_club_product_per_page', 9 );
	return $cols;
}

