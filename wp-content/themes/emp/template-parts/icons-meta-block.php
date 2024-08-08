<?php
$front_page_id = get_option('page_on_front');

// Retrieve custom fields from the front page
$live_jobs_count = CFS()->get('live_jobs_count', $front_page_id);
$companies_count = CFS()->get('companies_count', $front_page_id);
$candidates_count = CFS()->get('candidates_count', $front_page_id);
$new_job_counts = CFS()->get('new_job_counts', $front_page_id);
?>
<div class="meta-company-detail">
    <div class="container">
        <ul>
            <li class='meta-company-detail__item'>
                <div class="icon-holder">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_0_238)">
                        <path opacity="0.2" d="M20 23.75C14.7341 23.7583 9.55955 22.3739 5.00122 19.7373V32.5C5.00122 32.6642 5.03355 32.8267 5.09637 32.9784C5.15919 33.1301 5.25126 33.2679 5.36733 33.3839C5.48341 33.5 5.62121 33.5921 5.77286 33.6549C5.92452 33.7177 6.08707 33.75 6.25122 33.75H33.7512C33.9154 33.75 34.0779 33.7177 34.2296 33.6549C34.3812 33.5921 34.519 33.5 34.6351 33.3839C34.7512 33.2679 34.8433 33.1301 34.9061 32.9784C34.9689 32.8267 35.0012 32.6642 35.0012 32.5V19.7358C30.4423 22.3734 25.2669 23.7583 20 23.75Z" fill="#357DED"/>
                        <path d="M33.7512 11.25H6.25122C5.56086 11.25 5.00122 11.8096 5.00122 12.5V32.5C5.00122 33.1904 5.56086 33.75 6.25122 33.75H33.7512C34.4416 33.75 35.0012 33.1904 35.0012 32.5V12.5C35.0012 11.8096 34.4416 11.25 33.7512 11.25Z" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26.25 11.25V8.75C26.25 8.08696 25.9866 7.45107 25.5178 6.98223C25.0489 6.51339 24.413 6.25 23.75 6.25H16.25C15.587 6.25 14.9511 6.51339 14.4822 6.98223C14.0134 7.45107 13.75 8.08696 13.75 8.75V11.25" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M35.0012 19.7358C30.4423 22.3734 25.2669 23.7583 20 23.75C14.7339 23.7583 9.55935 22.3739 5.00098 19.7372" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.125 18.75H21.875" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_0_238">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="meta-company-details__content">
                    <strong class='counter' data-end = <?php echo  $live_jobs_count ; ?> >
                        0+
                    </strong>
                    <span>
                        Live jobs
                    </span>
                </div>
            </li>
            <li class='meta-company-detail__item'>
                <div class="icon-holder">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_0_250)">
                        <path opacity="0.2" d="M22.499 33.7473V6.24731C22.499 5.91579 22.3673 5.59785 22.1328 5.36343C21.8984 5.12901 21.5805 4.99731 21.249 4.99731H6.24896C5.91744 4.99731 5.5995 5.12901 5.36508 5.36343C5.13066 5.59785 4.99896 5.91579 4.99896 6.24731V33.7473" fill="#357DED"/>
                        <path d="M2.5 33.7474H37.5" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.499 33.7473V6.24731C22.499 5.91579 22.3673 5.59785 22.1328 5.36343C21.8984 5.12901 21.5805 4.99731 21.249 4.99731H6.24896C5.91744 4.99731 5.5995 5.12901 5.36508 5.36343C5.13066 5.59785 4.99896 5.91579 4.99896 6.24731V33.7473" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M34.999 33.7473V16.2473C34.999 15.9158 34.8673 15.5979 34.6329 15.3634C34.3984 15.129 34.0805 14.9973 33.749 14.9973H22.499" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99896 11.2473H14.999" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.499 21.2474H17.499" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99896 27.4974H14.999" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27.499 27.4974H29.999" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27.499 21.2474H29.999" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_0_250">
                        <rect width="40" height="40" fill="#357DED"/>
                        </clipPath>
                        </defs>
                    </svg>

                </div>
                <div class="meta-company-details__content">
                    <strong class='counter' data-end = <?php echo  $companies_count; ?> >
                        0+
                    </strong>
                    <span>
                        Companies
                    </span>
                </div>
            </li>
            <li class='meta-company-detail__item'>
                <div class="icon-holder">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_0_266)">
                        <path opacity="0.2" d="M13.7501 25C18.2374 25 21.8751 21.3623 21.8751 16.875C21.8751 12.3877 18.2374 8.75 13.7501 8.75C9.26275 8.75 5.62506 12.3877 5.62506 16.875C5.62506 21.3623 9.26275 25 13.7501 25Z" fill="#357DED"/>
                        <path d="M13.7501 25C18.2374 25 21.8751 21.3623 21.8751 16.875C21.8751 12.3877 18.2374 8.75 13.7501 8.75C9.26275 8.75 5.62506 12.3877 5.62506 16.875C5.62506 21.3623 9.26275 25 13.7501 25Z" stroke="#357DED" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M24.2833 9.05256C25.4009 8.7377 26.5729 8.66597 27.7205 8.84221C28.8681 9.01845 29.9646 9.43856 30.9361 10.0743C31.9077 10.7099 32.7317 11.5465 33.3528 12.5274C33.9738 13.5084 34.3774 14.6111 34.5364 15.7612C34.6954 16.9113 34.6061 18.0821 34.2745 19.1948C33.9429 20.3075 33.3767 21.3362 32.614 22.2116C31.8514 23.0871 30.91 23.7889 29.8533 24.2699C28.7965 24.7508 27.649 24.9998 26.488 24.9999" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.49933 30.8432C3.76829 29.0382 5.45291 27.565 7.41097 26.548C9.36903 25.531 11.543 25.0001 13.7495 25C15.9559 24.9999 18.1299 25.5307 20.0881 26.5476C22.0462 27.5644 23.7309 29.0375 25 30.8424" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26.4879 25C28.6945 24.9984 30.8691 25.5285 32.8273 26.5455C34.7856 27.5625 36.4701 29.0364 37.738 30.8424" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_0_266">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="meta-company-details__content">
                    <strong class='counter' data-end = <?php echo  $candidates_count; ?> >
                        0+
                    </strong>
                    <span>
                        Candidates 
                    </span>
                </div>
            </li>
            <li class='meta-company-detail__item'>
                <div class="icon-holder">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_0_238)">
                        <path opacity="0.2" d="M20 23.75C14.7341 23.7583 9.55955 22.3739 5.00122 19.7373V32.5C5.00122 32.6642 5.03355 32.8267 5.09637 32.9784C5.15919 33.1301 5.25126 33.2679 5.36733 33.3839C5.48341 33.5 5.62121 33.5921 5.77286 33.6549C5.92452 33.7177 6.08707 33.75 6.25122 33.75H33.7512C33.9154 33.75 34.0779 33.7177 34.2296 33.6549C34.3812 33.5921 34.519 33.5 34.6351 33.3839C34.7512 33.2679 34.8433 33.1301 34.9061 32.9784C34.9689 32.8267 35.0012 32.6642 35.0012 32.5V19.7358C30.4423 22.3734 25.2669 23.7583 20 23.75Z" fill="#357DED"/>
                        <path d="M33.7512 11.25H6.25122C5.56086 11.25 5.00122 11.8096 5.00122 12.5V32.5C5.00122 33.1904 5.56086 33.75 6.25122 33.75H33.7512C34.4416 33.75 35.0012 33.1904 35.0012 32.5V12.5C35.0012 11.8096 34.4416 11.25 33.7512 11.25Z" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26.25 11.25V8.75C26.25 8.08696 25.9866 7.45107 25.5178 6.98223C25.0489 6.51339 24.413 6.25 23.75 6.25H16.25C15.587 6.25 14.9511 6.51339 14.4822 6.98223C14.0134 7.45107 13.75 8.08696 13.75 8.75V11.25" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M35.0012 19.7358C30.4423 22.3734 25.2669 23.7583 20 23.75C14.7339 23.7583 9.55935 22.3739 5.00098 19.7372" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.125 18.75H21.875" stroke="#357DED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_0_238">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="meta-company-details__content">
                    <strong class='counter' data-end = <?php echo  $new_job_counts; ?> >
                        0+
                    </strong>
                    <span>
                        New job added
                    </span>
                </div>
            </li>
        </ul>
    </div>
</div>