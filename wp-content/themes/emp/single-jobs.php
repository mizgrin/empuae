<?php
get_header();
$post_id = get_the_ID(); // Get the current post ID
$jobs_company_logo__details = CFS()->get('jobs_company_logo', $post_id);
$job_provider_name = CFS()->get('jobs_company_name', $post_id);

// Taxonomy
$job_salary_details = CFS()->get('salary', $post_id);
$jobs_company_logo = CFS()->get('jobs_company_logo', $post_id);
$job_location = get_the_terms($post_id, 'jobs_countries');
$job_notes = CFS()->get('job_notes', $post_id);
if ($job_location && !is_wp_error($job_location)) {
    foreach ($job_location as $term) {
        $job_country = $term->name; // Output the term name
        $job_country_slug = $term->slug;
    }
}
$jobs_type_details = get_the_terms($post_id, 'jobs_type');
if($jobs_type_details && !is_wp_error($jobs_type_details)){
    foreach($jobs_type_details as $term){
        $jobs_type_name = $term->name;
        $jobs_type_slug = $term->slug;
    }
}
$jobs_catagories = get_the_terms($post_id, 'jobs_cat');
if($jobs_catagories && !is_wp_error($jobs_catagories)){
    foreach($jobs_catagories as $term){
        $jobs_catagories_name = $term->name;
        $job_cat_slug = $term->slug;
    }
}
$job_expiration = CFS()->get('job_expiration', $post_id);
if($job_expiration){
    $date = new DateTime($job_expiration);
    $formattedDate = $date->format('F j, Y');         
}
?>

<div class="container">
    <div class="row">
        <section class="job-detail-wrap">
            <div class="job-detail-wrap__title-wrap">
                <div class="job-title--top">
                    <div class="job-title-wrap-left">
                        <?php if (!empty($jobs_company_logo)): ?>
                        <div class="logo-holder">
                            <img src="<?php echo esc_url($jobs_company_logo); ?>" alt="logo">
                        </div>
                        <?php endif; ?>
                        <div class="job-title-wrapper">
                            <h1 class="job-title">
                                <?php the_title(); ?>
                            </h1>
                            <div class="job-meta-bottom">
                                <ul class='list-unstyled'>
                                    <?php if(!empty($job_country)): ?>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo esc_html($job_country); ?>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($jobs_type_name)): ?>
                                    <li>
                                        <i class="fas fa-briefcase"></i>
                                        <?php echo esc_html($jobs_type_name); ?>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn--primary btn--icon" data-bs-toggle="modal" data-bs-target="#jobModal-<?php the_ID(); ?>">
                        <div class="icon-holder">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <span>Apply for this job</span>
                    </button>
                </div>
                <div class="modal modal--job-application fade" id="jobModal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="jobLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="job-form-wrap">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-job-description">
                                                <div class="logo-wrap">
                                                    <figure>
                                                        <img src="<?php echo esc_url($jobs_company_logo); ?>" alt="<?php echo esc_attr($job_provider_name); ?>-logo">
                                                    </figure>
                                                </div>
                                                <div class="left-job-description__content">                                           
                                                    <h3 class="modal-title" id="jobLabel">Apply for <strong> <?php the_title(); ?> </strong></h3>
                                                    <?php if (!empty($job_provider_name)): ?>
                                                        <div class="left-job-description__content__wrap">
                                                            <div class="icon-holder">
                                                                <i class="fas fa-briefcase"></i>
                                                            </div>
                                                            <h5><?php echo esc_html($job_provider_name); ?></h5>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($job_country)): ?>
                                                        <div class="left-job-description__content__wrap">
                                                            <div class="icon-holder">
                                                                <i class="fas fa-globe"></i>
                                                            </div>
                                                            <h5><?php echo esc_html($job_country); ?></h5>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="job-apply-form-wrap">
                                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data" id="jobs_form">
                                                    <div class="row">
                                                        <h4>Basic Information</h4>
                                                        <input type="hidden" name="action" value="submit_job_application">
                                                        <input type="text" name="jobs_name" value="<?php echo esc_attr(get_the_title()); ?>" hidden readonly>
                                                        <input type="number" name="jobs_id" value="<?php echo esc_attr(get_the_ID()); ?>" hidden readonly>
                                                        <input type="text" name="job_provider_name" value="<?php echo esc_attr($job_provider_name); ?>" hidden readonly>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="FirstName" class="form-control" placeholder="First Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="LastName" class="form-control" placeholder="Last Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="email" name="Email" class="form-control" placeholder="Your Email" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="tel" name="phoneNumber" class="form-control" placeholder="Your Phone Number" required>
                                                            </div>
                                                        </div>
                                                        <h4>Documents</h4>
                                                        <div class="form-group">
                                                            <label>Cover Letter</label>
                                                            <input type="file" name="Coverletter" class="form-control" accept=".pdf,.txt,.doc,.docx" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Your Resume</label>
                                                            <input type="file" name="YourResume" class="form-control" accept=".pdf" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <button type="submit" class="btn btn--primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="job-content-wrap">
                        <div class="job--description job-entry-content">
                            <h3>About the job</h3>
                            <?php the_content(); ?>
                        </div>
                        <?php if(!empty(CFS()->get('job_qualification'))): ?>
                            <div class="job--qualification job-entry-content">
                                <h3>Qualification</h3>
                                <?php echo esc_html(CFS()->get('job_qualification')); ?>
                            </div>
                        <?php endif;
                            $extraJobContent = CFS()->get('extra_job_details');
                            if(!empty($extraJobContent)):
                            foreach($extraJobContent as $extracontent): ?>
                                <div class="job--qualification job-entry-content job--qualification">
                                    <h3><?php echo esc_html($extracontent['extra_job_details_title']); ?></h3>
                                    <?php echo wp_kses_post($extracontent['extra_jobs_description']); ?>
                                </div>
                            <?php endforeach;
                            endif;
                        ?>
                        <?php if(!empty($job_notes)): ?>
                            <div class="job--notes job-entry-content">
                                <h4 class='mb-2'>Notes</h4>
                                <em> " <?php echo wp_kses_post($job_notes); ?> "</em>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class='sidebar-title'>Job Brief</h3>
                    <div class="jobs-meta-right">
                      <?php if (!empty($job_country)||!empty($formattedDate)||!empty($job_salary_details)): ?>
                        <ul class='list-unstyled'>
                            <?php if(!empty($job_country)) :?>
                            <li>
                                <strong>Location</strong>
                                <span><?php echo esc_html($job_country); ?></span>
                            </li>
                            <?php endif; ?>
                            <li>
                                <strong>Job posted</strong>
                                <span><?php echo get_the_date(); ?></span>
                            </li>
                            <?php if(!empty($formattedDate)) :?>
                            <li>
                                <strong>Job expires at</strong>
                                <span><?php echo esc_html($formattedDate); ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if(!empty($job_salary_details)) :?>
                            <li>
                                <strong>Salary</strong>
                                <span><?php echo esc_html($job_salary_details); ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                        <div class="job-cat-meta-right-wrap">
                            <h4>Job category</h4>
                            <div class="job-meta-sidebar-bottom">
                                <?php if(!empty($jobs_catagories)):
                                 foreach($jobs_catagories as $term): ?>
                                    <span><?php echo esc_html($term->name); ?></span>
                                <?php endforeach;
                                endif;
                                ?>
                                <span><?php echo esc_html($jobs_type_name); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php  if (!empty($job_location) && !empty($jobs_type_details) && !empty($jobs_catagories) && !is_wp_error($job_location) && !is_wp_error($jobs_type_details) && !is_wp_error($jobs_catagories)) { ?>
        <section class="related-jobs">
            <div class="container">
            <div class="section-title wow animate__animated animate__fadeInDown">
                    <h3><?php echo esc_html('Related jobs'); ?></h3>
                </div>
                <div class="jobs-wrap jobs-wrap--featured wow animate__animated animate__fadeInUp">
                    <?php 
                // Prepare the query arguments
                $args = array(
                    'post_type' => 'jobs',
                    'posts_per_page' => 3, // Number of related jobs to display
                    'post__not_in' => array($post_id), // Exclude the current job
                    'tax_query' => array(
                        'relation' => 'AND', // Ensure all conditions are met
                        array(
                            'relation' => 'OR', // Match any of the following terms
                            array(
                                'taxonomy' => 'jobs_countries',
                                'field'    => 'slug',
                                'terms'    => $job_country_slug,
                            ),
                            array(
                                'taxonomy' => 'jobs_type',
                                'field'    => 'slug',
                                'terms'    => $jobs_type_slug,
                            ),
                            array(
                                'taxonomy' => 'jobs_cat',
                                'field'    => 'slug',
                                'terms'    => $job_cat_slug,
                            ),
                        ),
                    ),
                );
            
                // Execute the query
                $related_jobs_query = new WP_Query($args);
            
                // Store the posts in a variable
                $myposts = $related_jobs_query->posts;
                if (!empty($myposts)) {
                    foreach ($myposts as $jobs) {
                        setup_postdata($jobs);
                        $template_path = locate_template('template-parts/loops/loop-jobs.php');
                        if ($template_path) {
                            include($template_path);
                        }
                    }
                    // Restore original post data
                    wp_reset_postdata();
                }
           ?>
                </div>
            </div>
        </section>
<?php
    }
            
    ?>
    </div>
</div>
<?php
get_footer();
?>
