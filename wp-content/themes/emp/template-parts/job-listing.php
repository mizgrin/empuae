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

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'jobs',
    'post_status' => 'publish',
    'order' => 'DESC',
    's' => $search_query,
    'tax_query' => count($tax_query) > 1 ? $tax_query : '',
    'meta_query' => count($meta_query) > 1 ? $meta_query : '',
);

$myposts = get_posts($args);
?>

<section class="jobs-section">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeInDown">
            <h3><?php echo esc_html($section_title); ?></h3>
        </div>
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
        <div class="jobs-wrap jobs-wrap--featured wow animate__animated animate__fadeInUp">
            <?php
            foreach ($myposts as $jobs) : setup_postdata($jobs);
                // Include the template part for the loop content
                $template_path = locate_template('template-parts/loops/loop-jobs.php');
                if ($template_path) {
                    include($template_path);
                }
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
