<?php
$errorPageImage = get_theme_mod('emp_error_page_image');
$errorPageText = get_theme_mod('emp_error_page_text');
get_header();
?>

    <section class="error-page-section">
        <div class="container">
            <div class="error-page-wrap">
                <div class="error-page-wrap--content">
                    <?php if($errorPageImage): ?>
                    <figure class="error-page-wrap--image">
                        <img src="<?php echo $errorPageImage ?>" alt="404 image">
                    </figure>
                    <?php else: ?>
                    <h1>404</h1>
                    <?php endif; ?>
                    <div class="error-page-text-content">
                        <p class="error-page-wrap--desc">
                            <strong><?php echo $errorPageText ?></strong>
                        </p>
                        <a href="/" class="btn btn--secondary">Back to Home</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
<?php

get_footer();
?>