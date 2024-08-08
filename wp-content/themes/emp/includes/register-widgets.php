<?php

if ( ! function_exists( 'emp_register_widget' ) ) {
    /**
     * Hook for widgets registration.
     *
     * @return void
     */
    function emp_register_widget()
    {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer First Column', 'emp' ),
                'id'            => 'footer-1-column',
                'description'   => esc_html__( 'About Column.', 'emp' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
                'class'=>''
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer second Column', 'emp' ),
                'id'            => 'footer-2-column',
                'description'   => esc_html__( 'Information Column.', 'emp' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<div class="footer-title"><h3>',
                'after_title'   => '</h3></div>',
                'class'=>''
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer third Column', 'emp' ),
                'id'            => 'footer-3-column',
                'description'   => esc_html__( 'Experience Column.', 'emp' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<div class="footer-title"><h3>',
                'after_title'   => '</h3></div>',
                'class'=>''
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer fourth Column', 'emp' ),
                'id'            => 'footer-4-column',
                'description'   => esc_html__( 'Contact Column.', 'emp' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<div class="footer-title"><h3>',
                'after_title'   => '</h3></div>',
                'class'=>''
            )
        );

        register_widget( 'AtWidgetContactUs' );
        

    }
    add_action('widgets_init', 'emp_register_widget');

}
class ThemeDefaults {
// End of registration of widgets
public static function add_custom_menu_items($items, $args) {
    if ($args->theme_location == 'primary-navigation') {
      

        $destinations = get_terms( array(
            'taxonomy' => 'destination',
            'hide_empty' => true
        ) );
        // First Menu Item - Destinations
        if(!empty($destinations)) {
            $packages_item = '<li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children custom-mega-menu"><a href="'.$destinationMainLink.'">'.$destinationMainTitle.'</a>';
            $packages_submenu = '<ul class="sub-menu">';
            foreach ($destinations as $destination) {
                $packages_submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-has-children triple-sub"><a href="/destination/' . $destination->slug . '">' . $destination->name . '</a>';

                $trip_ids = get_posts(array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'destination',
                            'field' => 'term_id',
                            'terms' => $destination->term_id,
                        ),
                    ),
                ));
                if ($trip_ids) {
                    $activities = wp_get_object_terms($trip_ids, 'activity');
                    if(!empty($activities)) {
                        $packages_submenu .= '<ul class="sub-menu">';
                        foreach ($activities as $activity) {

                            $trip_ids_regions = get_posts(array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'fields' => 'ids',
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'destination',
                                        'field' => 'term_id',
                                        'terms' => $destination->term_id,
                                    ),
                                    array(
                                        'taxonomy' => 'activity',
                                        'field' => 'term_id',
                                        'terms' => $activity->term_id,
                                    ),
                                ),
                            ));
                            if($trip_ids_regions && !empty(wp_get_object_terms($trip_ids_regions, 'region'))) {
                                $desClass = ' ';
                            } else {
                                $desClass = ' two-col';
                            }

                            $packages_submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-has-children'.$desClass.'"><a href="/activity/' . $activity->slug . '/?dest=' . $destination->slug . '">' . $activity->name . '</a>';
                            if($trip_ids_regions) {
                                $regionsMenus = wp_get_object_terms($trip_ids_regions, 'region');
                                if(!empty($regionsMenus)) {
                                    $packages_submenu .= '<ul class="sub-menu">';
                                    foreach ($regionsMenus as $regionsMenu) {
                                        $packages_submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-has-children"><a href="/region/' . $regionsMenu->slug . '/?dest=' . $destination->slug . '&act=' . $activity->slug . '">' . $regionsMenu->name . '</a>';
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                array(
                                                    'taxonomy' => 'destination',
                                                    'field' => 'term_id',
                                                    'terms' => $destination->term_id,
                                                ),
                                                array(
                                                    'taxonomy' => 'activity',
                                                    'field' => 'term_id',
                                                    'terms' => $activity->term_id,
                                                ),
                                                array(
                                                    'taxonomy' => 'region',
                                                    'field' => 'term_id',
                                                    'terms' => $regionsMenu->term_id,
                                                ),
                                            ),
                                        );
                                        $trips = new \WP_Query($args);
                                        if ($trips->have_posts()) {
                                            $packages_submenu .= '<ul class="sub-menu">';
                                            while ($trips->have_posts()) {
                                                $trips->the_post();
                                                $packages_submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-product"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                                                $packages_submenu .= '</li>';
                                            }
                                            wp_reset_postdata();
                                            $packages_submenu .= '</ul>';
                                        }

                                        $packages_submenu .= '</li>';
                                    }
                                    $packages_submenu .= '</ul>';
                                } else {
                                    $args = array(
                                        'post_type' => 'product',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'destination',
                                                'field' => 'term_id',
                                                'terms' => $destination->term_id,
                                            ),
                                            array(
                                                'taxonomy' => 'activity',
                                                'field' => 'term_id',
                                                'terms' => $activity->term_id,
                                            ),
                                        ),
                                    );
                                    $trips = new \WP_Query($args);
                                    if ($trips->have_posts()) {
                                        $packages_submenu .= '<ul class="sub-menu">';
                                        while ($trips->have_posts()) {
                                            $trips->the_post();
                                            $packages_submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-product"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                                            $packages_submenu .= '</li>';
                                        }
                                        wp_reset_postdata();
                                        $packages_submenu .= '</ul>';
                                    }
                                }
                            }
                            //wp_reset_query();
                            $packages_submenu .= '</li>';
                        }
                        $packages_submenu .= '</ul>';
                    }
                } //wp_reset_query();
                $packages_submenu .= '</li>';
            }
            $packages_submenu .= '</ul></li>';
        }

        //Second Menu Item - Activities
        $activitiesMenus = get_terms( array(
            'taxonomy' => 'activity',
            'hide_empty' => true
        ) );
        if(!empty($activitiesMenus)) {
            $packages_item2 = '<li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children custom-mega-menu custom-mega-menu-seocondary"><a href="'.$activityMainLink.'">'.$activityMainTitle.'</a>';
            $packages_submenu2 = '<ul class="sub-menu">';
            foreach ($activitiesMenus as $activitiesMenu) {
                $trip_ids2 = get_posts(array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'activity',
                            'field' => 'term_id',
                            'terms' => $activitiesMenu->term_id,
                        ),
                    ),
                ));
                if($trip_ids2 && !empty(wp_get_object_terms($trip_ids2, 'region'))) {
                    $accClass = ' triple-sub';
                } else {
                    $accClass = ' two-col';
                }
                $packages_submenu2 .= '<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-has-children'.$accClass.'"><a href="/activity/' . $activitiesMenu->slug . '">' . $activitiesMenu->name . '</a>';
                if ($trip_ids2) {
                    $regions = wp_get_object_terms($trip_ids2, 'region');
                    if(!empty($regions)) {
                        $packages_submenu2 .= '<ul class="sub-menu">';
                        foreach ($regions as $region) {
                            $packages_submenu2 .= '<li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-has-children"><a href="/region/' . $region->slug . '/?act=' . $activitiesMenu->slug . '">' . $region->name . '</a>';

                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'activity',
                                        'field' => 'term_id',
                                        'terms' => $activitiesMenu->term_id,
                                    ),
                                    array(
                                        'taxonomy' => 'region',
                                        'field' => 'term_id',
                                        'terms' => $region->term_id,
                                    ),
                                ),
                            );
                            $trips = new \WP_Query($args);
                            if ($trips->have_posts()) {
                                $packages_submenu2 .= '<ul class="sub-menu">';
                                while ($trips->have_posts()) {
                                    $trips->the_post();
                                    $packages_submenu2 .= '<li class="menu-item menu-item-type-post_type menu-item-object-product"><a href="'.get_the_permalink().'">' . get_the_title() . '</a>';
                                    $packages_submenu2 .= '</li>';
                                } wp_reset_postdata();
                                $packages_submenu2 .= '</ul>';
                            }
                            $packages_submenu2 .= '</li>';
                        }
                        $packages_submenu2 .= '</ul>';
                    } else {
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'activity',
                                    'field' => 'term_id',
                                    'terms' => $activitiesMenu->term_id,
                                ),
                            ),
                        );
                        $trips = new \WP_Query($args);
                        if ($trips->have_posts()) {
                            $packages_submenu2 .= '<ul class="sub-menu">';
                            while ($trips->have_posts()) {
                                $trips->the_post();
                                $packages_submenu2 .= '<li class="menu-item menu-item-type-post_type menu-item-object-product"><a href="'.get_the_permalink().'">' . get_the_title() . '</a>';
                                $packages_submenu2 .= '</li>';
                            } wp_reset_postdata();
                            $packages_submenu2 .= '</ul>';
                        }
                    }
                } //wp_reset_query();
                $packages_submenu2 .= '</li>';
            }
            $packages_submenu2 .= '</ul></li>';
        }

        //$items = $packages_item . $packages_submenu . $items;
        $itemsDestinations = $packages_item . $packages_submenu;
        $itemsActivity = $packages_item2 . $packages_submenu2;
        $items = $itemsDestinations . $itemsActivity . $items;
    }
    return $items;
}
}
?>