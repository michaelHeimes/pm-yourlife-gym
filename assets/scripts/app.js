/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordian
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js


// Navigation Widget
//@prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js
// Sticky Elements
//@prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    gsap.registerPlugin(ScrollTrigger);
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    _app.video_lazyload = function() {
        $(document).on('open.zf.reveal', '[data-reveal]', function() {
            if ($(this).hasClass('video-modal')) {
                let existingSrc = '';
                const src = $(this).find('[data-src-defer]').data('src-defer');
                const iframe = $(this).find('iframe');
                existingSrc = iframe.attr('src');
                if ( !existingSrc && src && iframe.length > 0) {
                    iframe.attr('src', src);
                }
            }
        });    
    }
    
    _app.home_page_anchors = function() {
        if( document.body.classList.contains('home') ) {
            
            // if (document.querySelector('#anchor-nav')) {
            //     // Define the ScrollTrigger for sticking #anchor-nav
            //     ScrollTrigger.create({
            //         trigger: '.content', // Trigger element
            //         start: 'top bottom-=100', // When the top of .content is 100px above the bottom of the viewport
            //         endTrigger: '.content', // End trigger element
            //         end: 'bottom bottom', // When the bottom of .content enters the bottom of the viewport
            //         pin: '#anchor-nav', // Element to pin
            //         pinSpacing: false, // Maintain pin spacing
            //         markers: true // Show ScrollTrigger markers (for debugging)
            //     });
            // }
            
            // Listen for the update event on Magellan
            const anchorNav =  $('#anchor-nav');
            
            $(anchorNav ).on('update.zf.magellan', function() {

                // Get the active anchor
                var activeAnchor = $('#anchor-nav ul > li > a.is-active');
                if (!activeAnchor.length) return;

                // Get the ID of the previous element
                var prevID = null;
                var prevSibling = activeAnchor.parent().prev();
                if (prevSibling.length) {
                    var prevAnchor = prevSibling.find('a');
                    if (prevAnchor.length) {
                        prevID = prevAnchor.attr('href').substring(1); // Remove the '#' from the href
                    }
                }
                
                // Get the ID of the next element
                var nextID = null;
                var nextSibling = activeAnchor.parent().next();
                if (nextSibling.length) {
                    var nextAnchor = nextSibling.find('a');
                    if (nextAnchor.length) {
                        nextID = nextAnchor.attr('href').substring(1); // Remove the '#' from the href
                    }
                }
                
                // Set the href of the closest #anchor-prev to the ID of the previous element
                $('#anchor-prev').attr('href', '#' + prevID);
                
                // Set the href of the closest #anchor-next to the ID of the next element
                $('#anchor-next').attr('href', '#' + nextID);   
            });

        }
//         if( document.body.classList.contains('home') ) {
//             // Select all elements with the attribute 'data-magellan-target'
//             const targets = document.querySelectorAll('[data-magellan-target]');
//             
//             // Select the ul inside #anchor-nav
//             const anchorNavUl = document.querySelector('#anchor-nav ul');
//             
//             // Loop through each target element
//             targets.forEach(target => {
//                 // Create li and a elements
//                 const listItem = document.createElement('li');
//                 const anchor = document.createElement('a');
//                 
//                 // Get the value of 'data-magellan-target'
//                 const targetId = target.getAttribute('data-magellan-target');
//                 
//                 // Set the href attribute of the anchor
//                 anchor.setAttribute('href', `#${targetId}`);
//                 
//                 // Set the innerText of the anchor to the targetId
//                 anchor.innerText = targetId;
//                 
//                 // Append the anchor to the li
//                 listItem.appendChild(anchor);
//                 
//                 // Append the li to the ul
//                 anchorNavUl.appendChild(listItem);
//             });
//             
//             // After dynamically adding the navigation items
//             // Initialize Magellan on #anchor-nav
//             Foundation.Magellan.defaults.threshold = 0;
//             const anchorNav = new Foundation.Magellan(anchorNavUl);
//             anchorNav.reflow();
// 
// 
//         }
    }
    
    _app.block_testimonial_slider = function() {
        const sliderwrappers = document.querySelectorAll('.block.testimonial-slider')

        sliderwrappers.forEach(function (sliderwrapper) {
            const slider = sliderwrapper.querySelector('.t-slider');
            const delay = sliderwrapper.getAttribute('data-delay');
            
            const swiper = new Swiper(slider, {
                loop: true,
                slidesPerView: 1,
                speed: 500,
                spaceBetween: 0,
                effect: "fade",
                crossFade: true,
                fadeEffect: { crossFade: true },
                autoplay: {
                  delay: delay + '000',
                  disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

        });
    }
        
    _app.banner_slider = function() {
        const bannerSlider = document.querySelector('.page-banner .bg-slider');
        if(bannerSlider) {
            const delay = bannerSlider.getAttribute('data-delay');
            
            function pauseAndRestartAllVideos() {
              var allVideos = document.querySelectorAll('.swiper-slide video');
              allVideos.forEach(function (video) {
                video.pause();
                video.currentTime = 0;
              });
            }
            
            function playVideoInActiveSlide() {
              var activeSlide = document.querySelector('.swiper-slide-active video');
              if (activeSlide) {
                // Show loading animation.
                const playPromise = activeSlide.play();
                
                if (playPromise !== undefined) {
                    playPromise.then(_ => {
                      // Automatic playback started!
                      // Show playing UI.
                    })
                    .catch(error => {
                      // Auto-play was prevented
                      // Show paused UI.
                    });
                }
              }
            }
            
            const swiper = new Swiper('.page-banner .bg-slider', {
                loop: true,
                slidesPerView: 1,
                speed: 500,
                spaceBetween: 0,
                effect: "fade",
                // autoplay: {
                //   delay: delay + '000',
                //   disableOnInteraction: false,
                // },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                on: {
                    init: function () {
                      // Play the video in the first slide on initialization
                      playVideoInActiveSlide();
                    },
                
                    // Listen for the transitionStart event
                    transitionStart: function () {
                      // Pause and restart all videos in slides
                      pauseAndRestartAllVideos();
                
                      // Play the video in the active slide
                      playVideoInActiveSlide();
                    }
                  }
            });
    
        }
        
        const heroBanner = document.querySelector('.page-banner.style-hero-slider');
        if(heroBanner) {
            const setHeroBannerMinHeight = function() {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const windowHeight = window.innerHeight;
                
                // Calculate the min-height by subtracting headerHeight from windowHeight
                let minHeight = windowHeight - headerHeight;
        
                // Ensure the minHeight does not exceed 790px
                if (minHeight > 790) {
                    minHeight = 790;
                }
        
                // Set the min-height of .style-hero-slider
                heroBanner.style.minHeight = minHeight + 'px';
            }
            setHeroBannerMinHeight();
            window.addEventListener('resize', function() {
                setHeroBannerMinHeight();
            });
        }
        
    }
    
    _app.autoPlayLoopedVideos = function() {
        const loopingVideos = document.querySelectorAll('.looping-video');
        if(loopingVideos) {
            loopingVideos.forEach(function (loopingVideo) {
                
                const playPromise = loopingVideo.play();
                
                if (playPromise !== undefined) {
                    playPromise.then(_ => {
                      // Automatic playback started!
                      // Show playing UI.
                    })
                    .catch(error => {
                      // Auto-play was prevented
                      // Show paused UI.
                    });
                }
                
            });
        }
    }
    
    _app.parallaxRows = function() {
        const offsetCtas = document.querySelectorAll('.offset-cta');
        
        const parallaxAnimation = function() {
            offsetCtas.forEach(offsetCta => {
                const imgWrap = offsetCta.querySelector('.img-wrap .inner');
                const ctaCard = offsetCta.querySelector('.cta-card');
                
                gsap.set(imgWrap, {y:'35%'})
    
                gsap.to(imgWrap, {
                  yPercent: -65,
                  ease: "none",
                  scrollTrigger: {
                    trigger: offsetCta,
                    start: "top bottom", // the default values
                    end: "bottom top",
                    scrub: true
                  }, 
                });
                
                gsap.to(ctaCard, {
                  yPercent: -45,
                  ease: "none",
                  scrollTrigger: {
                    trigger: offsetCta,
                    start: "top bottom", // the default values
                    end: "bottom top",
                    scrub: true
                  }, 
                });

            });        
        }
        
        if( offsetCtas && window.innerWidth > 639 ) { 
            parallaxAnimation();
        }
        window.addEventListener("resize", function(){
            if( offsetCtas && window.innerWidth > 639 ) { 
                parallaxAnimation();
            }
        });
        
    }
    
    _app.footer_nav_cols = function() {
        // Function to set the height of .main-nav to match the tallest li
        function setMainNavHeight() {
            // Get all footer .main-nav > li elements
            const navItems = document.querySelectorAll('footer .main-nav > li');
            
            // Initialize variable to store the tallest height
            let tallestHeight = 0;
        
            // Loop through each nav item to find the tallest height
            navItems.forEach(function(navItem) {
                const navItemHeight = navItem.offsetHeight;
                if (navItemHeight > tallestHeight) {
                    tallestHeight = navItemHeight;
                }
            });
        
            // Set the height of .main-nav to the tallest height
            const mainNav = document.querySelector('footer .main-nav');
            mainNav.style.height = tallestHeight + 'px';
        }
        
        // Set .main-nav height to match tallest li on initial load
        setMainNavHeight();
        
        // Recalculate .main-nav height on window resize
        window.addEventListener('resize', setMainNavHeight);
    }
    
    _app.accordions = function() {
        $(".accordion").on("down.zf.accordion", function(event) {
            var $openDrawer = $(this).find('.is-active:not(.init)');
            $('html,body').animate({scrollTop: $($openDrawer).offset().top - 120}, 500);
            $(this).find('.is-active:not(.init)').removeClass('init');
        }); 
    } 
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        //_app.fixed_nav_hack();
        _app.display_on_load();
        
        // Custom Functions
        //_app.mobile_takover_nav();
        _app.home_page_anchors();
        _app.banner_slider();
        _app.autoPlayLoopedVideos();
        _app.video_lazyload();
        _app.parallaxRows();
        //_app.accordions();
        _app.block_testimonial_slider();
        //_app.footer_nav_cols();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);