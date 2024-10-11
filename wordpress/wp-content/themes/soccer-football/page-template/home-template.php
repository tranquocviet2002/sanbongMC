<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider" slider-loop="<?php echo esc_html(get_theme_mod('football_sports_club_slider_loop')); ?>">
     <?php if(get_theme_mod('football_sports_club_slider_setting') != ''){ ?>
    <?php $football_sports_club_slide_pages = array();
      for ( $football_sports_club_count = 1; $football_sports_club_count <= 3; $football_sports_club_count++ ) {
        $football_sports_club_mod = intval( get_theme_mod( 'football_sports_club_top_slider_page' . $football_sports_club_count ));
        if ( 'page-none-selected' != $football_sports_club_mod ) {
          $football_sports_club_slide_pages[] = $football_sports_club_mod;
        }
      }
      if( !empty($football_sports_club_slide_pages) ) :
        $football_sports_club_args = array(
          'post_type' => 'page',
          'post__in' => $football_sports_club_slide_pages,
          'orderby' => 'post__in'
        );
        $football_sports_club_query = new WP_Query( $football_sports_club_args );
        if ( $football_sports_club_query->have_posts() ) :
          $football_sports_club_i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $football_sports_club_query->have_posts() ) : $football_sports_club_query->the_post(); ?>
        <div class="slider-box">
          <?php if(has_post_thumbnail()){
            the_post_thumbnail();
            } else{?>
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/slider.png" alt="" />
          <?php } ?>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
            <div class="slider-box-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Register Now','soccer-football'); ?></a>
            </div>
          </div>
        </div>
      <?php $football_sports_club_i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <?php }?>
  </section>

<?php if(get_theme_mod('football_sports_club_activity_setting') != ''){ ?>
  <section class="sports-activities py-5">
    <div class="container">
      <?php if(get_theme_mod('football_sports_club_sports_activities_title') != ''){ ?>
        <h3 class="mb-5 text-center"><?php echo esc_html(get_theme_mod('football_sports_club_sports_activities_title','')); ?></h3>
      <?php }?>
      <div class="row">
        <?php
          $football_sports_club_sports_activities_cat = get_theme_mod('football_sports_club_sports_activities_category','');
          $football_sports_club_sports_activities_per_page = get_theme_mod('football_sports_club_sports_activities_per_page',4);
          if($football_sports_club_sports_activities_cat){
            $football_sports_club_page_query5 = new WP_Query(array( 'category_name' => esc_html($football_sports_club_sports_activities_cat,'soccer-football'),'post_per_page' => esc_attr( $football_sports_club_sports_activities_per_page )));
            $football_sports_club_i=1;
            while( $football_sports_club_page_query5->have_posts() ) : $football_sports_club_page_query5->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-category mb-3">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="box-image">
                      <?php the_post_thumbnail(); ?>
                      <p class="box-icon"><i class="<?php echo esc_attr(get_theme_mod('football_sports_club_sports_activities_icon'.$football_sports_club_i,'fas fa-swimmer')); ?>"></i></p>
                    </div>
                  <?php }?>
                  <div class="px-3 pb-3">
                    <h4 class="mb-3"><?php the_title(); ?></h4>
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','soccer-football'); ?><i class="fas fa-angle-double-right ms-1"></i></a>
                  </div>
                </div>
              </div>
            <?php $football_sports_club_i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>
 <?php }?>
 
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>