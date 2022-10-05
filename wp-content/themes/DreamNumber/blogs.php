<?php
/*
Template Name: News
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
<?php $categories = get_categories(); ?>
<ul class="cat-list">
  <li><a class="cat-list_item active" href="javascript:void(0)" data-slug="">All projects</a></li>

  <?php foreach($categories as $category) : ?>
    <li>
      <a class="cat-list_item" href="javascript:void(0)" data-slug="<?= $category->slug; ?>">
        <?= $category->name; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
</div>
<div class="container project-tiles">
    <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => get_option( 'posts_per_page' ),
            'post_status' => 'publish',
            'paged' => $paged, 
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post(); ?>                            
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
            <div class="paginations"> <?php
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
                } ?>
            </div> <?php
        }
        wp_reset_postdata();
    ?>
</div>
<?php get_footer();?>


