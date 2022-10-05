<?php get_header();
?>
<?php if (have_posts()) : while(have_posts()) : the_post();?>
<article class="banner_r">
         <?php 
         global $wp_query;
         $post_obj = $wp_query->get_queried_object();
         $Page_ID = $post_obj->ID;
         $backgroundImg = wp_get_attachment_url(get_post_thumbnail_id($Page_ID));
         ?>

      <section class="singlepagesection" style="background-image: url('<?php echo $backgroundImg; ?>');">
         <div class="container column-gap-default">
            <div class="banner_heading">
                  <h2><?php the_title(); ?></h2>
            </div>
         </div>
      </section>

            <div class="container pt-5 pb-5 single_pages">
               <strong><?php echo get_the_date( 'l F j, Y'); ?></strong>
               <p class="author_sec">By author <strong><?php the_author(); ?> </strong> <?php
                  $author_id = get_the_author_meta('ID');
                  $author_badge = get_field('author_image', 'user_'. $author_id );
                  if($author_badge)
                  { ?> 
                  <img src="<?php echo ($author_badge)?>"><?php
                  }?>
               </p>
                  <?php the_content();?> 
               <nav class="nav-single">
                <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;Previous', 'Previous post link', 'dreamnumber' ) . '</span>' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link', ' <span class="meta-nav">' . _x( 'Next&rarr;', 'Next post link', 'dreamnumber' ) . '</span>' ); ?></div>
              </nav>
            </div>

</article> 
<?php endwhile; endif;?>

<?php get_footer();?>