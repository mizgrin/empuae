<?php 
  $about_page_id = 120;

  // Retrieve custom fields from the "About" page
  $about_featured_img_id = CFS()->get('about_featured_image', $about_page_id);
  $about_section_title = CFS()->get('about_introduction_title', $about_page_id);
  
  // Get the content of the "About" page
  $about_page_content = get_post_field('post_content', $about_page_id);
  if(!empty($about_page_content)||!empty($about_featured_img_id)||!empty($about_section_title)): 
?>
<section class="about-section <?php if (!is_front_page()) { echo 'about-section--innerpage'; } ?> ">
    <div class="container">
        <div class="about-wrap">
            <div class="row align-items-center">
                <?php if(!empty($about_featured_img_id)): ?>
                    <div class="col-md-5">
                        <figure class="about-image wow animate__animated animate__fadeInLeft">
                            <?php echo wp_get_attachment_image($about_featured_img_id, 'full', '', array('class' => 'img'));; ?>
                        </figure>
                    </div>
                <?php endif; ?>
                <?php if(!empty($about_page_content)): ?>
                    <div class="col-md-7">
                        <div class="about-wrap--content wow animate__animated animate__fadeInRight">
                            <div class="section-title">
                                <h3 class="title"><?php echo $about_section_title ; ?></h3>
                            </div>
                            <div class="about-content">
                                <?php echo wp_kses_post($about_page_content);; ?>
                            </div>
                        </div>
                    
                    </div>
               <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>