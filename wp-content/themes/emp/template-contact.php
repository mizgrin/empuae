<?php 
  // Template Name: Contact page
  $front_page_id = get_option('page_on_front');
  get_header();
  get_template_part('template-parts/inner-banner');
  ?>
       <section class="contact-section inner-contact-section clearfix wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="contact-address-wrapper clearfix">
                        <div class="section-content">
                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="contact-left section--bg">
                                        <div class="section-title">
                                            <h3>Get in touch</h3>
                                        </div>
                                        <div class="address-wrapper">
                                            <ul class="address-list list-unstyled">
                                                <li class="address">
                                                    <div class="icon-holder">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </div>
                                                <span> <?php echo get_theme_mod('emp_address'); ?></span>
                                                </li>
                                                <li class="phone">
                                                    <div class="icon-holder">
                                                        <i class="fas fa-phone-alt"></i>
                                                    </div>
                                                    <span>
                                                        <?php echo get_theme_mod('emp_number'); ?> , <?php echo get_theme_mod('emp_number2'); ?>
                                                    </span>
                                                </li>
                                                <li class="mail">
                                                    <div class="icon-holder">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <span>
                                                        <?php echo get_theme_mod('emp_mail'); ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="emp__social-icons">
                                            <ul class="list-unstyled">
                                                <?php if(!empty(get_theme_mod('emp_social_media_icon1'))): ?>
                                                <li>
                                                    <a href="<?php echo get_theme_mod('emp_social_media_icon1'); ?>">
                                                        <div class="icon-holder">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if(!empty(get_theme_mod('emp_social_media_icon2'))): ?>
                                                <li>
                                                    <a href="<?php echo get_theme_mod('emp_social_media_icon2'); ?>">
                                                        <div class="icon-holder">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <li>
                                                    <a href="<?php echo get_theme_mod('emp_social_media_icon3'); ?>">
                                                        <div class="icon-holder">
                                                            <i class="fab fa-twitter"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo get_theme_mod('emp_social_media_icon3'); ?>">
                                                        <div class="icon-holder">
                                                            <i class="fab fa-instagram"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li><a href="mailto:<?php echo get_theme_mod('emp_mail'); ?>" class="mail-icon"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="contact-right form-section">
                                        <div class="section-title">
                                            <h3><?php echo CFS()->get('contact_form_title', $front_page_id); ?></h3>
                                        </div>
                                        <div class="form-wrap">
                                        <?php echo do_shortcode('[contact-form-7 id="66f491b" title="Queries form"]'); ?>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                
                    
                </div>
            </section>
            <section class="contact-map-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-content">
                                <div class="section-title">
                                    <h3>Locate us</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-map-wrapper">
                                        <?php echo get_theme_mod('emp_map') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        <?php get_footer(); ?>