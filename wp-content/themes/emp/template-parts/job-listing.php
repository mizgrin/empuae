<?php
$section_title = 'All Jobs';

$tax_query = array('relation' => 'AND');
$meta_query = array('relation' => 'AND');

if (!empty($_GET['job_type'])) {
    $tax_query[] = array(
        'taxonomy' => 'jobs_type',
        'field' => 'slug',
        'terms' => $_GET['job_type'],
    );
}

if (!empty($_GET['job_country'])) {
    $tax_query[] = array(
        'taxonomy' => 'jobs_countries',
        'field' => 'slug',
        'terms' => $_GET['job_country'],
    );
}

if (!empty($_GET['job_cat'])) {
    $tax_query[] = array(
        'taxonomy' => 'jobs_cat',
        'field' => 'slug',
        'terms' => $_GET['job_cat'],
    );
}

if (!empty($_GET['salary_range'])) {
    $meta_query[] = array(
        'key' => 'salary_range',
        'value' => $_GET['salary_range'],
        'compare' => 'IN',
    );
}

$search_query = '';
if (!empty($_GET['search'])) {
    $search_query = sanitize_text_field($_GET['search']);
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'posts_per_page' => 10,
    'post_type' => 'jobs',
    'post_status' => 'publish',
    'order' => 'DESC',
    's' => $search_query,
    'tax_query' => count($tax_query) > 1 ? $tax_query : '',
    'meta_query' => count($meta_query) > 1 ? $meta_query : '',
    'paged' => $paged,
);

$query = new WP_Query($args);
?>

<section class="jobs-section">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeInDown">
            <h3><?php echo esc_html($section_title); ?></h3>
        </div>
        <div class="row mb-5">
            <div class="col-lg-10">
                <?php if (!is_front_page()) : ?>
                    <form action="<?php echo esc_url(get_permalink()); ?>" method="GET" class="search-form search-form--innerpage" id="search-form">
                        <div class="form-group d-flex">
                            <input type="search" class="form-control" name="search" id="search" placeholder="Search...">
                            <button type="submit" class="btn btn--primary btn--search btn--text-icon">
                                <div class="icon-holder">
                                    <i class="fas fa-search"></i>
                                </div>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-lg-2">
                <div class="job-grid">
                    <div class="job-grid-button-group">
                        <button class='icon-btn active' id='gridBtn'>
                            <div class="icon-holder">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5" clip-path="url(#clip0_285_291)">
                                <path d="M9.5 4H5.5C4.94772 4 4.5 4.44772 4.5 5V9C4.5 9.55228 4.94772 10 5.5 10H9.5C10.0523 10 10.5 9.55228 10.5 9V5C10.5 4.44772 10.0523 4 9.5 4Z" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M19.5 4H15.5C14.9477 4 14.5 4.44772 14.5 5V9C14.5 9.55228 14.9477 10 15.5 10H19.5C20.0523 10 20.5 9.55228 20.5 9V5C20.5 4.44772 20.0523 4 19.5 4Z" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.5 14H5.5C4.94772 14 4.5 14.4477 4.5 15V19C4.5 19.5523 4.94772 20 5.5 20H9.5C10.0523 20 10.5 19.5523 10.5 19V15C10.5 14.4477 10.0523 14 9.5 14Z" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M19.5 14H15.5C14.9477 14 14.5 14.4477 14.5 15V19C14.5 19.5523 14.9477 20 15.5 20H19.5C20.0523 20 20.5 19.5523 20.5 19V15C20.5 14.4477 20.0523 14 19.5 14Z" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_285_291">
                                <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                                </clipPath>
                                </defs>
                                </svg>

                            </div>
                        </button>
                        <button  class='icon-btn' id='rowBtn'>
                            <div class="icon-holder">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_285_613)">
                                    <path d="M18.5 4H6.5C5.39543 4 4.5 4.89543 4.5 6V8C4.5 9.10457 5.39543 10 6.5 10H18.5C19.6046 10 20.5 9.10457 20.5 8V6C20.5 4.89543 19.6046 4 18.5 4Z" fill="none" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.5 14H6.5C5.39543 14 4.5 14.8954 4.5 16V18C4.5 19.1046 5.39543 20 6.5 20H18.5C19.6046 20 20.5 19.1046 20.5 18V16C20.5 14.8954 19.6046 14 18.5 14Z" fill="none" stroke="#515B6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_285_613">
                                    <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="jobs-wrap  wow animate__animated animate__fadeInUp">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $jobs = $post; // Assign the global $post object to $jobs

                    setup_postdata($jobs);
                    // Include the template part for the loop content
                    $template_path = locate_template('template-parts/loops/loop-jobs.php');
                    if ($template_path) {
                        include($template_path);
                    }
                endwhile;
            else :
                echo '<p>No jobs found.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination wow animate__animated animate__fadeInRight">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'show_all' => false,
                'end_size' => 1,
                'mid_size' => 2,
                'prev_next' => true,
                'prev_text' => __('« Prev'),
                'next_text' => __('Next »'),
                'type' => 'list',
            ));
            ?>
        </div>
    </div>
</section>
