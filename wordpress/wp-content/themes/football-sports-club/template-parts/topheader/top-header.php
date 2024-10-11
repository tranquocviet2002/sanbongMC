<?php
/**
 * Displays main header
 *
 * @package Football Sports Club
 */
?>

<div class="top_header py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 align-self-center text-center text-md-start">
                <?php if(get_theme_mod('football_sports_club_upcoming_match') != ''){ ?>
                    <span><span class="match-cl"><?php esc_html_e('UPCOMING MATCH:  ','football-sports-club'); ?></span> <?php echo esc_html(get_theme_mod('football_sports_club_upcoming_match','')); ?></span>
                <?php }?>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5 align-self-center text-center text-md-end">
                <?php if(get_theme_mod('football_sports_club_address') != ''){ ?>
                    <span class="me-3"><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('football_sports_club_address','')); ?></span>
                <?php }?>
                <?php if(get_theme_mod('football_sports_club_phone') != ''){ ?>
                    <span><i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_html(get_theme_mod('football_sports_club_phone','')); ?>"><?php echo esc_html(get_theme_mod('football_sports_club_phone','')); ?></a></span>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 align-self-center">
                <div class="social-link text-center text-md-end">
                    <?php if(get_theme_mod('football_sports_club_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_facebook_url','')); ?>"><i class="fab fa-facebook-f me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_twitter_url','')); ?>"><i class="fab fa-twitter me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_intagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_intagram_url','')); ?>"><i class="fab fa-instagram me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_linkedin_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_linkedin_url','')); ?>"><i class="fab fa-linkedin-in me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_youtube_url','')); ?>"><i class="fab fa-youtube"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} else { do_action( 'wp_body_open' ); }
    $football_sports_club_sticky_header = get_theme_mod('football_sports_club_sticky_header');
    $football_sports_club_data_sticky = "false";
    if ($football_sports_club_sticky_header) {
    $football_sports_club_data_sticky = "true";
    }
    ?>

<div class="main-header" data-sticky="<?php echo esc_attr($football_sports_club_data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-8 align-self-center">
                <div class="navbar-brand text-center text-md-start">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $football_sports_club_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $football_sports_club_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('football_sports_club_logo_title_text',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('football_sports_club_logo_title_text',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $football_sports_club_description = get_bloginfo( 'description', 'display' );
                            if ( $football_sports_club_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('football_sports_club_theme_description',false) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($football_sports_club_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
        </div>
    </div>
</div>
