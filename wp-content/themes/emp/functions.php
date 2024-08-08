<?php
// for-equeuing all assets



if (!function_exists('emp_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which 
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function emp_setup()
    {

        // Make theme available for translation.
        load_theme_textdomain('emp');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        /*
        * Switch default core markup to output valid HTML5.
        */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Enable support for footer widgets.
        add_theme_support('footer-widgets', 4);

        // Register nav menu locations.
        register_nav_menus(array(
            'primary-menu'  => esc_html__('Primary Menu', 'emp'),
             'footer-menu'   => esc_html__('Footer Menu', 'emp'),
        ));
   

    }
endif;
add_action('after_setup_theme', 'emp_setup');

add_filter( 'nav_menu_link_attributes', function($atts) {
    $atts['class'] = "nav-link";
    return $atts;
}, 100, 1 );

// include_once('includes/register-widgets.php');
include_once('includes/customizer.php');
// include_once('includes/admin/features-taxonomy-features_cat.php');



function custom_post_type_emp() {

    $labels = [
        "name" => __( "Jobs", "emp" ),
        "singular_name" => __( "Job", "emp" ),
        "add_new" => __( "Add New", "emp" ),
        "add_new_item" => __( "Add New Job", "emp" ),
        "edit_item" => __( "Edit Job", "emp" ),
        "new_item" => __( "New Job", "emp" ),
        "view_item" => __( "View Job", "emp" ),
        "view_items" => __( "View Jobs", "emp" ),
        "search_items" => __( "Search Jobs", "emp" ),
        "not_found" => __( "No jobs found", "emp" ),
        "not_found_in_trash" => __( "No jobs found in trash", "emp" ),
        "all_items" => __( "All Jobs", "emp" ),
        "archives" => __( "Job Archives", "emp" ),
        "insert_into_item" => __( "Insert into job", "emp" ),
        "uploaded_to_this_item" => __( "Uploaded to this job", "emp" ),
        "filter_items_list" => __( "Filter jobs list", "emp" ),
        "items_list_navigation" => __( "Jobs list navigation", "emp" ),
        "items_list" => __( "Jobs list", "emp" ),
    ];

    $args = [
        "label" => __( "Jobs", "emp" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => [ "slug" => "jobs", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 5,
        "supports" => [ "title","editor" ],
    ];

    register_post_type( "jobs", $args );

    // Teams posttype
    $labels = [
        "name" => __( "Teams", "emp" ),
        "singular_name" => __( "Team", "emp" ),
        "add_new" => __( "Add New", "emp" ),
        "add_new_item" => __( "Add New Team", "emp" ),
        "edit_item" => __( "Edit Team", "emp" ),
        "new_item" => __( "New Team", "emp" ),
        "view_item" => __( "View Team", "emp" ),
        "view_items" => __( "View Teams", "emp" ),
        "search_items" => __( "Search Teams", "emp" ),
        "not_found" => __( "No Teams found", "emp" ),
        "not_found_in_trash" => __( "No Teams found in trash", "emp" ),
        "all_items" => __( "All Teams", "emp" ),
        "archives" => __( "Team Archives", "emp" ),
        "insert_into_item" => __( "Insert into Team", "emp" ),
        "uploaded_to_this_item" => __( "Uploaded to this Team", "emp" ),
        "filter_items_list" => __( "Filter Teams list", "emp" ),
        "items_list_navigation" => __( "Teams list navigation", "emp" ),
        "items_list" => __( "Teams list", "emp" ),
    ];

    $args = [
        "label" => __( "Teams", "emp" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => [ "slug" => "teams", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 5,
        "supports" => [ "title","editor","thumbnail" ],
    ];

    register_post_type( "teams", $args );

    // register job application post type
    register_post_type('job_application',
    array(
        'labels' => array(
            'name' => __('Job Applications'),
            'singular_name' => __('Job Application')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'), // Removed editor and custom-fields
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false,
            'edit_post' => false,
            'read_post' => true,
            'read' => true,
        ),
        'map_meta_cap' => true,
    )
);

}
add_action( 'init', 'custom_post_type_emp' );



function custom_taxonomy_emp(){
    
	/**
	 * Taxonomy: job types.
	 */

	$labels = [
		"name" => __( "Jobs types", "emp" ),
		"singular_name" => __( "Job type", "emp" ),
	];

	$args = [
		"label" => __( "Job types", "emp," ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'jobs_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "jobs_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "jobs_type", [ "jobs" ], $args );

    // job catagory
 
    $labels = [
		"name" => __( "Jobs Category", "emp" ),
		"singular_name" => __( "Job Category", "emp" ),
	];

	$args = [
		"label" => __( "Jobs Categories", "emp," ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'jobs_cat', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "jobs_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "jobs_cat", [ "jobs" ], $args );
     
    // job country
 
     $labels = [
		"name" => __( "Jobs Countries", "emp" ),
		"singular_name" => __( "Job Country", "emp" ),
	];

	$args = [
		"label" => __( "Jobs Countries", "emp," ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'jobs_countries', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "jobs_countries",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "jobs_countries", [ "jobs" ], $args );


     
    // Team featured
 
    $labels = [
		"name" => __( "Featured teams", "emp" ),
		"singular_name" => __( "Featured team", "emp" ),
	];

	$args = [
		"label" => __( "Featured teams", "emp," ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'featured_teams', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "featured_teams",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "featured_teams", [ "teams" ], $args );

}


add_action( 'init', 'custom_taxonomy_emp' );


// HandleForm Submission
function handle_job_application_form_submission() {
    if (isset($_POST['FirstName'])) {
        // Sanitize and get form data
        $first_name = sanitize_text_field($_POST['FirstName']);
        $last_name = sanitize_text_field($_POST['LastName']);
        $email = sanitize_email($_POST['Email']);
        $phone_number = sanitize_text_field($_POST['phoneNumber']);
        $job_name = sanitize_text_field($_POST['jobs_name']);
        $job_id = intval($_POST['jobs_id']);
        $company_name = sanitize_text_field($_POST['job_provider_name']); // Set your company name here
      
        // Handle file uploads
        $upload_dir = wp_upload_dir();
        $cover_letter = $_FILES['Coverletter'];
        $resume = $_FILES['YourResume'];

        // Check for upload errors
        if ($cover_letter['error'] !== UPLOAD_ERR_OK || $resume['error'] !== UPLOAD_ERR_OK) {
            wp_redirect(home_url('/application-error'));
            exit;
        }

        // Move files to the upload directory
        $cover_letter_path = wp_upload_bits($cover_letter['name'], null, file_get_contents($cover_letter['tmp_name']));
        $resume_path = wp_upload_bits($resume['name'], null, file_get_contents($resume['tmp_name']));

        // Check for upload errors
        if ($cover_letter_path['error'] || $resume_path['error']) {
            wp_redirect(home_url('/application-error'));
            exit;
        }

        // Create a new job application post
        $post_content = '<p><strong>First Name:</strong> <span>' . esc_html($first_name) . '</span></p>';
        $post_content .= '<p><strong>Last Name:</strong> <span>' . esc_html($last_name) . '</span></p>';
        $post_content .= '<p><strong>Email:</strong> <span>' . esc_html($email) . '</span></p>';
        $post_content .= '<p><strong>Phone Number:</strong> <span>' . esc_html($phone_number) . '</span></p>';
        $post_content .= '<p><strong>Job Name:</strong> <span>' . esc_html($job_name) . '</span></p>';
        $post_content .= '<p><strong>Job ID:</strong> <span>' . esc_html($job_id) . '</span></p>';
        $post_content .= '<p><strong>Cover Letter:</strong> <span><a href="' . esc_url($cover_letter_path['url']) . '">Download</a></span></p>';
        $post_content .= '<p><strong>Resume:</strong> <span><a href="' . esc_url($resume_path['url']) . '">Download</a></span></p>';

        $post_id = wp_insert_post(array(
            'post_type' => 'job_application',
            'post_title' => $first_name . ' ' . $last_name,
            'post_status' => 'publish',
            'post_content' => $post_content,
        ));

        // Send an email to the site admin
        $to = get_option('admin_email');
        $subject = 'New Job Application from ' . $first_name . ' ' . $last_name . ' for ' . $job_name;
        $message = 'You have received a new job application. Here are the details:' . "\r\n";
        $message .= 'Name: ' . $first_name . ' ' . $last_name . "\r\n";
        $message .= 'Email: ' . $email . "\r\n";
        $message .= 'Phone Number: ' . $phone_number . "\r\n";
        $message .= 'Job Name: ' . $job_name . "\r\n";
        $message .= 'Cover Letter: ' . esc_url($cover_letter_path['url']) . "\r\n";
        $message .= 'Resume: ' . esc_url($resume_path['url']) . "\r\n";

        wp_mail($to, $subject, $message);

        // Redirect after submission
        // var_dump('Company Name: ' .   $company_name . "asdsd");
        // var_dump('Company Name: ' .   $job_name);
        // var_dump('Company Name: ' .   $first_name);
        // var_dump('Company Name: ' .   $email);
        // // die();
        // error_log('First Name: ' . $first_name);
        // error_log('Job Name: ' . $job_name);
        // error_log('Company Name: ' . $company_name);
        
        // $redirect_url = home_url('/thank-you?name=' . urlencode($first_name) . '&job=' . urlencode($job_name) . '&company=' . urlencode($company_name));
        // var_dump('$redirect_url: ' .   $redirect_url);
        $name = urlencode($first_name);
        $job =  urlencode($job_name);
        $company = urlencode($company_name);
        
        $redirect_url = "http://emp.test/thank-you?name=$name&job=$job&company=$company";
        // echo $redirect_url;
        // die();
        error_log($redirect_url); // Log the URL to check if it's correct
        header("Location: $redirect_url");
        exit;
    }
}
add_action('admin_post_nopriv_submit_job_application', 'handle_job_application_form_submission');
add_action('admin_post_submit_job_application', 'handle_job_application_form_submission');


function job_application_add_meta_box() {
    add_meta_box(
        'job_application_details_meta_box', // Meta box ID
        __('Job Application Details'), // Meta box title
        'job_application_details_meta_box_callback', // Callback function
        'job_application', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'job_application_add_meta_box');
function job_application_details_meta_box_callback($post) {
    // Retrieve the job application details from post content
    $post_content = $post->post_content;

    echo '<div class="job-application-details">';
    echo wp_kses_post($post_content);
    echo '</div>';
}

// Hook to manage the columns for your custom post type
add_filter('manage_jobs_posts_columns', 'add_featured_column');
function add_featured_column($columns) {
    $columns['featured'] = __('Featured', 'emp');
    return $columns;
}

// Hook to display the custom column content
add_action('manage_jobs_posts_custom_column', 'custom_featured_column', 10, 2);
function custom_featured_column($column, $post_id) {
    if ($column == 'featured') {
        $featured = get_post_meta($post_id, '_featured', true);
        echo $featured ? 'Featured' : 'Not Featured';
    }
}

// Hook to make the column sortable
add_filter('manage_edit-jobs_sortable_columns', 'sortable_featured_column');
function sortable_featured_column($columns) {
    $columns['featured'] = 'featured';
    return $columns;
}

// Hook to add custom sorting logic
add_action('pre_get_posts', 'featured_column_orderby');
function featured_column_orderby($query) {
    if (!is_admin()) {
        return;
    }
    $orderby = $query->get('orderby');
    if ($orderby == 'featured') {
        $query->set('meta_key', '_featured');
        $query->set('orderby', 'meta_value');
    }
}

// Hook to add a meta box to edit the featured status
add_action('add_meta_boxes', 'add_featured_meta_box');
function add_featured_meta_box() {
    add_meta_box('featured_meta_box', 'Featured', 'display_featured_meta_box', 'jobs', 'side', 'high');
}

function display_featured_meta_box($post) {
    $featured = get_post_meta($post->ID, '_featured', true);
    ?>
    <label for="featured_field"><?php _e('Featured', 'emp'); ?></label>
    <select name="featured_field" id="featured_field">
        <option value="0" <?php selected($featured, '0'); ?>>Not Featured</option>
        <option value="1" <?php selected($featured, '1'); ?>>Featured</option>
    </select>
    <?php
}

// Hook to save the meta box data
add_action('save_post', 'save_featured_meta_box_data');
function save_featured_meta_box_data($post_id) {
    if (array_key_exists('featured_field', $_POST)) {
        update_post_meta($post_id, '_featured', $_POST['featured_field']);
    }
}

  
function custom_jobs_title_placeholder( $title, $post ) {
    if ( 'jobs' == $post->post_type ) {
        $title = __( 'Enter job title here', 'emp' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'custom_jobs_title_placeholder', 10, 2 );


function enqueue_custom_styles_and_scripts() {
wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@100;300;500;800&display=swap', array(), null);
wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2');
wp_enqueue_style('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css', array(), '1.12.1');
wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3');
wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), '3.5.7');
wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array(), '1.8.1');
wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array(), '1.8.1');
wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0-rc.0');
wp_enqueue_style('custom-styles', get_template_directory_uri() . '/dist/assets/styles/css/styles.css', array(), '1.0.0', 'all');

// Enqueue external scripts
wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);
wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);
wp_enqueue_script('wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.1.2', true);
wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
wp_enqueue_script('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), '1.12.1', true);
    wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '4.1.0-rc.0', true);

    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/dist/assets/js/main.js', array('jquery'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


/**
 * Enqueues assets based on the Vite development status.
 *
 * If the Vite server is in development mode, it enqueues development assets.
 * Otherwise, it enqueues the compiled CSS and JavaScript files generated by Vite
 * and localizes the enqueued script with relevant data.
 *
 * @return void
 */
