<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DreamNumber
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class();  
$logo_image= get_field('logo_image', 'option');
$login_button = get_field('login_button', 'option');
$signup_button= get_field('signup_button', 'option');


?>   >     

<!-- header -->
<header class="main-header">
    <div class="container">
        <div class="row align-items-center text-lg-left text-center">
            <div class="col-12 col-lg-6 col-md-6">
                       <?php
                            if($logo_image)
                            { ?> 
                <div class="logo-image">
                    <a href="<?php echo get_home_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>"></a>
                </div><?php
                 }?>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <ul class="list-inline float-lg-right m-lg-0">
                     <?php
                        if($login_button ): 
                            $link_url = $login_button  ['url'];
                            $link_title = $login_button  ['title'];
                            if($login_button)
                            { ?> 
                               <li class="list-inline-item"><a href="<?php echo esc_url( $link_url ); ?>" class="text-white text-uppercase"><i class="la la-user"></i><?php echo esc_html( $link_title ); ?></a></li><?php
                            }?>
                       <?php endif; ?>
                    <?php
                      if($signup_button ): 
                            $link_url = $signup_button  ['url'];
                            $link_title = $signup_button  ['title'];
                            if($signup_button)
                            { ?> 
                            <li class="list-inline-item"><a href="<?php echo esc_url( $link_url ); ?>" class="text-white text-uppercase"><i class="la la-sign-in-alt"></i><?php echo esc_html( $link_title ); ?></a></li><?php
                            }?>
                      <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header -->