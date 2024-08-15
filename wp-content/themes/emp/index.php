<?php
// Template Name: Blog Page
get_header();
get_template_part('template-parts/inner-banner');

// Fetch all posts
$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'post'
);
$myposts = get_posts($args);
?>

<?php if (!empty($myposts)) : ?>
<section class="blog-section blog-section--listing">
    <div class="container">
        <div class="blog-section__wrap">
            <div class="row">
                <?php foreach ($myposts as $post) : setup_postdata($post); ?>
                    <?php get_template_part('template-parts/loops/loop-blog'); ?>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php
get_footer();
?>
