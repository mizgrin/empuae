<section class="section--bg filter-section">
    <div class="container">
        <div class="filter--wrap">
            <div class="section-title wow animate__animated animate__fadeInLeft">
                <h3><?php echo CFS()->get('search_title'); ?></h3>
                <p><?php echo CFS()->get('search_description'); ?></p>
            </div>
            <form action="<?php echo esc_url(get_permalink()); ?>/listed-jobs" method="GET" class="form-wrap form-wrap--filter wow animate__animated animate__fadeInRight">
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">
                <select name="job_type" class="form-control select2">
                    <option value="" selected disabled>Select job type</option>
                    <?php 
                    $terms = get_terms(array(
                        'taxonomy' => 'jobs_type',
                        'hide_empty' => false,
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></option>
                        <?php endforeach; 
                    endif;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <select name="job_country" class="form-control select2">
                    <option value="" selected disabled>Select a country</option>
                    <?php 
                    $terms = get_terms(array(
                        'taxonomy' => 'jobs_countries',
                        'hide_empty' => false,
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></option>
                        <?php endforeach; 
                    endif;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <select name="job_category" class="form-control select2">
                    <option value="" selected disabled>Select a job category</option>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'jobs_cat',
                        'hide_empty' => false,
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></option>
                        <?php endforeach; 
                    endif;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <input type="submit" class="btn btn--secondary wow animate__animated animate__bounceIn" value="Search">
        </div>
    </div>
</form>

        </div>
    </div>
</section>
