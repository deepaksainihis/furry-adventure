<?php if ( get_theme_mod('the_travel_booking_popular_tours_enable') ) : ?>

<?php $args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('the_travel_booking_popular_tours_category'),
  'posts_per_page' => get_theme_mod('the_travel_booking_popular_tours_number'),
); ?>

<div class="popular-tours pt-5">
  <div class="container">
    <div class="owl-carousel">
      <?php $arr_posts = new WP_Query( $args );
      if ( $arr_posts->have_posts() ) :
        while ( $arr_posts->have_posts() ) :
          $arr_posts->the_post();
          ?>
          <div class="tour-main-box">
            <div class="tour-image-box">
              <?php
                if ( has_post_thumbnail() ) :
                  the_post_thumbnail();
                endif;
              ?>
              <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_amount', true) ) {?>
                <p class="tour-price mb-0"><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_amount',true)); ?></p>
              <?php }?>
            </div>
            <div class="tour-inner-box p-3">
              <h3><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
              <p class="mb-0"><?php echo wp_trim_words( get_the_content(), get_theme_mod('the_travel_booking_excerpt_number_count',15) ); ?></p>
            </div>
            <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_days', true) || get_post_meta($post->ID, 'the_travel_booking_popular_tours_star_ratings', true) || get_post_meta($post->ID, 'the_travel_booking_popular_tours_country_city', true) ){?>
              <div class="tour-meta-box p-2">
                <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_days', true) ) {?>
                  <span><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_days',true)); ?></span>
                <?php }?>

                <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_star_ratings', true) ) {?>
                  <span><i class="fas fa-star mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_star_ratings',true)); ?></span>
                <?php }?>

                <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_country_city', true) ) {?>
                  <span><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_country_city',true)); ?></span>
                <?php }?>
              </div>
            <?php }?>
          </div>
        <?php
      endwhile;
      wp_reset_postdata();
      endif; ?>
    </div>
  </div>
</div>

<?php endif; ?>