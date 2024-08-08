<?php 
  // Template Name: Job_page
get_header();
?>
    <main id="primary" class="main page__inner">
      <?php get_template_part('template-parts/inner-banner'); ?>
      <div class="container">
      <button class="btn btn--secondary btn--icon btn--filter--responsive" id="filter-toggle-btn">
            <div class="icon-holder">
                <i class="fas fa-filter"></i>
            </div>
            <span>Open FIlter</span>
        </button>
        <div class="job-list-wrapper">
          <?php get_template_part('template-parts/sidebar-filter'); ?>
          <?php  get_template_part('template-parts/job-listing'); ?>
         
        </div>
      

      </div>
    </main>
<?php 
get_footer();
?>