<?php
  $about_page_id = 120;
  $team_title = CFS()->get('teams_section_title',  $about_page_id);
get_header();
?>
<section class="team-section">
    <div class="container">
        <div class="section-title">
            <h3><?php echo $team_title; ?></h3>
        </div>
        <div class="team-wrap team-wrap--main">
            <?php

            $args = array(
                'post_type' => 'teams',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/loops/loop-team');
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>