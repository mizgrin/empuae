<?php
  $about_page_id = 120;
  $faq_title = CFS()->get('faq_section_title',  $about_page_id);
  $faqs = CFS()->get('faq_list',  $about_page_id);

?>
<section class="faq-section">
    <div class="container">
        <div class="section-title">
            <h3><?php echo $faq_title; ?></h3>
        </div>
        <?php  if ($faqs) : ?>
    <div class="accordion" id="faqAccordion">
        <?php foreach ($faqs as $index => $faq) : ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $index; ?>">
                        <?php echo esc_html($faq['faq_questions']); ?>
                    </button>
                </h2>
                <div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <?php echo wp_kses_post($faq['faq_answers']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    </div>
</section>