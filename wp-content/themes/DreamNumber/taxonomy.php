<?php get_header();?> 
<div class="container">
        <div class="row">  
            <h2><?php single_cat_title(); ?></h2>    

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="news_content">
                    <div class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date;?></div>
                        <p class="author_sec">By author <strong><?php the_author();?> </strong></p>
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_post_thumbnail()) {?>
                        <img src="<?php the_post_thumbnail_url('large');?>" class="img-fluid"><?php } ?>
                        <?php the_excerpt();?>
                        <span><a class="card-body" href="<?php the_permalink();?>">Read more...</a></span>
                    </div>
                    
            <?php endwhile; ?>
        </div>
        <?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => get_option( 'posts_per_page' ),
    'paged' => $paged,

);

  ?>


<?php
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();

             

    endwhile;

    $total_pages = $loop->max_num_pages;

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
wp_reset_postdata();
?>
    
    </div>
    





<?php get_footer();?>