<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?></title>
    <meta name="description" content="EMPTEAM is a leading job portal in the UAE where users can explore job opportunities and apply directly to their desired positions.">
    <meta name="keywords" content="job portal, job search, UAE jobs, apply for jobs, EMPTEAM, career opportunities, job listings">
    <meta name="author" content="EMPTEAM">
    <meta property="og:title" content="EMPTEAM - Your Trusted Job Portal">
    <meta property="og:description" content="Discover the latest job opportunities in the UAE and apply directly on EMPTEAM. Start your career journey with us.">
    <meta property="og:url" content="https://www.empteam.ae">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.empteam.ae/og-image.jpg"> <!-- Replace with your actual image URL -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="EMPTEAM - Your Trusted Job Portal">
    <meta name="twitter:description" content="Explore job opportunities and apply directly on EMPTEAM, the UAE's leading job portal.">
    <meta name="twitter:url" content="https://www.empteam.ae">
    <meta name="twitter:image" content="https://www.empteam.ae/twitter-image.jpg"> <!-- Replace with your actual image URL -->
    <link rel="canonical" href="https://www.empteam.ae">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <header class="page-header emp__head" id="header">
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="top-header__left">
                                <ul class="list-unstyled">
                                    <?php if(!empty(get_theme_mod('emp_mail'))): ?>
                                    <li>
                                        <a href="mailto:<?php echo get_theme_mod('emp_mail'); ?>">
                                            <div class="icon-holder">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <span><?php echo get_theme_mod('emp_mail'); ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty(get_theme_mod('emp_number'))): ?>
                                    <li>
                                        <a href="tel:<?php echo get_theme_mod('emp_number'); ?>">
                                            <div class="icon-holder">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <span><?php echo get_theme_mod('emp_number'); ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
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
                                </ul>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-6">
                            <div class="site-branding">
                                <a href="<?php echo get_home_url(); ?>">
                                    <div class="emp__logo-holder">
                                        <img src="<?php echo get_theme_mod('emp_logo'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?> logo">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-6">
                            <div class="emp__mobile-menu">
                                <div class="burger-menu" id="burgerMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <nav class="navbar navbar-expanded" id="nav-menu-container">
                            <div class="site-branding site-branding--responsive">
                                <a href="<?php echo get_home_url(); ?>">
                                    <div class="emp__logo-holder">
                                        <img src="<?php echo get_theme_mod('emp_logo'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?> logo">
                                    </div>
                                </a>
                            </div>
                                <div class="emp__main-navigation main-navigation">
                                    <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary-menu',
                                            'container' => false,
                                            'menu_class' => 'menu nav-menu clearfix list-unstyled',
                                            'menu_id' => 'primary-menu',
                                            'echo' => true,
                                            'before' => '',
                                            'after' => '',
                                            'depth' => 0,
                                        ));
                                    ?>
                                </div>
                                <form action="" class="search-form search-form--responsive" id="search-form">
                                                <div class="form-group">
                                                    <input type="search" class="form-control" name="search" id="search" placeholder="Search...">
                                                    <button type="submit" class="btn btn--primary btn--search">
                                                        <div class="icon-holder">
                                                            <i class="fas fa-search"></i>
                                                        </div>
                                                    </button>
                                                </div>
                                            </form>
                            </nav>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn--search" data-bs-toggle="modal" data-bs-target="#searchModal">
                                <div class="icon-holder">
                                    <i class="fas fa-search"></i>
                                </div>
                            </button>
                            <div class="modal search-modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="" class="search-form" id="search-form">
                                                <div class="form-group">
                                                    <input type="search" class="form-control" name="search" id="search" placeholder="Search...">
                                                    <button type="submit" class="btn btn--primary btn--search">
                                                        <div class="icon-holder">
                                                            <i class="fas fa-search"></i>
                                                        </div>
                                                    </button>
                                                </div>
                                            </form>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

  
