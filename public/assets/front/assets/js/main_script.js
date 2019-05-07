/* ----------------------------------------------------------------------------------------
* Author        : Ambidextrousbd
* Template Name : Abirvab | One Page Multipurpose Html Template
* File          : Abirvab main JS file
* Version       : 1.0
* ---------------------------------------------------------------------------------------- */




    
/* INDEX
----------------------------------------------------------------------------------------

01. Preloader js

02. change Menu background on scroll js 

03. Navigation js

04. Smooth scroll to anchor

05. Portfolio js

06. Magnific Popup js

07. Testimonial js

08. client js

08. Skill  js

09. Google Map js

10. Ajax Contact Form js

10. fun-facts  js

10. WOW js  

10. carousel Slider js

11. Mailchimp js

-------------------------------------------------------------------------------------- */





(function($) {
'use strict';


    /*-------------------------------------------------------------------------*
     *                  01. Preloader js                                       *
     *-------------------------------------------------------------------------*/
      $(window).on( 'load', function(){
        
          $('#preloader').delay(300).fadeOut('slow',function(){
            $(this).remove();
          });    

      }); // $(window).on end
	  
	  
	  /*-------------------------------------------------------------------------*
     *                       02. Back-to-top                            *
     *-------------------------------------------------------------------------*/	  


        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 500) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
        $('.back-to-top').on("click", function() {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
		
		

  $(document).ready(function(){



    /*-------------------------------------------------------------------------*
     *             02. change Menu background on scroll js                     *
     *-------------------------------------------------------------------------*/
      $(window).on('scroll', function () {
          var menu_area = $('.menu-area');
          if ($(window).scrollTop() > 0) {
              menu_area.addClass('sticky-menu');
          } else {
              menu_area.removeClass('sticky-menu');
          }
      }); // $(window).on('scroll' end


	  
    /*-------------------------------------------------------------------------*
     *                   03. Navigation js                                     *
     *-------------------------------------------------------------------------*/
      $(document).on('click', '.navbar-collapse.in', function (e) {
          if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
              $(this).collapse('hide');
          }
      });

      $('body').scrollspy({
          target: '.navbar-collapse',
          offset: 195
      });



    /*-------------------------------------------------------------------------*
     *                   04. Smooth scroll to anchor                           *
     *-------------------------------------------------------------------------*/
      $('a.smooth_scroll').on("click", function (e) {
          e.preventDefault();
          var anchor = $(this);
          $('html, body').stop().animate({
              scrollTop: $(anchor.attr('href')).offset().top - 50
          }, 1000);
      });



    /*-------------------------------------------------------------------------*
     *                  05. Portfolio js                                       *
     *-------------------------------------------------------------------------*/
      $('.portfolio').mixItUp();


    /*-------------------------------------------------------------------------*
     *                  06. Magnific Popup js                                  *
     *-------------------------------------------------------------------------*/
      $('.work-popup').magnificPopup({
          type: 'image',
          gallery: {
              enabled: true
          },
          zoom: {
              enabled: true,
              duration: 300, // don't foget to change the duration also in CSS
              opener: function(element) {
                  return element.find('img');
              }
          }
          
      });
      

      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
      });


    /*-------------------------------------------------------------------------*
     *                  07. Testimonial js                                     *
     *-------------------------------------------------------------------------*/
      $(".testimonial-list").owlCarousel({
          slideSpeed      : 1000,
          paginationSpeed : 500,
          singleItem      : true,
          lazyLoad        : false,
          pagination      : true,
          navigation      : false,
          autoPlay        : true,
          transitionStyle: "fade"
      });



    /*-------------------------------------------------------------------------*
     *                       08. client js                                     *
     *-------------------------------------------------------------------------*/
      $(".owl-client").owlCarousel({
          items               : 5,
          autoPlay            : true,
          itemsDesktop        : [1199, 5],
          itemsDesktopSmall   : [980, 4],
          itemsTablet         : [768, 3],
          itemsMobile         : [479, 2],
          pagination          : false,
          navigation          : false,
          autoHeight          : true,
      });

	  
	  
/*-------------------------------------------------------------------------*
     *                       09. Skill js                                 *
     *-------------------------------------------------------------------------*/
		jQuery('.skillbar').each(function() {
				jQuery(this).find('.skillbar-bar').animate({
					width: jQuery(this).attr('data-percent')
				}, 3000);
			});
			
			
    /*-------------------------------------------------------------------------*
     *                       09. Google Map js                                 *
     *-------------------------------------------------------------------------*/

            var myCenter=new google.maps.LatLng(23.779908,90.3669903);
            function initialize()
            {
                var mapProp = {
                	center:myCenter,
               		scrollwheel: false,
                	zoom:15,
                	mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var map=new google.maps.Map(document.getElementById("contactgoogleMap"),mapProp);
                var marker=new google.maps.Marker({
	                position:myCenter,
	                animation:google.maps.Animation.BOUNCE,
	                icon:'assets/img/map-marker.png',
	                map: map,
                });
                var styles = [
					{
						stylers: [
							{ hue: "#c5c5c5" },
							{ saturation: -100 }
						]
					},
                ];
                map.setOptions({styles: styles});
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
 

    /*-------------------------------------------------------------------------*
     *                  10. Ajax Contact Form js                               *
     *-------------------------------------------------------------------------*/
      // Get the form.
      var form = $('#ajax-contact');

      // Get the messages div.
      var formMessages = $('#form-messages');

      // Set up an event listener for the contact form.
      $(form).on('submit', function(e) {
          // Stop the browser from submitting the form.
          e.preventDefault();

          // Serialize the form data.
          var formData = $(form).serialize();

          // Submit the form using AJAX.
          $.ajax({
              type: 'POST',
              url: $(form).attr('action'),
              data: formData
          })
          .done(function(response) {
              // Make sure that the formMessages div has the 'success' class.
              $(formMessages).removeClass('error');
              $(formMessages).addClass('success');

              // Set the message text.
              $(formMessages).text(response);

              // Clear the form.
              $('#name').val('');
              $('#email').val('');
              $('#subject').val('');
              $('#message').val('');

          })
          .fail(function(data) {
              // Make sure that the formMessages div has the 'error' class.
              $(formMessages).removeClass('success');
              $(formMessages).addClass('error');

              // Set the message text.
              if (data.responseText !== '') {
                  $(formMessages).text(data.responseText);
              } else {
                  $(formMessages).text('Oops! An error occured and your message could not be sent.');
              }
          });

      });

	  
		
			
	
	
	
		/*-------------------------------------------------------------------------*
     *                       08. fun-facts  js                         *
     *-------------------------------------------------------------------------*/	
    $('.fun-facts-area').on('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).off('inview');
        }
    });
	
	  	
			
		/*-------------------------------------------------------------------------*
         *                   11. carousel Slider js                                    *
         *-------------------------------------------------------------------------*/	
			
		$('#carousel-example-generic').carousel({
			interval: 3000,
			cycle: true
		}); 	
	  
        /*-------------------------------------------------------------------------*
         *                   11. MailChimp js                                    *
         *-------------------------------------------------------------------------*/
          $('#mc-form').ajaxChimp({
            language: 'en',
            callback: mailChimpResponse,

            // ADD YOUR MAILCHIMP URL BELOW HERE!
            url: 'http://coderspoint.us14.list-manage.com/subscribe/post?u=e5d45c203261b0686dad32537&amp;id=d061f39c51'
            
          });

          function mailChimpResponse(resp) {
            if (resp.result === 'success') {
              $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
              $('.mailchimp-error').fadeOut(400);

            } else if(resp.result === 'error') {
              $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
            }  
          }
  

  }); // $(document).ready end
  
  
})(jQuery);