<?php
  // Template Name:Home Page
get_header();
?>

<main id="primary" class="page__home">
<?php get_template_part('template-parts/banner'); ?>
<?php get_template_part('template-parts/icons-meta-block'); ?>
<?php get_template_part('template-parts/filter-jobs'); ?>
<?php get_template_part('template-parts/howempwork'); ?>
<?php //get_template_part('template-parts/job-listing'); ?>
<?php get_template_part('template-parts/featured-jobs'); ?>
<?php get_template_part('template-parts/about-section'); ?>
<section class="form-section">
  <div class="container">
    <div class="section-title section-title--with-description wow animate__animated animate__fadeInDown">
      <h3><?php echo CFS()->get('contact_form_title'); ?></h3>
    </div>
    <div class="form-wrap wow animate__animated animate__fadeInUp">
      <?php echo do_shortcode('[contact-form-7 id="66f491b" title="Queries form"]'); ?>
    </div>
  </div>
</section>
<?php
$args = array(
    'posts_per_page' => 3,
    'post_type'      => 'post'
);
$myposts = get_posts($args);
?>

<?php if (!empty($myposts)) : ?>
<section class="blog-section blog-section--listing">
    <div class="container">
      <div class="section-title">
        <h3>Our Latest blogs</h3>
      </div>
        <div class="blog-section__wrap">
            <div class="row">
                <?php foreach ($myposts as $post) : setup_postdata($post); ?>
                    <?php get_template_part('template-parts/loops/loop-blog'); ?>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/read-our-news/')); ?>" class="btn btn--primary btn--more btn--icon mx-auto my-4">
            <span>
              View all blogs
            </span>
            <div class="icon-holder">
              <i class="fas fa-long-arrow-alt-right"></i>
            </div>
         
          </a>
        </div>
    </div>
</section>

<?php endif; ?>
<section class="contact-meta-section wow animate__animated animate__fadeInUp">
  <div class="container">
      <div class="contact-meta__wrap">
        <div class="contact-meta-item">
          <div class="contact-meta-item__icon">
              <div class="icon-holder">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M34.0019 24.7322L26.3455 21.4509C26.0184 21.3115 25.6549 21.2822 25.3097 21.3672C24.9645 21.4523 24.6562 21.6472 24.4314 21.9226L21.0407 26.0653C15.7193 23.5563 11.4369 19.2738 8.92789 13.9525L13.0705 10.5618C13.3465 10.3373 13.5418 10.0291 13.6269 9.68372C13.712 9.33834 13.6823 8.97464 13.5422 8.64768L10.2609 0.991292C10.1072 0.638831 9.83529 0.351058 9.4921 0.177595C9.14892 0.0041325 8.75597 -0.0441476 8.381 0.0410801L1.27151 1.68173C0.909995 1.76521 0.587453 1.96877 0.356524 2.25916C0.125596 2.54956 -8.32775e-05 2.90966 4.14006e-08 3.28069C4.14006e-08 20.8152 14.2122 35 31.7193 35C32.0904 35.0002 32.4507 34.8746 32.7412 34.6437C33.0318 34.4127 33.2354 34.0901 33.3189 33.7285L34.9596 26.619C35.0443 26.2422 34.995 25.8477 34.8202 25.5033C34.6454 25.1589 34.356 24.8863 34.0019 24.7322Z" fill="white"/>
                </svg>
              </div>
          </div>
          <div class="contact-meta-item__bottom">
              <div class="contact-meta-item__title ">
                  <p>Call Us</p>
              </div>
              <div class="contact-meta-item__text">
                <ul class='list-unstyled'>
                  <li>
                    <a href="tel:<?php echo get_theme_mod('emp_number'); ?>"><?php echo get_theme_mod('emp_number'); ?></a>
                  </li>
                  <li>
                    <a href="tel:<?php echo get_theme_mod('emp_number2'); ?>"><?php echo get_theme_mod('emp_number2'); ?></a>
                  </li>
                  <li>
                    <a href="mailto:<?php echo get_theme_mod('emp_mail'); ?>"><?php echo get_theme_mod('emp_mail'); ?></a>
                  </li>
                </ul>
              </div>
          </div>
        </div>
        <div class="contact-meta-item">
          <div class="contact-meta-item__icon">
              <div class="icon-holder">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M34.5242 30.26L27.7081 23.4452C27.4005 23.1376 26.9835 22.9667 26.546 22.9667H25.4317C27.3185 20.5536 28.4396 17.5191 28.4396 14.2174C28.4396 6.36357 22.0746 0 14.2201 0C6.36563 0 0 6.36357 0 14.2174C0 22.0712 6.36494 28.4348 14.2201 28.4348C17.5219 28.4348 20.5577 27.3137 22.9708 25.427V26.5412C22.9708 26.9787 23.1417 27.3957 23.4493 27.7033L30.2654 34.5181C30.908 35.1606 31.9471 35.1606 32.5828 34.5181L34.5174 32.5835C35.16 31.9409 35.16 30.9025 34.5242 30.26ZM14.2201 24.0598C8.78281 24.0598 4.37637 19.6615 4.37637 14.2174C4.37637 8.78076 8.77529 4.375 14.2201 4.375C19.6574 4.375 24.0639 8.77324 24.0639 14.2174C24.0639 19.654 19.6649 24.0598 14.2201 24.0598ZM14.2215 7.65625C11.4338 7.65625 9.17383 9.91553 9.17383 12.7032C9.17383 14.9563 12.4729 19.0641 13.7368 20.555C13.7961 20.6259 13.8702 20.683 13.954 20.7221C14.0377 20.7613 14.129 20.7816 14.2215 20.7816C14.3139 20.7816 14.4052 20.7613 14.489 20.7221C14.5727 20.683 14.6469 20.6259 14.7062 20.555C15.9701 19.0641 19.2691 14.957 19.2691 12.7032C19.2691 9.91553 17.0092 7.65625 14.2215 7.65625ZM14.2215 14.2188C13.315 14.2188 12.5809 13.4839 12.5809 12.5781C12.5809 11.6717 13.3157 10.9375 14.2215 10.9375C15.1272 10.9375 15.8621 11.6717 15.8621 12.5781C15.8621 13.4839 15.1272 14.2188 14.2215 14.2188Z" fill="white"/>
                </svg>
              </div>
          </div>
          <div class="contact-meta-item__bottom">
              <div class="contact-meta-item__title">
                  <p>Locate us</p>
              </div>
              <div class="contact-meta-item__text">
                <ul class='list-unstyled'>
                  <li>
                    <a href=""><?php echo get_theme_mod('emp_address'); ?></a>
                  </li>
                </ul> 
              </div>
          </div>
        </div>
    </div>
</section>
<?php
  get_footer();
?>
   