<?php
$post_id = get_the_ID();
$job_types = get_the_terms($jobs->ID, 'jobs_type');
$job_cats = get_the_terms($jobs->ID, 'jobs_cat');
$jobs_countries = get_the_terms($jobs->ID, 'jobs_countries');
$salary = CFS()->get('salary', $jobs->ID);
$jobs_company_logo = CFS()->get('jobs_company_logo', $jobs->ID);
$job_provider_name = CFS()->get('jobs_company_name', $jobs->ID);
$job_location = CFS()->get('jobs_location', $jobs->ID);

$job_title = get_the_title($jobs->ID);
?>

<div class="job-item">
    <a href="<?php echo get_permalink($jobs->ID); ?>" class="screen-link"></a>
    <?php if (!empty($job_title)): ?>
        <h4><?php echo $job_title; ?></h4>
    <?php endif; ?>
    
    <div class="job-meta">
        <?php if (!empty($job_types)): ?>
            <div class="job-types">
                <?php foreach ($job_types as $job_type): ?>
                    <span><?php echo esc_html($job_type->name); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($job_cats)): ?>
            <div class="job-categories">
                <?php foreach ($job_cats as $job_cat): ?>
                    <span><?php echo esc_html($job_cat->name); ?></span> 
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!empty($salary)): ?>
        <div class="job-meta__salary">
            <span>Salary: <?php echo $salary; ?></span>
        </div>
    <?php endif; ?>
    
    <div class="job-details-bottom">
        <?php if (!empty($jobs_company_logo)): ?>
            <figure class="job-provider-logo">
                <img src="<?php echo esc_url($jobs_company_logo); ?>" alt="<?php echo esc_html(CFS()->get('jobs_company_name')); ?> logo">
            </figure>
        <?php endif; ?>
        
        <div class="job-provider-name">
            <?php if (!empty($job_provider_name)): ?>
                <h4><?php echo esc_html($job_provider_name); ?></h4>
            <?php endif; ?>
            
            <?php if (!empty($jobs_countries)): ?>
                <div class="job-location">
                    <div class="icon-holder">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 9.5625C10.2426 9.5625 11.25 8.55514 11.25 7.3125C11.25 6.06986 10.2426 5.0625 9 5.0625C7.75736 5.0625 6.75 6.06986 6.75 7.3125C6.75 8.55514 7.75736 9.5625 9 9.5625Z" stroke="#767F8C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.625 7.3125C14.625 12.375 9 16.3125 9 16.3125C9 16.3125 3.375 12.375 3.375 7.3125C3.375 5.82066 3.96763 4.38992 5.02252 3.33502C6.07742 2.28013 7.50816 1.6875 9 1.6875C10.4918 1.6875 11.9226 2.28013 12.9775 3.33502C14.0324 4.38992 14.625 5.82066 14.625 7.3125V7.3125Z" stroke="#767F8C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <?php foreach ($jobs_countries as $jobs_country): ?>
                        <span><?php echo esc_html($jobs_country->name); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>