<?php
/**
 * Template Name: Thank You
 */
$first_name = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : 'Applicant';
$job_name = isset($_GET['job']) ? sanitize_text_field($_GET['job']) : 'the position';
$company_name = isset($_GET['company']) ? sanitize_text_field($_GET['company']) : 'Company Name';
get_header();
?>
<section class="thank-you-container">
    <div class="container">
        <div class="thank-container__wrap">
            <h1>Thank You for Your Application!</h1>
            <p>Dear <?php echo esc_html($first_name); ?>,</p>
            <p>Thank you for applying for the <span class="job-name"><?php echo esc_html($job_name); ?></span> position at <span class="company-name"><?php echo esc_html($company_name); ?></span>. We have received your application and our team will review it shortly.</p>
            <p>We appreciate your interest in joining our company and will get back to you within the next few days. If your qualifications meet our needs, we will contact you to discuss the next steps in the hiring process.</p>
            <p>If you have any questions in the meantime, please do not hesitate to <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" target="_blank"><strong>contact us</strong></a>  .</p>
            <p>Best regards,<br><?php echo esc_html($company_name); ?> Recruitment Team</p>
            <div class="button-wrap d-flex gap-5">
                <a href="/" class="btn btn--primary">Back to Home</a>
                <a href="<?php echo esc_url(home_url('/listed-jobs/')); ?>" class="btn btn--secondary">Browse jobs</a>
            </div>
        
        </div>
    </div>
</section>
  
<?php
get_footer();
?>