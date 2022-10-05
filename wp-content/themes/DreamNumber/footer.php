<?php
$payment_icon = get_field('payment_icon', 'option');

?>


<!-- footer -->
<footer class="footer-main py-4">
        <div class="container">
            <div class="row align-items-center text-lg-left text-center">
                <div class="col-12 col-lg-4">
                    <p class="text-white m-0">Copyright © <?php echo date("Y");?>. All rights reserved</p>
                </div>
                <div class="col-12 col-lg-4">
                <?php if( have_rows('social_icons', 'option') ):?>
                    <ul class="list-inline m-lg-0 text-lg-center my-3">
                         <?php while( have_rows('social_icons', 'option') ): the_row(); 
                             $social_icons = get_sub_field('social_all_icons', 'option');?>
                            <li class="list-inline-item rounded-circle"><a href="<?php echo esc_url( $social_icons ); ?>" class="text-white">
                                <i class="<?php if($social_icons == 'facebook' ){
                                    echo 'lab la-facebook-f';
                                }
                                elseif($social_icons == 'twitter'){
                                    echo 'lab la-twitter';
                                }
                                elseif($social_icons == 'linkdln'){
                                    echo 'lab la-linkedin-in';
                                }
                                elseif($social_icons == 'instagram'){
                                    echo 'lab la-instagram';
                                }
                                ?>"
                                ></i></a>
                           </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif;?>
                </div>
                <div class="col-12 col-lg-4">
                     <?php
                 if($payment_icon)
                            { ?> 
                    <div class="payment-image float-lg-right">
                         <img src="<?php the_field('payment_icon', 'option'); ?>" class="img-fluid" />
                     </div><?php
                 }?>
                </div>
            </div>
        </div>
    </footer>
    <!-- end -->

    <?php wp_footer();?>


</body>
</html>
