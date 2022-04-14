<?php
  global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-single p-3 mb-4'); ?>>
  <?php if ( has_post_thumbnail() ) { ?>
    <div class="post-thumbnail">
      <?php the_post_thumbnail(''); ?>
    </div>
  <?php }?>
  <h1 class="post-title"><?php the_title(); ?></h1>
  <div class="post-meta mb-2">    
    <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_days', true) || get_post_meta($post->ID, 'the_travel_booking_popular_tours_star_ratings', true) || get_post_meta($post->ID, 'the_travel_booking_popular_tours_country_city', true) || get_post_meta($post->ID, 'the_travel_booking_popular_tours_amount', true) ){?>
      <hr>
      <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_amount', true) ) {?>
        <span class="mr-2"><i class="fas fa-money-bill-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_amount',true)); ?></span>
      <?php }?>

      <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_days', true) ) {?>
        <span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_days',true)); ?></span>
      <?php }?>

      <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_star_ratings', true) ) {?>
        <span class="mr-2"><i class="fas fa-star mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_star_ratings',true)); ?></span>
      <?php }?>

      <?php if( get_post_meta($post->ID, 'the_travel_booking_popular_tours_country_city', true) ) {?>
        <span class="mr-2"><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'the_travel_booking_popular_tours_country_city',true)); ?></span>
      <?php }?>
    <hr>
    <?php }?>    
  </div>
  <div class="post-content">
    <?php
      the_content();
      the_tags('<div class="post-tags"><strong>'.esc_html__('Tags:','the-travel-booking').'</strong> ', ', ', '</div>');
    ?>
  </div>
</div>