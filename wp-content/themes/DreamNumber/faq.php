<?php
/*
Template Name: FAQ
*/
?>
<!-- FAQ Block start-->
<section class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <h2 class="main-heading position-relative text-center" data-watermark="FAQ">
                        <span class="heading-inner">Frequently Asked Questions</span>
                    </h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                </div>
            </div>
            <div class="faq-block mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                           <?php
                                query_posts('post_type=faq')
                            ?>
                               <?php if (have_posts()) : ?>    
                        <div class="accordion" id="accordionExample">
                                  <?php while (have_posts()) : the_post(); ?>   
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne"<?php the_id(); ?>>
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <?php the_title(); ?>
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                          <?php the_content(); ?>
                                    </div>
                                </div>
                               
                            </div>
                              <?php endwhile; ?> 
                        </div>
                             <?php endif; ?>
                     <?php wp_reset_query(); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Block end-->