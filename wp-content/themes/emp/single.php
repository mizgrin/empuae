<?php

get_header();
?>

<section class="news--section-single">
    <div class="container">
        <div class="news-wrap">
            <div class="news-wrap__top">
                <div class="section-title">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="author-info">
                    <?php if(get_the_author()) : ?>
                    <div class="author-name blog-meta">
                        <div class="icon-holder">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>

                        <?php echo the_author(); ?>
                        </span>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty(get_the_date())) : ?>
                    <div class="posted-date blog-meta">
                        <div class="icon-holder">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <span>
                            <?php echo get_the_date(); ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
           
            <div class="news-content__wrap">
                <figure>
                    <?php the_post_thumbnail(); ?>
                </figure>
                <div class="news-content__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="related-blogs">
    <div class="container">
        <div class="section-title">
            <h3>Related Articles</h3>
        </div>
        <div class="related-blogs__wrap">
            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array($post->ID)
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="related-blogs__item">
                        <?php get_template_part('template-parts/loops/loop-blog'); ?>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<?php

get_footer();
?>