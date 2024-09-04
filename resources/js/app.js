// Navigation toggle
window.addEventListener('load', function () {
    let main_navigation = document.querySelector('#primary-menu');
    document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
        e.preventDefault();
        main_navigation.classList.toggle('hidden');
    });
});

jQuery(document).ready(function ($) {
    $(".ipa-stories-slider").slick({
        centerMode: true,
        centerPadding: "200px",
        dots: false,
        appendDots: $("#ipa-stories-slider-dots"),
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
        // prevArrow: $("#ipa-services-slider-previous"),
        // nextArrow: $("#ipa-services-slider-next"),
    })
});

// Animations
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;

                if (target.classList.contains('slide-in-left')) {
                    target.classList.add('animate-slide-in-left');
                } else if (target.classList.contains('slide-in-right')) {
                    target.classList.add('animate-slide-in-right');
                } else if (target.classList.contains('slide-in-bottom')) {
                    target.classList.add('animate-slide-in-bottom');
                } else if (target.classList.contains('slide-in-top')) {
                    target.classList.add('animate-slide-in-top');
                } else if (target.classList.contains('slide-in-bottom-2s')) {
                    target.classList.add('delay-animate-slide-in-bottom');
                } else if (target.classList.contains('slide-in-top-1500ms')) {
                    target.classList.add('delay-animate-slide-in-top-1500ms');
                } else if (target.classList.contains('slide-in-top-2s')) {
                    target.classList.add('delay-animate-slide-in-top-2s');
                } else if (target.classList.contains('slide-in-top-1250ms')) {
                    target.classList.add('delay-animate-slide-in-top-1250ms');
                }

                // Ensure the element is visible
                target.classList.remove('opacity-0');

                // Stop observing this element
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.1 });

    // Observe all elements with slide-in classes
    document.querySelectorAll('.slide-in-left, .slide-in-right, .slide-in-bottom, .slide-in-top, .slide-in-bottom-2s, .slide-in-top-1500ms, .slide-in-top-2s, .slide-in-top-1250ms, .slide-in-left-250ms, .slide-in-right-250ms, .slide-in-bottom-250ms').forEach(element => {
        // Ensure elements are initially hidden
        element.classList.add('opacity-0');
        observer.observe(element);
    });
});


// Accordion toggle
document.addEventListener('DOMContentLoaded', function() {
    const accordionItems = document.querySelectorAll('.accordion-item');

    function openAccordion(item) {
        // Close all accordion items
        accordionItems.forEach(function(el) {
            el.classList.remove('active');
        });

        // Open the specified item
        item.classList.add('active');
    }

    // Ensure the first accordion item is open by default
    if (accordionItems.length > 0) {
        openAccordion(accordionItems[0]);
    }

    // Add click event listener to each accordion title
    document.querySelectorAll('.accordion-title').forEach(function(title) {
        title.addEventListener('click', function() {
            const item = this.closest('.accordion-item');
            if (!item.classList.contains('active')) {
                openAccordion(item);
            } else {
                // Optionally close the accordion if clicked again
                item.classList.remove('active');
            }
        });
    });
});


