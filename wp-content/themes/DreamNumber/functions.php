<?php

function elements_enque_scripts()
{
	   wp_enqueue_style('bootstrap_css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	   wp_enqueue_style('fontcss', get_stylesheet_directory_uri() . '/css/fontcss.css', '');
	   wp_enqueue_style('owl_carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.css', '');
	   wp_enqueue_style('font-family', get_stylesheet_directory_uri() . '/css/font-family.css', '');
	   wp_enqueue_style('line-awesome.min', get_stylesheet_directory_uri() . '/css/line-awesome.min.css', '');
	   wp_enqueue_style('style_css', get_stylesheet_directory_uri() . '/style.css', array(), false, 'all');
	   wp_enqueue_script('jQuery', get_stylesheet_directory_uri() . '/js/jquery.min.js', '');
       wp_enqueue_script('bootstrap_js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', '');
	   wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', '');
	   wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/js/popper.min.js', '');
	   wp_enqueue_script('owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', '');
	   wp_enqueue_script('js', get_stylesheet_directory_uri() . '/js/jquery-3.6.0.min.js', '');
	   wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', '');
	   wp_register_script( 'frontend-ajax', get_stylesheet_directory_uri() . '/js/scripts.js' );
	   wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
		   array( 
			   'ajaxurl' => admin_url( 'admin-ajax.php' ),
			   'data_var_1' => 'value 1',
			   'data_var_2' => 'value 2',
		   )
	   );
	   wp_enqueue_script( 'frontend-ajax', get_stylesheet_directory_uri() .'/js/script.js', array('jquery'), null, true );
	   


}
add_action('wp_enqueue_scripts', 'elements_enque_scripts');


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


register_nav_menus(
	
	array(
	     
	        'top-menu' => __('Top Menu', 'theme'),
			'footer-menu' => __('Footer Menu', 'theme'),
	
	
	)
	
	
);

add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);


function enable_widgets() {

    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id'   => 'sidebar',
            'description'   => 'Here you can add widgets to the main sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 id="widget-heading">',
            'after_title'   => '</h5>'
    ));

}
add_action('widgets_init','enable_widgets');

add_theme_support('menus');
add_theme_support( 'woocommerce' );
add_theme_support('post-thumbnails'); 

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
	</style>';
}
add_action( 'admin_head', 'fix_svg' );

function custom_posts_per_page( $query ) {
	if ( $query->is_archive() ) {
		set_query_var('posts_per_page', get_option( 'posts_per_page' ));
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
function filter_projects() {
	extract($_POST);
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => get_option( 'posts_per_page' )
	);

	$terms = get_terms(array('name__like' => 'app', 'taxonomy' => 'category'));
	print_r($terms);
	wp_die();

	if($category){
		$args['tax_query'][] = array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => $category
		);
	}

	$query = new WP_Query($args);

	ob_start();
	$query = new WP_Query($args);
	if($query->have_posts()) :
		while($query->have_posts()) : $query->the_post();?>
			<div class="news_content">
				<div class="date"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date;?></div>
				<p class="author_sec">By author <strong><?php the_author();?> </strong></p>
				<h1><?php the_title(); ?></h1>
				<?php if (has_post_thumbnail()) {?>
				<img src="<?php the_post_thumbnail_url('large');?>" class="img-fluid"><?php } ?>
				<?php the_excerpt();?>
				<span><a class="card-body" href="<?php the_permalink();?>">Read more...</a></span>
			</div>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	$html = ob_get_clean();
	wp_send_json(array('status' => 'success', 'htm' => $html));
	wp_die();
}

add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('page','post') ) );
    if( $the_query->have_posts() ) :
        echo '<ul>';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>

        <?php endwhile;
       echo '</ul>';
        wp_reset_postdata();  
    endif;

    die();
}

function insert_records($table, $data = array()){
	global $wpdb;
	$result = '';
	if($table && $data){
		$result = $wpdb->insert(
			$table,
			$data
		);
	}
	return $result;
} 