<?php

// Travel Meta Data
function the_travel_booking_custom_meta_popular_tours() {
    add_meta_box( 
    	'bn_meta', __( 'Popular Tours Meta Feilds', 'the-travel-booking' ), 
    	'the_travel_booking_meta_callback_popular_tours', 
    	'post', 
    	'normal', 
    	'high' 
    );
}

/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'the_travel_booking_custom_meta_popular_tours');
}

function the_travel_booking_meta_callback_popular_tours( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'the_travel_booking_meta_nonce_popular_tours' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $popular_tours_amount = get_post_meta( $post->ID, 'the_travel_booking_popular_tours_amount', true );
    $popular_tours_days = get_post_meta( $post->ID, 'the_travel_booking_popular_tours_days', true );
    $popular_tours_star_ratings = get_post_meta( $post->ID, 'the_travel_booking_popular_tours_star_ratings', true );
    $popular_tours_country_city = get_post_meta( $post->ID, 'the_travel_booking_popular_tours_country_city', true );
    ?>
    <div id="popular_tours_meta">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Amount', 'the-travel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="the_travel_booking_popular_tours_amount" id="the_travel_booking_popular_tours_amount" value="<?php echo esc_html($popular_tours_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Days', 'the-travel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="the_travel_booking_popular_tours_days" id="the_travel_booking_popular_tours_days" value="<?php echo esc_html($popular_tours_days); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Star Rating', 'the-travel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="the_travel_booking_popular_tours_star_ratings" id="the_travel_booking_popular_tours_star_ratings" value="<?php echo esc_html($popular_tours_star_ratings); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Name of Country / City', 'the-travel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="the_travel_booking_popular_tours_country_city" id="the_travel_booking_popular_tours_country_city" value="<?php echo esc_html($popular_tours_country_city); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function the_travel_booking_meta_save_popular_tours( $post_id ) {
    if (!isset($_POST['the_travel_booking_meta_nonce_popular_tours']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['the_travel_booking_meta_nonce_popular_tours']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Package Amount
    if( isset( $_POST[ 'the_travel_booking_popular_tours_amount' ] ) ) {
        update_post_meta( $post_id, 'the_travel_booking_popular_tours_amount', strip_tags( wp_unslash( $_POST[ 'the_travel_booking_popular_tours_amount' ]) ) );
    }

    // Save Package Days
    if( isset( $_POST[ 'the_travel_booking_popular_tours_days' ] ) ) {
        update_post_meta( $post_id, 'the_travel_booking_popular_tours_days', strip_tags( wp_unslash( $_POST[ 'the_travel_booking_popular_tours_days' ]) ) );
    }

	// Save Package Star Rating
    if( isset( $_POST[ 'the_travel_booking_popular_tours_star_ratings' ] ) ) {
        update_post_meta( $post_id, 'the_travel_booking_popular_tours_star_ratings', strip_tags( wp_unslash( $_POST[ 'the_travel_booking_popular_tours_star_ratings' ]) ) );
    }

    // Save Name of Country / City
    if( isset( $_POST[ 'the_travel_booking_popular_tours_country_city' ] ) ) {
        update_post_meta( $post_id, 'the_travel_booking_popular_tours_country_city', strip_tags( wp_unslash( $_POST[ 'the_travel_booking_popular_tours_country_city' ]) ) );
    }
}
add_action( 'save_post', 'the_travel_booking_meta_save_popular_tours' );