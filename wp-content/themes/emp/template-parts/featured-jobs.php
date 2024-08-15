<?php 
$front_page_id = get_option('page_on_front');
  if (is_front_page()) {
    $title = CFS()->get('featured_jobs_title', $front_page_id);
    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'jobs',
        'post_status' => 'publish',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => '_featured',
                'value' => '1',
                'compare' => '='
            )
        )
    );
  } else {
    $title = 'All Jobs';
    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'jobs',
        'post_status' => 'publish',
        'order' => 'DESC'
    );
  }
  $myposts = get_posts($args);
  if($myposts):
?>
<section class="jobs-section">
    <div class="container">
        <div class="section-title">
            <h3><?php echo esc_html($title); ?></h3>
        </div>
        <div class="jobs-wrap jobs-wrap--featured">
         
                <?php
                 
                    
                    foreach ($myposts as $jobs) : setup_postdata($jobs);
                    // Include the template part for the loop content
                    $template_path = locate_template('template-parts/loops/loop-jobs.php');
                    if ($template_path) {
                        include($template_path);
                    }
                endforeach;
                ?>  
            
        </div>
        <a href="<?php echo esc_url(home_url('/isted-jobs/')); ?>" class="btn btn--primary btn--more btn--icon mx-auto my-4">
            <span>
              View all Jobs
            </span>
            <div class="icon-holder">
              <i class="fas fa-long-arrow-alt-right"></i>
            </div>
         
          </a>
    </div>
</section>

<?php endif; ?>
