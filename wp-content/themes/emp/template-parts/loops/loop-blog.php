<div class="col-lg-4">
    <div class="blog-card">
        <a href="<?php the_permalink(); ?>" class="screen-link"></a>
        <div class="blog--media">
            <figure>
                <?php the_post_thumbnail(); ?>
            </figure>
        </div>
        <div class="blog-card__content">
            <div class="blog-content--title-wrap">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <div class="meta-blog-wrap">
                    <ul class='list-unstyled'>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            <span>
                                <?php
                                $date = get_the_date('d F, Y');
                                echo $date;
                                ?>
                            </span>
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            <span>
                                <?php
                                $author = get_the_author();
                                echo $author;
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <p>
                <?php echo get_the_excerpt(); ?>
            </p>
        </div>
    </div>
</div>
