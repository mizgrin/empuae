<aside class='sidebar-wrap sidebar-wrap--filter'>
    <div class="btn--close btn--icon" id="btn-close-filter">
        <i class="fas fa-times"></i>
    </div>
    <div class="filter-wrapper">
        <div class="filter-group">
            <div class="filter-group__content">
                <form action="<?php echo esc_url( get_permalink() ); ?>" method="GET" id="filter-form">
                    <p><em> Select parameters and click "Filter" for search</em></p>
                    <div class="form-group mb-4">
                        <input type="submit" value="Filter" class="btn btn--secondary">
                    </div>
                    <div class="filter-group__main">
                        <div class="filter-group__title">
                            <h3>Type of jobs</h3>
                        </div>
                        <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'jobs_type',
                                'hide_empty' => false,
                            ) );

                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                                foreach ( $terms as $term ) : ?>
                                    <div class="form-group">
                                        <input type="checkbox" id="job_type_<?php echo esc_attr( $term->term_id ); ?>" name="job_type[]" value="<?php echo esc_attr( $term->slug ); ?>">
                                        <label for="job_type_<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></label>
                                    </div>
                                <?php endforeach; 
                            endif;
                        ?>
                    </div>
                    <div class="filter-group__main">
                        <div class="filter-group__title">
                            <h3>Jobs Location</h3>
                        </div>
                        <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'jobs_countries',
                                'hide_empty' => false,
                            ) );

                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                                foreach ( $terms as $term ) : ?>
                                    <div class="form-group">
                                        <input type="checkbox" id="job_country_<?php echo esc_attr( $term->term_id ); ?>" name="job_country[]" value="<?php echo esc_attr( $term->slug ); ?>">
                                        <label for="job_country_<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></label>
                                    </div>
                                <?php endforeach; 
                            endif;
                        ?>
                    </div>
                    <div class="filter-group__main">
                        <div class="filter-group__title">
                            <h3>Jobs Category</h3>
                        </div>
                        <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'jobs_cat',
                                'hide_empty' => false,
                            ) );

                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                                foreach ( $terms as $term ) : ?>
                                    <div class="form-group">
                                        <input type="checkbox" id="job_cat_<?php echo esc_attr( $term->term_id ); ?>" name="job_cat[]" value="<?php echo esc_attr( $term->slug ); ?>">
                                        <label for="job_cat_<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></label>
                                    </div>
                                <?php endforeach; 
                            endif;
                        ?>
                    </div>
                
                </form>

            </div>
        </div>
    </div>
</aside>