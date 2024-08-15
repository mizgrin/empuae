<?php 
  // Template Name: About page
  $about_page_id = 120;
  $team_title = CFS()->get('teams_section_title',  $about_page_id);
get_header();
get_template_part('template-parts/inner-banner');
get_template_part('template-parts/about-section');
 get_template_part('template-parts/howempwork');
?>
<section class="job-browse-section">
    <div class="container">
      <div class="job-mid-wrap">
        <div class="browse-job--right">
            <div class="section-title  wow animate__animated animate__fadeInDown">
                <h3>Browse jobs Now</h3>
                
            </div>
            <p>
                <?php echo CFS()->get('browse_job_text'); ?>
            </p>
           <a href="<?php echo esc_url(home_url('/listed-jobs/')); ?>" class="btn btn--primary">View all jobs</a>
        </div>
        <div class="browse-job--left">
        <?php get_template_part('template-parts/icons-meta-block'); ?>
        </div>
      </div>
       
    </div>
</section>
<section class="team-section">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeInDown">
            <h3><?php echo $team_title; ?></h3>
            
        </div>
        <div class="team-wrap">
          <div class="team-wrap--about team-slider wow animate__animated animate__fadeIn">
              <?php 
                  $args = array(
                      'post_type' => 'teams',
                      'posts_per_page' => -1,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'featured_teams', 
                              'field'    => 'slug',
                              'terms'    => 'featured_team_member',
                          ),
                      ),
                  );

                  $team = new WP_Query($args);
                  if ($team->have_posts()) : 
                    $team_counter = 1;
                      while ($team->have_posts()) : $team->the_post();
                          get_template_part('template-parts/loops/loop-team', '', array(
                            'team_count'=> $team_counter));
                          $team_counter ++;
                      endwhile; 
                  endif; 
                ?>
            
          </div>
          <a href="<?php echo esc_url(home_url('/teams/')); ?>" class="btn btn--primary btn--more btn--icon mx-auto my-4">
            <span>
              View all team
            </span>
            <div class="icon-holder">
              <i class="fas fa-long-arrow-alt-right"></i>
            </div>
         
          </a>
        </div>
    </div>
</section>
<?php  get_template_part('template-parts/partners'); ?>
<?php  get_template_part('template-parts/faq'); ?>

<?php get_footer(); ?>