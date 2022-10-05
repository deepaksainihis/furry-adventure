<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function the_travel_booking_enqueue_google_fonts() { 
	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'the_travel_booking_enqueue_google_fonts' );

if (!function_exists('the_travel_booking_enqueue_scripts')) {

	function the_travel_booking_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			esc_url( get_template_directory_uri() ) . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			esc_url( get_template_directory_uri() ) . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			esc_url( get_template_directory_uri() ) . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('the-travel-booking-style', get_stylesheet_uri(), array() );

		wp_style_add_data('the-travel-booking-style', 'rtl', 'replace');

		wp_enqueue_style(
			'the-travel-booking-media-css',
			esc_url( get_template_directory_uri() ) . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'the-travel-booking-woocommerce-css',
			esc_url( get_template_directory_uri() ) . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'the-travel-booking-navigation',
			esc_url( get_template_directory_uri() ) . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			esc_url( get_template_directory_uri() ) . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'the-travel-booking-script',
			esc_url( get_template_directory_uri() ) . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				#site-navigation {
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'the-travel-booking-style', $css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'the-travel-booking-style',$the_travel_booking_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'the_travel_booking_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('the_travel_booking_after_setup_theme')) {

	function the_travel_booking_after_setup_theme() {

		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'the-travel-booking' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'the_travel_booking_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
require get_template_directory() .'/core/includes/meta-data.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/**------------------------------------------------------------------------------------------
 * Enqueue theme logo style.
 */
function the_travel_booking_logo_resizer() {

    $theme_logo_size_css = '';
    $the_travel_booking_logo_resizer = get_theme_mod('the_travel_booking_logo_resizer');

	$theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($the_travel_booking_logo_resizer).'px !important;
			width: '.esc_attr($the_travel_booking_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'the-travel-booking-style',$theme_logo_size_css );	

}
add_action( 'wp_enqueue_scripts', 'the_travel_booking_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function the_travel_booking_global_color() {

    $theme_color_css = '';
    $the_travel_booking_global_color = get_theme_mod('the_travel_booking_global_color');
    $the_travel_booking_global_color_2 = get_theme_mod('the_travel_booking_global_color_2');

	$theme_color_css = '
		.top-header,#main-menu ul.children li a:hover,#main-menu ul.sub-menu li a:hover,p.tour-price,.tour-meta-box,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.the-travel-booking-pagination span.current,.the-travel-booking-pagination span.current:hover,.the-travel-booking-pagination span.current:focus,.the-travel-booking-pagination a span:hover,.the-travel-booking-pagination a span:focus,.comment-respond input#submit,.comment-reply a,.sidebar-widget h4.title,.sidebar-area .tagcloud a,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.menu-toggle,.dropdown-toggle,button.close-menu,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.scroll-up a  {
			background: '.esc_attr($the_travel_booking_global_color).';
		}
		a:hover,a:focus,.translation-box .skiptranslate.goog-te-gadget,.logo a:hover,.logo a:focus,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,.slider .owl-nav i,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,#main-menu ul li a:before,footer a:hover {
			color: '.esc_attr($the_travel_booking_global_color).';
		}
		.scroll-up a:hover,footer,.comment-respond input#submit:hover, .comment-reply a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce button.button:hover,.woocommerce a.button.alt:hover,.woocommerce a.button:hover,.woocommerce button.button.alt:hover,.woocommerce button.button:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce a.added_to_cart:hover {
			background: '.esc_attr($the_travel_booking_global_color_2).';
		}
		h1,h2,h3,a,.top-header span,#main-menu ul li a,.logo-content a,.header-search .open-search-form i,.top-header span span{
			color: '.esc_attr($the_travel_booking_global_color_2).';
		}
	';
    wp_add_inline_style( 'the-travel-booking-style',$theme_color_css );
    wp_add_inline_style( 'the-travel-booking-woocommerce-css',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'the_travel_booking_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('the_travel_booking_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function the_travel_booking_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'the-travel-booking'); 
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'the-travel-booking'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'the-travel-booking'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'the-travel-booking' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'the-travel-booking'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for the_travel_booking_comment()

if (!function_exists('the_travel_booking_widgets_init')) {

	function the_travel_booking_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','the-travel-booking'),
			'id'   => 'the-travel-booking-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'the-travel-booking'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','the-travel-booking'),
			'id'   => 'the-travel-booking-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'the-travel-booking'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'the_travel_booking_widgets_init' );

}

function the_travel_booking_get_categories_select() {
	$teh_cats = get_categories();
	$results;
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'the_travel_booking_loop_columns', 999);
if (!function_exists('the_travel_booking_loop_columns')) {
	function the_travel_booking_loop_columns() {
		return 3; // 3 products per row
	}
}

function the_travel_booking_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
}
add_action( 'customize_register', 'the_travel_booking_remove_sections');

//redirect
Function the_travel_booking_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=the-travel-booking-guide-page") );
   	}
}
add_action('after_setup_theme', 'the_travel_booking_notice');

add_action('woocommerce_order_details_after_order_table', 'custom_details');
function custom_details($order){
	if(!isset($_REQUEST['key'])){
		echo 'Hello';
	}
}

add_action('wp_head', 'add_worker');
function add_worker(){
	
		echo '<script>
		// Check that service workers are supported
		if ("serviceWorker" in navigator) {
		// Use the window load event to keep the page load performant

		window.addEventListener("load", () => {
			navigator.serviceWorker.register("http://hipl-deepak/furry-adventure/sw.js");
		});
		}
		</script>';
}


/***Movie */


if(isset($_POST['submitpost'])) {
	$new_post = array(
	'post_type' => 'movies', 
	'post_title'    => $_POST['title'],
	'post_status' => 'publish',
	'meta_input' => array(
		'release' => $_POST['release'],
		'review' =>	$_POST['review']
	));
	$post_id = wp_insert_post($new_post);
	$category_ids = explode(",", $_POST['cast_name']);
	wp_set_object_terms( $post_id , $category_ids, 'casts');
}


function add_custom_meta_box(){
	add_meta_box("demo-meta-box", "Custom Meta Box", "custom_meta_box_markup", "movie", "side", "high", null);
	}
	add_action("add_meta_boxes", "add_custom_meta_box");


function custom_meta_box_markup($object){
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
	$review= get_post_meta(get_the_id(), "review",true);
	?>
	<div class="col-md-12">
		<label class="control-label">Release Date</label>
		<input type="date" class="form-controls" name="release" value="<?php echo get_post_meta($object->ID, "release", true); ?>">
	</div>
	<div class="col-md-12">
		<label class="control-label" name="review" value="<?php echo get_post_meta($object->ID, "review", true); ?>">Select a rating</label>
		<select name="review" id="review"><option value="5"<?=($review == 5) ? 'selected' : '' ;?>>Excellent</option>
		<option value="4" <?=($review == 4) ? 'selected' : '' ;?>>Very Good</option>
		<option value="3" <?=($review == 3) ? 'selected' : '' ;?>>Average</option>
		<option value="2" <?=($review == 2) ? 'selected' : '' ;?>>Poor</option>
		<option value="1" <?=($review == 1) ? 'selected' : '' ;?>>Terrible</option></select>
	</div><?php  
	}

function save_custom_meta_box($post_id , $new_post, $update){
	if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
		return $id;
	if(!current_user_can("edit_post", $post_id ))
		return $post_id ;
	if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return$post_id ;
	$slug = "movie";
	if($slug != $new_post->post_type)
		return $post_id ;
	$meta_box_date_value = "";
	$meta_box_text_value = "";
	if(isset($_POST["submitpost"])){
		$meta_box_date_value = $_POST["release"];
	}   
	update_post_meta($post_id , "release", $meta_box_date_value);
	if(isset($_POST["submitpost"])){
		$meta_box_text_value = $_POST["review"];
	}   
	update_post_meta($post_id , "review", $meta_box_text_value);
}
add_action("save_post", "save_custom_meta_box", 10, 3);


/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_book_init() {
	$labels = array(
		'name'                  => _x( 'Movies', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Movie', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Movies', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Movie', 'textdomain' ),
		'new_item'              => __( 'New Movie', 'textdomain' ),
		'edit_item'             => __( 'Edit Movie', 'textdomain' ),
		'view_item'             => __( 'View Movie', 'textdomain' ),
		'all_items'             => __( 'All Movies', 'textdomain' ),
		'search_items'          => __( 'Search Movies', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Movies:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Movie Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Movie archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Movies list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Movies list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'movie' ),
		'capability_type'    => 'post',
		'taxonomies' 	     => array('casts'),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'movies', $args );
}

add_action( 'init', 'wpdocs_codex_book_init' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
	// Add new "Locations" taxonomy to Posts
	register_taxonomy('casts', 'movies', array(
	  // Hierarchical taxonomy (like categories)
	  'hierarchical' => true,
	  // This array of options controls the labels displayed in the WordPress Admin UI
	  'labels' => array(
		'name' => _x( 'Casts', 'taxonomy general name' ),
		'singular_name' => _x( 'Cast', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Cast' ),
		'all_items' => __( 'All Casts' ),
		'parent_item' => __( 'Parent Casts' ),
		'parent_item_colon' => __( 'Parent Casts:' ),
		'edit_item' => __( 'Edit Casts' ),
		'update_item' => __( 'Update Casts' ),
		'add_new_item' => __( 'Add New Casts' ),
		'new_item_name' => __( 'New Casts Name' ),
		'menu_name' => __( 'Casts' ),
	  ),
	  // Control the slugs used for this taxonomy
	  'rewrite' => array(
		'slug' => 'cast', // This controls the base slug that will display before each term
		'with_front' => false, // Don't display the category base before "/locations/"
		'hierarchical' => true, // This will allow URL's like "/locations/boston/cambridge/"
		'show_ui' => true,    
		'show_in_rest' => true,    
		'show_admin_column' => true,    
		'update_count_callback' => '_update_post_term_count',    
		'query_var' => true
	  ),
	));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );