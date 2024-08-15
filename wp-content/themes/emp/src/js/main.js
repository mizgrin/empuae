

// Your JavaScript code

$(document).ready(function() {
    new WOW().init();

  $(window).scroll(function () {

    if ($(document).scrollTop() > 50) {
      $("#header").addClass("fixed slideInDown");
    } else {
      $("#header").removeClass("fixed slideInDown");
  
    }
  });

 
  // burgermenujs
  $('#burgerMenu').on('click', function () {
    $(this).toggleClass('cross'); 
    $(this).parents('.emp__mobile-menu').next('.navbar').toggleClass('active'); 
  })
  
    $('.select2').select2();
    
    let bannerImageElement = $('#bannerImage');

    if (bannerImageElement.length) {
        bannerImageElement.addClass("loaded");
    }
    
    
    let bannerElement = $('.banner-wrap--title');

    if (bannerElement.length) {
        let bannerText = bannerElement.html().split(" ");
        
        if (bannerText.length >= 4) {
            bannerText[3] = `<span><strong>${bannerText[3]}</strong></span>`;
        }
        
        bannerElement.html(bannerText.join(" "));
    }
    
    
    $.fn.animateCounter = function(end, duration) {
        end = parseInt(end, 10); // Convert end value to integer
        $(this).prop('Counter', 0).animate({
            Counter: end
        }, {
            duration: duration,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now) + ' +');
            }
        });
    };

    $('.counter').each(function() {
        var endValue = $(this).data('end'); // Get the end value from data-end attribute
        $(this).animateCounter(endValue, 10000); // Animate from 0 to the end value over 2 seconds
    });

    $('.section-title').each(function() {
        var $h3 = $(this).find('h3');
        var sectionTitle = $h3.html().split(" ");
    
        if (sectionTitle.length >= 2) {
            sectionTitle[sectionTitle.length - 2] = `<strong>${sectionTitle[sectionTitle.length - 2]}</strong>`;
            $h3.html(sectionTitle.join(' '));
        }
    });
    
 

    // $('.form-group input').on('focus', labelAnimation);
    // $('.form-group textarea').on('focus', labelAnimation);
    // Constructor function to handle input events
function FormGroupHandler(selector) {
    this.selector = selector;

    // Method to initialize event listeners
    this.init = function() {
        $(this.selector).on('change keyup', function() {
            if (!$(this).val()) {
                $(this).closest('.form-group').removeClass('active');
            } else {
                $(this).closest('.form-group').addClass('active');
            }
        });
    };
}

// Instantiate and call the constructor function for the required selectors
new FormGroupHandler('.form-group input[type="text"]').init();
new FormGroupHandler('.form-group input[type="email"]').init();
new FormGroupHandler('.form-group textarea').init();

    
function getUrlParameters() {
    var params = {};
    var queryString = window.location.search.substring(1);
    var regex = /([^&=]+)=([^&]*)/g;
    var match;

    while ((match = regex.exec(queryString))) {
        var key = decodeURIComponent(match[1].replace(/\+/g, " "));
        var value = decodeURIComponent(match[2].replace(/\+/g, " "));
        if (key.endsWith('[]')) {
            key = key.substring(0, key.length - 2); // Remove the [] from the key
            if (!params[key]) {
                params[key] = [];
            }
            params[key].push(value);
        } else {
            params[key] = value;
        }
    }
    return params;
}
var params = getUrlParameters();

// Check if params is not empty
if (Object.keys(params).length > 0) {
    // Append the parameters to a new list element
    var $list = $('<ul class="query-parameters-list list-unstyled"></ul>');
    $.each(params, function(key, values) {
        if (Array.isArray(values)) {
            values.forEach(function(value) {
                let keyName = value.replace('_', ' ');
                let searchKey = keyName.split(' ').join(' ');
                $list.append('<li>'+ searchKey + '</li>');
                $('input[name="' + key + '[]"][value="' + value + '"]').prop('checked', true);
            });
        } else {
            $list.append('<li>' + key + ': ' + values + '</li>');
            $('input[name="' + key + '"][value="' + values + '"]').prop('checked', true);
        }
    });

    // Insert the list after the .search-form--innerpage element
    $('.search-form--innerpage').after($list);
}



$('#filter-toggle-btn').on('click', function() {
    $('.sidebar-wrap--filter').toggleClass('active');
});
$('#btn-close-filter').on('click', function() {
    $('.sidebar-wrap--filter').removeClass('active');
});
var jobForm = document.getElementById('jobs_form');
if(jobForm) {
    jobForm.addEventListener('submit', function(event) {
        // Get form inputs
        var firstName = document.querySelector('input[name="FirstName"]');
        var lastName = document.querySelector('input[name="LastName"]');
        var email = document.querySelector('input[name="Email"]');
        var phoneNumber = document.querySelector('input[name="phoneNumber"]');
        var coverLetter = document.querySelector('input[name="Coverletter"]');
        var resume = document.querySelector('input[name="YourResume"]');
    
        // Validate first name
        if (!firstName.value.trim()) {
            alert('Please enter your first name.');
            firstName.focus();
            event.preventDefault();
            return;
        }
    
        // Validate last name
        if (!lastName.value.trim()) {
            alert('Please enter your last name.');
            lastName.focus();
            event.preventDefault();
            return;
        }
    
        // Validate email
        if (!email.value.trim()) {
            alert('Please enter your email.');
            email.focus();
            event.preventDefault();
            return;
        } else {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email.value)) {
                alert('Please enter a valid email address.');
                email.focus();
                event.preventDefault();
                return;
            }
        }
    
        // Validate phone number
        if (!phoneNumber.value.trim()) {
            alert('Please enter your phone number.');
            phoneNumber.focus();
            event.preventDefault();
            return;
        } else {
            var phonePattern = /^[0-9-+\s()]*$/;
            if (!phonePattern.test(phoneNumber.value)) {
                alert('Please enter a valid phone number.');
                phoneNumber.focus();
                event.preventDefault();
                return;
            }
        }
    
        // Validate cover letter file type
        if (coverLetter.files.length === 0) {
            alert('Please upload your cover letter.');
            coverLetter.focus();
            event.preventDefault();
            return;
        } else {
            var allowedCoverLetterTypes = ['pdf', 'txt', 'doc', 'docx'];
            var coverLetterExtension = coverLetter.files[0].name.split('.').pop().toLowerCase();
            if (allowedCoverLetterTypes.indexOf(coverLetterExtension) === -1) {
                alert('Please upload a valid cover letter file (pdf, txt, doc, docx).');
                coverLetter.focus();
                event.preventDefault();
                return;
            }
        }
    
        // Validate resume file type
        if (resume.files.length === 0) {
            alert('Please upload your resume.');
            resume.focus();
            event.preventDefault();
            return;
        } else {
            var allowedResumeTypes = ['pdf'];
            var resumeExtension = resume.files[0].name.split('.').pop().toLowerCase();
            if (allowedResumeTypes.indexOf(resumeExtension) === -1) {
                alert('Please upload a valid resume file (pdf).');
                resume.focus();
                event.preventDefault();
                return;
            }
        }
    });
}


$('.team-slider').slick({
    dots: true,
    infinite: false,
    speed: 300,
    centerMode: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 3,
    autoplaySpeed: 2000,
    speed:2000,
    slidesToScroll: 1,
    centerpadding: '10px',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  $('#gridBtn').on('click', function() {
    // Add active class to the grid button and remove from the row button
    $(this).addClass('active');
    $('#rowBtn').removeClass('active');
    
    // Remove the row-listed class from the jobs-wrap div
    $('.jobs-wrap').removeClass('row-listed');
});

// Add click event handler for the row button
$('#rowBtn').on('click', function() {
    // Add active class to the row button and remove from the grid button
    $(this).addClass('active');
    $('#gridBtn').removeClass('active');
    
    // Add the row-listed class to the jobs-wrap div
    $('.jobs-wrap').addClass('row-listed');
});
});