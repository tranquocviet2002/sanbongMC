<?php
/**
 * Displays top navigation
 *
 * @package Football Sports Club
 */
?>

<div class="navigation_header py-2">
    <div class="toggle-nav mobile-menu">
            <button onclick="football_sports_club_openNav()"><i class="fas fa-th"></i></button>
    </div>
    <div id="mySidenav" class="nav sidenav">
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'football-sports-club' ); ?>">
            <?php {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'menu', 
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                    )
                );
            } ?>
        </nav>
        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="football_sports_club_closeNav()"><i class="fas fa-times"></i></a>
    </div>
</div>