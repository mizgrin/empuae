<?php
$front_page_id = get_option('page_on_front');

// Retrieve custom fields from the front page
$emp_steps = CFS()->get('emp_steps', $front_page_id);
$emp_title = CFS()->get('emp_steps_main_title', $front_page_id);
?>
<section class="how-to-work-section bg-light">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeInDown">
            <h3><?php echo $emp_title ; ?></h3>
        </div>
        <div class="steps-wrap">
        <?php


$icons = [
    1 => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_0_295)">
            <path opacity="0.2" d="M14.499 25C20.298 25 24.999 20.299 24.999 14.5C24.999 8.70101 20.298 4 14.499 4C8.70003 4 3.99902 8.70101 3.99902 14.5C3.99902 20.299 8.70003 25 14.499 25Z" fill="#357DED"/>
            <path d="M10.499 14.5H18.499" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.499 10.5V18.5" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.499 25C20.298 25 24.999 20.299 24.999 14.5C24.999 8.70101 20.298 4 14.499 4C8.70003 4 3.99902 8.70101 3.99902 14.5C3.99902 20.299 8.70003 25 14.499 25Z" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M21.9238 21.9219L27.9989 27.9969" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_0_295">
            <rect width="32" height="32" fill="white"/>
            </clipPath>
            </defs>
            </svg>',
    2 => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_0_307)">
            <path d="M31 6L10.9999 25L1 15.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_0_307">
            <rect width="32" height="32" fill="white"/>
            </clipPath>
            </defs>
            </svg>',
    3 => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_0_315)">
            <path opacity="0.2" d="M6.80761 25.1924C5.65711 24.0419 6.42019 21.6265 5.8346 20.2111C5.22755 18.744 3 17.5631 3 16C3 14.4368 5.22756 13.256 5.8346 11.7888C6.4202 10.3735 5.65711 7.95811 6.80761 6.80761C7.95811 5.65711 10.3735 6.42019 11.7889 5.8346C13.256 5.22755 14.4369 3 16 3C17.5632 3 18.744 5.22756 20.2112 5.8346C21.6265 6.4202 24.0419 5.65711 25.1924 6.80761C26.3429 7.95811 25.5798 10.3735 26.1654 11.7889C26.7725 13.256 29 14.4369 29 16C29 17.5632 26.7724 18.744 26.1654 20.2112C25.5798 21.6265 26.3429 24.0419 25.1924 25.1924C24.0419 26.3429 21.6265 25.5798 20.2111 26.1654C18.744 26.7725 17.5631 29 16 29C14.4368 29 13.256 26.7724 11.7888 26.1654C10.3735 25.5798 7.95811 26.3429 6.80761 25.1924Z" fill="#357DED"/>
            <path d="M6.80761 25.1924C5.65711 24.0419 6.42019 21.6265 5.8346 20.2111C5.22755 18.744 3 17.5631 3 16C3 14.4368 5.22756 13.256 5.8346 11.7888C6.4202 10.3735 5.65711 7.95811 6.80761 6.80761C7.95811 5.65711 10.3735 6.42019 11.7889 5.8346C13.256 5.22755 14.4369 3 16 3C17.5632 3 18.744 5.22756 20.2112 5.8346C21.6265 6.4202 24.0419 5.65711 25.1924 6.80761C26.3429 7.95811 25.5798 10.3735 26.1654 11.7889C26.7725 13.256 29 14.4369 29 16C29 17.5632 26.7724 18.744 26.1654 20.2112C25.5798 21.6265 26.3429 24.0419 25.1924 25.1924C24.0419 26.3429 21.6265 25.5798 20.2111 26.1654C18.744 26.7725 17.5631 29 16 29C14.4368 29 13.256 26.7724 11.7888 26.1654C10.3735 25.5798 7.95811 26.3429 6.80761 25.1924Z" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M21.5 13L14.1666 20L10.5 16.5" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_0_315">
            <rect width="32" height="32" fill="white"/>
            </clipPath>
            </defs>
            </svg>'
];

$count = 1;
foreach ($emp_steps as $emp_step) {
    ?>
    <div class="step-wrap__item  wow fadeInRight wow animate__animated animate__fadeInUp">
        <div class="step-wrap--icon">
            <?php echo $icons[$count]; ?>
        </div>
        <div class="step-wrap--content">
            <h4 class="step-wrap--title"><?php echo $emp_step['emp_steps_title']; ?></h4>
            <p class="step-wrap--desc"><?php echo $emp_step['emp_steps_description']; ?></p>
        </div>
    </div>
    <?php
    $count++;
}
?>

        </div>
    </div>
</section>