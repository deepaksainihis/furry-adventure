<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<?php $icon1 = get_theme_mod( 'the_travel_booking_dashicons_setting_1', 'dashicons dashicons-email' ); ?>
<?php $icon2 = get_theme_mod( 'the_travel_booking_dashicons_setting_2', 'dashicons dashicons-phone' ); ?>
<?php $icon3 = get_theme_mod( 'the_travel_booking_dashicons_setting_3', 'dashicons dashicons-location' ); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-travel-booking' ); ?></a>

<div class="top-header text-center text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 align-self-center">
				<?php if ( get_theme_mod('the_travel_booking_header_email_address') ) : ?>
					<span class="mr-3"><span class="dashicons dashicons-<?php echo esc_attr( $icon1 ); ?>"></span><?php echo esc_html( get_theme_mod('the_travel_booking_header_email_address' ) ); ?></span>
				<?php endif; ?>

				<?php if ( get_theme_mod('the_travel_booking_header_phone_number') ) : ?>
					<span class="mr-3"><span class="dashicons dashicons-<?php echo esc_attr( $icon2 ); ?>"></span><?php echo esc_html( get_theme_mod('the_travel_booking_header_phone_number' ) ); ?></span>
				<?php endif; ?>

				<?php if ( get_theme_mod('the_travel_booking_header_location_address') ) : ?>
					<span class="mr-3"><span class="dashicons dashicons-<?php echo esc_attr( $icon3 ); ?>"></span><?php echo esc_html( get_theme_mod('the_travel_booking_header_location_address' ) ); ?></span>
				<?php endif; ?>
			</div>
			<div class="col-lg-5 col-md-5 align-self-center translation-box text-md-right">
				<?php if ( get_theme_mod('the_travel_booking_header_google_translation') ) : ?>
					<?php echo do_shortcode('[google-translator]'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<header id="site-navigation" class="header text-center text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 align-self-center">
		    		<div class="logo text-center text-md-center text-lg-left">
			    		<div class="logo-image mr-3">
			    			<?php echo esc_url( the_custom_logo() ); ?>
				    	</div>
				    	<div class="logo-content">
					    	<?php
					    		if ( get_theme_mod('the_travel_booking_display_header_title', true) == true ) :
						      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
						      			echo esc_attr(get_bloginfo('name'));
						      		echo '</a>';
						      	endif;

						      	if ( get_theme_mod('the_travel_booking_display_header_text', true) == true ) :
					      			echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
					      		endif;
				    		?>
					</div>
				</div>
		   	</div>
		    	<div class="col-lg-7 col-md-11 align-self-center">
				<?php if(has_nav_menu('main-menu')){ ?>
					<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php esc_html_e( 'Menu', 'the-travel-booking' ); ?></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				<?php }?>
			</div>
			<div class="col-lg-1 col-md-1 align-self-center">
	            <div class="header-search text-center py-3 py-md-0">
	            	<?php if ( get_theme_mod('the_travel_booking_search_box_enable', true) == true ) : ?>
	                    <a class="open-search-form" href="#search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
	                    <div class="search-form"><?php get_search_form();?></div>
	            	<?php endif; ?>
	            </div>
			</div>
		</div>
	</div>
</header>