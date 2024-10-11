<?php

    $football_sports_club_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $football_sports_club_scroll_position = get_theme_mod( 'football_sports_club_scroll_top_position','Right');
    if($football_sports_club_scroll_position == 'Right'){
        $football_sports_club_theme_css .='#button{';
            $football_sports_club_theme_css .='right: 20px;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_scroll_position == 'Left'){
        $football_sports_club_theme_css .='#button{';
            $football_sports_club_theme_css .='left: 20px;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_scroll_position == 'Center'){
        $football_sports_club_theme_css .='#button{';
            $football_sports_club_theme_css .='right: 50%;left: 50%;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $football_sports_club_slider_img_opacity = get_theme_mod( 'football_sports_club_slider_opacity_color','0.8');
    if($football_sports_club_slider_img_opacity == '0'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.1'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.1';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.2'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.2';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.3'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.3';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.4'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.4';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.5'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.5';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.6'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.6';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.7'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.7';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.8'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.8';
        $football_sports_club_theme_css .='}';
        }else if($football_sports_club_slider_img_opacity == '0.9'){
        $football_sports_club_theme_css .='.slider-box img{';
            $football_sports_club_theme_css .='opacity:0.9';
        $football_sports_club_theme_css .='}';
        }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $football_sports_club_single_post_page_image_box_shadow = get_theme_mod('football_sports_club_single_post_page_image_box_shadow',0);
    if($football_sports_club_single_post_page_image_box_shadow != false){
        $football_sports_club_theme_css .='.single-post .entry-header img{';
            $football_sports_club_theme_css .='box-shadow: '.esc_attr($football_sports_club_single_post_page_image_box_shadow).'px '.esc_attr($football_sports_club_single_post_page_image_box_shadow).'px '.esc_attr($football_sports_club_single_post_page_image_box_shadow).'px #cccccc;';
        $football_sports_club_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $football_sports_club_single_post_page_image_border_radius = get_theme_mod('football_sports_club_single_post_page_image_border_radius', 0);
    if($football_sports_club_single_post_page_image_border_radius != false){
        $football_sports_club_theme_css .='.single-post .entry-header img{';
            $football_sports_club_theme_css .='border-radius: '.esc_attr($football_sports_club_single_post_page_image_border_radius).'px;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $football_sports_club_footer_bg_image_position = get_theme_mod( 'football_sports_club_footer_bg_image_position','scroll');
    if($football_sports_club_footer_bg_image_position == 'fixed'){
        $football_sports_club_theme_css .='#colophon, .footer-widgets{';
            $football_sports_club_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $football_sports_club_theme_css .='}';
    }elseif ($football_sports_club_footer_bg_image_position == 'scroll'){
        $football_sports_club_theme_css .='#colophon, .footer-widgets{';
            $football_sports_club_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $football_sports_club_footer_widget_heading_alignment = get_theme_mod( 'football_sports_club_footer_widget_heading_alignment','Left');
    if($football_sports_club_footer_widget_heading_alignment == 'Left'){
        $football_sports_club_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $football_sports_club_theme_css .='text-align: left;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_footer_widget_heading_alignment == 'Center'){
        $football_sports_club_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $football_sports_club_theme_css .='text-align: center;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_footer_widget_heading_alignment == 'Right'){
        $football_sports_club_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $football_sports_club_theme_css .='text-align: right;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer Background Color -------------------*/

    $football_sports_club_footer_background_color = get_theme_mod('football_sports_club_footer_background_color');
    if($football_sports_club_footer_background_color != false){
        $football_sports_club_theme_css .='.footer-widgets{';
            $football_sports_club_theme_css .='background-color: '.esc_attr($football_sports_club_footer_background_color).' !important;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $football_sports_club_footer_bg_image = get_theme_mod('football_sports_club_footer_bg_image');
    if($football_sports_club_footer_bg_image != false){
        $football_sports_club_theme_css .='#colophon, .footer-widgets{';
            $football_sports_club_theme_css .='background: url('.esc_attr($football_sports_club_footer_bg_image).');';
        $football_sports_club_theme_css .='}';
    }

    /*---------------------------Slider Height ------------*/

    $football_sports_club_slider_img_height = get_theme_mod('football_sports_club_slider_img_height');
    if($football_sports_club_slider_img_height != false){
        $football_sports_club_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $football_sports_club_theme_css .='height: '.esc_attr($football_sports_club_slider_img_height).';';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $football_sports_club_post_page_image_box_shadow = get_theme_mod('football_sports_club_post_page_image_box_shadow',0);
    if($football_sports_club_post_page_image_box_shadow != false){
        $football_sports_club_theme_css .='.article-box img{';
            $football_sports_club_theme_css .='box-shadow: '.esc_attr($football_sports_club_post_page_image_box_shadow).'px '.esc_attr($football_sports_club_post_page_image_box_shadow).'px '.esc_attr($football_sports_club_post_page_image_box_shadow).'px #cccccc;';
        $football_sports_club_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $football_sports_club_single_post_navigation_show_hide = get_theme_mod('football_sports_club_single_post_navigation_show_hide',true);
    if($football_sports_club_single_post_navigation_show_hide != true){
        $football_sports_club_theme_css .='.nav-links{';
            $football_sports_club_theme_css .='display: none;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $football_sports_club_product_sale = get_theme_mod( 'football_sports_club_woocommerce_product_sale','Right');
    if($football_sports_club_product_sale == 'Right'){
        $football_sports_club_theme_css .='.woocommerce ul.products li.product .onsale{';
            $football_sports_club_theme_css .='left: auto; right: 15px;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_product_sale == 'Left'){
        $football_sports_club_theme_css .='.woocommerce ul.products li.product .onsale{';
            $football_sports_club_theme_css .='left: 15px; right: auto;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_product_sale == 'Center'){
        $football_sports_club_theme_css .='.woocommerce ul.products li.product .onsale{';
            $football_sports_club_theme_css .='right: 50%;left: 50%;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $football_sports_club_woo_product_image_box_shadow = get_theme_mod('football_sports_club_woo_product_image_box_shadow',0);
    if($football_sports_club_woo_product_image_box_shadow != false){
        $football_sports_club_theme_css .='.woocommerce ul.products li.product a img{';
            $football_sports_club_theme_css .='box-shadow: '.esc_attr($football_sports_club_woo_product_image_box_shadow).'px '.esc_attr($football_sports_club_woo_product_image_box_shadow).'px '.esc_attr($football_sports_club_woo_product_image_box_shadow).'px #cccccc;';
        $football_sports_club_theme_css .='}';
    }

     /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $football_sports_club_woo_product_border_radius = get_theme_mod('football_sports_club_woo_product_border_radius', 0);
    if($football_sports_club_woo_product_border_radius != false){
        $football_sports_club_theme_css .='.woocommerce ul.products li.product a img{';
            $football_sports_club_theme_css .='border-radius: '.esc_attr($football_sports_club_woo_product_border_radius).'px;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $football_sports_club_footer_bg_image = get_theme_mod('football_sports_club_footer_bg_image');
    if($football_sports_club_footer_bg_image != false){
        $football_sports_club_theme_css .='#colophon{';
            $football_sports_club_theme_css .='background: url('.esc_attr($football_sports_club_footer_bg_image).')!important;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $football_sports_club_copyright_background_color = get_theme_mod('football_sports_club_copyright_background_color');
    if($football_sports_club_copyright_background_color != false){
        $football_sports_club_theme_css .='.footer_info{';
            $football_sports_club_theme_css .='background-color: '.esc_attr($football_sports_club_copyright_background_color).' !important;';
        $football_sports_club_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $football_sports_club_logo_title_color = get_theme_mod('football_sports_club_logo_title_color');
    if($football_sports_club_logo_title_color != false){
        $football_sports_club_theme_css .='p.site-title a, .navbar-brand a{';
            $football_sports_club_theme_css .='color: '.esc_attr($football_sports_club_logo_title_color).' !important;';
        $football_sports_club_theme_css .='}';
    }

    $football_sports_club_logo_tagline_color = get_theme_mod('football_sports_club_logo_tagline_color');
    if($football_sports_club_logo_tagline_color != false){
        $football_sports_club_theme_css .='.logo p.site-description, .navbar-brand p{';
            $football_sports_club_theme_css .='color: '.esc_attr($football_sports_club_logo_tagline_color).'  !important;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $football_sports_club_footer_widget_content_alignment = get_theme_mod( 'football_sports_club_footer_widget_content_alignment','Left');
    if($football_sports_club_footer_widget_content_alignment == 'Left'){
        $football_sports_club_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $football_sports_club_theme_css .='text-align: left;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_footer_widget_content_alignment == 'Center'){
        $football_sports_club_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $football_sports_club_theme_css .='text-align: center;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_footer_widget_content_alignment == 'Right'){
        $football_sports_club_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $football_sports_club_theme_css .='text-align: right;';
        $football_sports_club_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $football_sports_club_copyright_content_alignment = get_theme_mod( 'football_sports_club_copyright_content_alignment','Right');
    if($football_sports_club_copyright_content_alignment == 'Left'){
        $football_sports_club_theme_css .='.footer-menu-left{';
        $football_sports_club_theme_css .='text-align: left;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_copyright_content_alignment == 'Center'){
        $football_sports_club_theme_css .='.footer-menu-left{';
            $football_sports_club_theme_css .='text-align: center;';
        $football_sports_club_theme_css .='}';
    }else if($football_sports_club_copyright_content_alignment == 'Right'){
        $football_sports_club_theme_css .='.footer-menu-left{';
            $football_sports_club_theme_css .='text-align: right;';
        $football_sports_club_theme_css .='}';
    }