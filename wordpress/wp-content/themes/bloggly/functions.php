

<?php
function create_booking_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'booking';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        fullname varchar(255) NOT NULL,
        phone varchar(50) NOT NULL,
        email varchar(100),
        field varchar(50) NOT NULL,
        date date NOT NULL,
        time time NOT NULL,
        duration varchar(10) NOT NULL,
        price varchar(50) NOT NULL,
        payment_method varchar(50) NOT NULL,
        notes text,
        terms tinyint(1) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

add_action('after_setup_theme', 'create_booking_table');
function handle_booking_form_submission() {
    if (isset($_POST['fullname'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'booking';

        $data = array(
            'fullname' => sanitize_text_field($_POST['fullname']),
            'phone' => sanitize_text_field($_POST['phone']),
            'email' => sanitize_email($_POST['email']),
            'field' => sanitize_text_field($_POST['field']),
            'date' => sanitize_text_field($_POST['date']),
            'time' => sanitize_text_field($_POST['time']),
            'duration' => sanitize_text_field($_POST['duration']),
            'price' => sanitize_text_field($_POST['price']),
            'payment_method' => sanitize_text_field($_POST['payment_method']),
            'notes' => sanitize_textarea_field($_POST['notes']),
            'terms' => intval($_POST['terms'])
        );

        $wpdb->insert($table_name, $data);
    }
}
add_action('init', 'handle_booking_form_submission');

/* Enqueue chlid theme scripts */
function bloggly_enqueue_script() {
	$parent_style = 'parent-style';
	wp_dequeue_style('blogone-bloggly-main');
	wp_enqueue_style('bloggly-style',get_stylesheet_directory_uri().'/style.css',$parent_style);
	wp_dequeue_script('blogone-main');  	
	wp_enqueue_script('bloggly-custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), false, true);

	 // Setting in JS
	wp_localize_script('bloggly-custom', 'blogglyOwlParams', array(
		'arrowLeft' => get_stylesheet_directory_uri() . '/img/slider/arrow-left.png',
		'arrowRight' => get_stylesheet_directory_uri() . '/img/slider/arrow-right.png',
	));
}
add_action( 'wp_enqueue_scripts' ,'bloggly_enqueue_script',99);

/* Removing old homepage sections */
function bloggly_remove_homepage_sections(){
	remove_action('blogone_sections','blogone_blog_section',15);
	remove_action('blogone_header_inner_before','blogone_header_section_topbar', 5 );
}
add_action('wp_head','bloggly_remove_homepage_sections');

/* Adding new chlid theme homepage sections */

// Slider Section
if( ! function_exists('bloggly_blog_section') && function_exists('bc_init') ){
	function bloggly_blog_section(){
		get_template_part('template-parts/sections-homepage/section','blog');
	}
	$section_priority = apply_filters( 'blogone_section_priority', 15, 'bloggly_blog_section' );
	if(isset($section_priority) && $section_priority != '' ){
		add_action('blogone_sections','bloggly_blog_section', absint($section_priority));
	}
}
function bloggly_customize_remove() {     
	global $wp_customize;
	$wp_customize->remove_section( 'header_above');
	$wp_customize->remove_section( 'footer_background');
	$wp_customize->remove_control('blogone_blog_column');
	$wp_customize->remove_control('blogone_slider_style');
	$wp_customize->remove_control('blogone_breadcrumb_bg_image');
	$wp_customize->remove_control('blogone_breadcrumb_attachment');
	$wp_customize->remove_control('blogone_breadcrumb_overlay');
	$wp_customize->remove_control('blogone_breadcrumb_bg_color');
} 
add_action( 'customize_register', 'bloggly_customize_remove', 11 );

// Include customizer file
get_template_part('inc/customizer/bloggly-customizer');
?>




<?php
// Kiểm tra nếu 'footer_content' chưa có trong database, thì thêm mới
if (get_option('footer_content') === false) {
    add_option('quick_links', 'Quick Links');
    add_option('home1', 'Home');
    add_option('about', 'About');
    add_option('FAQ', 'FAQ');
    add_option('Get_Started', 'Get Started');
    add_option('Videos', 'Videos');
}
?>