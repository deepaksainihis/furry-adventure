<?php

add_action( 'admin_menu', 'the_travel_booking_getting_started' );
function the_travel_booking_getting_started() {    	    	
	add_theme_page( esc_html__('Get Started', 'the-travel-booking'), esc_html__('Get Started', 'the-travel-booking'), 'edit_theme_options', 'the-travel-booking-guide-page', 'the_travel_booking_test_guide');   
}

function the_travel_booking_admin_enqueue_scripts() {
	wp_enqueue_style( 'the-travel-booking-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'the_travel_booking_admin_enqueue_scripts' );

if ( !defined( 'THE_TRAVEL_BOOKING_DOCS_FREE' ) ) {
define('THE_TRAVEL_BOOKING_DOCS_FREE',__('https://www.misbahwp.com/docs/the-travel-booking-free-docs/','the-travel-booking'));
}
if ( !defined( 'THE_TRAVEL_BOOKING_DOCS_PRO' ) ) {
define('THE_TRAVEL_BOOKING_DOCS_PRO',__('https://www.misbahwp.com/docs/the-travel-booking-pro-docs','the-travel-booking'));
}
if ( !defined( 'THE_TRAVEL_BOOKING_BUY_NOW' ) ) {
define('THE_TRAVEL_BOOKING_BUY_NOW',__('https://www.misbahwp.com/themes/travel-booking-wordpress-theme/','the-travel-booking'));
}
if ( !defined( 'THE_TRAVEL_BOOKING_SUPPORT_FREE' ) ) {
define('THE_TRAVEL_BOOKING_SUPPORT_FREE',__('https://wordpress.org/support/theme/the-travel-booking','the-travel-booking'));
}
if ( !defined( 'THE_TRAVEL_BOOKING_REVIEW_FREE' ) ) {
define('THE_TRAVEL_BOOKING_REVIEW_FREE',__('https://wordpress.org/support/theme/the-travel-booking/reviews/#new-post','the-travel-booking'));
}
if ( !defined( 'THE_TRAVEL_BOOKING_DEMO_PRO' ) ) {
define('THE_TRAVEL_BOOKING_DEMO_PRO',__('https://www.misbahwp.com/demo/the-travel-booking/','the-travel-booking'));
}

function the_travel_booking_test_guide() { ?>
	<?php $theme = wp_get_theme(); ?>
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( THE_TRAVEL_BOOKING_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'the-travel-booking' ) ?></a>			
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'the-travel-booking' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( THE_TRAVEL_BOOKING_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'the-travel-booking' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( THE_TRAVEL_BOOKING_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'the-travel-booking' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','the-travel-booking'); ?><?php echo esc_html( $theme ); ?>  <span><?php esc_html_e('Version: ', 'the-travel-booking'); ?><?php echo esc_html($theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','the-travel-booking'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','the-travel-booking'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','the-travel-booking'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Secton Reordering','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','the-travel-booking'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>		    
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'the-travel-booking' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','the-travel-booking'); ?></p>
					<div id="admin_pro_links">			
						<a class="blue-button-2" href="<?php echo esc_url( THE_TRAVEL_BOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'the-travel-booking' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( THE_TRAVEL_BOOKING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'the-travel-booking' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( THE_TRAVEL_BOOKING_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'the-travel-booking' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
