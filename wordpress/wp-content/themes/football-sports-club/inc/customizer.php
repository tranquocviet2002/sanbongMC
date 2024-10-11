<?php
/**
 * Football Sports Club Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Football Sports Club
 */

if ( ! defined( 'FOOTBALL_SPORTS_CLUB_URL' ) ) {
define('FOOTBALL_SPORTS_CLUB_URL',__('https://www.themagnifico.net/products/wordpress-sports-club-theme','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_TEXT' ) ) {
define('FOOTBALL_SPORTS_CLUB_TEXT',__('Sports Club Pro','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT' ) ) {
    define( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT', __( 'Buy Sports Club Pro','football-sports-club' ));
}

use WPTRT\Customize\Section\Football_Sports_Club_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Football_Sports_Club_Button::class );

    $manager->add_section(
        new Football_Sports_Club_Button( $manager, 'football_sports_club_pro', [
           'title'       => esc_html( FOOTBALL_SPORTS_CLUB_TEXT,'football-sports-club' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'football-sports-club' ),
            'button_url'  => esc_url( FOOTBALL_SPORTS_CLUB_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'football-sports-club-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'football-sports-club-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function football_sports_club_customize_register($wp_customize){

    // Pro Version
    class Football_Sports_Club_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( FOOTBALL_SPORTS_CLUB_BUY_TEXT,'football-sports-club' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Football_Sports_Club_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('football_sports_club_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'football_sports_club_sanitize_number_absint'
    ));
    $wp_customize->add_control('football_sports_club_logo_max_height',array(
        'label' => esc_html__('Logo Width','football-sports-club'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('football_sports_club_logo_title_text', array(
      'default' => true,
      'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_logo_title_text',array(
      'label'          => __( 'Enable Disable Title', 'football-sports-club' ),
      'section'        => 'title_tagline',
      'settings'       => 'football_sports_club_logo_title_text',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_theme_description', array(
      'default' => false,
      'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_theme_description',array(
      'label'          => __( 'Enable Disable Tagline', 'football-sports-club' ),
      'section'        => 'title_tagline',
      'settings'       => 'football_sports_club_theme_description',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'football_sports_club_logo_title_color', array(
        'label'    => __('Site Title Color', 'football-sports-club'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('football_sports_club_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'football_sports_club_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'football-sports-club'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('football_sports_club_general_settings',array(
        'title' => esc_html__('General Settings','football-sports-club'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('football_sports_club_preloader_hide', array(
        'default' => '0',
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'football_sports_club_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'football_sports_club_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','football-sports-club'),
        'section' => 'football_sports_club_general_settings',
        'settings' => 'football_sports_club_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'football_sports_club_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'football_sports_club_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','football-sports-club'),
        'section' => 'football_sports_club_general_settings',
        'settings' => 'football_sports_club_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'football_sports_club_preloader_dot_2_color', array(
        'default' => '#f10026',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'football_sports_club_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','football-sports-club'),
        'section' => 'football_sports_club_general_settings',
        'settings' => 'football_sports_club_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('football_sports_club_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'football_sports_club_general_settings',
        'choices' => array(
            'Right' => __('Right','football-sports-club'),
            'Left' => __('Left','football-sports-club'),
            'Center' => __('Center','football-sports-club')
        ),
    ) );

     // Product Columns
    $wp_customize->add_setting( 'football_sports_club_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'football_sports_club_sanitize_select',
    ) );

    $wp_customize->add_control('football_sports_club_products_per_row', array(
        'label' => __( 'Product per row', 'football-sports-club' ),
        'section'  => 'football_sports_club_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'football_sports_club_sanitize_float'
    ));
    $wp_customize->add_control('football_sports_club_product_per_page',array(
        'label' => __('Product per page','football-sports-club'),
        'section'   => 'football_sports_club_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('football_sports_club_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','football-sports-club'),
        'section' => 'football_sports_club_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','football-sports-club'),
            'Right Sidebar' => __('Right Sidebar','football-sports-club'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('football_sports_club_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','football-sports-club'),
        'section' => 'football_sports_club_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','football-sports-club'),
            'Right Sidebar' => __('Right Sidebar','football-sports-club'),
        ),
    ) );

    $wp_customize->add_setting( 'football_sports_club_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'football_sports_club_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'football_sports_club_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','football-sports-club' ),
        'section'     => 'football_sports_club_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'football_sports_club_general_settings',
        'choices' => array(
            'Right' => __('Right','football-sports-club'),
            'Left' => __('Left','football-sports-club'),
            'Center' => __('Center','football-sports-club')
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'football_sports_club_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'football_sports_club_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'football_sports_club_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','football-sports-club' ),
        'section'     => 'football_sports_club_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 170,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'football_sports_club_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // Top Header
    $wp_customize->add_section('football_sports_club_top_header',array(
        'title' => esc_html__('Top Header','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_upcoming_match',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_upcoming_match',array(
        'label' => esc_html__('Add Upcoming Match','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_upcoming_match',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('football_sports_club_phone',array(
        'default' => '',
        'sanitize_callback' => 'football_sports_club_sanitize_phone_number'
    ));
    $wp_customize->add_control('football_sports_club_phone',array(
        'label' => esc_html__('Add Phone Number','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('football_sports_club_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_address',array(
        'label' => esc_html__('Add Location Address','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_address',
        'type'  => 'text'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'football_sports_club_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));


    // Social Link
    $wp_customize->add_section('football_sports_club_social_link',array(
        'title' => esc_html__('Social Links','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('football_sports_club_facebook_url',array(
        'label' => esc_html__('Facebook Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('football_sports_club_twitter_url',array(
        'label' => esc_html__('Twitter Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('football_sports_club_intagram_url',array(
        'label' => esc_html__('Intagram Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('football_sports_club_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('football_sports_club_youtube_url',array(
        'label' => esc_html__('YouTube Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_pintrest_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'football_sports_club_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('football_sports_club_top_slider',array(
        'title' => esc_html__('Slider Option','football-sports-club')
    ));

    $wp_customize->add_setting('football_sports_club_slider_setting', array(
        'default' => false,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'football-sports-club' ),
        'section'        => 'football_sports_club_top_slider',
        'settings'       => 'football_sports_club_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_slider_loop', array(
      'default' => 1,
      'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_slider_loop',array(
      'label'          => __( 'Enable Disable Slider Loop', 'football-sports-club' ),
      'section'        => 'football_sports_club_top_slider',
      'settings'       => 'football_sports_club_slider_loop',
      'type'           => 'checkbox',
    )));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'football_sports_club_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'football_sports_club_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'football_sports_club_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'football-sports-club' ),
            'description' => __('Slider image size (1400 x 600)','football-sports-club'),
            'section'  => 'football_sports_club_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider Image Opacity
    $wp_customize->add_setting('football_sports_club_slider_opacity_color',array(
      'default' => '0.8',
      'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));

    $wp_customize->add_control( 'football_sports_club_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','football-sports-club' ),
    'section'     => 'football_sports_club_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','football-sports-club'),
      '0.1' =>  esc_attr('0.1','football-sports-club'),
      '0.2' =>  esc_attr('0.2','football-sports-club'),
      '0.3' =>  esc_attr('0.3','football-sports-club'),
      '0.4' =>  esc_attr('0.4','football-sports-club'),
      '0.5' =>  esc_attr('0.5','football-sports-club'),
      '0.6' =>  esc_attr('0.6','football-sports-club'),
      '0.7' =>  esc_attr('0.7','football-sports-club'),
      '0.8' =>  esc_attr('0.8','football-sports-club'),
      '0.9' =>  esc_attr('0.9','football-sports-club')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('football_sports_club_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_slider_img_height',array(
        'label' => __('Slider Height','football-sports-club'),
        'description'   => __('Add the slider height in px(eg. 500px).','football-sports-club'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'football-sports-club' ),
        ),
        'section'=> 'football_sports_club_top_slider',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'football_sports_club_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // Sports Activity
    $wp_customize->add_section('football_sports_club_sports_activities_section',array(
        'title' => esc_html__('Sports Activity','football-sports-club'),
        'description' => esc_html__('Here you have to select category which will display perticular sports activity in the home page.','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_activity_setting', array(
        'default' => false,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_activity_setting',array(
        'label'          => __( 'Enable Disable Activity', 'football-sports-club' ),
        'section'        => 'football_sports_club_sports_activities_section',
        'settings'       => 'football_sports_club_activity_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('football_sports_club_sports_activities_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_sports_activities_title',array(
        'label' => esc_html__('Section Title','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
        'setting' => 'football_sports_club_sports_activities_title',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('football_sports_club_sports_activities_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'football_sports_club_sanitize_select',
    ));
    $wp_customize->add_control('football_sports_club_sports_activities_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select category to display sports activities','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
    ));

    $wp_customize->add_setting('football_sports_club_sports_activities_per_page',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_sports_activities_per_page',array(
        'label' => esc_html__('No Of Icons','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
        'setting' => 'football_sports_club_sports_activities_per_page',
        'type'  => 'text'
    ));

    $icon = get_theme_mod('football_sports_club_sports_activities_per_page','');
    for ($i=1; $i <= $icon; $i++) {
        $wp_customize->add_setting('football_sports_club_sports_activities_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('football_sports_club_sports_activities_icon'.$i,array(
            'label' => esc_html__('Icon ','football-sports-club').$i,
            'section' => 'football_sports_club_sports_activities_section',
            'setting' => 'football_sports_club_sports_activities_icon'.$i,
            'type'  => 'text'
        ));
    }

     // Pro Version
    $wp_customize->add_setting( 'pro_version_sports_activities_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_sports_activities_setting', array(
        'section'     => 'football_sports_club_sports_activities_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('football_sports_club_site_footer_section', array(
        'title' => esc_html__('Footer', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_footer_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'football_sports_club_footer_background_color', array(
        'label'    => __('Footer Background Color', 'football-sports-club'),
        'section'  => 'football_sports_club_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('football_sports_club_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'football_sports_club_footer_bg_image',array(
        'label' => __('Footer Background Image','football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
    )));

     $wp_customize->add_setting('football_sports_club_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','football-sports-club'),
        'choices' => array(
            'fixed' => __('fixed','football-sports-club'),
            'scroll' => __('scroll','football-sports-club'),
        ),
        'section'=> 'football_sports_club_site_footer_section',
    ));

    $wp_customize->add_setting('football_sports_club_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
        'choices' => array(
            'Left' => __('Left','football-sports-club'),
            'Center' => __('Center','football-sports-club'),
            'Right' => __('Right','football-sports-club')
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
        'choices' => array(
            'Left' => __('Left','football-sports-club'),
            'Center' => __('Center','football-sports-club'),
            'Right' => __('Right','football-sports-club')
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control('football_sports_club_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
    ));

    $wp_customize->add_setting('football_sports_club_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('football_sports_club_footer_text_setting', array(
        'label' => __('Replace the footer text', 'football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('football_sports_club_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'football_sports_club_sanitize_choices'
    ));
    $wp_customize->add_control('football_sports_club_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
        'choices' => array(
            'Left' => __('Left','football-sports-club'),
            'Center' => __('Center','football-sports-club'),
            'Right' => __('Right','football-sports-club')
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'football_sports_club_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'football-sports-club'),
        'section'  => 'football_sports_club_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'football_sports_club_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('football_sports_club_post_settings',array(
        'title' => esc_html__('Post Settings','football-sports-club'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('football_sports_club_post_page_title',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_post_page_meta',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_post_page_thumb',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting( 'football_sports_club_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'football_sports_club_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'football_sports_club_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','football-sports-club' ),
        'section'     => 'football_sports_club_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_post_page_content',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_post_page_btn',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_post_thumb',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'football-sports-club'),
    ));

    $wp_customize->add_setting( 'football_sports_club_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'football_sports_club_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'football_sports_club_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','football-sports-club' ),
        'section'     => 'football_sports_club_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'football_sports_club_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'football_sports_club_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'football_sports_club_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','football-sports-club' ),
        'section'     => 'football_sports_club_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('football_sports_club_single_post_meta',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_post_title',array(
            'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_post_page_content',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_post_tags',array(
            'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'football-sports-club'),
        'section'     => 'football_sports_club_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control('football_sports_club_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','football-sports-club'),
        'section' => 'football_sports_club_post_settings',
    ));

    $wp_customize->add_setting('football_sports_club_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('football_sports_club_single_post_comment_title',array(
        'label' => __('Add Comment Title','football-sports-club'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'football-sports-club' ),
        ),
        'section'=> 'football_sports_club_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('football_sports_club_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('football_sports_club_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','football-sports-club'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'football-sports-club' ),
        ),
        'section'=> 'football_sports_club_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'football_sports_club_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('football_sports_club_page_settings',array(
        'title' => esc_html__('Page Settings','football-sports-club'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('football_sports_club_single_page_title',array(
            'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'football-sports-club'),
        'section'     => 'football_sports_club_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_single_page_thumb',array(
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('football_sports_club_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'football-sports-club'),
        'section'     => 'football_sports_club_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'football-sports-club'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Football_Sports_Club_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Football_Sports_Club_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'football_sports_club_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'football-sports-club' ),
        'description' => esc_url( FOOTBALL_SPORTS_CLUB_URL ),
        'priority'    => 100
    )));

}
add_action('customize_register', 'football_sports_club_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function football_sports_club_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function football_sports_club_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function football_sports_club_customize_preview_js(){
    wp_enqueue_script('football-sports-club-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'football_sports_club_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function football_sports_club_panels_js() {
    wp_enqueue_style( 'football-sports-club-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'football-sports-club-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'football_sports_club_panels_js' );

