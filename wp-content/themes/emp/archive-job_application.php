<?php get_header(); ?>

<div class="container">
    <h1>Job Applications</h1>
    <div class="job-applications-list">
        <?php
        $args = array('post_type' => 'job_application', 'post_status' => 'publish');
        $job_applications = new WP_Query($args);
        if ($job_applications->have_posts()) :
            while ($job_applications->have_posts()) : $job_applications->the_post(); ?>
                <div class="job-application">
                    <h2><?php the_title(); ?></h2>
                    <p><strong>First Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'first_name', true)); ?></p>
                    <p><strong>Last Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'last_name', true)); ?></p>
                    <p><strong>Email:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'email', true)); ?></p>
                    <p><strong>Phone Number:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'phone_number', true)); ?></p>
                    <p><strong>Cover Letter:</strong> <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'cover_letter', true)); ?>" target="_blank">Download</a></p>
                    <p><strong>Resume:</strong> <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'resume', true)); ?>" target="_blank">Download</a></p>
                </div>
            <?php endwhile;
        else :
            echo '<p>No job applications found.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
