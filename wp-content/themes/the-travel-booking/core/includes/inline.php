<?php


$the_travel_booking_custom_css = '';

	/*---------------------------text-transform-------------------*/
	
	$the_travel_booking_text_transform = get_theme_mod( 'menu_text_transform_the_travel_booking','CAPITALISE');
    if($the_travel_booking_text_transform == 'CAPITALISE'){

		$the_travel_booking_custom_css .='#main-menu ul li a{';

			$the_travel_booking_custom_css .='text-transform: capitalize ; font-size: 14px !important;';

		$the_travel_booking_custom_css .='}';

	}else if($the_travel_booking_text_transform == 'UPPERCASE'){

		$the_travel_booking_custom_css .='#main-menu ul li a{';

			$the_travel_booking_custom_css .='text-transform: uppercase ; font-size: 14px !important';

		$the_travel_booking_custom_css .='}';

	}else if($the_travel_booking_text_transform == 'LOWERCASE'){

		$the_travel_booking_custom_css .='#main-menu ul li a{';

			$the_travel_booking_custom_css .='text-transform: lowercase ; font-size: 14px !important';

		$the_travel_booking_custom_css .='}';
	}

	