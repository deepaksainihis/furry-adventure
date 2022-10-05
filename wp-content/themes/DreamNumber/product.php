<?php
/*
Template Name: product

*/
?>


<?php get_header();?>
<article class="banner">
    <?php 
    $post_obj = $wp_query->get_queried_object();
    $Page_ID = $post_obj->ID;
    $backgroundImg = wp_get_attachment_url(get_post_thumbnail_id($Page_ID));
    ?>
</article>
<section class="pagesection" style="background-image: url('<?php echo $backgroundImg; ?>');">
    <div class="container column-gap-default">
        <div class="banner_heading">
            <h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>   
        </div>
    </div>
</section>
<div class="container"> 

<?php   
	$terms = get_terms([
        'taxonomy' => 'tax_token',
		'hide_empty' => true,
       
	]); ?>
	<ul class="tabs list-unstyled"><?php
    foreach ($terms as $term)
     {
	?>
      
			<li class="newsortby" value="<?php echo $term->term_id; ?>"><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li><?php
			
     }  ?>
  </ul>
  <form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <?php $select= wp_dropdown_categories(); ?>
        <input type="submit" value="view" />
    </form>
    <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'      => 'products',
                'posts_per_page' => get_option( 'posts_per_page' ),
                'post_status' => 'publish',
                'paged' => $paged, 
            );
                $dddd = new WP_Query( $args );
                    if ( $dddd->have_posts() ) {
                        while ( $dddd->have_posts() ) : $dddd->the_post();?>
                            <div class="container">
                                <div class="news_content">
                                    <div class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date;?></div>
                                    <p class="author_sec">By author <strong><?php the_author();?> </strong></p>
                                    <h1><?php the_title(); ?></h1>
                                    <?php if (has_post_thumbnail()) {?>
                                        <img src="<?php the_post_thumbnail_url('large');?>" class="img-fluid"><?php } ?>
                                                    <?php the_excerpt();?>
                                                        <span><a class="card-body" href="<?php the_permalink();?>">Read more...</a></span>
                                </div>
                            </div>
                        <?php endwhile;
                         wp_reset_query();?>
                           <div class="paginations"><?php
                                $total_pages = $dddd->max_num_pages;
                                if ($total_pages > 1){
                                    $current_page = max(1, get_query_var('paged'));
                                    echo paginate_links(array(
                                        'base' => get_pagenum_link(1) . '%_%',
                                        'format' => '/page/%#%',
                                        'current' => $current_page,
                                        'total' => $total_pages,
                                        'prev_text'    => __('« prev'),
                                        'next_text'    => __('next »'),
                                    ));
                                }    
                               
                    }
                 ?> 
</div>
                </div>
<?php get_footer();?>


