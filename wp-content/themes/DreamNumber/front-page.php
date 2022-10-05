<?php get_header();
$banner_background_image = get_field( 'banner_background_image');
$banner_text = get_field( 'banner_text');
$register_button = get_field( 'register_button');
$register_form = get_field( 'register_form');
$wave_animation_1 = get_field( 'wave_animation_1');
$wave_animation_2 = get_field( 'wave_animation_2');
$wave_animation_3 = get_field( 'wave_animation_3');
$heading_title = get_field( 'heading_title');
$line_image = get_field( 'line_image');
$amazing_features = get_field( 'amazing_features');
$amazing_features_heading = get_field( 'amazing_features_heading');
$amazing_features_text = get_field( 'amazing_features_text');
$bet_playing_heading = get_field( 'bet_playing_heading');
$bet_playing_text = get_field( 'bet_playing_text');
$download_app = get_field( 'download_app');
$download_app_video = get_field( 'download_app_video');
$app_content_heading = get_field( 'app_content_heading');
$app_content_text = get_field( 'app_content_text');
$app_play_store = get_field( 'app_play_store');
$app_store = get_field( 'app_store');
$testimonials_heading = get_field( 'testimonials_heading');
$client_image = get_field( 'client_image');
?>   
   
   <!-- background banner -->
<section class="bg-image position-relative" style="background-image: url('<?php echo ($banner_background_image); ?>');">
    <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8 text-lg-left text-center"><?php 
                    if( $banner_text)
                    { ?>
                    <h2 class="text-uppercase text-white font-weight-bold"><?php echo $banner_text;?></h2><?php
                    }
                    if($register_button): 
                        $link_url = $register_button ['url'];
                        $link_title = $register_button ['title'];
                        if( $banner_text)
                        { ?>
                            <button  href= "<?php echo esc_url( $link_url ); ?>" class="btn text-white border-0 text-uppercase font-weight-bold my-lg-4 mb-4"><i class="las la-ticket-alt"></i><?php echo ( $link_title ); ?></button><?php
                        }
                    endif; ?>
                </div><?php 
                if( $register_form)
                { ?>
                    <div class="col-12 col-lg-4 pl-lg-0">
                        <div class="register-form bg-white rounded">
                        <?php echo do_shortcode($register_form ); ?>
                        </div>
                    </div><?php
                } ?>
            </div>
    </div>
</section>
    <!-- end banner -->
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div class="wave waveTop" style="background-image: url('<?php echo ($wave_animation_1); ?>')"></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div class="wave waveMiddle" style="background-image: url('<?php echo ($wave_animation_2); ?>')"></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div class="wave waveBottom" style="background-image: url('<?php echo ($wave_animation_3); ?>')"></div>
      </div>
    </div>
    <!-- how to start -->
    <section class="how-to-start">
    <?php
    $counter = array('la la-sign-in-alt', 'las la-wallet', 'las la-crown');
    $i = 0;
    ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="heading-title text-center">
                        <h3 class="font-weight-bold"><?php echo $heading_title;?></h2></h3>
                    </div>
                </div>
            </div>
            <?php if( have_rows('singup') ):?>
            <div class="line-image d-lg-block d-none">
                <img src="<?php echo ($line_image); ?>">
            </div>
            <div class="row position-relative">
            <?php while( have_rows('singup') ): the_row();
                           $singup_heading = get_sub_field('singup_heading');
                           $singup_text = get_sub_field('singup_text');?>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="sing-up text-center">
                        <div class="dashed-circle"></div>
                        <div class="singup-icon bg-white rounded-circle position-relative"><i 
                        class="<?php echo $counter[$i]; ?>"></i></div>
                        <h4 class="text-uppercase font-weight-bold"><?php echo $singup_heading ; ?></h4>
                        <p><?php echo $singup_text; ?></p>
                    </div>
                </div>
                <?php $i++; endwhile; ?>
            </div>  
            <?php endif; ?>  
        </div>
    </section>
    <!-- end -->
    
        <!-- amazing features -->
<?php if( have_rows('feature_repeater') ):?>
    <section class="amazing-features" style="background-image: url('<?php echo ($amazing_features); ?>');">
    <?php
    $icons = array('las la-shield-alt rounded-circle', 'las la-users rounded-circle', 'las la-desktop rounded-circle', 'las la-book rounded-circle', 'las la-hand-point-up rounded-circle', 'las la-comments rounded-circle');
    $i = 0;
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8"><?php 
                    if( $amazing_features_heading || $amazing_features_text)
                    { ?>
                    <div class="heading-title text-center">
                        <h3 class="font-weight-bold"><?php echo $amazing_features_heading;?></h3>
                        <p><?php echo $amazing_features_text;?></p>
                    </div><?php
                        }?>
                </div>
            </div>
                <div class="row">
                <?php while( have_rows('feature_repeater') ): 
                    the_row();
                        $feature_heading = get_sub_field('feature_heading');
                        $feature_text = get_sub_field('feature_text');?>
                    <div class="col-12 col-lg-4 col-md-6"><?php 
                            if( $feature_heading || $amazing_features_text)
                                { ?>
                            <div class="features-block text-center mt-4 bg-white rounded">
                                <span class="features-icon text-white"><i class="<?php echo $icons[$i]; ?>"></i></span>
                                <h4 class="font-weight-bold text-uppercase"><?php echo $feature_heading; ?></h4>
                                <p><?php echo $amazing_features_text; ?></p>
                            </div><?php
                            }?>
                    </div>
                <?php $i++; endwhile; ?>
                </div>
        </div>
    </section>
<?php endif; ?> 
    <!-- end -->

    <!-- bet & playing -->
    <section class="bet-playing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="heading-title text-center">
                        <h3 class="font-weight-bold"><?php echo $bet_playing_heading;?></h3>
                        <p><?php echo $bet_playing_text;?></p>
                    </div>
                </div>
            </div>
            <div class="count-table my-3">
                <table class="table table-striped text-center table-responsive d-lg-table d-sm-table">
                    <thead>
                        <tr class="text-white">
                          <th scope="col">Round Name</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">Price</th>
                          <th scope="col">Entry</th>
                          <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php if( have_rows('bet_playing_repeator') ):?>
                            <?php while( have_rows('bet_playing_repeator') ): the_row();
                           $bet_playing_round = get_sub_field('bet_playing_round');
                           $bet_playing_money = get_sub_field('bet_playing_money');
                           $bet_playing_city = get_sub_field('bet_playing_city');?>
                            <th scope="row"><?php echo $bet_playing_round ?></th>
                            <td>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item rounded-circle"><span class="hours"></span>h</li>
                                    <li class="list-inline-item rounded-circle"><span class="minutes"></span>m</li>
                                    <li class="list-inline-item rounded-circle"><span class="seconds"></span>s</li>
                                </ul>
                            </td>
                            <td><?php echo $bet_playing_money ?></td>
                            <td><?php echo $bet_playing_city ?></td>
                            <td><span class="play-icon"><i class="las la-play text-white"></i></span></td>
                        </tr>
                        <?php endwhile;?>
                        <?php endif;?>
                    </tbody>
                </table>    
            </div>
        </div>
    </section>
    <!-- end -->

    <!-- download app -->
    <section class="download-app py-lg-0">
        <div class="container-fluid">
            <div class="vedio-image text-center" style="background-image: url('<?php echo ($download_app); ?>');">
                <a href="<?php echo $download_app_video; ?>" class="popup-youtube"><i class="las la-play text-white  rounded-circle"></i></a>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 p-0 col-md-6 col-sm-6">
                    
                </div>
                <div class="col-12 col-lg-6 p-0 col-md-6 col-sm-6">
                  <?php if( $app_content_heading || $app_content_text || $app_play_store || $app_store)
                        { ?>
                    <div class="app-content text-white">
                        <h3 class="font-weight-bold text-white"><?php echo $app_content_heading;?></h3>
                        <p class="text-justify"><?php echo $app_content_text;?></h3></p>
                        <ul class="list-inline mt-4 mb-0">
                        <?php
                                    if($app_play_store ): 
                                                        $link_url = $app_play_store  ['url'];
                                                        $link_title = $app_play_store  ['title'];
                                 ?>
                            <li class="list-inline-item"><a href="<?php echo esc_url( $link_url ); ?>" class="text-white"><i class="lab la-google-play"></i><?php echo esc_html( $link_title ); ?></a></li>
                            <?php endif; ?>
                            <?php
                                    if($app_store): 
                                                        $link_url = $app_store  ['url'];
                                                        $link_title = $app_store ['title'];
                                 ?>
                            <li class="list-inline-item"><a href="<?php echo esc_url( $link_url ); ?>" class="text-white"><i class="lab la-apple"></i><?php echo esc_html( $link_title ); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><?php
                        }?>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
    <!-- testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="heading-title">
                        <h3 class="font-weight-bold"><?php echo $testimonials_heading; ?></h3>
                    </div>
                </div>
            </div>
            <?php if( have_rows('owl_carousel') ):?>
            <div class="row align-items-center mt-5">
                <div class="col-12 col-lg-6 col-md-6">
                <?php while( have_rows('owl_carousel') ): the_row();
                        $owl_carousel_heading = get_sub_field('owl_carousel_heading');
                        $owl_carousel_text = get_sub_field('owl_carousel_text');
                    ?>
                    <span class="quote-icon"><i class="la la-quote-left"></i></span>
                    <div class="owl-slide owl-carousel owl-theme rounded position-relative">
                        <div class="item text-white">
                            <div class="owl-content">
                                <h4 class="font-weight-bold text-white text-uppercase"><?php echo $owl_carousel_heading; ?></h4>
                                <p class="m-0"><?php echo $owl_carousel_text; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="client-image ml-lg-auto m-auto">
                        <img src="<?php the_field('client_image'); ?>" class="img-fluid position-relative" />
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- end -->
<?php if( have_rows('image_video_repeater') ):?>
   <section class="image_vedio">
        <?php while( have_rows('image_video_repeater') ): the_row();
            $image_video_button_group = get_sub_field('image_video_button_group');
            $image_type = get_sub_field('image_type');
            $video_type = get_sub_field('video_type');
            $download_video = get_sub_field('download_video');
            $youtube_video = get_sub_field('youtube_video');
            $vimeo_video = get_sub_field('vimeo_video');
            ?>
            <div class="images"><?php
                if ($image_video_button_group == 'image'){
                    if($image_type)
                    {?>
                        <div class="image_sec">
                            <img src="<?php echo $image_type; ?>"/>
                        </div><?php
                    }
                }
                else
                {
                if($video_type){
                ?>
                    <div class="video_image"><?php
                        if ($video_type  == 'video'){
                            if($download_video)
                            {?>
                                <div class="download_vedio">
                                    <?php if( $download_video ): ?>
                                        <video width="320" height="240" controls autoplay loop>
                                            <source src="<?php echo $download_video['url']; ?>" type="video/mp4"><?php echo $download_video['filename']?>
                                        </video>
                                    <?php endif; ?>
                                </div><?php
                            }
                        }
                        elseif ($video_type  == 'vimeo'){
                            if($vimeo_video)
                            {?>
                                <div class="download_vimeo">
                                    <?php echo $vimeo_video; ?>
                                </div><?php
                            }
                        }
                        else{
                            if($youtube_video)
                            {?>
                                <div class="download_youtube">
                                    <?php echo $youtube_video; ?>
                                </div><?php
                            }
                        }?>
                    </div><?php
                }
                }?>
            </div>  
            
        <?php endwhile; ?>            
    </section>
<?php endif; ?> 

<!-- Form  -->

<?php  

$nameErr = $lnameErr = $emailErr = $mobilenoErr = "";  
$name = $lname = $email = $mobileno = "";  
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      

    if (emptyempty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
    if (emptyempty($_POST["lname"])) {  
        $lnameErr = "Name is required";  
   } else {  
       $name = input_data($_POST["lname"]);  
           
           if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {  
            $lnameErr = "Only alphabets and white space are allowed";  
           }  
   } 
      
 
    if (emptyempty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
         
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
 
    if (emptyempty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
            
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  

        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }        

}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
<?php get_footer();?>  