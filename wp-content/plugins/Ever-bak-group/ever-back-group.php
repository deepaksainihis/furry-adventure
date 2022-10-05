<?php
/*

Plugin Name: Ruslandwk

Description: Making Ruslandwk Product Page Table.

Version: 1.0.0

Author: hipl

Author URI: http://hipl.com

Text Domain: Product-page-table

*/



function my_admin_menu() {
    add_menu_page(
    __( 'menu_slug', 'my-textdomain' ),
    __( 'Ruslandwk', 'my-textdomain' ),
    'manage_options',
    'menu_slug',
    'my_admin_table_contents',
    'dashicons-schedule',
    5
    );
    add_submenu_page(
        'menu_slug',               
        'Feature',                      
        'Feature',                      
        'manage_options',                 
        'menu_slug-feature',              
        'my_feature_table_contents'
  );


  add_submenu_page(
        'menu_slug',              
        'Parts',               
        'Parts',               
        'manage_options',                
        'menu_slug-parts', 
        'my_parts_table_contents' 
  );

}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_table_contents(){
    ?>
    <h1>
        <?php esc_html_e( 'Welcome to my custom table plugin.', 'my-plugin-textdomain' ); ?>
    </h1>
    <?php
    require_once("Template/rusl_product_table.php");
}
function my_feature_table_contents(){
    ?>
    <h1>
        <?php esc_html_e( 'Welcome to my Feature table category .', 'my-plugin-textdomain' ); ?>
    </h1>
    <?php
    require_once("Template/feature_table.php");
}
function my_parts_table_contents(){
    ?>
    <h1>
        <?php esc_html_e( 'Welcome to my parts table category.', 'my-plugin-textdomain' ); ?>
    </h1>
    <?php
    require_once("Template/parts_table.php");
}



    
    function table_installed(){
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $table_name = $wpdb->prefix . 'myplugin';

        $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . "Ruslandwk 
                (
                    `ID` INT(200) NOT NULL AUTO_INCREMENT ,
                    `title_main` VARCHAR(500) NOT NULL ,
                    `description_main` VARCHAR(500) NOT NULL ,
                    `image_main` VARCHAR(500) NOT NULL,
                    PRIMARY KEY (`ID`))";

        dbDelta($sql);
    }register_activation_hook( __FILE__, 'table_installed' );
   
       
    
    function table_uninstalled(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'mypluginruslandwk';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
    }register_deactivation_hook( __FILE__, 'table_uninstalled');
    

    function table_initiated(){
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $table_name = $wpdb->prefix ;

        $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . "Feature 
                (
                    `ID` INT(200) NOT NULL AUTO_INCREMENT ,
                    `feature_title` VARCHAR(500) NOT NULL ,
                    `feature_description` VARCHAR(500) NOT NULL ,

                    PRIMARY KEY (`ID`))";

        dbDelta($sql);
    }register_activation_hook( __FILE__, 'table_initiated' );
   
       
    
    function table_drop(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'feature';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
    }register_deactivation_hook( __FILE__, 'table_drop');



    function table_implemented(){
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $table_name = $wpdb->prefix ;

        $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . "Parts 
                (
                    `ID` INT(200) NOT NULL AUTO_INCREMENT ,
                    `title_parts` VARCHAR(500) NOT NULL ,
                    `description_parts` VARCHAR(500) NOT NULL ,
                    `image_parts` VARCHAR(500) NOT NULL,
                    PRIMARY KEY (`ID`))";

        dbDelta($sql);
    }register_activation_hook( __FILE__, 'table_implemented' );
   
       
    
    function table_delete(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'parts';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
    }register_deactivation_hook( __FILE__, 'table_delete');
  
    


function register_my_plugin_scripts() {
wp_enqueue_script('jQuery_js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery-3.0.0.min.js');
wp_enqueue_script( 'validate-script', plugin_dir_url(__FILE__ ) .  'assets/js/jquery.validate.min.js');
wp_register_script( 'frontend-ajax', plugin_dir_url(__FILE__ ) . 'assets/js/scripts.js');
wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
array( 
    'ajaxurl' => admin_url( 'admin-ajax.php' )
)
);
wp_enqueue_script( 'frontend-ajax', plugin_dir_url('assets/js/scripts.js',  __FILE__ ), array('jquery'), null, true );

}
add_action( 'admin_enqueue_scripts', 'register_my_plugin_scripts' );



function insert_record(){
	global $wpdb;
    extract($_POST);
    if($_POST['parts_title']){
        $result = $wpdb->insert(
            'wp_parts', 
            array(
                'title_parts'=>$parts_title,
                'description_parts'=>$parts_description,
                'image_parts' => ''
            )
        );
        $last_id = $wpdb->insert_id;

        if($last_id){
            echo json_encode(array('status'=>'success'));
            wp_die();
        }else{
            echo json_encode(array('status'=>'failed'));
            wp_die();
        }
    }


	$ids = $_POST['title'];
	$descriptions = $_POST['description'];
    $files = $_FILES['image'];

    // $upload_id = upload_user_file($files);

    $upload_id = wp_upload_bits($files['name'], null, file_get_contents($files['tmp_name']));

	$result = $wpdb->insert(
        'wp_mypluginruslandwk', 
        array(
            'title_main'=>$ids,
            'description_main'=>$descriptions,
            'image_main' => $upload_id['url']
	    )
    );
	$last_id = $wpdb->insert_id;
	
	if($last_id){
        echo json_encode(array('status'=>'success'));
	}else{
		echo json_encode(array('status'=>'failed'));
	}
	die();
}
add_action('wp_ajax_insert', 'insert_record');
add_action('wp_ajax_nopriv_insert', 'insert_record');

/******FILE UPLOAD*****************/
function upload_user_file( $file = array() ) {    
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
    if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
        return false;
    } else {
        $filename = $file_return['file'];
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );
        $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );
        if( 0 < intval( $attachment_id ) ) {
          return $attachment_id;
        }
    }
    return false;
}


    function insert_feature(){
        global $wpdb;
    
    
        $title = $_POST['title_feature'];
        $description = $_POST['description_feature'];
    
        $result = $wpdb->insert('wp_feature', array(
        'feature_title'=>$title,
        'feature_description'=>$description,
    
        ))== True;
        $last_id = $wpdb->insert_id;
        
        if($last_id){
        echo json_encode(array('status'=>'success'));
        }else{
            echo json_encode(array('status'=>'failed'));
        }
        die();
        }
        add_action('wp_ajax_inserts', 'insert_feature');
        add_action('wp_ajax_nopriv_inserts', 'insert_feature');


        function insert_parts(){
            global $wpdb;
        
        
            $title = $_POST['parts_title'];
            $description = $_POST['parts_description'];
        
            $result = $wpdb->insert('wp_parts', array(
            'title_parts'=>$title,
            'description_parts'=>$description,
        
            ))== True;
            $last_id = $wpdb->insert_id;
            
            if($last_id){
            echo json_encode(array('status'=>'success'));
            }else{
                echo json_encode(array('status'=>'failed'));
            }
            die();
            }
            add_action('wp_ajax_insert', 'insert_parts');
            add_action('wp_ajax_nopriv_insert', 'insert_parts');
